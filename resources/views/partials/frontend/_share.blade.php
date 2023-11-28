<li class="share share-inntr">
    <span><i class="ri-share-fill"></i></span>
    <div class="share-box">
        <div class="d-flex align-items-center">
{{--            <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>--}}
            <a rel="nofollow" href="#" onclick="return fbs_click('http://www.facebook.com/share.php?u=')" target="_blank" class="share-ico"><i class="ri-facebook-fill"></i></a>
            <a rel="nofollow" href="#" onclick="return fbs_click('https://twitter.com/intent/tweet?text=')" target="_blank" class="share-ico"><i class="ri-twitter-fill"></i></a>
            <a rel="nofollow" href="#"  onclick="return fbs_click('https://www.instagram.com/?url=')" target="_blank" class="share-ico"><i class="ri-instagram-fill"></i></a>
        </div>
    </div>
</li>

{{--                                    <li><span><i class="ri-heart-fill"></i></span></li>--}}
{{--                                    <li><span><i class="ri-add-line"></i></span></li>--}}

<script>
    function fbs_click(er) {
        console.log(er)
        u=location.href;
        t=document.title;
        window.open(er+encodeURIComponent(u)+'&t='+encodeURIComponent(t),
            'sharer','toolbar=0,status=0,width=626,height=436');
        return false;
    }
</script>
