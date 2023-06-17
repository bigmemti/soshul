<?php
namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageManager {

    public function uploads($file, $path, $folder)
    {
        if($file) {
            $file_name   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put( $folder . $file_name, File::get($file));
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = $path . $file_name;

            return $file = [
                'fileName' => $file_name,
                'fileType' => $file_type,
                'filePath' => $filePath,
            ];
        }
    }

}
