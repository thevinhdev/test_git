@extends('frontend.master')
@section('content')

<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Category</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              <li>
                <a href="category.html">Men Accessories</a>
              </li>
              <li>
                <a href="category.html">Women Accessories</a>
              </li>
              <li>
                <a href="category.html">Computers </a>
              </li>
              <li>
                <a href="category.html">Home and Furniture</a>
              </li>
              <li>
                <a href="category.html">Others</a>
              </li>
            </ul>
          </div>
         <!--  Best Seller -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
            @foreach ($productBest as $valueBest)
              <li>
                <img width="50" height="50" src="{!! asset('uploads/'.$valueBest->image) !!}" alt="product" title="product">
                <a class="productname" href="product.html">{{ $valueBest->name }}</a>
                <span class="procategory">Women Accessories</span>
                <span class="price">$ {{ $valueBest->price }}</span>
              </li>
             @endforeach
            </ul>
          </div>
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
            @foreach ($productLatest as $valueLatest)
              <li>
                <img width="50" height="50" src="{!! asset('uploads/'.$valueLatest->image) !!}" alt="product" title="product">
                <a class="productname" href="product.html">{{ $valueLatest->name }}</a>
                <span class="procategory">Women Accessories</span>
                <span class="price">$ {{ $valueLatest->price }}</span>
              </li>
             @endforeach
            </ul>
          </div>
          <!--  Must have -->  
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              @foreach ($productImage as $valueImage)
              <li>
                <img src="{!! asset('uploads/'.$valueImage->image) !!}" alt="" />
              </li>
              @endforeach
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                  @foreach ($productCate as $valueCate)
                    <li class="span3">
                      <a class="prdocutname" href="{{ url('chi-tiet-san-pham',[$valueCate->id,$valueCate->alias]) }}">{{ $valueCate->name }}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="{{ url('chi-tiet-san-pham',[$valueCate->id,$valueCate->alias]) }}"><img alt="" src="{!! asset('uploads/'.$valueCate->image) !!}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">$ {{ $valueCate->price }}</div>
                            <div class="priceold">$5000.00</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                      <li><a href="#">Prev</a>
                      </li>
                      <li class="active">
                        <a href="#">1</a>
                      </li>
                      <li><a href="#">2</a>
                      </li>
                      <li><a href="#">3</a>
                      </li>
                      <li><a href="#">4</a>
                      </li>
                      <li><a href="#">Next</a>
                      </li>
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection()  