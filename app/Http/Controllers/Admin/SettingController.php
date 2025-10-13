<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Display settings page
     */
    public function index(): View
    {
        $settings = Setting::all()->groupBy('group');
        
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->input('settings', []) as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                // Handle image uploads
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    $file = $request->file("settings.{$key}");
                    $path = $this->imageUploadService->replace(
                        $file,
                        $setting->value,
                        'settings'
                    );
                    $value = $path;
                }
                
                $setting->update(['value' => $value]);
            } else {
                // Create new setting
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                    'type' => 'text',
                    'group' => 'general',
                ]);
            }
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }

    /**
     * Get a specific setting
     */
    public function show(string $key)
    {
        $setting = Setting::where('key', $key)->firstOrFail();
        
        return response()->json($setting);
    }

    /**
     * Store a new setting
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,color,email,phone',
            'group' => 'required|in:general,contact,social,appearance',
            'description' => 'nullable|string',
        ]);

        $value = $request->input('value');

        // Handle image upload
        if ($request->input('type') === 'image' && $request->hasFile('value')) {
            $value = $this->imageUploadService->upload(
                $request->file('value'),
                'settings'
            );
        }

        Setting::create([
            'key' => $request->input('key'),
            'value' => $value,
            'type' => $request->input('type'),
            'group' => $request->input('group'),
            'description' => $request->input('description'),
        ]);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Delete a setting
     */
    public function destroy(string $key): RedirectResponse
    {
        $setting = Setting::where('key', $key)->firstOrFail();
        
        // Delete image if it's an image type
        if ($setting->type === 'image') {
            $this->imageUploadService->delete($setting->value);
        }
        
        $setting->delete();

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }
}
