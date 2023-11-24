@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Airline List</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>Airline List</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row my-4">
                <div class="col-lg-12 mb-4 text-center">
                    <h3>AIRLINE LIST</h3>
                </div>
                <div class="col-lg-12">
                    <table class="table table-striped" id="myTables">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr #</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Passport No.</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Special Request</th>
                                <th scope="col">Food Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($yatri) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach($yatri as $value)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$value->last_name}}</td>
                                <td class="text-center">{{@$value->first_name}}</td>
                                <td class="text-center">{{@$value->middle_name}}</td>
                                <td class="text-center">{{@$value->passport}}</td>
                                <td class="text-center">{{@$value->dob}}</td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                @php
                                    $count++;
                                @endphp
                            </tr>
                            @if(count($value->passenger) > 0)
                            @foreach($value->passenger as $k => $p)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$p->last_name}}</td>
                                <td class="text-center">{{@$p->first_name}}</td>
                                <td class="text-center">{{@$p->middle_name}}</td>
                                <td class="text-center">{{@$p->passport}}</td>
                                <td class="text-center">{{@$p->dob}}</td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
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