@extends('layouts.main')

@section('breadcrumb')
<li class="active">Card Arena</li>
@stop

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
        <h3 class="page-title">Card Arena
            <small>Manage all the Card Arena of the site from here</small>
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-layers font-green-haze" aria-hidden="true"></i>
                            <span class="caption-subject font-green-haze bold uppercase">Card Arena</span>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ Route('cardarena.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>&nbsp;
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-advance table-hover datatable" width="100%" id="cardarena-table">
                                <thead>
                                    <tr>
                                        <th class="bold"> # </th>
                                        <th class="bold"> Image</th>
                                        <th class="bold"> Created at </th>
                                        <th class="bold"> Status </th>
                                        <th class="bold" width="23%"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="deletecardarenaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #17C4BB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="color: white;">Delete Card Arena</h4>
            </div>
            <div class="modal-body">
                <h4>Do you want to delete this Card Arena?</h4>
            </div>
            <div class="modal-footer">
                <form id="deletecardarenaFORM" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success" style="background-color: #17C4BB;">Yes</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@stop

@section('js')
<script>

//    $(docuemnt).ready(function () {
//
//    });
    $(function () {
        $('#cardarena-table').DataTable({
            processing: false,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: full_path + 'cardarena',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@stop