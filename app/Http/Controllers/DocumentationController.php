<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index(Request $request)
    {
        return view('documentation.index');
    }

    public function show(Request $request, $category, $fname)
    {
        return view("documentation.$category.$fname");
    }
}
