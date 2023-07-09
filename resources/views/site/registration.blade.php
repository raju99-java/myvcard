<?php  ?>
<!DOCTYPE html>
<html lang="en">
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
        <title>{{strip_tags(isset($title->content_body) && $title->content_body!=''?$title->content_body.'-Sign Up':'Fast Card-Sign Up') }}</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="title" content="{{isset($meta_title->content_body) && $meta_title->content_body!=''?$meta_title->content_body:'Fast Card'}}">
        <meta name="keywords" content="{{isset($meta_keyword->content_body) && $meta_keyword->content_body!=''?$meta_keyword->content_body:'Fast Card'}}">
        <meta name="description" content="{{isset($meta_description->content_body) && $meta_description->content_body!=''?$meta_description->content_body:'Fast Card'}}">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{$favicon->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$favicon->content_body):URL::asset('favicon.png')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/css/style.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .help-block{
                color:red;
            }
           label{
  display:block;
}

input[type=file], select, textarea{
  width: 100%;
    height: auto;
    border-left: none;
    border-right: none;
    border-top: none;
    font-size: 16px;
    text-align: left;
    padding: 0px 10px;
    color: #7A88A1;
    border-bottom: 2px solid #f5f5f5;
}

        </style>

    </head>

    <body>

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





        <div class="login-form-bg">
            <div class="container h-auto">
                <div class="logo">
                    <a href="{{route('/')}}">
                <img src="{{$logo->content_body!=''?URL::asset('public/uploads/frontend/cms/pictures/'.$logo->content_body):URL::asset('public/images/logo-text.png')}}" alt="logo"></a>
            </div>
                <div class="row justify-content-center h-auto">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                    <a class="text-center" href="#"> <h4>New Account Registration</h4></a>
                                    <form class="mb-3 login-input" id="signup-form" action="{{ Route('signup') }}" method="POST">
                                        @csrf
                                         <!--avater-->
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="" class="picture-src" id="wizardPicturePreview" title="">
                                        <input type="file" id="wizard-picture"  accept="image/*" name="image" / class="">
                                    </div>
                                     <h6 class="Click">Click here to upload photo</h6>
                                </div>
                                <!--end-avater-->
                                        <p>Select your country code</p>
                                    <!-- country codes (ISO 3166) and Dial codes. -->
                                    <select name="countryCode" id="">
                                        <option data-countryCode="IN" value="+91" Selected>India (+91)</option>
                                        <option data-countryCode="US" value="+1" >US (+1)</option>
                                        <option data-countryCode="UK" value="+44">UK (+44)</option>
                                        <optgroup label="Other countries">
                                            
                                            <option data-countryCode="AU" value="+61">Australia (+61)</option>
                                            <option data-countryCode="AT" value="+43">Austria (+43)</option>
                                            
                                            <option data-countryCode="BD" value="+880">Bangladesh (+880)</option>
                                            
                                            <option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
                                            <option data-countryCode="BT" value="+975">Bhutan (+975)</option>
                                            
                                            <option data-countryCode="BR" value="+55">Brazil (+55)</option>
                                            
                                            <option data-countryCode="CA" value="+1">Canada (+1)</option>
                                            
                                            <option data-countryCode="CN" value="+86">China (+86)</option>
                                            
                                            <option data-countryCode="EG" value="+20">Egypt (+20)</option>
                                            
                                            <option data-countryCode="EE" value="+372">Estonia (+372)</option>
                                            
                                            <option data-countryCode="FR" value="+33">France (+33)</option>
                                            
                                            <option data-countryCode="DE" value="+49">Germany (+49)</option>
                                            <option data-countryCode="GH" value="+233">Ghana (+233)</option>
                                            
                                            <option data-countryCode="GR" value="+30">Greece (+30)</option>
                                            
                                            <option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
                                            
                                            <option data-countryCode="IS" value="+354">Iceland (+354)</option>
                                            
                                            <option data-countryCode="ID" value="+62">Indonesia (+62)</option>
                                            <option data-countryCode="IR" value="+98">Iran (+98)</option>
                                            <option data-countryCode="IQ" value="+964">Iraq (+964)</option>
                                            <option data-countryCode="IE" value="+353">Ireland (+353)</option>
                                            <option data-countryCode="IL" value="+972">Israel (+972)</option>
                                            <option data-countryCode="IT" value="+39">Italy (+39)</option>
                                            
                                            <option data-countryCode="KP" value="+850">Korea North (+850)</option>
                                            <option data-countryCode="KR" value="+82">Korea South (+82)</option>
                                            
                                            
                                            <option data-countryCode="MY" value="+60">Malaysia (+60)</option>
                                            <option data-countryCode="MV" value="+960">Maldives (+960)</option>
                                            
                                            <option data-countryCode="MN" value="+95">Myanmar (+95)</option>
                                            
                                            <option data-countryCode="NP" value="+977">Nepal (+977)</option>
                                            <option data-countryCode="NL" value="+31">Netherlands (+31)</option>
                                            
                                            <option data-countryCode="NZ" value="+64">New Zealand (+64)</option>
                                            
                                            <option data-countryCode="PK" value="+92">Pakistan (+92)</option>
                                            
                                            <option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
                                            
                                            <option data-countryCode="SG" value="+65">Singapore (+65)</option>
                                            
                                            <option data-countryCode="ZA" value="+27">South Africa (+27)</option>
                                            <option data-countryCode="ES" value="+34">Spain (+34)</option>
                                            <option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
                                            
                                            <option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
                                            <option data-countryCode="TH" value="+66">Thailand (+66)</option>
                                            
                                            <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                            <option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
                                            
                                            <option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
                                        </optgroup>
                                    </select>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name">
                                            <div class="help-block" id="error-name"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="User Name" name="user_name">
                                            <div class="help-block" id="error-user_name"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                            <div class="help-block" id="error-email"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" placeholder="Phone number" name="phone">
                                            <div class="help-block" id="error-phone"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <div class="help-block" id="error-password"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
                                            <div class="help-block" id="error-confirm_password"></div>
                                        </div>
                                        <button class="btn login-form__btn submit w-100">Submit</button>
                                    </form>
                                    
                                  
                                  <!-- basic modal -->
                                  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <!--<h4 class="modal-title" id="myModalLabel">Basic Modal</h4>-->
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <h3>Please open your email and click on the activation link</h3>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                    <div class="form-footer">
                                        <p>Already have an account? <a href="{{ Route('login') }}"> Login Here</a></p>
                                    </div>
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
    <script>
$(document).ready(function () {


    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });
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
        <script>
        $(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
    </script>
</body>
</html>





