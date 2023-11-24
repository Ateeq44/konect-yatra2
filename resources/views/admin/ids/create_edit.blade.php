@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">IDs</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="{{ url('/admin/ids') }}">IDs</a></li>
                <li>{{ @$btn_text }}</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-12">
                    <form method="POST" action="{{ @$action }}" class="admin_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Name</label>
                                <input type="text" class="form-control require" value="{{@$yatri_id->name}}" name="name" required="" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Father Name</label>
                                <input type="text" class="form-control require" value="{{@$yatri_id->father_name}}" name="father_name" required="" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Yatri #</label>
                                <input type="number" class="form-control require" value="{{@$yatri_id->yatri_no}}" name="yatri_no" required="" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Passport #</label>
                                <input type="text" class="form-control require" value="{{@$yatri_id->passport_no}}" name="passport_no" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Passport Country</label>
                                <select class="form-control require" name="passport_country">
                                    <option value="US" @if(@$yatri_id->passport_country == "US") selected @endif>United States</option>
                                    <option value="IND" @if(@$yatri_id->passport_country == "IND") selected @endif>India</option>
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">State</label>
                                <input type="text" class="form-control require" value="{{@$yatri_id->state}}" name="state" />
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Trip Type</label>
                                <select class="form-control require" name="trip_type">
                                    <option value="RT" @if(@$yatri_id->trip_type == "RT") selected @endif>Round Trip</option>
                                    <option value="O/W" @if(@$yatri_id->trip_type == "O/W") selected @endif>One Way</option>
                                    <option value="LP" @if(@$yatri_id->trip_type == "LP") selected @endif>Land Package</option>
                                </select>
                            </div>
                            {{-- <div class="col-lg-6 form-group">
                                <label class="form_label_color">Type</label>
                                <select class="form-control require" name="type">
                                    <option value="yatri" @if(@$yatri_id->type == "yatri") selected @endif>Yatri</option>
                                    <option value="staff" @if(@$yatri_id->type == "staff") selected @endif>Staff</option>
                                </select>
                            </div> --}}
                            <div class="col-lg-6 form-group">
                                <label class="form_label_color">Photo</label>
                                <input type="file" class="form-control require" name="photo" @if(empty(@$yatri_id->photo)) required="" @endif />
                            </div>
                            @if(!empty(@$yatri_id->photo))
                            <div class="form-group offset-md-6 col-md-6">
                                <img src="{{ asset('ids/'.@$yatri_id->photo) }}" height="150" width="150">
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary" style="float: right;">{{ @$btn_text }}</button>
                        <div class="response"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
@endsection