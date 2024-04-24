@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách danh mục</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
          For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
              DataTables documentation</a>.</p> --}}
    <div class="mb-3 mt-3">
        {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
        <a href="/admin/post/create" class="btn btn-primary">Thêm mới</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>image</th>
                            <th>category</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>image</th>
                            <th>category</th>
                            <th>action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td>{{ $post['title'] }}</td>
                                <td><img src="{{ $post['image'] }}" alt="" width="100"></td>
                                <td>{{ $post['category_name'] }}</td>
                                <td>
                                    <a href="/admin/post/{{ $post['id'] }}/update" class="btn btn-warning">Cập
                                        nhật</a>
                                    <a href="/admin/post/{{ $post['id'] }}/show" class="btn btn-info">Xem chi
                                        tiết</a>
                                    <a href="#" onclick="xoaKhong('/admin/post/{{ $post['id'] }}/delete')"
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
