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

    /**
     * Export evaluations to CSV.
     */
    public function export()
    {
        $evaluations = Evaluation::all();
        $filename = "evaluasi_sampah_" . date('Ymd_His') . ".csv";

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = [
            'ID', 'Nama', 'Usia', 'Asal Dusun/Kelas', 'Kejelasan Materi', 
            'Peningkatan Pemahaman', 'Niat Memilah Sampah', 
            'Pendapat Website', 'Saran', 'Tanggal'
        ];

        $callback = function() use($evaluations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($evaluations as $eval) {
                fputcsv($file, [
                    $eval->id,
                    $eval->name,
                    $eval->age,
                    $eval->origin,
                    $eval->material_clarity,
                    $eval->understanding_improvement,
                    $eval->intention_to_sort,
                    $eval->website_opinion,
                    $eval->suggestion,
                    $eval->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
