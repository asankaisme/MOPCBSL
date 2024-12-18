@extends('layouts.app')

@section('title')
    CV-Delete
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Issue Cab Vouchers
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cabvouchers.destroy', $cabVoucher->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">Requested By</label>
                                    <input type="text" class="form-control form-control-sm" name="requesterName" required
                                        value="{{ $cabVoucher->UserRequested->name }}" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Bank ID</label>
                                    <input type="text" class="form-control form-control-sm" name="createdBy" required
                                        value="{{ $cabVoucher->UserRequested->bank_id }}" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">Date Requested</label>
                                    <input type="text" class="form-control form-control-sm" name="requestDate" required
                                        value="{{ $cabVoucher->requestDate }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="">Taxi Service</label>
                                    <input type="text" class="form-control form-control-sm" name="cv_from" required
                                        value="{{ $cabVoucher->cv_provider }}" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Starts From</label>
                                    <input type="text" class="form-control form-control-sm" name="cv_from" required
                                        value="{{ $cabVoucher->cv_from }}" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="">Ends At</label>
                                    <input type="text" class="form-control form-control-sm" name="cv_to" required
                                        value="{{ $cabVoucher->cv_to }}" readonly>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Voucher Number</label>
                                    <input type="text" class="form-control form-control-sm" name="cv_number" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Reason</label>
                                    <input type="text" class="form-control form-control-sm" name="remark" value="{{ $cabVoucher->remarks }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <hr style="border-color: rgb(202, 195, 250)"> --}}
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger" style="float: right;">
                                    {{-- <a href="#" class="btn btn-sm btn-success" style="float: right;">Issue</a> --}}
                                    <a href="{{ route('cabvouchers.index') }}" class="btn btn-sm btn-outline-dark"
                                        style="float: right; margin-right: 5px;">Back</a>
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
