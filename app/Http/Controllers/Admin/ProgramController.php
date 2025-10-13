<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Display a listing of programs
     */
    public function index(): View
    {
        $programs = Program::ordered()->paginate(15);
        
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new program
     */
    public function create(): View
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created program
     */
    public function store(StoreProgramRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Handle main image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageUploadService->upload(
                $request->file('image'),
                'programs',
                800,
                600
            );
        }

        // Handle teacher image upload
        if ($request->hasFile('teacher_image')) {
            $data['teacher_image'] = $this->imageUploadService->upload(
                $request->file('teacher_image'),
                'teachers',
                200,
                200
            );
        }

        Program::create($data);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    /**
     * Show the form for editing the specified program
     */
    public function edit(Program $program): View
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified program
     */
    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        $data = $request->validated();

        // Handle main image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageUploadService->replace(
                $request->file('image'),
                $program->image,
                'programs',
                800,
                600
            );
        }

        // Handle teacher image upload
        if ($request->hasFile('teacher_image')) {
            $data['teacher_image'] = $this->imageUploadService->replace(
                $request->file('teacher_image'),
                $program->teacher_image,
                'teachers',
                200,
                200
            );
        }

        $program->update($data);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified program
     */
    public function destroy(Program $program): RedirectResponse
    {
        // Delete associated images
        $this->imageUploadService->delete($program->image);
        $this->imageUploadService->delete($program->teacher_image);
        
        $program->delete();

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Program $program): RedirectResponse
    {
        $program->update(['is_featured' => !$program->is_featured]);

        return redirect()
            ->back()
            ->with('success', 'Program featured status updated.');
    }
}
