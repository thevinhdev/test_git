<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			//'sltParent' => 'required',
			'txtName'   => 'required|unique:products,name',
			'fImages'   => 'required|image'
		];
	}
	public function messages () {
		return [
			//'sltParent.required' => 'Bạn vui lòng chọn Thể Loại',
			'txtName.required'   => 'Bạn vui lòng nhập Tên',
			'txtName.unique'     => 'Tên đã tồn tại',
			'fImages.required'   => 'Bạn vui lòng chọn Picture',
			'fImages.image'      => 'Không phải file Ảnh'
		];
	}

}
