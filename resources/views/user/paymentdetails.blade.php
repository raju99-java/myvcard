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

                <h3 class="head">PAYMENT DETAILS</h3>
                <h5>WALLET:</h5>
                <input type="tel" id="gpay_number" name="gpay_number" placeholder="Gpay Mobile Number" value="{{isset($card['gpay_number'])?$card['gpay_number']:''}}">
                <div class="help-block" id="error-gpay_number"></div>

                <label for="avatar">Gpay QR Code</label>
                <input type="file" id="gpay_QR" name="gpay_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-gpay_QR"></div>

                <input type="tel" id="phonepay_number" name="phonepay_number" placeholder="PhonePe Mobile Number" value="{{isset($card['phonepay_number'])?$card['phonepay_number']:''}}">
                <div class="help-block" id="error-phonepay_number"></div>


                <label for="avatar">Phonepay QR Code</label>
                <input type="file" id="phonepay_QR" name="phonepay_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-phonepay_QR"></div>

                <input type="tel" id="paytm_number" name="paytm_number" placeholder="PayTM Mobile Number" value="{{isset($card['paytm_number'])?$card['paytm_number']:''}}">
                <div class="help-block" id="error-paytm_number"></div>

                <label for="avatar">Paytm QR Code</label>
                <input type="file" id="paytm_QR" name="paytm_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-paytm_QR"></div>

                <h5>UPI:</h5>
                <input type="tel" id="upi_number" name="upi_number" placeholder="UPI Mobile Name" value="{{isset($card['upi_number'])?$card['upi_number']:''}}">
                <div class="help-block" id="error-upi_number"></div>

                <label for="avatar">UPI QR Code</label>
                <input type="file" id="upi_QR" name="upi_QR" accept="image/png, image/jpeg">
                <div class="help-block" id="error-upi_QR"></div>

                <h5>BANK DETAILS:</h5>

                <label for="text">Bank Name</label>
                <input type="text" id="bank_name" name="bank_name" placeholder="Bank Name.." value="{{isset($card['bank_name'])?$card['bank_name']:''}}">
                <div class="help-block" id="error-bank_name"></div>
                <label for="text">Branch Name</label>
                <input type="text" id="branch_name" name="branch_name" placeholder="Branch Name.." value="{{isset($card['branch_name'])?$card['branch_name']:''}}">
                <div class="help-block" id="error-branch_name"></div>
                <label for="text">Account no</label>
                <input type="text" id="account_no" name="account_no" placeholder="Account no.." value="{{isset($card['account_no'])?$card['account_no']:''}}">
                <div class="help-block" id="error-account_no"></div>
                <label for="text">Customer Id</label>
                <input type="text" id="customer_id" name="customer_id" placeholder="Customer Id.." value="{{isset($card['customer_id'])?$card['customer_id']:''}}">
                <div class="help-block" id="error-customer_id"></div>
                <label for="text">Swift code</label>
                <input type="text" id="swift_code" name="swift_code" placeholder="Swift code.." value="{{isset($card['swift_code'])?$card['swift_code']:''}}">
                <div class="help-block" id="error-swift_code"></div>
                <label for="text">Account Holder</label>
                <input type="text" id="account_holder" name="account_holder" placeholder="Account Holder.." value="{{isset($card['account_holder'])?$card['account_holder']:''}}">
                <div class="help-block" id="error-account_holder"></div>
                <label for="text">IFSC CODE</label>
                <input type="text" id="ifsc_code" name="ifsc_code" placeholder="IFSC CODE.." value="{{isset($card['ifsc_code'])?$card['ifsc_code']:''}}">
                <div class="help-block" id="error-ifsc_code"></div>
                <label for="text">MICR Code</label>
                <input type="text" id="micr_code" name="micr_code" placeholder="MICR Code.." value="{{isset($card['micr_code'])?$card['micr_code']:''}}">
                <div class="help-block" id="error-micr_code"></div>
                <label for="subject">Bank Address</label>
                <textarea id="bank_address" name="bank_address" placeholder="Bank Address.." style="height:80px">{{isset($card['bank_address'])?$card['bank_address']:''}}</textarea>
                <div class="help-block" id="error-bank_address"></div>

                
                <div class="submit-btn">
                    <input type="submit" value="Save">
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