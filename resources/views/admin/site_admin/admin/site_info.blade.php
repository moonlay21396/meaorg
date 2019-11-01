@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Member')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10…/…/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/…/no-image-e3699ae23f866f6cbdf8ba24…');
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            /* box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2); */
        }
        .upload_btn
        {
            display:block;
            border-radius:10px;
            /* box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2); */
            margin-bottom: 15px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }
    </style>

    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/…/css/bootstrap.css" rel="stylesheet"> -->
    <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
    <!-- <script src="http://netdna.bootstrapcdn.com/bootstr…/3.3.5/…/bootstrap.js"></script> -->

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/…/summern…/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/…/summerno…/0.8.12/summernote.js"></script>
@endsection

@section('nav_bar_text')
    Website Informations
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    {{-- @if(Session::has('success'))
    <script type="text/javascript">
    toastr.success("{{Session('success')}}");</script>
    @endif --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Website Informations</h4>
                            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                        </div>


                        <form id="update_data" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="id" value="{{$website_info->id}}">
                            <div class="col-md-10 pt-2 pb-2 mx-auto card" style="margin-top:30px;">
                                {{-- <div class="row" style="display: none;">
                                    <div class="col-md-4">
                                        <img src="{{asset('user/images/'.$website_info->sign_photo)}}" class="imagePreview" id="imgs" style="width: 100%;height: 100px;">
                                        <label class="btn btn-md btn-primary container-fluid rounded-0 m-0" for="edit_upload_photo">Upload</label><br><br>
                                        <input type="file" style="display:none;" id="edit_upload_photo" name="image" class="form-control package_photo" onchange="displaySelectedPhoto('edit_upload_photo','imgs')">
                                    </div>

                                </div> <br> --}}
                                <div class="form-group">
                                    <br>
                                    <label style="color:black;" for="update_webname" class="col-form-label"> Website Name:</label>
                                    {{-- <input type="text" class="form-control" id="update_webname" name="website_name" value="{{$website_info->website_name}}"> --}}
                                    <textarea class="form-control" id="update_webname" name="website_name" rows="2">{{$website_info->website_name}}</textarea>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="update_about" class="col-form-label">About:</label><br>
                                    <textarea class="form-control" rows="4" id="update_about" name="about">{{$website_info->about}}</textarea>
                                    <br>
                                </div>

                                <div class="form-group">

                                    <label style="color:black;" for="update_history" class="col-form-label">History:</label><br>
                                    <textarea class="form-control" rows="4" id="update_history" name="history">{{$website_info->history}}</textarea>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="update_vision" class="col-form-label">Vision:</label><br>
                                    <textarea class="form-control" rows="4" id="update_vision" name="vision">{{$website_info->vision}}</textarea>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="update_mission" class="col-form-label">Mission:</label><br>
                                    <textarea class="form-control" rows="4" id="update_mission" name="mission">{{$website_info->mission}}</textarea><br>
                                </div>

                                {{-- <div class="form-group" style="display: none;">
                                    <label style="color:black;" for="update_name" class="col-form-label">Name:</label> <br>

                                    <textarea class="form-control" rows="2" id="update_name" name="sign_name" >{{$website_info->sign_name}}</textarea><br>
                                </div> --}}

                                {{-- <div class="form-group" style="display: none;">
                                    <label style="color:black;" for="update_position" class="col-form-label">Position:</label> <br>

                                    <textarea class="form-control" rows="2" id="update_position" name="sign_position">{{$website_info->sign_position}}</textarea>
                                </div> --}}

                                <div class="form-group">
                                    <label style="color:black;" for="update_phone" class="col-form-label">Phone No:</label><br>
                                    {{-- <input type="tel" class="form-control" id="update_phone" name="phone" value="{{$website_info->phone}}"> --}}
                                    <textarea class="form-control" rows="2" id="update_phone" name="phone">{{$website_info->phone}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="update_email" class="col-form-label">Email:</label><br>
                                    {{-- <input type="email" class="form-control" id="update_email" name="email" value="{{$website_info->email}}"> --}}
                                    <textarea class="form-control" rows="2" id="update_email" name="email">{{$website_info->email}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label style="color:black;" for="update_address" class="col-form-label">Address:</label><br>
                                    <textarea class="form-control" rows="4" id="update_address" name="address">{{$website_info->address}}</textarea>
                                </div>

                                <br>
                                <button type="submit" name="submit" class="rounded-0 btn btn-md btn-success">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#update_about').summernote();
            $('#update_history').summernote();
            $('#update_vision').summernote();
            $('#update_mission').summernote();

            $('#update_data').on('submit',function (e)
            {
                e.preventDefault();
                var updateData = new FormData(this);
                $.ajax
                ({
                    type: 'POST',
                    url: "{{url('admin/update_info')}}",
                    data:updateData,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        console.log(data);
                        // alert('it work');
                        // $('#edit_modalBox').modal('hide');
                        toastr.success('Update data successful');
                        window.location.load();
                    }
                });
                return false;
            });
        });
    </script>
@endsection
