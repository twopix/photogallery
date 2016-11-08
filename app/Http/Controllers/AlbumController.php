<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
  /**
   * AlbumController constructor.
   */
    public function __construct()
    {
      $this->middleware('jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Album::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // use only for test
        //return view('testCreateAlbum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Album
     */
    public function store(Request $request)
    {
        // use this code only for test
        // don't forget to add owner_id column in App\Album $fillable - 'owner_id'
       /* $request = $request->all();
        $request['owner_id'] = 2;
        return Album::create($request);*/


        // This code is for production
        return Auth::user()->albums()->save(new Album($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Album::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // This code is for testing
        /*$album = Album::find($id);
        return view('testEditAlbum', compact('album'));*/
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
        $album = Album::find($id);

        if( empty($album) )
        {
          return response()->json(['error' => 'there is no such album'], 404);
        }

        return $album->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int - number of deleted elements
     */
    public function destroy($id)
    {
        return Album::destroy($id);
    }
}
