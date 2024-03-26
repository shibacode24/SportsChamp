@extends('layout')
@section('content')
@include('alert')


    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-2" style="margin-top: 2vh;"></div>
            <div class="col-md-8" style="margin-top:15px;">

                <!-- START DEFAULT DATATABLE -->

                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Emp Reason</th>
                                <th>Admin Remark</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leave as $leaves)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $leaves->emp_name->name ?? '' }}</td>
                                    <td>{{ $leaves->leave_type }}</td>
                                    <td>{{ $leaves->from_date }}</td>

                                    <td>{{ $leaves->to_date }}</td>
                                    <td>{{ $leaves->reason }}</td>
                                    <td>{{ $leaves->admin_remark }}</td>

                                    <td>
                                        @if ($leaves->status == 'pending')
                                            <button type="button" class="btn btn-sm btn-warning userModal"
                                                user_name="{{ $leaves->emp_name->name ?? '' }}" user_id="{{ $leaves->id }}"
                                                admin_remark="{{ $leaves->admin_remark }}">Pending</button>
                                        @elseif ($leaves->status == 'accept')
                                            <button type="button" class="btn btn-sm btn-success userModal"
                                                user_id="{{ $leaves->emp_id }}" user_name="{{ $leaves->emp_id }}"
                                                admin_remark="{{ $leaves->admin_remark }}">Accept</button>
                                        @elseif ($leaves->status == 'reject')
                                            <button type="button" class="btn btn-sm btn-danger userModal"
                                                user_id="{{ $leaves->emp_id }}" user_name="{{ $leaves->emp_id }}"
                                                admin_remark="{{ $leaves->admin_remark }}">Reject</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>

                <!-- END DEFAULT DATATABLE -->


            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="user_name"></h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>

                    <div class="modal-body" style="height:30%;padding: 10px;">
                        <form action="{{ route('update_leave_status') }}" method="post">
                            @csrf
                            <input type="hidden" id="user_id" name="user_id">
                            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label class="control-label"> Status<font color="#FF0000">*</font></label>    
                                        <select class="form-control select" data-live-search="true" name="status">
                                            <option value="">Select</option>
                                            <option value="accept">Accept</option>
                                            <option value="reject">Reject</option>
                                        </select>                              
                                    </div>

                                    <div class="col-md-12">
                                        <label class="control-label"> Add Remark<font color="#FF0000">*</font></label>
                                        {{-- <input type="text" class="form-control" id="prop_name" name="prop_name"
										placeholder="" /> --}}
                                        <textarea class="form-control" rows="5" id="admin_remark" name="admin_remark"></textarea>
                                    </div>

                                    

                                    <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                        <button type="submit" class="btn btn-primary">Update</button>


                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(document).on('click', '.userModal', function() {

            // console.log(parseInt($(this).attr('a')) + parseInt($(this).attr('b')));

            $('#exampleModal').modal('show');

            $('#user_id').val($(this).attr('user_id'));
            $('#admin_remark').val($(this).attr('admin_remark'));
            $('#user_name').text('Employee Name: ' + $(this).attr(
                'user_name'
                )); //agar hume name show kr na hai text() use kr na or koi value form ke sath send kr ni ho to val() use kr na
            //text('Disbale User :' + $(this).attr('user_name')) -- name ke sath agar koi static text bhi print kr na ho to  text('static text'+ jo value set kr na hai vo) 

        });
    </script>
@stop
