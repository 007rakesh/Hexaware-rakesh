<?php

namespace App\Http\Controllers;

use App\Mail\FileMail;
use App\Http\Requests\StoreFile;
use App\Repository\FileRepository;
use Illuminate\Support\Facades\Mail;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('file-upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFile $request, FileRepository $fileRepository)
    {
        try {
            $row = $fileRepository->create($request);
            Mail::to('notify@test.test')->send(new FileMail($row));
            return redirect()->back()->with([
                'message' => "File has been uploaded successfully",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'message' => "Something went wrong..!",
            ]);
        }
    }
}
