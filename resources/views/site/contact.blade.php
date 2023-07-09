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
    <h2 class="breadcrumb-text">CONTACT US</h2>
  </div>
</div>
 <!--About-->
 <section class="Contact">
  <div class="container">
    <h2 class="contact-text">Contact Us</h2>
    <div class="row">
      <div class="col-sm-6 mb-5 address">
       <form class="mb-3 login-input" id="contact-form" action="{{ Route('contact-admin') }}" method="POST">
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
      <div class="col-sm-6 mb-5 emailid">
        <div class="add-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
        <div class="add-text"><p>Email<br><a href="mailto:{!! $official_email->content_body!=''?$official_email->content_body:'support@equicard.in' !!}">{!! $official_email->content_body!=''?$official_email->content_body:'' !!}</a></p></div> 
        <div class="add-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
        <div class="add-text"><p>Address<br><a href="">Plot No. - 1854/2865 Jyotsna Bhawan, Near Patia Station , Beside Kalarahanga Hata Bhubaneswar - 751024</a></p></div> 
      </div>
      
    </div>
  </div>
</section>
<div class="container-fluid p-0">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.402658343966!2d85.32006411428938!3d23.37364630898239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e04c391b8af7%3A0x37357167da37041f!2sGNG%20GROUP!5e0!3m2!1sen!2sin!4v1674474408146!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
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
