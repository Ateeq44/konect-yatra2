@extends('admin.layouts.app')
@section('content')
<style type="text/css">
    body {
        background-color: #f8f9fa;
    }
    .ac-card{
        background-image: url("{{ asset('assets2/images/background.png') }}");
        background-position: center; 
        background-repeat: no-repeat; 
    }
    .output {
        justify-content: center;
        align-content: start;
        padding-top: 1rem;
    }
    .ac-card {
        grid-template-columns: 173px 1fr 50px;
        background-color: #fff;
        width: 354px;
        height: 240px;
        margin-bottom: 1rem;
        overflow: hidden;
    }
    .ac-icon {
        width: 40px;
        margin-top: 10px;
    }
    .ac-card-image {
        width: 100px;
        margin: 10px 0 0 15px;
    }
    .ac-card-1 {
        width: 120px;
        margin: 10px 0 0 15px;
    }
    .ac-card-2 {
        width: 80px;
        margin: 10px 0 0 15px;
    }
    .ac-card-info {
        font-size: 1.15rem;
        margin: 0;
    }
    .ac-card-info p {
        margin-top: 8px;
        line-height: 1.3;
    }
    .id-footer{
        background-color: #2e3092;
        color: white;
        padding: 15px 15px;
        margin-top: 4px;
    }
    .ac-logo {
        width: 125px;
        margin-left: 10px;
    }
    .skdf{
        font-size: 14px;
    }
    .border-dark{
        border: 1px solid;
        width: 120px;
        height: 72px;
        text-align: center;
        border-radius: 10px;
    }
</style>
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Yatri ID</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>Yatri ID</li>
            </ul>
            <div class="w-75 d-flex justify-content-end">
                <button class="btn btn-success" type="button" onclick="printDiv('yatri_id')">Print</button>
                <a class="btn btn-info ml-2" href="{{ url('admin/yatri-id', $id) }}">Next Page</a>
            </div>
        </div>
        <div class="main-body pt-3">
            <div class="row my-4" id="yatri_id" style="width: 100%; display: none;">
                @if(count($yatri_ids) > 0)
                @foreach($yatri_ids as $key => $value)
                <div style="width: 34%; display: flex; justify-content: center; float: left; margin-top: 10px !important; padding-bottom: 45px !important; border-bottom: 1px dotted #000;">
                    <main id="main" class="output" style="position: relative;">
                        <img src="{{ asset("assets2/images/background.png") }}" style="margin-top: 50px;">
                        <div class="ac-card mb-0" style="width: 354px; height: 240px; position: absolute; top: 0; right: -60%;">
                            <img style="width: 100%;" src="{{ asset('assets2/images/imgage-card.png') }}">    
                            <div class="d-flex" style="max-height: 120px;">
                                <div class="ac-card-image" style="width: 100px; height: 110px; margin: 10px 0 0 15px;">
                                    <img class="card-img-top" src="{{ asset('ids/'.@$value->photo) }}" alt="image" style="width: 100%; height: 100%;">
                                </div>
                                <div class="ac-card-1" style="width: 120px; height: 110px; margin: 10px 0 0 15px; padding-top: 15px;">
                                    <p class="font-weight-bold mb-0 skdf" style="line-height: 1.2; font-family: Rubik;font-size: 14px;">State <span style="margin-left: 25px;">({{ @$value->trip_type }})</span></p>
                                    <p class="mb-0 skdf" style="font-size: 14px;">{{ @$value->state }}</p>
                                    <p class="font-weight-bold mb-0 skdf" style="line-height: 1.2; font-family: Rubik;font-size: 14px;">{{ @$value->passport_country }} Passport #</p>
                                    <p class="mb-0 skdf" style="font-size: 14px;">{{ @$value->passport_no }}</p>
                                </div>
                                <div class="ac-card-2 text-center" style="width: 80px; height: 110px; margin: 10px 0 0 15px;">
                                    <img src="{{ asset('assets2/images/ds-removebg-preview.png') }}" style="width: 50px;">
                                    <div class="border-dark" style="margin-top: 10px; border-color: #bbb !important; border: 1px solid; width: 100%; height: 72px; text-align: center; border-radius: 10px;">
                                        <p class="mb-0 font-weight-bold" style="color: #aaa !important; font-size: 14px;">Yatri #</p>
                                        <p class="font-weight-bold" style="font-size: 30px; margin-top: 5px;">
                                            {{ @$value->yatri_no }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="font-weight-bold" style="margin-left: 10px; margin-right: 10px; margin-bottom: 0px;">
                                <span class="mr-1" style="font-size: 12px;">{{ @$value->name }},</span> 
                                <span style="font-size: 11px;">Father's Name: {{ @$value->father_name }}</span>
                            </p>
                            <div style="background-color: #2e3092 !important; width: 355px;">
                                <img src="{{ asset('assets2/images/footer_img.png') }}" style="width: 100%; height: 28px;">
                            </div>
                        </div>
                    </main>
                </div>
                @endforeach
                @endif
            </div>
            <div class="row my-4">
                @php
                    $i = 0;
                @endphp
                @if(count($yatri_ids) > 0)
                @foreach($yatri_ids as $key => $value)
                <div class="@if($i == 0) offset-lg-2 @endif col-lg-4 d-flex justify-content-center mb-3">
                    <main id="main" class="output">
                        <div class="ac-card mb-0">
                            <img style="width: 100%;" src="{{ asset('assets2/images/imgage-card.png') }}">    
                            <div class="d-flex" style="max-height: 120px;">
                                <div class="ac-card-image">
                                    <img class="card-img-top" src="{{ asset('ids/'.@$value->photo) }}" alt="image" style="width: 100%; height: 100%;">
                                </div>
                                <div class="ac-card-1 pt-2">
                                    <p class="font-weight-bold mb-0 skdf" style="line-height: 1.2;">State <span class="ml-4">({{ @$value->trip_type }})</span></p>
                                    <p class="mb-0 skdf">{{ @$value->state }}</p>
                                    <p class="font-weight-bold mb-0 skdf" style="line-height: 1.2;">{{ @$value->passport_country }} Passport #</p>
                                    <p class="mb-0 skdf">{{ @$value->passport_no }}</p>
                                </div>
                                <div class="ac-card-2 text-center">
                                    <img src="{{ asset('assets2/images/ds-removebg-preview.png') }}" style="width: 50px;">
                                    <div class="border-dark mt-2" style="border-color: #bbb !important; width: 100%;">
                                        <p class="mb-0 font-weight-bold" style="color: #aaa !important; font-size: 14px;">Yatri #</p>
                                        <p class="mt-1 font-weight-bold" style="font-size: 30px;">
                                            {{ @$value->yatri_no }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="mx-2 mb-0 font-weight-bold">
                                <span class="mr-1" style="font-size: 12px;">{{ @$value->name }},</span> 
                                <span style="font-size: 11px;">Father's Name: {{ @$value->father_name }}</span>
                            </p>
                            <div class="id-footer pt-0 mt-0 px-2">
                                <span style="font-size: 10px;">
                                    18502 Hillside Avenue, Jamaica, NY 11432
                                </span>
                                <span style="font-size: 11px;" class="ml-4">
                                    www.konnectyatra.org
                                </span>
                            </div>
                        </div>
                    </main>
                </div>
                @php
                    if ($i == 1) {
                        $i = 0;
                    } else {
                        $i = 1;
                    }
                @endphp
                @endforeach
                @endif
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