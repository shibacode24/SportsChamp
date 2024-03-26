@extends('layout')
@section('content')
    @include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <form action="{{ route('student_report') }}" method="get" enctype="multipart/form-data">
                    <div class="col-md-3" style="margin-top: 2vh;"></div>
                    <div class="col-md-5" style="margin-top: 2vh;">
                        <table>
                            <tr style="height:30px;">
                                <th width="5%">From Date</th>
                                <th width="5%">To Date</th>
                            </tr>



                            <tr>
                                <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" name="from_date" value="{{ app()->request->input('from_date') }}" placeholder="" />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" value="{{ app()->request->input('to_date') }}" name="to_date" placeholder="" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <table width="100%">


                        <tr style="height:30px;">

                            <th width="2%">Select School</th>

                            <th width="1%">Grade</th>
                            <th width="1%">Section</th>

                            <th width="2%"></th>
                        </tr>



                        <tr>


                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="school_code">
                                    <option value="">Select</option>
                                    @foreach ($school as $schools)
                                    <option value={{$schools->school_code}} @if (app()->request->input('school_code') == $schools->school_code)
                                        selected
                                    @endif>{{$schools->school_name}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="grade_id">
                                    <option value="">Select</option>
                                    @foreach ($grade as $grades)
                                    <option value={{$grades->id}} @if (app()->request->input('grade_id') == $grades->id)
                                        selected
                                    @endif>{{$grades->grade}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="section_id">
                                    <option value="">Select</option>
                                    @foreach ($section as $sections)
                                    <option value={{$sections->id}} @if (app()->request->input('section_id') == $sections->id)
                                        selected
                                    @endif>{{$sections->section_name}}</option>
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

                </form>
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
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $students)
                            <tr>

                                <td>{{$loop->iteration}}</td>

                                <td>{{$students->roll_no}}</td>
                                <td>{{$students->name}}</td>
                                <td>{{$students->dob}}</td>
                                <td>{{$students->email}}</td>
                               <td> <button data-toggle="modal" data-target="#popup3" id="{{ $students->id }}"
                                student_name="{{ $students->name }}"
                                grade_id="{{ $students->class }}"  section_id="{{ $students->section }}" style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="button" class="btn btn-info view" data-toggle="tooltip"
                                data-placement="top" title="View"><i class="fa fa-eye"
                                    style="margin-left:5px;"></i></button></td>
                            </tr>


                            @endforeach
                            
                        </tbody>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Report Card</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
    
                            <div class="col-md-12" id="table_append">
    
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
                <!-- END DEFAULT DATATABLE -->


            </div>
        </div>

    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $(".view").on('click', function() {
                console.log('alart');
                $("#table_append").html('');
                $student_name = $(this).attr('student_name');
                $grade_id = $(this).attr('grade_id');
                $section_id = $(this).attr('section_id');

                $.ajax({
                    type: "get",
                    url: '{{ route('get_student_data') }}',
                    dataType: "json",
                    data: {
                        student_name: $student_name,
                        grade_id: $grade_id,
                        section_id: $section_id,
                       
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
          
        });
    </script>
@stop