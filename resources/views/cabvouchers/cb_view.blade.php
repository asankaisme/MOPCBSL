@extends('layouts.app')

@section('title')
    CV-View
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        View Cab Vouchers
                        @if ($cabVoucher->status == 'NEW')
                            <span class="badge badge-primary" style="float: right;">{{ $cabVoucher->status }}</span>
                        @elseif ($cabVoucher->status == 'ISSUED')
                            <span class="badge badge-info" style="float: right;">{{ $cabVoucher->status }}</span>
                        @elseif ($cabVoucher->status == 'USED')
                            <span class="badge badge-success" style="float: right;">{{ $cabVoucher->status }}</span>
                        @elseif ($cabVoucher->status == 'RETURNED')
                            <span class="badge badge-warning" style="float: right;">{{ $cabVoucher->status }}</span>
                        @else
                            <span class="badge badge-default" style="float: right;">{{ $cabVoucher->status }}</span>
                        @endif
                    </div>
                    <div class="card-body">
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
                                <input type="text" class="form-control form-control-sm" name="cv_number" readonly
                                    value="{{ $cabVoucher->cv_number }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="">Reason</label>
                                <input type="text" class="form-control form-control-sm" name="remark"
                                    value="{{ $cabVoucher->remarks }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="">Distance/ km</label>
                                <input type="text" class="form-control form-control-sm" name="km_done"
                                    value="{{ $cabVoucher->km_done }}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Amount/ LKR</label>
                                <input type="text" class="form-control form-control-sm" name="amount"
                                    value="{{ number_format($cabVoucher->amount, 2, '.', ',') }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{-- <a href="#" class="btn btn-sm btn-success" style="float: right;">Issue</a> --}}
                                <a href="{{ route('cabvouchers.index') }}" class="btn btn-sm btn-outline-dark"
                                    style="float: right; margin-right: 5px;">Back</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                @include('includes.message')
            </div>
        </div>
    @endsection
