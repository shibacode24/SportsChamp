<table width="100%" border="1" style="margin-top: 5px;">
    <tr style="background-color:#f0f0f0; height:30px;">
        <th width="3%" style="text-align:center">roll_no</th>
        <th width="5%" style="text-align:center">name</th>
        <th width="5%" style="text-align:center">category</th>
        <th width="3%" style="text-align:center">test_name</th>
        <th width="5%" style="text-align:center">score</th>
        <th width="5%" style="text-align:center">assessment_month</th>
        <th width="5%" style="text-align:center">remark</th>
    </tr>


    @foreach ($assessments as $assessment)
    <tr>
        <td style="padding:5px;" align="center">{{ $assessment->roll_no }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->name }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->category }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->test_name }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->score }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->assessment_month }}</td>
        <td style="padding:5px;" align="center">{{ $assessment->remark }}</td>
    </tr>
@endforeach

</table>
