<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Get the correct image URL
     */
    public static function getImageUrl($image, $default = null)
    {
        if (empty($image)) {
            return $default ?? 'https://via.placeholder.com/400x300?text=شبوة21';
        }

        // Check if it's a valid URL
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Check if it's a storage path
        if (str_starts_with($image, 'storage/')) {
            return asset($image);
        }

        // Assume it's a storage file
        return asset('storage/' . $image);
    }

    /**
     * Get thumbnail URL
     */
    public static function getThumbnailUrl($image, $width = 400, $height = 300)
    {
        $url = self::getImageUrl($image);
        
        if (str_contains($url, 'unsplash.com')) {
            return $url . "&w={$width}&h={$height}&fit=crop";
        }
        
        return $url;
    }

    /**
     * Check if image exists
     */
    public static function imageExists($image)
    {
        if (empty($image)) {
            return false;
        }

        if (filter_var($image, FILTER_VALIDATE_URL)) {
            $headers = @get_headers($image);
            return $headers && strpos($headers[0], '200') !== false;
        }

        return file_exists(storage_path('app/public/' . $image));
    }
} 