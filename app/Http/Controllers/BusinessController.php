<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;
use DB;
use Image;

class BusinessController extends Controller
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
       $businesses = Business::latest()->paginate(4);
       return view('Admin.business.index',compact('businesses'))->with('i', (request()->input('page', 1) - 1) * 4);    
    }

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.business.create');
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

        $business = new Business;

        // If image is also added with Create Form.
        if($request->has('image')) 
        {            
            $image = $request->file('image');
            $filename = time().$image->getClientOriginalName();                
            
            // save full size.
            $image->move(public_path('images/business'), $filename);                
            
            // save thumbnail image using the full size image saved in above line of code.
            // Resize image using component "intervention".

            $destinationPath = public_path('images/business/thumbnail');                                
            $full_size_image_path =  public_path('images/business/').$filename;   
            $img = Image::make($full_size_image_path);
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
                                        
            $business->featured_image = $filename;
            $business->image_caption = $request->input('image_caption');
        }
                
        $business->title = $request->input('title');
        $business->summary = $request->input('summary');
        $business->content = $request->input('content');
        $business->seo_title = $request->input('seo_title');
        $business->url = $request->input('url');
        $business->metadescription = $request->input('metadescription');

        $business->seo_bots = $request->input('seo_bots');
        $business->status = $request->input('status');
        $business->publish_date = $request->input('publish_date');
        $business->author =  $request->input('author');
        $business->keywords = $request->input('keywords');
        $business->save();
        
        return redirect()->route('business.home')
                        ->with('success','Property created successfully.');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $Business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('Admin.business.show',compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('Admin.business.edit',compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {        
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'seo_title' => 'required|max:70',
            'metadescription' => 'required',
            'seo_bots' => 'required',
        ]);

        $business = Business::find($business->id);        
       
         // If image is also added with Create Form.
         $image = $request->file('image');
         if($request->has('image') && isset($image)) 
         {            
            $image_path = public_path('images/business').'/'.$business->featured_image;
            if(strlen($business->featured_image)>0)
            {
                try {
                    if(isset($business->featured_image))
                    {
                        unlink($image_path);
                    }                    
                } catch (Exception $e) {
                    //report($e);                        
                }
                $image_path = public_path('images/business/thumbnail').'/'.$business->featured_image;
            
                try {
                    if(file_exists($business->featured_image))
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
             $image->move(public_path('images/business'), $filename);                
             
             // save thumbnail image using the full size image saved in above line of code.
             // Resize image using component "intervention".
 
             $destinationPath = public_path('images/business/thumbnail');                                
             $full_size_image_path =  public_path('images/business/').$filename;   
             $img = Image::make($full_size_image_path);
             $img->resize(100, 100, function ($constraint) {
                 $constraint->aspectRatio();
             })->save($destinationPath.'/'.$filename);
                                         
             $business->featured_image = $filename;             
         }
         else
         {
            $business->featured_image = "";            
         }
         $business->image_caption = $request->input('image_caption'); 
        $business->title = $request->input('title');
        $business->summary = $request->input('summary');
        $business->content = $request->input('content');
        $business->seo_title = $request->input('seo_title');
        $business->url = $request->input('url');
        $business->metadescription = $request->input('metadescription');
        $business->publish_date = $request->input('publish_date'); 
        $business->seo_bots = $request->input('seo_bots');
        $business->status = $request->input('status');
        $business->keywords = $request->input('keywords');
        $business->author =  $request->input('author');

        $business->save();
        

  
        return redirect()->route('business.home')
                        ->with('success','Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$business->delete();
        DB::delete('delete from business where id = ?',[$id]);
  
        return redirect()->route('business.home')
                        ->with('success','Property deleted successfully');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $business=DB::table('business')->where('title','LIKE','%'.$request->search."%")
            ->orWhere('summary','LIKE','%'.$request->search."%")
            ->orWhere('content','LIKE','%'.$request->search."%")
            ->get();
           
            if($business)
            {
                foreach ($business as $key => $business) 
                {
                $output.='<tr>'.

                

                '<td>'.$business->title.'</td>';
                

                if(strlen($business->featured_image)>0)
                {
                    $output.='<td><img src="'.url("images/business/thumbnail").'/'.$business->featured_image. '" alt="'.(strlen($business->featured_image)>0?$business->image_caption:'').'"></img></td>';
                }
                else
                {
                    $output.='<td><img src="#" alt=""></img></td>';
                }
                $output.='<td>'.$business->image_caption.'</td>'.

                '<td>'.$business->summary.'</td>'.

                '<td>'.$business->status.'</td>';

                $output .= '<td><form action="'.url('business/destroy')."/".$business->id.'" method="GET">';                                
                $output .= '<a class="btn btn-info" href="'.url('business/show').'/'.$business->id.'">Show</a>';    
                $output .= ' <a class="btn btn-primary" href="'.url('business/edit').'/'.$business->id.'">Edit</a>';    
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
            $business = Business::find($request->businessid);
            $image_path = public_path('images/business').'/'.$business->featured_image;
            
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }                    
            } catch (Exception $e) {
                //report($e);                        
            }
            $image_path = public_path('images/business/thumbnail').'/'.$business->featured_image;
            try {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            } catch (Exception $e) {
                //report($e);                        
            }
            
            $output="";
            
            $business->featured_image = "";        
            $business->save();
 
            return Response($output);         
        }
    }


}
