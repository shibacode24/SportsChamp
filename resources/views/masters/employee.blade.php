@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <form action="{{ route('employee_store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="80%">
                    <tr style="height:30px;">
                        <th width="1%">Date</th>
                        <th width="1%">Select Designation</th>
                        <th width="1%">City</th>
                        <th width="1%">Emp Code</th>
                        <th width="1%">Assign School</th>
                        <th width="3%">Name</th>

                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="1%">
                            {{-- <div class="input-group">
                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                    </div> --}}

                            {{-- <div class="input-group">
                        <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-calendar"></span></span>
                    </div> --}}
                            {{-- <td style="padding: 2px;" width="3%"> --}}
                            <input type="date" class="form-control" name="date" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <select class="form-control select" data-live-search="true" name="designation_id">
                                <option value="">Select</option>
                                @foreach ($designation as $designations)
                                    <option value="{{ $designations->id }}">{{ $designations->designation }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <select class="form-control select" data-live-search="true" name="city_id">
                                <option value="">Select</option>
                                @foreach ($city as $cities)
                                    <option value="{{ $cities->id }}">{{ $cities->city_name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="emp_code" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="2%">
                            <select class="form-control select" data-live-search="true" name="school_id">
                                <option value="">Select</option>
                                @foreach ($school as $school)
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                    </tr>
                    <tr style="height:30px;">

                        <th width="2%">Email</th>
                        <th width="1%">Mobile No.</th>

                        <th width="2%">Address</th>
                        <th width="1%">Pincode</th>
                        <th width="1%">Username</th>
                        <th width="1%">Password</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="email" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="contact_no" maxlength="10" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="address" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="pincode" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="username" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="password" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>
                </table>



            </div>

        </div>
    </form>


    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Designation</th>
                            <th>City</th>
                            <th>Emp Code</th>
                            <th>Assign School</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile No.</th>
                            <th>Email</th>                           
                            <th>Pincode</th>
                            <th>Username</th>
                            {{-- <th>Password</th> --}}

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $employe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($employe->date)) }}</td>
                                <td>{{ $employe->designation_name->designation ?? ''}}</td>
                                <td>{{ $employe->city_name->city_name ?? ''}}</td>
                                <td>{{ $employe->emp_code }}</td>
                                <td>{{ $employe->school_name->school_name ?? '' }}</td>


                                <td>
                                    {{ $employe->name }}
                                </td>
                                <td>{{ $employe->address }}</td>
                                <td>{{ $employe->contact_no }}</td>
                                <td>{{ $employe->email }}</td>

                                <td>{{ $employe->pincode }}</td>
                                <td>{{ $employe->username }}</td>
                                {{-- <td>{{ $employe->password }}</td> --}}
                                <td>

                                    <a href="{{ route('employee_edit', $employe->id) }}"> <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                    </a>

                                    <button onclick="openCustomModal('{{ route('employee_destroy', $employe->id) }}')"
                                        id="customModal"
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>


@stop
