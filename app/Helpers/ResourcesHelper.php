<?php 

namespace App\Helpers;

use Config;
use Storage;

class ResourcesHelper
{
    public static function saveFile($file, $folder)
    {
        $extension       = $file->getClientOriginalExtension();
        $originalName    = $file->getClientOriginalName();
        $originalNameRaw = substr($originalName, 0, strrpos($originalName, "."));
        
        $slug            = \Illuminate\Support\Str::slug($originalNameRaw, '-');
        $timedFileName   = $slug . '-' . strtotime('now') ;
        $fileName = $timedFileName . '.' . $extension;
        $filePath        = $folder . '/' . $fileName;

        Storage::disk('public')->makeDirectory($folder);
        Storage::disk('public')->put($filePath, \File::get( $file ));

        return [
            'slug' => $slug,
            'extension' => $extension,
            'file_original_name' => $originalName,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_url' => Storage::url($filePath),
        ];
    }

    public static function deleteFile($filePath)
    {
        $fileExists = Storage::disk('public')->exists($filePath);
        
        if ($fileExists) {
            Storage::disk('public')->delete($filePath);
        }
    }

    public static function getUrlPath($filePath, $thumbnailType = '') 
    {
        $newFilePath = $filePath;

        $shouldPrepareThumbnail = $thumbnailType !== '';

        if($shouldPrepareThumbnail) {
            $nameWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
            $extension = preg_match('/\./', $filePath) ? preg_replace('/^.*\./', '', $filePath) : '';
            
            return $nameWithoutExt . '-' . $thumbnailType . '.' . $extension;
        }
        
        return $newFilePath;
    }

}
