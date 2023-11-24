@extends('layouts.app')
@section('content')

    <style type="text/css">
        .owl-prev, .owl-next, .back-to-top, .btn {
            background-color: #f54e18 !important;
            color: #fff !important;
        }
        .title-head {
            border-color: #f54e18 !important;
        }
        .btn.dropdown-toggle.btn-default {
            color: #000 !important;
        }
        .slick-next:before, .slick-prev:before {
            color: #f54e18 !important;
        }
    </style>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-light" style="background-image:url({{ asset('assets/images2/Inner-banner-01.png') }});">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Our Info</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Our Info</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- inner page banner -->
        <div class="section-area section-sp2 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center heading-bx">
                        <h2 class="title-head m-b0">Our <span>Gallery</span></h2>
                        <p class="m-b0">Our Gallery includes all our memorable pictures of our old tours.</p>
                    </div>
                </div>
                <div class="row slick">
                    @if(count(@$gallery) > 0)
                    @foreach(@$gallery as $key => $value)
                    <div class="col-lg-6 col-md-6 heading-bx p-lr mb-5">
                        <div class="action-box">
                            <img src="{{asset('gallery/'.$value->image)}}" style="height: 400px; border-radius: 10px;" alt="">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- inner page banner END -->

        <div class="section-area section-sp2 pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center heading-bx">
                            <h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
                            <p class="m-b0">Upcoming Gurdwara Events To Feed Brain. </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
                            @foreach(@$events as $key => $value)
                            <div class="item">
                                <div class="event-bx">
                                    <div class="action-box">
                                        <img src="{{asset('news_and_events/'.@$value->image)}}" alt="">
                                    </div>
                                    <div class="info-bx d-flex">
                                        <div>
                                            <div class="event-time">
                                                <div class="event-date">{{ date('d', strtotime(@$value->event_date)) }}</div>
                                                <div class="event-month">{{ date('F', strtotime(@$value->event_date)) }}</div>
                                            </div>
                                        </div>
                                        <div class="event-info">
                                            <h4 class="event-title"><a href="#">{{ @$value->title }}</a></h4>
                                            <ul class="media-post">
                                                <li><a href="#"><i class="fa fa-clock-o"></i> {{ @$value->event_time }}</a></li>
                                                <li><a href="#"><i class="fa fa-map-marker"></i> {{ @$value->location }}</a></li>
                                            </ul>
                                            <p>{{ @$value->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Content END-->
@endsection
