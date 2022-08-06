<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['posts'] = BlogPost::paginate(7);
        return view('admin.news')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$newPost=BlogPost::create([
        //    'title'=>$request->title,
        //    'description'=>$request->description,
        //]);
        //return redirect('/admin/blogs');
        $newPost= new BlogPost;
        $newPost->title=$request->input('title');
        $newPost->description=$request->input('description');
        if($request->hasfile('news_image'))
        {
            $file=$request->file('news_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/',$filename);
            $newPost->news_image=$filename;
        }
        $newPost->save();
        
        return redirect('/admin/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newPost=BlogPost::find($id);
        return view('admin.edit',compact('newPost'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newPost=BlogPost::find($id);
        $newPost->title=$request->input('title');
        $newPost->description=$request->input('description');
        if($request->hasfile('news_image'))
        {   
            $destination='uploads/'.$newPost->news_image;
            
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('news_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/',$filename);
            $newPost->news_image=$filename;
        }
        $newPost->update();
        
        return redirect()->back()->with('status','Data updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newPost= BlogPost::find($id);
        $destination='uploads/'.$newPost->news_image;
            
            if(File::exists($destination)){
                File::delete($destination);
            }
        $newPost->delete();
        return redirect()->back()->with('status','Data deleted');
        
    }
}
