<div class="filter ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-0">
                <form method="get" class="search-form" action="{{ route('frontend.newsList') }}" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-sm-6 my-1">
                            <input style="width: 100%; height: 35px;" class="input--style-4" type="text" name="title"
                                placeholder="{{ __('News subject') }}" value="{{ old('title') ?? request()->title }}">
                        </div>
                        <div class="form-group col-lg-3 my-1">
                            <div class="input-group-icon" >
                                <select style="width: 100%; height: 35px;" class="btn btn-secondary input--style-4" name="category">
                                    @foreach (App\Models\Category::whereNull('parent_id')->get() as $g)
                                        <option class="dropdown-item"
                                            @if (request()->category == $g->id) {{ 'selected' }} @endif
                                            value="{{ $g->id }}">
                                            {{ $g->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
{{--                        <div class="form-group col-lg-2 my-1">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-icon">--}}
{{--                                    <input style="width: 100%; height: 35px;" class="input--style-4" type="text"--}}
{{--                                           onfocus="(this.type='date')" name="date_from" id="date_from"--}}
{{--                                           placeholder="{{ __('Date From') }} &#128197"--}}
{{--                                           value="{{ request()->date_from ? request()->date_from : '' }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-lg-2 my-1">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-icon" >--}}
{{--                                    <input style="width: 100%; height: 35px;" class="input--style-4" type="text" name="date_to"--}}
{{--                                           onfocus="(this.type='date')" id="date_to"--}}
{{--                                           placeholder="{{ __('Date To') }} &#128197"--}}
{{--                                           value="{{ request()->date_to ? request()->date_to : '' }}">--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group col-sm-3 my-1 btn-00">
                            <button style="width: 100%; height: 35px;" type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </div>

                    </div>

                </form>




            </div>
        </div>
    </div>
</div>
@push('style')
<style>
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
@endpush
