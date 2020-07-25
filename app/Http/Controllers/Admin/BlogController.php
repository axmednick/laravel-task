<?php

namespace App\Http\Controllers\Admin;

use App\Admins;
use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $permission=permission();
        $posts=Blog::all();
        return view('admin.blog.index',compact('posts','permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission=permission();
        $permission['create']!='true'? die('OPS') :'';
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title'=>'required',
            'img'=>'required',
            'text'=>'required'
        ]);

        $img=$request->file('img');
        $imgName=microtimeFileName($img);
        $img->move('uploads/blog/',$imgName);

        $blog=new Blog();
        $blog->title=$request->title;
        $blog->slug=Str::slug($request->title);
        $blog->content=$request->text;
        $blog->image=$imgName;
        $blog->save();

        return back()->with('success','Published');







    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $blog=Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
        $this->validate($request,[
            'title'=>'required',
            'text'=>'required'
        ]);

        $post=Blog::find($id);
        $image=$request->file('img');
        if ($image){
            unlink('uploads/blog/'.$post->image);
            $imageName=microtimeFileName($image);
            $image->move('uploads/blog/',$imageName);
            $post->image=$imageName;
            $post->save();
        }

        $post->title=$request->title;
        $post->slug=Str::slug($request->title);
        $post->content=$request->text;
        $post->save();

        return back()->with('success','Success Update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission=permission();
        $permission['delete']!='true'? die('OPS') :'';
        $post=Blog::find($id);
        unlink('uploads/blog/'.$post->image);
        $post->delete();
        return response(json_encode([
            'delete'=>'true'
        ]));
    }
}
