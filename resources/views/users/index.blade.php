@extends('layouts.app')

@section('title')
    Users
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage - Users
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
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>isActive</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->getRoleNames() }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->isActive == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-secondary">Deactive</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('editUser', $user->id) }}"><i class="fa fa-edit" title="Edit User"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
