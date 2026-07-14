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
        
        $understandingStats = \App\Models\Evaluation::selectRaw('understanding_improvement, count(*) as count')
            ->groupBy('understanding_improvement')
            ->pluck('count', 'understanding_improvement')->toArray();
            
        $intentionStats = \App\Models\Evaluation::selectRaw('intention_to_sort, count(*) as count')
            ->groupBy('intention_to_sort')
            ->pluck('count', 'intention_to_sort')->toArray();
            
        $recentFeedbacks = \App\Models\Evaluation::whereNotNull('website_opinion')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get(['name', 'website_opinion', 'created_at']);

        return view('admin.dashboard', compact(
            'totalVisitors',
            'totalEvaluations',
            'understandingStats',
            'intentionStats',
            'recentFeedbacks'
        ));
    }
}
