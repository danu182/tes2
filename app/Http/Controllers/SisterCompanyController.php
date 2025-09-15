<?php

namespace App\Http\Controllers;

use App\Http\Requests\sisterCompanyStoreRequest;
use App\Models\SisterCompany;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\returnSelf;

class SisterCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = SisterCompany::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('sister-company.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('sister-company.destroy', $item->id) . '" method="POST">
                        <button class="btn btn-danger" >
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

        return view('dashboard.backend.sisterCompany.index');

        // $sisterCompany =SisterCompany::all();
        // return $sisterCompany;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.sisterCompany.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(sisterCompanyStoreRequest $request)
    {
        // return $request->all();

        // $data['slug'] = Str::slug($request->name);

        SisterCompany::create([
            'code' => $request->code, 
            'name' => $request->name,
            'picUser' => $request->picUser,
            'tlp' => $request->tlp,
            'email' => $request->email,
            'address' => $request->address,
            'description' => $request->description,
        ]);

         // Flash a success message to the session
        // $request->session()->flash('status', 'Data berhasil disimpan!');

        session()->flash('status', 'Data '.$request->name.' berhasil disimpan!');

        return redirect()->route('sister-company.index')->with('success', '$url');;

    }

    /**
     * Display the specified resource.
     */
    public function show(SisterCompany $sisterCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SisterCompany $sisterCompany)
    {
        return $sisterCompany;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SisterCompany $sisterCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SisterCompany $sisterCompany)
    {
        //
    }
}
