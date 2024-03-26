@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <form action="{{ route('update_school') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$school_edit->id}}">
        <div class="col-md-12" style="margin-top: 2vh;">
            <table width="100%">
                <tr style="height:30px;">
                    <th width="2%">Date</th>
                    <th width="2%">School Code</th>
                    <th width="3%">School Name</th>
                    <th width="2%">Address</th>
                    <th width="2%">City</th>
                    <th width="3%">Contact Person Name</th>
                    <th width="2%">Contact No.</th>
                    <th width="2%">Email</th>
                    <th width="1%">Latitude</th>
                    <th width="1%">Longitude </th>
                    <th width="2%"></th>
                </tr>


                <tr>
                    {{-- <td style="padding: 2px;" width="2%">
                    {{-- <div class="input-group">
                        <input type="hidden" id="dp-3" class="form-control datepicker" 
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy" name="date" data-date-viewmode="years" />
                    </div> --}}

                    {{-- <div class="input-group">
                        <input type="text" id="dp-3" class="form-control " data-date="01-05-2020"
                            data-date-format="dd-mm-yyyy" name="date" data-date-viewmode="years" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </td> --}}

                    <td style="padding: 1px;" width="1%">
                        <input type="date" class="form-control" name="date" value="{{$school_edit->date}}" placeholder="" />
                    </td>

                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="school_code" value="{{$school_edit->school_code}}" placeholder="" />
                    </td>

                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="school_name" value="{{$school_edit->school_name}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="address" value="{{$school_edit->address}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <select class="form-control select" data-live-search="true" name="city_id">
                            <option value="">Select</option>
                            @foreach ($city as $cities)
                                <option value="{{ $cities->id }}" @if ($school_edit->city_id == $cities->id) selected @endif>{{ $cities->city_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="contact_person_name" value="{{$school_edit->contact_person_name}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="contact_no" maxlength="10" value="{{$school_edit->contact_no}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="email" value="{{$school_edit->email}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="latitude" value="{{$school_edit->latitude}}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="longitude" value="{{$school_edit->longitude}}" placeholder="" />
                    </td>
                    <td>
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-floppy-o" aria-hidden="true"></i>
                            update</button>
                    </td>
                </tr>

            </table>



        </div>
    </form>

    </div>



@stop
