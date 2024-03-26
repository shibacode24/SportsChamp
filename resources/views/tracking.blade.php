@extends('layout')
@section('content')
@include('alert')


    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="1%">Select Employee</th>
                        <th width="1%">From Date</th>
                        <th width="1%">To Date</th>


                        <th width="2%"></th>
                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true">
                                <option>Employee1</option>
                                <option>Employee2</option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>

                            <div class="input-group">
                                <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>

                            <div class="input-group">
                                <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>

                        <td>
                            <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>

                </table>
            </div>

        </div>
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top:15px;">

                <!-- START DEFAULT DATATABLE -->

                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Selected Employee</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Tracking</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Employee1</td>
                                <td>20-12-2023</td>

                                <td>22-12-2023</td>
                                <td>
                                    <img src="{{asset('img/png.png')}}" width="20" height="20" />
                                </td>

                                <td>

                                    <button
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    <button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

                <!-- END DEFAULT DATATABLE -->


            </div>
        </div>

    </div>

@stop
