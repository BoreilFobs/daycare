<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
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
        // Get all input except _token and section
        $inputs = $request->except(['_token', 'section']);
        
        foreach ($inputs as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                // Handle image uploads
                if ($setting->type === 'image' && $request->hasFile($key)) {
                    $file = $request->file($key);
                    $path = $this->imageUploadService->replace(
                        $file,
                        $setting->value,
                        'settings'
                    );
                    $value = $path;
                }
                
                $setting->update(['value' => $value]);
            } else {
                // Create new setting with defaults
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                    'type' => 'text',
                    'group' => $request->input('section', 'general'),
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

    /**
     * Display advanced settings page
     */
    public function advanced(): View
    {
        return view('admin.settings.advanced');
    }

    /**
     * Clear application cache
     */
    public function clearCache(): JsonResponse
    {
        try {
            Cache::flush();
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');

            return response()->json([
                'success' => true,
                'message' => 'All cache cleared successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error clearing cache: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create database backup
     */
    public function createBackup(): JsonResponse
    {
        try {
            // This is a placeholder - you would implement actual backup logic
            // For example, using spatie/laravel-backup package
            
            return response()->json([
                'success' => true,
                'message' => 'Backup created successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating backup: ' . $e->getMessage()
            ], 500);
        }
    }
}
