<?php

namespace App\Http\Controllers;

use App\Models\BlockIp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard(string $LineChart = 'last week'){
        return Inertia::render('Dashboard', [
            'IPS' => BlockIp::orderByDesc('created_at')->paginate(14),
        ]);
    }
    
    public function getElementById(string $id){
        return Inertia::render('MoreInfo', [
            'Item' => BlockIp::where('_id', $id)->get(),
        ]);
    }
}
