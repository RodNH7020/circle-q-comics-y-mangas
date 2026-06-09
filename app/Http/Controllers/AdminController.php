<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('backend.admin.dashboard');
    }

    public function usuarios(){
        $usuarios = User::all();
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }
}
