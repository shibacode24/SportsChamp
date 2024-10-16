@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <form action="{{ route('principal_store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="80%">
                    <tr style="height:30px;">
                        <th width="1%">Name</th>
                        <th width="1%">Email</th>
                        <th width="1%">Contact No</th>
                        <th width="1%">Select School</th>
                        <th width="1%">UserName</th>
                        <th width="3%">Password</th>
                        <th width="1%"></th>
                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="3%">
                           
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                           
                            <input type="text" class="form-control" name="email" placeholder="" />
                        </td>
                      

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="contact_no" placeholder="" />
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
                            <input type="text" class="form-control" name="username" placeholder="" />
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


    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Select School</th>
                            <th>Contact No</th>
                            <th>UserName</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($principal as $principals)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                               
                                <td>{{ $principals->name }}</td>
                                <td>{{ $principals->email }}</td>

                                <td>{{ $principals->school_name->school_name ?? '' }}</td>

                                <td>{{ $principals->contact_no }}</td>
                                <td>{{ $principals->username }}</td>
                              
                                <td>

                                    <a href="{{ route('principal_edit', $principals->id) }}"> <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                    </a>

                                    <button onclick="openCustomModal('{{ route('principal_destroy', $principals->id) }}')"
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
