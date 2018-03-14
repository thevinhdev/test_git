<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Cate;
use DB;

class ProductController extends Controller {

	//hàm Add
	public function getAdd () {
		// $cate = Cate::select('name','id','created_at')->get()->toArray();
		// return view('backend.product.add',compact('cate'));
		return view('backend.product.add');
	}

	public function postAdd (ProductRequest $request) {

		$fileName 			  = $request->file('fImages')->getClientOriginalName();
		$product              = new Product;
		$product->name        = $request->txtName;
		$product->alias       = changeTitle($request->txtName);
		$product->price       = $request->txtPrice;
		$product->intro       = $request->txtIntro;
		$product->content     = $request->txtContent;
		$product->image       = $fileName;
		$product->keywords    = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->user_id     = 1;
		$product->cate_id     = $request->sltParent;//var_dump($product);die;
		//$product->file('fImages')->move('public/uploads/',$fileName);
		
		$product->save();

		return redirect()->route('admin.product.getList')->with(['flash_message' => 'Thêm mới thành công']);
	}

	// hàm lấy ra danh sách category
	public function getList () {
		$products = Product::select('id','name','price','created_at','cate_id')->orderBy('id','DESC')->get()->toArray();
		return view('backend.product.list', compact('products'));
	}

	// // Hàm sửa category
	public function getEdit ($id) {
		$cate   = Cate::select('name','id','parent_id')->get()->toArray();
		$product   = Product::find($id);//dd($product);
		//$parent = Product::select('id','name','price','intro','content','keywords','description')->get()->toArray();//dd($parent);
		return view('backend.product.edit', compact('product','cate'));
	}

	public function postEdit (Request $request, $id) {
		$this->validate($request,
			["txtName" => "required"],
			["txtName.required" => "Bạn vui lòng nhập tên"]
		);
		$product              = new Product;
		$product->name        = $request->txtName;
		$product->alias       = changeTitle($request->txtName);
		$product->price       = $request->txtPrice;
		$product->intro       = $request->txtIntro;
		$product->content     = $request->txtContent;
		$product->image       = $request->fImages;
		$product->keywords    = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->user_id     = 1;
		$product->cate_id     = 1;
		$product->save();

		return redirect()->route('admin.product.getList')->with(['flash_message' => 'Cập nhật sản phẩm thành công']);
	}

	// //hàm xóa category
	public function getDelete ($id) {

		$cate = Product::find($id);
		$cate->delete();
		return redirect()->route('admin.product.getList')->with(['flash_message' => 'Đã xóa thành công']);	
	}

}
