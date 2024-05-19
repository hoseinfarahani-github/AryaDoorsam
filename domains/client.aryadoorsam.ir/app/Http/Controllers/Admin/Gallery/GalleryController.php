<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery\Gallery;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class GalleryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('رسانه')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {

        if(empty($request->query())){
            return view('Admin.Gallery.index',[
                'galleries'=>$this->PaginatePagez(Gallery::query()->latest(),$request,['title','alt'],[''])
            ]);
        }
        else{
            $query=$request->query()['flag'];

            foreach ($query as $key=>$value){

                if($value == 'category' || $value == 'product') $query[$key]='App\Models\Product\\'.$value;
                elseif ($value == 'user') $query[$key]='App\Models\User\\'.$value;
                elseif ($value == 'other') {

                    return view('Admin.Gallery.index',[
                        'galleries'=>$this->PaginatePagez(Gallery::query()->whereNull("galleria_type")->latest(),$request,['title','alt'],[''])
                    ]);
                }

            }
            return view('Admin.Gallery.index',[
                'galleries'=>$this->PaginatePagez(Gallery::query()->whereIn("galleria_type",$query)->latest(),$request,['title','alt'],[''])
            ]);
        }
    }

    public function show(Gallery $gallery)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
           'image'=>'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        $image=$request->file('image');
        $mime=explode('/',$image->getClientMimeType())[1];
        $type=$request->get('flag');
        $title=$request->get('title');
        $object=explode('/',$image->getClientMimeType());
        $imagepath='';
        if (!!$request->get('flag')){
            $imagepath=$image->storeAs('public/Image/'.$type,$title.'.'.$mime);
        }
        else{
            $imagepath=$image->storeAs('public/Image/other',$title.'.'.$mime);
        }
        Gallery::query()->create([
            'name'=>$title,
            //TODO box baraye title va name
            'title'=>$title,
            'alt'=>$request->get('alt'),
            'mime'=>$mime,
            'path'=>$imagepath,
            'size'=>number_format($image->getSize()/1024,0)
        ]);
        return redirect(route('admin.gallery.index'));
    }
}
