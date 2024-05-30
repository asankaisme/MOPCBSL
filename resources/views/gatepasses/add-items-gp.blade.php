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
                        <span style="float: right; ">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Add Items
                            </button>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label for="">Serial No</label>
                                <input type="text" class="form-control form-control-sm" name="companyName" required
                                    value="#{{ $gatepass->serialNo }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Created By</label>
                                <input type="text" class="form-control form-control-sm" name="createdBy" required
                                    value="{{ $gatepass->userCreated->name }} on {{ $gatepass->createdDate }}" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Authorized By</label>
                                <input type="text" class="form-control form-control-sm" name="authBy" required
                                        value="{{ $gatepass->userAuth->name ?? '-' }}" readonly>
                            </div>
                            <div class="col-md-2 form-group">
                                <label for="">Valid Until</label>
                                <input type="date" class="form-control form-control-sm" name="validityDate" required
                                    value="{{ $gatepass->validityDate }}" readonly>
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
                            <div class="col-md-4 form-group">
                                <label for="">NIC No / Bank ID</label>
                                <input type="text" class="form-control form-control-sm" name="personNIC" maxlength="12"
                                    required value="{{ $gatepass->personNIC }}" readonly>
                            </div>
                        </div>
                        {{-- <hr style="border-color: rgb(202, 195, 250)"> --}}
                        {{-- modal form here --}}
                        <!-- Button trigger modal -->

                        {{-- show associated gatepass items below --}}
                        @if (count($gatepass->gatepassItem))
                            <div class="row justify-content-center" style="padding-top: 40px;">
                                <div class="col">
                                    <table class="table table-sm table-hover" style="font-size: 14px;">
                                        <thead>
                                            <th></th>
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
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->itemName }}</td>
                                                    <td>{{ $item->serialNo }}</td>
                                                    <td>{{ $item->faNo }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->remarks }}</td>
                                                    <td>
                                                        {{-- <i class="fa fa-pencil-square-o" aria-hidden="true" style="color: rgba(5, 114, 42, 0.726);"></i> --}}
                                                        <a href="{{ route('deleteGatepassItem', $item->id) }}">
                                                        <i class="fa fa-times" aria-hidden="true"
                                                            style="color: rgba(141, 8, 8, 0.726);"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        {{-- end table/ gatepass items --}}

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Details of the item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('addGatepassItems', $gatepass->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="">Item Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="itemName" id="itemName">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="serialNo">Serial Number</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="serialNo" id="serialNo" placeholder="If available">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="faNo">Fixed Asset (FA) Number</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="faNo" id="faNo" placeholder="If available">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="qty">Quantity</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="qty" id="qty" placeholder="If available">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="remarks">Remarks</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="remarks" id="remarks" placeholder="Optional">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end of modal --}}
                        <div class="row">
                            <div class="col">
                                <hr style="border-color: rgb(202, 195, 250)">
                                @if (count($gatepass->gatepassItem))
                                    <a href="{{ route('gatepasses.index') }}" class="btn btn-sm btn-success"
                                        style="float: right;">OK</a>
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
