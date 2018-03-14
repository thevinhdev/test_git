<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [

			'txtUser'   => 'required|unique:users,username',
			'txtPass'   => 'required',
			'txtRePass' => 'required|same:txtPass',
			'txtEmail'  => 'required'
			
		];
	}
	public function messages ()
	{
		return [

			'txtUser.required'   => 'Bạn chưa nhập tên người dùng',
			'txtUser.unique'     => 'Tên người dùng đã tồn tại',
			
			'txtPass.required'   => 'Bạn chưa nhập mật khẩu',
			
			'txtRePass.required' => 'Bạn chưa nhập mật khẩu',
			'txtRePass.same'     => 'Bạn nhập chưa chính xác',
			
			'txtEmail.required'  => 'Bạn chưa nhập email'

		];
	}

}
