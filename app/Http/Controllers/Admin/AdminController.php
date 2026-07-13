<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalVisitors = \App\Models\Visitor::count();
        $totalEvaluations = \App\Models\Evaluation::count();
        
        $understandingStats = \App\Models\Evaluation::selectRaw('understanding_level, count(*) as count')
            ->groupBy('understanding_level')
            ->pluck('count', 'understanding_level')->toArray();
            
        $intentionStats = \App\Models\Evaluation::selectRaw('intention_level, count(*) as count')
            ->groupBy('intention_level')
            ->pluck('count', 'intention_level')->toArray();
            
        $recentFeedbacks = \App\Models\Evaluation::whereNotNull('feedback')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get(['name', 'feedback', 'created_at']);

        return view('admin.dashboard', compact(
            'totalVisitors',
            'totalEvaluations',
            'understandingStats',
            'intentionStats',
            'recentFeedbacks'
        ));
    }
}
