<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipeItemStoreRequest;
use App\Models\TipeItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TipeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if (request()->ajax()) {
            $query = TipeItem::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('tipe-item.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('tipe-item.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.backend.tipeItem.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.tipeItem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipeItemStoreRequest $request)
    {
         TipeItem::create([
            'kodeTipe'=> $request->kodeTipe,
            'nameTipe'=> $request->nameTipe,
            'description'=> $request->description,
        ]);

         // Flash a success message to the session
        // $request->session()->flash('status', 'Data berhasil disimpan!');

        session()->flash('status', 'Data '.$request->nameTipe.' berhasil disimpan!');

        return redirect()->route('tipe-item.index')->with('success', '$url');

    }

    /**
     * Display the specified resource.
     */
    public function show(TipeItem $tipeItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeItem $tipeItem)
    {
        return view('dashboard.backend.tipeItem.edit', compact('tipeItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipeItemStoreRequest $request, TipeItem $tipeItem)
    {
        $tipeItem->update([
                'nameTipe'=> $request->nameTipe, 
                'description'=> $request->description, 
                
            ]);


        session()->flash('status', 'Data '.$request->nameTipe.' berhasil diupdate!');

        return redirect()->route('tipe-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeItem $tipeItem)
    {
        $tipeItem->delete();

        session()->flash('status', 'Data  '.$tipeItem->nameTipe .' berhasil dihapus!');

        return redirect()->route('tipe-item.index');
    }
}
