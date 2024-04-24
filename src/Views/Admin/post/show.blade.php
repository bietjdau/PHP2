@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="/admin/post" class="btn btn-primary">Danh sách</a>
        <h1>Chi tiết bài viết :{{ $post['title'] }}</h1>
        <div class="row">
            <table class="table">
                <tr>
                    <td>Trường dữ liệu</td>
                    <td>Giá trị</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $post['id'] }}</td>
                </tr>
                <tr>
                    <td>title</td>
                    <td>{{ $post['title'] }}</td>
                </tr>
                <tr>
                    <td>excerpt</td>
                    <td>{{ $post['excerpt'] }}</td>
                </tr>
                <tr>
                    <td>content</td>
                    <td>
                        {!! $post['content'] !!}
                    </td>

                </tr>
                <tr>
                    <td>image</td>
                    <td><img src="{{ $post['image'] }}" width="100" alt=""></td>
                </tr>
                <tr>
                    <td>category_id</td>
                    <td>{{ $post['category_id'] }}</td>
                </tr>
                <tr>
                    <td>category_name</td>
                    <td>{{ $post['category_name'] }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container">
         <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách bình luận</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
          For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
              DataTables documentation</a>.</p> --}}
    <div class="mb-3 mt-3">
        {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
        {{-- <a href="/admin/post/create" class="btn btn-primary">Thêm mới</a> --}}
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>date</th>
                            <th>action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment['id'] }}</td>
                                <td>{{ $comment['name'] }}</td>
                                <td>{{ $comment['email'] }}</td>
                                <td>{{ $comment['message'] }}</td>
                                <td>{{ $comment['date'] }}</td>
                                <td>
                                    <a href="#" onclick="xoaKhong('/admin/post/{{ $post['id'] }}/show/comment/{{ $comment['id'] }}/delete')"
                                        class="btn btn-danger">Xóa</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection
