@extends('layout')
@section('content')
    @include('master')
    
    <div class="row">
     
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('event_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="2%">Date</th>
                        <th width="2%">Event Name</th>
                        <th width="2%"></th>
                    </tr>


                    <tr>
                        
                        <td style="padding: 2px;" width="2%">
                            <input type="date" class="form-control" name="date" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="event_name" placeholder="" />

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
                            <th>Date</th>
                            <th>Event Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($event as $events)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{-- {{ $events->date->format('d/m/Y') }} --}}
                                    {{date('d-m-Y', strtotime($events->date))}}</td>
                                <td>{{ $events->event_name }}</td>
                                
                                <td>
                                    <a href="{{ route('event_edit', $events->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button onclick="openCustomModal('{{ route('event_destroy', $events->id) }}')"
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
