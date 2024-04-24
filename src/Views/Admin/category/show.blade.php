@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Chi tiết Danh mục: {{ $category['name'] }}</h1>

        <div class="row">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Gía trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $category['id'] }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $category['name'] }}</td>
                </tr>
            </table>
            <a href="/admin/category" class="btn btn-warning">Danh sách Danh mục</a>
        </div>
    </div>
@endsection
