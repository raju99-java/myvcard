@extends('layouts.main')
@section('css')

@stop
@section('content')
<section class="main-body-section">
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                @if(Auth()->guard('frontend')->user()->type_id=='2')
                <?php
                if (Auth()->guard('frontend')->user()->payment_status == '1' && Auth()->guard('frontend')->user()->subscription_end >= Carbon\Carbon::now()->format('Y-m-d')) {
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Subscription</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">end at</h2>
                                    <p class="text-white mb-0">{{\Carbon\Carbon::parse(Auth()->guard('frontend')->user()->subscription_end)->format('d-F-Y')}}</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{route('basicdetails_form')}}">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Please fill the</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white" style="font-size: 28px;">Business </h2>
                                    <p class="text-white mb-0">Card Details</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    
                <?php } else { ?>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{route('pay')}}">
                            <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">1 year plan </h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white"><i class="fa fa-inr" aria-hidden="true"></i> {{$subscription->value.'/-'}}</h2>
                                        <p class="text-white mb-0" style="font-size: 12px;">click here to subscribe</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <?php
                $card = App\Card::where('user_name',Auth()->guard('frontend')->user()->user_name)->where('status', '1')->first();
                if (!empty($card)) {
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{route('card',['user_name'=>Auth()->guard('frontend')->user()->user_name])}}" target="_blank">
                            <div class="card gradient-9">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Digital Card url</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">click</h2>
                                        <p class="text-white mb-0">To Get</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-address-card"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                @endif
                @if(Auth()->guard('frontend')->user()->type_id=='1')

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Registration</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_users}}</h2>
                                <p class="text-white mb-0">USERS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Subscription</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_subscribers}}</h2>
                                <p class="text-white mb-0">USERS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total coupons</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_coupon}}</h2>
                                <p class="text-white mb-0">COUPONS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icofont-ticket"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total coupons used</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_coupon_used}}</h2>
                                <p class="text-white mb-0">COUPONS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="icofont-ticket"></i></span>
                        </div>
                    </div>
                </div>
              <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-5">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Inactive </h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_inactive_users}}</h2>
                                <p class="text-white mb-0">USERS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
              	<div class="col-lg-3 col-sm-6">
                    <div class="card gradient-6">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Blocked</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_blocked_users}}</h2>
                                <p class="text-white mb-0">USERS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                @endif
              @if(Auth()->guard('frontend')->user()->type_id=='3')

                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Registration</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$total_franchises_user}}</h2>
                                <p class="text-white mb-0">USERS</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                
                @endif
            </div>

            

        </div>
        <!--container -->
    </div>
</section>


@stop
@section('js')
<script src="{{ URL::asset('public/frontend/js/owl.carousel.min.js') }}" type="text/javascript"></script>
@stop