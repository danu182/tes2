<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if (request()->ajax()) {
            $query = Supplier::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('supplier.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('supplier.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.backend.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierStoreRequest $request)
    {
         Supplier::create([
            
            'nameSupplier'=> $request->nameSupplier, 
            'contact_person'=> $request->contact_person, 
            'phone'=> $request->phone,
            'email'=> $request->email, 
            'address'=> $request->address,
            'description'=> $request->description,

        ]);

         // Flash a success message to the session
        // $request->session()->flash('status', 'Data berhasil disimpan!');

        session()->flash('status', 'Data '.$request->nameSupplier.' berhasil disimpan!');

        return redirect()->route('supplier.index')->with('success', '$url');

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.backend.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
         $supplier->update([
                'nameSupplier'=> $request->nameSupplier, 
                'contact_person'=> $request->contact_person, 
                'phone'=> $request->phone,
                'email'=> $request->email, 
                'address'=> $request->address,
                'description'=> $request->description,
            ]);


        session()->flash('status', 'Data '.$request->nameSupplier.' berhasil diupdate!');

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        session()->flash('status', 'Data  '.$supplier->nameApproval .' berhasil dihapus!');

        return redirect()->route('supplier.destroy');
    }
}
