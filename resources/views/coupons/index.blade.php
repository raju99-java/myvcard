@extends('layouts.main')
@section('css')
<style>
    .jconfirm-content {
        overflow: hidden !important;
    }
    select.custom-select.custom-select-sm.form-control.form-control-sm {
        border: 1px solid #dddee6;
        background-color: #EBF1F8;
        border-color: #EBF1F8;
        font-size: 14px;
        height: 45px;
    }
    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5em;
        border: 1px solid #dddee6;
        background-color: #EBF1F8;
        border-color: #d4d9e0;
        font-size: 14px;
        height: 45px;
    }
</style>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{Route('dashboard')}}">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Coupons</span>
            </li>
        </ul>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Coupons</span>
                </div>
                <div class="pull-right"><a href="{{route('coupon-add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a></div>
            </div>
            <div class="portlet-body ">
                <div class="clearfix">
                    <div class="table-responsive">
                        <table class="ui celled table" cellspacing="0" width="100%" id="coupon-history">
                            <thead>
                                <tr>
                                    <th>Coupon ID</th>
                                    <th>Amount(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                                    <th>Total Used</th>
                                    <th>Status</th>
                                    <th>Created for</th>
                                    <th>Created at</th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>

//    $(docuemnt).ready(function () {
//
//    });
    $(function () {
        $('#coupon-history').DataTable({
            processing: false,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: full_path + 'coupon',
            columns: [
                {data: 'coupon_id', name: 'coupon_id'},
                {data: 'amount', name: 'amount'},
                {data: 'total_used', name: 'total_used'},
                {data: 'status', name: 'status'},
                {data: 'created_for', name: 'created_for'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection