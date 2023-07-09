@extends('layouts.site_main')
@section('css')

@stop

@section('content')
<div class="breadcrumbb">  
  <div class="container-fluid">
    <h2 class="breadcrumb-text">HOW IT WORKS</h2>
  </div>
</div>
<!--How It Work-->
<div class="container">
    <h2 class="work-title">The fastest process to get your digital visiting card</h2>
    <div class="row mb-5">
        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-user-o"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Sign Up</h5>
                    <p>{!! $signup_text->content_body!=''?$signup_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>   

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-pencil-square-o"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Create Card</h5>
                    <p>{!! $create_card_text->content_body!=''?$create_card_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Share Your Card</h5>
                    <p>{!! $share_your_card_text->content_body!=''?$share_your_card_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-3 work-it">
            <div class="work-back">
                <div class="icon">
                    <p><i class="fa fa-share-square-o" aria-hidden="true"></i></p>
                </div>
                <div class="icon-text">
                    <h5>Follow Up</h5>
                    <p>{!! $follow_Up_text->content_body!=''?$follow_Up_text->content_body:'' !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="container">-->
<!--  <h2 class="work-title">Follow the instructions to get activate your Digital Business Card.</h2>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow">-->
<!--      <p>1. Click on the signup button.</p><br/>-->
<!--      <img src="{{ URL::asset('public/site/image/s.png-->
<!--      ') }}" class="img-fluid" alt="Home" />-->
<!--    </div>  -->
<!--  </div>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow">-->
<!--      <p>2. Fill the form and click on submit button to create new account.</p>-->
<!--      <img src="{{ URL::asset('public/site/image/f.png-->
<!--      ') }}" class="img-fluid" />-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow">-->
<!--      <p>3. Then open your mail and click on above link to activate your account.</p><br/>-->
<!--      <img src="{{ URL::asset('public/site/image/fastcardmail.jpg') }}" class="img-fluid" alt="Registration Mail" />-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow">  -->
<!--      <p>4. In dashboard click on subscribe now thumbnail.</p>    -->
<!--      <img src="{{ URL::asset('public/site/image/299.png') }}" class="img-fluid" />-->
<!--    </div> -->
<!--  </div>-->
<!--  <div class="col-sm-12"> -->
<!--    <div class="follow"> -->
<!--      <p>5. Here you can pay the amount or apply the coupon code (provide by fast card team) to your digital<br>  business card. (note :- its 1year subscribe plan)</p>-->
<!--      <img src="{{ URL::asset('public/site/image/pay.png') }}" class="img-fluid"/>-->
<!--    </div>  -->
<!--  </div>-->
  
<!--  <div class="col-sm-12">-->
<!--    <div class="follow">-->
<!--      <p>6. Now here you can fill the business card form (remember all fields are optional) & click on submit button.</p>-->
<!--      <img src="{{ URL::asset('public/site/image/fastcardcarddetail.png') }}" class="img-fluid"/>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class=" col-sm-12">-->
<!--    <div class="follow"> -->
<!--      <p>7. After submitting the form click on dashboard button, here you can see your card is activated now then <br>click on digital card thumbnail to get your card link.</p>-->
<!--      <img src="{{ URL::asset('public/site/image/fastcardgetcard.png') }}"class="img-fluid" />-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow"> -->
<!--      <p>8. Wow !! Your Card is live, now you can share your card.</p>-->
<!--      <img src="{{ URL::asset('public/site/image/fastcardshare.png') }}"class="img-fluid" />-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-sm-12">-->
<!--    <div class="follow"> -->
<!--      <p>Note: - You can Edit your card unlimited & update. -->
<!--        (keep your login credentials safe)<br/>-->

<!--        Thanking you<br/>-->
<!--      Team Fast Card</p>-->
<!--    </div>-->
<!--  </div>    -->
<!--  </div>-->

@stop
@section('js')

@stop  
