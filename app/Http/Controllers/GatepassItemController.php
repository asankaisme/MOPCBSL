<?php

namespace App\Http\Controllers;

use App\Models\Gatepass;
use App\Models\GatepassItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GatepassItemController extends Controller
{
    //store data in to gatepass item table
    public function addGatepassItems(Request $request, Gatepass $gatepass)
    {
        $validatedata = $request->validate([
            'itemName' => 'required',
        ]);
        try {
            $gatepassItem = new GatepassItem();
            $gatepassItem->gatepass_id = $gatepass->id;
            $gatepassItem->itemName = $validatedata['itemName'];
            $gatepassItem->serialNo = $request->input(['serialNo']);
            $gatepassItem->faNo = $request->input(['faNo']);
            $gatepassItem->qty = $request->input(['qty']);
            $gatepassItem->remarks = $request->input(['remarks']);
            $gatepassItem->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for deleting gatepass items
    public function deleteGatepassItem(GatepassItem $gatepassItem )
    {
        try {
            dd($gatepassItem->gatepass->id);
            $gatepassItem->delete();
            redirect()->route('gatepasses.addItemsToGatepass', $gatepassItem->gatepass->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
