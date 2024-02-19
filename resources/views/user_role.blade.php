@extends('layout')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="form-group" style="margin-top:-10px;">

                <div class="col-md-5" style="margin-top:15px;"></div>
                <div class="col-md-2" style="margin-top:15px;">
                    <label>Role Name<font color="#FF0000">*</font></label>
                    <input type="text" name="username" class="form-control" required />
                </div>


            </div>
            <div class="col-md-12">
                <hr style="color: red;border-width: 1px;margin: 6px;">
            </div>

            <div class="col-md-12">
                <div class="col-md-6"><br>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="5" align="center" style="color: red;">Masters</td>
                        </tr>
                        <tr>
                            <th>&nbsp;Menu Name</th>
                            <th> ( <label class="check">Create <input type="checkbox" id="checkAllcreate1"
                                        onclick="checkallcreate(1);"></label> )</th>
                            <th> ( <label class="check">Read <input type="checkbox" class="" id="checkAllread1"
                                        onclick="checkallread(1)"></label> )</th>
                            <th> ( <label class="check">Update <input type="checkbox" class="" id="checkAlledit1"
                                        onclick="checkalledit(1)"></label> )</th>
                            <th> ( <label class="check">Delete <input type="checkbox" class="" id="checkAlldelete1"
                                        onclick="checkalldelete(1)"></label> )</th>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;City</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_client_registrations" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_client_registrations" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_client_registrations" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_client_registrations" class=" delete1"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Designation</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_layout" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_layout" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_layout" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_layout" class=" delete1"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Class</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_plot" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_plot" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_plot" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_plot" class=" delete1"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Section</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_plot" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_plot" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_plot" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_plot" class=" delete1"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Prop Type</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_plot" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_plot" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_plot" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_plot" class=" delete1"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Vendor</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_plot" class=" create1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_plot" class=" read1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_plot" class=" edit1"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_plot" class=" delete1"></label></td>
                        </tr>

                    </table>
                </div>
                <div class="col-md-6"><br>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="5" align="center" style="color: red;">Tracking</td>
                        </tr>
                        <tr>
                            <th>&nbsp;Menu Name</th>
                            <th> ( <label class="check">Create <input type="checkbox" id="checkAllcreate2"
                                        onclick="checkallcreate(2);"></label> )</th>
                            <th> ( <label class="check">Read <input type="checkbox" class="" id="checkAllread2"
                                        onclick="checkallread(2)"></label> )</th>
                            <th> ( <label class="check">Update <input type="checkbox" class="" id="checkAlledit2"
                                        onclick="checkalledit(2)"></label> )</th>
                            <th> ( <label class="check">Delete <input type="checkbox" class=""
                                        id="checkAlldelete2" onclick="checkalldelete(2)"></label> )</th>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Tracking</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="create_sale_deed" class=" create2"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_sale_deed" class=" read2"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_sale_deed" class=" edit2"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="delete_sale_deed" class=" delete2"></label></td>
                        </tr>

                    </table>

                    <table class="table table-bordered" style="margin-top: -10px;">
                        <tr>
                            <td colspan="5" align="center" style="color: red;">Notification</td>
                        </tr>
                        <tr>
                            <th>&nbsp;Menu Name</th>
                            <th> ( <label class="check">Create <input type="checkbox" id="checkAllcreate2"
                                        onclick="checkallcreate(2);"></label> )</th>
                            <th> ( <label class="check">Read <input type="checkbox" class="" id="checkAllread2"
                                        onclick="checkallread(2)"></label> )</th>
                            <th> ( <label class="check">Update <input type="checkbox" class="" id="checkAlledit2"
                                        onclick="checkalledit(2)"></label> )</th>
                            <th> ( <label class="check">Delete <input type="checkbox" class=""
                                        id="checkAlldelete2" onclick="checkalldelete(2)"></label> )</th>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Notification</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>

                    </table>
                    <table class="table table-bordered" style="margin-top: -10px;">
                        <tr>
                            <td colspan="5" align="center" style="color: red;">Reports</td>
                        </tr>
                        <tr>
                            <th>&nbsp;Menu Name</th>
                            <th> ( <label class="check">Create <input type="checkbox" id="checkAllcreate2"
                                        onclick="checkallcreate(2);"></label> )</th>
                            <th> ( <label class="check">Read <input type="checkbox" class="" id="checkAllread2"
                                        onclick="checkallread(2)"></label> )</th>
                            <th> ( <label class="check">Update <input type="checkbox" class="" id="checkAlledit2"
                                        onclick="checkalledit(2)"></label> )</th>
                            <th> ( <label class="check">Delete <input type="checkbox" class=""
                                        id="checkAlldelete2" onclick="checkalldelete(2)"></label> )</th>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Schools</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Students</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Employees</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Props</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>
                        <tr>
                            <td width="30%">&nbsp;Assessments</td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="read_account" class="create3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="pay_insallment" class="read3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                            <td align="center"> <label class="check"> <input type="checkbox" name="authentications[]"
                                        value="edit_insallment" class="edit3"></label></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <hr style="color: red;border-width: 1px;margin: 6px;">
            </div>
            <div class="col-md-12" align="center">
                <button id="on" type="button" class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;">
                    <i class="fa fa-users"></i>Add User</button>

                <!-- <button type="submit" class="btn mjks" name="submit" ><span class="fa fa-users"></span> Add User</button> -->

            </div>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Role</th>

                            <th>Authentications</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>demo</td>

                            <td>read_client_registrations, read_layout, read_plot</td>
                            <td>
                                <a href="#"><button
                                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Edit Data"><i class="fa fa-pencil"
                                            style="margin-left:5px;"></i></button></a>

                                <button onclick="a(2);"
                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Remove"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>

                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
        <div class="col-md-4"></div>
    </div>

@stop
