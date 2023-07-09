@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('customer.index') }}">Customers</a></li>
<li class="active">Add Subscription</li>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <div class="user-update">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                        <span class="caption-subject font-green-haze bold uppercase">Add Subscription of {{ $model->name }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-row-seperated" action="{{ Route('customer-subscription-add', ['id' => base64_encode($model->id)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <input type="hidden" name="id" value="{{ $model->id }}">
                            <div class="form-group {{ $errors->has('subscription_end') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"> Subscription End Date<span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="datetime-local" class="form-control" name="subscription_end" value="{{ (old('subscription_end') !== NULL) ? old('subscription_end') : $model->subscription_end }}" placeholder="Subscription End Date">
                                    @if ($errors->has('subscription_end'))
                                    <div class="help-block">{{ $errors->first('subscription_end') }}</div>
                                    @endif
                                </div>
                            </div>

                            
                            <!--<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">-->
                            <!--    <label class="col-md-4 control-label">Status <span class="required">*</span></label>-->
                            <!--    <div class="col-md-5">-->
                            <!--        <div class="radio-list">-->
                            <!--            <label class="radio-inline">-->
                            <!--                <input type="radio" name="status" value="1" {{ ($model->status === '1') ? 'checked' : '' }}> Active-->
                            <!--            </label>-->
                            <!--            <label class="radio-inline">-->
                            <!--                <input type="radio" name="status" value="2" {{ ($model->status === '2') ? 'checked' : '' }}> Suspended-->
                            <!--            </label>-->
                            <!--            @if ($errors->has('status'))-->
                            <!--            <div class="help-block">{{ $errors->first('status') }}</div>-->
                            <!--            @endif-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Add</button>
                                    <a href="{{ Route('customer.index') }}" class="btn default">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop