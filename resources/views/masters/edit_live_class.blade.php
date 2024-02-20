@extends('layout')
@section('content')
    @include('master')
    
    <div class="row">
     
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('update_live_class') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$live_class_edit->id}}">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Title</th>
                        <th width="2%">Link</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" value="{{$live_class_edit->title}}" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="link" value="{{$live_class_edit->link}}" placeholder="" />

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
