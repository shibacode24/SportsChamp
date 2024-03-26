@extends('layout')
@section('content')
@include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <form action="{{ route('update_notification') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{$notification_edit->id}}">
                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="2%">Title</th>
                            <th width="3%">Add Notification</th>

                            <th width="1%">Select User</th>

                            <th width="2%"></th>
                        </tr>


                        <tr>
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="title" value="{{$notification_edit->title}}" placeholder="" />
                            </td>

                            <td style="padding: 2px;" width="2%">
                                <textarea rows="2" cols="20" class="form-control" id="editor" placeholder="" name="notification">{{$notification_edit->notification}}</textarea>
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
    @stop
