<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\SisterCompany;
use App\Models\Supplier;
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
    

}
