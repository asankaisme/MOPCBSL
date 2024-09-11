@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card border-primary">
                    <div class="card-header bg-primary">
                        <span style="color: white;">Gatepasses</span><span style="float: right; color: white;"><i class="fa fa-ticket"></i></span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">New <span class="badge badge-primary"
                                    style="float: right;">{{ count($gatepassesNew) ?? '-' }}</span></li>
                            <li class="list-group-item">Verified <span class="badge badge-warning"
                                    style="float: right;">{{ count($gatepassesVerified) ?? '-' }}</span></li>
                            <li class="list-group-item">Approved <span class="badge badge-success"
                                    style="float: right;">{{ count($gatepassesApproved) ?? '-' }}</span></li>
                            <li class="list-group-item">Total <span class="badge badge-dark"
                                style="float: right;">{{ count($gp_total) ?? '-' }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success">
                    <div class="card-header bg-success">
                        <span style="color: white;">Cab Vouchers</span><span style="float: right; color:white;"><i class="fa fa-car"></i></span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">New <span class="badge badge-primary"
                                    style="float: right;">{{ count($cv_new) ?? '-' }}</span></li>
                            <li class="list-group-item">Returned <span class="badge badge-warning"
                                    style="float: right;">{{ count($cv_returned) ?? '-' }}</span></li>
                            <li class="list-group-item">Used <span class="badge badge-success"
                                    style="float: right;">{{ count($cv_used) ?? '-' }}</span></li>
                            <li class="list-group-item">Total <span class="badge badge-dark"
                                    style="float: right;">{{ count($cv_total) ?? '-' }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
