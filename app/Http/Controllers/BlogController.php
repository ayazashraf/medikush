<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $blogs = Blog::latest()->paginate(5);
  
        if ($request->ajax()) {
            return datatables()::of($blogs)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.blogs.index',compact('blogs'))->with('i', (request()->input('page', 1) - 1) * 5);    
    }

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.blogs.create');
    }


      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'seo_title' => 'required|max:70',
            'metadescription' => 'required',
            'seo_bots' => 'required',
        ]);

        $blog = new Blog;

        // If image is also added with Create Form.
        if($request->has('image')) 
        {            
            $image = $request->file('image');
            $filename = time().$image->getClientOriginalName();                
            
            // save full size.
            $image->move(public_path('public/images/blogs'), $filename);                
            
            // save thumbnail image using the full size image saved in above line of code.
            // Resize image using component "intervention".

            $destinationPath = public_path('public/images/blogs/thumbnail');                                
            $full_size_image_path =  public_path('public/images/blogs/').$filename;   
            $img = Image::make($full_size_image_path);
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
                                        
            $blog->featured_image = $filename;
            $blog->image_caption = $request->input('image_caption');
        }
                
        $blog->title = $request->input('title');
        $blog->summary = $request->input('summary');
        $blog->content = $request->input('content');
        $blog->seo_title = $request->input('seo_title');
        $blog->url = $request->input('url');
        $blog->metadescription = $request->input('metadescription');

        $blog->seo_bots = $request->input('seo_bots');
        $blog->status = $request->input('status');
        $blog->publish_date = $request->input('publish_date');
        $blog->author =  $request->input('author');
        $blog->keywords = $request->input('keywords');
        $blog->save();
        
        return redirect()->route('blogs.home')
                        ->with('success','Blog created successfully.');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('Admin.blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('Admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {        
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'seo_title' => 'required|max:70',
            'metadescription' => 'required',
            'seo_bots' => 'required',
        ]);

        $blog = Blog::find($blog->id);        
       
         // If image is also added with Create Form.
         $image = $request->file('image');
         if($request->has('image') && isset($image)) 
         {            
            $image_path = public_path('public/images/blogs').'/'.$blog->featured_image;
            if(strlen($blog->featured_image)>0)
            {
                try {
                    if(isset($blog->featured_image))
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
                $image_path = public_path('public/images/blogs/thumbnail').'/'.$blog->featured_image;
            
                try {
                    if(file_exists($blog->featured_image))
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
            }
             $image = $request->file('image');
             $filename = time().$image->getClientOriginalName();                
             
             // save full size.
             $image->move(public_path('public/images/blogs'), $filename);                
             
             // save thumbnail image using the full size image saved in above line of code.
             // Resize image using component "intervention".
 
             $destinationPath = public_path('public/images/blogs/thumbnail');                                
             $full_size_image_path =  public_path('public/images/blogs/').$filename;   
             $img = Image::make($full_size_image_path);
             $img->resize(100, 100, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$filename);
                                         
             $blog->featured_image = $filename;             
         }
         else
         {
            $blog->featured_image = "";            
         }
         $blog->image_caption = $request->input('image_caption'); 
        $blog->title = $request->input('title');
        $blog->summary = $request->input('summary');
        $blog->content = $request->input('content');
        $blog->seo_title = $request->input('seo_title');
        $blog->url = $request->input('url');
        $blog->metadescription = $request->input('metadescription');
        $blog->publish_date = $request->input('publish_date'); 
        $blog->seo_bots = $request->input('seo_bots');
        $blog->status = $request->input('status');
        $blog->keywords = $request->input('keywords');
        $blog->author =  $request->input('author');

        $blog->save();
        

  
        return redirect()->route('blogs.home')
                        ->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$blog->delete();
        DB::delete('delete from blogs where id = ?',[$id]);
  
        return redirect()->route('blogs.home')
                        ->with('success','Blog deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $blogs=DB::table('blogs')->where('title','LIKE','%'.$request->search."%")
            ->orWhere('summary','LIKE','%'.$request->search."%")
            ->orWhere('content','LIKE','%'.$request->search."%")
            ->get();
           
            if($blogs)
            {
                foreach ($blogs as $key => $blog) 
                {
                $output.='<tr>'.

                

                '<td>'.$blog->title.'</td>';
                

                if(strlen($blog->featured_image)>0)
                {
                    $output.='<td><img src="'.url("public/images/blogs/thumbnail").'/'.$blog->featured_image. '" alt="'.(strlen($blog->featured_image)>0?$blog->image_caption:'').'"></img></td>';
                }
                else
                {
                    $output.='<td><img src="#" alt=""></img></td>';
                }
                $output.='<td>'.$blog->image_caption.'</td>'.

                '<td>'.$blog->summary.'</td>'.

                '<td>'.$blog->status.'</td>';

                $output .= '<td><form action="'.url('blogs/destroy')."/".$blog->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('blogs/show').'/'.$blog->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('blogs/edit').'/'.$blog->id.'">Edit</a>';    
                $output .= ' <button type="submit" onclick="return confirm(\''."Are you sure?".'\')" class="btn btn-danger">Delete</button>';                    
                $output .= '</form></td>';
                $output .='</tr>';
                }
            return Response($output);
            }
        }
    }
    public function removeImage(Request $request)
    {        
        if($request->ajax())
        {
            $blog = Blog::find($request->blogid);
            $image_path = public_path('public/images/blogs').'/'.$blog->featured_image;
            
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }                    
            } catch (Exception $e) {
                //report($e);                        
            }
            $image_path = public_path('public/images/blogs/thumbnail').'/'.$blog->featured_image;
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            } catch (Exception $e) {
                //report($e);                        
            }
            
            $output="";
            
            $blog->featured_image = "";        
            $blog->save();
 
            return Response($output);         
        }
    }

}
