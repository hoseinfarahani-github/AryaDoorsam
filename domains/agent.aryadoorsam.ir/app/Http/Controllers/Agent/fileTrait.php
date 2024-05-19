<?php

namespace App\Http\Controllers\Agent;


use App\Models\File\File;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

trait fileTrait
{
    public function file_store(UploadedFile $file,$fileable_type,$fileable_id,$order_id)
    {
        $mime=$file->getClientOriginalExtension();
        $fileClientName=$file->getClientOriginalName();
        $fileName=str_replace('.'.$mime,'',$fileClientName);
        $file->storeAs('hassan',$fileClientName);
        $path=$file->move(public_path('file/'.$order_id),$fileName.'.'.$mime);
		        $path=str_replace('/home/aryadoo2/domains/','',$path);
        $path=str_replace('/public','',$path);
		
        File::create([
           'name'           => $fileClientName,
           'mime'           => $mime,
           'path'           => $path,
           //TODO change size
           'size'           => '0',
           'fileable_id'    => $fileable_id,
           'fileable_type'  => $fileable_type
        ]);
        return back();
    }
}
