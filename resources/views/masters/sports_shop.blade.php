@extends('layout')
@section('content')
    @include('master')
    
    <div class="row">
     
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('sports_shop_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Title</th>
                        <th width="2%">Image</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" name="image" placeholder="" />
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
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sports_shop as $sports_shops)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sports_shops->title }}</td>
                                <td>
                                    <a href="{{ asset('images/sports_shop_image/' . $sports_shops->image) }}" target="_blank">
                                        <img src="{{ asset('images/sports_shop_image/' . $sports_shops->image) }}" width="50"
                                            height="50" />
                                    </a>
                                   
                                </td>
                                <td>
                                    <a href="{{ route('sports_shop_edit', $sports_shops->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button onclick="openCustomModal('{{ route('sports_shop_destroy', $sports_shops->id) }}')"
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
