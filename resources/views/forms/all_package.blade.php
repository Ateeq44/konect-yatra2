@extends('layouts.app')
@section('content')

<main id="content" class="site-main">

    <section class="inner-banner-wrap pb-0">
      <div class="inner-baner-container" 
      style="background-image: url(public/assets/images2/Inner-banner-01.png);background-position: center !important;">
      <div class="container">
        <div class="inner-banner-content">
         <h1 class="inner-title" style="font-size:65px !important;">PACKAGES</h1>
     </div>
 </div>
</div>
</section>
<section class="package-section" style="margin-top:100px !important;">
    <div class="container">
        <div class="col-12 mt-4">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="package-inner">
            <div class="row">
                @if(count(@$all_packages) > 0)
                @foreach(@$all_packages as $key => $val)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="package-wrap">
                        <figure class="feature-image m-0">
                            <a href="">
                                <img src="{{ asset('assets/flyers/'.@$val['image']) }}" style="width: 100%; border-radius: 30px; height: 500px !important;" alt="">
                            </a>
                        </figure>
                        {{-- <div class="package-content-wrap">
                            <div class="package-content" style="padding: 0 11px 0;">
                                
                            </div>
                        </div> --}}

                    </div>
                    <div class="btn-wrap d-flex justify-content-center ">
                        <a href="{{ url("all-packages", @$val->id) }}" class="button-text  width-6 btn-slider mt-0" style="    padding: 13px 50px !important;">Book Now</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
</main>

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
    });
</script>
<script>
    $(document).ready(function() {
            // Attach click event listener to radio buttons
        $('input[name="us_passport"]').on('click', function() {
                // If yes is selected, show the div
            if ($(this).val() === 'yes') {
                $('#green-card').prop('required', true);
            }
                // If no is selected, hide the div
            else {
                $('#green-card').prop('required', false);
            }
        });
    });
</script>
@endsection
