@extends('admin.layouts.app')
@section('content')
<style type="text/css">
    .dt-buttons {
        display: none;
    }
</style>
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">IDs</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
                <li>IDs</li>
            </ul>
        </div>
        <div class="main-body">
            <a href="{{ url('admin/ids/create') }}" class="btn btn-primary">
                Create ID <i class="fa fa-plus"></i>
            </a>
            <a href="{{ url('admin/yatri-id', 1) }}" class="btn btn-primary ml-2">
                View IDs <i class="fa fa-eye"></i>
            </a>
            <div class="row my-4">
                <div class="col-lg-12">
                    <table class="table table-striped" id="myTables">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" scope="col">Yatri #</th>
                                <th class="text-center" scope="col">Photo</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Father Name</th>
                                <th class="text-center" scope="col">Passport #</th>
                                <th class="text-center" scope="col">State</th>
                                {{-- <th class="text-center" scope="col">Type</th> --}}
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($yatri_ids) > 0)
                            @foreach($yatri_ids as $yatri_id)
                            <tr>
                                <td class="text-center">{{@$yatri_id->yatri_no}}</td>
                                <td class="text-center">
                                    <img src="{{ asset('ids/'.@$yatri_id->photo) }}" height="80" width="80">
                                </td>
                                <td class="text-center">{{@$yatri_id->name}}</td>
                                <td class="text-center">{{@$yatri_id->father_name}}</td>
                                <td class="text-center">{{@$yatri_id->passport_no}}</td>
                                <td class="text-center">{{@$yatri_id->state}}</td>
                                {{-- <td class="text-center">{{ucfirst(@$yatri_id->type)}}</td> --}}
                                <td>
                                    <div style="display: flex;">
                                        {{-- <a href="{{url('admin/yatri-id',$yatri_id->id)}}" class="bg-primary mr-2" style="color:white; padding:9px;">View ID</a> --}}
                                        <a href="{{ url('admin/ids/edit', @$yatri_id->id) }}" class="fa fa-edit bg-info mr-2" style="color:white; padding:11px;" data-id="{{@$yatri_id->id}}"></a>
                                        <form method="POST" action="{{ url('/admin/ids/delete', @$yatri_id->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="GET">
                                            <button type="submit" class="btn bg-danger show_confirm" title='Delete' style="padding: 11px;"><i class="text-white fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7" class="text-center">No result found.</td>
                            </tr>
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