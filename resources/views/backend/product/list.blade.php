@extends('backend.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0; ?>
        @foreach ($products as $product)
        <?php $stt = $stt + 1; ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }} VND</td>
            <td>{{ $product['created_at'] }}</td>
            <!-- <td>
                <?php //$cate = DB:table('cates')->where('id',$product['cate_id'])->first(); ?>
                @if (!empty($cate['name']))
                    {!! $cate['name'] !!}
                @endif
            </td> -->
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return getDelete('Bạn có chắn chắn muốn xóa không')" href="{!! URL::route('admin.product.getDelete', $product['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $product['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()
                