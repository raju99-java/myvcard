@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('franchise.index') }}">Franchises</a></li>
<li> <a href="{{ Route('franchise.show', ['id' => base64_encode($model->id)]) }}">{{ $model->name }}</a></li>
<li class="active">Update</li>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <div class="user-update">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-green-haze" aria-hidden="true"></i>
                        <span class="caption-subject font-green-haze bold uppercase">Updating details of {{ $model->name }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-row-seperated" action="{{ Route('franchise.update', ['id' => base64_encode($model->id)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <input type="hidden" name="id" value="{{ $model->id }}">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"> Name <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="name" value="{{ (old('name') !== NULL) ? old('name') : $model->name }}" placeholder="Name">
                                    @if ($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="email" class="form-control" name="email" value="{{ (old('email') !== NULL) ? old('email') : $model->email }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <div class="help-block">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Status <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1" {{ ($model->status === '1') ? 'checked' : '' }}> Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="2" {{ ($model->status === '2') ? 'checked' : '' }}> Suspended
                                        </label>
                                        @if ($errors->has('status'))
                                        <div class="help-block">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Update</button>
                                    <a href="{{ Route('franchise.show', ['id' => base64_encode($model->id)]) }}" class="btn default">Back</a>
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