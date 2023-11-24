@extends('layouts.app')
@section('content')
<style>
    .listt {
    scrollbar-width: thin;
    scrollbar-color: #BBB #EEE;
}

.listt::-webkit-scrollbar {
  width: 10px;
}

.listt::-webkit-scrollbar-track {
  background: #C0C3C6;
}

.listt::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 10px;
  border: 3px solid #C0C3C6;
}
input[list]:focus {
    outline: none;
}
input[list] + div[list] {
    display: none;
    position: absolute;
    width: 100%;
    max-height: 164px;
    overflow-y: auto;
    max-width: 538px;
    background: #FFFFFF;
    border: var(--border);
    border-top: none;
    border-radius: 0 0 5px 5px;
    box-shadow: 0 3px 3px -3px #333;
    z-index: 100;
}
input[list] + div[list] span {
    display: block;
    padding: 7px 5px 7px 20px;
    color: black;
    background-color: #F7F7F7;
    text-decoration: none;
    cursor: pointer;
}
input[list] + div[list] span:not(:last-child) {
  border-bottom: 1px solid #EEE;
}
input[list] + div[list] span:hover {
    background-color: #4c1864;
    color:white;
}
.dropdown-toggle:hover, .dropdown-toggle:focus {
    color: black !important;
}
.back-to-top {
    background-color: #f54e18 !important;
    color: #fff !important;
}
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
<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-light" style="background-image:url({{ asset('assets/images2/bg-img-1.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Travel With Us </h1>
            </div>
        </div>
    </div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>Itinerary</li>
            </ul>
        </div>
    </div>
    <!-- Form Starts ---->
    <div class="container">
        <div class="container">
        @if(session('status'))
       <div class="row mt-4">
           <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
       </div>
       @endif
        </div>
       
    <form action="{{route('itinerary')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            @foreach($itenaries as $itenary)
      <input type="hidden" name="pass_id" value="{{$itenary->id}}"></input>
            @endforeach
            <div class="col-lg-12 mb-4 form-block " id="step-1" >
                <div class="row box " >
                    <div class="col-12">
                        <div class="row mt-3 mb-3 option-box">
                            <div class="col-4  lobel-div justify-content-center" id="rounddtrip">
                                <input type="radio" checked="checked" id="roundtrip" name="trip"
                                    value="roundtrip" />
                                <label for="roundtrip" class="lobel" data-radio="radio1">Round Trip </label>
                            </div>
                            <div class="col-4  lobel-div" id="oneeside">
                                <input type="radio" id="oneside" name="trip" value="oneside" />
                                <label for="oneside" class="lobel" data-radio="radio2">One Way</label>
                            </div>
                            <div class="col-4  lobel-div" id="multiicities">

                                <input type="radio" id="multicities" name="trip" value="multicities" />
                                <label for="multicities" class="lobel" data-radio="radio3">Multi Cities</label>
                            </div>
                        </div>
                        <div class="row input-form">

                            <div class=" autocomplete col-6 mt-2">
                                <label>From<span class="text-danger"> *</span></label>
                                <input type="text" list="list-language" class="form-control" id="myInput" placeholder="Departure From City" name="from" autocomplete="off" >
                                <div class="listt1" id="listt" list="list-language">
                                    
                                </div>
                                <span class="text-danger" id="error"></span>
                            </div>

                            <div class="  autocomplete col-6 mt-2">
                                <label>To<span class="text-danger"> *</span></label>
                                <input type="text" list="list-language1" class="form-control"  id="myInput2"  placeholder="Departure To City" name="to" >
                                <div class="listt1" id="listt1" list="list-language1">
                                    
                                </div>
                                <span class="text-danger" id="error2"></span>
                            </div>
                            <div class="col-6 mt-2">
                                <label>Date of Depart<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control" id="departdate" name="departdate" >
                                <span class="text-danger" id="error3"></span>
                            </div>

                            <div class="col-6 mt-2" id="return">
                                <label>Date of Return<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control" id="returndate" name="returndate" >
                                <span class="text-danger" id="error4"></span>
                            </div>
                            <div class="container" id="parent">

                            </div>
                            
                            <div class="col-6 mt-2" id="class">
                                <label for="class">Class<span class="text-danger"> *</span></label>
                                <select name="class" id="class">
                                    <option value="Economy Class">Economy Class</option>
                                    <option value="Premium Economy Class">Premium Economy Class</option>
                                    <option value="Business Class">Business Class</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2 text-right" id="addcity" >
                                <a class="removecity mr-2  " style="color:red;">Cancel</a>
                                <a class="addcity   fa fa-plus"> Add Flight</a>
                            </div>
                            <div class="col-6 mt-2">
                                <label>Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                <span class="text-danger" id="error5"></span>
                            </div>
                            <div class="col-6 mt-2">
                                <label>Email<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                <span class="text-danger" id="error6"></span>
                            </div>
                            <div class="col-6 mt-2">
                                <label>Phone Number<span class="text-danger"> *</span></label>
                                <input type="string" class="form-control" id="phone" placeholder="Phone Number" name="contact">
                                <span class="text-danger" id="error6"></span>
                            </div>
                            <div class="col-6 mt-2">
                                <label class="mt-1">Passengers<span class="text-danger"> *</span></labeL><br>
                                <div class="dropdown">
                                    <input class="passenger-input dropdown-toggle" type="text" id="dropdownMenuButton" name="passengers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" autocomplete="off" /><span class="fa fa-angle-down errspan"></span>
                                    <div class="passenger-dropdown dropdown-menu"
                                        aria-labelledby="dropdownMenuButton">
                                        <span class="tickets mt-4">ADULT</span>
                                        <div class="number mt-12">
                                            <button class="minus-adult minus fa fa-minus" type="button"></button>
                                            <input class="counterr" id="adult" type="text" name="adult" min="1"
                                                max="5" value="0" />
                                            <button class="plus-adult plus fa fa-plus" type="button"></button>
                                        </div><br>

                                        <span class="tickets">CHILD</span>
                                        <div class="number mt-2">
                                            <button class="minus-child minus fa fa-minus" type="button"></button>
                                            <input class="counterr" name="child" type="text" value="0" />
                                            <button class="plus-child plus fa fa-plus" type="button"></button>
                                        </div><br>

                                        <span class="tickets">Infant</span>
                                        <div class="number mt-2">
                                            <button class="minus-infant minus fa fa-minus" type="button"></button>
                                            <input class="counterr" type="text" name="infant" value="0" />
                                            <button class="plus-infant plus fa fa-plus" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <input type="button" value="Next" class="btn btn-sm float-right my-4 mr-4 passengers-detail" id="passengers-detail"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 form-block-extended" id="step-2">
                    <div class="row mt-2 heading-passenger">
                        <label style="font-size:20px; color:#4c1864">Passengers Details</label>
                    </div>
                    <div class="container" id="adultt" >
                        
                    </div>
                    <input type="button"  value="Back" class="btn btn-sm float-left mt-4 ml-4 " id="back"/>
                    <input type="submit" class="btn btn-sm float-right mt-4 mr-4"/>
                </div>
         
            </div>
       
         </div>
    </form>
</div>
<script src="{{asset('assets/js/iternary.js')}}"></script>
@endsection