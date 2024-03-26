@extends('layout')
@section('content')
    @include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <form action="{{ route('assessment_report') }}" method="get" enctype="multipart/form-data">
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

                            <th width="2%">Select Emp</th>

                            <th width="1%">Grade</th>
                            <th width="1%">Section</th>

                            <th width="2%"></th>
                        </tr>



                        <tr>


                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="emp_id">
                                    <option value="">Select</option>
                                    @foreach ($emp as $emps)
                                    <option value={{$emps->id}} @if (app()->request->input('emp_id') == $emps->id)
                                        selected
                                    @endif>{{$emps->name}}</option>
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
                                <th>Date of Upload</th>
                                <th>No. of Students</th>
                                <th>Uploaded Excel</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($assessment as $assessments)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('d-m-Y', strtotime($assessments->created_at)) }}</td>
                                   
                                    <td>{{ $assessments->total_student }}</td>

                                    {{-- <td>{{ $assessments->excel_file->file ?? '' }}</td> --}}
                                    <td>
                                    <a href="{{ asset('images/assessment_files/' . $assessments->excel_file->file ?? '') }}" target="_blank">
                                        Excel Download
                                    </a>
                                    </td>
                                
                                    <td>
                                        <button data-toggle="modal" data-target="#popup3" id="{{ $assessments->emp_id }}"
                                            grade_id="{{ $assessments->grade_id }}"  section_id="{{ $assessments->section_id }}" excel_id="{{ $assessments->excel_id }}" style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info view" data-toggle="tooltip"
                                            data-placement="top" title="View"><i class="fa fa-eye"
                                                style="margin-left:5px;"></i></button>

                                        {{-- <a href="{{ route('time_table_edit', $time_table->id) }}">
                                            <button
                                                style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                        </a>
                                        <button
                                            onclick="openCustomModal('{{ route('time_table_destroy', $time_table->id) }}')"
                                            id="customModal"
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button> --}}
                                    </td>
                                </tr>
                            @endforeach
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
                            <h4 class="modal-title" id="H4">Report</h4>
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
                $emp_id = $(this).attr('emp_id');
                $grade_id = $(this).attr('grade_id');
                $section_id = $(this).attr('section_id');
                $excel_id = $(this).attr('excel_id');

                $.ajax({
                    type: "get",
                    url: '{{ route('get_assessment_data') }}',
                    dataType: "json",
                    data: {
                        emp_id: $emp_id,
                        grade_id: $grade_id,
                        section_id: $section_id,
                        excel_id: $excel_id,
                       
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
          
        });
    </script>
@stop