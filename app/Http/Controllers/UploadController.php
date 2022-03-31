<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadFile(FileRequest $request)
    {
        $file = $request->file('file');

        if ($file->getClientOriginalExtension() != 'pdf') {
            return response('Not a PDF file', 422);
        } elseif (strpos($file->getClientOriginalName(), 'Proposal') !== 0) {
            return response('Proposal word doesnt exist', 422);
        }

        $file = File::where('name', '=', $file->getClientOriginalName())->where('size', '=', $file->getSize())->first();
        if ($file != null) {
            $file->update();
        } else {
            File::create([
               'name'=> $file->getClientOriginalName(),
                'size'=>$file->getSize()
            ]);
        }
        return 'Done';
    }
}
