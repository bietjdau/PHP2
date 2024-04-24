@extends('layouts.master')

@section('content')
    <div class="ml-4">
        <h1>Thêm mới danh mục</h1>

        <div class="row">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/admin/category" class="btn btn-primary">Danh sách</a>

            </form>
        </div>
    </div>
@endsection
