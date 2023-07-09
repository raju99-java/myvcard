@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('testimonial.index') }}">Testimonial</a></li>
<li class="active">Create</li>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <div class="user-update">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                        <span class="caption-subject font-green-haze bold uppercase">Creating Testimonial</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-row-seperated" action="{{ Route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name <span class="required">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{ (old('name') !== NULL) ? old('name') : "" }}" placeholder="Name">
                                    @if ($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Company Name <span class="required">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="company_name" value="{{ (old('company_name') !== NULL) ? old('company_name') : "" }}" placeholder="Company Name">
                                    @if ($errors->has('company_name'))
                                    <div class="help-block">{{ $errors->first('company_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Content <span class="required">*</span></label>
                                <div class="col-md-12">
                                    <textarea class="form-control ckeditor" name="content" placeholder="Content">{{ (old('content') !== NULL) ? old('content') :""}}</textarea>
                                    @if ($errors->has('content'))
                                    <div class="help-block">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Create</button>
                                    <a href="{{ Route('testimonial.index') }}" class="btn default">Back</a>
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