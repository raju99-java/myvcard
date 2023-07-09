@php
    use App\Cms;
    $favicon=Cms::where('slug','=','favicon')->first();
    $title=Cms::where('slug','=','title')->first();
    $meta_title=Cms::where('slug','=','meta_title')->first();
    $meta_keyword=Cms::where('slug','=','meta_keyword')->first();
    $meta_description=Cms::where('slug','=','meta_description')->first();
    
    $og_title=Cms::where('slug','=','og_title')->first();
    $og_image=Cms::where('slug','=','og_image')->first();
    $og_description=Cms::where('slug','=','og_description')->first();
    @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script type="text/javascript">
            var full_path = '<?= url('/') . '/'; ?>';
            var logged_in = '<?= (Auth::guard('frontend')->guest()) ? true : false; ?>';
        </script>
        <meta charset="UTF-8">
        <title>{{strip_tags(isset($title->content_body) && $title->content_body!=''?$title->content_body:'Fast Card') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="title" content="{{isset($meta_title->content_body) && $meta_title->content_body!=''?$meta_title->content_body:'Fast Card'}}">
        <meta name="keywords" content="{{isset($meta_keyword->content_body) && $meta_keyword->content_body!=''?$meta_keyword->content_body:'Fast Card'}}">
        <meta name="description" content="{{isset($meta_description->content_body) && $meta_description->content_body!=''?$meta_description->content_body:'Fast Card'}}">
        <meta property="og:title" content="{{strip_tags(isset($og_title->content_body) && $og_title->content_body!=''?$og_title->content_body:'Fast Card')}}" />
        <meta property="og:image" content="{{isset($og_image->content_body) && $og_image->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures').'/'.strip_tags($og_image->content_body):URL::asset('favicon.png')}}" />
        <meta property="og:description" content="{{strip_tags(isset($og_description->content_body) && $og_description->content_body!=''?$og_description->content_body:'Fast Card')}}" />
        <!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#662D91">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#662D91">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#662D91">
        @php
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);
        @endphp
        
        <link href="{{ URL::asset('public/site/css/style.css') }}" rel="stylesheet" type="text/css" />
        <!--bootstrape css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!--***testimonial***-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
        <link href="{{ URL::asset('public/site/css/testimonialstyle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ URL::asset('public/frontend/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/jquery-confirm.min.css') }}" />
        <!--font-awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--font-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Domine:wght@700&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('favicon.png')}}">
      <style>
      
        /* ============ desktop view ============ */
