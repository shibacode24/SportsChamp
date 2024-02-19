@extends('layout')
@section('content')
    @include('master')

    <div class="row">
        <div class="col-md-3" style="margin-top: 2vh;"></div>
        <div class="col-md-6" style="margin-top: 2vh;">
            <form action="{{ route('update_grade_card') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $grade_card_edit->id }}">
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="1%">Select Grade</th>

                    </tr>
                    <tr>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="grade_id"
                                id="grade_id_option">
                                <option value="">Select</option>
                                @foreach ($grade as $grade1)
                                    <option value="{{ $grade1->id }}" @if ($grade_card_edit->grade_id == $grade1->id) selected @endif>
                                        {{ $grade1->grade }}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>

                    <tr style="height:30px;">
                        <th width="3%">Add Grade Card Action</th>

                    </tr>
                    <tr style="height:30px;">
                        <td style="padding: 2px;" width="2%">
                    <div id="editor-container" style="height: 150px;">{!! $grade_card_edit->grade_content !!}</div>
                       <input type="hidden" name="grade_content" id="grade_content">

                        </td>

                    </tr>
                    <tr style="height:30px;">
                        <th width="2%"></th>
                    </tr>
                    <tr style="height:30px;text-align: center;">
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                                Update</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
@stop

@section('js')
<script>
    // Initialize Quill
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Write something...',
    });

    // Listen for 'text-change' event to update the hidden input
    quill.on('text-change', function() {
        // Get the HTML content of the Quill editor
        var htmlContent = quill.root.innerHTML;
        
        // Update the value of the hidden input
        document.getElementById('grade_content').value = htmlContent;
    });
</script>

@stop