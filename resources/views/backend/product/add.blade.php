@extends('backend.master')
@section('controller','Product')
@section('action','Add')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <!-- hiện thông báo lỗi cho người dùng -->
    @include('backend.blocks.error')
    <!-- End hiện thông báo lỗi cho người dùng -->
    <form action="{{ URL::route('admin.product.postAdd') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                <?php //cateParent($cate,0,"--",old('sltParent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea id="content-1" class="form-control" rows="3" name="txtIntro"></textarea>
            <!-- <script type="text/javascript">CKEDITOR.replace('content-1')</script> -->
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent"></textarea>
            <!-- <script type="text/javascript">ckeditor("txtContent")</script> -->
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
            <!-- <script type="text/javascript">ckeditor("txtDescription")</script> -->
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection()
                