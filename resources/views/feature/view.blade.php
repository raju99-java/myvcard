@extends('layouts.main')

@section('breadcrumb')Feature</a></li>
<li class="active">View</li>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye font-green-haze"></i>
                    <span class="caption-subject font-green-haze bold uppercase">Viewing details of {{ $model->name }}</span>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Name:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <img src="{{URL::asset('public/uploads/feature/' . $model->image)}}" width="186" height="320"> </p>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">Status:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">
                                        @if($model->status == '0')
                                        Inactive
                                        @elseif($model->status == '1')
                                        Active
                                        @else
                                        Block
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions text-right">
                        <a href="{{ Route('cardarena.edit', ['id' => base64_encode($model->id)]) }}" class="btn green">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <a href="{{ Route('feature.index') }}" class="btn default">Back</a>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</section>
@stop