@extends('layout')
@section('content')
    @include('master')
    @include('alert')

    <div class="row">
        <div class="col-md-6" style="margin-top: 2vh;">
            <form action="{{ route('update_manage_prop') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $manage_prop_edit->id }}">
                <h3 style="font-weight: bold;">Purchase Props</h3>
                <div class="col-md-12" style="margin-top: 2vh;">
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
                                        data-date="01-01-2024" data-date-format="dd-mm-yyyy" name="date"
                                        value="{{ $manage_prop_edit->date }}" data-date-viewmode="years" />
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" name="vendor_id">
                                    <option>Select</option>
                                    @foreach ($vendor as $vendors)
                                        <option value="{{ $vendors->id }}"
                                            @if ($manage_prop_edit->vendor_id == $vendors->id) selected @endif>
                                            {{ $vendors->vendor_name }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" id="prop_name">
                                    <option>Select</option>
                                    @foreach ($prop as $props)
                                        <option value="{{ $props->id }}" {{-- @if ($manage_prop_list_edit->prop_id == $props->id) selected @endif --}}>
                                            {{ $props->prop_name }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" name="quntity" id="quntity" placeholder="" />
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

                        @foreach ($manage_prop_list_edit as $manage_prop_list_edits)
                            <tr>
                                {{-- <td style="padding:5px;" align="center">
                        <label>1</label>
                    </td> --}}
                                <td>
                                    <input type="hidden" name="existing_id[]"
                                        value="{{ $manage_prop_list_edits->id }}"> <input type="hidden"name="prop_id[]"
                                        value="{{ $manage_prop_list_edits->prop_id }}"><input type="text"
                                        required="" style="border:none; width: 100%;" 
                                        value="{{ $manage_prop_list_edits->prop_name->prop_name }}">
                                </td>
                                <td><input type="text" name="quntity[]" required="" style="border:none; width: 100%;"
                                        value={{ $manage_prop_list_edits->quntity }}></td>

                                <td style="text-align:center;">
                                    <a href="{{ route('delete_added_prop_list', $manage_prop_list_edits->id) }}">
                                        <button type="button" style="color:#FF0000"class="delete-row" ><i
                                                class="fa fa-trash-o"></i></button>
                                    </a>
                                </td>
                              
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </form>

        </div>
        {{-- <div class="col-md-6" style="margin-top: 2vh;">
        <h3 style="font-weight: bold;">Issue Props</h3>
        <div class="col-md-12" style="margin-top: 2vh;">
        <table width="100%" >
            <tr style="height:30px;" >
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
                        <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                    </div>

                    <div class="input-group">
                        <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                            data-date-viewmode="years" />
                        <span class="input-group-addon"><span
                                class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </td>
                <td style="padding: 2px;" width="1%">
                    <select class="form-control select" data-live-search="true">
                        <option>1231</option>
                        <option>34435</option>
                        <option>6768</option>
                        
                    </select>
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="name" placeholder=""disabled />
                </td>
                <td style="padding: 2px;" width="1%">
                    <select class="form-control select" data-live-search="true">
                        <option>Bat</option>
                        <option>Rope</option>
                        <option>Ring</option>
                        
                    </select>
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="name" placeholder="" />
                </td>
                        <td style="padding: 2px;" width="1%">
                            <button id="on" type="button" class="btn mjks"
                 style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-plus" aria-hidden="true"></i>
                </button>   
                        </td>  
                       <td>
                        <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Submit</button>  
                       </td>
            </tr>

        </table>
     </div>
     <div class="col-md-12" style="margin-top: 2vh;">
        <table width="100%" border="1">
            <tr style="background-color:#f0f0f0; height:30px;">
                <th width="20%" style="text-align:center">Sr.No.</th>
                <th width="20%" style="text-align:center">Selected Prop</th>
                <th width="20%" style="text-align:center">Qty</th>
           
                <th width="20%" style="text-align:center">Action</th>
            </tr>


            <tr>
                <td style="padding:5px;" align="center">
                    <label>1</label>
                </td>
                <td style="padding:5px;" align="center">
                    <label>Bat</label>
                </td>
                <td style="padding:5px;" align="center">
                   <label>10</label>
                </td>
            
             
             <td style="text-align:center; color:#FF0000"><button><i
                            class="fa fa-trash-o"></i></button>
                  
                </td>
            </tr>

        </table>
    </div>  
  
    </div> --}}

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
                    prop_name.trim() + '"></td>' +
                    '<td><input type="text" name="quntity[]" required="" style="border:none; width: 100%;" value="' +
                    quntity + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td></tr>';

                $(".add_more_purchase").append(markup);

                // Clear the input fields
                $('#prop_name').val('');
                $('#quntity').val('');


                //    $('#expense').val('');
            });
        });
    </script>
@endsection
