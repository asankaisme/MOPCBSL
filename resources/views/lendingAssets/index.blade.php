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
                        $counter = 1;
                    @endphp
                    <div class="card-body">
                        <table id="myTable" class="table tbl-sm table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Asset Name</th>
                                <th>Department</th>
                                <th>Lending Date</th>
                                <th>Returned date</th>
                                <th>Taken by</th>
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
                                        <td>{{ $lending->taken_by }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{-- modal for asset lending form --}}
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
                                        <form action="{{ route('lendings.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="">Item Name</label>
                                                    <select name="asset_id" id="asset_id"
                                                        class="form-control form-control-sm">
                                                        <option value="null">-Select an item-</option>
                                                        @foreach ($available_assets as $asset)
                                                            <option value="{{ $asset->id }}">{{ $asset->assetName }} -
                                                                {{ $asset->faNo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="department_id">Department</label>
                                                    <select name="department_id" id="department_id"
                                                        class="form-control form-control-sm">
                                                        <option value="null">-Select an item-</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">{{ $department->depName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="lendingDate">Issued On</label>
                                                    <input type="date" name="lendingDate" id="lendingDate"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="taken_by">Issued To</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="taken_by" id="taken_by" placeholder="Name of the person">
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
                                        <button type="reset" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Issue</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end of modal --}}
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                @include('includes.message')
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
