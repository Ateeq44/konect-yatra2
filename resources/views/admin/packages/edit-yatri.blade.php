@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Yatri Visa Packages</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Admin Can Edit Yatri Applied Visa Packages</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{route('yatri-visa-edit',$yatri->id)}}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-12">
                            <h6>Instruction & Document Required</h6>
                            <ul class="ml-4">
                                <li>1 Photograph (white background)</li>
                                <li>Copy of Passport (6 months valid Passport /copy of Green Card if not US citizen)
                                </li>
                                <li>Copy of ID card / Driver’s License</li>
                                <li>Applications required 8 weeks before departure </li>
                            </ul>
                            <h5>Visa Form to be filled up</h5>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Applicant Name</label>
                                        <input type="email" class="form-control" name="applicant_name"
                                            id="exampleFormControlInput1" placeholder="Enter Name" required>
                                        <div class="invalid-feedback">
                                            Please provide applicant name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Place of Birth</label>
                                        <input type="email" class="form-control" name="place_birth"
                                            id="exampleFormControlInput1" placeholder="Enter place of birth" required>
                                        <div class="invalid-feedback">
                                            Please provide place of birth.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" max="{{ date('Y-m-d') }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide date of birth.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Father Name</label>
                                    <input class="form-control" type="text" name="father_name"
                                        placeholder="Enter Father Name" required>
                                    <div class="invalid-feedback">
                                        Please provide father name.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Nationality</label>
                                    <input class="form-control" type="text" name="nationality"
                                        placeholder="Your Nationality" required>
                                    <div class="invalid-feedback">
                                        Please provide nationality.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Passport No</label>
                                    <input class="form-control" type="text" name="passport"
                                        placeholder="Your Passport" required>
                                    <div class="invalid-feedback">
                                        Please provide valid passport.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="male"
                                            required>
                                        <label class="form-check-label"
                                            for="gender">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="gender" value="female"
                                            required>
                                        <label class="form-check-label" for="gender">Female</label>
                                        <div class="invalid-feedback">
                                            Please select gender.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Is this your first visit to Pakistan?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="first_visit"
                                            value="yes" required>
                                        <label class="form-check-label"
                                            for="gender">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="first_visit"
                                            value="no" required>
                                        <label class="form-check-label" for="gender">No</label>
                                        <div class="invalid-feedback">
                                            Please select one of them.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2" id="first-visit" style="display: none;">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label> Date of Previous Visit</label>
                                    <input class="form-control" type="date" id="previous-visit"
                                        name="pre_visit_date" min="{{ date('Y-m-d') }}">
                                    <div class="invalid-feedback">
                                        Please provide previous visit date.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label> Port of Entery</label>
                                    <input class="form-control" type="text" id="entry-port" name="port_of_entry"
                                        placeholder="Enter port of Entery">
                                    <div class="invalid-feedback">
                                        Please provide port of entry.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Profesion</label>
                                    <input class="form-control" type="text" name="profession"
                                        placeholder="What's your profession" required>
                                    <div class="invalid-feedback">
                                        Please provide profession.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Number of Family Member Traveling With You</label>
                                    <input class="form-control" type="text" name="total_traveling_members"
                                        placeholder="Enter Number of Family Member Traveling With You" required>
                                    <div class="invalid-feedback">
                                        Please provide number of family members.
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Family Member 1</label>
                                    <input class="form-control" type="text" name="family_1"
                                        placeholder="Enter Name of Family Member 1" required>
                                    <div class="invalid-feedback">
                                        Please provide family member name.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Family Member 2</label>
                                    <input class="form-control" type="text" name="family_2"
                                        placeholder="Enter Name of Family Member 2" required>
                                    <div class="invalid-feedback">
                                        Please provide family members name.
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Name of Nearest Gurdwara</label>
                                    <input class="form-control" type="text" name="gurdwara_name"
                                        placeholder="Enter name of your nearest gurdwara" required>
                                    <div class="invalid-feedback">
                                        Please provide nearest gurdwara name.
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" name="address"
                                        placeholder="Enter Address" required>
                                    <div class="invalid-feedback">
                                        Please provide address.
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>City</label>
                                    <input class="form-control" type="text" name="city"
                                        placeholder="Enter city" required>
                                    <div class="invalid-feedback">
                                        Please provide city.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>State</label>
                                    <input class="form-control" type="text" name="state"
                                        placeholder="Enter state" required>
                                    <div class="invalid-feedback">
                                        Please provide state.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>Zip</label>
                                    <input class="form-control" type="text" name="zip"
                                        placeholder="Enter zip" required>
                                    <div class="invalid-feedback">
                                        Please provide valid zip.
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>Name of Pardan</label>
                                    <input class="form-control" type="text" name="pardan_name"
                                        placeholder="Name of pardan" required>
                                    <div class="invalid-feedback">
                                        Please provide pardan name.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>Name of Secetary Gurdwara</label>
                                    <input class="form-control" type="text" name="secetary_name"
                                        placeholder="Enter name of secetary gurdwara" required>
                                    <div class="invalid-feedback">
                                        Please provide name of secretary.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label>Telephone</label>
                                    <input class="form-control" type="text" name="telephone"
                                        placeholder="Enter Telephone" required>
                                    <div class="invalid-feedback">
                                        Please provide telephone.
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-12">
                                    <label>Do you have US Passport ?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            value="yes" required>
                                        <label class="form-check-label"
                                            >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio"
                                            value="no" required>
                                        <label class="form-check-label" >No</label>
                                        <div class="invalid-feedback">
                                            Please select one of them.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-2" id="us_passport">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="formFile" class="form-label">Upload Passport</label>
                                    <input class="form-control" type="file" name="us_passport" id="formFile" >
                                    <div class="invalid-feedback">
                                        Please upload valid passport.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="formFile" class="form-label">Upload Green Card</label>
                                    <input class="form-control" type="file" name="green_card" id="green-card">
                                    <div class="invalid-feedback">
                                        Please upload valid green card.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="formFile" class="form-label">Upload ID/Driving License</label>
                                    <input class="form-control" type="file" name="driving_license" id="formFile" >
                                    <div class="invalid-feedback">
                                        Please upload valid ID or Driving License
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <ul class="ml-4">
                                <li>Price is guaranteed if booking is made 8 weeks in advance and paid in full. Payable
                                    to Konnect.us, Inc. and mail at <b>185-02 Hillside Avenue, Jamaica NY 11432</b>.
                                </li>
                                <li>Stay in 4 Star Hotel in Lahore. Breakfast/Dinner and Refreshment included. </li>
                                <li>Pick and drop transportation included throughout the holy trip. </li>
                                <li>Yatris must follow the group rules and regulation. </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <p><b>Note</b>: Above price is valid for New York residents, for all other states please
                                call for the price. <b>IAD PAX add $50</b> in the package price</p>
                            <p>For Business Class prices please call <b style="font-size: 16px;">RASHAD MAHMOOD @ +1
                                    718-908-9464 </b></p>
                            <p>Cancellation of Trip: Airline applicable cancellation charges and $100 service charges
                                applies. </p>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
@endsection