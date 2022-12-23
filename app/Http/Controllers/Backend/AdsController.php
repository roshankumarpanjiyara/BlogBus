<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::orderBy('id','desc')->get();
    	return view('backend.admin.advertisement.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.advertisement.create');
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
            'link'=>'required',
            'image'=>'required | mimes:jpeg,png,jpg',
            'type'=>'required'
        ]);

        $data = array();
 	    $data['link'] = $request->link;
 	    $data['created_by'] = auth()->user()->name;
        if ($request->type == 2) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,90)->save('storage/ads/'.$name_gen);
            $image_url = 'storage/ads/'.$name_gen;
            $data['image'] = $image_url;
            $data['type'] = 2;
            Advertisement::create($data);
            toast('Horizontal Ad created!','success')->autoClose(5000)->width('450px')->timerProgressBar();
            return Redirect()->route('advertisements.index');
        }else{
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->save('storage/ads/'.$name_gen);
            $image_url = 'storage/ads/'.$name_gen;
            $data['image'] = $image_url;
            $data['type'] = 1;
            Advertisement::create($data);
            toast('Vertical Ad created!','success')->autoClose(5000)->width('450px')->timerProgressBar();
            return Redirect()->route('advertisements.index');
        }
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
        $ad = Advertisement::find($id);
        return view('backend.admin.advertisement.edit',compact('ad'));
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
            'link'=>'required',
            'image'=>'mimes:jpeg,png,jpg',
            'type'=>'required'
        ]);
        $data = $request->all();
        $ad = Advertisement::find($id);
        if($request->hasFile('image')){
            $image_path = $ad->image;
            if($image_path!=null){
                unlink($image_path);
            }
            if ($request->type == 2) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(970,90)->save('storage/ads/'.$name_gen);
                $image_url = 'storage/ads/'.$name_gen;
                $data['type'] = 2;
            }else{
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(500,500)->save('storage/ads/'.$name_gen);
                $image_url = 'storage/ads/'.$name_gen;
                $data['type'] = 1;
            }
        }else{
            $image_url = $ad->image;
        }
        $data['image']=$image_url;
        $ad->update($data);
        toast('Advertisement updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('advertisements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advertisement::find($id);
        $image_path = $ad->image;
        unlink($image_path);
        $ad->delete();
        toast('Advertisement Deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return Redirect()->route('advertisements.index');
    }
}
