@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('student-excel-import') }}" enctype="multipart/form-data" method="post">
                @csrf
                <table width="20%">

                    <tr>
                        <td style="padding:5px;" align="center">
                            <input type="file" class="fileinput mjks" name="excel_file" id="filename3"
                                data-filename-placement="inside" title="Choose File" />
                        </td>
                        <td style="padding:5px;" align="center">
                            <a> <button id="on" type="submit" class="btn mjks" class="fileinput btn-primary"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #1197c4;">
                                    <i class="fa fa-upload" aria-hidden="true"></i>Bulk Upload</button></a>
                        </td>


                        <td style="padding:5px;" align="center">
                            <a href="{{ asset('excel/student_entry_new.xlsx') }}"> <button id="on" type="button"
                                    class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #173b9f;">
                                    <i class="fa fa-download" aria-hidden="true"></i>Download Sample</button></a>
                        </td>
                    </tr>

                </table>
            </form>


        </div>

    </div>


    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>School Code</th>
                            <th>No.of Students</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->created_at->format('d-m-Y') }}</td>
                                <td>{{ $student->school_code }}</td>
                                <td>
                                    {{ $student->student_count }}
                                </td>

                                <td>

                                    <button data-toggle="modal" data-target="#popup3"
                                        school_code="{{ $student->school_code }}"
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view_student_list" data-toggle="tooltip"
                                        data-placement="top" title="View"><i class="fa fa-eye"
                                            style="margin-left:5px;"></i></button>
                                    {{-- <button
                                        style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Re-Upload"><i class="fa fa-upload" style="margin-left:5px;"></i></button> --}}
                                    <a href="{{ route('delete_student_school_code', $student->school_code) }}" ><button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Students</h4>
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
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $(".view_student_list").on('click', function() {
                console.log('alart');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_student_list') }}',
                    dataType: "json",
                    data: {
                        school_code: $(this).attr('school_code')
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
        })
    </script>

@stop
