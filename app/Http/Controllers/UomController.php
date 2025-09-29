<?php

namespace App\Http\Controllers;

use App\Http\Requests\UomStoreRequest;
use App\Http\Requests\UomUpdateRequest;
use App\Models\Uom;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Uom::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('uom.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('uom.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" id="delete-button">
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                    </div>';
                })
                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('dashboard.backend.uom.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.uom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UomStoreRequest $request)
    {
        // return $request;

        Uom::create([
            'kodeUom' => $request->kodeUom,
            'nameUom' => $request->nameUom,
            'description' => $request->description,
        ]);

        session()->flash('status', 'Data '.$request->nameUom.' berhasil disimpan!');

        return redirect()->route('uom.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Uom $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uom $uom)
    {
        return view('dashboard.backend.uom.edit', compact('uom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UomUpdateRequest $request, Uom $uom)
    {
        $uom->update([
                'nameUom' => $request->nameUom,
                'description' => $request->description,
            ]);


        session()->flash('status', 'Data '.$request->nameUom.' berhasil diupdate!');

        return redirect()->route('uom.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uom $uom)
    {
        $uom->delete();

        session()->flash('status', 'Data  '.$uom->nameUom .' berhasil diupdate!');

        return redirect()->route('uom.index');
    }
}
