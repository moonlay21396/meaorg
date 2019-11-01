@extends('user.site_user.user_master')
@section('title')
    Company |{{$websiteinfo['website_name']}}
@endsection
@section('content')
<style>
    .breadcrumbs ul li {
    display: inline-block;
    position: relative;
    color: #08A8F1;
    font-size: 12px;
    font-weight: 600;

}
.breadcrumbs ul li:not(:last-child)::after {
    display: inline-block;
    position: relative;
    content: '/';
    margin-left: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #FFFFFF;
    line-height: 0.75;

}
@media(min-width: 991px){
    header li a{
        font-size: 12px!important;
    }
}
@media(min-width: 991px) and (max-width: 1200px){
    .texts{
        top: 100px;
    }
}
@media(max-width: 991px){
    img.div{
        height:35vh!important;
        margin-top: 100px!important;
    }
    h2{
        display: inline-block;
    }
    .whole-wrap{
        margin-top: 0px!important;
    }
    .jobs-area{
        margin-top: -130px;
    }
    .search-area{
        margin-top: -110px;
    }


}
</style>
    <div class="text-center">
        <img src="{{asset('user/images/about.jpg')}}" alt="" class="img-fluid div" width="100%">
        <div class="div texts" style="position: relative;top: -100px; z-index: 100;">
            <h2 class="aab" style="color: #fff; margin-top: -100px;font-size: 48px;" >Company List</h2>
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}" style="color:#fff!important;">Home</a></li>
                    <li>Company List</li>
                </ul>
            </div>
        </div>
    </div>

<!-- Search Area Starts -->
<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" onsubmit="search_data()"  class="d-md-flex justify-content-between" >
                        {{csrf_field()}}

                        {{--                             <select id="main_id" name="main_id" onchange="set_sub_category()">--}}
                        {{--                                --}}{{--<option>Main Category</option>--}}
                        {{--                                @foreach($sub_cat as $data)--}}
                        {{--                                    <option value="{{$data['id']}}">{{$data['name']}}</option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{-- <select name="" id="sub_id">
                        </select> --}}
                        <select name="sub_id" id="sub_id">
                            <i style="padding: 0!important;margin: 0!important;">Title Name</option>
                                @foreach($sub_cat as $data)
                                    <option value="{{$data['id']}}">{{$data['name']}}</option>
                            @endforeach
                        </select>


                        <input type="text" id="keyword" name="keyword" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" required>
                        {{--<button type="submit" class="template-btn">Search</button>--}}
                        <input type="submit" class="template-btn" value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Area End -->



    <section class="jobs-area section-padding">
        <div class="container">
            <div class="row">
                 @if(count($companies) > 0)
                <div class="col-lg-9">
                    @foreach($companies as $data)
                    <div class="single-job mb-4 d-lg-flex justify-content-between">
                        <div class=" col-lg-6 job-text">
                            <h4>{{$data['name']}}</h4>
                            <ul class="mt-4">
                               <ul class="mt-4">
                                <li class="mb-3"><h5><i class="fa fa-map-marker"></i> {{$data['address']}}</h5></li>
                                <li class="mb-3"><h5><i class="fa fa-phone"></i> {{$data['phone']}}</h5></li>
                                <li class="mb-3"><i class="fa fa-envelope"></i> {{$data['email']}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 job-img align-self-center">
                            <img src="{{asset('upload/logo/'.$data['logo'])}}" alt="job" style="max-width: 100px;height:100px;">
                        </div>

                        <div class="col-lg-3 job-btn align-self-center">
                            <a href="{{url('company/'.$data['id'])}}" class="third-btn">More Details</a>

                        </div>
                    </div>
                   @endforeach

                   {{$paginate->links()}}

                </div>
                <div class="col-lg-3">
                    @foreach($ads as $ads_photos)
                    <div class="row main-content">
                         <div class="col-lg-12">
                             <a href="{{$ads_photos['link']}}" target="_blank">
                              <img src="{{$ads_photos['photo_url']}}" alt="" width="100%" height="200px">
                             </a>
                         </div>

                    </div>
                    @endforeach
                </div>
            @else
               <h2>Company Data Not Found</h2>
            @endif
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        set_sub_category=function(){
            var main=document.getElementById('main_id');
            var main_id=main.value;
            $.ajax({
                type: 'get',
                url: '{{url("get_sub_category")}}'+'/'+main_id,
                cache:false,
                contentType: false,
                processData: false,
                success: function(result) {
                    console.log(result);
                    let str="";
                    for (let item of result) {
                        str += "<option>" + item.name + "</option>";
                    }
                    let sub=document.querySelector("#sub_id");
                    sub.innerHTML+=str;

                    console.log(sub.innerHTML);

                },
            });
        }
        search_data=function () {
            event.preventDefault();
            var sub=document.getElementById('sub_id');
            var sub_id=sub.value;
            var key=document.getElementById('keyword');
            var keyword=key.value;

            var link='{{url('search/company')}}'+'/'+sub_id+'/'+keyword;
            console.log(link);
            // alert(link);
           window.open(link,'_self');
        }

//
//        function hello(){
//            let result=['hello','hi','how','are','you'];
//            let str="";
//            for (let item of result) {
//                str += "<option>" + item + "</option>";
//            }
//            let sub=document.querySelector("#sub_id");
//            sub.innerHTML+=str;
//            console.log(sub.innerHTML);
//
//        }

    </script>
    @endsection

