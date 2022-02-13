<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function index() 
    {
        return view('dashboards.adminDashboard');
    }
}
