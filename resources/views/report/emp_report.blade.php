@extends('layout')
@section('content')
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">


                <div class="col-md-8" style="margin-top: 2vh;">
                    <form action="{{ route('emp_report') }}" method="get" enctype="multipart/form-data">
                      
                        <div class="col-md-4" style="margin-top: 2vh;"></div>
                        <div class="col-md-3" style="margin-top: 2vh;">
                            <table>
                                <tr style="height:30px;">
                                    <th width="5%">From Date</th>
                                <th width="5%">To Date</th>
                                    <th width="5%">Select Emp</th>
                                    <th width="5%"></th>
  
                                </tr>



                                <tr>
                                       <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" name="from_date" value="{{ app()->request->input('from_date') }}" placeholder="" />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" value="{{ app()->request->input('to_date') }}" name="to_date" placeholder="" />
                                </td>
                                    <td style="padding: 2px;" width="5%">
                                        <select class="form-control select" data-live-search="true" name="emp_id"
                                            id="emp">
                                            <option disabled selected>Select</option>
                                            @foreach ($emp as $emps)
                                                <option value="{{ $emps->id }}" @if (app()->request->input('emp_id') == $emps->id)
                                                    selected @endif>{{ $emps->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                class="fa fa-search" aria-hidden="true"></i>
                                            Search</button>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        


                      
                    </form>
                </div>
            </div>
                <div class="row" style="margin-top: 10%">
                    <div class="panel panel-default tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Attendace</a></li>
                            <li><a href="#tab-second" role="tab" data-toggle="tab">Leave</a></li>
                            <li><a href="#tab-third" role="tab" data-toggle="tab">Daily Report</a></li>
                        </ul>
                        <div class="panel-body tab-content">
                            <div class="tab-pane active" id="tab-first">

                                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                    <table class="table datatable" style="overflow:auto !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Employee Nmae</th>
                                                <th>Date</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attendance as $attendances)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>

                                                <td>{{$attendances->emp_name->name}}</td>
                                                <td>{{$attendances->date}}</td>
                                               
                                            </tr>


                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab-second">
                                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                    <table class="table datatable" style="overflow:auto !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr Np</th>
                                                <th>Emp Name</th>
                                               <th>Leave Type</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Reason</th>
                                                {{-- <th>Admin Remark</th> --}}
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leave as $leaves)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>

                                                <td>{{$leaves->emp_name->name}}</td>
                                                <td>{{$leaves->leave_type}}</td>
                                                <td>{{$leaves->from_date}}</td>
                                                <td>{{$leaves->to_date}}</td>
                                                <td>{{$leaves->reason}}</td>
                                                {{-- <td>{{$leaves->admin_remark}}</td> --}}
                                                <td>{{$leaves->status}}</td>

                                            </tr>


                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-third">
                                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                    <table class="table datatable" style="overflow:auto !important;">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Emp Name</th>
                                                <th>Photo</th>

                                                <th>Remark</th>

                            
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($daily_report as $daily_reports)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>

                                                <td>{{$daily_reports->emp_name->name}}</td>
                                                <td>
                                                    <a href="{{asset("images/report/$daily_reports->photo")}}"><img src="{{asset("images/report/$daily_reports->photo")}}"
                                                        ></a>
                                                </td>
                                                <td>{{$daily_reports->remark}}</td>
                                               
                                            </tr>


                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                </div>
            </div>

        </div>
    @stop
