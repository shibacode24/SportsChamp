<table width="100%" border="1" style="margin-top: 5px;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th width="3%" style="text-align:center">Class</th>
                            <th width="5%" style="text-align:center">Section</th>
                            <th width="5%" style="text-align:center">Roll No.</th>
                            <th width="5%" style="text-align:center">Name</th>
                            <th width="5%" style="text-align:center">DOB</th>
                            <th width="5%" style="text-align:center">Email</th>
                            <th width="5%" style="text-align:center">Father Name</th>
                            <th width="5%" style="text-align:center">Mother Name</th>
                            <th width="5%" style="text-align:center">Father No</th>
                            <th width="5%" style="text-align:center">Mother No</th>
                            <th width="5%" style="text-align:center">Mobile</th>
                         
                           
                        </tr>


@foreach($student_list as $student)
    <tr>
        <td style="padding:5px;" align="center">
            {{ $student->grade_name->grade ?? '' }}
        </td>
        <td style="padding:5px;" align="center">{{ $student->section1->section_name ?? '' }}</td>
        <td style="padding:5px;" align="center">{{ $student->roll_no }}</td>
        <td style="padding:5px;" align="center">{{ $student->name }}</td>
        <td style="padding:5px;" align="center">{{ $student->dob }}</td>
        <td style="padding:5px;" align="center">{{ $student->email }}</td>
        <td style="padding:5px;" align="center">{{ $student->father_name }}</td>
        <td style="padding:5px;" align="center">{{ $student->mother_name }}</td>
        <td style="padding:5px;" align="center">{{ $student->father_no }}</td>
        <td style="padding:5px;" align="center">{{ $student->mother_no }}</td>
        <td style="padding:5px;" align="center">{{ $student->mobile_no }}</td>
    </tr>
@endforeach

                        
                    </table>