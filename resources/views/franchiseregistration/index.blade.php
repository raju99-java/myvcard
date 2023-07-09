@extends('layouts.main')

@section('breadcrumb')
<li class="active">Franchise Registration</li>
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
  
   .table {
    width: 70%;
    margin-bottom: 1rem;
    background-color: transparent;
}
  .f-label{
    font-weight: bold;
    color: #000;
  }
  .row.number-of-people {
    box-shadow: -2px 1px 7px 0px rgba(0,0,0,0.75);
    padding-top: 35px;
    padding-bottom: 35px;
}
  
.number {
    color: #662d91;
    text-decoration: none;
    font-size: 32px;
    font-weight: bold;
    padding-bottom: 26px;
}
span.people {
    color: #F06523;
    border: 3px dotted;
    padding-right: 6px;
    padding-left: 6px;
}  
/*********table**********/
.grey.lighten-2 {
    background-color: #e0e0e0 !important;
}
.table-bordered th, .table-bordered td {
    border-right: none;
    border-left: none;
}
</style>
@stop

@section('content')
<section class="main-body-section">
    <div class="content-body">
        <h3 class="page-title">Total Franchise Registration
            <small>See all the Franchise Registration from here</small>
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-layers font-green-haze" aria-hidden="true"></i>
                            <span class="caption-subject font-green-haze bold uppercase">Franchise Registration</span>
                        </div>
                        <div class="pull-right">
                           
                        </div>
                    </div>
                    <div class="portlet-body">
                   <form class="" id="franchise-total-registration-form" action="{{ Route('post-franchise-registration') }}" method="POST">
                    @csrf
                    <div class="row">
                       
                        <div class="col-sm-3">
                          <div class="form-group">
                          <label for="usr" class="f-label">Franchise*</label>
                          <select name="franchise" class="form-control">
                            <option value="">--select the franchise--</option>
                          @forelse($franchises as $franchise)
                    		<option value="{{$franchise->id}}">{{$franchise->name}}</option>
                    	  @empty
                    	  @endforelse
                          
                          </select> 
                          <div class="help-block" id="error-franchise"></div> 
                          </div>
                        </div>
                        @php
						$years=range(date('Y'),2020);
						@endphp
                        <div class="col-sm-3">
                          <div class="form-group">
                          <label for="usr" class="f-label">YEAR*</label>
                          <select name="year" class="form-control">
                            
                          @forelse($years as $year)
                    		<option value="{{$year}}">{{$year}}</option>
                    	  @empty
                    	  @endforelse
                          </select> 
                          </div>
                        </div>
                       
                       
						<div class="col-sm-3">
						<div class="form-group">
						<label for="usr" class="f-label">MONTH*</label>
						<select name="month" class="form-control">
                        <option value="1">January</option>
                         <option value="2">February</option>
                         <option value="3">March</option>
                         <option value="4">April</option>
                         <option value="5">May</option>
                         <option value="6">June</option>
                         <option value="7">July</option>
                         <option value="8">August</option>
                         <option value="9">September</option>
                         <option value="10">October</option>
                         <option value="11">November</option>
                         <option value="12">December</option>
                  		</select> 
						</div>
						</div>
                       
                       <div class="col-sm-3">
                        <label for="usr"></label>
						<div class="frm-btn text-center mt-3">
						  <input type="submit" value="SUBMIT">
					    </div>
					   </div>
                      
                      </div>
                  </form>
                      
                      <div class="" id="result">
                        
                      
                      
                        
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

</script>
@stop