<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;
class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        
        $pages = Page::latest()->paginate(5);
  
        if ($request->ajax()) {
            return datatables()::of($pages)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view(' Admin.pages.index',compact('pages'))->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view(' Admin.pages.create');
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
            'description' => 'required',
            'seotitle' => 'required|max:70',
            'metadescription' => 'required',
            'seo_bots' => 'required',
        ]);

        $page = new Page;

        // If image is also added with Create Form.
        if($request->has('image')) 
        {            
            $image = $request->file('image');
            $filename = time().$image->getClientOriginalName();                
            
            // save full size.
            $image->move(public_path('public/images/pages'), $filename);                
            
            // save thumbnail image using the full size image saved in above line of code.
            // Resize image using component "intervention".

            $destinationPath = public_path('public/images/pages/thumbnail');                                
            $full_size_image_path =  public_path('public/images/pages/').$filename;   
            $img = Image::make($full_size_image_path);
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
                                        
            $page->featured_image = $filename;
            $page->image_caption = $request->input('image_caption');
        }
                
        $page->title = $request->input('title');
        $page->summary = $request->input('summary');
        $page->description = $request->input('description');
        $page->seotitle = $request->input('seotitle');
        $page->url = $request->input('url');
        $page->metadescription = $request->input('metadescription');
        $page->keywords = $request->input('keywords');
        $page->seo_bots = $request->input('seo_bots');
        $page->status = $request->input('status');

        $page->save();
        
        return redirect()->route('page.home')
                        ->with('success','Page created successfully.');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view(' Admin.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view(' Admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {        
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'seotitle' => 'required|max:70',
            'metadescription' => 'required',
            'seo_bots' => 'required',
        ]);

        $page = Page::find($page->id);        
       
         // If image is also added with Create Form.
         $image = $request->file('image');
         if($request->has('image') && isset($image)) 
         {            
            $image_path = public_path('public/images/pages').'/'.$page->featured_image;
            if(strlen($page->featured_image)>0)
            {
                try {
                    if(isset($page->featured_image))
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
                $image_path = public_path('public/images/pages/thumbnail').'/'.$page->featured_image;
            
                try {
                    if(file_exists($page->featured_image))
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
             $image->move(public_path('public/images/pages'), $filename);                
             
             // save thumbnail image using the full size image saved in above line of code.
             // Resize image using component "intervention".
 
             $destinationPath = public_path('public/images/pages/thumbnail');                                
             $full_size_image_path =  public_path('public/images/pages/').$filename;   
             $img = Image::make($full_size_image_path);
             $img->resize(100, 100, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$filename);
                                         
             $page->featured_image = $filename;             
         }
         else
         {
            $page->featured_image = "";            
         }
         $page->image_caption = $request->input('image_caption'); 
        $page->title = $request->input('title');
        $page->summary = $request->input('summary');
        $page->description = $request->input('description');
        $page->seotitle = $request->input('seotitle');
        $page->url = $request->input('url');
        $page->metadescription = $request->input('metadescription');

        $page->seo_bots = $request->input('seo_bots');
        $page->status = $request->input('status');
        $page->keywords = $request->input('keywords');
        $page->save();
        

  
        return redirect()->route('page.home')
                        ->with('success','Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$page->delete();
        DB::delete('delete from pages where id = ?',[$id]);
  
        return redirect()->route('page.home')
                        ->with('success','Page deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $pages=DB::table('pages')->where('title','LIKE','%'.$request->search."%")
            ->orWhere('summary','LIKE','%'.$request->search."%")
            ->orWhere('description','LIKE','%'.$request->search."%")
            ->get();
           
            if($pages)
            {
                foreach ($pages as $key => $page) 
                {
                $output.='<tr>'.

                

                '<td>'.$page->title.'</td>';
                

                if(strlen($page->featured_image)>0)
                {
                    $output.='<td><img src="'.url("images/pages").'/'.$page->featured_image. '" alt="'.(strlen($page->featured_image)>0?$page->image_caption:'').'" style="max-width:150px;"></img></td>';
                }
                else
                {
                    $output.='<td><img src="#" alt=""></img></td>';
                }
                $output.='<td>'.$page->image_caption.'</td>'.

                '<td>'.$page->summary.'</td>'.

                '<td>'.$page->status.'</td>';

                $output .= '<td><form action="'.url('pages/destroy')."/".$page->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('pages/show').'/'.$page->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('pages/edit').'/'.$page->id.'">Edit</a>';    
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
            $page = Page::find($request->pageid);
            $image_path = public_path('public/images/pages').'/'.$page->featured_image;
            
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }                    
            } catch (Exception $e) {
                //report($e);                        
            }
            $image_path = public_path('public/images/pages/thumbnail').'/'.$page->featured_image;
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            } catch (Exception $e) {
                //report($e);                        
            }
            
            $output="";
            
            $page->featured_image = "";        
            $page->save();
 
            return Response($output);         
        }
    }

    public function showPageManagementServices()
    {
        $page = DB::table('pages')->where('id', '1')->first();        
        return view('page',  ['description' => $page->metadescription]);        
    }
}
