<?php

namespace App\Repository;

use App\Models\File;
use Illuminate\Http\Request;

class FileRepository
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('uploads', 's3');

        $data = new File();
        $data->bucket_id = 1;
        $data->filename = basename($path);
        $data->size = $file->getSize();
        $data->created_at = date('Y-m-d');
        $data->save();
        return $data;
    }
}
