@extends('layout')
@section('content')
    @include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
          
                
                <div class="col-md-8" style="margin-top: 2vh;">
                    <form action="{{ route('prop_report') }}" method="get" enctype="multipart/form-data">
                      
                        <div class="col-md-4" style="margin-top: 2vh;"></div>
                        <div class="col-md-3" style="margin-top: 2vh;">
                            <table>
                                <tr style="height:30px;">
                                    <th width="5%">From Date</th>
                                <th width="5%">To Date</th>
                                    <th width="5%">Select Emp</th>
                                    <th width="5%"></th>
  
                                </tr>



                                <tr>
                                       <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" name="from_date" value="{{ app()->request->input('from_date') }}" placeholder="" />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="date" class="form-control" value="{{ app()->request->input('to_date') }}" name="to_date" placeholder="" />
                                </td>
                                    <td style="padding: 2px;" width="5%">
                                        <select class="form-control select" data-live-search="true" name="emp_id"
                                            id="emp">
                                            <option disabled selected>Select</option>
                                            @foreach ($emp as $emps)
                                                <option value="{{ $emps->id }}" @if (app()->request->input('emp_id') == $emps->id)
                                                    selected @endif>{{ $emps->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button id="on" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                class="fa fa-search" aria-hidden="true"></i>
                                            Search</button>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        


                      
                    </form>
                </div>
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
                                <th>Prop Nname</th>
                                <th>Total Purchase Prop</th>
                                <th>Total Issue Prop</th>
                                <th>Total Damage Prop</th>
                            </tr>
                        </thead>
                        <tbody>
                            @json($merged_props)
                            @foreach ($merged_props as $props)
                            <tr>

                                <td>{{$loop->iteration}}</td>
                                {{-- <td>{{$props->emp_name->name ?? 'X'}}</td> --}}
                                <td>{{$props->prop_name}}</td>
                                <td>{{$props->total_purchase_prop}}</td>
                                <td>{{$props->total_issue_prop}}</td>
                                <td>{{$props->total_damage_prop}}</td>
                               
                            </tr>


                            @endforeach
                            
                        </tbody>
                      
                    </table>
                </div>
                <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="H4">Report</h4>
                        </div>
                        <div class="modal-body" style="height:30%;padding: 10px;">
    
                            <div class="col-md-12" id="table_append">
    
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
                <!-- END DEFAULT DATATABLE -->


            </div>
        </div>

    </div>
@stop
{{-- @section('js')
    <script>
        $(document).ready(function() {
            $(".view").on('click', function() {
                console.log('alart');
                $("#table_append").html('');
                $emp_id = $(this).attr('emp_id');
                $grade_id = $(this).attr('grade_id');
                $section_id = $(this).attr('section_id');
                $excel_id = $(this).attr('excel_id');

                $.ajax({
                    type: "get",
                    url: '{{ route('get_assessment_data') }}',
                    dataType: "json",
                    data: {
                        emp_id: $emp_id,
                        grade_id: $grade_id,
                        section_id: $section_id,
                        excel_id: $excel_id,
                       
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
          
        });
    </script>
@stop --}}