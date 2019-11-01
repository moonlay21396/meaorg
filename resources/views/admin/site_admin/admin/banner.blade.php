@extends('admin.layouts.site_admin.site_admin_design')
@section('title','Admin | Banner')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .imagePreview {
            width: 100%;
            height: 150px;
            background-position: center center;
            background:url('http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg');
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
@endsection

@section('nav_bar_text')
    Banner
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <button type="button" name="button" class="btn btn-success pull-right" data-target="#modalBox" data-toggle="modal" data-keyboard="false" data-backdrop="static">Add Banner</button>
                        </div>
                        <div class="card-body">
                                 <div class="card-body row image_data">   
                            {{-- @foreach($gallery as $gallery_photo)                       
                           <img src="{{asset('upload/photo/'.$gallery_photo['photo'])}}" style="padding-right:30px;width:250px;height:250px !important;"><br>
                            @endforeach --}}

                           @foreach($banner as $banner_photo)  
                             <div class="card" style="width: 17rem;margin-left:40px;">
                  
                                <img src="{{asset('upload/banner/'.$banner_photo['photos'])}}" style="padding-right:30px;width:303px;height:250px !important;"><br>
                                <div class="card-body">
                                <button class="btn btn-danger" type="button" onclick="imgs({{$banner_photo['id']}})">Delete</button>
                                </div>
                            </div>
                        @endforeach
                        </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- insert_model --}}
        <div class="modal fade" id="modalBox">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Banner Image</h4>
                        <button data-dismiss="modal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form id="insert_banner" enctype="multipart/form-data" class="md-form">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="btn btn-primary upload_btn">
                                                    Upload Photos<input type="file" accept="image/png,image/jpeg,image/jpg" id="upload_photo" name="photos[]" class="uploadFile img" value="Upload Photos" style="width: 0px;height: 0px;overflow: hidden;" required multiple="multiple">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary pull-right" id="btn_submit">Create</button>
                                         {{-- <div class="clearfix"></div> --}}
                                        </div>
                                          
                                    </div>
                                </div>
                               
                            </div>
                        </form>
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

        function imgs(id){
            // alert(id);
            if(confirm('Are you sure You want to delete!')==true){
                    $.ajax({
                        type: "get",
                        url: "./delete_banner/"+id,

                        cache: false,
                        success: function(data){
                            toastr.success('Delete banner successful');
                            window.location.reload();
                        }
                    });
                }else{
                    return false;
                }
             }


        $(document).ready(function(){
            $('#insert_banner').on('submit',function (e)
            {
                e.preventDefault();
                var alldata = new FormData(this);
                $.ajax
                ({
                    type: "POST",
                    url: "{{url('admin/insert_banner')}}",
                    data:alldata,
                    cache:false,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        // alert('itwork');
//                        console.log(data);
                        $('#modalBox').modal('hide');
                        toastr.success('Create banner images successful');
                        // window.location.reload();
                    }
                });
                return false;
            });

           $(document).on('click','.imgs',function(event){
              event.preventDefault();
              let id=$(this).data('id');
              if(confirm("Are you sure?")){
                $.ajax({
                  type: "get",
                  url: "./delete_banner/"+id,
                }).done(function(response){
                  if(response){
                    toastr_success("Delete Image Successful!");
                    
                  }
                }).fail(function(error){
                  console.log(error);
                });
              }
            });


        });



    
    </script>
@endsection