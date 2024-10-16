<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class FileUploadHelper
{
    public static function uploadFile($file, $folder = 'uploads')
    {
        $filePath = $file->store($folder, 'public');
        return $filePath;
    }
}
