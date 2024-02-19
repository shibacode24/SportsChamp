@extends('layout')
@section('content')
@include('master')

<div class="col-md-2" style="margin-top: 2vh;"></div>
    <div class="col-md-8" style="margin-top: 2vh;">
        <form action="{{route('update_ebook')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$ebook_edit->id}}">
        <table width="100%" >
            <tr style="height:30px;" >
                <th width="1%">Date</th>
                <th width="1%">Title</th>
                <th width="1%">Upload(PDF)</th>
                <th width="1%">Grade</th>
              
                <th width="2%"></th>
            </tr>


            <tr>

                <td style="padding: 2px;" width="1%">
                    <input type="date" class="form-control" value="{{$ebook_edit->date}}" name="date" placeholder="" />
                </td>

                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="title" value="{{$ebook_edit->title}}" placeholder="" />
                </td>
               
                <td style="padding: 2px;" width="1%">
                    <input type="file" class="form-control" name="pdf" value="{{$ebook_edit->pdf}}" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <select class="form-control select" data-live-search="true"  name="grade_id">
                        <option value="">Select</option>
                        @foreach ($grade as $grades)
                            <option value="{{ $grades->id }}" @if ($ebook_edit->grade_id == $grades->id) selected
                                @endif>{{ $grades->grade }}</option>
                        @endforeach
                    </select>
                </td>
                   
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                 style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                 update</button>   
                        </td>   
            </tr>

        </table>
        </form>
    </div>

</div>

@stop