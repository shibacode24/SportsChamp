@extends('layout')
@section('content')
    @include('master')

    <div class="row">
        <div class="col-md-3" style="margin-top: 2vh;"></div>
        <div class="col-md-6" style="margin-top: 2vh;">
            <form action="{{ route('grade_card_store') }}" method="post">
                @csrf
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
                                    <option value="{{ $grade1->id }}">{{ $grade1->grade }}</option>
                                @endforeach

                            </select>
                        </td>
                    </tr>

                    <tr style="height:30px;">
                        <th width="3%">Add Grade Card Action</th>

                    </tr>
                    <tr style="height:30px;">
                        <td style="padding: 2px;" width="2%">
                            <div id="editor-container" style="height: 100px;"></div>

                            <input type="hidden" name="grade_content" id="grade_content">
                        </td>
                    </tr>
                    {{-- <tr style="height:30px;">
                <td style="padding: 2px;" width="2%">
                    <textarea class="form-control" id="editor" placeholder="content"
                    name="grade_content"></textarea>
                </td>
              
            </tr> --}}
                    <tr style="height:30px;">
                        <th width="2%"></th>
                    </tr>
                    <tr style="height:30px;text-align: center;">
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3" style="margin-top: 2vh;"></div>
        <div class="col-md-6" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Selected Grade</th>
                            <th>Added Grade card action</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade_card as $grade_cards)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $grade_cards->grade_name->grade ?? '' }}</td>
                                <td>{!! $grade_cards->grade_content !!}</td>

                                <td>
                                    <a href="{{ route('grade_card_edit', $grade_cards->id) }}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a>
                                    <button onclick="openCustomModal('{{ route('grade_card_destroy', $grade_cards->id) }}')"
                                        id="customModal"
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


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
