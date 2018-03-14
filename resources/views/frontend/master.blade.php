<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Fashion</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{!! url('frontend/css/bootstrap.css') !!}" rel="stylesheet">
<link href="{!! url('frontend/css/bootstrap-responsive.css') !!}" rel="stylesheet">
<link href="{!! url('frontend/css/style.css') !!}" rel="stylesheet">
<link href="{!! url('frontend/css/flexslider.css') !!}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{!! url('frontend/css/jquery.fancybox.css') !!}" rel="stylesheet">
<link href="{!! url('frontend/css/cloud-zoom.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1435020349870744";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<!-- Header Start -->
<header>
  <div class="headerstrip">
    <div class="container">
      <div class="row">
        <div class="span12">
          <a href="{{ url('/') }}" class="logo pull-left"><img src="{!! url('frontend/img/logof.png') !!}" alt="SimpleOne" title="SimpleOne"></a>
          <!-- Top Nav Start -->
          <div class="pull-left">
            <div class="navbar" id="topnav">
              <div class="navbar-inner">
                <ul class="nav" >
                  <li><a class="home active" href="{{ url('/') }}">Trang Chủ</a>
                  </li>
                  <li><a class="myaccount" href="#">Tài Khoản</a>
                  </li>
                  <li><a class="shoppingcart" href="#">Giỏ Hàng</a>
                  </li>
                  <li><a class="checkin" href="#">Đăng Nhập</a>
                  </li>
                  <li><a class="checkout" href="#">Đăng Xuất</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Top Nav End -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <div id="categorymenu">
      <nav class="subnav">
        <ul class="nav-pills categorymenu">
          <li><a href="{{ url('/') }}">Trang chủ</a></li>
          <?php 
            $menuLevelOne = DB::table('cates')->where('parent_id', 0)->get();
          ?>
          @foreach ($menuLevelOne as $menuOne)
          <li><a href="#">{{ $menuOne->name }}</a>
            <div>
              <ul>
                <?php
                  $menuLevelTwo = DB::table('cates')->where('parent_id', $menuOne->id)->get();
                ?>
                @foreach ($menuLevelTwo as $menuTwo)
                <li><a href="{{ url('loai-san-pham',[$menuTwo->id,$menuTwo->alias]) }}">{!! $menuTwo->name !!}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </li>
          @endforeach
          <li><a href="{{ url('lien-he') }}">Liên Hệ</a>
          </li>  
          <li style="float: right;">
            <form class="navbar-form navbar-left" action="{{ URL::route('loaisanpham') }}">
                <div class="form-group">
                  <input style="" type="text" name="searchname" id="searchname" class="form-control" placeholder="Tìm kiếm">
                  <input type="submit" name="search">
                </div>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- Header End -->

<!-- Content -->
  @yield('content')
<!-- End Content -->
<!-- Footer -->
<footer id="footer">
  <section class="footersocial">
    <div class="container">
      <div class="row">
        <div class="span3 aboutus">
          <h2>Giới Thiệu </h2>
          <p> Là một xưởng may, website lớn chuyên về váy đầmcông sở và thời trang. Chúng tôi ra đời cách đây hơn 5 năm về trước và đã có những uy tín nhất định về váy đầm thời trang tại thị trường Việt Nam. <br>
          <br>
          . </p>
        </div>
        <div class="span3 contact">
          <h2>Liên Hệ </h2>
          <ul>
            <li class="phone"> +84 1672 888 150</li>
            <li class="mobile"> +123 456 7890, +123 456 78900</li>
            <li class="email"> thevindev@gmail.com</li>
            <li class="email"> test@test.com</li>
          </ul>
        </div>
        <div class="span3 twitter">
          <h2>Twitter </h2>
          <div id="twitter">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footerlinks">
    <div class="container">
      <div class="info">
        <ul>
          <li><a href="#">Privacy Policy</a>
          </li>
          <li><a href="#">Terms &amp; Conditions</a>
          </li>
          <li><a href="#">Affiliates</a>
          </li>
          <li><a href="#">Newsletter</a>
          </li>
        </ul>
      </div>
      <div id="footersocial">
        <a href="#" title="Facebook" class="facebook">Facebook</a>
        <a href="#" title="Twitter" class="twitter">Twitter</a>
        <a href="#" title="Linkedin" class="linkedin">Linkedin</a>
        <a href="#" title="rss" class="rss">rss</a>
        <a href="#" title="Googleplus" class="googleplus">Googleplus</a>
        <a href="#" title="Skype" class="skype">Skype</a>
        <a href="#" title="Flickr" class="flickr">Flickr</a>
      </div>
    </div>
  </section>
  <section class="copyrightbottom">
    <div class="container">
      <div class="row">
        <div class="span6"> All images are copyright to their owners. </div>
        <div class="span6 textright"> ShopSimple @ 2016 </div>
      </div>
    </div>
  </section>
  <a id="gotop" href="http://www.mafiashare.net">Back to top</a>
</footer>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! url('frontend/js/jquery.js') !!}"></script>
<script src="{!! url('frontend/js/bootstrap.js') !!}"></script>
<script src="{!! url('frontend/js/respond.min.js') !!}"></script>
<script src="{!! url('frontend/js/application.js') !!}"></script>
<script src="{!! url('frontend/js/bootstrap-tooltip.js') !!}"></script>
<script defer src="{!! url('frontend/js/jquery.fancybox.js') !!}"></script>
<script defer src="{!! url('frontend/js/jquery.flexslider.js') !!}"></script>
<script type="text/javascript" src="{!! url('frontend/js/jquery.tweet.js') !!}"></script>
<script  src="{!! url('frontend/js/cloud-zoom.1.0.2.js') !!}"></script>
<script  type="text/javascript" src="{!! url('frontend/js/jquery.validate.js') !!}"></script>
<script type="text/javascript"  src="{!! url('frontend/js/jquery.carouFredSel-6.1.0-packed.js') !!}"></script>
<script type="text/javascript"  src="{!! url('frontend/js/jquery.mousewheel.min.js') !!}"></script>
<script type="text/javascript"  src="{!! url('frontend/js/jquery.touchSwipe.min.js') !!}"></script>
<script type="text/javascript"  src="{!! url('frontend/js/jquery.ba-throttle-debounce.min.js') !!}"></script>
<script defer src="{!! url('frontend/js/custom.js') !!}"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function()
{  
    $("#searchname").autocomplete({
        source : '{!! URL::route('AutoComplete') !!}',
        minlenght:1,
        autoFocus:true,
        select:function(e,ui) {
      
        }
    })
});
</script>
</body>
</html>