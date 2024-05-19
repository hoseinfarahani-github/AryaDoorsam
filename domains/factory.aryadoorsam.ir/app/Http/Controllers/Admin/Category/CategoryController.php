<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery\Gallery;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->seo()
            ->setTitle('دسته بندی')
            ->setDescription('پنل مدیریت آریادرسام');
    }

    public function index(Request $request)
    {
        //dd(Category::find(1)->first()->gallery);
        //dd(Gallery::find(3)->galleria);
        return view('Admin.Category.index',[
            'categories'=>$this->PaginatePagez(Category::query()->latest(),$request,['title','alt'],['']),
            'galleries'=>Gallery::query()->where('galleria_type','=','App\Models\Product\Category')->latest()
        ]);
    }

    public function create(Request $request)
    {

        return view('Admin.Category.create',[
            'galleries'=>$this->PaginatePagez(Gallery::query()->where('galleria_type','=','App\Models\Product\Category')->latest(),$request,['title','alt'],['']),
            ]);

    }

    public function show(Category $category)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'title'=> 'required',
           'selectedImage'=>'required'
        ]);
        $category=Category::query()->create([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        if($request->get('selectedImage')=='uploadedImage'){
            $image=$request->file('image');
            $mime=explode('/',$image->getClientMimeType())[1];
            $type=$request->get('flag');
            $title=$request->get('title');
            $object=explode('/',$image->getClientMimeType());
            $imagepath=$image->storeAs('public/Image/Category'.$type,$title.'.'.$mime);

            $gallery=Gallery::query()->create([
                'name'=>$title,
                //TODO box baraye title va name
                'title'=>$title,
                'galleria_type'=>'App\Models\Product\Category',
                'galleria_id'=>$category->id,
                'alt'=>$request->get('alt'),
                'mime'=>$mime,
                'path'=>$imagepath,
                'size'=>number_format($image->getSize()/1024,0)
            ]);

            $gallery_id=$gallery->id;
        }


        else{
            $gallery_id=$request->get('selectedImage');
            $gallery_old=Gallery::find($gallery_id);
            $gallery=Gallery::query()->create([
                'name'=>$gallery_old->name,
                'title'=>$gallery_old->title,
                'galleria_type'=>'App\Models\Product\Category',
                'galleria_id'=>$category->id,
                'alt'=>$gallery_old->alt,
                'mime'=>$gallery_old->mime,
                'path'=>$gallery_old->path,
                'size'=>$gallery_old->size,

            ]);

        }

        $category->update(['gallery_id'=>$gallery_id]);

        return redirect(route('admin.category.index'));
    }

    public function destroy(Category $category)
    {

    }

    public function update(Category $category,Request $request)
    {

    }
}
