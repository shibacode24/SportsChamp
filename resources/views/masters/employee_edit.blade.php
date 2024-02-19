@extends('layout')
@section('content')
@include('master')

<form action="{{ route('update_employee') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$employee_edit->id}}">
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
                        <input type="date" class="form-control" name="date" value="{{$employee_edit->date}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <select class="form-control select" data-live-search="true"  name="designation_id">
                            <option value="">Select</option>
                            @foreach ($designation as $designations)
                                <option value="{{ $designations->id }}" @if ($employee_edit->designation_id == $designations->id) selected @endif>{{ $designations->designation }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <select class="form-control select" data-live-search="true" name="city_id">
                            <option value="">Select</option>
                            @foreach ($city as $cities)
                                <option value="{{ $cities->id }}"  @if ($employee_edit->city_id == $cities->id) selected @endif>{{ $cities->city_name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="emp_code" value="{{$employee_edit->emp_code}}" placeholder="" />
                    </td>

                    <td style="padding: 2px;" width="2%">
                        <select class="form-control select" data-live-search="true" name="school_id">
                            <option value="">Select</option>
                            @foreach ($school as $school)
                                <option value="{{ $school->id }}" @if ($employee_edit->school_id == $school->id) selected @endif>{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" value="{{$employee_edit->name}}" placeholder="" />
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
                        <input type="text" class="form-control" name="email" value="{{$employee_edit->email}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="contact_no" maxlength="10" value="{{$employee_edit->contact_no}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="address" value="{{$employee_edit->address}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="pincode" value="{{$employee_edit->pincode}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="username" value="{{$employee_edit->username}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="password" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-floppy-o" aria-hidden="true"></i>
                            Update</button>
                    </td>
                </tr>
            </table>



        </div>

    </div>
</form>



@stop