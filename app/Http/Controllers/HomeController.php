<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsMultipleImages;
use App\Models\PostMeta;
use App\Models\RSS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public
    function migratedNews($locale = null, $category = null)
    {
        $news = News::where('post_type', 'post')->where('post_status', 'publish')->where('post_content', '<>', '')->orderBy('post_date', 'DESC')->paginate(10);
        $images = [];
        foreach ($news as $ns) {
            $image = News::where('post_type', 'attachment')->where('post_parent', $ns->ID)->first();
            if ($image) {
                $imageUrl = $image->guid;
                $finalImgUrl = str_replace('https://vodstaging.rotana.net', 'https://old.rotana.net', $imageUrl);
                $finalImgUrl = str_replace('https://rotana.net', 'https://old.rotana.net', $finalImgUrl);
                $images[] = $finalImgUrl;
            } else {
                $metaObject = PostMeta::where('post_id', $ns->ID)->first();
                if ($metaObject and unserialize($metaObject->meta_value)) {
                    $unserializedMetaValue = unserialize($metaObject->meta_value);
                    if (count($unserializedMetaValue) < 10) {
                        $images[] = "PlaceHolderImage";
                        continue;
                    }
                    $imgArray = unserialize($metaObject->meta_value)['img']['images'];
                    if (count($imgArray) == 2) {
                        $imgArray = $imgArray['without_alt'];
                    }

                    $result = array_filter($imgArray, function ($item) {
                        return stripos($item, 'x') !== false;
                    });

                    $finalImgUrlMeta = strpos(end($result), 'vodstaging') ? str_replace('https://vodstaging.rotana.net', 'https://old.rotana.net', end($result)) : end($result);
                    $images[] = $finalImgUrlMeta;
                } else {
                    $images[] = "PlaceHolderImage";
                }
            }
        }
        return view('migrated-news', ['news' => $news, 'newsImages' => $images]);
    }

    public
    function newsList(Request $request, $title = null)
    {

        $date_from = str_replace('-', '/', $request->input("date_from"));
        $date_to = str_replace('-', '/', $request->input("date_to"));
        $SelectedCategory = Category::where('id', $request->input("category"))->first();
        $getParent = false;
        repeat:
        $rss = (new RSS())->with('images');

        $rss = $rss->when($request->input("title"), function ($query) use ($request) {
            return $query->where(function($query2) use($request) {
                return $query2->where("title", 'REGEXP', generate_pattern($request->input("title")))->orwhere("title", 'like', '%' . $request->input("title") . '%');
            });
        })
            ->when($date_from, function ($query) use ($request, $date_from) {
                return $query->where("created_at", ">=", Carbon::createFromFormat('Y/m/d', $date_from));;
            })
            ->when($date_to, function ($query) use ($request, $date_to) {
                return $query->where("created_at", "<=", Carbon::createFromFormat('Y/m/d', $date_to));
            })
            ->when($request->input("category"), function ($query) use ($request, $getParent) {
                if ($getParent) {
                    $categoryParent = Category::find($request->input("category"));
                    if (!empty($categoryParent->parent)) {
                        $categoryChildren = Category::find($categoryParent->parent->id);
                        $query->whereIn("category_id", $categoryChildren->children->pluck('id')->toArray());
                    } else
                        $query->whereIn("category_id", $categoryParent->children->pluck('id')->toArray());
                } else
                    $query->where("category_id", $request->input("category"));
            })
            ->when($request->input("year"), function ($query) use ($request) {
                $queryYear = 'YEAR(pubDate) = ?';
                return $query->whereRaw($queryYear, (int)$request->input('year'));
            })
            ->when($request->input("month"), function ($query) use ($request) {
                $queryMonth = 'MONTH(pubDate) = ?';
                return $query->whereRaw($queryMonth, (int)$request->input('month'));
            });
        $rss = $rss->where("status", 1)->orderBy('created_at', 'DESC')->paginate(10);
        //        dd($rss);
        if (count($request->all()) == 1 && $request->input("category") && count($rss) == 0 && !$getParent) {
            $getParent = true;
            goto repeat;
        }
        $last_news = Cache::remember('last_news', config('cache.cache_time_ttl'), function () {
            return RSS::with('images')->where("status", 1)->orderBy('created_at', 'DESC')->limit(7)->get();
        });
        return view('news-list', get_defined_vars());
    }

    public
    function newsDetails(Request $request, $id = null, $title = null)
    {
//        dd($id);
        $r = Cache::remember('rss' . $id, config('cache.cache_time_ttl'), function () use ($id) {
            return RSS::with('images')->where("status", 1)->find($id);
        });
        if ($r) {
            $imagesArr = Cache::remember('NewsMultipleImages' . $r->id, config('cache.cache_time_ttl'), function () use ($r) {
                return NewsMultipleImages::where('news_id', $r->id)->get();
            });
            $rss = Cache::remember('RSS' . $r->id . '_' . $r->category_id, config('cache.cache_time_ttl'), function () use ($r) {
                return RSS::with('images')->where('id', '!=', $r->id)
                    ->where('category_id', '=', $r->category_id)->where("status", 1)->orderBy('created_at', 'desc')
                    ->take(7)->get();
            });
            $last_news = Cache::remember('last_news', config('cache.cache_time_ttl'), function () {
                return RSS::with('images')->where("status", 1)->orderBy('created_at', 'DESC')->limit(7)->get();
            });
            return view('news-details', ['r' => $r, 'rss' => $rss, 'last_news' => $last_news, 'images' => $imagesArr ?? []]);
        } else
            return view('404');
    }


}
