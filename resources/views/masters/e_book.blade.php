@extends('layout')
@section('content')
@include('master')
<div class="row">
    <div class="col-md-2" style="margin-top: 2vh;"></div>
    <div class="col-md-8" style="margin-top: 2vh;">
        <form action="{{route('ebook_store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <table width="100%" >
            <tr style="height:30px;" >
                <th width="1%">Date</th>
                <th width="1%">Title</th>
                <th width="1%">Upload(PDF)</th>
                <th width="1%">Grade</th>
              
                <th width="2%"></th>
            </tr>


            <tr>
                {{-- <td style="padding: 2px;" width="1%">
                    <div class="input-group">
                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                    </div>
<!-- 
                    <label>Date</label> -->
                    <div class="input-group">
                        <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </td> --}}

                <td style="padding: 2px;" width="1%">
                    <input type="date" class="form-control" name="date" placeholder="" />
                </td>

                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="title" placeholder="" />
                </td>
               
                <td style="padding: 2px;" width="1%">
                    <input type="file" class="form-control" name="pdf" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <select class="form-control select" data-live-search="true" name="grade_id">
                        <option value="">Select</option>
                        @foreach ($grade as $grades)
                            <option value="{{ $grades->id }}">{{ $grades->grade }}</option>
                        @endforeach
                    </select>
                </td>
                   
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                 style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o" aria-hidden="true"></i>
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
                            <th>Date</th>
                            <th>Title</th>
                            <th>Uploaded PDF</th>
                            <th>Grade</th>
                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ebooks as $ebook)
                            
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ebook->date}}</td>
                            <td>{{$ebook->title}}</td>
                            <td>
                              <a href="{{ asset('images/pdf/' . $ebook->pdf) }}" target="_blank">{{$ebook->pdf}}</a>
                            </td>
                          <td>{{$ebook->grade_name->grade ?? ''}}</td>
                          
                           
                            <td>
                        
                                <a href="{{ route('ebook_edit', $ebook->id) }}"> <button
                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                    data-placement="top" title="Edit"><i class="fa fa-edit"
                                        style="margin-left:5px;"></i></button>
                            </a>

                            <button onclick="openCustomModal('{{ route('ebook_destroy', $ebook->id) }}')"
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