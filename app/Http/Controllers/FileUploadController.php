<?php

namespace Sisgera\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Storage;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        $files = request()->file('file');

        $storedFiles = [];

        /** @var UploadedFile $file */
        foreach ($files as $file) {
            $name = str_random(64);
            $extension = $file->getClientOriginalExtension();
            Storage::putFileAs('public/anexos', $file, "{$name}.{$extension}");
            $storedFile = url("storage/anexos/{$name}.{$extension}");

            $storedFiles[] = [
                'url' => $storedFile,
                'size' => $file->getSize(),
            ];
        }

        return $this->ok($storedFiles);
    }
}
