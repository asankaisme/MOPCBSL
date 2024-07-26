@extends('layouts.app')

@section('title')
    Users-Edit
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage User - {{ $user->name }} | Role: <span
                        class="badge badge-info">{{ $user->getRoleNames() }}</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        {{-- <li class="list-group-item">Current user role in the system: <span
                                class="badge badge-info">{{ $user->getRoleNames() }}</span></li> --}}
                        <li class="list-group-item">
                            <table id="myTable" class="tbl tbl-sm table-striped">
                                <thead>
                                    <th>Permission</th>
                                    <th>Allowed</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->getAllPermissions() as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td style="color: green;"><i class="fa fa-check-circle"></i></td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <ul>
                        @foreach ($user->getAllPermissions() as $permission)
                            <li>{{ $permission->name }}</li>
                        @endforeach
                    </ul> --}}
                        </li>
                        <li class="list-group-item">Assign new role : </li>
                    </ul>
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
