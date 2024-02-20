@extends('layout')
@section('content')
@include('master')


<form action="{{route('school_store')}}" method="post">
    @csrf
    <div class="col-md-12" style="margin-top: 2vh;">
        <table width="100%">
            <tr style="height:30px;">
                <th width="2%">Date</th>
                <th width="2%">School Code</th>
                <th width="3%">School Name</th>
                <th width="2%">Address</th>
                <th width="2%">City</th>
                <th width="3%">Contact Person Name</th>
                <th width="2%">Contact No.</th>
                <th width="2%">Email</th>
                <th width="1%">Latitude</th>
                <th width="1%">Longitude </th>
                <th width="2%"></th>
            </tr>


            <tr>
                {{-- <td style="padding: 2px;" width="2%">
                    {{-- <div class="input-group">
                        <input type="hidden" id="dp-3" class="form-control datepicker" 
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy" name="date" data-date-viewmode="years" />
                    </div> --}}

                    {{-- <div class="input-group">
                        <input type="text" id="dp-3" class="form-control " data-date="01-05-2020"
                            data-date-format="dd-mm-yyyy" name="date" data-date-viewmode="years" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </td> --}} 

                <td style="padding: 1px;" width="1%">
                    <input type="date" class="form-control" name="date" placeholder="" />
                </td>

                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="school_code" placeholder="" />
                </td>

                <td style="padding: 2px;" width="3%">
                    <input type="text" class="form-control" name="school_name" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="address" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <select class="form-control select" data-live-search="true" name="city_id">
                        <option value="">Select</option>
                        @foreach ($city as $cities)
                        <option value="{{$cities->id}}">{{$cities->city_name}}</option> 
                        @endforeach
                    </select>
                </td>
                <td style="padding: 2px;" width="3%">
                    <input type="text" class="form-control" name="contact_person_name" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="contact_no" maxlength="10" placeholder="" />
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="email" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="latitude" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="longitude" placeholder="" />
                </td>
                <td>
                    <button id="on" type="submit" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o"
                            aria-hidden="true"></i>
                        Submit</button>
                </td>
            </tr>

        </table>



    </div>
</form>

    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>School Code</th>
                            <th>School Name</th>
                            <th>Address</th>

                            <th>City</th>
                            <th>Contact Person Name</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Lat/Lang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($school as $schools)     
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{date('d-m-Y', strtotime($schools->date))}}</td>
                            <td>{{$schools->school_code}}</td>
                            <td>{{$schools->school_name}}</td>
                            <td>{{$schools->address}}</td>
                            <td>{{$schools->city_name->city_name ?? ''}}</td>
                            <td>{{$schools->contact_person_name ?? ''}}</td>
                            <td>{{$schools->contact_no}}</td>
                            <td>{{$schools->email}}</td>
                            <td>{{$schools->latitude}}</td>
                            <td>{{$schools->longitude}}</td>
                            <td>
                                        
                              <a href="{{route('school_edit',$schools->id)}}">  <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                              </a>
                             
                                 <button  onclick="openCustomModal('{{route('school_destroy',$schools->id)}}')" id="customModal"
                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>

                            {{-- <a href="#"
                            onclick="openCustomModal('{{ route('school_destroy', $schools->id) }}')">
                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button"
                            class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                            </button>
                        </a> --}}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

    {{-- <div class="modal" id="popup21" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Update School</h4>
            </div>
            <form action="{{route('update_school')}}" method="post">
                @csrf
                <input type="hidden" id="school_id" name="school_id">
                <div class="col-md-12" style="padding:1%;">
                    <table width="100%" >
                        <tr style="height:50px;" >
                            <th width="20%">Date</th>
                            <th width="20%">School Code</th>
                            <th width="30%">School Name</th>
                            <th width="20%">Address</th>
                            <th width="20%">City</th>
                        </tr>
                        <tr>

                            <td style="padding: 1px;" width="1%">
                                <input type="date" class="form-control" name="date" placeholder="" />
                            </td>
            
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="school_code" placeholder="" />
                            </td>
            
                            <td style="padding: 1px;" width="2%">
                                <input type="text" class="form-control" name="school_name" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="address" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="2%">
                                <select class="form-control select" data-live-search="true" name="city_id">
                                    <option value="">Select</option>
                                    @foreach ($city as $cities)
                                    <option value="{{$cities->id}}">{{$cities->city_name}}</option> 
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <tr style="height:50px;">
                            <th width="3%">Contact Person Name</th>
                            <th width="2%">Contact No.</th>
                            <th width="2%">Email</th>
                            <th width="1%">Latitude</th>
                            <th width="1%">Longitude </th>
                            <th width="2%"></th>
                        </tr>
            
            
                       

                            <td style="padding: 1px;" width="2%">
                                <input type="text" class="form-control" name="contact_person_name" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="contact_no" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" name="email" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" name="latitude" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" name="longitude" placeholder="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <div style="padding-top: 4%;">
                                <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i>
                                Update</button>
                               </div>
                            </td>
                        </tr>
            
                    </table>
            
            
            
                </div>
            </form>
            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div> --}}

@stop
