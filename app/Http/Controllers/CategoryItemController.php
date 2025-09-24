<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryItemStoreRequest;
use App\Http\Requests\CategoryItemUpdateRequest;
use App\Models\CategoryItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = CategoryItem::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('category-item.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('category-item.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.backend.categoryItem.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.categoryItem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryItemStoreRequest $request)
    {
             CategoryItem::create([
                    'nameCategory' => $request->nameCategory,
                    'description' => $request->description,
                ]);

        session()->flash('status', 'Data '.$request->nameCategory.' berhasil disimpan!');
        return redirect()->route('category-item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryItem $categoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryItem $categoryItem)
    {
        return view('dashboard.backend.categoryItem.edit', compact('categoryItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryItemUpdateRequest $request, CategoryItem $categoryItem)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryItem $categoryItem)
    {
        //
    }
}
