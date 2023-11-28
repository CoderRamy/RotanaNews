<form action="{{route('frontend.vodList')}}" method="get">
    <div class="form-row">
        <div class="form-group col-md-10 col-xs-10">
            <input name="name" style="width: 100%;height: 42px" placeholder="{{__("Search")}}" value="{{request()->name}}">
        </div>

        <div class="form-group col-md-2 btn-00">
            <button type="submit" class="btn btn-success" style="height: 42px;width: 100%">{{__("Search")}}</button>
        </div>

    </div>


</form>