@media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{ color: #fff;  }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}	
/* ============ desktop view .end// ============ */
        .scrollable-menu {
    height: auto;
    max-height: 170px;
    overflow-x: hidden;
}
      </style>
        @yield('css')
    </head>
    <body>

        @include('partials.site_header')
        @yield('content')
        <a id="back2Top" title="Back to top" href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        <a href="https://api.whatsapp.com/send?phone=+919337677493&amp;text=Hi I need some help" target="blank">
        <div class="ht-ctc-chat style-2 desktop ctc-analytics" style="position: fixed; bottom: 20px; left: 20px; cursor: pointer; z-index: 99999999;" data-return_type="chat" data-style="2" data-number="919090087051" data-pre_filled="Hi I need some help" data-is_ga_enable="no" data-is_fb_an_enable="no" data-webandapi="wa" data-detectdevice="screen" data-wpdevice="desktop">
                <img class="img-icon ctc-analytics" title="WhatsApp us" style="height: 50px;" src="{{ URL::asset('public/site/image/whatsapp-icon-square.svg') }}" alt="WhatsApp chat">            </div></a>
        @include('partials.site_footer')
        
      
      <div style="position:fixed;bottom:10px;left:8%;z-index:999999;" id="gtranslate_wrapper"><!-- GTranslate: https://gtranslate.io/ -->
            <style type="text/css">
                #goog-gt-tt {display:none !important;}
                .goog-te-banner-frame {display:none !important;}
                .goog-te-menu-value:hover {text-decoration:none !important;}
                .goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}
                body {top:0 !important;}
                #google_translate_element2 {display:none!important;}
            </style>

            <div id="google_translate_element2"></div>
            <script type="text/javascript">
                function googleTranslateElementInit2() {
                    new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element2');
                }
            </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


            <script type="text/javascript">
                function GTranslateGetCurrentLang() {
                    var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');
                    return keyValue ? keyValue[2].split('/')[2] : null;
                }
                function GTranslateFireEvent(element, event) {
                    try {
                        if (document.createEventObject) {
                            var evt = document.createEventObject();
                            element.fireEvent('on' + event, evt)
                        } else {
                            var evt = document.createEvent('HTMLEvents');
                            evt.initEvent(event, true, true);
                            element.dispatchEvent(evt)
                        }
                    } catch (e) {
                    }
                }
                function doGTranslate(lang_pair) {
                    if (lang_pair.value)
                        lang_pair = lang_pair.value;
                    if (lang_pair == '')
                        return;
                    var lang = lang_pair.split('|')[1];
                    if (GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])
                        return;
                    var teCombo;
                    var sel = document.getElementsByTagName('select');
                    for (var i = 0; i < sel.length; i++)
                        if (/goog-te-combo/.test(sel[i].className)) {
                            teCombo = sel[i];
                            break;
                        }
                    if (document.getElementById('google_translate_element2') == null || document.getElementById('google_translate_element2').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                        setTimeout(function () {
                            doGTranslate(lang_pair)
                        }, 500)
                    } else {
                        teCombo.value = lang;
                        GTranslateFireEvent(teCombo, 'change');
                        GTranslateFireEvent(teCombo, 'change')
                    }
                }
            </script>
        </div>
      
      
      
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--***testimonial***-->
        <script src="{{ URL::asset('public/frontend/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
        
    
        <script>
        
    /*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
</script>
        <script>
            $(document).ready(function () {
                $("#testimonial-slider").owlCarousel({
                    items: 1,
                    itemsDesktop: [1000, 1],
                    itemsDesktopSmall: [979, 1],
                    itemsTablet: [768, 1],
                    pagination: true,
                    navigation: false,
                    navigationText: ["", ""],
                    slideSpeed: 1000,
                    singleItem: true,
                    transitionStyle: "fade",
                    autoPlay: true
                });
            });
        </script>
        <script>
  var owl = $('.owl-carousels');
    owl.owlCarousel({
    items:4,
    loop:true,
    slideSpeed: 500,
    transitionStyle: "fade",
    autoPlay: true
    });
    $('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
    })
</script>
<script>
  var owl = $('.feature');
    owl.owlCarousel({
    items:4,
    loop:true,
    slideSpeed: 500,
    transitionStyle: "fade",
    autoPlay: true
    });
    $('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
    })
</script>
<!--nav-->
<script>
  $('[data-toggle="slide-collapse"]').on('click', function() {
$navMenuCont = $($(this).data('target'));
$navMenuCont.animate({
'width': 'toggle'
}, 350);
$(".menu-overlay").fadeIn(500);

});
$(".menu-overlay").click(function(event) {
$(".navbar-toggle").trigger("click");
$(".menu-overlay").fadeOut(500);
});
</script>

<script>

function closeNav() {
    $(".navbar-toggler-icon").trigger("click");
    $(".menu-overlay").fadeOut(500);
}
</script>
<script>
    $(document).ready(function() {
 function ajaxindicatorstart() {
    if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
        jQuery('body').append('<div id="resultLoading" style="display:none"><div><i style="font-size: 46px;color: #B40B2B;" class="fa fa-spinner fa-spin fa-2x fa-fw" aria-hidden="true"></i></div><div class="bg"></div></div>');
    }
    jQuery('#resultLoading').css({
        'width': '100%',
        'height': '100%',
        'position': 'fixed',
        'z-index': '10000000',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto'
    });
    jQuery('#resultLoading .bg').css({
        'background': '#ffffff',
        'opacity': '0.8',
        'width': '100%',
        'height': '100%',
        'position': 'absolute',
        'top': '0'
    });
    jQuery('#resultLoading>div:first').css({
        'width': '250px',
        'height': '75px',
        'text-align': 'center',
        'position': 'fixed',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto',
        'font-size': '16px',
        'z-index': '10',
        'color': '#ffffff'
    });
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop() {
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}
    
    ajaxindicatorstart();
    
    ajaxindicatorstop();
});
</script>
@yield('js')
    </body>
</html>