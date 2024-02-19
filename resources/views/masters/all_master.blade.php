@extends('layout')
@section('content')
    @include('master')

    <div class="row">
        <div class="col-md-12" style="margin-top: 2vh;">
            <form action="{{ route('masters') }}" method="post">
                @csrf
                <div class="col-md-2">
                    <label class="control-label">Add City<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="city_name" placeholder="" />
                </div>

                <div class="col-md-2" style="margin-top:15px;">
                    <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                        <i class="fa fa-plus"></i>ADD</button>
                    <button id="on" type="button" data-toggle="modal" data-target="#popup8" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

                </div>

            </form>

            <!-- =========================================City model===================== -->
            <div class="modal" id="popup8" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Added City</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <table class="table datatable">
                                    <thead>

                                        <tr>
                                            <th>Sr. No.</th>

                                            <th>Added City</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($city as $cities)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $cities->city_name }}</td>

                                                <td>
                                                    <button data-toggle="modal" value="{{ $cities->id }}"
                                                        city_name="{{ $cities->city_name }}" data-target="#popup13"
                                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info editbtn_city"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                    <a href="{{ route('city_destroy', $cities->id) }}">
                                                        <button
                                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                                style="margin-left:5px;"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- ===============================edit city======================== -->
            <div class="modal" id="popup13" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Update City</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <div class="col-md-12">
                                    <form action="{{ route('update_city') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="" id="city_id" name="city_id" />
                                        <div class="col-md-6">
                                            <label class="control-label"> City<font color="#FF0000">*</font></label>
                                            <input type="text" class="form-control" id="city_name" name="city_name"
                                                placeholder="" />
                                        </div>

                                        <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                            <button id="on" type="submit" class="btn mjks"
                                                style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                    class="fa fa-plus"></i>Update</button>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
            {{-- ================ end of city ============ --}}

            <!-- ======================================designation start================================== -->
            <form action="{{ route('designation_store') }}" method="post">
                @csrf
                <div class="col-md-2">
                    <label class="control-label">Add Designation<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="designation" placeholder="" />
                </div>

                <div class="col-md-2" style="margin-top:15px;">
                    <button id="on" type="submit" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                    <button id="on" type="button" data-toggle="modal" data-target="#popup3" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

                </div>
            </form>

            <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Added Designation</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>

                                            <th>Added Designation</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($designation as $designations)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $designations->designation }}</td>


                                                <td>

                                                    <button designation_id="{{ $designations->id }}"
                                                        designation_name="{{ $designations->designation }}"
                                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info editbtn_designation"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                    <a href="{{ route('designation_destroy', $designations->id) }}">
                                                        <button
                                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                                style="margin-left:5px;"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="popup14" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Update Designation</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <form action="{{ route('update_designation') }}" method="post">
                                    @csrf
                                    <input type="text" id="designation_id" name="designation_id">
                                    <div class="col-md-12">

                                        <div class="col-md-6">
                                            <label class="control-label"> Designation<font color="#FF0000">*</font>
                                            </label>
                                            <input type="text" class="form-control" id="designation"
                                                name="designation" placeholder="" />
                                        </div>

                                        <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                            <button id="on" type="submit" class="btn mjks"
                                                style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                    class="fa fa-plus"></i>Update</button>


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================= designation end======================-->
            <form action="{{ route('grade_store') }}" method="post">
                @csrf
                <div class="col-md-2">
                    <label class="control-label">Add Grade<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="grade" placeholder="" />
                </div>

                <div class="col-md-2" style="margin-top:15px;">
                    <button id="on" type="submit" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;">
                        <i class="fa fa-plus"></i>ADD</button>
                    <button id="on" type="button" data-toggle="modal" data-target="#popup5" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

                </div>
            </form>
        </div>

        <!-- ================================================Grade Model===================================== -->
        <div class="modal" id="popup5" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added Grade</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Added Grade</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grade as $grades)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $grades->grade }}</td>

                                            <td>

                                                <button data-toggle="modal" data-target="#popup15"
                                                    value="{{ $grades->id }}" grade_name={{ $grades->grade }}
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info editbtn_grade"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <a href="{{ route('grade_destroy', $grades->id) }}"> <button
                                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                            style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="popup15" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Update Grade</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <form action="{{ route('update_grade') }}" method="post">
                                @csrf
                                <input type="hidden" id="grade_id" name="grade_id">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <label class="control-label"> Grade<font color="#FF0000">*</font></label>
                                        <input type="text" class="form-control" id="grade" name="grade"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                class="fa fa-plus"></i>Update</button>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================End Grade Model========================= -->


        <div class="col-md-12">
            <img src="{{ asset('img/line.png') }}" width="100%" />
        </div>
        <form action="{{ route('section_store') }}" method="post">
            @csrf
            <div class="col-md-12" style="margin-top: 2vh;">
                <div class="col-md-1">
                    <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                    <select class="form-control select" data-live-search="true" name="grade_id">
                        <option value="">Select</option>
                        @foreach ($grade as $grade1)
                            <option value="{{ $grade1->id }}">{{ $grade1->grade }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="col-md-1">
                    <label class="control-label">Add Section<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="section_name" placeholder="" />
                </div>

                <div class="col-md-2" style="margin-top:15px;">
                    <button id="on" type="submit" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;">
                        <i class="fa fa-plus"></i>ADD</button>
                    <button id="on" type="button" data-toggle="modal" data-target="#popup6" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

                </div>
        </form>

        <div class="modal" id="popup6" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added Sections</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Selected Grade</th>
                                        <th>Added Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($section as $sections)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $sections->grade_name->grade ?? '' }}</td>
                                            <td>{{ $sections->section_name }}</td>
                                            <td>

                                                <button data-toggle="modal" data-target="#popup16"
                                                    value="{{ $sections->id }}" grade_id="{{ $sections->grade_id }}"
                                                    section_name="{{ $sections->section_name }}"
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info editbtn_section"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <a href="{{ route('section_destroy', $sections->id) }}"> <button
                                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                            style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="popup16" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('update_section') }}" method="post">
                        @csrf
                        <input type="hidden" id="section_id" name="section_id">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Update Sections</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <div class="col-md-12">

                                    <div class="col-md-2" style="margin-right: 5px;">
                                        <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                                        <select class="form-control select" data-live-search="true" name="grade_id"
                                            id="grade_id_option">
                                            <option value="">Select</option>
                                            @foreach ($grade as $grade1)
                                                <option value="{{ $grade1->id }}">{{ $grade1->grade }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    {{-- @if ($this->grade_id == $grade1->id) selected @endif --}}
                                    <div class="col-md-2">
                                        <label class="control-label">Add Section<font color="#FF0000">*</font></label>
                                        <input type="text" class="form-control" id="section_name" name="section_name"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                class="fa fa-plus"></i>Update</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================End section model================================== -->

        <form action="{{ route('prop_store') }}" method="post">
            @csrf
            <div class="col-md-2">
                <label class="control-label">Add Prop Type<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="prop_name" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="sub,it" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup7" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>

        </form>

        <div class="modal" id="popup7" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added Prop Types</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Added Prop Types</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prop as $props)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $props->prop_name }}</td>

                                            <td>

                                                <button data-toggle="modal" data-target="#popup17"
                                                    value="{{ $props->id }}" prop_name="{{ $props->prop_name }}"
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info editbtn_prop"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <a href="{{ route('prop_destroy', $props->id) }}"> <button
                                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                            style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="popup17" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Update Prop Type</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <form action="{{ route('update_prop') }}" method="post">
                            @csrf
                            <input type="hidden" id="prop_id" name="prop_id">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <label class="control-label"> Add Prop Types<font color="#FF0000">*</font></label>
                                        <input type="text" class="form-control" id="prop_name" name="prop_name"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                class="fa fa-plus"></i>Update</button>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================End prop model================================== -->

        {{-- ============================================== add category================================ --}}

        <form action="{{ route('category_store') }}" method="post">
            @csrf
            <div class="col-md-2">
                <label class="control-label">Add category<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="category" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="sub,it" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup7c" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>

        </form>

        <div class="modal" id="popup7c" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added category</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Added category</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $categorys)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $categorys->category }}</td>

                                            <td>

                                                <button data-toggle="modal" data-target="#popup17c"
                                                    value="{{ $categorys->id }}" category_name="{{ $categorys->category }}"
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info editbtn_category"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <a href="{{ route('category_destroy', $categorys->id) }}"> <button
                                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                            style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="popup17c" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Update Category</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <form action="{{ route('update_category') }}" method="post">
                            @csrf
                            <input type="hidden" id="category_id" name="category_id">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <label class="control-label"> Add category<font color="#FF0000">*</font></label>
                                        <input type="text" class="form-control" id="category_name" name="category"
                                            placeholder="" />
                                    </div>

                                    <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                class="fa fa-plus"></i>Update</button>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        {{-- ======================================== End category model ============================== --}}

    </div>
    <div class="col-md-12">
        <img src="{{ asset('img/line.png') }}" width="100%" />
    </div>
    <form action="{{ route('vendor_store') }}" method="post">
        @csrf
        <div class="col-md-12" style="margin-top: 2vh;">
            <div class="col-md-2">
                <label class="control-label">Add Vendor Name<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="vendor_name" placeholder="" />
            </div>
            <div class="col-md-1">
                <label class="control-label">Mobile No.<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="" />
            </div>
            <div class="col-md-2" style="margin-right: 5px;">
                <label class="control-label">Select City<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="city_id">
                    <option value="">Select</option>
                    @foreach ($city as $city1)
                        <option value="{{ $city1->id }}">{{ $city1->city_name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label">Email<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="email" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup9" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>

        </div>
    </form>

    <div class="modal" id="popup9" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Vendor</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>

                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Vendor Name</th>
                                    <th>Mobile No.</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendor as $vendors)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $vendors->vendor_name }}</td>
                                        <td>{{ $vendors->mobile }}</td>
                                        <td>{{ $vendors->cityName->city_name }}</td>
                                        <td>{{ $vendors->email }}</td>
                                        <td>

                                            <button data-toggle="modal" data-target="#popup18"
                                                value="{{ $vendors->id }}" vendor_name="{{ $vendors->vendor_name }}"
                                                mobile="{{ $vendors->mobile }}" vendor_city_id="{{ $vendors->city_id }}"
                                                email="{{ $vendors->email }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info editbtn_vendor" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                            <a href="{{ route('vendor_destroy', $vendors->id) }}"> <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                        style="margin-left:5px;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="popup18" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Vendor</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <form action="{{ route('update_vendor') }}" method="post">
                                @csrf
                                <input type="hidden" id="vendor_id" name="vendor_id">
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Add Vendor Name<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="vendor_name" name="vendor_name"
                                        placeholder="" />
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Mobile No.<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        maxlength="10" placeholder="" />
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Select City<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" id="vendor_city_id"
                                        name="city_id">
                                        <option value="">Select</option>
                                        @foreach ($city as $city1)
                                            <option value="{{ $city1->id }}">{{ $city1->city_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Email<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="" />
                                </div>

                                <div class="col-md-2" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ================================================end of vondor======================== -->


    <div class="col-md-12">
        <img src="{{ asset('img/line.png') }}" width="100%" />
    </div>
    <div class="col-md-12">
        <h5 style="font-weight: bold;text-align: center;">Fitness Assessment</h5>
        <form action="{{ route('test_component_store') }}" method="post">
            @csrf
            {{-- <div class="col-md-1" style="margin-right: 5px;">
                <label class="control-label">Select Test<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true"
                    name="test_id">
                    <option value="">Select</option>
                    @foreach ($city as $city1)
                        <option value="{{ $city1->id }}">{{ $city1->city_name }}</option>
                    @endforeach

                </select>
            </div> --}}
            <div class="col-md-2">
                <label class="control-label">Name of Test Components<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="name_of_test_components" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup10" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>
        </form>

        <div class="modal" id="popup10" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added Fitness Assessment</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        {{-- <th>Selected Grade</th> --}}
                                        <th>Name of Test</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($TestComponent as $TestComponents)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{$TestComponents->test_id}}</td> --}}
                                            <td>{{ $TestComponents->name_of_test_components }}</td>


                                            <td>

                                                <button data-toggle="modal" data-target="#popup19"
                                                    value="{{ $TestComponents->id }}"
                                                    name_of_test_components="{{ $TestComponents->name_of_test_components }}"
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info editbtn_testcomponent"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                        class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <a href="{{ route('test_component_destroy', $TestComponents->id) }}">
                                                    <button
                                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                                        data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                            style="margin-left:5px;"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="popup19" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Update Fitness Assessment</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <div class="col-md-12">
                                <form action="{{ route('update_test_component') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="testcomponent_id" name="testcomponent_id">
                                    {{-- <div class="col-md-3" style="margin-right: 5px;">
                                <label class="control-label">Select Test<font color="#FF0000">*</font></label>
                                <select class="form-control select" data-live-search="true" id="test_id"
                                    name="test_id">
                                    <option value="">Select</option>
                                    @foreach ($city as $city1)
                                        <option value="{{ $city1->id }}">{{ $city1->city_name }}</option>
                                    @endforeach
                
                                </select>
                            </div> --}}

                                    <div class="col-md-3">
                                        <label class="control-label">Name of Test Components<font color="#FF0000">*</font>
                                        </label>
                                        <input type="text" class="form-control" id="name_of_test_components"
                                            name="name_of_test_components" placeholder="" />
                                    </div>

                                    <div class="col-md-4" style="margin-top:15px;padding-left: 10px;">
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;"> <i
                                                class="fa fa-plus"></i>Update</button>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================end of testcomponent======================== -->

        <form action="{{ route('fitness_store') }}" method="post">
            @csrf
            <div class="col-md-1">
                <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="grade_id">
                    <option value="">Select</option>
                    @foreach ($grade as $grade2)
                        <option value="{{ $grade2->id }}">{{ $grade2->grade }}</option>
                    @endforeach


                </select>
            </div>
            <div class="col-md-1" style="margin-right: 5px;">
                <label class="control-label">Select Test<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="test_id">
                    <option value="">Select</option>
                    @foreach ($TestComponent as $TestComponent2)
                        <option value="{{ $TestComponent2->id }}">{{ $TestComponent2->name_of_test_components }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label">Test Battery<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="test_battery" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="submit" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup11" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>
        </form>

    </div>

    <div class="modal" id="popup11" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Fitness Assessment</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Selected Grade</th>
                                    <th>Selected Test</th>
                                    <th>Test Battery</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fitness as $fitnesss)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fitnesss->grade_name->grade ?? '' }}</td>
                                        <td>{{ $fitnesss->test_name->name_of_test_components ?? '' }}</td>
                                        <td>{{ $fitnesss->test_battery }}</td>
                                        <td>

                                            <button data-toggle="modal" data-target="#popup20"
                                                value="{{ $fitnesss->id }}" fitness_test_id="{{ $fitnesss->test_id }}"
                                                fitness_grade_id="{{ $fitnesss->grade_id }}"
                                                fitness= "{{ $fitnesss->test_battery }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info editbtn_fitness" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                            <a href="{{ route('fitness_destroy', $fitnesss->id) }}"> <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                        style="margin-left:5px;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="popup20" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Fitness Assessment</h4>
                </div>
                <form action="{{ route('update_fitness') }}" method="post">
                    @csrf
                    <input type="hidden" id="fitness_id" name="fitness_id">
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" id="fitness_grade_id"
                                        name="grade_id">
                                        <option value="">Select</option>
                                        @foreach ($grade as $grade2)
                                            <option value="{{ $grade2->id }}">{{ $grade2->grade }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Select Test<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" name="test_id"
                                        id="fitness_test_id">
                                        <option value="">Select</option>
                                        @foreach ($TestComponent as $TestComponent2)
                                            <option value="{{ $TestComponent2->id }}">
                                                {{ $TestComponent2->name_of_test_components }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Test Battery<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" name="test_battery" id="fitness"
                                        placeholder="" />
                                </div>
                                <div class="col-md-2" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </div>
                </form>
            </div>
        </div>
        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
    </div>
    </div>
    </div>

    <!-- ================================================end of fitness==============================-->

    <div class="col-md-12">
        <img src="{{ asset('img/line.png') }}" width="100%" />
    </div>
    <div class="col-md-12">
        <h5 style="font-weight: bold;text-align: center;">Skills Assessment</h5>

        <form action="{{ route('skill_store') }}" method="post">
            @csrf
            <div class="col-md-2">
                <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="grade_id">
                    <option value="">Select</option>
                    @foreach ($grade as $grade3)
                        <option value="{{ $grade3->id }}">{{ $grade3->grade }}</option>
                    @endforeach


                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label">Add Skills<font color="#FF0000">*</font></label>
                <input type="text" class="form-control" name="skill" placeholder="" />
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="submit" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup12" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>
        </form>


   

    <div class="modal" id="popup12" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Skills Assessment</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Selected Grade</th>
                                    <th>Skills</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill->grade_name->grade ?? '' }}</td>
                                        <td>{{ $skill->skill }}</td>

                                        <td>

                                            <button data-toggle="modal" data-target="#popup21"
                                                value="{{ $skill->id }}" skill_grade_id="{{ $skill->grade_id }}"
                                                skill_name="{{ $skill->skill }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info editbtn_skill"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <a href="{{ route('skill_destroy', $skill->id) }}"> <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                        style="margin-left:5px;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="popup21" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Skills Assessment</h4>
                </div>
                <form action="{{ route('update_skill') }}" method="post">
                    @csrf
                    <input type="hidden" id="skill_id" name="skill_id">
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" id="skill_grade_id"
                                        name="grade_id">
                                        <option value="">Select</option>
                                        @foreach ($grade as $grade3)
                                            <option value="{{ $grade3->id }}">{{ $grade3->grade }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Add Skills<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="skill_name" name="skill"
                                        placeholder="" />
                                </div>
                                <div class="col-md-2" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================End skill model================================== -->

      {{-- ============================================== add curriculum================================ --}}

      <form action="{{ route('curriculum_store') }}" method="post">
        @csrf
        <div class="col-md-2">
            <label class="control-label">Add Curriculum<font color="#FF0000">*</font></label>
            <input type="text" class="form-control" name="curriculum" placeholder="" />
        </div>

        <div class="col-md-2" style="margin-top:15px;">
            <button id="on" type="sub,it" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                <i class="fa fa-plus"></i>ADD</button>
            <button id="on" type="button" data-toggle="modal" data-target="#popup7cm" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

        </div>

    </form>

    <div class="modal" id="popup7cm" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Curriculum</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Curriculum</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($curriculum as $curriculums)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $curriculums->name }}</td>

                                        <td>

                                            <button data-toggle="modal" data-target="#popup17cm"
                                                value="{{ $curriculums->id }}" curriculum_name="{{ $curriculums->name }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info editbtn_curriculum"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <a href="{{ route('curriculum_destroy', $curriculums->id) }}"> <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                        style="margin-left:5px;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="popup17cm" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Curriculum</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <form action="{{ route('update_curriculum') }}" method="post">
                        @csrf
                        <input type="hidden" id="curriculum_id" name="curriculum_id">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <label class="control-label"> Add Curriculum<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="curriculum_name" name="curriculum"
                                        placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- ======================================== End curriculum model ============================== --}}

    <!-- ================================================activity======================== -->
    <div class="col-md-12">
        <img src="{{ asset('img/line.png') }}" width="100%" />
    </div>
    <div class="col-md-12">
        <h5 style="font-weight: bold;text-align: center;">Add Activity</h5>

        <form action="{{ route('activity_store') }}" method="post">
            @csrf
            <div class="col-md-2">
                <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="grade_id">
                    <option value="">Select</option>
                    @foreach ($grade as $grade2)
                        <option value="{{ $grade2->id }}">{{ $grade2->grade }}</option>
                    @endforeach


                </select>
            </div>
            <div class="col-md-2" style="margin-right: 5px;">
                <label class="control-label">Select category<font color="#FF0000">*</font></label>
                <select class="form-control select" data-live-search="true" name="category">
                    <option value="">Select</option>
                    @foreach ($category as $categorys)
                    <option value="{{ $categorys->id }}">{{ $categorys->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="control-label">Activity<font color="#FF0000">*</font></label>
                {{-- <input type="text" class="form-control" name="activity" placeholder="" /> --}}
                <textarea class="form-control" name="activity"></textarea>
            </div>

            <div class="col-md-2" style="margin-top:15px;">
                <button id="on" type="submit" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-plus"></i>ADD</button>
                <button id="on" type="button" data-toggle="modal" data-target="#popup1d" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

            </div>
        </form>

    </div>

    <div class="modal" id="popup1d" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Activity</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Selected Grade</th>
                                    <th>Selected Category</th>
                                    <th>Activity</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity as $activitys)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $activitys->grade_name->grade ?? '' }}</td>
                                        <td>{{ $activitys->category_name->category ?? '' }}</td>
                                        <td>{{ $activitys->activity }}</td>
                                        <td>

                                            <button data-toggle="modal" data-target="#popup2d"
                                                value="{{ $activitys->id }}"
                                                activity_category="{{ $activitys->category }}"
                                                activity_grade_id="{{ $activitys->grade_id }}"
                                                activity= "{{ $activitys->activity }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info editbtn_activity"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <a href="{{ route('activity_destroy', $activitys->id) }}"> <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                        style="margin-left:5px;"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="popup2d" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Activity</h4>
                </div>
                <form action="{{ route('update_activity') }}" method="post">
                    @csrf
                    <input type="hidden" id="activity_id" name="activity_id">
                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" id="activity_grade_id"
                                        name="grade_id">
                                        <option value="">Select</option>
                                        @foreach ($grade as $grade2)
                                            <option value="{{ $grade2->id }}">{{ $grade2->grade }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Select category<font color="#FF0000">*</font></label>
                                    <select class="form-control select" data-live-search="true" name="category" id="category">
                                        <option value="">Select</option>
                                        @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}">{{ $categorys->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 5px;">
                                    <label class="control-label">Activity<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" name="activity" id="activity"
                                        placeholder="" />
                                </div>
                                <div class="col-md-2" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </div>
                </form>
            </div>
        </div>
        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
    </div>
    </div>
    </div>

    <!-- ================================================end of fitness==============================-->
    {{--  --}}
    <div class="col-md-12">
        <img src="{{ asset('img/line.png') }}" width="100%" />
    </div>
    </div>

    </div>

    </div>


    <!-- START DEFAULT DATATABLE -->


    </div>



    </div>

    <!-- PAGE CONTENT WRAPPER -->


    </div>
    <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- ============================Model for City====================================== -->

    <!-- ==========================End city Model===================================== -->
    <!-- ============================================Occupation Model================================= -->
    <div class="modal" id="popup4" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Category</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Category</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>

                                    <td>Category1</td>

                                    <td>

                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================================End Model========================== -->

    <!-- =========================================sale status model===================== -->

    <!-- =========================================Transaction model===================== -->
    <div class="modal" id="popup7" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Prop Types</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Prop Types</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>

                                    <td>Rope</td>

                                    <td>

                                        <button data-toggle="modal" data-target="#popup17"
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================End model================================== -->



    <div class="modal" id="popup21" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Skills Assessment</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <div class="col-md-2" style="margin-right: 5px;">
                                <label class="control-label">Select Grade<font color="#FF0000">*</font></label>
                                <select class="form-control select" data-live-search="true">
                                    <option>Class A</option>
                                    <option>Class B</option>

                                </select>
                            </div>
                            <div class="col-md-2" style="margin-right: 5px;">
                                <label class="control-label">Add Skills<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="name" placeholder="" />
                            </div>
                            <div class="col-md-2" style="margin-top:15px;padding-left: 10px;">
                                <button id="on" type="button" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;"> <i
                                        class="fa fa-plus"></i>Update</button>


                            </div>
                        </div>
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
    {{-- <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtn', function() {
                var city_id = $(this).val();

                $('#popup13').modal('show');

                $('#city_name').val($(this).attr('city_name'));
                $('#city_id').val($(this).attr('value'));
            });

            $(document).on('click', '.editbtn', function() {
                var designation_id = $(this).val();
                // console.log(designation_id);
                $('#popup14').modal('show');

                $('#designation').val($(this).attr('designation_name'));
                $('#designation_id').val($(this).attr('value'));
            });

        });
    </script> --}}
    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtn_city', function() {
                var city_id = $(this).val();

                $('#popup13').modal('show');

                $('#city_name').val($(this).attr('city_name'));
                $('#city_id').val($(this).attr('value'));
            });

            $(document).on('click', '.editbtn_designation', function() {
                var designation_id = $(this).val();
                // console.log(designation_id);

                $('#popup14').modal('show');

                $('#designation').val($(this).attr('designation_name'));
                $('#designation_id').val($(this).attr('designation_id'));
            });

            $(document).on('click', '.editbtn_grade', function() {
                var grade_id = $(this).val();
                // console.log(designation_id);
                $('#popup15').modal('show');

                $('#grade').val($(this).attr('grade_name'));
                $('#grade_id').val($(this).attr('value'));
            });

            $(document).on('click', '.editbtn_section', function() {
                var section_id = $(this).val();

                $('#popup16').modal('show');

                $('#section_name').val($(this).attr('section_name'));
                $('#grade_id_option').val($(this).attr('grade_id')).change();
                $('#section_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_prop', function() {
                var prop_id = $(this).val();

                $('#popup17').modal('show');

                $('#prop_name').val($(this).attr('prop_name'));
                $('#prop_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_category', function() {
                var category_id = $(this).val();

                $('#popup17c').modal('show');

                $('#category_name').val($(this).attr('category_name'));
                $('#category_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_curriculum', function() {
                var curriculum_id = $(this).val();

                $('#popup17cm').modal('show');

                $('#curriculum_name').val($(this).attr('curriculum_name'));
                $('#curriculum_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_vendor', function() {
                var vendor_id = $(this).val();

                $('#popup18').modal('show');

                $('#vendor_name').val($(this).attr('vendor_name'));
                $('#email').val($(this).attr('email'));
                $('#mobile').val($(this).attr('mobile'));
                $('#vendor_city_id').val($(this).attr('vendor_city_id')).change();
                $('#vendor_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_testcomponent', function() {
                var testcomponent_id = $(this).val();

                $('#popup19').modal('show');

                $('#name_of_test_components').val($(this).attr('name_of_test_components'));
                // $('#test_id').val($(this).attr('test_id')).change();
                $('#testcomponent_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_fitness', function() {
                var fitness_id = $(this).val();

                $('#popup20').modal('show');

                $('#fitness').val($(this).attr('fitness')).change();
                $('#fitness_test_id').val($(this).attr('fitness_test_id')).change();
                $('#fitness_grade_id').val($(this).attr('fitness_grade_id')).change();
                $('#fitness_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_skill', function() {
                var skill_id = $(this).val();

                $('#popup21').modal('show');

                $('#skill_name').val($(this).attr('skill_name')).change();
                $('#skill_grade_id').val($(this).attr('skill_grade_id')).change();
                $('#skill_id').val($(this).attr('value'));

            });

            $(document).on('click', '.editbtn_activity', function() {
                var activity_id = $(this).val();

                $('#popup2d').modal('show');

                $('#activity').val($(this).attr('activity')).change();
                $('#activity_category').val($(this).attr('category')).change();
                $('#activity_grade_id').val($(this).attr('activity_grade_id')).change();
                $('#activity_id').val($(this).attr('value'));

            });
        });
    </script>

@stop
