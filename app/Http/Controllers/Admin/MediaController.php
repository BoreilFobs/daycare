<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Display media library
     */
    public function index(): View
    {
        // Get all files from storage/app/public
        $folders = ['images', 'services', 'programs', 'events', 'blog', 'team', 'gallery', 'testimonials', 'settings'];
        $media = collect();

        foreach ($folders as $folder) {
            $files = Storage::disk('public')->files($folder);
            
            foreach ($files as $file) {
                $media->push((object)[
                    'id' => md5($file),
                    'path' => $file,
                    'name' => basename($file),
                    'folder' => $folder,
                    'extension' => pathinfo($file, PATHINFO_EXTENSION),
                    'size' => Storage::disk('public')->size($file),
                    'created_at' => now()->setTimestamp(Storage::disk('public')->lastModified($file)),
                ]);
            }
        }

        // Sort by newest first
        $media = $media->sortByDesc('created_at');

        // Paginate
        $page = request('page', 1);
        $perPage = 30;
        $offset = ($page - 1) * $perPage;
        
        $items = $media->slice($offset, $perPage);
        $total = $media->count();
        
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.media.index', ['media' => $paginator]);
    }

    /**
     * Upload media files
     */
    public function upload(Request $request): RedirectResponse
    {
        $request->validate([
            'folder' => 'required|string|in:images,services,programs,events,blog,team,gallery,testimonials,settings',
            'files' => 'required|array',
            'files.*' => 'required|image|max:5120', // 5MB max
        ]);

        $folder = $request->input('folder');
        $uploaded = 0;

        foreach ($request->file('files') as $file) {
            $this->imageUploadService->upload($file, $folder);
            $uploaded++;
        }

        return redirect()
            ->route('admin.media.index')
            ->with('success', "Successfully uploaded {$uploaded} file(s)!");
    }

    /**
     * Delete media file
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            // Find file by ID (md5 hash of path)
            $folders = ['images', 'services', 'programs', 'events', 'blog', 'team', 'gallery', 'testimonials', 'settings'];
            
            foreach ($folders as $folder) {
                $files = Storage::disk('public')->files($folder);
                
                foreach ($files as $file) {
                    if (md5($file) === $id) {
                        Storage::disk('public')->delete($file);
                        
                        return response()->json([
                            'success' => true,
                            'message' => 'File deleted successfully'
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'File not found'
            ], 404);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting file: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get media URL by ID
     */
    public function show(string $id): JsonResponse
    {
        $folders = ['images', 'services', 'programs', 'events', 'blog', 'team', 'gallery', 'testimonials', 'settings'];
        
        foreach ($folders as $folder) {
            $files = Storage::disk('public')->files($folder);
            
            foreach ($files as $file) {
                if (md5($file) === $id) {
                    return response()->json([
                        'success' => true,
                        'url' => Storage::url($file),
                        'path' => $file,
                        'name' => basename($file),
                        'size' => Storage::disk('public')->size($file),
                    ]);
                }
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'File not found'
        ], 404);
    }
}
