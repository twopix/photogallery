<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param $photoId
     * @return \Illuminate\Http\Response
     */
    public function index($photoId)
    {
        return Photo::find($photoId)->comments;
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
     * @return Comment
     */
    public function store(Request $request, $photoId)
    {
        $photo = Photo::find($photoId);

        if( empty($photoId) )
        {
            return response()->json([
                'status' => 'error',
                'error' => 1,
                'error_message' => 'Нет такой фотографии'
            ]);
        }

        $requestData = $request->all();
        $requestData['photo_id'] = $photo->id;
        $requestData['owner_id'] = Auth::user()->id;

        return Comment::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param $photoId
     * @param $commentId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($photoId, $commentId)
    {
        return Comment::find($commentId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $photoId
     * @param $commentId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $photoId, $commentId)
    {
        $comment = Comment::find($commentId);

        if( empty($comment) )
        {
            return response()->json([
                'status' => 'error',
                'error' => 1,
                'error_message' => 'Нет такого комментария'
            ]);
        }

        $result = $comment->update($request->all());

        if( $result )
        {
            return response()->json([
                'status' => 'success',
                'error' => 0,
                'result' => [
                    'isUpdated' => true
                ]
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'error' => 1,
                'error_message' => 'Произошла непредвиденная ошибка'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $photoId
     * @param $commentId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($photoId, $commentId)
    {
        $comment = Comment::find($commentId);

        if( empty($comment) )
        {
            return response()->json([
                'status' => 'error',
                'error' => 1,
                'error_message' => 'Нет такого комментария'
            ]);
        }

        $result = $comment->delete();

        if( $result )
        {
            return response()->json([
                'status' => 'success',
                'error' => 0,
                'result' => [
                    'isDeleted' => true
                ]
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'error' => 1,
                'error_message' => 'Произошла непредвиденная ошибка'
            ]);
        }
    }
}
