<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

		$userId = $request->user()->id;
		$requestData = $request->all();

		$rules = array(
			'type' => 'required|in:profile,album',
			'obj_id' => 'nullable',
			'file' => 'image|max:2000',
		);
		$validation = Validator::make($requestData, $rules);
		if ($validation->fails()){
			return response()->json([
				'status' => 'error',
				'error' => 'Ошибка при зарузке файла',
				'errors' => $validation->errors()
			], 400);
		}

		$file = $request->file('file');
		$fileName = $file->getClientOriginalName();
		$fileExtension = $file->getClientOriginalExtension();
		$diskType = $request->input('type');
		$objectId = $request->input('obj_id');

		// uploading file to given path
		if ($diskType == 'profile') {
			$uploadPath = $file->storeAs($diskType, $userId . '.' . $fileExtension);
		} else {
			$uploadPath = $file->store($diskType . '/' . $objectId);
		}

		if ($uploadPath) {
			return response()->json([
				'success' => true,
				'status' => 'success',
				'error' => false,
				'result' => [
					'isUploaded' => true,
					'src' => url('/storage/' . $uploadPath)
				]
			], 200);
		} else {
			return response()->json([
				'status' => 'error',
				'error' => 'Ошибка при зарузке файла',
				'result' => [
					'isUploaded' => false
				]
			], 400);
		}

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
