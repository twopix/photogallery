<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * PhotoController constructor.
     */
    public function __construct()
    {
        //$this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param $album
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index($album)
    {
        // use only for test
        return Album::find($album)->photos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $album
     * @return \Illuminate\Http\Response
     */
    public function create($album)
    {
        // use only for test
        /*return view('testCreatePhoto', compact('album'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Photo
     */
    public function store(Request $request, $album)
    {
        // use this code only for test
        // don't forget to add owner_id, user_id columns in App\Album $fillable
        $ownerId = Auth::user()->id;
        $attachAlbum = User::find($ownerId)->albums()->where('id', $album)->get();

        // If there is no access to album
        if( empty($attachAlbum) )
        {
            return response()->json(['error' => 'You have no access'], 403);
        }

        $request = $request->all();
        $request['owner_id'] = $ownerId;
        $request['album_id'] = $album;
        $request['filename'] = '1.jpg';
        $request['original_name'] = '1.jpg';

        return Photo::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param $album
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($album, $id)
    {
        return Album::find($album)->photos()->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $album
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($album, $id)
    {
        // This code is for testing
        /*$photo = Photo::find($id);
        return view('testEditPhoto', compact('photo', 'album'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $album
     * @param  int $id
     * @return bool
     */
    public function update(Request $request, $album, $id)
    {
        $photo = Photo::find($id);

        if( empty($photo) )
        {
            return response()->json(['error' => 'there is no such photo'], 401);
        }

        $result = $photo->update($request->all());

        return response()->json(['status' => !!$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $album
     * @param  int $id
     * @return int
     */
    public function destroy($album, $id)
    {
        return Photo::destroy($id);
    }
}
