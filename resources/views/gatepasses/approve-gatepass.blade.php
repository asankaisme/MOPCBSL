@extends('layouts.app')

@section('title')
    GP-AddItems
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add items to gatepass
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="">Serial No</label>
                                <input type="text" class="form-control form-control-sm" name="companyName" required
                                    value="#{{ $gatepass->serialNo }}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Created By</label>
                                <input type="text" class="form-control form-control-sm" name="createdBy" required
                                    value="{{ $gatepass->userCreated->name }}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Authorized By</label>
                                <input type="text" class="form-control form-control-sm" name="authBy" required
                                    value="{{ $gatepass->userVerified->name ?? '-' }}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Authorized By</label>
                                <input type="text" class="form-control form-control-sm" name="authBy" required
                                    value="{{ $gatepass->userAuth->name ?? '-' }}" readonly>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Name of the person</label>
                                <input type="text" class="form-control form-control-sm" name="personName" required
                                    value="{{ $gatepass->personName }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Company Name / Department</label>
                                <input type="text" class="form-control form-control-sm" name="companyName" required
                                    value="{{ $gatepass->companyName }}" readonly>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="">NIC No / Bank ID</label>
                                <input type="text" class="form-control form-control-sm" name="personNIC" maxlength="12"
                                    required value="{{ $gatepass->personNIC }}" readonly>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="">Valid Until</label>
                                <input type="date" class="form-control form-control-sm" name="validityDate" required
                                    value="{{ $gatepass->validityDate }}" readonly>
                            </div>
                        </div>
                        {{-- <hr style="border-color: rgb(202, 195, 250)"> --}}
                        {{-- modal form here --}}
                        <!-- Button trigger modal -->

                        {{-- show associated gatepass items below --}}
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($gatepass->gatepassItem))
                            <div class="row justify-content-center" style="padding-top: 40px;">
                                <div class="col">
                                    <table class="table table-sm table-hover" style="font-size: 14px;">
                                        <thead>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Serial Number</th>
                                            <th>Fixed Asset Number</th>
                                            <th>Qty</th>
                                            <th>Remarks</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($gatepass->gatepassItem as $item)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>{{ $item->itemName }}</td>
                                                    <td>{{ $item->serialNo }}</td>
                                                    <td>{{ $item->faNo }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->remarks }}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        {{-- end table/ gatepass items --}}

                        <div class="row">
                            <div class="col">
                                <hr style="border-color: rgb(202, 195, 250)">
                                @if ($gatepass->verifiedBy != Auth::user()->id)
                                    @if (count($gatepass->gatepassItem))
                                        <a href="{{ route('gatepasses.approveGatepass', $gatepass->id) }}"
                                            class="btn btn-sm btn-success" style="float: right;">Approve</a>
                                    @endif
                                @endif
                                <a href="{{ route('gatepasses.index') }}" class="btn btn-sm btn-outline-dark"
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
