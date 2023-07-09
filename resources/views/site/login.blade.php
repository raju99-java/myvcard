<?php
set_time_limit(0);
?>
<!DOCTYPE html>
<html class="h-100" lang="en">
   @php
    use App\Cms;
    $favicon=Cms::where('slug','=','favicon')->first();
    $logo=Cms::where('slug','=','logo')->first();
    $title=Cms::where('slug','=','title')->first();
    $meta_title=Cms::where('slug','=','meta_title')->first();
    $meta_keyword=Cms::where('slug','=','meta_keyword')->first();
    $meta_description=Cms::where('slug','=','meta_description')->first();
    @endphp
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{strip_tags(isset($title->content_body) && $title->content_body!=''?$title->content_body.'-Login':'Fast Card-Login') }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="title" content="{{isset($meta_title->content_body) && $meta_title->content_body!=''?$meta_title->content_body:'Fast Card'}}">
        <meta name="keywords" content="{{isset($meta_keyword->content_body) && $meta_keyword->content_body!=''?$meta_keyword->content_body:'Fast Card'}}">
        <meta name="description" content="{{isset($meta_description->content_body) && $meta_description->content_body!=''?$meta_description->content_body:'Fast Card'}}">
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('favicon.png')}}">
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/css/style.css') }}" rel="stylesheet" type="text/css" />
        <style>
    .help-block{
        color:red;
    }
</style>

    </head>

    <body class="h-100">

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->





        <div class="login-form-bg h-100">
            <div class="container h-auto">
                <div class="logo">
                    <a href="{{route('/')}}">
                <img src="{{$logo->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$logo->content_body):URL::asset('public/images/logo-text.png')}}" alt="logo"></a>
            </div>
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                    <a class="text-center" href="#"> <h4>Login To Your Account</h4></a>
                                    <form class="mt-5 mb-5 login-input" id="login-form" action="{{ Route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                            <div class="help-block" id="error-email"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <div class="help-block" id="error-password"></div>
                                        </div>
                                        <button class="btn login-form__btn submit w-100">Login</button>
                                    </form>
                                    <div class="form-footer">
                                        <a href="{{ Route('forgot-password') }}">Forgot Your Password?</a>
                                        <p>Don't have account? <a href="{{ Route('signup') }}">Create New Account</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--**********************************
            Scripts
        ***********************************-->
        <script src="{{ URL::asset('public/plugins/common/common.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/js/custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/js/settings.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/js/gleek.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/chart.js/Chart.bundle.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/circle-progress/circle-progress.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/d3v3/index.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/topojson/topojson.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/datamaps/datamaps.world.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/raphael/raphael.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/pg-calendar/js/pignose.calendar.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/plugins/chartist/js/chartist.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public//plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/custom/js/script.js') }}" type="text/javascript"></script>
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
    </body>
</html>





