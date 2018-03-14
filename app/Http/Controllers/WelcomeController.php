<?php namespace App\Http\Controllers;
use DB;
use Cart;
use App\Cate;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
		//dd($product);
		return view('frontend.pages.index', compact('product'));
	}

	// Lấy ra loại sản phẩm
	public function loaiSanPham ($id)
	{
		$productCate   = DB::table('products')->select('id','name','image','price','alias','cate_id');
		if (request()->has('search')) {
            $search = trim(request()->get('search'));
            $productCate = $productCate->where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
        	$productCate = $productCate->where('cate_id',$id)->get();
        }
		$productLatest = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(3)->get();
		$productBest = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(3)->get();
		$productImage = DB::table('products')->select('id','name','image')->orderBy('id','DESC')->skip(0)->take(2)->get();

		return view('frontend.pages.category', compact('productCate','productLatest','productBest','productImage'));
	}

	// Lấy ra chi tiết sản phẩm
	public function chiTietSanPham ($id)
	{
		$detailProduct = DB::table('products')->where('id',$id)->first();
		$productLatest = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
		return view('frontend.pages.product', compact('detailProduct','productLatest'));
	}

	// Liên Hệ
	public function lienHe ()
	{
		return view('frontend.pages.contact');
	}

	// Search AutoComplete
	public function searchAutoComplete (Request $request) {
		$term = $request->term;
		$data = Cate::where('name','LIKE','%'.$term.'%')->take(10)->get();
		$result = array();
		foreach ($data as $value) {
			$result[] = ['id'=>$value->id,'value'=>$value->name];
		}
		return response()->json($result);
	}
}
