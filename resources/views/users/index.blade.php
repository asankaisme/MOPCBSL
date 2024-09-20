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
                        @can('add_users')
                            <span style="float: right;">
                                <a href="#" data-toggle="modal" data-target="#exampleModal"><img
                                        src="{{ asset('images/add-square-svgrepo-com.svg') }}" alt="add_icon" width="30px"
                                        height="30px" title="Add Users"></a>
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
                                        <td><a href="{{ route('editUser', $user->id) }}"><i class="fa fa-edit"
                                                    title="Edit User"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal for user form --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addNewUser') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col form-group">
                                <label for="name">Username</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="name">email</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Reset">
                    <input type="submit" class="btn btn-primary" value="Add User">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
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
