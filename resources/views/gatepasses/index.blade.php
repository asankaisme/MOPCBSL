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
                        <span style="float: right;">
                            <a href="{{ route('gatepasses.create') }}"><img
                                    src="{{ asset('images/add-square-svgrepo-com.svg') }}" alt="add_icon" width="30px"
                                    height="30px" title="Add Record"></a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table tbl-sm table-striped table-hover">
                            <thead>
                                <th>Serial No</th>
                                <th>Company Name</th>
                                <th>Person</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($gatepasses as $gatepass)
                                    <tr>
                                        <td>{{ $gatepass->serialNo }}</td>
                                        <td>{{ $gatepass->companyName }}</td>
                                        <td>{{ $gatepass->personName }}</td>
                                        <td>{{ $gatepass->createdBy }}</td>
                                        <td>{{ $gatepass->createdDate }}</td>
                                        <td>{{ $gatepass->status }}</td>
                                        <td></td>
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
