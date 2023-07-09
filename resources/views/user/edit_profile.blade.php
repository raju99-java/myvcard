@extends('layouts.main')
@section('css')
<style>
    .help-block{
        color:red;
    }
</style>
@stop
@section('content')
<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 tab_dsh_1">
            </div>
            <div class="col-md-10 col-sm-9 tab_dsh_2">
                <div class="dash-right-sec">
                    <h2 class="dash-title">My Profile</h2>
                    <form method="post" class="form" action="{{route('post-myprofile')}}" id="customer-editprofile-form" enctype="multipart/form-data">
                        @csrf
                        <div class="prof-img" style="text-align: center;padding-bottom: 13px;">

                            <img id="blah" src="{{($model->image!='')? URL::asset('public/uploads/frontend/profile_picture/preview').'/'.$model->image:URL::asset('public/images/user/form-user.png') }}" alt="your image" height="70px" width="70px" />
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Name*</label>
                                    <input class="form-control" name="name" type="text" value="{{$model->name}}">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Image</label>
                                    <input class="form-control" name="image" type="file" onchange="readURL(this);" accept="image/png, image/jpeg, image/jpg">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Email*</label>
                                    <input class="form-control" name="email" type="email"  value="{{$model->email}}">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Phone</label>
                                    <input class="form-control" name="phone" type="text"  value="{{$model->phone}}">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Country Code</label>
                        <select name="countryCode" id="">
                                        <option data-countryCode="IN" value="+91" {{ ('+91' == $model->countryCode) ? 'selected' : '' }}>India (+91)</option>
                                        <option data-countryCode="US" value="+1"  {{ ('+1' == $model->countryCode) ? 'selected' : '' }}>US (+1)</option>
                                        <option data-countryCode="UK" value="+44" {{ ('+44' == $model->countryCode) ? 'selected' : '' }}>UK (+44)</option>
                                        <optgroup label="Other countries">
                                            
                                            <option data-countryCode="AU" value="+61" {{ ('+61' == $model->countryCode) ? 'selected' : '' }}>Australia (+61)</option>
                                            <option data-countryCode="AT" value="+43" {{ ('+43' == $model->countryCode) ? 'selected' : '' }}>Austria (+43)</option>
                                            
                                            <option data-countryCode="BD" value="+880" {{ ('+880' == $model->countryCode) ? 'selected' : '' }}>Bangladesh (+880)</option>
                                            
                                            <option data-countryCode="BM" value="+1441" {{ ('+1441' == $model->countryCode) ? 'selected' : '' }}>Bermuda (+1441)</option>
                                            <option data-countryCode="BT" value="+975" {{ ('+975' == $model->countryCode) ? 'selected' : '' }}>Bhutan (+975)</option>
                                            
                                            <option data-countryCode="BR" value="+55" {{ ('+55' == $model->countryCode) ? 'selected' : '' }}>Brazil (+55)</option>
                                           
                                            
                                            <option data-countryCode="CN" value="+86" {{ ('+86' == $model->countryCode) ? 'selected' : '' }}>China (+86)</option>
                                            
                                            <option data-countryCode="EG" value="+20" {{ ('+20' == $model->countryCode) ? 'selected' : '' }}>Egypt (+20)</option>
                                            
                                            <option data-countryCode="EE" value="+372" {{ ('+372' == $model->countryCode) ? 'selected' : '' }}>Estonia (+372)</option>
                                            
                                            <option data-countryCode="FR" value="+33" {{ ('+33' == $model->countryCode) ? 'selected' : '' }}>France (+33)</option>
                                            
                                            <option data-countryCode="DE" value="+49" {{ ('+49' == $model->countryCode) ? 'selected' : '' }}>Germany (+49)</option>
                                            
                                            
                                            <option data-countryCode="HK" value="+852" {{ ('+852' == $model->countryCode) ? 'selected' : '' }}>Hong Kong (+852)</option>
                                            
                                            
                                            
                                            <option data-countryCode="ID" value="+62" {{ ('+62' == $model->countryCode) ? 'selected' : '' }}>Indonesia (+62)</option>
                                            <option data-countryCode="IR" value="+98" {{ ('+98' == $model->countryCode) ? 'selected' : '' }}>Iran (+98)</option>
                                            <option data-countryCode="IQ" value="+964" {{ ('+964' == $model->countryCode) ? 'selected' : '' }}>Iraq (+964)</option>
                                            <option data-countryCode="IE" value="+353" {{ ('+353' == $model->countryCode) ? 'selected' : '' }}>Ireland (+353)</option>
                                            <option data-countryCode="IL" value="+972" {{ ('+972' == $model->countryCode) ? 'selected' : '' }}>Israel (+972)</option>
                                            <option data-countryCode="IT" value="+39" {{ ('+39' == $model->countryCode) ? 'selected' : '' }}>Italy (+39)</option>
                                            
                                            <option data-countryCode="KP" value="+850" {{ ('+850' == $model->countryCode) ? 'selected' : '' }}>Korea North (+850)</option>
                                            <option data-countryCode="KR" value="+82" {{ ('+82' == $model->countryCode) ? 'selected' : '' }}>Korea South (+82)</option>
                                            
                                            
                                            <option data-countryCode="MY" value="+60" {{ ('+60' == $model->countryCode) ? 'selected' : '' }}>Malaysia (+60)</option>
                                            <option data-countryCode="MV" value="+960" {{ ('+960' == $model->countryCode) ? 'selected' : '' }}>Maldives (+960)</option>
                                            
                                            <option data-countryCode="MN" value="+95" {{ ('+95' == $model->countryCode) ? 'selected' : '' }}>Myanmar (+95)</option>
                                            
                                            <option data-countryCode="NP" value="+977" {{ ('+977' == $model->countryCode) ? 'selected' : '' }}>Nepal (+977)</option>
                                            <option data-countryCode="NL" value="+31" {{ ('+31' == $model->countryCode) ? 'selected' : '' }}>Netherlands (+31)</option>
                                            
                                            <option data-countryCode="NZ" value="+64" {{ ('+64' == $model->countryCode) ? 'selected' : '' }}>New Zealand (+64)</option>
                                            
                                            <option data-countryCode="PK" value="+92" {{ ('+92' == $model->countryCode) ? 'selected' : '' }}>Pakistan (+92)</option>
                                            
                                            <option data-countryCode="SA" value="+966" {{ ('+966' == $model->countryCode) ? 'selected' : '' }}>Saudi Arabia (+966)</option>
                                            
                                            <option data-countryCode="SG" value="+65" {{ ('+65' == $model->countryCode) ? 'selected' : '' }}>Singapore (+65)</option>
                                            
                                            <option data-countryCode="ZA" value="+27" {{ ('+27' == $model->countryCode) ? 'selected' : '' }}>South Africa (+27)</option>
                                            <option data-countryCode="ES" value="+34" {{ ('+34' == $model->countryCode) ? 'selected' : '' }}>Spain (+34)</option>
                                            <option data-countryCode="LK" value="+94" {{ ('+94' == $model->countryCode) ? 'selected' : '' }}>Sri Lanka (+94)</option>
                                            
                                            
                                            <option data-countryCode="TH" value="+66" {{ ('+66' == $model->countryCode) ? 'selected' : '' }}>Thailand (+66)</option>
                                            
                                            <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                            <option data-countryCode="UZ" value="+7" {{ ('+7' == $model->countryCode) ? 'selected' : '' }}>Uzbekistan (+7)</option>
                                            
                                            <option data-countryCode="ZW" value="+263" {{ ('+263' == $model->countryCode) ? 'selected' : '' }}>Zimbabwe (+263)</option>
                                        </optgroup>
                                    </select>
                        </div>
                        </div>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <div class="frm-btn text-center"><button class="btn login-form__btn submit " type="submit">Submit</button></div>
                        </div>
                    </form>
                    <!--Password form start -->
                    <h2 class="dash-title">Change Password</h2>
                    <form method="post" class="form" action="{{route('post-reset-password')}}" id="reset-password-frm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Old Password*</label>
                                    <input class="form-control" name="old_password" type="password">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">New Password*</label>
                                    <input class="form-control" name="password" type="password">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Confirm Password*</label>
                                    <input class="form-control" name="retype_password" type="password">
                                    <span class="help-block"></span> 
                                </div>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="frm-btn text-center"><button class="btn login-form__btn submit" type="submit">Submit</button></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@stop
@section('js')
<script>
    $(document).ready(function () {

    });
</script>
@endsection
