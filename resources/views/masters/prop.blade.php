@extends('layout')
@section('content')
    @include('master')

    <div class="row">
        <div class="col-md-6" style="margin-top: 2vh;">
            <h3 style="font-weight: bold;">Purchase Props</h3>
            <form action="{{ route('manage_prop_store') }}" method="post">

                <div class="col-md-12" style="margin-top: 2vh;">
                    @csrf
                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="1%">Date</th>
                            <th width="1%">Select Vendor</th>
                            <th width="1%">Select Prop</th>
                            <th width="1%">Qty</th>
                            <th width="1%"></th>
                            <th width="1%"></th>
                        </tr>


                        <tr>

                            <td style="padding: 2px;" width="1%">
                                <div class="input-group">
                                    <input type="hidden" id="dp-3" class="form-control datepicker" value="01-01-2024"
                                        data-date="01-01-2024" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                </div>

                                <div class="input-group">
                                    <input type="text" id="dp-3" class="form-control " value="01-01-2024"
                                        data-date="01-01-2024" data-date-format="dd-mm-yyyy" data-date-viewmode="years"
                                        name="date" />
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="vendor_id">
                                    <option>Select</option>
                                    @foreach ($vendor as $vendors)
                                        <option value="{{ $vendors->id }}">
                                            {{ $vendors->vendor_name }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" id="prop_name">
                                    <option>Select</option>
                                    @foreach ($prop as $props)
                                        <option value="{{ $props->id }}">
                                            {{ $props->prop_name }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" id="quntity" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <button id="on" type="button" class="btn mjks add-row-purchase"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Submit</button>
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="col-md-12" style="margin-top: 2vh;">
                    <table width="100%" border="1">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            {{-- <th width="20%" style="text-align:center">Sr.No.</th> --}}
                            <th width="20%" style="text-align:center">Selected Prop</th>
                            <th width="20%" style="text-align:center">Qty</th>

                            <th width="20%" style="text-align:center">Action</th>
                        </tr>
                        <tbody class="add_more_purchase">

                        </tbody>
                        {{-- <tr>
           
            </tr> --}}

                    </table>

                </div>
            </form>

            <div class="col-md-12" style="margin-top: 2vh;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Vendor</th>
                            {{-- <th>Prop</th>
                            <th>Qty</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manageprop as $manageprops)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $manageprops->date }}</td>
                                <td>{{ $manageprops->vendor_name->vendor_name ?? '' }}</td>
                                {{-- <td>
                                    {{ $manageprops->prop_name->prop_name }}
                                </td> --}}
                                {{-- <td>{{ $manageprops->quntity }}</td> --}}
                                <td>
                                    <button data-toggle="modal" data-target="#popup3" id="{{ $manageprops->id }}"
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view_prop_list" data-toggle="tooltip"
                                        data-placement="top" title="View"><i class="fa fa-eye"
                                            style="margin-left:5px;"></i></button>

                                    <a href="{{ route('manage_prop_edit', $manageprops->id) }}">
                                        <button
                                            style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button  onclick="openCustomModal('{{route('manage_prop_destroy',$manageprops->id)}}')" id="customModal"
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Added Props</h4>
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

        <div class="col-md-6" style="margin-top: 2vh;">
            <h3 style="font-weight: bold;">Issue Props</h3>
            <form action="{{ route('issue_prop_store') }}" method="post">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">

                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="1%">Date</th>
                            <th width="1%">Emp Code</th>
                            <th width="2%">School Code</th>
                            <th width="1%">Select Prop</th>
                            <th width="1%">Qty</th>
                            <th width="1%"></th>
                            <th width="1%"></th>
                        </tr>


                        <tr>

                            <td style="padding: 2px;" width="1%">
                                <div class="input-group">
                                    <input type="hidden" id="dp-3" class="form-control datepicker"
                                        value="01-01-2024" data-date="01-01-2024" data-date-format="dd-mm-yyyy"
                                        data-date-viewmode="years" />
                                </div>

                                <div class="input-group">
                                    <input type="text" id="dp-3" class="form-control " name="date"
                                        value="01-01-2024" data-date="01-01-2024" data-date-format="dd-mm-yyyy"
                                        data-date-viewmode="years" />
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="emp_code">
                                    <option>Select</option>
                                    @foreach ($emp as $emps)
                                        <option value="{{ $emps->id }}">
                                            {{ $emps->emp_code }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="school_code">
                                    <option>Select</option>
                                    @foreach ($school as $schools)
                                        <option value="{{ $schools->id }}">
                                            {{ $schools->school_code }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true"
                                    id="prop_id1">
                                    <option>Select</option>
                                    @foreach ($prop as $prop1)
                                        <option value="{{ $prop1->id }}">
                                            {{ $prop1->prop_name }}</option>
                                    @endforeach

                                </select>
                            </td>

                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" id="quntity1" 
                                    placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <button id="on" type="button" class="btn mjks add-row-issue"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td>
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Submit</button>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="col-md-12" style="margin-top: 2vh;">
                    <table width="100%" border="1">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            {{-- <th width="20%" style="text-align:center">Sr.No.</th> --}}
                            <th width="20%" style="text-align:center">Selected Prop</th>
                            <th width="20%" style="text-align:center">Qty</th>

                            <th width="20%" style="text-align:center">Action</th>
                        </tr>

                        <tbody class="add_more_issue">

                        </tbody>
                        {{-- <tr>
                        <td style="padding:5px;" align="center">
                            <label>1</label>
                        </td>
                        <td style="padding:5px;" align="center">
                            <label>Bat</label>
                        </td>
                        <td style="padding:5px;" align="center">
                            <label>10</label>
                        </td>


                        <td style="text-align:center; color:#FF0000"><button><i class="fa fa-trash-o"></i></button>

                        </td>
                    </tr> --}}

                    </table>
                </div>
            </form>

            <div class="col-md-12" style="margin-top: 2vh;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Emp Code</th>
                            <th>School Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($issueprop as $issueprops)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $issueprops->date }}</td>
                                {{-- <td>{{ $issueprops->emp_code1->emp_code ?? '' }}</td>
                                <td>{{ $issueprops->school_code1->school_code ?? '' }}</td> --}}
                                <td>{{ $issueprops->emp_code  }}</td>
                                <td>{{ $issueprops->school_code }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#popup4" id="{{ $issueprops->id }}"
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view_prop_list1" data-toggle="tooltip"
                                        data-placement="top" title="View"><i class="fa fa-eye"
                                            style="margin-left:5px;"></i></button>

                                    <a href="{{ route('issue_prop_edit', $issueprops->id) }}">
                                        <button
                                            style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                    </a>
                                    <button  onclick="openCustomModal('{{route('issue_prop_destroy',$issueprops->id)}}')" id="customModal"
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="modal" id="popup4" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Issue Props</h4>
                    </div>
                    <div class="modal-body" style="height:30%;padding: 10px;">

                        <div class="col-md-12" id="table_append1">

                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>

@stop
@section('js')

    <script>
        $(document).ready(function() {
            $(".add-row-purchase").click(function() {

                // var selectedOption = $('#prop_name option:selected');
                // var prop_id = selectedOption.val();
                // var prop_name = selectedOption.text();
                var prop_id = $('#prop_name').val();
                var prop_name = $('#prop_name option:selected').text();
                var quntity = $('#quntity').val();

                var markup =
                    '<tr><td><input type="hidden" name="prop_id[]" required="" style="border:none; width: 100%;" value="' +
                    prop_id + '"><input type="text" required="" style="border:none; width: 100%;" value="' +
                    prop_name + '"></td>' +
                    '<td><input type="text" name="quntity[]" required="" style="border:none; width: 100%;" value="' +
                    quntity + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td></tr>';

                $(".add_more_purchase").append(markup);

                // Clear the input fields
                $('#prop_name').val('');
                $('#quntity').val('');


                //    $('#expense').val('');
            });

            $(".add-row-issue").click(function() {


                var prop_id1 = $('#prop_id1').val();
                var prop_name1 = $('#prop_id1 option:selected').text();
                // var emp_code_id = $('#emp_code').val();
                // var emp_code = $('#emp_code option:selected').text();
                // var school_code_id = $('#school_code').val();
                // var school_code = $('#school_code option:selected').text();
                var quntity1 = $('#quntity1').val();

                var markup =
                    '<tr><td><input type="hidden" name="prop_id1[]" required="" style="border:none; width: 100%;" value="' +
                    prop_id1 +
                    '"><input type="text" required="" style="border:none; width: 100%;" value="' +
                    prop_name1 + '"></td>' +
                    '<td><input type="text" name="quntity1[]" required="" style="border:none; width: 100%;" value="' +
                    quntity1 + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row1"><i class="fa fa-trash-o"></i></button></td></tr>';

                $(".add_more_issue").append(markup);

                
                // Clear the input fields
                $('#prop_name1').val('');
                $('#quntity1').val('');



            });
            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                $(this).parents("tr").remove();
            });

            $("tbody").delegate(".delete-row1", "click", function() {
                $(this).parents("tr").remove();
            });


            $(".view_prop_list").on('click', function() {
                console.log('alart');
                $("#table_append").html('');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_prop_list') }}',
                    dataType: "json",
                    data: {
                        id: $(this).attr('id')
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })

            $(".view_prop_list1").on('click', function() {
                console.log('alart');
                $("#table_append1").html('');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_issue_prop_list') }}',
                    dataType: "json",
                    data: {
                        id: $(this).attr('id')
                    },
                    success: function(data) {
                        $("#table_append1").html(data);

                    },
                });
            })
        });
    </script>


@endsection
