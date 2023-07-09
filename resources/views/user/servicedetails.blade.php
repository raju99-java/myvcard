@extends('layouts.main')
@section('css')
<link href="{{ URL::asset('public/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=tel], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=email], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=url], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=file], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .buttonn{
        display: inline-block;
        position: relative;
        width: 50px;
        height: 50px;
        cursor: pointer;
        top: 1.4rem;
    }

    .buttonn span {
        display: block;
        position: realtive;
        top: 50%;
        left: 50%;
        border: 1px solid transparent;
        border-radius: 50% !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #1d1d1f;
        cursor: pointer;
        float: left;
        padding: 3px;
        width: 40px;
        height: 40px;
        z-index: 1;
    }
    .colornav-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .violate .buttonn span {
        background: #9A3F96;
    }
    .pink .buttonn span {
        background: #f80c56;
    }
    .blue .buttonn span {
        background: #0044BA;
    }
    .green .buttonn span {
        background: #74B62E;
    }

    .layer {
        display: inline-block;
        position: relative;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: transparent;
        z-index: -1;
    }
    .btn-danger {
  color: #fff;
  background-color: #ff5e5e;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
}


</style>
@stop
@section('content')
<section class="main-body-section">
    <div class="content-body">
        <?php
        if (Auth()->guard('frontend')->user()->payment_status == '1' && Auth()->guard('frontend')->user()->subscription_end >= Carbon\Carbon::now()->format('Y-m-d')) {
            ?>
        <div class="container-fluid mt-3">
            

            <form class="mb-3 login-input" id="edit-all-form" action="{{ Route('edit-check-form') }}" method="POST">
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($card['id'])?$card['id']:''}}">

                <h3 class="head">SERVICE DETAILS</h3>
                <label for="avatar">Service One</label>
                <input type="file" id="service1" name="service1" accept="image/png, image/jpeg">
                <div class="help-block" id="error-service1"></div>

                <label for="avatar">Service Two</label>
                <input type="file" id="service2" name="service2"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service2"></div>

                <label for="avatar">Service Three</label>
                <input type="file" id="service3" name="service3"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service3"></div>

                <label for="avatar">Service Four</label>
                <input type="file" id="service4" name="service4"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service4"></div>

                <label for="avatar">Service Five</label>
                <input type="file" id="service5" name="service5"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service5"></div>

                <label for="avatar">Service Six</label>
                <input type="file" id="service6" name="service6"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service6"></div>

                <label for="avatar">Service Seven</label>
                <input type="file" id="service7" name="service7"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service7"></div>

                <label for="avatar">Service Eight</label>
                <input type="file" id="service8" name="service8"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service8"></div>

                <label for="avatar">Service Nine</label>
                <input type="file" id="service9" name="service9"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service9"></div>

                <label for="avatar">Service Ten</label>
                <input type="file" id="service10" name="service10"accept="image/png, image/jpeg">
                <div class="help-block" id="error-service10"></div>

                <div class="col-sm-12 d-flex justify-content-center">
                <div class="submit-btn mr-5">
                    <input type="submit" value="Save">
                </div> 
                <div class="reset-btn ml-5">
                        <button type="button" onclick="ResetService();" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    <?php } else { ?>
            <div class="col-lg-3 col-sm-6">
                <a href="{{route('pay')}}">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Subscription</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white"><i class="fa fa-inr" aria-hidden="true"></i> {{$subscription->value.'/-'}}</h2>
                                <p class="text-white mb-0">click here  for 1 year</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
        <!--container -->
    </div>
</section>
@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>

@stop