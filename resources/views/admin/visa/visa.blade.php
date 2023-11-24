@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Visa</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>Visa</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table table-striped" id="myTables">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr #</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Place of Birth</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($visa) > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach($visa as $value)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$value->last_name.' '.@$value->first_name.' '.@$value->middle_name}}</td>
                                <td class="text-center">{{@$value->nationality}}</td>
                                <td class="text-center">{{@$value->dob}}</td>
                                <td class="text-center">{{@$value->place_birth}}</td>
                                <td class="text-center">{{@$value->gender}}</td>
                                <td class="text-center">{{@$value->email_address}}</td>
                                <td class="text-center">{{@$value->telephone}}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ url('admin/visa-detail', @$value->id) }}" class="bg-info mr-2" style="color:white; padding:11px;">Visa Detail</a>
                                    </div>
                                </td>
                                @php
                                    $count++;
                                @endphp
                            </tr>
                            @if(count($value->passenger) > 0)
                            @foreach($value->passenger as $k => $p)
                            <tr>
                                <td class="text-center">{{@$count}}</td>
                                <td class="text-center">{{@$p->last_name.' '.@$p->first_name.' '.@$p->middle_name}}</td>
                                <td class="text-center">{{@$p->nationality}}</td>
                                <td class="text-center">{{@$p->dob}}</td>
                                <td class="text-center">{{@$p->place_birth}}</td>
                                <td class="text-center">{{@$p->gender}}</td>
                                <td class="text-center">{{@$p->email_address}}</td>
                                <td class="text-center">{{@$p->telephone}}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a href="{{ url('admin/sub-visa-detail', @$p->id) }}" class="bg-info mr-2" style="color:white; padding:11px;">Visa Detail</a>
                                    </div>
                                </td>
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