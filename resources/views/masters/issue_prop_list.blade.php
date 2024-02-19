<table width="100%" border="1" style="margin-top: 5px;">
    <tr style="background-color:#f0f0f0; height:30px;">
        <th width="3%" style="text-align:center">Prop Name</th>
        <th width="5%" style="text-align:center">Quantity</th>
     
       
    </tr>


@foreach($issue_prop_list as $prop)
<tr>
<td style="padding:5px;" align="center">{{ $prop->prop_name->prop_name }}</td>
<td style="padding:5px;" align="center">{{ $prop->quntity }}</td>
</tr>
@endforeach

    
</table>