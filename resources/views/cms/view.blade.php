@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('cms.index') }}">CMS</a></li>
<li class="active">View</li>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye font-green-haze"></i>
                    <span class="caption-subject font-green-haze bold uppercase">Viewing details of {{ $model->content_name }}</span>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">Slug:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{ (isset($model->slug) && $model->slug !== NULL) ? $model->slug : "Not Given" }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">Page Name:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{ (isset($model->page_name) && $model->page_name !== NULL) ? $model->page_name : "Not Given" }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-3">Content Name:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{ (isset($model->content_name) && $model->content_name !== NULL) ? $model->content_name : "Not Given" }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                @if ($model->type === '2')
                                <label class="control-label col-md-3">Image:</label>
                                <div class="col-md-9">
                                    <img class="img-responsive" src="{{ URL::asset('public/uploads/frontend/cms/pictures/' . $model->content_body) }}" alt="{{ $model->content_body }}">
                                </div>
                                @elseif ($model->type === '3')
                                <label class="control-label col-md-3">Video:</label>
                                <div class="col-md-9">
                                    <video controls class="img-responsive">
                                        <source src="{{ URL::asset('public/uploads/frontend/cms/videos/' . $model->content_body) }}" type="video/mp4" alt="{{ $model->content_body }}">
                                    </video>
                                </div>
                                @else
                                <label class="control-label col-md-3">Content Body:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {!! (isset($model->content_body) && $model->content_body !== NULL) ? $model->content_body : "Not Given" !!} </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-actions text-right">
                        <a href="{{ Route('cms.edit', ['id' => base64_encode($model->id)]) }}" class="btn green">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <a href="{{ Route('cms.index') }}" class="btn default">Back</a>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</section>  
@stop