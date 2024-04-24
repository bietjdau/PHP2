@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách danh mục</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p> --}}
    <div class="mb-3 mt-3">
        {{-- <button type="button" class="btn btn-primary">Primary</button> --}}
        <a href="/admin/category/create" class="btn btn-primary">Thêm mới</a>
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
                            <th>id</th>
                            <th>name</th>
                            <th>action</th>
                            {{-- <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>action</th>
                            {{-- <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td>
                                    <a href="/admin/category/{{ $category['id'] }}/update" class="btn btn-warning">Cập
                                        nhật</a>
                                    <a href="/admin/category/{{ $category['id'] }}/show" class="btn btn-info">Xem chi
                                        tiết</a>
                                    <a href="#"
                                        onclick="xoaKhong('/admin/category/{{ $category['id'] }}/delete')" class="btn btn-danger">Xóa</a>
                                </td>
                                {{-- <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
