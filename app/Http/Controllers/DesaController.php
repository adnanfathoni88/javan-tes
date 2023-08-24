<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use App\Http\Resources\DesaResource;
use App\Http\Resources\DesaDetailResource;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::all();
        return DesaResource::collection($desa);
    }

    public function show($id)
    {
        $desa = Desa::with('district')->findOrFail($id);
        return new DesaDetailResource($desa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => '',
        ]);

        $desa = Desa::create($request->all());
        return new DesaResource($desa);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => '',
        ]);

        $desa = Desa::findOrFail($id);
        $desa->update($request->all());
        return new DesaResource($desa);
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();
        return new DesaResource($desa);
    }
}
