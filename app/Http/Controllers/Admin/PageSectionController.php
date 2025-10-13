<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageSectionController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index(): View
    {
        $sections = PageSection::orderBy('page')->orderBy('section_name')->orderBy('order')->get();
        $grouped = $sections->groupBy('page');
        
        return view('admin.pages.index', compact('grouped'));
    }

    public function edit(string $page): View
    {
        $sections = PageSection::where('page', $page)
            ->orderBy('section_name')
            ->orderBy('order')
            ->get()
            ->groupBy('section_name');
        
        return view('admin.pages.edit', compact('page', 'sections'));
    }

    public function update(Request $request, string $page): RedirectResponse
    {
        $sections = $request->input('sections', []);

        foreach ($sections as $sectionData) {
            $pageSection = PageSection::where('page', $page)
                ->where('section_name', $sectionData['section_name'])
                ->where('key', $sectionData['key'])
                ->first();

            $value = $sectionData['value'] ?? null;

            // Handle image uploads
            if ($pageSection && $pageSection->type === 'image' && $request->hasFile("sections.{$pageSection->id}.value")) {
                $value = $this->imageUploadService->replace(
                    $request->file("sections.{$pageSection->id}.value"),
                    $pageSection->value,
                    'pages'
                );
            }

            if ($pageSection) {
                $pageSection->update(['value' => $value]);
            } else {
                PageSection::create([
                    'page' => $page,
                    'section_name' => $sectionData['section_name'],
                    'key' => $sectionData['key'],
                    'value' => $value,
                    'type' => $sectionData['type'] ?? 'text',
                    'order' => $sectionData['order'] ?? 0,
                ]);
            }
        }

        return redirect()->route('admin.pages.edit', $page)->with('success', 'Page content updated successfully.');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'page' => 'required|string|max:255',
            'section_name' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,video,color,wysiwyg',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->input('type') === 'image' && $request->hasFile('value')) {
            $validated['value'] = $this->imageUploadService->upload(
                $request->file('value'),
                'pages'
            );
        }

        PageSection::create($validated);

        return redirect()->back()->with('success', 'Section field created successfully.');
    }

    public function destroy(PageSection $pageSection): RedirectResponse
    {
        if ($pageSection->type === 'image') {
            $this->imageUploadService->delete($pageSection->value);
        }
        
        $pageSection->delete();

        return redirect()->back()->with('success', 'Section field deleted successfully.');
    }
}
