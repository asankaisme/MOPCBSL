@extends('layouts.app')

@section('title')
    gp-create
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create - Gatepass
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gatepasses.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-10 form-group">
                                    <label for="">Company Name / Department</label>
                                    <input type="text" class="form-control form-control-sm" name="companyName" required value="{{ old('companyName') }}">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Valid Until</label>
                                    <input type="date" class="form-control form-control-sm" name="validityDate" required value="{{ old('validityDate') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="">Name of the person</label>
                                    <input type="text" class="form-control form-control-sm" name="personName" required value="{{ old('personName') }}">
                                </div>
                                <div class="col form-group">
                                    <label for="">NIC No / Bank ID</label>
                                    <input type="text" class="form-control form-control-sm" name="personNIC"
                                        maxlength="12" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="">Reason</label>
                                    <select name="reason" id="reason" class="form-control form-control-sm" required>
                                        <option value="null">-Please Select-</option>
                                        @foreach ($reasons as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->reason }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="float: right;">
                                <div class="col form-group">
                                    <input type="submit" value="Create" class="btn btn-primary btn-sm">
                                    <input type="reset" value="Clear" class="btn btn-sm btn-outline-danger">
                                    <a href="{{ route('gatepasses.index') }}" class="btn btn-sm btn-dark">Back</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="col-md-12" style="margin-top: 10px;">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> {{ session('msgDanger') }}
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-md-12" style="margin-top: 10px;">
                @include('includes.message')
            </div>
        </div>
    </div>
@endsection
