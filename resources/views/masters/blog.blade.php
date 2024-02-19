@extends('layout')
@section('content')
@include('master')

<div class="row">
    <div class="col-md-2" style="margin-top: 2vh;"></div>
    <div class="col-md-8" style="margin-top: 2vh;">
        <form action="{{ route('blog_store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <table width="80%">
            <tr style="height:30px;" >
                <th width="1%">Date</th>
                <th width="2%">Title of Blog</th>
                <th width="1%">Author Name</th>
                <th width="1%">Upload Blog Image</th>
              </tr>


            <tr>
                <td style="padding: 2px;" width="1%">
                    <input type="date" class="form-control" name="date" placeholder="" />
                    </div>
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="title" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="author_name" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="file" class="form-control" name="image" placeholder="" />
                </td>
                
            </tr>
 
        </table>
        <table width="100%" style="margin-top: 2vh;">
            <tr>
                <th width="40%">Content</th>
                <!-- <th width="5%"></th> -->
            </tr>
            {{-- <tr>
                <td style="padding: 2px;" width="40%">
                 <textarea class="form-control" id="editor" placeholder="content"
                    name="content"></textarea>
                </td>
                
            </tr> --}}
            <tr style="height:30px;">
                <td style="padding: 2px;" width="2%">
                    <div id="editor-container" style="height: 100px;"></div>

                    <input type="hidden" name="content" id="content">
                </td>
            </tr>
            <tr>
                <td style="padding: 2px;text-align: center;" width="5%">
                    <button id="on" type="submit" class="btn mjks"
         style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o" aria-hidden="true"></i>
         Submit</button>   
                </td>   
            </tr>
         </table>
        </form>

    </div>

</div>
<div class="row">
    <div class="col-md-2" style="margin-top: 2vh;"></div>
    <div class="col-md-8" style="margin-top:15px;">

        <!-- START DEFAULT DATATABLE -->
      
             <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Title of Blog</th>
                            <th>Author Name</th>
                            <th>Uploaded Blog Image</th>
                          
                          
                            <th>Content</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $blogs)
                            
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$blogs->date}}</td>
                            <td>{{$blogs->title}}</td>
                            <td>{{$blogs->author_name}}</td>
                            <td>
                                <a href="{{ asset('images/blog_image/' . $blogs->image) }}" target="_blank">
                                <img src="{{ asset('images/blog_image/' . $blogs->image) }}" width="50" height="50"/>
                                </a>
                            </td>
                          <td>{!! $blogs->content !!}</td>
                          
                         
                            <td>
                                <a href="{{ route('blog_edit', $blogs->id) }}">
                                <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                </a>
                                <button onclick="openCustomModal('{{ route('blog_destroy', $blogs->id) }}')"
                                    id="customModal" style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
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
            document.getElementById('content').value = htmlContent;
        });
    </script>

@stop