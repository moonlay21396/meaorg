@extends('user.site_user.user_master')
@section('title')
    Home |{{$websiteinfo['website_name']}}
@endsection

@section('content')
<style>
    .single-job .job-btn .job-btn1 {
    margin-right: -40px;
}
@media(min-width: 1200px) and (min-width: 1200px){
    .nice-select{
    width: 300px!important;
    }
    #keyword{
        width: 300px!important;
    }
}
@media(max-width: 991px){
    .custom-slide{
       margin-top: 70px!important;
        }
        .search-area{
            margin-top: -50px!important;
        }
        #mission_vision{
            background-color: #fcfcfc!important;
        }
    }
@media(min-width: 991px){
    .border_right_rule{
        border-right: 1px solid #cecece;
    }
}
.custom-slide{
    margin-top: 110px!important;
}
</style>

    <section class="custom-slide">
        <div class="">
            <div class="">
                <div class=" ">
                    <!-- <div class="banner-bg"></div> -->
                    <div id="demo" class="carousel slide" data-ride="carousel">

                  <!-- The slideshow -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{asset('user/images/home.jpg')}}" alt="Los Angeles" width="100%">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('user/images/home-2.jpg')}}" alt="Chicago" width="100%">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('user/images/home-3.jpg')}}" alt="New York" width="100%">
                    </div>
                  </div>



                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Search Area Starts -->
    <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" onsubmit="search_data()"  class="d-md-flex justify-content-between">
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



        <section id="mission_vision" style="background-color:#ececec;padding-top: 150px;padding-bottom: 50px;margin-top: -100px;">
            <div class="container">
                <div class="col-md-6 pull-right">
                    <h3 class="h4 text-center" style="font-size: 26px; font-weight: bold;">
                        Our Mission
                    </h3>
                     <p style="line-height: 30px;">{!! $websiteinfo['mission'] !!}</p>
                </div>
                <div class="col-md-6 border_right_rule">
                    <h3 class="h4 text-center" style="font-size: 26px; font-weight: bold;">
                        Our Vision
                    </h3>
                    <p style="line-height: 30px;">{!! $websiteinfo['vision'] !!}</p>
                </div>
            </div>
        </section>



    <!-- Category Area Starts -->
    <section class="category-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>All Company Category</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($sub_category as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-category text-center mb-4">
                            <img src="{{$item['logo_url']}}" alt="category">
                            <h4>{{$item['name']}}</h4>
                            <h5>{{$item['total_company']}} Companies</h5>
                            <a href="{{url('category/company/'.$item['id'])}}" class="more">More Details >>></a>
                        </div>
                    </div>
                @endforeach
            </div>
                <div class="more-job-btn mt-5 text-center">
                    <a href="{{url('/category')}}" class="template-btn">View All Category</a>
                </div>
        </div>
    </section>
    <!-- Category Area End -->

    <section class="aa">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Latest News & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <======Start Blog[0]====> --}}
                <div class="col-md-6">
                    <h4>
                        NEWS
                        <div style="border: 2px solid #04e;width: 30px;"></div>
                    </h4>
                    <br>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="edu2_event_des">
                                @include('user.function')

                            </div>
                        </div>

                        <div class="col-md-6">
                            <img src="{{$latest_news[0]['photo_url']}}" width="200px" height="200px">
                        </div>
                    </div>
                </div>
                {{-- <======End Blog[0]====> --}}

                {{-- <======Start Blog[1]====> --}}
                <div class="col-md-6">
                        <h4>
                            EVENTS
                            <div style="border: 2px solid #04e;width: 30px;"></div>
                        </h4>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{$latest_news[1]['photo_url']}}" width="200px" height="200px">
                            </div>
                            <div class="col-md-6">
                                <div class="edu2_event_des text-right">
                                    @php
                                    $date_time = $latest_news[1]['created_at'];
                                        $blog1_date = substr($date_time,0,10);
                                        $month = substr($blog1_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br><br>
                                    {{-- <h4>Dec</h4> --}}
                                    <p>{{$latest_news[1]['name']}}</p>
                                    <ul class="post-option text-right">
                                        <li>"By"<a href="#">Admin</a></li>
                                        <li>{!! substr($latest_news[1]['created_at'],0,10) !!}</li>
                                    </ul>
                                    <a href="{{url('blog/'.$latest_news[1]['id'])}}" class="secondary-btn">Read More</a>
                                    <span>{{substr($blog1_date,8)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- <=====End Blog[1]====> --}}
            </div>
            <br><br>

            <div class="row">
                {{-- <======Start Event[0]======> --}}
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="edu2_event_des">
                                @php
                                    $date_time = $latest_event[0]['date'];
                                        $event0_date = substr($date_time,0,10);
                                        $month = substr($event0_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br><br>
                                {{-- <h4>Dec</h4> --}}
                                <p>{{$latest_event[0]['title']}}</p>
                                <ul class="post-option text-left">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{{substr($latest_event[0]['date'],0,10)}}</li>
                                    {{-- <li>21 comments</li> --}}
                                </ul>
                                <a href="{{url('event/'.$latest_event[0]['id'])}}" class="secondary-btn">Read More</a>
                                <span>{{substr($event0_date,8)}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{$latest_event[0]['photo_url']}}" width="200px" height="200px">
                        </div>
                    </div>
                </div>
                 {{-- <=====End  Event[0]====> --}}

                {{-- <======Start Event[1]======> --}}
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$latest_event[1]['photo_url']}}" width="200px" height="200px">
                        </div>
                        <div class="col-md-6">
                            <div class="edu2_event_des text-right">
                                @php
                                    $date_time = $latest_event[1]['date'];
                                        $event1_date = substr($date_time,0,10);
                                        $month = substr($event1_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br><br>
                                {{-- <h4>Dec</h4> --}}
                                <p>{{$latest_event[1]['title']}}</p>
                                <ul class="post-option text-right">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{{substr($latest_event[1]['date'],0,10)}}</li>
                                    {{-- <li>21 comments</li> --}}
                                </ul>
                                <a href="{{url('event/'.$latest_event[1]['id'])}}" class="secondary-btn">Read More</a>
                                 <span>{{substr($event1_date,8)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                 {{-- <=====End  Event[1]====> --}}
            </div>

        </div>
    </section>
   <br><br>

   <section class="bb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Latest News & Event</h2>
                    </div>
                </div>
            </div>

            {{-- <======Start blog[0] for mobile======> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="{{$latest_news[0]['photo_url']}}" width="100%">
                                @php
                                    $date_time = $latest_news[0]['created_at'];
                                        $blog0_date = substr($date_time,0,10);
                                        $month = substr($blog0_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br>
                                <small style="font-size: 16px;">{{substr($blog0_date,8)}}<sup class="text-lowercase"></sup></small>
                                <p>{!! $latest_news[0]['name'] !!}</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{!! substr($latest_news[0]['created_at'],0,10) !!}</li>
                                </ul>
                                <a href="{{url('/blog/'.$latest_news[0]['id'])}}" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- <======End blog[0] for mobile======> --}}

            {{-- <======Start blog[1] for mobile======> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                               <img src="{{$latest_news[1]['photo_url']}}" width="100%">
                               @php
                                    $date_time = $latest_news[1]['created_at'];
                                        $blog1_date = substr($date_time,0,10);
                                        $month = substr($blog1_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br>
                                 <small style="font-size: 16px;">{{substr($blog1_date,8)}}<sup class="text-lowercase"></sup></small>
                                <p>{{$latest_news[1]['name']}}</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{!! substr($latest_news[0]['created_at'],0,10) !!}</li>
                                    {{-- <li>21 comments</li> --}}
                                </ul>
                                <a href="{{url('blog/'.$latest_news[1]['id'])}}" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- <======End blog[1] for mobile======> --}}

            {{-- <======End event[0] for mobile======> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="{{$latest_event[0]['photo_url']}}" width="100%">
                                @php
                                    $date_time = $latest_event[0]['date'];
                                        $event0_date = substr($date_time,0,10);
                                        $month = substr($event0_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br>
                                <small style="font-size: 16px;">{{substr($event0_date,8)}}<sup class="text-lowercase"></sup></small>
                                <p>{{$latest_event[0]['title']}}</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{{substr($latest_event[0]['date'],0,10)}}</li>
                                </ul>
                                <a href="{{url('event/'.$latest_event[0]['id'])}}" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- <======End event[0] for mobile======> --}}

            {{-- <======End event[1] for mobile======> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center cc">
                                <img src="{{$latest_event[1]['photo_url']}}" width="100%">
                                @php
                                    $date_time = $latest_event[1]['date'];
                                        $event1_date = substr($date_time,0,10);
                                        $month = substr($event1_date,5,3);

                                        switch ($month) {
                                            case '01-':
                                                echo "Jan";
                                                break;

                                            case '02-':
                                                echo "Feb";
                                                break;

                                            case '03-':
                                                echo "Mar";
                                                break;

                                            case '04-':
                                                echo "Apri";
                                                break;

                                            case '05-':
                                                echo "May";
                                                break;

                                            case '06-':
                                                echo "Jun";
                                                break;

                                            case '07-':
                                                echo "Jul";
                                                break;

                                            case '08-':
                                                echo "Aug";
                                                break;

                                            case '09-':
                                                echo "Sep";
                                                break;

                                            case '10-':
                                                echo "Oct";
                                                break;

                                            case '11-':
                                                echo "Nov";
                                                break;

                                            case '12-':
                                                echo "Dec";
                                                break;

                                            default:

                                                break;
                                        }
                                        @endphp
                                    <br>
                                <small style="font-size: 16px;">{{substr($event1_date,8)}}<sup class="text-lowercase"></sup></small>
                                <p>{{$latest_event[1]['title']}}</p>
                                <ul class="post-option text-center">
                                    <li>"By"<a href="#">Admin</a></li>
                                    <li>{{substr($latest_event[1]['date'],0,10)}}</li>
                                </ul>
                                <a href="{{url('event/'.$latest_event[1]['id'])}}" class="secondary-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            {{-- <======End event[1] for mobile======> --}}

        </div>
    </section>
   <br><br>

    <!-- Jobs Area Starts -->
    <section class="jobs-area section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jobs-title">
                        <h2 style="text-align: center;">Popular Company</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="main-content">
                        <div class="single-content1">
                            @foreach($popular_company as $item)
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-img align-self-center">
                                     <div>
                                        <img src="{{$item['photo_url']}}" alt="job" width="100px" height="100px;" class="img-responsive">
                                    </div>
                                </div>
                                <div class="job-text" style="margin-right: 150px;">
                                    <h4>{{$item['name']}} <small>( {{$item['subcategory_name']}} )</small></h4>
                                    <ul class="mt-4">
                                        <li class="mb-3"><i class="fa fa-envelope"></i> {{$item['email']}}</li>
                                        <li class="mb-3"><i class="fa fa-phone"></i> {{$item['phone']}}</<i></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="{{url('company/'.$item['id'])}}" class="third-btn job-btn1">More Detail</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    {{-- <div class="row main-content">
                        <div class="col-md-12">
                        <img src="{{asset('user/images/ad.jpg')}}" alt="" width="100%">
                        </div>
                    </div>
                    <br>
                    <div class="row main-content">
                        <div class="col-md-12">
                            <img src="{{asset('user/images/ad.jpg')}}" alt="" width="100%">
                        </div>
                    </div> --}}

                    @foreach($ads as $ads_photos)
                        <div class="row main-content">
                            <div class="col-lg-12">
                                <a href="{{$ads_photos['link']}}">
                                    <img src="{{$ads_photos['photo_url']}}" alt="" width="100%" height="200px">
                                </a>
                            </div>

                        </div>
                    @endforeach
                    <br>
                    {{-- <div class="row main-content">
                        <div class="col-md-12">
                            <img src="assets/images/ad.jpg" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row main-content">
                        <div class="col-md-12">
                            <img src="assets/images/ad.jpg" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row main-content">
                        <div class="col-md-12">
                            <img src="assets/images/ad.jpg" alt="" width="100%">
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="more-job-btn mt-5 text-center">
                        <a href="{{url('companies')}}" class="template-btn">View All Company</a>
            </div>
        </div>
    </section>
    <!-- Jobs Area End -->

     <!-- Download Area Starts -->
    <section class="download-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="download-text">
                        <h2>Download the app your mobile today</h2>
                        <p class="py-3">Light earth also land can't. May you midst shall lights blessed in lights Have gathered image morning blessed grass him. Appear female rule all seas she'd winged</p>
                        <div class="download-button d-sm-flex flex-row justify-content-start">
                            <div class="download-btn mb-3 mb-sm-0 flex-row d-flex">
                                <i class="fa fa-apple" aria-hidden="true"></i>
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on App Store
                                    </p>
                                </a>
                            </div>
                            <div class="download-btn dark flex-row d-flex">
                                <i class="fa fa-android" aria-hidden="true"></i>
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on Play Store
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pr-1">
                    <div class="download-img"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Download Area End -->
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
