@extends('backend.master')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0  ?>
        @foreach ($listUser as $value)
        <?php $stt = $stt + 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $value['username'] }}</td>
            <td>{{ ($value['level'] == 1) ? 'SuperAdmin' : 'Member' }}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return getDelete('Bạn có chắn chắn muốn xóa không')" href="{!! URL::route('admin.user.getDelete', $value['id']) !!}">Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit', $value['id']) !!}">Sửa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection()