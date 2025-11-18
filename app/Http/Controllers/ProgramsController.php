<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\PageSection;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('order')
            ->orderBy('title')
            ->paginate(9);

        $featuredPrograms = Program::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.programs', compact('programs', 'featuredPrograms'));
    }

    public function show($id)
    {
        $program = Program::where('is_active', true)->findOrFail($id);

        $relatedPrograms = Program::where('is_active', true)
            ->where('id', '!=', $program->id)
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('pages.program-detail', compact('program', 'relatedPrograms'));
    }
}
