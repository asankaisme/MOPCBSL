@extends('layouts.app')

@section('title')
    Cab-vouchers
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage - Cab Vouchers
                        @can('add_gatepass')
                            <span style="float: right;">
                                <a href="#"><img
                                        src="{{ asset('images/add-square-svgrepo-com.svg') }}" alt="add_icon" width="30px"
                                        height="30px" title="Make a request"></a>
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
                                @foreach ($cabVouchers as $cabVoucher)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $cabVoucher->serialNo }}</td>
                                        <td>{{ $cabVoucher->companyName }}</td>
                                        <td>{{ $cabVoucher->personName }}</td>
                                        <td>{{ $cabVoucher->userCreated->name }}</td>
                                        <td>{{ $cabVoucher->createdDate }}</td>
                                        {{-- <td>{{ $cabVoucher->authBy }}</td> --}}
                                        <td>
                                            @if ($cabVoucher->status == 'NEW')
                                                <span class="badge badge-primary">{{ $cabVoucher->status }}</span>
                                            @elseif ($cabVoucher->status == 'VRF')
                                                <span class="badge badge-warning">{{ $cabVoucher->status }}</span>
                                            @elseif ($cabVoucher->status == 'APR')
                                                <span class="badge badge-success">{{ $cabVoucher->status }}</span>
                                            @else
                                                <span class="badge badge-default">{{ $cabVoucher->status }}</span>
                                        </td>
                                @endif

                                <td>
                                    <a href="{{ route('gatepasses.show', $cabVoucher->id) }}" title="View"><i
                                            class="fa fa-newspaper-o" aria-hidden="true" style="color:black;"></i></a>
                                    @if ($cabVoucher->status != 'APR' && $cabVoucher->status != 'VRF')
                                        @can('verify_gatepass')
                                            @if (Auth::user()->id != $cabVoucher->createdBy)
                                                <a href="{{ route('gatepasses.verify', $cabVoucher->id) }}" title="Verify"><i
                                                        class="fa fa-check-circle" aria-hidden="true"
                                                        style="color:rgb(206, 157, 24);"></i></a>
                                            @endif
                                        @endcan
                                    @endif
                                    @if ($cabVoucher->status == 'VRF')
                                        @can('approve_gatepass')
                                            <a href="{{ route('gatepasses.approve', $cabVoucher->id) }}" title="Approve"><i
                                                    class="fa fa-check-circle" aria-hidden="true" style="color:green;"></i></a>
                                        @endcan
                                    @endif

                                    @if (Auth::user()->id == $cabVoucher->createdBy)
                                        @if ($cabVoucher->status == 'NEW')
                                            @can('add_gatepass')
                                                <a href="{{ route('gatepasses.addItemsToGatepass', $cabVoucher->id) }}"
                                                    title="Add Items"><i class="fa fa-plus" aria-hidden="true"
                                                        style="color:black;"></i></a>
                                            @endcan
                                            @can('delete_gatepass')
                                            <a href="{{ route('gatepasses.viewBeforeDestroy', $cabVoucher->id) }}"
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
