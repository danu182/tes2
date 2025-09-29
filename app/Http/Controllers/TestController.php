<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\CategoryItem;
use App\Models\SisterCompany;
use App\Models\Supplier;
use App\Models\TipeItem;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


use function PHPUnit\Framework\returnSelf;

class TestController extends Controller
{
    public function tes()
    {
        $tes= Helpers::NoOtomatis();
        return $tes;
    }



    public function autocomplete(Request $request)
    {
        $data = [];

        // Check if a search query 'q' exists
        if ($request->has('q')) {
            $search = $request->q;
            
            // Query the database for sister companies whose name matches the search term
            // The 'select' method ensures we only return the id and name
            $data = SisterCompany::select("id", "name")
                    ->where('name', 'LIKE', "%{$search}%")
                    ->get();
        }

        // Return the data as a JSON response
        return response()->json($data);
    }
    


    public function autocompleteSupplier(Request $request)
    {
        $data = [];

        // Check if a search query 'q' exists
        if ($request->has('q')) {
            $supplier = $request->q;
            
            // Query the database for sister companies whose name matches the search term
            // The 'select' method ensures we only return the id and name
            $data = Supplier::select("id", "nameSupplier")
                    ->where('nameSupplier', 'LIKE', "%{$supplier}%")
                    ->get();
        }

        // Return the data as a JSON response
        return response()->json($data);
    }


    public function autocompleteCategory(Request $request)
    {
        $data = [];

        // Check if a search query 'q' exists
        if ($request->has('q')) {
            $category = $request->q;
            
            // Query the database for sister companies whose name matches the search term
            // The 'select' method ensures we only return the id and name
            $data = CategoryItem::select("id", "nameCategory", 'description')
                    ->where('nameCategory', 'LIKE', "%{$category}%")
                    ->get();
        }

        // Return the data as a JSON response
        return response()->json($data);
    }

    public function autocompleteTipeItem(Request $request)
    {
        $data = [];

        // Check if a search query 'q' exists
        if ($request->has('q')) {
            $tipeItem = $request->q;
            
            // Query the database for sister companies whose name matches the search term
            // The 'select' method ensures we only return the id and name
            $data = TipeItem::select("id", "nameTipe", 'kodeTipe')
                    ->where('nameTipe', 'LIKE', "%{$tipeItem}%")
                    ->get();
        }

        // Return the data as a JSON response
        return response()->json($data);
    }
    
    public function autocompleteUom(Request $request)
    {
        $data = [];

        // Check if a search query 'q' exists
        if ($request->has('q')) {
            $uom = $request->q;
            
            // Query the database for sister companies whose name matches the search term
            // The 'select' method ensures we only return the id and name
            $data = Uom::select("id", "nameUom", 'kodeUom')
                    ->where('nameUom', 'LIKE', "%{$uom}%")
                    ->get();
        }

        // Return the data as a JSON response
        return response()->json($data);
    }
    

}
