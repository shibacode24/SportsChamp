@extends('layout')
@section('content')
    @include('master')

    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('update_manage_video') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$video_edit->id}}">
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="1%">Date</th>
                        <th width="2%">Title</th>
                        <th width="1%">Video Image</th>
                        <th width="2%">Upload Video Link</th>
                        <!-- <th width="1%">Number of Participants</th> -->
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-01-2024"
                                    data-date="01-01-2024" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>

                            <div class="input-group">
                                <input type="text" id="dp-3" class="form-control " value="01-01-2024"
                                    data-date="01-01-2024" data-date-format="dd-mm-yyyy" name="date"
                                    data-date-viewmode="years" value="{{$video_edit->date}}" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" value="{{$video_edit->title}}" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" name="video_image" value="{{$video_edit->video_image}}"  placeholder="" />
                            
                            <img src="{{ asset('images/video_image/' . $video_edit->video_image) }}" width="70px">
                            
                        </td>
                    
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="video_link" value="{{$video_edit->video_link}}" placeholder="" />
                        </td>
                        <!-- <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td> -->
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Update</button>
                        </td>
                    </tr>

                </table>
            </form>
        </div>

    </div>
    @stop