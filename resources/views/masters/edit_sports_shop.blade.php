@extends('layout')
@section('content')
    @include('master')
    @include('alert')


    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('update_sports_shop') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$sports_shop_edit->id}}">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Title</th>
                        <th width="2%">Image</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" value="{{$sports_shop_edit->title}}" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="2%">
                            <input type="file" class="form-control" name="image" placeholder="" /><br>
                            <img src="{{asset('images/sports_shop_image/' . $sports_shop_edit->image)}}" width="50" height="50" >
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
