<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;
use Image;
class AlbumsController extends Controller
{
    //save album-info
    public function store(Request $request){
        //data invalid
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        // data save
        $album = Album::create([
            'name' => $request->name,
            'intro' => $request->intro,
            'password' => $request->password,
        ]);

        //back
        session()->flash('success', 'create successful');
        return back();
        // yes
    	
    }
    // album detail
    public function show($id){
        // get album info
        $album = Album::findOrFail($id);

        // get include photo of album
        
        $photos = $album->photos()->orderBy('created_at', 'desc')->paginate(20);
        
        // return
        return view('albums.show',compact(['album','photos']));
    }
    // album edit
    public function update(Request $request,$id){
        // data invalid
        $this->validate($request,[
            'name' => 'required|max:50',
        ]);
        // update data
        $album = Album::findOrFail($id);
        $album ->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);
        // if update cover,save cover
        if($request->hasFile('cover')){
            $cover_path = "img/album/covers/".time().".jpg";
            Image::make($request->cover)->resize(355,200)->save(public_path($cover_path));
            $album->update([
                'cover' => '/'.$cover_path,
            ]);
        }
        // return
        session()->flash('success','Edit successful');
        return back();
    }
    // destory album
    public function destroy($id){
        $album = Album::findOrFail($id);
        $album->delete();

        session()->flash('success','Delete successful');
        return redirect()->route('home');
    }
}
