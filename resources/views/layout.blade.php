<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Sports Champ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('logo/favicon.png') }}" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/notification.css') }}" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
    <!-- EOF CSS INCLUDE -->
</head>
<style>
    #editor {
        height: 80px;
    }
</style>

<body>


    <style>
        .mjbo {
            outline: 2px solid #08c8ea;
            outline-offset: 2px;
        }

        .mjprofile {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            border-color: rgba(0, 0, 0, .2);
            color: #000;
            -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
        }

        .mjks {
            background-color: #006699;
            color: #FFF !important;
        }

        .mjks:hover {
            background-color: #a8dbee;
            color: #fff !important;
        }

        .tree {
            color: #000000;
        }

        .tree:hover {
            color: #003300;
        }

        .subtree {
            color: #006699;
        }

        .subtree:hover {
            color: #0099cc;
        }

        .subtreeactive {
            color: #006699;
        }

        .mjksactive {
            background-color: #006699;
            color: #000 !important;
        }

        .mjkslink {
            background-color: #ffffff;
            color: white;

        }

        .mjkslink:hover {
            background-color: #006699;

        }
    </style>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top">
        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal">
                <li class="xn-logo" style="margin-right:30px;">
                    <a> <img src="{{ asset('logo/logo.png') }}" alt=""
                            style="width: 97%;margin-top: -1vh;" /></a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="{{ asset('images/users/avatar.jpg') }}" alt="Nile-Properties" />
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}" title="Dashboard"><span class="fa fa-desktop"> </span>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('index')}}" title="Masters"><span class="fa fa-list"> </span>Masters</a>
                </li>
                <!-- <li>
                        <a href="project_entry.html" title="Project Entry"><span class="fa fa-navicon"></span>Project Entry</a>
                       
                    </li> -->
                <!-- <li class="xn-openable">
                        <a href="enquiry.html" title="CRM"><span class="fa fa-navicon"></span>CRM</a>
                        <ul>
                            <li><a href="enquiry.html"><span class="fa fa-plus"></span>New CRM Client</a></li>
                            <li><a href="follow_up.html"><span class="fa fa-plus"></span>Follow Up (Leads)</a></li>
                        </ul>
                    </li> -->

                {{-- <li>
                    <a href="{{route('tracking')}}" title="Tracking"><span class="fa fa-map-marker"> </span>Tracking</a>
                </li> --}}
                <li>
                    <a href="{{route('notification')}}" title="Notification"><span class="fa fa-bell"> </span>Notification</a>
                </li>
                <li>
                    <a href="{{route('report')}}" title="Reports"><span class="fa fa-file"> </span>Reports</a>
                </li>
                <li>
                    <a href="{{route('leave')}}" title="Reports"><span class="fa fa-plus"> </span>Leave</a>
                </li>
                <li>
                    <a href="{{route('time_table')}}" title="Time Table"><span class="fa fa-calendar"> </span>Time Table</a>
                </li>
                {{-- <li>
                    <a href="{{route('user_role')}}" title="User Roles"><span class="fa fa-users"> </span>User Roles</a>
                </li> --}}
                <!-- <li>
                        <a href="setting.html" title="Setting"><span class="fa fa-gear"> </span>Settings</a>
                    </li> -->
                <!-- <li>
                        <a href="#" title="Reports"><span class="fa fa-file"> </span>Reports</a>
                    </li> -->

                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right"
                    style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                    Welcome, Admin
                </li>

            </ul>

            <div class="page-content-wrap">
                <div class="modal" id="customModal" style="width:65% !important; margin-left:15%;">
                    <div class="modal-dialog" style="width:65% !important; margin-left:15%;">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmation</h4>
                                {{-- <button type="button" class="close" data-dismiss="modal"
                                    onclick="closeCustomModal()">&times;</button> --}}
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body" style="font-weight: bold;font-size:15px">
                                <i> Are you sure you want to delete?</i>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="deleteItem()">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeCustomModal()">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
                <!-- MESSAGE BOX-->
                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?
                            </div>
                            <div class="mb-content">
                                <p>Are you sure you want to log out?</p>
                                <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                            </div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-success btn-lg">Yes</a>
                                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MESSAGE BOX-->
            
            
                <!-- START PRELOADS -->
                <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
                <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
                <!-- END PRELOADS -->
                <!-- START SCRIPTS -->
                <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
                <!-- END PLUGINS -->
                <!-- THIS PAGE PLUGINS -->
                <script type='text/javascript' src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/dropzone/dropzone.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/fileinput/fileinput.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/plugins/filetree/jqueryFileTree.js') }}"></script>
                <!-- END PAGE PLUGINS -->
                <!-- START TEMPLATE -->
                <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/actions.js') }}"></script>
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                <!-- END TEMPLATE -->


                <script>
                    $(function() {
                        $("#file-simple").fileinput({
                            showUpload: false,
                            showCaption: false,
                            browseClass: "btn btn-danger",
                            fileType: "any"
                        });
                        $("#filetree").fileTree({
                            root: '/',

                            expandSpeed: 100,
                            collapseSpeed: 100,
                            multiFolder: false
                        }, function(file) {
                            alert(file);
                        }, function(dir) {
                            setTimeout(function() {
                                page_content_onresize();
                            }, 200);
                        });
                    });
                </script>

                <script>
                    function openCustomModal(deleteUrl) {
                        // Set the delete URL in the modal
                        document.getElementById('customModal').deleteUrl = deleteUrl;
                        // Show the modal
                        $('#customModal').modal('show');
                    }

                    function deleteItem() {
                        // Get the delete URL from the modal
                        var deleteUrl = document.getElementById('customModal').deleteUrl;
                        // Redirect to the delete URL
                        window.location.href = deleteUrl;
                        // Hide the modal
                        $('#customModal').modal('hide');
                    }

                    function closeCustomModal() {
                        // Hide the modal
                        $('#customModal').modal('hide');
                    }
                </script>

                <script>
                
                    setTimeout(() => {
                        $('.alert_close_btn').trigger('click');
                    }, 3000);

                </script>

                @yield('js')

            </div>
        </div>
    </div>

</body>

</html>
