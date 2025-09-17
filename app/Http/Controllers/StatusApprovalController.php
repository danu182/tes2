<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusApprovalStoreRequest;
use App\Models\StatusApproval;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (request()->ajax()) {
            $query = StatusApproval::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('status-approval.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('status-approval.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.backend.statusApproval.index');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.backend.statusApproval.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusApprovalStoreRequest $request)
    {

        StatusApproval::create([
            'nameApproval' => $request->nameApproval,
            'description' => $request->description,
        ]);

         // Flash a success message to the session
        // $request->session()->flash('status', 'Data berhasil disimpan!');

        session()->flash('status', 'Data '.$request->nameApproval.' berhasil disimpan!');

        return redirect()->route('status-approval.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusApproval $statusApproval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusApproval $statusApproval)
    {
         return view('dashboard.backend.statusApproval.edit', compact('statusApproval'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusApproval $statusApproval)
    {
        $statusApproval->update([
                'nameApproval' => $request->nameApproval,
                'description' => $request->description,
            ]);


        session()->flash('status', 'Data '.$request->nameApproval.' berhasil diupdate!');

        return redirect()->route('status-approval.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusApproval $statusApproval)
    {
        $statusApproval->delete();

        session()->flash('status', 'Data  '.$statusApproval->nameApproval .' berhasil diupdate!');

        return redirect()->route('status-approval.index');
    }
}
