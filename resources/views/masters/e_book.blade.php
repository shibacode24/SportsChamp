@extends('layout')
@section('content')
    @include('master')
    @include('alert')

    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 2vh;">
            <form action="{{ route('ebook_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4" style="margin-top: 2vh;"></div>
                <div class="col-md-4" style="margin-top: 2vh;">
                    {{-- <table>
                        <tr style="height:30px;">
                            <th width="3%">Book Title</th>
                            <th width="2%">Select Grade</th>
                        </tr>



                        <tr>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="title" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <select class="form-control select" data-live-search="true" name="grade_id">
                                    <option value="">Select</option>
                                    @foreach ($grade as $grades)
                                        <option value="{{ $grades->id }}">{{ $grades->grade }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table> --}}
                </div>
                <table width="100%" style="background-color:#f0f0f0;">
                    <tr style="height:30px;">
                        <th width="1%">Book Title</th>
                        <th width="1%">Select Grade</th>
                        <th width="1%">Upload Image</th>
                    
                        <th width="2%"></th>
                        <th width="2%"></th>
                    </tr>


                    <tr>

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="title"  placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="3%">
                            <select class="form-control select" data-live-search="true" name="grade_id">
                                <option value="">Select</option>
                                @foreach ($grade as $grades)
                                    <option value="{{ $grades->id }}">{{ $grades->grade }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td style="padding: 2px;" width="3%">
                            <input type="file" class="form-control" id="image" placeholder="" />
                        </td>
                        <td>
                            <div class="col-md-2" style="padding:8px">
                                <button type="button" class="btn mjks add-row "><i class="fa fa-plus"></i>Add </button>
                            </div>
                        </td>
                        <td>
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                            </td>
                    </tr>

                </table>
                <div class="col-md-12" style="margin-top: 2vh;background-color:#f0f0f0;">
                    <table width="100%" border="1" style="background-color:#f0f0f0;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            {{-- <th width="20%" style="text-align:center">Sr.No.</th> --}}
                            {{-- <th width="20%" style="text-align:center">Book Title</th>
                            <th width="20%" style="text-align:center">Select Grade</th> --}}
                            <th width="20%" style="text-align:center">Upload Image</th>

                            <th width="20%" style="text-align:center">Action</th>
                        </tr>

                        <tbody class="add_more">

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
                <h4 class="modal-title" id="H4">E-Book</h4>
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
    <div class="row" style="height: 400px">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:50px;">
                <table class="table datatable" style="background-color:#f0f0f0;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Grade</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ebooks as $ebook)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ebook->title }}</td>
                                {{-- <td>
                                    <a href="{{ asset('images/pdf/' . $ebook->pdf) }}"
                                        target="_blank">{{ $ebook->pdf }}</a>
                                </td> --}}
                                <td>{{ $ebook->grade_name->grade ?? '' }}</td>


                                <td>

                                    <button data-toggle="modal" data-target="#popup3" id="{{ $ebook->grade_id }}"
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view_ebook_list" data-toggle="tooltip"
                                        data-placement="top" title="View"><i class="fa fa-eye"
                                            style="margin-left:5px;"></i></button>

                                    {{-- <a href="{{ route('ebook_edit', $ebook->id) }}"> <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                    </a> --}}
                                    <a href="#"> <button
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                </a>
                                    <button onclick="openCustomModal('{{ route('ebook_destroy', $ebook->id) }}')"
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
        $(document).ready(function() {

            var src;
            var blob;
            var fileExtension;
            var fileName;
            $("#image").on('change', function(e) {
                src = URL.createObjectURL(e.target.files[0]);
                let file = e.target.files[0];
                fileExtension = file.name.split('.').pop();
                fileName = file.name;
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    blob = e.target.result;
                };
            })

            $(".add-row").click(function() {

                var title = $('#title').val();
                var grade_id = $('#grade_id').val();
                var image = $('#image').val();
                var image_src = src;
                let link = '';
                link = '<img style="height:70px;width:auto;" src="' + image_src + '">';
                var markup =
                    '<tr><td style="text-align:center;"><input name="image[]" type="hidden" value="' +
                    blob + '"><a target="_blank" href="' + image_src + '" >' + link + '</a></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row1"><i class="fa fa-trash-o"></i></button></td></tr>';

                $(".add_more").append(markup);

                // Clear the input field
                $('#title').val('');
                $('#grade_id').val('');
                $('#image').val('');
                src = null;
                blob = null;

            });

            // Find and remove selected table rows
            $("tbody").delegate(".delete-row1", "click", function() {
                $(this).parents("tr").remove();
            });


            $(".view_ebook_list").on('click', function() {
                console.log('alart');
                $("#table_append").html('');
                $.ajax({
                    type: "get",
                    url: '{{ route('get_ebook_list') }}',
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