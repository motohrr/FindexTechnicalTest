<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', "desc")->get();
        $chartInformation = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('date',[Carbon::now()->subDays(2), Carbon::now()->addDays(4)])
        ->groupBy('date')
        ->get();

        return Inertia::render("User",[
            'users' => $users,
            'created_today' => $users->where('created_at', Carbon::now()->format('Y-m-d H:i:s'))->count(),
            'created_this_week' => $users->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count(),
            'chart_information' => $chartInformation
        ]);
    }
}
