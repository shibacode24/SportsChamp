@extends('layout')
@section('content')
@include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <form action="{{ route('notification_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="2%">Title</th>
                            <th width="3%">Add Notification</th>

                            <th width="1%">Select User</th> 

                            <th width="2%"></th>
                        </tr>


                        <tr>
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="title" placeholder="" />
                            </td>

                            <td style="padding: 2px;" width="2%">
                                <textarea rows="2" cols="20" class="form-control" placeholder="" name="notification"></textarea>
                            </td>


                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="select_user">
                                    <option>Users</option>
                                    <option>Employee</option>

                                </select>
                            </td>

                            <td>
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Submit</button>
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
                                <th>Title</th>
                                <th>Added Notification</th>
                                <th>Selected User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notification as $notifications)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notifications->title }}</td>
                                    <td>{{ $notifications->notification }}</td>

                                    <td>{{ $notifications->select_user }}</td>


                                    <td>
                                        <a href="{{ route('notification_edit', $notifications->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                        </a>
                                        <button
                                            onclick="openCustomModal('{{ route('notification_destroy', $notifications->id) }}')"
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

    </div>
@stop
