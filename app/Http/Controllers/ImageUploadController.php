<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        request()->validate([
            'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
      
       if ($files = $request->file('image')) {
          
          $imageName = time().'.'.$request->image->extension();  
   
          $request->image->move(public_path('images'), $imageName);
          
          // for save original image
          $ImageUpload = Image::make($files);
          $originalPath = 'public/images/pages/';
          $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
          
          // for save thumnail image
          $thumbnailPath = 'public/images/pages/thumbnail/';
          $ImageUpload->resize(250,125);
          $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
      
        }      
        $image = Photo::latest()->first(['photo_name']);
        return Response()->json($image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
