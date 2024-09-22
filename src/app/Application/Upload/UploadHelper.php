<?php

namespace App\Application\Upload;

trait UploadHelper
{
    public static function checkFolder(string $path): void
    {
        if (! is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
}
