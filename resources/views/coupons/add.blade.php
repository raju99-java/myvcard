@extends('layouts.main')
@section('content')
<section class="main-body-section">
    <div class="content-body">

        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{Route('coupon')}}">Coupon</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Add Coupon</span>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-plus font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Add Coupon</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form method="post" action="{{route('coupon-add')}}" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group {{ $errors->has('coupon_id') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-2">Coupon code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Coupon code" name="coupon_id" value="{{$coupon_code}}"/>
                                        @if ($errors->has('coupon_id'))
                                        <span class="help-block"> {{ $errors->first('coupon_id') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Created For</label>
                                    <div class="col-md-10">
                                  <select class="form-control" name="created_for">
                                    <option value="">Select a Franchise</option>
                                     @foreach($franchises as $franchise)     
                                    <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                     @endforeach     
                                    
                                </select>
                                        
                                        @if ($errors->has('created_for'))
                                        <span class="help-block"> {{ $errors->first('created_for') }} </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-2">Amount</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Enter Amount" name="amount" />
                                        @if ($errors->has('amount'))
                                        <span class="help-block"> {{ $errors->first('amount') }} </span>
                                        @endif
                                    </div>
                                </div>
                                

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="offset-md-3 col-md-9">
                                        <a href="{{Route('coupon')}}" class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection