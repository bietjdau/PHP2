@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Thêm mới bài viết</h1>

        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category_id" class="form-control" id="category">
                        <option value=""></option>
                        @foreach ($category as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter name" name="title"
                        required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="excerpt" class="form-label">excerpt:</label>
                    <input type="text" class="form-control" id="excerpt" placeholder="Enter name" name="excerpt"
                       >
                </div>
                <div class="mb-3 mt-3">
                    <label for="content" class="form-label">content:</label>
                    <textarea  name="content1" id="noidung" required  cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="image" class="form-label">Ảnh:</label>
                    <input type="file" class="form-control" id="image" placeholder="Enter name" name="image"
                        required>
                </div>
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="/admin/post" class="btn btn-primary">Danh sách</a>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('content1');
    </script>

@endsection
