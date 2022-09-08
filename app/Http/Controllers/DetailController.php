<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipi;

class DetailController extends Controller
{
    public function detail($id)
    {
        $recipi = Recipi::find($id);
        return view('detail', ['recipi' => $recipi]);
    }
}
