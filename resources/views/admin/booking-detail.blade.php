@extends('admin.layouts.app')
@section('content')
<style type="text/css">
    body {
        background-color: #f8f9fa;
    }
</style>
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Booking Details</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>Booking Details</li>
            </ul>
            <div class="w-75 d-flex justify-content-end">
                <button class="btn btn-success" type="button" onclick="printDiv('detail-div')">Print</button>
            </div>
        </div>
        <div class="main-body">
            <div class="row my-4" id="detail-div" style="display: none;">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Booking Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Submission Date:</span>
                                    <span style="width: 60%;">{{ date("d F, Y", strtotime(@$yatri->created_at)) }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Package Type:</span>
                                    <span style="width: 60%;">{{ explode(" ", @$yatri->package_type)[0] }} Occupancy</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Hotel Name:</span>
                                    <span style="width: 60%;">{{ !empty(@$yatri->hotel->name) ? @$yatri->hotel->name : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Total Amount:</span>
                                    <span style="width: 60%;">{{ explode(" ", @$yatri->package_type)[1] }}</span>
                                </li>
                            </ul>
                            <ul class="mb-0 w-50" style="list-style-type: none;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Package Name:</span>
                                    <span style="width: 60%;">{{ @$yatri->package->name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Ticket Type:</span>
                                    <span style="width: 60%;">{{ ucfirst(str_replace("_", " ", @$yatri->ticket_type)) }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Bus Number:</span>
                                    <span style="width: 60%;">{{ !empty(@$yatri->bus->bus_number) ? @$yatri->bus->bus_number : "N/A" }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-100 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Yatri's Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <h4 class="mb-4 w-100" style="padding-left: 30px;">Main Yatri Details</h4>
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Applicant Name:</span>
                                    <span style="width: 60%;">{{ @$yatri->last_name.' '.@$yatri->first_name.' '.@$yatri->middle_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Gurdwara Name:</span>
                                    <span style="width: 60%;">{{ (!empty(@$yatri->gurdwara->gurdwara_name)) ? @$yatri->gurdwara->gurdwara_name : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Father Name:</span>
                                    <span style="width: 60%;">{{ @$yatri->father_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Passport:</span>
                                    <span style="width: 60%;">{{ @$yatri->passport }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">First Visit:</span>
                                    <span style="width: 60%;">{{ @$yatri->first_visit }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Port of Entry:</span>
                                    <span style="width: 60%;">{{ (!empty(@$yatri->port_of_entry)) ? @$yatri->port_of_entry : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Address:</span>
                                    <span style="width: 60%;">{{ @$yatri->address }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">State:</span>
                                    <span style="width: 60%;">{{ @$yatri->state }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Pardan Name:</span>
                                    <span style="width: 60%;">{{ @$yatri->pardan_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Telephone:</span>
                                    <span style="width: 60%;">{{ @$yatri->telephone }}</span>
                                </li>
                                <li class="w-100 row mb-3">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Green Card:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->green_card))
                                            <img src="{{asset('greencard_uploads')}}/{{$yatri->green_card}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Photo:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->photo))
                                            <img src="{{asset('photo_uploads')}}/{{$yatri->photo}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Place of Birth:</span>
                                    <span style="width: 60%;">{{ @$yatri->place_birth }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Date of Birth:</span>
                                    <span style="width: 60%;">{{ @$yatri->dob }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Nationality:</span>
                                    <span style="width: 60%;">{{ @$yatri->nationality }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Gender:</span>
                                    <span style="width: 60%;">{{ @$yatri->gender }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Pre Visit Date:</span>
                                    <span style="width: 60%;">{{ (!empty(@$yatri->pre_visit_date)) ? @$yatri->pre_visit_date : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Profession:</span>
                                    <span style="width: 60%;">{{ @$yatri->profession }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">City:</span>
                                    <span style="width: 60%;">{{ @$yatri->city }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Zip:</span>
                                    <span style="width: 60%;">{{ @$yatri->zip }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Secetary Name:</span>
                                    <span style="width: 60%;">{{ @$yatri->secetary_name }}</span>
                                </li>
                                <li class="w-100 row mb-3">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Passport:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->us_passport))
                                            <img src="{{asset('passport_uploads')}}/{{$yatri->us_passport}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Uploaded State ID/Driving License:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->driving_license))
                                            <img src="{{asset('drivinglicense_uploads')}}/{{$yatri->driving_license}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            @if(count(@$yatri->passenger) > 0)
                            <h4 class="mt-4 w-100" style="padding-left: 30px;">Other Yatri's Details</h4>
                            @foreach(@$yatri->passenger as $key => $value)
                            <h5 class="mb-4 w-100 mt-4" style="padding-left: 30px;">{{ @$value->yatri_id }}</h5>
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Applicant Name:</span>
                                    <span style="width: 60%;">{{ @$value->last_name.' '.@$value->first_name.' '.@$value->middle_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Gurdwara Name:</span>
                                    <span style="width: 60%;">{{ (!empty(@$value->gurdwara->gurdwara_name)) ? @$value->gurdwara->gurdwara_name : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Father Name:</span>
                                    <span style="width: 60%;">{{ @$value->father_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Passport:</span>
                                    <span style="width: 60%;">{{ @$value->passport }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">First Visit:</span>
                                    <span style="width: 60%;">{{ @$value->first_visit }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Port of Entry:</span>
                                    <span style="width: 60%;">{{ (!empty(@$value->port_of_entry)) ? @$value->port_of_entry : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Address:</span>
                                    <span style="width: 60%;">{{ @$value->address }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">State:</span>
                                    <span style="width: 60%;">{{ @$value->state }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Pardan Name:</span>
                                    <span style="width: 60%;">{{ @$value->pardan_name }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Telephone:</span>
                                    <span style="width: 60%;">{{ @$value->telephone }}</span>
                                </li>
                                <li class="w-100 row mb-3">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Green Card:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($value->green_card))
                                            <img src="{{asset('greencard_uploads')}}/{{$value->green_card}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Photo:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->photo))
                                            <img src="{{asset('photo_uploads')}}/{{$value->photo}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Place of Birth:</span>
                                    <span style="width: 60%;">{{ @$value->place_birth }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Date of Birth:</span>
                                    <span style="width: 60%;">{{ @$value->dob }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Nationality:</span>
                                    <span style="width: 60%;">{{ @$value->nationality }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Gender:</span>
                                    <span style="width: 60%;">{{ @$value->gender }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Pre Visit Date:</span>
                                    <span style="width: 60%;">{{ (!empty(@$value->pre_visit_date)) ? @$value->pre_visit_date : "N/A" }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Profession:</span>
                                    <span style="width: 60%;">{{ @$value->profession }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">City:</span>
                                    <span style="width: 60%;">{{ @$value->city }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Zip:</span>
                                    <span style="width: 60%;">{{ @$value->zip }}</span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Secetary Name:</span>
                                    <span style="width: 60%;">{{ @$value->secetary_name }}</span>
                                </li>
                                <li class="w-100 row mb-3">
                                    <span style="width: 40%; font-weight: 500;">Uploaded Passport:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($value->us_passport))
                                            <img src="{{asset('passport_uploads')}}/{{$value->us_passport}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 row">
                                    <span style="width: 40%; font-weight: 500;">Uploaded State ID/Driving License:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($value->driving_license))
                                            <img src="{{asset('drivinglicense_uploads')}}/{{$value->driving_license}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-100 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <ul class="mb-0 w-50" style="list-style-type: none; padding-left: 50px;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span style="width: 40%; font-weight: 500;">Payment Type:</span>
                                    <span style="width: 60%;">{{ @$yatri->payment_type }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span style="width: 40%; font-weight: 500;">Bank Receipt:</span>
                                    <span style="width: 60%;">
                                        @if(!empty($yatri->bank_receipt))
                                            <img src="{{asset('bank_receipt')}}/{{$yatri->bank_receipt}}" style="width: 170px; height: 140px;">
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 w-50" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span style="width: 40%; font-weight: 500;">Routing Number:</span>
                                    <span style="width: 60%;">{{ !empty(@$yatri->routing_number) ? @$yatri->routing_number : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span style="width: 40%; font-weight: 500;">Account Number:</span>
                                    <span style="width: 60%;">{{ !empty(@$yatri->account_number) ? @$yatri->account_number : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span style="width: 40%; font-weight: 500;">Amount:</span>
                                    <span style="width: 60%;">{{ !empty(@$yatri->amount) ? "$".@$yatri->amount : "N/A" }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Booking Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Submission Date:</span>
                                    <span class="col-lg-8">{{ date("d F, Y", strtotime(@$yatri->created_at)) }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Package Type:</span>
                                    <span class="col-lg-8">{{ explode(" ", @$yatri->package_type)[0] }} Occupancy</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Hotel Name:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->hotel->name) ? @$yatri->hotel->name : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Total Amount:</span>
                                    <span class="col-lg-8">{{ explode(" ", @$yatri->package_type)[1] }}</span>
                                </li>
                            </ul>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Package Name:</span>
                                    <span class="col-lg-8">{{ @$yatri->package->name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Ticket Type:</span>
                                    <span class="col-lg-8">{{ ucfirst(str_replace("_", " ", @$yatri->ticket_type)) }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Bus Number:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->bus->bus_number) ? @$yatri->bus->bus_number : "N/A" }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Yatri's Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <h4 class="mb-4 col-lg-12">Main Yatri Details</h4>
                            <h5 class="mb-4 col-lg-12 mt-4">{{ @$yatri->yatri_id }}</h5>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Applicant Name:</span>
                                    <span class="col-lg-8">{{ @$yatri->last_name.' '.@$yatri->first_name.' '.@$yatri->middle_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Gurdwara Name:</span>
                                    <span class="col-lg-8">{{ (!empty(@$yatri->gurdwara->gurdwara_name)) ? @$yatri->gurdwara->gurdwara_name : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Father Name:</span>
                                    <span class="col-lg-8">{{ @$yatri->father_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Passport:</span>
                                    <span class="col-lg-8">{{ @$yatri->passport }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">First Visit:</span>
                                    <span class="col-lg-8">{{ @$yatri->first_visit }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Port of Entry:</span>
                                    <span class="col-lg-8">{{ (!empty(@$yatri->port_of_entry)) ? @$yatri->port_of_entry : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Address:</span>
                                    <span class="col-lg-8">{{ @$yatri->address }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">State:</span>
                                    <span class="col-lg-8">{{ @$yatri->state }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Pardan Name:</span>
                                    <span class="col-lg-8">{{ @$yatri->pardan_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Telephone:</span>
                                    <span class="col-lg-8">{{ @$yatri->telephone }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row mb-3">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Green Card:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($yatri->green_card))
                                            <a href="{{asset('greencard_uploads')}}/{{$yatri->green_card}}" data-lightbox="image-gallery">
                                                <img src="{{asset('greencard_uploads')}}/{{$yatri->green_card}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Photo:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($yatri->photo))
                                            <a href="{{asset('photo_uploads')}}/{{$yatri->photo}}" data-lightbox="image-gallery">
                                                <img src="{{asset('photo_uploads')}}/{{$yatri->photo}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Place of Birth:</span>
                                    <span class="col-lg-8">{{ @$yatri->place_birth }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Date of Birth:</span>
                                    <span class="col-lg-8">{{ @$yatri->dob }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Nationality:</span>
                                    <span class="col-lg-8">{{ @$yatri->nationality }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Gender:</span>
                                    <span class="col-lg-8">{{ @$yatri->gender }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Pre Visit Date:</span>
                                    <span class="col-lg-8">{{ (!empty(@$yatri->pre_visit_date)) ? @$yatri->pre_visit_date : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Profession:</span>
                                    <span class="col-lg-8">{{ @$yatri->profession }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">City:</span>
                                    <span class="col-lg-8">{{ @$yatri->city }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Zip:</span>
                                    <span class="col-lg-8">{{ @$yatri->zip }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Secetary Name:</span>
                                    <span class="col-lg-8">{{ @$yatri->secetary_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row mb-3">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Passport:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($yatri->us_passport))
                                            <a href="{{asset('passport_uploads')}}/{{$yatri->us_passport}}" data-lightbox="image-gallery">
                                                <img src="{{asset('passport_uploads')}}/{{$yatri->us_passport}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded State ID/Driving License:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($yatri->driving_license))
                                            <a href="{{asset('drivinglicense_uploads')}}/{{$yatri->driving_license}}" data-lightbox="image-gallery">
                                                <img src="{{asset('drivinglicense_uploads')}}/{{$yatri->driving_license}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            @if(count(@$yatri->passenger) > 0)
                            <h4 class="mt-4 col-lg-12">Other Yatri's Details</h4>
                            @foreach(@$yatri->passenger as $key => $value)
                            <h5 class="mb-4 col-lg-12 mt-4">{{ @$value->yatri_id }}</h5>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Applicant Name:</span>
                                    <span class="col-lg-8">{{ @$value->last_name.' '.@$value->first_name.' '.@$value->middle_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Gurdwara Name:</span>
                                    <span class="col-lg-8">{{ (!empty(@$value->gurdwara->gurdwara_name)) ? @$value->gurdwara->gurdwara_name : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Father Name:</span>
                                    <span class="col-lg-8">{{ @$value->father_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Passport:</span>
                                    <span class="col-lg-8">{{ @$value->passport }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">First Visit:</span>
                                    <span class="col-lg-8">{{ @$value->first_visit }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Port of Entry:</span>
                                    <span class="col-lg-8">{{ (!empty(@$value->port_of_entry)) ? @$value->port_of_entry : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Address:</span>
                                    <span class="col-lg-8">{{ @$value->address }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">State:</span>
                                    <span class="col-lg-8">{{ @$value->state }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Pardan Name:</span>
                                    <span class="col-lg-8">{{ @$value->pardan_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Telephone:</span>
                                    <span class="col-lg-8">{{ @$value->telephone }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row mb-3">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Green Card:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($value->green_card))
                                            <a href="{{asset('greencard_uploads')}}/{{$yatri->green_card}}" data-lightbox="image-gallery">
                                                <img src="{{asset('greencard_uploads')}}/{{$value->green_card}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Photo:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($value->photo))
                                            <a href="{{asset('photo_uploads')}}/{{$value->photo}}" data-lightbox="image-gallery">
                                                <img src="{{asset('photo_uploads')}}/{{$value->photo}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Place of Birth:</span>
                                    <span class="col-lg-8">{{ @$value->place_birth }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Date of Birth:</span>
                                    <span class="col-lg-8">{{ @$value->dob }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Nationality:</span>
                                    <span class="col-lg-8">{{ @$value->nationality }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Gender:</span>
                                    <span class="col-lg-8">{{ @$value->gender }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Pre Visit Date:</span>
                                    <span class="col-lg-8">{{ (!empty(@$value->pre_visit_date)) ? @$value->pre_visit_date : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Profession:</span>
                                    <span class="col-lg-8">{{ @$value->profession }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">City:</span>
                                    <span class="col-lg-8">{{ @$value->city }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Zip:</span>
                                    <span class="col-lg-8">{{ @$value->zip }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Secetary Name:</span>
                                    <span class="col-lg-8">{{ @$value->secetary_name }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row mb-3">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded Passport:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($value->us_passport))
                                            <a href="{{asset('passport_uploads')}}/{{$value->us_passport}}" data-lightbox="image-gallery">
                                                <img src="{{asset('passport_uploads')}}/{{$value->us_passport}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Uploaded State ID/Driving License:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($value->driving_license))
                                            <a href="{{asset('drivinglicense_uploads')}}/{{$value->driving_license}}" data-lightbox="image-gallery">
                                                <img src="{{asset('drivinglicense_uploads')}}/{{$value->driving_license}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Payment Information</h6>
                        </div>
                        <div class="card-body py-4 row">
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Payment Type:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->payment_type) ? @$yatri->payment_type : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Bank Receipt:</span>
                                    <span class="col-lg-8">
                                        @if(!empty($yatri->bank_receipt))
                                            <a href="{{asset('bank_receipt')}}/{{$yatri->bank_receipt}}" data-lightbox="image-gallery">
                                                <img src="{{asset('bank_receipt')}}/{{$yatri->bank_receipt}}" style="width: 170px; height: 140px;">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            <ul class="mb-0 col-lg-6" style="list-style-type: none;">
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Routing Number:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->routing_number) ? @$yatri->routing_number : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Account Number:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->account_number) ? @$yatri->account_number : "N/A" }}</span>
                                </li>
                                <li class="w-100 d-flex justify-content-between row">
                                    <span class="col-lg-4" style="font-weight: 500;">Amount:</span>
                                    <span class="col-lg-8">{{ !empty(@$yatri->amount) ? "$".@$yatri->amount : "N/A" }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
@endsection
@section('js')
    <script type="text/javascript">
        function printDiv(divName) {

            var printContents = document.getElementById(divName).innerHTML;

            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

                // document.body.style.marginTop="-45px";

            window.print();

            document.body.innerHTML = originalContents;

            location.reload();

        }
    </script>
@endsection