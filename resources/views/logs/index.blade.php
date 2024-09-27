@extends('layouts.app')

@section('title')
    Activity-logs
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Activity Log
                    </div>
                    @php
                        $counter = 1;
                    @endphp
                    <div class="card-body">
                        <table id="myTable" class="table tbl-sm table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Description</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>User</th>
                                {{-- <th>Properties</th> --}}
                                <th>Logged at</th>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $activity->description ?? '-' }}</td>
                                        <td>{{ $activity->subject_type }}</td>
                                        <td>{{ $activity->subject_id }}</td>
                                        <td>{{ $activity->causer_id }}</td>
                                        {{-- <td>{{ $activity->properties }}</td> --}}
                                        <td>{{ $activity->created_at }}</td>
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
