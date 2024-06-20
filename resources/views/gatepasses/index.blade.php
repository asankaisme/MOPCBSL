@extends('layouts.app')

@section('title')
    Gatepasses
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage - Gatepasses
                        @can('add_gatepass')
                            <span style="float: right;">
                                <a href="{{ route('gatepasses.create') }}"><img
                                        src="{{ asset('images/add-square-svgrepo-com.svg') }}" alt="add_icon" width="30px"
                                        height="30px" title="Add Record"></a>
                            </span>
                        @endcan

                    </div>
                    @php
                        $counter = 1;
                    @endphp
                    <div class="card-body">
                        <table id="myTable" class="table tbl-sm table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Serial No</th>
                                <th>Company Name</th>
                                <th>Person</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                {{-- <th>Auth By</th> --}}
                                <th>Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($gatepasses as $gatepass)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $gatepass->serialNo }}</td>
                                        <td>{{ $gatepass->companyName }}</td>
                                        <td>{{ $gatepass->personName }}</td>
                                        <td>{{ $gatepass->userCreated->name }}</td>
                                        <td>{{ $gatepass->createdDate }}</td>
                                        {{-- <td>{{ $gatepass->authBy }}</td> --}}
                                        <td>
                                            @if ($gatepass->status == 'NEW')
                                                <span class="badge badge-primary">{{ $gatepass->status }}</span>
                                            @elseif ($gatepass->status == 'VRF')
                                                <span class="badge badge-warning">{{ $gatepass->status }}</span>
                                            @elseif ($gatepass->status == 'APR')
                                                <span class="badge badge-success">{{ $gatepass->status }}</span>
                                            @else
                                                <span class="badge badge-default">{{ $gatepass->status }}</span>
                                        </td>
                                @endif

                                <td>
                                    <a href="{{ route('gatepasses.show', $gatepass->id) }}" title="View"><i
                                            class="fa fa-newspaper-o" aria-hidden="true" style="color:black;"></i></a>
                                    @if ($gatepass->status != 'APR' && $gatepass->status != 'VRF')
                                        @can('verify_gatepass')
                                            @if (Auth::user()->id != $gatepass->createdBy)
                                                <a href="{{ route('gatepasses.verify', $gatepass->id) }}" title="Verify"><i
                                                        class="fa fa-check-circle" aria-hidden="true"
                                                        style="color:rgb(206, 157, 24);"></i></a>
                                            @endif
                                        @endcan
                                    @endif
                                    @if ($gatepass->status == 'VRF')
                                        @can('approve_gatepass')
                                            <a href="{{ route('gatepasses.approve', $gatepass->id) }}" title="Approve"><i
                                                    class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i></a>
                                        @endcan
                                    @endif

                                    @if (Auth::user()->id == $gatepass->createdBy)
                                        @if ($gatepass->status == 'NEW')
                                            @can('add_gatepass')
                                                <a href="{{ route('gatepasses.addItemsToGatepass', $gatepass->id) }}"
                                                    title="Add Items"><i class="fa fa-plus" aria-hidden="true"
                                                        style="color:black;"></i></a>
                                            @endcan
                                            @can('delete_gatepass')
                                            <a href="{{ route('gatepasses.viewBeforeDestroy', $gatepass->id) }}"
                                                title="Delete"><i class="fa fa-trash" aria-hidden="true"
                                                    style="color:rgb(250, 80, 80);"></i></a>
                                            @endcan
                                        @endif
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                @include('includes.message')
            </div>
        </div>
    </div>
@endsection

@pushOnce('custom-styles')
    <link rel="stylesheet" href="{{ asset('dt/datatables.min.css') }}">
@endPushOnce

@pushOnce('footer-scripts')
    <script src="{{ asset('dt/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endPushOnce
