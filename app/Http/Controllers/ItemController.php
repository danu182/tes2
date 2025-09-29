<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $query = Item::with('categoryItem', 'tipeItem','uom')->get();
        // return $query;

        if (request()->ajax()) {
            $query = Item::with(['categoryItem','tipeItem','uom']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('item.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('item.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.backend.item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {

        // return $request->all();
         Item::create([
                    'kodeItem' => $request->kodeItem,
                    'nameItem' => $request->nameItem,
                    'categoryItem_id' => $request->categoryItem_id,
                    'tipeItem_id' => $request->tipeItem_id,
                    'uom_id' => $request->uom_id,
                    'barcode' => $request->barcode,
                    'foto' => $request->foto,
                    'merek' => $request->merek,
                    'seri' => $request->seri,
                    'description' => $request->description,
                ]);

        session()->flash('status', 'Data '.$request->nameCategory.' berhasil disimpan!');
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('dashboard.backend.item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
