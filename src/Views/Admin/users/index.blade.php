@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Danh sách người dùng</h1>
        <a href="/admin/users/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>password</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td>
                                <a href="/admin/users/{{ $user['id'] }}/update" class="btn btn-warning">Cập nhật</a>
                                <a href="/admin/users/{{ $user['id'] }}/show" class="btn btn-info">Xem chi tiết</a>
                                <a href="/admin/users/{{ $user['id'] }}/delete"
                                    onclick="return confirm('Có chắc xóa không')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
