<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EvaluationController extends Controller
{
    /**
     * Display the settings form for evaluations.
     */
    public function form()
    {
        $isOpen = Cache::get('evaluation_form_enabled', true);
        return view('admin.evaluations.form', compact('isOpen'));
    }

    /**
     * Update the settings form for evaluations.
     */
    public function updateForm(Request $request)
    {
        $isOpen = $request->has('is_open');
        Cache::put('evaluation_form_enabled', $isOpen);

        return back()->with('success', 'Pengaturan form evaluasi berhasil disimpan.');
    }

    /**
     * Display a listing of the evaluation results.
     */
    public function index()
    {
        $evaluations = Evaluation::latest()->get();
        return view('admin.evaluations.index', compact('evaluations'));
    }
}
