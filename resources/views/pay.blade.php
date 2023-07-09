@extends('layouts.main')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;1,400;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />
<style>
input[type=text], select, textarea {
    margin-top: 0px !important;
}
    .pay {
        position: absolute;
        top: 30%;
        left: 44%;
        margin: -150px 0 0 -150px;
        width:500px;
        height:500px;
        background-color: #E9ECF3;
        border-radius: 10px;
    }
    .paypal{
      	background: #6139A7;  
        color: #fff; 
        text-decoration: none; 
        border-radius: 30px !important; 
        font-family: 'Josefin Sans', sans-serif;
        font-size: 18px;
        font-weight: normal;
        border: 3px solid #fff;
    	padding: 10px 20px !important;
            
    }
  	.money{
      	background: #9A3F96;  
        color: #fff; 
        text-decoration: none; 
        border-radius: 30px !important; 
        font-family: 'Josefin Sans', sans-serif;
        font-size: 18px;
        font-weight: normal;
        border: 3px solid #fff;
    	padding: 10px 20px !important;
            
    }
    .image{ text-align: center;
            margin-top: 5rem;
            font-size: 60px;
            color: #9A3F96;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
            font-style: italic;
    }
    .button{ text-align: center;
             margin-top: 0rem;
    }   
    .button{background: #6139A7; 
            padding: 20px; 
            color: #fff; 
            text-decoration: none; 
            border-radius: 30px; 
            font-family: 'Josefin Sans', sans-serif;
            font-size: 18px;
            font-weight: normal;
    } 
    buttton .button:hover{color: #fff; text-decoration: none;} 
    .p-text p{text-align: center; padding-top: 15px;}
    .p-text p{ color: #2e0773; font-family: 'Josefin Sans', sans-serif; }
    .coupon{padding-top: 30px; text-align: center;}
    @media only screen and (max-width: 767px) {
    .form-inline{padding-left: 1rem;}
    .coupen-button{
        padding-left:4rem;
    }
    }
    @media only screen and (min-width: 768px) {
    .form-inline{padding-left: 3rem;}
    }

    .coupon h5{ color: #2e0773; font-family: 'Josefin Sans', sans-serif;}
    .coupon p{ color: #2e0773; font-family: 'Josefin Sans', sans-serif;}
    .btn:not(.btn-sm):not(.btn-lg) {
        line-height: 1.99;
    }
</style>
@stop
@section('content')
<section class="main-body-section">
    <div class="content-body">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="pricing-bg mb-5">
                    <div class="col-sm-12">
                  <div class="card-body">
            
                <form id="rzp-footer-form" action="{!!route('dopayment')!!}" method="POST" style="width: 100%; text-align: center" >
                    @csrf
                    
                    <h1 class="pay-heading">PAY SECURLY</h1>
                    
                    
                    <div class="icon">
                        <img src="{{ URL::asset('public/images/gpay.png') }}">
                        <img src="{{ URL::asset('public/images/ppay.png') }}">
                        <img src="{{ URL::asset('public/images/phnpay.png') }}">
                        <img src="{{ URL::asset('public/images/rupay.png') }}">
                        <img src="{{ URL::asset('public/images/card.png') }}">
                        <img src="{{ URL::asset('public/images/net.png') }}">
                        <img src="{{ URL::asset('public/images/upi.png') }}">
                    </div>
                    <div class="p-text">
                        <p id="show-price">Price: <span id="total">{{$subscription->value}}</span> INR / <span id="paypal_total">{{number_format($subscription->value/$inr_to_usd->value,2)}}</span> USD</p>
                        <input type="hidden" name="amount" id="amount" value="{{$subscription->value.'00'}}"/>
                      	<input type="hidden" name="paypal_amount" id="paypal_amount" value="{{number_format($subscription->value/$inr_to_usd->value,2)}}"/>
                        <input type="hidden" name="razorpay_key" id="razorpay_key" value="{{$razorpay->value}}"/>
                      	<input type="hidden" name="secret_key" id="secret_key" value="{{ $paypal->value }}">
                      	<input type="hidden" name="coupen_id" id="coupen_id" value="0"/>
                      	
                    </div>
                    <!--<button class="button" id="paybtn" type="submit">Click here to pay now</button>-->
                    <div class="dual-button">
                    	<button class="btn btn-sm paypal" id="paypal-button" type="button" onclick="paypalpayment();">Pay With Paypal</button> 
                        <button class="btn btn-sm money" id="paybtn" type="submit">Pay With Razorpay</button> 
                  	</div>
                    <!--                <div class="button">
                                        <a href="#">Click here to pay now</a>
                                    </div>-->
                    <div id="paymentDetail" style="display: none">
                        <center>
                            <div>paymentID: <span id="paymentID"></span></div>
                            <div>paymentDate: <span id="paymentDate"></span></div>
                            <div class="d-none" id="payment-success">
                                <div class="p-text">
                                <p>Now you can fill the visiting card form.</p>
                                </div>
                            <a href="{{route('basicdetails_form')}}" class="small-button">Click here</a>    
                            </div>
                        </center>
                    </div>
                </form>
                
                    <div class="container coupon" id="coupon-div">
                        <h5>OR</h5>
                        <p>Apply promo code</p>
                        <form class="form-inline" id="coupon-form" action="{{route('apply-coupon')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="coupon_id" name="coupon_id" placeholder="Enter Coupon Code">

                            </div>
                            <div class="form-group coupen-button">
                            <button type="submit" class="btn btn-default" style="background:#F15A24;">Submit</button>
                            <div class="help-block" id="error-coupon_id"></div>
                            </div>
                        </form>
                    </div>   
                

            </div>
            </div>
            </div>
        
        </div>
        </div>
    </div>
</section>

@stop
@section('js')
<script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
$('#rzp-footer-form').submit(function (e) {
//        var amount = $('#amount').val();
////        alert(amount);
//        var button = $(this).find('button');
//        var parent = $(this);
//        button.attr('disabled', 'true').addClass('d-none');
//        $.ajax({
//            method: 'post',
//            url: this.action,
//            data: $(this).serialize(),
//            complete: function (r) {
//                console.log('complete');
//                console.log(r);
//            }
//        })
    return false;
})
</script>

<script>
    function padStart(str) {
        return ('0' + str).slice(-2)
    }

    function demoSuccessHandler(transaction) {
        // You can write success code here. If you want to store some data in database.
        var button = $(this).find('button');
        var parent = $(this);
        $('.button').addClass('d-none');
        $('#payment-success').removeClass('d-none');
        $("#paymentDetail").removeAttr('style');
        $('#paymentID').text(transaction.razorpay_payment_id);
        var paymentDate = new Date();
        $('#paymentDate').text(
                padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
                );
      var coupen_id = $('#coupen_id').val();
	  var amount = $('#amount').val();
        $.ajax({
            method: 'post',
            url: "{!!route('dopayment')!!}",
            data: {
                "_token": "{{ csrf_token() }}",
                "payment_id": transaction.razorpay_payment_id,
              	"currency": 'INR',
              	"coupen_id": coupen_id,
              	"amount": amount,
            },
            complete: function (r) {

                $.iaoAlert({
                    type: "success",
                    position: "top-right",
                    mode: "dark",
                    msg: 'your payment is successful',
                    autoHide: true,
                    alertTime: "3000",
                    fadeTime: "1000",
                    closeButton: true,
                    fadeOnHover: true,
                    zIndex: '9999'
                });
              $('#coupon-div').addClass('d-none');
                console.log('complete');
                console.log(r);
            }
        })
    }
</script>

<script>
    document.getElementById('paybtn').onclick = function () {
        var amount = $('#amount').val();
        var razorpay_key = $('#razorpay_key').val();
//        alert(amount);
        var options = {
            key: razorpay_key,
            amount: amount,
			status:"paid",
            description: 'Subscription',
            handler: demoSuccessHandler
        }
        window.r = new Razorpay(options);
        r.open()
    }
</script>


<script>
    function paypalpayment() {
        var amount = document.getElementById("paypal_amount").value;
        var secret_key = document.getElementById("secret_key").value;
        success_msg('Goto Paypal Checkout');
        paypal.Button.render({
            // Configure environment
            env: 'production',
            client: {
            production: secret_key,
//                sandbox: secret_key,
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'medium',
                color: 'gold',
                shape: 'pill',
            },
            // Enable Pay Now checkout flow (optional)
            commit: true,
            // Set up a payment
            payment: function (data, actions) {
                return actions.payment.create({
                    transactions: [{
                            amount: {
                                total: amount,
                                currency: 'USD',
                                details: {
                                    subtotal: amount,
                                }
                            },
                        }],
                    note_to_payer: 'Contact us for any questions on your order.'
                });
            },
            // Execute the payment
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
                    // Show a confirmation message to the buyer
//                                window.alert('Thank you for your purchase!');
                  console.log(data);
                    ajaxindicatorstart();
                    payment_success(amount,data);
                });
            }
        }, '#paypal-button');
        return false;
    }
  function payment_success(amount,data) {
        
        var csrf_token = $('input[name=_token]').val();
        var amount = document.getElementById("paypal_amount").value;
      	var coupen_id = $('#coupen_id').val();
          currentRequest = $.ajax({
            method: 'post',
            url: "{!!route('dopayment')!!}",
          	data: {
                "_token": "{{ csrf_token() }}",
              	"payment_id": data.paymentID,
              	"currency": 'USD',
              	"coupen_id": coupen_id,
              	"amount": amount,
            },
            dataType: 'json',
            success: function (resp) {
              $.iaoAlert({
                    type: "success",
                    position: "top-right",
                    mode: "dark",
                    msg: 'your payment is successful',
                    autoHide: true,
                    alertTime: "3000",
                    fadeTime: "1000",
                    closeButton: true,
                    fadeOnHover: true,
                    zIndex: '9999'
                });
              $('#coupon-div').addClass('d-none');
              var button = $(this).find('button');
        var parent = $(this);
        $('.dual-button').addClass('d-none');
        $('#show-price').addClass('d-none');
             
        $('#payment-success').removeClass('d-none');
        $("#paymentDetail").removeAttr('style');
        $('#paymentID').text(data.paymentID);
        var paymentDate = new Date();
        $('#paymentDate').text(
                padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
                );
                ajaxindicatorstop();
                
            }
        });
    }
    
</script>



@stop

