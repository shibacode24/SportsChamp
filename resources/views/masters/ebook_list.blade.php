<table width="100%" border="1" style="margin-top: 5px;">
    <tr style="background-color:#f0f0f0; height:30px;">
        {{-- <th width="3%" style="text-align:center">Page No</th>
        <th width="5%" style="text-align:center">Chapter</th> --}}
        <th width="5%" style="text-align:center">Image</th>
        
    </tr>


@foreach($ebook_lists as $ebook)
<tr>
{{-- <td style="padding:5px;" align="center">{{ $ebook->page_no ?? '' }}</td>
<td style="padding:5px;" align="center">{{ $ebook->chapter_name ?? '' }}</td> --}}
<td style="padding:3px;" align="center"><a href="{{ asset('images/ebook_image/' . $ebook->image) }}"
    target="_blank"><img src="{{ asset('images/ebook_image/' . $ebook->image) }}" style="width: 50px;heigth:50px;"></a></td>
</tr>
@endforeach

    
</table>