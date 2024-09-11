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
                        Manage User - {{ $user->name }} <span
                            class="badge badge-success">{{ $user->roles->first()->name }}</span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item">Current user role in the system: <span
                                    class="badge badge-info">{{ $user->getRoleNames() }}</span></li> --}}
                            <?php $counter = 1; ?>
                            <li class="list-group-item">
                                <table id="myTable" class="tbl tbl-sm table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Permission</th>
                                        <th>Allowed</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->getAllPermissions() as $permission)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td style="color: green;"><i class="fa fa-check-circle"></i></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('changeUserRole', $user->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="role">Assigned a new role</label>
                                    <select name="role" id="role" class="form-control form-control-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" style="padding-top: 31px;">
                                    <button type="submit" class="btn btn-sm btn-primary">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                @include('includes.message')
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
