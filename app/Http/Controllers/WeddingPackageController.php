<?php

namespace App\Http\Controllers;

use App\Photo;
use App\WeddingPackage;
use Illuminate\Http\Request;

class WeddingPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wedding_packages=WeddingPackage::latest()->get();
        return view('wedding_package.index',compact('wedding_packages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wedding_package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required|numeric",
            "start" => "required",
            "end" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $wedding_package=new WeddingPackage();
        $wedding_package->title=$request->title;
        $wedding_package->description=$request->description;
        $wedding_package->price=$request->price;
        $wedding_package->start=$request->start;
        $wedding_package->end=$request->end;
        $wedding_package->save();

        if ($request->hasFile('images')){
            $dir="public/wedding_package";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_wedding_package.".$image->getClientOriginalExtension();
                $image->storeAs($dir,$newName);
                $photo=new Photo();
                $photo->name=$newName;
                $aa=WeddingPackage::get()->last();
                $photo->wedding_package_id=$aa->id;
                $photo->save();
            }
//            return 'success';

        }


        return redirect()->route("wedding_package.create")->with("toast","Golf Event Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WeddingPackage  $weddingPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WeddingPackage $weddingPackage)
    {
        return view('wedding_package.show',compact('weddingPackage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WeddingPackage  $weddingPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(WeddingPackage $weddingPackage)
    {
        return view('wedding_package.edit',compact('weddingPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WeddingPackage  $weddingPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeddingPackage $weddingPackage)
    {

        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required|numeric",
            "start" => "required|date",
            "end" => "required|date",
//            "photo" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $weddingPackage->title=$request->title;
        $weddingPackage->description=$request->description;
        $weddingPackage->price=$request->price;
        $weddingPackage->start=$request->start;
        $weddingPackage->end=$request->end;
        $weddingPackage->update();



        return redirect()->route("wedding_package.index")->with("toast","Golf Event Updated Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WeddingPackage  $weddingPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeddingPackage $weddingPackage)
    {
        Photo::where('wedding_package_id',$weddingPackage->id)->delete();
        $weddingPackage->delete();
        return redirect()->route("wedding_package.index")->with("toast","Golf Event Delete Successful");
    }
}
