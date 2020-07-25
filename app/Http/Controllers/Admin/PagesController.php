<?php

namespace App\Http\Controllers\Admin;

use App\Admins;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
