<?php

namespace App\Http\Controllers;

use App\BusinessItem;
use App\Admin;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use Illuminate\Support\Facades\Hash;


class BusinessItemController extends Controller
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
       $items = BusinessItem::latest()->paginate(10);
       return view('Admin.items.index',compact('items'))->with('i', (request()->input('page', 1) - 1) * 10);    
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
     * @param  \App\BusinessItem  $businessItem
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessItem $businessItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessItem  $businessItem
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessItem $businessItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessItem  $businessItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessItem $businessItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessItem  $businessItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessItem $businessItem)
    {
        //
    }
}
