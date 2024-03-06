<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $title = $req->name == ''? 'test' : $req->name;
        return view('index', compact('title'));
    }

    public function storee(Request $req)
    {
        $title = $req->name == ''? 'test' : $req->name;
        return view('index', compact('title'));
    }
}
