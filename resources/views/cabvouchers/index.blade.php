@extends('layouts.app')

@section('title')
    Cab-vouchers
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage - Cab Vouchers
                        @can('add_gatepass')
                            <span style="float: right;">
                                <a href="#" data-toggle="modal" data-target="#cv_modal"><img
                                        src="{{ asset('images/add-square-svgrepo-com.svg') }}" alt="add_icon" width="30px"
                                        height="30px" title="Make a request"></a>
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
                                <th>Voucher No</th>
                                <th>Taxi Service Name</th>
                                <th>Requested By</th>
                                <th>Bank ID</th>
                                <th>Issued Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($cabVouchers as $cabVoucher)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $cabVoucher->cv_number ?? '-' }}</td>
                                        <td>{{ $cabVoucher->cv_provider }}</td>
                                        <td>{{ $cabVoucher->UserRequested->name }}</td>
                                        <td>{{ $cabVoucher->bank_id }}</td>
                                        <td>{{ $cabVoucher->requestDate }}</td>
                                        <td>{{ $cabVoucher->cv_from }}</td>
                                        <td>{{ $cabVoucher->cv_to }}</td>
                                        <td>
                                            @if ($cabVoucher->status == 'NEW')
                                                <span class="badge badge-primary">{{ $cabVoucher->status }}</span>
                                            @elseif ($cabVoucher->status == 'ISSUED')
                                                <span class="badge badge-info">{{ $cabVoucher->status }}</span>
                                            @elseif ($cabVoucher->status == 'USED')
                                                <span class="badge badge-success">{{ $cabVoucher->status }}</span>
                                            @elseif ($cabVoucher->status == 'RETURNED')
                                                <span class="badge badge-warning">{{ $cabVoucher->status }}</span>
                                            @else
                                                <span class="badge badge-default">{{ $cabVoucher->status }}</span>
                                        </td>
                                @endif
                                <td>
                                    <a href="{{ route('cabVoucher.show', $cabVoucher->id) }}" title="View"><i
                                            class="fa fa-newspaper-o" aria-hidden="true" style="color:black;"></i></a>
                                    @if ($cabVoucher->status == 'NEW')
                                        @can('issue_cabVouchers')
                                            <a href="{{ route('cabVoucher.issue', $cabVoucher->id) }}" title="Issue"><i
                                                    class="fa fa-check-circle" aria-hidden="true"
                                                    style="color:rgb(206, 157, 24);"></i></a>
                                        @endcan
                                        <a href="{{ route('cabVoucher.issue', $cabVoucher->id) }}" title="Delete"><i
                                                class="fa fa-trash" aria-hidden="true"
                                                style="color:rgb(206, 24, 24);"></i></a>
                                    @endif
                                    @if ($cabVoucher->status == 'ISSUED')
                                        @if ($cabVoucher->ststus != 'RETURNED')
                                            <a href="{{ route('cabVoucher.return', $cabVoucher->id) }}" title="Return"><i
                                                    class="fa fa-arrow-left" aria-hidden="true"
                                                    style="color:rgb(206, 82, 24);"></i></a>
                                        @endif

                                        <a href="{{ route('cabVoucher.sendReceipt', $cabVoucher->id) }}"
                                            title="Send Receipt"><i class="fa fa-paper-plane" aria-hidden="true"
                                                style="color:rgb(0, 19, 128);"></i></a>
                                    @endif
                                    @if ($cabVoucher->status == 'USED')
                                        <a href="{{ route('printCV', $cabVoucher->id) }}" title="Print" target="_blank"><i class="fa fa-print"></i></a>
                                    @endif
                                </td>
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

    <!-- Modal -->
    <div class="modal fade" id="cv_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request a Cab Voucher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cabvouchers.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col form-group">
                                <label for="requestDate">Date</label>
                                <input type="date" name="requestDate" id="requestDate"
                                    class="form-control form-control-sm"
                                    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="cv_from">Starts from</label>
                                <input type="text" name="cv_from" id="cv_from" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="cv_to">Ends at</label>
                                <input type="text" name="cv_to" id="cv_to" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="cv_from">Which taxi service do you want?</label>
                                {{-- <input type="text" name="cv_from" id="cv_from" class="form-control form-control-sm"> --}}
                                <select name="cv_provider" id="" class="form-control form-control-sm">
                                    <option value="null">-Select-</option>
                                    <option value="Casons">Casons Taxi Service</option>
                                    <option value="Kango">Kango Taxi Service</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="remarks">Reason for the request</label>
                                <textarea cols="6" name="remarks" id="remarks" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Close"></input>
                    <input type="submit" class="btn btn-primary" value="OK"></input>
                </div>
                </form>
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
