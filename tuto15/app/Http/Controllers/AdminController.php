<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
public function index()
{
    $this->authorize('index-adminController');
    return 'Bienvenue sur la page admin.';
}

}
