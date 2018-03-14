<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller {

	// hàm thêm category
	public function getAdd () {
		$parent = Cate::select('id','name','parent_id')->get()->toArray();
		return view('backend.cate.add', compact('parent'));
	}

	public function postAdd (CateRequest $request) {
		$cate = new Cate;
		$cate->name        = $request->txtCateName;
		$cate->alias       = changeTitle($request->txtCateName);
		$cate->order       = $request->txtOrder;
		$cate->parent_id   = $request->sltParent;
		$cate->keywords    = $request->txtKeywords;
		$cate->description = $request->txtDescription;
		$cate->save();

		return redirect()->route('admin.cate.getList')->with(['flash_message' => 'Thêm mới thể loại thành công']);
	}

	// hàm lấy ra danh sách category
	public function getList () {
		$data = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('backend.cate.list', compact('data'));
	}

	// Hàm sửa category
	public function getEdit ($id) {
		$data = Cate::find($id);
		$parent = Cate::select('id','name','parent_id')->get()->toArray();
		return view('backend.cate.edit', compact('parent','data'));
	}

	public function postEdit (Request $request, $id) {
		$this->validate($request,
			["txtCateName" => "required"],
			["txtCateName.required" => "Bạn vui lòng nhập tên"]
		);
		$cate = Cate::find($id);
		$cate->name        = $request->txtCateName;
		$cate->alias       = changeTitle($request->txtCateName);
		$cate->order       = $request->txtOrder;
		$cate->parent_id   = $request->sltParent;
		$cate->keywords    = $request->txtKeywords;
		$cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_message' => 'Cập nhật thể loại thành công']);
	}
	

	//hàm xóa category
	public function getDelete ($id) {
		// $parent = Cate::where('parent_id',$id)->count();
		// if ($parent == 0) {
		// 	$cate = Cate::find($id);
		// 	$cate->delete();
		// 	return redirect()->route('admin.cate.getList')->with(['flash_message' => 'Đã xóa thành công']);
		// } else {
		// 	echo "<script type="text/javascript">
		// 		alert('Bạn không thể xóa');
		// 		window.location = '";
		// 			echo route('backend.cate.list');
		// 	echo"'
		// 	</script>";
		// }
		$cate = Cate::find($id);
		$cate->delete();
		return redirect()->route('admin.cate.getList')->with(['flash_message' => 'Đã xóa thành công']);
		
	}

}
