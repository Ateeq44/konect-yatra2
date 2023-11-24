@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">ETPB List</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>ETPB List</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row my-4">
                <div class="col-lg-12 mb-4 text-center">
                    <h3>DETAILS REQUIRED FROM GROUPS/INDIVIDUALS</h3>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped" id="myTables">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr #</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Indian Passport No.</th>
                                <th scope="col">Other Passport No.</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">PR Status/PR No. If any</th>
                                <th scope="col">Religion</th>
                                <th scope="col">Itinerary/Full Visit Schedule Hotel Booking</th>
                                <th scope="col">Previous Visits Detail</th>
                                <th scope="col">Reference in Pakistan (Name, Address & Number)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($detail) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach($detail as $value)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$value->last_name.' '.@$value->first_name.' '.@$value->middle_name}}</td>
                                <td class="text-center">{{@$value->father_name}}</td>
                                <td class="text-center">{{@$value->passport}}</td>
                                <td class="text-center">{{@$value->other_passport}}</td>
                                <td class="text-center">{{@$value->nationality}}</td>
                                <td class="text-center"></td>
                                <td class="text-center">Sikh</td>
                                <td class="text-center">{{@$value->hotel->name}}</td>
                                <td class="text-center">{{@$value->pre_visit_date}}<br>{{@$value->port_of_entry}}</td>
                                <td class="text-center">Konnect Yatra USA</td>
                                @php
                                    $count++;
                                @endphp
                            </tr>
                            @if(count($value->passenger) > 0)
                            @foreach($value->passenger as $k => $p)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$p->last_name.' '.@$p->first_name.' '.@$p->middle_name}}</td>
                                <td class="text-center">{{@$p->father_name}}</td>
                                <td class="text-center">{{@$p->passport}}</td>
                                <td class="text-center">{{@$p->other_passport}}</td>
                                <td class="text-center">{{@$p->nationality}}</td>
                                <td class="text-center"></td>
                                <td class="text-center">Sikh</td>
                                <td class="text-center">{{@$p->hotel->name}}</td>
                                <td class="text-center">{{@$p->pre_visit_date}}<br>{{@$p->port_of_entry}}</td>
                                <td class="text-center">Konnect Yatra USA</td>
                                @php
                                    $count++;
                                @endphp
                            </tr>
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                        </tbody>
                        {{-- @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
@endsection