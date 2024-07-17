@extends('layouts.app')

@section('title')
    LendingAssets
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Assets on lending
                        <span style="float: right;">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Lend Items
                            </button>
                        </span>
                    </div>
                    @php
                        $counter;
                    @endphp
                    <div class="card-body">
                        <table id="myTable" class="table tbl-sm table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Asset Name</th>
                                <th>Department</th>
                                <th>Lending Date</th>
                                <th>Returned date</th>
                                <th>Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($lendings as $lending)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $lending->asset->assetName }}</td>
                                        <td>{{ $lending->department->depName }}</td>
                                        <td>{{ $lending->lendingDate }}</td>
                                        <td>{{ $lending->returnedDate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- modal --}}
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
                                        <form action="#" method="POST">
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
                    </div>
                </div>
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
