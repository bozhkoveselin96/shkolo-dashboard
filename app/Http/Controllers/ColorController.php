<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Resources\ColorCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $colors = new ColorCollection(Color::all());
        return view('app', compact('colors'));
    }
}
