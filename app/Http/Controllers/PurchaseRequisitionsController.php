<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\PurchaseRequisitions;
use App\Models\SisterCompany;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class PurchaseRequisitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = PurchaseRequisitions::with(['sisterCompany', 'statusAproval']);
            
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-warning" 
                            href="' . route('pr.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="d-flex gap-2 inline-block" action="' . route('pr.destroy', $item->id) . '" method="POST">
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

        return view('dashboard.frontend.pr.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $sisterCompany = SisterCompany::all();
        return view('dashboard.frontend.pr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $data= [
            'pr_no' =>  $tes= Helpers::NoOtomatis(),
            'title' =>$request->title, 
            'sister_company_id'=>$request->sister_company_id,
            'supplier_id'=>$request->supplier_id,
            'description'=>$request->description, 
            'requested_by_user_id'=>1,
            'status'=>1,  
            'total_amount'=>'20000',
        ];
        
        PurchaseRequisitions::create($data);

        session()->flash('status', 'Data '.$data['pr_no'].' berhasil disimpan!');

        return redirect()->route('pr.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseRequisitions $purchaseRequisitions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseRequisitions $purchaseRequisitions, $id)
    {
        $purchaseRequisition =PurchaseRequisitions::with(['sisterCompany','supplier'])
                                ->where('id', $id)->first();
        // return $purchaseRequisition;    
        return view('dashboard.frontend.pr.edit', compact('purchaseRequisition'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseRequisitions $purchaseRequisitions, $id)
    {
        $data= [
            // 'pr_no' =>  $tes= Helpers::NoOtomatis(),
            'title' =>$request->title, 
            'sister_company_id'=>$request->sister_company_id,
            'supplier_id'=>$request->supplier_id,
            'description'=>$request->description, 
            'requested_by_user_id'=>1,
            'status'=>1,  
            'total_amount'=>'20000',
        ];


        $purchaseRequisition= PurchaseRequisitions::findOrFail($id);

        $purchaseRequisition->update($data);
        
        return redirect()->route('pr.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseRequisitions $purchaseRequisitions, $id)
    {

        // $purchaseRequisitions = PurchaseRequisitions::where('id', $id)->get();
        // $noPr = $purchaseRequisitions->pr_no;
        PurchaseRequisitions::destroy($id);

        session()->flash('status', 'Data  berhasil dihapus!');

        return redirect()->route('pr.index');
    }
}
