<?php

namespace App\traits;

use DOMDocument;
use DOMXPath;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

trait RSSTrait
{

    public $section;

    public
    function getDescription($desc, $v = null)
    {
        if ($this->section == "sana") {
            return $this->getDescriptionSana($v);
        } elseif ($this->section == "filfan")
            return $this->getDescriptionFilfan($v);
        elseif ($this->section == "news_alarab")
            return $this->getDescriptionNewsAlarab($v);
        elseif ($this->section == "menafn")
            return $this->getDescriptionMenafn($v);
        elseif ($this->section == "wam")
            return $this->getDescriptionWam($v);
        elseif ($this->section == "aljazeera")
            return $this->getDescriptionAljazeera($v);
        elseif ($this->section == "bbci")
            return $this->getDescriptionBbci($v);
        elseif ($this->section == "bna")
            return $this->getDescriptionBna($v);
        elseif ($this->section == "saba")
            return $this->getDescriptionSaba($v);
        else
            return strip_tags($desc);
    }

    private
    function getDescriptionSana($v)
    {
        //.entry
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', $v->link);
        return $crawler->filter('.entry')->text() ?? "";
    }

    private
    function getDescriptionFilfan($v)
    {
        //#details_content
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', $v->link);
        return $crawler->filter('#details_content')->text() ?? "";
    }

    private
    function getDescriptionNewsAlarab($v)
    {
        //.news_text>p
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', $v->link);
        return $crawler->filter('.news_text>p')->text() ?? "";
    }

    private
    function getDescriptionMenafn($v)
    {
        //#details_content
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', $v->link);
        return $crawler->filter('#ContentPlaceHolder1_div_story')->text();
    }

    public
    function uploadImage($image)
    {
        return $image;
    }

    public
    function getImage($v)
    {
        $url = "";
        if ($this->section == "sana")
            $url = $this->getImageSana($v);
        elseif ($this->section == "filfan")
            $url = $this->getImageFilfan($v);
        elseif ($this->section == "news_alarab")
            $url = $this->getImageNewsAlarab($v);
        elseif ($this->section == "cairo24")
            $url = $this->getImageCairo24($v);
        elseif ($this->section == "menafn")
            $url = $this->getImageMenafn($v);
        elseif ($this->section == "bbci")
            $url = $this->getImageBbci($v);
        elseif ($this->section == "aljazeera")
            $url = $this->getImageAljazeera($v);
        elseif ($this->section == "qna")
            $url = $this->getImageQna($v);
        elseif ($this->section == "bna")
            $url = $this->getImageBna($v);
        elseif ($this->section == "saba")
            $url = $this->getImageSaba($v);
        elseif ($this->section == "nna-leb")
            $url = $this->getImageNnaLeb($v);
        elseif ($this->section == "wam")
            $url = $this->getImageWam($v);
        elseif ($this->section == "feeds")
            $url = $this->getImageFeeds($v);
        elseif ($this->section == "cnn")
            $url = $this->getImageCnn($v);

        if (!empty($url))
            return resizeImage(uploadFileS3($url, "rss/"), 315, 280, 'crop-center');
        else
            return null;
        //
    }

    private
    function getImageSana($v)
    {
        return null;
    }

    private
    function getImageFilfan($v)
    {
        $doc = new DOMDocument();
        $doc->loadHTML($v->description);
        $xpath = new DOMXPath($doc);
        return $xpath->evaluate("string(//img/@src)") ?? "";
    }

    private
    function getImageNewsAlarab($v)
    {
        return (string)$v->enclosure['url'];
    }

    private
    function getImageCairo24($v)
    {
        return (string)$v->enclosure['url'];
    }

    private
    function getImageMenafn($v)
    {
        return 'https://menafn.com/updates/pr/' . (string)$v->children('media', true)->content->attributes()->url;
    }

    private
    function getImageAljazeera($v)
    {
        //#details_content
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', $v->link);
        return $crawler->filter('.responsive-image img')->eq(0)->count()>0?$crawler->filter('.responsive-image img')->eq(0)->attr('src'):"";
    }

    private
    function getDescriptionWam($v)
    {
        //#details_content
        $client = new Client(HttpClient::create(['timeout' => null]));
        $crawler = $client->request('GET', (string)$v->id);
        return $crawler->filter('.description')->text();
    }
}
