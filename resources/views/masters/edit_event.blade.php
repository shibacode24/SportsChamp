@extends('layout')
@section('content')
    @include('master')
    @include('alert')

    
    <div class="row">
     
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('update_event') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$event_edit->id}}">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Date</th>
                        <th width="2%">Event Name</th>
                        <th width="2%">Event Details</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        
                        <td style="padding: 2px;" width="2%">
                            <input type="date" class="form-control" name="date" value="{{$event_edit->date}}" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="event_name" value="{{$event_edit->event_name}}" placeholder="" />

                        </td>

                        <td style="padding: 2px;" width="1%">
                            {{-- <input type="text" class="form-control" name="event_name" placeholder="" /> --}}
                            <textarea class="form-control" name="event_details">{{$event_edit->event_details}}</textarea>
                        </td>
                       
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
