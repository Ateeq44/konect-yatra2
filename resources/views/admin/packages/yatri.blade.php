@extends('admin.layouts.app')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Yatri Bookings</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li>Admin Can View Yatri Applied Bookings</li>
            </ul>
        </div>
        <div class="main-body">
            <div class="row pb-5">
                <div class="col-lg-12">
                    <table class="table table-striped" id="myTables">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr #</th>
                                <th scope="col">Yatri ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Month</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($yatries as $package)
                            <tr>
                                <td>{{@$count}}</td>
                                <td>{{@$package->yatri_id}}</td>
                                <td>{{@$package->last_name.' '.@$package->first_name.' '.@$package->middle_name}}</td>
                                <td>{{@$package->package_month}}</td>
                                <td>{{@$package->package_type}}</td>
                                <td><span @if(@$package->payment_status == "pending") class="badge badge-warning" @elseif(@$package->payment_status == "paid") class="badge badge-success" @else class="badge badge-danger" @endif style="font-size: 16px;">{{ucfirst($package->payment_status)}}</span></td>
                                <td>
                                    <span style="display: flex;">
                                        <form method="POST" action="{{ route('apply-package-delete', $package->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="GET">
                                            <button type="submit" class="btn bg-danger show_confirm"  title='Delete' style="padding: 11px;"><i class=" text-white fa fa-trash"></i></button>
                                        </form>&nbsp;
                                        <a href="{{route('yatri-visa-view',$package->id)}}" class="fa fa-eye bg-primary" style="color:white; padding:9px;"></a>
                                        <a href="{{url('admin/booking-detail',$package->id)}}" class="bg-success ml-2" style="color:white; padding:9px;">Details</a>
                                        <a href="{{ url('admin/add-remarks', $package->id) }}" class="btn btn-primary ml-2">Remarks</a>
                                        {{-- <a href="{{route('yatri-visa-edit',$package->id)}}" class="fa fa-edit bg-warning" style="color:white; padding:11px;"></a> --}}
                                    </span>
                                </td>
                                @php
                                    $count++;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>
@endsection
