<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadService
{
    /**
     * Upload an image to storage
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int|null $width
     * @param int|null $height
     * @param bool $maintainRatio
     * @return string Path to the uploaded file
     */
    public function upload(
        UploadedFile $file,
        string $directory = 'uploads',
        ?int $width = null,
        ?int $height = null,
        bool $maintainRatio = true
    ): string {
        // Generate unique filename
        $filename = $this->generateFilename($file);
        
        // Full directory path
        $fullDirectory = $directory;
        
        // Create directory if it doesn't exist
        Storage::disk('public')->makeDirectory($fullDirectory);
        
        // Get file path
        $path = $fullDirectory . '/' . $filename;
        
        // Check if image needs resizing
        if ($width || $height) {
            $resizedImage = $this->resizeImage($file, $width, $height, $maintainRatio);
            Storage::disk('public')->put($path, $resizedImage);
        } else {
            // Store original
            Storage::disk('public')->putFileAs($fullDirectory, $file, $filename);
        }
        
        return $path;
    }

    /**
     * Upload multiple images
     *
     * @param array $files
     * @param string $directory
     * @param int|null $width
     * @param int|null $height
     * @return array Array of uploaded file paths
     */
    public function uploadMultiple(
        array $files,
        string $directory = 'uploads',
        ?int $width = null,
        ?int $height = null
    ): array {
        $uploadedPaths = [];
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $uploadedPaths[] = $this->upload($file, $directory, $width, $height);
            }
        }
        
        return $uploadedPaths;
    }

    /**
     * Delete an image from storage
     *
     * @param string|null $path
     * @return bool
     */
    public function delete(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }

    /**
     * Delete multiple images
     *
     * @param array $paths
     * @return bool
     */
    public function deleteMultiple(array $paths): bool
    {
        $paths = array_filter($paths); // Remove null values
        
        if (empty($paths)) {
            return false;
        }

        return Storage::disk('public')->delete($paths);
    }

    /**
     * Replace an existing image with a new one
     *
     * @param UploadedFile $newFile
     * @param string|null $oldPath
     * @param string $directory
     * @param int|null $width
     * @param int|null $height
     * @return string
     */
    public function replace(
        UploadedFile $newFile,
        ?string $oldPath,
        string $directory = 'uploads',
        ?int $width = null,
        ?int $height = null
    ): string {
        // Delete old image if exists
        $this->delete($oldPath);
        
        // Upload new image
        return $this->upload($newFile, $directory, $width, $height);
    }

    /**
     * Generate unique filename
     *
     * @param UploadedFile $file
     * @return string
     */
    protected function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $uniqueId = uniqid();
        
        return $filename . '-' . $uniqueId . '.' . $extension;
    }

    /**
     * Resize image maintaining aspect ratio
     *
     * @param UploadedFile $file
     * @param int|null $width
     * @param int|null $height
     * @param bool $maintainRatio
     * @return string
     */
    protected function resizeImage(
        UploadedFile $file,
        ?int $width,
        ?int $height,
        bool $maintainRatio = true
    ): string {
        // Note: This is a basic implementation
        // For production, consider using intervention/image package
        
        $image = @imagecreatefromstring(file_get_contents($file->getRealPath()));
        
        if (!$image) {
            // If resize fails, return original
            return file_get_contents($file->getRealPath());
        }

        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);

        if ($maintainRatio) {
            // Calculate dimensions maintaining aspect ratio
            if ($width && !$height) {
                $height = (int) ($originalHeight * ($width / $originalWidth));
            } elseif ($height && !$width) {
                $width = (int) ($originalWidth * ($height / $originalHeight));
            } elseif ($width && $height) {
                $ratio = min($width / $originalWidth, $height / $originalHeight);
                $width = (int) ($originalWidth * $ratio);
                $height = (int) ($originalHeight * $ratio);
            }
        }

        $resized = imagecreatetruecolor($width ?? $originalWidth, $height ?? $originalHeight);
        
        // Preserve transparency for PNG
        imagealphablending($resized, false);
        imagesavealpha($resized, true);
        
        imagecopyresampled(
            $resized,
            $image,
            0, 0, 0, 0,
            $width ?? $originalWidth,
            $height ?? $originalHeight,
            $originalWidth,
            $originalHeight
        );

        ob_start();
        
        // Output based on mime type
        $mimeType = $file->getMimeType();
        if ($mimeType === 'image/png') {
            imagepng($resized, null, 9);
        } elseif ($mimeType === 'image/gif') {
            imagegif($resized);
        } else {
            imagejpeg($resized, null, 90);
        }
        
        $imageData = ob_get_contents();
        ob_end_clean();
        
        imagedestroy($image);
        imagedestroy($resized);
        
        return $imageData;
    }

    /**
     * Get image URL from path
     *
     * @param string|null $path
     * @param string|null $default
     * @return string
     */
    public function getUrl(?string $path, ?string $default = null): string
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::url($path);
        }

        return $default ?? asset('img/default-image.jpg');
    }

    /**
     * Validate image
     *
     * @param UploadedFile $file
     * @param int $maxSize Max size in KB
     * @param array $allowedMimes
     * @return bool
     */
    public function validate(
        UploadedFile $file,
        int $maxSize = 2048,
        array $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp']
    ): bool {
        // Check file size (convert KB to bytes)
        if ($file->getSize() > ($maxSize * 1024)) {
            return false;
        }

        // Check mime type
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            return false;
        }

        return true;
    }
}
