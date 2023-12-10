<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperationalTime;
use App\Http\Requests\StoreOperationalTimeRequest;
use App\Http\Requests\UpdateOperationalTimeRequest;

class OperationalTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operational = OperationalTime::all();
        return view('admin.operational.index', compact('operational'));
    }

    public function edit(String $id)
    {
        $operational = OperationalTime::all();
        $edit = OperationalTime::findOrFail($id);
        return view('admin.operational.index', compact('edit', 'operational'));
    }

    public function update(UpdateOperationalTimeRequest $request, OperationalTime $operationalTime)
    {
        OperationalTime::findOrFail($request->something)->update([
            'open' => $request->open,
            'close' => $request->close,
        ]);

        return to_route('operational.index');
    }

    public function operationalOpen(String $id)
    {
        OperationalTime::findOrFail($id)->update([
            'status' => 1,
            'message' => '',
        ]);

        return to_route('operational.index');
    }

    public function operationalClose(String $id)
    {
        $operational = OperationalTime::all();
        $pesan = OperationalTime::findOrFail($id);
        return view('admin.operational.index', compact('pesan','operational'));
    }

    public function operationalDetail(String $id)
    {
        $operational = OperationalTime::all();
        $detail = OperationalTime::findOrFail($id);
        return view('admin.operational.index', compact('operational', 'detail'));
    }

    public function closeProccess(Request $request)
    {
        OperationalTime::findOrFail($request->something)->update([
            'message' => $request->pesan,
            'status' => 0,
        ]);

        return to_route('operational.index');
    }
}
