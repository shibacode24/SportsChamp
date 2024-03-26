@extends('layout')
@section('content')
    @include('master')
    @include('alert')

    <div class="row">
        <div class="col-md-6" style="margin-top: 2vh;">
            <form action="{{ route('update_issue_prop') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $issue_prop_edit->id }}">
                <h3 style="font-weight: bold;">Issue Props</h3>
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
                                    <input type="hidden" id="dp-3" class="form-control datepicker" value="01-01-2024"
                                        data-date="01-01-2024" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                                </div>

                                <div class="input-group">
                                    <input type="text" id="dp-3" class="form-control " value="01-01-2024"
                                        data-date="01-01-2024" data-date-format="dd-mm-yyyy" name="date" value="{{ $issue_prop_edit->date }}" data-date-viewmode="years" />
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="emp_code">
                                    <option>Select</option>
                                    @foreach ($emp as $emps)
                                        <option value="{{ $emps->id }}"  @if ($issue_prop_edit->emp_code == $emps->id) selected @endif>
                                            {{ $emps->emp_code }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="school_code">
                                    <option>Select</option>
                                    @foreach ($school as $schools)
                                        <option value="{{ $schools->id }}"  @if ($issue_prop_edit->school_code == $schools->id) selected @endif>
                                            {{ $schools->school_code }}</option>
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

                            @foreach ($issue_prop_list_edit as $issue_prop_list_edits)
                                <tr>
                                    <td>
                                        <input type="hidden" name="existing_id[]"
                                            value="{{ $issue_prop_list_edits->id }}"> <input type="hidden"name="prop_id[]"
                                            value="{{ $issue_prop_list_edits->prop_id }}"><input type="text"
                                            required="" style="border:none; width: 100%;" 
                                            value="{{ $issue_prop_list_edits->prop_name->prop_name }}">
                                    </td>
                                    <td><input type="text" name="quntity[]" required="" style="border:none; width: 100%;"
                                            value={{ $issue_prop_list_edits->quntity }}></td>
    
                                    <td style="text-align:center;">
                                        <a href="{{ route('delete_issue_added_prop_list', $issue_prop_list_edits->id) }}">
                                            <button type="button" style="color:#FF0000"class="delete-row" ><i
                                                    class="fa fa-trash-o"></i></button>
                                        </a>
                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

        </div>
    @stop
    @section('js')

    <script>
        $(document).ready(function() {
            $(".add-row-issue").click(function() {
                var prop_id = $('#prop_name').val();
                var prop_name = $('#prop_name option:selected').text();
                var quntity = $('#quntity').val();

                var markup =
                    '<tr><td><input type="hidden" name="prop_id[]" required="" style="border:none; width: 100%;" value="' +
                    prop_id +
                    '"><input type="text" required="" style="border:none; width: 100%;" value="' +
                    prop_name.trim() + '"></td>' +
                    '<td><input type="text" name="quntity[]" required="" style="border:none; width: 100%;" value="' +
                    quntity + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td></tr>';

                $(".add_more_issue").append(markup);

                // Clear the input fields
                $('#prop_name').val('');
                $('#quntity').val('');



            });

            $("tbody").delegate(".delete-row", "click", function() {
                $(this).parents("tr").remove();
            });


        $(".view_prop_list").on('click', function() {
                console.log('alart');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_issue_prop_list') }}',
                    dataType: "json",
                    data: {
                        id: $(this).attr('id')
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
        });

    </script>
    

@endsection