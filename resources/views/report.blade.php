@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel-body" style="padding:1px 5px 2px 5px;">

                <div class="col-md-12" style="margin-top:5px;">
                    <label
                        style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                        align="center"><span class="fa fa-file"></span> <strong>Reports</strong></label>


                    <a href="#"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-bank"></i>Schools</button>
                    </a>
                    <a href="#"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #008799;"><i
                                class="fa fa-users"></i>Students</button>
                    </a>
                    <a href="#"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #009900;"><i
                                class="fa fa-user"></i>Employees</button>
                    </a>
                    <a href="#"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #998c00;"><i
                                class="fa fa-bars"></i>Props</button>
                    </a>
                    <a href="#"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #7f0099;"><i
                                class="fa fa-edit"></i>Assessments</button>
                    </a>

                </div>

            </div>
        </div>
    </div>
@stop
