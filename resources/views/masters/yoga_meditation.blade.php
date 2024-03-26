@extends('layout')
@section('content')
    @include('master')
    @include('alert')

    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('yoga_meditation_store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                    data-date-viewmode="years" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="title" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" name="video_image" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="video_link" placeholder="" />
                        </td>
                        <!-- <td style="padding: 2px;" width="1%">
                                    <input type="text" class="form-control" name="name" placeholder="" />
                                </td> -->
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
                            <th>Date</th>
                            <th>Title</th>
                            <th>Video Image</th>
                            <th>Uploaded Video Link</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($yoga as $yogas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $yogas->date }}</td>
                                <td>{{ $yogas->title }}</td>
                                <td>
                                    <a href="{{ asset('images/yoga_meditation_image/' . $yogas->video_image) }}" target="_blank">
                                        <img src="{{ asset('images/yoga_meditation_image/' . $yogas->video_image) }}" width="50"
                                            height="50" />
                                    </a>
                                    {{-- <img src="{{ asset('images/video_image/' . $videos->video_image) }}" width="20" height="20" /> --}}
                                </td>
                                <td>
                                    {{ $yogas->video_link }}
                                </td>
                                <td>
                                    <a href="{{ route('yoga_meditation_edit', $yogas->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button onclick="openCustomModal('{{ route('yoga_meditation_destroy', $yogas->id) }}')"
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
