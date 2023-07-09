@php
    use App\Cms;
    $favicon=Cms::where('slug','=','favicon')->first();
    $title=Cms::where('slug','=','title')->first();
    $meta_title=Cms::where('slug','=','meta_title')->first();
    $meta_keyword=Cms::where('slug','=','meta_keyword')->first();
    $meta_description=Cms::where('slug','=','meta_description')->first();
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
        @php
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);
        @endphp
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap" rel="stylesheet">
        <link href="{{ URL::asset('public/plugins/chartist/css/chartist.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css') }}" />
        <link href="{{ URL::asset('public/frontend/css/icofont.min.css') }}" rel="stylesheet" type="text/css" />       
        <link href="{{ URL::asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />       
        <link href="{{ URL::asset('public/css/style.css') }}" rel="stylesheet" type="text/css" />
        <!--        <link href="{{ URL::asset('public/frontend/css/custom.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ URL::asset('public/frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />-->
        <link href="{{ URL::asset('public/frontend/css/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ URL::asset('public/frontend/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ URL::asset('public/frontend/css/jquery-confirm.min.css') }}" />
        <link href="{{ URL::asset('public/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link rel="shortcut icon" href="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('favicon.png')}}">
        @yield('css')
    </head>
    <body>
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <div id="main-wrapper">
            @include('partials.header')
            @include('partials.left')
            @yield('content')
            <a id="back2Bottom" title="Back to Bottom" href="#">&#10148;</a>
            <a id="back2Top" title="Back to top" href="#">&#10148;</a>
            <script src="{{ URL::asset('public/plugins/common/common.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/js/custom.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/js/settings.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/js/gleek.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/circle-progress/circle-progress.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/d3v3/index.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/topojson/topojson.min.js') }}" type="text/javascript"></script>
            <!--<script src="{{ URL::asset('public/datamaps/datamaps.world.min.js') }}" type="text/javascript"></script>-->
            <script src="{{ URL::asset('public/plugins/raphael/raphael.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/pg-calendar/js/pignose.calendar.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/backend/assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/plugins/chartist/js/chartist.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public//plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/frontend/js/datatables.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
            <script src="{{ URL::asset('public/frontend/custom/js/script.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('public/frontend/js/bootstrap.min.js') }}" type="text/javascript"></script>
            @yield('js')
            <script>
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll >= 100)
                    $(".header-section").addClass("affix");
                else
                    $(".header-section").removeClass("affix");
            });
            </script>
            @if(Session::has('success'))
            <input type="hidden" id="success_msg" value="{{ Session::get('success') }}"/>
            <script>
                var success_msg = $('#success_msg').val();
                $.iaoAlert({
                    type: "success",
                    position: "top-right",
                    mode: "dark",
                    msg: success_msg,
                    autoHide: true,
                    alertTime: "3000",
                    fadeTime: "1000",
                    closeButton: true,
                    fadeOnHover: true,
                });
            </script>
            @endif
            @if(Session::has('error'))
            <input type="hidden" id="error_msg" value="{{ Session::get('error') }}"/>
            <script>
                var error_msg = $('#error_msg').val();
                $.iaoAlert({
                    type: "error",
                    position: "top-right",
                    mode: "dark",
                    msg: error_msg,
                    autoHide: true,
                    alertTime: "3000",
                    fadeTime: "1000",
                    closeButton: true,
                    fadeOnHover: true,
                });
            </script>
            @endif
            <!--back to top-->
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
    /*Scroll to top when arrow Down clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height >= 0) {
        $('#back2Bottom').fadeIn();
    } else {
        $('#back2Bottom').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Bottom").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 20000}, "slow");
        return false;
    });

});
 /*Scroll to bottom when arrow Down clicked END*/
</script>

        </div>
         
    </body>
</html>