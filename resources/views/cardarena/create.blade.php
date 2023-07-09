@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('cardarena.index') }}">Card Arena</a></li>
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
                        <span class="caption-subject font-green-haze bold uppercase">Creating Card Arena</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-row-seperated" action="{{ Route('cardarena.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Image <span class="required">* (Please use 186x320 px image)</span></label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control"  name="image" onchange="readURL(this);">
                                    @if ($errors->has('image'))
                                    <span class="help-block"> {{ $errors->first('image') }} </span>
                                    @endif
                                   
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Create</button>
                                    <a href="{{ Route('cardarena.index') }}" class="btn default">Back</a>
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