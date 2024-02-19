<table width="100%" border="1" style="margin-top: 5px;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th width="3%" style="text-align:center">Class</th>
                            <th width="5%" style="text-align:center">Section</th>
                            <th width="5%" style="text-align:center">Roll No.</th>
                            <th width="5%" style="text-align:center">Name</th>
                            <th width="5%" style="text-align:center">Parent Name</th>
                            <th width="5%" style="text-align:center">Mobile</th>
                         
                           
                        </tr>


@foreach($student_list as $student)
    <tr>
        <td style="padding:5px;" align="center">
            <label>{{ $student->class }}</label>
        </td>
        <td style="padding:5px;" align="center">{{ $student->section }}</td>
        <td style="padding:5px;" align="center">{{ $student->roll_no }}</td>
        <td style="padding:5px;" align="center">{{ $student->name }}</td>
        <td style="padding:5px;" align="center">{{ $student->parent_name }}</td>
        <td style="padding:5px;" align="center">{{ $student->mobile_no }}</td>
    </tr>
@endforeach

                        
                    </table>