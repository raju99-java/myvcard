@extends('layouts.site_main')
@section('css')

<style>
    .help-block{
        color:red;
    }
    .btn1 {
    padding: 7px 15px;
    /* border-radius: 30px; */
    color: #ffffff;
    font-size: 14px;
    /* font-weight: 600; */
    display: inline-block;
    background: #662D91;
    border: 3px solid #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}
</style>
@stop
@section('content')
 <div class="breadcrumbb">  
  <div class="container-fluid">
    <h2 class="breadcrumb-text">FRANCHISE</h2>
  </div>
</div>
 <!--About-->
 <section class="Contact">
  <div class="container">
    <h2 class="contact-text">To work with us please contact us</h2>
    <div class="row">
    <div class="col-sm-2"></div>
      <div class="col-sm-8">
       <form class="mb-3 login-input" id="contact-form" action="{{ Route('franchise-admin') }}" method="POST">
                    @csrf
                    <div>
                        
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                            @if ($errors->has('name'))
                                <span class="help-block"> {{ $errors->first('name') }} </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                            @if ($errors->has('email'))
                                <span class="help-block"> {{ $errors->first('email') }} </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="company" placeholder="Enter Business Name">
                            @if ($errors->has('company'))
                                <span class="help-block"> {{ $errors->first('company') }} </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"   placeholder="Your Phone">
                            @if ($errors->has('phone'))
                                <span class="help-block"> {{ $errors->first('phone') }} </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" rows="3" cols="5" placeholder="Message"></textarea>
                            @if ($errors->has('message'))
                                <span class="help-block"> {{ $errors->first('message') }} </span>
                            @endif
                        </div>
                        <button type="submit" class="btn1" id="btnSubmitc">
                            Send Message
                        </button>
                    </div>
                </form>
      </div>
    <div class="col-sm-2"></div>  
    </div>
  </div>
</section> 
@stop
@section('js')

        
        <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
        
        @if(Session::has('success'))
        <input type="hidden" id="success_msg" value="{{ Session::get('success') }}"/>
        <script>
var success_msg = $('#success_msg').val();
alert(success_msg);
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
            jQuery.iaoAlert({
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
@stop  
