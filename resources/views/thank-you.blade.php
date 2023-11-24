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
    </style>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-light" style="background-image:url({{ asset('assets/images2/Inner-banner-01.png') }});">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Thank You <i class="fa fa-plane"></i></h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Thank You</li>
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
            <div class="row" style="margin-top: 20px;">
                <div class="col-4">
                    <h6 class="text-center">Wahe Guru Ji ka Khalsa</h6>
                </div>
                <div class="col-4">
                    <h3 class="text-center">(First Come First Serve)</h3>
                </div>
                <div class="col-4">
                    <h6 class="text-center">Wahe Guru Ji ki Fateh</h6>
                </div>
            </div>
        </div>
        <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2 mb-0" style="margin-top: -80px;">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <h4 class="text-center">Thank You for the booking.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
    </div>
    <!-- Content END-->
@endsection
