<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criterion;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function create()
    {
        $criteria = Criterion::with('questions')->get();
        return view('evaluation.create', compact('criteria'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('scores') as $questionId => $score) {
            Evaluation::create([
                'question_id' => $questionId,
                'score' => $score,
                'comment' => $request->input('comments')[$questionId] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Evaluation saved!');
    }
}
