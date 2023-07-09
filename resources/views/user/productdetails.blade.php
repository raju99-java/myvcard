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
.box-outline {
    border: 1px solid;
    padding: 1rem;
    margin-bottom: 1rem;
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

                <h3 class="head">PRODUCT DETAILS</h3>
                <center><h5>Please fill each fields of individual product to appear on Card</h5></center>
                <div class="box-outline">
                <label for="avatar">Product One</label>
                <input type="file" id="product1_image" name="product1_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product1_image"></div>

                <label for="subject">Product One Title</label>
                <input type="text" id="product1_title" name="product1_title" placeholder="Title..." value="{{isset($card['product1_title'])?$card['product1_title']:''}}">
                <div class="help-block" id="error-product1_title"></div>

                <label for="subject">Product One Details</label>
                <textarea id="product1_details" name="product1_details" placeholder="Details" style="height:80px">{{isset($card['product1_details'])?$card['product1_details']:''}}</textarea>
                <div class="help-block" id="error-product1_details"></div>

                <label for="phone">Product One Price</label>
                <input type="text" id="product1_price" name="product1_price" placeholder="Price" value="{{isset($card['product1_price'])?$card['product1_price']:''}}">
                <div class="help-block" id="error-product1_price"></div>
                </div>
                <div class="box-outline">
                <label for="avatar">Product Two</label>
                <input type="file" id="product2_image" name="product2_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product2_image"></div>

                <label for="subject">Product Two Title</label>
                <input type="text" id="product2_title" name="product2_title" placeholder="Title..." value="{{isset($card['product2_title'])?$card['product2_title']:''}}">
                <div class="help-block" id="error-product2_title"></div>

                <label for="subject">Product Two Details</label>
                <textarea id="product2_details" name="product2_details" placeholder="Details" style="height:80px">{{isset($card['product2_details'])?$card['product2_details']:''}}</textarea>
                <div class="help-block" id="error-product2_details"></div>

                <label for="phone">Product Two Price</label>
                <input type="text" id="product2_price" name="product2_price" placeholder="Price" value="{{isset($card['product2_price'])?$card['product2_price']:''}}">
                <div class="help-block" id="error-product2_price"></div>
                </div>
                <div class="box-outline">

                <label for="avatar">Product Three</label>
                <input type="file" id="product3_image" name="product3_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product3_image"></div>
                
                <label for="subject">Product Three Title</label>
                <input type="text" id="product3_title" name="product3_title" placeholder="Title..." value="{{isset($card['product3_title'])?$card['product3_title']:''}}">
                <div class="help-block" id="error-product3_title"></div>

                <label for="subject">Product Three Details</label>
                <textarea id="product3_details" name="product3_details" placeholder="Details" style="height:80px">{{isset($card['product3_details'])?$card['product3_details']:''}}</textarea>
                <div class="help-block" id="error-product3_details"></div>

                <label for="phone">Product Three Price</label>
                <input type="text" id="product3_price" name="product3_price" placeholder="Price" value="{{isset($card['product3_price'])?$card['product3_price']:''}}">
                <div class="help-block" id="error-product3_price"></div>
                </div>
                <div class="box-outline">

                <label for="avatar">Product Four</label>
                <input type="file" id="product4_image" name="product4_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product4_image"></div>
                
                <label for="subject">Product Four Title</label>
                <input type="text" id="product4_title" name="product4_title" placeholder="Title..." value="{{isset($card['product4_title'])?$card['product4_title']:''}}">
                <div class="help-block" id="error-product4_title"></div>

                <label for="subject">Product Four Details</label>
                <textarea id="product4_details" name="product4_details" placeholder="Details" style="height:80px">{{isset($card['product4_details'])?$card['product4_details']:''}}</textarea>
                <div class="help-block" id="error-product4_details"></div>

                <label for="phone">Product Four Price</label>
                <input type="text" id="product4_price" name="product4_price" placeholder="Price" value="{{isset($card['product4_price'])?$card['product4_price']:''}}">
                <div class="help-block" id="error-product4_price"></div>
                </div>
                <div class="box-outline">

                <label for="avatar">Product Five</label>
                <input type="file" id="product5_image" name="product5_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product5_image"></div>
                
                <label for="subject">Product Five Title</label>
                <input type="text" id="product5_title" name="product5_title" placeholder="Title..." value="{{isset($card['product5_title'])?$card['product5_title']:''}}">
                <div class="help-block" id="error-product5_title"></div>

                <label for="subject">Product Five Details</label>
                <textarea id="product5_details" name="product5_details" placeholder="Details" style="height:80px">{{isset($card['product5_details'])?$card['product5_details']:''}}</textarea>
                <div class="help-block" id="error-product5_details"></div>

                <label for="phone">Product Five Price</label>
                <input type="text" id="product5_price" name="product5_price" placeholder="Price" value="{{isset($card['product5_price'])?$card['product5_price']:''}}">
                <div class="help-block" id="error-product5_price"></div>
                </div>
                <div class="box-outline">

                <label for="avatar">Product Six</label>
                <input type="file" id="product6_image" name="product6_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product6_image"></div>
                
                <label for="subject">Product Six Title</label>
                <input type="text" id="product6_title" name="product6_title" placeholder="Title..." value="{{isset($card['product6_title'])?$card['product6_title']:''}}">
                <div class="help-block" id="error-product6_title"></div>

                <label for="subject">Product Six Details</label>
                <textarea id="product6_details" name="product6_details" placeholder="Details" style="height:80px">{{isset($card['product6_details'])?$card['product6_details']:''}}</textarea>
                <div class="help-block" id="error-product6_details"></div>

                <label for="phone">Product Six Price</label>
                <input type="text" id="product6_price" name="product6_price" placeholder="Price" value="{{isset($card['product6_price'])?$card['product6_price']:''}}">
                <div class="help-block" id="error-product6_price"></div>
                </div>
                <div class="box-outline">
                
                <label for="avatar">Product Seven</label>
                <input type="file" id="product7_image" name="product7_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product7_image"></div>
                
                <label for="subject">Product Seven Title</label>
                <input type="text" id="product7_title" name="product7_title" placeholder="Title..." value="{{isset($card['product7_title'])?$card['product7_title']:''}}">
                <div class="help-block" id="error-product7_title"></div>

                <label for="subject">Product Seven Details</label>
                <textarea id="product7_details" name="product7_details" placeholder="Details" style="height:80px">{{isset($card['product7_details'])?$card['product7_details']:''}}</textarea>
                <div class="help-block" id="error-product7_details"></div>

                <label for="phone">Product Seven Price</label>
                <input type="text" id="product7_price" name="product7_price" placeholder="Price" value="{{isset($card['product7_price'])?$card['product7_price']:''}}">
                <div class="help-block" id="error-product7_price"></div>
                </div>
                <div class="box-outline">
                
                <label for="avatar">Product Eight</label>
                <input type="file" id="product8_image" name="product8_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product8_image"></div>
                
                <label for="subject">Product Eight Title</label>
                <input type="text" id="product8_title" name="product8_title" placeholder="Title..." value="{{isset($card['product8_title'])?$card['product8_title']:''}}">
                <div class="help-block" id="error-product8_title"></div>

                <label for="subject">Product Eight Details</label>
                <textarea id="product8_details" name="product8_details" placeholder="Details" style="height:80px">{{isset($card['product8_details'])?$card['product8_details']:''}}</textarea>
                <div class="help-block" id="error-product8_details"></div>

                <label for="phone">Product Eight Price</label>
                <input type="text" id="product8_price" name="product8_price" placeholder="Price" value="{{isset($card['product8_price'])?$card['product8_price']:''}}">
                <div class="help-block" id="error-product8_price"></div>
                </div>
                <div class="box-outline">
                
                <label for="avatar">Product Nine</label>
                <input type="file" id="product9_image" name="product9_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product9_image"></div>
                
                <label for="subject">Product Nine Title</label>
                <input type="text" id="product9_title" name="product9_title" placeholder="Title..." value="{{isset($card['product9_title'])?$card['product9_title']:''}}">
                <div class="help-block" id="error-product9_title"></div>

                <label for="subject">Product Nine Details</label>
                <textarea id="product9_details" name="product9_details" placeholder="Details" style="height:80px">{{isset($card['product9_details'])?$card['product9_details']:''}}</textarea>
                <div class="help-block" id="error-product9_details"></div>

                <label for="phone">Product Nine Price</label>
                <input type="text" id="product9_price" name="product9_price" placeholder="Price" value="{{isset($card['product9_price'])?$card['product9_price']:''}}">
                <div class="help-block" id="error-product9_price"></div>
                </div>
                <div class="box-outline">
                
                <label for="avatar">Product Ten</label>
                <input type="file" id="product10_image" name="product10_image" accept="image/png, image/jpeg">
                <div class="help-block" id="error-product10_image"></div>
                
                <label for="subject">Product Ten Title</label>
                <input type="text" id="product10_title" name="product10_title" placeholder="Title..." value="{{isset($card['product10_title'])?$card['product10_title']:''}}">
                <div class="help-block" id="error-product10_title"></div>

                <label for="subject">Product Ten Details</label>
                <textarea id="product10_details" name="product10_details" placeholder="Details" style="height:80px">{{isset($card['product10_details'])?$card['product10_details']:''}}</textarea>
                <div class="help-block" id="error-product10_details"></div>

                <label for="phone">Product Ten Price</label>
                <input type="text" id="product10_price" name="product10_price" placeholder="Price" value="{{isset($card['product10_price'])?$card['product10_price']:''}}">
                <div class="help-block" id="error-product10_price"></div>
                </div>
                
                
                <div class="col-sm-12 d-flex justify-content-center">
                <div class="submit-btn mr-5">
                    <input type="submit" value="Save">
                </div> 
                <div class="reset-btn ml-5">
                        <button type="button" onclick="ResetProducts();" class="btn btn-danger">Reset</button>
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