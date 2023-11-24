@extends('layouts.app')
@section('content')

    <style type="text/css">
        #main #faq .card {
            margin-bottom: 30px;
            border: 0;
        }

        #main #faq .card .card-header {
            border: 0;
            -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
            box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
            border-radius: 2px;
            padding: 0;
        }

        #main #faq .card .card-header .btn-header-link {
            color: #fff;
            display: block;
            text-align: left;
            background: #116CAB;
            font-weight: 600;
            padding: 20px;
        }

        #main #faq .card .card-header .btn-header-link:after {
            content: "\f107";
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            float: right;
        }

        #main #faq .card .card-header .btn-header-link.collapsed {
            background: #116CAB;
            color: #fff;
            font-weight: 600;
        }

        #main #faq .card .card-header .btn-header-link.collapsed:after {
            content: "\f106";
        }

        #main #faq .card .collapsing {
            background: #fff;
            line-height: 30px;
        }

        #main #faq .card .collapse {
            border: 0;
        }

        #main #faq .card .collapse.show {
            background: #fff;
            line-height: 30px;
            color: #222;
        }

        .select2-selection.select2-selection--single, .select2-selection__rendered {
            min-height: 40px;
        }

        .select2-selection__rendered, .select2-selection__arrow {
            margin-top: 5px;
        }

        .select2-container--default .select2-selection--single {
            border-color: #a8a8a8 !important;
            font-size: 14px;
        }

        input, select {
            border-color: #a8a8a8 !important;
            border-radius: 5px !important;
        }
    </style>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-light" style="background-image:url({{ asset('assets/images2/Inner-banner-01.png') }});">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Packages <i class="fa fa-plane"></i></h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ url('all-packages', @$id) }}">Packages</a></li>
                    <li>Apply</li>
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
        <div class="page-banner contact-page section-sp2" style="margin-top: -80px;">
            <div class="container px-5 py-4">
                <form method="POST" action="{{ route('user-store-yatri-visa') }}" class="row mt-4">
                    <div class="col-12 row mb-3 w-100" id="main">
                        <div class="accordion w-100" id="faq">
                            <div class="card">
                                <div class="card-header" id="faqhead1">
                                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                    aria-expanded="true" aria-controls="faq1">Application Information</a>
                                </div>

                                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                    <div class="card-body row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Passport No <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="passport" placeholder="Enter Passport No" required>
                                            <div class="invalid-feedback">
                                                Please provide valid passport.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Passport Type <span class="text-danger">*</span></label>
                                            <select class="form-control select2js" name="passport" required>
                                                <option value="">Select</option>
                                                <option value="Ordinary">Ordinary</option>
                                                <option value="Official">Official</option>
                                                <option value="Diplomatic">Diplomatic</option>
                                                <option value="UN Travel Document">UN Travel Document</option>
                                                <option value="UNLP">UNLP</option>
                                                <option value="Travel/Asylum/Temporary">Travel/Asylum/Temporary</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select passport type.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="issuing_authority" class="form-label">Issuing Authority <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="issuing_authority" id="issuing_authority" placeholder="Enter Issuing Authority" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide issuing authority.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Passport Country <span class="text-danger">*</span></label>
                                            <select class="form-control select2js" name="passport" required>
                                                <option value="">Select</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="United States">United States</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select passport type.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Issue Date <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="issue_date" max="{{ date('Y-m-d') }}"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide issue date.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Expiry Date <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="expiry_date" min="{{ date('Y-m-d') }}"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide expiry date.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqhead2">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                                    aria-expanded="true" aria-controls="faq2">Personal Information</a>
                                </div>

                                <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                    <div class="card-body row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="surname" class="form-label">Surname <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter Surname" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide surname.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="given_name" class="form-label">Given Name(s) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="given_name" id="given_name" placeholder="Enter Given Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide given name.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Date of Birth <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="dob" max="{{ date('Y-m-d') }}"
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide date of birth.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="place_birth" class="form-label">Place of Birth <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="place_birth" id="place_birth" placeholder="Enter Place of Birth" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide place of birth.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Marital Status <span class="text-danger">*</span></label>
                                            <div class="form-check row">
                                                <input class="mr-1" type="radio" name="marital_status"
                                                    value="single" id="single_status" checked required>
                                                <label class="form-check-label mr-2" for="single_status">Single</label>
                                                <input class="mr-1" type="radio" name="marital_status"
                                                    value="married" id="married_status" required>
                                                <label class="form-check-label mr-2" for="married_status">Married</label>
                                                <input class="mr-1" type="radio" name="marital_status"
                                                    value="widowed" id="widowed_status" required>
                                                <label class="form-check-label mr-2" for="widowed_status">Widowed</label>
                                                <input class="mr-1" type="radio" name="marital_status"
                                                    value="divorced" id="divorced_status" required>
                                                <label class="form-check-label mr-2" for="divorced_status">Divorced</label>
                                                <input class="mr-1" type="radio" name="marital_status"
                                                    value="separated" id="separated_status" required>
                                                <label class="form-check-label mr-2" for="separated_status">Separated</label>
                                                <div class="invalid-feedback">
                                                    Please select one of them.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <div class="form-check row">
                                                <input class="mr-1" type="radio" name="gender" id="male" value="male" checked required>
                                                <label class="form-check-label mr-2" for="male">Male</label>
                                                <input class="mr-1" type="radio" name="gender" id="female" value="female" required>
                                                <label class="form-check-label mr-2" for="female">Female</label>
                                                <div class="invalid-feedback">
                                                    Please select gender.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required>
                                            <div class="invalid-feedback">
                                                Please provide email address.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="mobile_number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" required>
                                            <div class="invalid-feedback">
                                                Please provide mobile number.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqhead3">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                                    aria-expanded="true" aria-controls="faq3">Family Information</a>
                                </div>

                                <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                    <div class="card-body row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="father_name" class="form-label">Father Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter Father Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide father name.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <select class="form-control selectjs" name="father_nationality" required>
                                                <option value="">Select</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="United States">United States</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select nationality.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label for="mother_name" class="form-label">Mother Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Enter Mother Name" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                            <div class="invalid-feedback">
                                                Please provide mother name.
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <select class="form-control selectjs" name="mother_nationality" required>
                                                <option value="">Select</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="United States">United States</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select nationality.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <ul>
                            <li>Price is guaranteed if booking is made 8 weeks in advance and paid in full. <b>Payable to Konnect.us, Inc. and mail at 185-02 Hillside Avenue, Jamaica NY 11432.</b></li>
                            <li>Stay in 4 Star Hotel in Islamabad & Lahore. Breakfast/Dinner and Refreshment included.</li>
                            <li>Pick and drop transportation throughout the holy trip.</li>
                            <li>Yatris must follow the group rules and regulation. No private tour is allowed due to security reason</li>
                            <li>This application is valid till October 31, 2023.</li>
                            <li>(Double occupancy $100 discount only for one person if wife and husband traveling together. Note: JFK-ISB-LHE-JFK (One way passengers will pay $600 less from the above package price)</li>
                            <li>For Business Class prices please call <b>RASHAD MAHMOOD @ +1 718-908-9464</b></li>
                            <li><b>Cancellation of Trip: Airline applicable cancellation charges and $100 service charges applies.</b></li>
                        </ul>
                    </div>
                    <div class="col-4 mt-2">
                        <label>Signature of Yatri</label>
                        <input class="form-control" type="text" name="signature" style="border-top: 0px; border-left: 0px; border-right: 0px;" onkeydown="return /[a-z ]/i.test(event.key)" required>
                        <div class="invalid-feedback">
                            Please add your signature.
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <button class="btn btn-primary px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- inner page banner END -->
    </div>
    <!-- Content END-->
    <style>
        table {
            border: 1px solid black;
            height: auto;
            width: auto;
        }

        th {

            padding: 0px;
            width: auto;
            height: auto;
            text-align: center;
        }

        td {
            border: 1px solid black;
            padding: 0px;
            width: auto;
            height: auto;
            text-align: center;
        }
    </style>
    <script>
        (function() {
            'use strict';

            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        var firstInvalidElement = form.querySelector(':invalid');
                        firstInvalidElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    <script>
        $(document).ready(function() {
            $(".selectjs").select2();
            // Attach click event listener to each checkbox
            $("#package_1, #package_2, #package_3").click(function() {
                // If a checkbox is checked, enable the other two
                if ($(this).is(":checked")) {
                    $("#package_1, #package_2, #package_3").not(this).prop("disabled", true);
                }
                // If a checkbox is unchecked, enable the other two
                else {
                    $("#package_1, #package_2, #package_3").prop("disabled", false);
                }
            });
            $('.phone_us').on('input', function() {
                let text=$(this).val()
                text=text.replace(/\D/g,'') 
                if(text.length>3) text=text.replace(/.{3}/,'$&-')
                if(text.length>7) text=text.replace(/.{7}/,'$&-')
                $(this).val(text);
            });
        });
    </script>
    <script>
        // Add event listeners to all the package checkboxes
        $("input[type='checkbox']").change(function() {
            var checked = $(this).is(":checked");
            var container = $(this).closest(".col-lg-4");
            container.find("input[type='radio']").prop("disabled", !checked);
            container.find("input[type='radio']").prop("required", true);
        });
    </script>
    <script>
        $(document).ready(function() {
            // Attach click event listener to radio buttons
            $('input[name="first_visit"]').on('click', function() {
                // If yes is selected, show the div
                if ($(this).val() === 'yes') {
                    $('#previous-visit').prop('required', false);
                    $('#entry-port').prop('required', false);
                    $('#first-visit').hide();
                }
                // If no is selected, hide the div
                else {
                    $('#previous-visit').prop('required', true);
                    $('#entry-port').prop('required', true);
                    $('#first-visit').show();
                }
            });

            $(document).on('change', '.passenger_first_visit', function() {
                if ($(this).val() === 'yes') {
                    $(this).parent().parent().next().find('.previous-visit').prop('required', false);
                    $(this).parent().parent().next().next().find('.entry-port').prop('required', false);
                    $(this).parent().parent().next().hide();
                    $(this).parent().parent().next().next().hide();
                } else {
                    $(this).parent().parent().next().find('.previous-visit').prop('required', true);
                    $(this).parent().parent().next().next().find('.entry-port').prop('required', true);
                    $(this).parent().parent().next().show();
                    $(this).parent().parent().next().next().show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', ".ticket_type", function() {
                if ($(this).val() == "round_way") {
                    $(".round_way_description").css("display", "block");
                    $(".one_way_description").css("display", "none");
                    $("#ticket_type").val("round_way");
                    var a = $("#package_type_1").attr("data-back-round");
                    var b = $("#package_type_2").attr("data-back-round");
                    var c = $("#package_type_3").attr("data-back-round");
                    $("#package_type_1").val(a);
                    $("#package_type_2").val(b);
                    $("#package_type_3").val(c);
                    var a = $(".package_type_1").attr("data-back-round");
                    var b = $(".package_type_2").attr("data-back-round");
                    var c = $(".package_type_3").attr("data-back-round");
                    $(".package_type_1").text(a);
                    $(".package_type_2").text(b);
                    $(".package_type_3").text(c);
                } else {
                    $(".one_way_description").css("display", "block");
                    $(".round_way_description").css("display", "none");
                    $("#ticket_type").val("one_way");
                    var a = $("#package_type_1").attr("data-back-one");
                    var b = $("#package_type_2").attr("data-back-one");
                    var c = $("#package_type_3").attr("data-back-one");
                    $("#package_type_1").val(a);
                    $("#package_type_2").val(b);
                    $("#package_type_3").val(c);
                    var a = $(".package_type_1").attr("data-back-one");
                    var b = $(".package_type_2").attr("data-back-one");
                    var c = $(".package_type_3").attr("data-back-one");
                    $(".package_type_1").text(a);
                    $(".package_type_2").text(b);
                    $(".package_type_3").text(c);
                }
            });
            // Attach click event listener to radio buttons
            $('input[name="have_passport"]').on('click', function() {
                // If yes is selected, show the div
                if ($(this).val() === 'yes') {
                    $('#green-card').prop('required', true);
                    if ($('#green-card').prev().find(".req").length == 0) {
                        $('#green-card').prev().append('<span class="text-danger req ml-1">*</span>');
                    }
                }
                // If no is selected, hide the div
                else {
                    $('#green-card').prop('required', false);
                    $('#green-card').prev().find('.req').remove();
                }
            });

            $(document).on('change', '.passenger_passport', function() {
                // If yes is selected, show the div
                if ($(this).val() == 'yes') {
                    $(this).parent().parent().next().next().next().find(".green-card").prop('required', true);
                    $(this).parent().parent().next().next().next().find("label").append('<span class="text-danger req ml-1">*</span>');
                }
                // If no is selected, hide the div
                else {
                    $(this).parent().parent().next().next().next().find(".green-card").prop('required', false);
                    $(this).parent().parent().next().next().next().find(".req").remove();
                }
            });
        });
    </script>
@endsection