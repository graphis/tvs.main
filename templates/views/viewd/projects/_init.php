<?php
$this->styles()
    ->add('/assets/vendor/photoswipe/xphotoswipe.css');
$this->scriptsFoot()
    ->add('/assets/vendor/photoswipe/xphotoswipe.js');

$this->title()->append(str_replace("-"," ",$project) . " | ");
$path = $_SERVER["DOCUMENT_ROOT"] . '/img/projects/' . $project . '/screens';
$dir = new DirectoryIterator($path);

$pattern = "
{
    src: '/img/projects/%s/screens/%s',
    w: %s,
    h: %s
},
";

$items = '';

foreach($dir as $file) {

    if(
        $file->isFile() &&
        preg_match("/(\.gif|\.png|\.jpe?g)$/", $file->getFilename())
    ) {
        list($w, $h) = getimagesize($file->getPathname());
        $items .= sprintf(
            $pattern,
            $project,
            $file->getFilename(),
            $w,
            $h
        );
    }
}

$this->scriptsFoot()->beginInternal(
    1000
);
echo "
    var openPhotoSwipe = function() {
        var pswpElement = document.querySelectorAll('.pswp')[0];
        var items = [
            $items
        ];
        var gallery = new PhotoSwipe(
            pswpElement,
            PhotoSwipeUI_Default,
            items
        );
        gallery.init();
    };
    document.getElementById('gallery').onclick = openPhotoSwipe;

    // parse gallery index from URL
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};
        if(hash.length < 5) {
            return params;
        }
        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');
            if(pair.length < 2) {
                continue;
            }
            params[pair[0]] = pair[1];
        }
        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }
        return params;
    };
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  gallery[ hashData.gid - 1 ], true, true );
    }
";
$this->scriptsFoot()->endInternal();
?>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
