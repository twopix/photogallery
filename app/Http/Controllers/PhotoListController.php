<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoListController extends Controller
{
    public function index()
    {
        return Photo::with('user')->orderBy('created_at', 'desc')->paginate(6);
    }
}
