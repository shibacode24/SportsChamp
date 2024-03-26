@extends('layout')
@section('content')
    @include('master')
    @include('alert')
    {{-- <div class="col-md-6 mb-2">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
    </div> --}}
    <div class="row">
        
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('live_class_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Title</th>
                        <th width="2%">Link</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>

                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="link" placeholder="" />

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
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($live_class as $live_classs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $live_classs->title }}</td>
                                <td>{{ $live_classs->link }}</td>

                                <td>
                                    <a href="{{ route('live_class_edit', $live_classs->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button onclick="openCustomModal('{{ route('live_class_destroy', $live_classs->id) }}')"
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
