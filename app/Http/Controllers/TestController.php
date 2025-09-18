<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class TestController extends Controller
{
    public function tes()
    {
        $tes= Helpers::formatDate();
        return $tes;
    }

}
