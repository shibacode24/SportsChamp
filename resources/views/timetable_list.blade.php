<table width="100%" border="1" style="margin-top: 5px;">
    <tr style="background-color:#f0f0f0; height:30px;">
        <th width="3%" style="text-align:center">Days</th>
        <th width="5%" style="text-align:center">No of Classes</th>
        <th width="5%" style="text-align:center">Class</th>


    </tr>


    @foreach ($timetable_lists as $timetable_list)
    <tr>
        <td style="padding:5px;" align="center">{{ $timetable_list->days }}</td>
        <td style="padding:5px;" align="center">{{ $timetable_list->no_of_class }}</td>

        @php
        $grade_ids = $timetable_list->grade_id; // Assuming $timetable_list->grade_id is an array of grade IDs
        $grades = App\Models\masters\Grade::whereIn('id', $grade_ids)->pluck('grade')->toArray();
        $grade_names = implode(', ', $grades);
    @endphp
    
    <td>
        {{ $grade_names }}
    </td>
    
    

    </tr>
@endforeach

</table>
