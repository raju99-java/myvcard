@extends('layouts.main')

@section('breadcrumb')
<li> <a href="{{ Route('franchise.index') }}">Franchises</a></li>
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
                        <span class="caption-subject font-green-haze bold uppercase">Creating Franchise</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-row-seperated" action="{{ Route('franchise.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="name" value="{{ (old('name') !== NULL) ? old('name') : "" }}" placeholder="Name">
                                    @if ($errors->has('name'))
                                    <div class="help-block">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email <span class="required">*</span></label>
                                <div class="col-md-5">
                                    <input type="email" class="form-control" name="email" value="{{ (old('email') !== NULL) ? old('email') : "" }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <div class="help-block">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Create</button>
                                    <a href="{{ Route('franchise.index') }}" class="btn default">Back</a>
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