@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <form action="{{ route('update_principal') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$principal_edit->id}}">
        <div class="row">
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="80%">
                    <tr style="height:30px;">
                        <th width="2%">Name</th>
                        <th width="2%">Email</th>
                        <th width="1%">Contact No</th>
                        <th width="1%">Select School</th>
                        <th width="1%">UserName</th>
                        <th width="3%">Password</th>
                        <th width="1%"></th>
                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="3%">
                           
                            <input type="text" class="form-control" name="name" value="{{$principal_edit->name}}" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                           
                            <input type="text" class="form-control" name="email" value="{{$principal_edit->email}}" placeholder="" />
                        </td>
                      

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="contact_no" value="{{$principal_edit->contact_no}}" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="2%">
                            <select class="form-control select" data-live-search="true" name="school_id">
                                <option disabled selected>Select</option>
                                @foreach ($school as $school)
                                    <option value="{{ $school->id }}" @if ($principal_edit->school_id == $school->id)
                                        selected
                                    @endif>{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="username" value="{{$principal_edit->username}}" placeholder="" />
                        </td>

                        
                        <td style="padding: 2px;" width="3%">
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

@stop
