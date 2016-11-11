<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class FileUploadController extends Controller
{
	/**
	 * FileUploadController constructor.
	 */
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
	public function index()
	{
		return view('pages.upload');
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
	 * Store a newly uploaded file.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
//		return response()->json([
//			'success' => true,
//			'status' => 'success',
//			'error' => 0,
//			'result' => [
//				'isUploaded' => true
//			]
//		], 200);

		$userId = Auth::User()->id;

		$requestData = $request->all();

		$rules = array(
			'type' => 'required|in:profile,album',
			'obj_id' => 'nullable',
			'file' => 'image|max:2000',
		);
		$validation = Validator::make($requestData, $rules);
		if($validation->fails()){
			return response()->json( $validation->errors()
				, 400);
		}

		$file = $request->file('file');

		$destinationPath = 'storage/app/public/images/' . $request->input('type'); // upload path
		$extension = $file->getClientOriginalExtension(); // getting file extension
		$fileName = '.' . $extension; // renaming image

		if ($request->input('type') == 'profile') {
			$fileName = $userId . $fileName;
		} else if ($request->input('type') == 'album') {
			$destinationPath .= '/' . $request->input('obj_id');
			$fileName = rand(11111, 99999) . $fileName;
		}

		$upload_success = $file->move($destinationPath, $fileName); // uploading file to given path

		if ($upload_success) {
			return response()->json([
				'success' => true,
				'status' => 'success',
				'error' => 0,
				'result' => [
					'isUploaded' => true,
					'src' => $upload_success->getPathname()
				]
			], 200);
		} else {
			return response()->json([
				'success' => false,
				'status' => 'error',
				'error' => 1,
				'result' => [
					'isUploaded' => false
				]
			], 400);
		}

//		dd(Auth::User());
//		dd($requestData);

//		$file = $request -> file('file');
//		// show the file name
//		echo 'File Name : '.$file->getClientOriginalName();
//		echo '<br>';
//
//		// show file extensions
//		echo 'File Extensions : '.$file->getClientOriginalExtension();
//		echo '<br>';
//
//		// show file path
//		echo 'File Path : '.$file->getRealPath();
//		echo '<br>';
//
//		// show file size
//		echo 'File Size : '.$file->getSize();
//		echo '<br>';
//
//		// show file mime type
//		echo 'File Mime Type : '.$file->getMimeType();
//		echo '<br>';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $fileId
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
	public function show($fileId)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $fileId
	 * @return \Illuminate\Http\Response
	 */
	public function edit($fileId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param $fileId
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
	public function update(Request $request, $fileId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $fileId
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
	public function destroy($fileId)
	{
		//
	}

}
