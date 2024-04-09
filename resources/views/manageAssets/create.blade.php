@extends('layouts.app')

@section('title')
    CreateAsset
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add a new Asset
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeAsset') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="assetName">Asset Name</label>
                                    <input type="text" class="form-control form-control-sm" name="assetName">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="faNo">FA Number</label>
                                    <input type="text" class="form-control form-control-sm" name="faNo">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <label for="serialNo">Serial Number</label>
                                    <input type="text" class="form-control form-control-sm" name="serialNo">
                                </div>
                                {{-- <div>
                                    <label for="isActive">Is Active</label>
                                    <input type="checkbox" name="isActive" id="" class="form-control" value=1>
                                </div> --}}
                            </div>
                            <div class="row" style="float: right;">
                                <div class="col">
                                    <a href="{{ route('manageItems') }}" class="btn btn-sm btn-outline-dark">Back</a>
                                    <input type="reset" value="Clear" class="btn btn-sm btn-secondary">
                                    <input type="submit" value="Add" class="btn btn-sm btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
