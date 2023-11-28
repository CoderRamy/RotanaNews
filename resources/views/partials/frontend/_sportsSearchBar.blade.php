<section class="filter">
    <div class="container-fluid  ">
        <div class="row">
            <div class="col-lg-12">
                <form method="get" class="search-form" action="{{ route('frontend.sport-news') }}" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input class="input--style-4 " type="text" name="title"
                                placeholder="{{ __('News subject') }}" value="{{ old('title') ?? request()->title }}">
                        </div>

                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-icon" style="width: 100%;">
                                    <input class="input--style-4 js-datepicker" type="text" name="date_from"
                                        placeholder="{{ __('Date From') }}"
                                        value="{{ request()->date_from ? request()->date_from : '' }}">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-icon" style="width: 100%;">
                                    <input class="input--style-4 js-datepicker2" type="text" name="date_to"
                                        placeholder="{{ __('Date To') }}"
                                        value="{{ request()->date_to ? request()->date_to : '' }}">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar2"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2 btn-00">
                            <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
