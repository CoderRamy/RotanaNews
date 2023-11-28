@if(env('ads',true))
    <div class="banner-rotana">
        @if($id <= 4)
            <div id="{{$id}}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div id='div-gpt-ad-1684836872223-{{$id}}'>
                        <script>
                            googletag.cmd.push(function () {
                                googletag.display('div-gpt-ad-1684836872223-{{$id}}');
                            });
                        </script>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif
