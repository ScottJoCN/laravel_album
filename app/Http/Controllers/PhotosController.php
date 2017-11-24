<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;
use Image;
class PhotosController extends Controller
{
    //
    public function store(Request $request){
    	// data valid
    	$this->validate($request,[
    		'photo' => 'required',
    	]);
    	// generate path & photo store
    	$name = "photo".time();
    	$src = "img/album/photos/".$name.".jpg";
    	Image::make($request->photo)->save(public_path($src));
    	// if input name,generate input name
    	if($request->has('name')){
    		$name = $request->name;
    	}
    	// save data
    	$photo = Photo::create([
    		'album_id' => $request->album_id,
    		'name' => $name,
    		'intro' =>$request->intro,
    		'src' =>"/".$src,
    	]);
    	// return
    	session()->flash('success','Upload Successful');
    	return back();
    }
    public function update(Request $request,$id){
        // updata
        $photo = Photo::findOrFail($id);
        $photo ->updata([
            'name'=>$request->name,
            'intro'=>$request->intro,

        ]);
        // return
        session()->flash('success','Edit Successful');
        return back();
    }

    public function destroy($id){
        // delete
        $photo = Photo::findOrFail($id);
        $photo->delete();

        // return
        session()->flash('success','Delete Successful');
        return back();
    }
}
