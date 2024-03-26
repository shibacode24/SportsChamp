@extends('layout')
@section('content')
@include('master')
@include('alert')


<div class="row">
    <div class="col-md-2" style="margin-top: 2vh;"></div>
    <div class="col-md-8" style="margin-top: 2vh;">
        <form action="{{ route('update_fitness_mantra') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$fitness_mantra_edit->id}}">
        <table width="80%">
            <tr style="height:30px;" >
                <th width="1%">Date</th>
                <th width="2%">Title</th>
                <th width="1%">Author Name</th>
                <th width="1%">Upload Image</th>
              </tr>


            <tr>
                <td style="padding: 2px;" width="1%">
                    <input type="date" class="form-control" name="date" value="{{$fitness_mantra_edit->date}}" placeholder="" />
                    </div>
                </td>
                <td style="padding: 2px;" width="2%">
                    <input type="text" class="form-control" name="title" value="{{$fitness_mantra_edit->title}}" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="text" class="form-control" name="author_name" value="{{$fitness_mantra_edit->author_name}}" placeholder="" />
                </td>
                <td style="padding: 2px;" width="1%">
                    <input type="file" class="form-control" name="image" value="{{$fitness_mantra_edit->image}}" placeholder="" />
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
                    name="content">{{$fitness_mantra_edit->content}}</textarea>
                </td>
                
            </tr> --}}
            <tr style="height:30px;">
                <td style="padding: 2px;" width="2%">
            <div id="editor-container" style="height: 150px;">{!! $fitness_mantra_edit->content !!}</div>
               <input type="hidden" name="content" id="content">

                </td>

            </tr>
        
            <tr>
                <td style="padding: 2px;text-align: center;" width="5%">
                    <button id="on" type="submit" class="btn mjks"
         style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o" aria-hidden="true"></i>
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
            document.getElementById('content').value = htmlContent;
        });
    </script>

@stop