@extends('layout')
@section('content')
    @include('alert')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top: 2vh;">
                <form action="{{ route('update_time_table') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $time_edit->id }}">
                    <div class="col-md-4" style="margin-top: 2vh;"></div>
                    <div class="col-md-3" style="margin-top: 2vh;">
                        <table>
                            <tr style="height:30px;">
                                <th width="2%">Select Emp</th>
                            </tr>



                            <tr>
                                <td style="padding: 2px;" width="1%">
                                    <select class="form-control select" data-live-search="true" name="emp_id"
                                        id="emp" disabled>
                                        <option>Select</option>
                                        @foreach ($emp as $emps)
                                            <option value="{{ $emps->id }}"
                                                @if ($time_edit->emp_id == $emps->id) selected @endif>{{ $emps->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <table width="100%">


                        <tr style="height:30px;">

                            <th width="2%">Days</th>

                            <th width="1%">No. of Classes</th>
                            <th width="1%">Select Grade</th>

                            <th width="2%"></th>
                            <th width="2%"></th>
                        </tr>



                        <tr>


                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" id="days">
                                    <option disabled selected>Select</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                            </td>

                            <td style="padding: 2px;" width="2%">
                                <input type="text" class="form-control" id="no_of_class" placeholder="" />
                            </td>

                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" data-live-search="true" id="grade_id" multiple>
                                    <option disabled>Select</option>
                                    @foreach ($grade as $grades)
                                        <option value="{{ $grades->id }}">{{ $grades->grade }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <div class="col-md-2" style="padding:8px">
                                    <button type="button" class="btn mjks add-row "><i class="fa fa-plus"></i>Add </button>
                                </div>


                            <td>
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Submit</button>
                            </td>
                        </tr>

                    </table>

                    <div class="col-md-12" style="margin-top: 2vh;">
                        <table width="100%" border="1">
                            <tr style="background-color:#f0f0f0; height:30px;">
                                {{-- <th width="20%" style="text-align:center">Sr.No.</th> --}}
                                <th width="20%" style="text-align:center">Days</th>
                                <th width="20%" style="text-align:center">No of Classes</th>
                                <th width="20%" style="text-align:center">Class</th>

                                <th width="20%" style="text-align:center">Action</th>
                            </tr>

                            <tbody class="add_more">
                                @foreach ($time_tables as $time_table)
                                    <tr>
                                        <td><input type="hidden" name="existing_id[]"
                                                value="{{ $time_table->time_id }}"><input type="text" readonly
                                                name="days[]" required="" style="border:none; width: 100%;"
                                                value="{{ $time_table->days }}">
                                        </td>

                                        <td style="padding:5px;" align="center"><input type="text" readonly
                                                name="no_of_class[]" required="" style="border:none; width: 100%;"
                                                value="
                                    {{ $time_table->no_of_class }}">
                                        </td>
                                        @php
                                            $grade_ids = $time_table->grade_id; // Assuming $timetable_list->grade_id is an array of grade IDs
                                            $grades = App\Models\masters\Grade::whereIn('id', $grade_ids)
                                                ->pluck('grade')
                                                ->toArray();

                                            $grades_id = App\Models\masters\Grade::whereIn('id', $grade_ids)
                                                ->pluck('id')
                                                ->toArray();
                                            $iddd = implode(', ', $grades_id);
                                            $grade_names = implode(', ', $grades);
                                        @endphp

                                        <td>
                                            <input type="hidden" name="grade_id[]" required=""
                                                style="border:none; width: 100%;" value="{{ $iddd }}">
                                            {{ $grade_names }}
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <a href="{{ route('time_delete', $time_table->id) }}"><button type="button"
                                                    class="delete-row" style="padding:5px;color:red;"><i
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

        </div>
        <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="H4">Time Table</h4>
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

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $(".add-row").click(function() {
                    // var emp = $('#emp').val();
                    // var grade_id = $('#grade_id').val();
                    var days = $('#days').val();
                    var no_of_class = $('#no_of_class').val();
                    var emp = $('#emp option:selected').text();
                    // 
                    var selectedOptions = $('#grade_id option:selected');
                    var gradeIds = [];
                    var gradeNames = [];

                    // Iterate through the selected options and store their IDs and names in separate arrays
                    selectedOptions.each(function() {
                        gradeIds.push($(this).val());
                        gradeNames.push($(this).text());
                    });

                    // Join the arrays elements into single strings with commas
                    var selectedGradeIds = gradeIds.join(', ');
                    var selectedGradeNames = gradeNames.join(', ');

                    // console.log(emp);
                    // console.log(grade_id);
                    // console.log(days);
                    // console.log(no_of_class);
                    var dayExists = false;
                    $(".add_more tr").each(function() {
                        var existingDay = $(this).find('input[name="days[]"]').val().trim();
                        if (existingDay === days.trim()) {
                            dayExists = true;
                            return false; // Exit the loop since we found a match
                        }
                    });

                    if (dayExists) {
                        $('#days').val('').change();
                        // Alert or handle the case where the day already exists
                        alert("Day already exists in the table.");
                        return; // Exit the function to prevent appending the row
                    }

                    var markup =

                        '<tr><td><input type="text" readonly name="days[]" required="" style="border:none; width: 100%;" value="' +
                        days.trim() +
                        '"></td><td style="padding:5px;" align="center"><input type="text" readonly name="no_of_class[]" required="" style="border:none; width: 100%;" value="' +
                        no_of_class +
                        '"></td><td style="padding:5px;" align="center"><input type="hidden"  name="grade_id[]" required="" style="border:none; width: 100%;" value="' +
                        selectedGradeIds +
                        '"><input type="text"  required="" style="border:none; width: 100%;" value="' +
                        selectedGradeNames +
                        '"></td><td style="padding:5px;" align="center"><button type="button" class="delete-row" style="padding:5px;color:red;"><i class="fa fa-trash-o"></i></button></td></tr>';

                    $(".add_more").append(markup);

                    $('#days').val('').change();
                    $('#no_of_class').val('');
                    $('#grade_id').val(''); 
                    $('#grade_id').selectpicker('refresh');
                }

            )
            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                var mpsqnty = $(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                var grandtotal1 = $('#grandtotal1').val();
                var total1 = parseFloat(grandtotal1) - parseFloat(mpsqnty)

                $('#grandtotal1').val(total1);
                $(this).parents("tr").remove();
            });


            $(".view_timetable_list").on('click', function() {
                console.log('alart');
                $("#table_append").html('');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_timetable_list') }}',
                    dataType: "json",
                    data: {
                        id: $(this).attr('id')
                    },
                    success: function(data) {
                        $("#table_append").html(data);

                    },
                });
            })
            // function capitalizeFirstLetter(string) {
            //     return string.charAt(0).toUpperCase() + string.slice(1);
            // }
        });
    </script>
@stop
