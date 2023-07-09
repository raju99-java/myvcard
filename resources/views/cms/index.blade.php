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
        <h3 class="page-title">CMS
            <small>Manage all the cms of the site from here</small>
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-picture-o font-green-haze" aria-hidden="true"></i>
                            <span class="caption-subject font-green-haze bold uppercase">CMS</span>
                        </div>
                        <div class="pull-right">
                            <!--<a class="btn btn-success" href="javascript:;"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>&nbsp;-->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-advance table-hover datatable" width="100%" id="cms-table">
                                <thead>
                                    <tr>
                                        <th class="bold"> # </th>
                                        <th class="bold"> Page Name </th>
                                        <th class="bold"> Content Type </th>
                                        <th class="bold"> Content Name </th>
                                        <th class="bold"> Last Updated </th>
                                        <th class="bold"> Actions </th>
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
@stop

@section('js')
<script>

//    $(docuemnt).ready(function () {
//
//    });
    $(function () {
        $('#cms-table').DataTable({
            processing: false,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: full_path + 'cms',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'page_name', name: 'page_name'},
                {data: 'type', name: 'type'},
                {data: 'content_name', name: 'content_name'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@stop