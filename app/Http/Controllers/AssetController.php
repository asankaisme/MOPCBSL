<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AssetRequest;

class AssetController extends Controller
{
    //create entry form for asset
    public function create()
    {
        $categories = Category::where('isActive', 1)->get();
        return view('assets.create', compact('categories'));
    }

    //store assets
    public function store(AssetRequest $request)
    {
        try {
            $curFANo = Str::upper($request->faNo);
            $existFANo = Asset::where('faNo', $curFANo)->first();
            if ($existFANo == null) {
                $newAsset = new Asset();
                $newAsset->assetName = $request->assetName;
                $newAsset->faNo = $curFANo;
                $newAsset->serialNo = $request->serialNo;
                $newAsset->isActive = 1;
                $newAsset->save();
                return redirect()->route('manageItems')->with('msgSuccess', 'New asset has been recorded.');
            }else{
                return redirect()->route('manageItems')->with('msgDanger', 'New asset is already in the list.');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function show($assetId){
        $avlAsset = Asset::where('id', $assetId)->first();
        // dd($avlAsset);
        $categories = Category::where('isActive', 1)->get();
        return view('assets.edit',compact('avlAsset', 'categories'));
    }

    public function update(AssetRequest $request, $assetId){

    }
}
