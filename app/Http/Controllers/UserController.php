<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;

class UserController extends Controller {

	// Add
	public function getAdd ()
	{
		return view('backend.user.add');
	}

	public function postAdd (UserRequest $request)
	{

		$user                 = new User;
		$user->username       = $request->txtUser;
		$user->password       = Hash::make($request->txtPass);
		$user->email          = $request->txtEmail;
		$user->level          = $request->rdoLevel;
		$user->remember_token = $request->_token;

		$user->save();
		return redirect()->route('admin.user.getList')->with(['flash_message' => 'Thêm mới thành công']);

	}

	// Sửa
	public function getEdit () {

	}

	public function postEdit ()
	{

	}

	// List
	public function getList ()
	{
		$listUser = User::select('id','username','email','level')->get()->toArray();//dd($listUser);die;
		return view('backend.user.list', compact('listUser'));
	}

	// Xóa
	public function getDelete ($id) {
		$user = User::find($id);
		$user->delete();
		return redirect()->route('admin.user.getList')->with(['flash_message' => 'Đã xóa thành công']);
	}

}
