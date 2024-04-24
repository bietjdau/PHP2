@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Sửa bài viết</h1>
        @if (!empty($_SESSION['success']))
            <div class="alert alert-success">
                {{ $_SESSION['success'] }}
            </div>

            @php
                $_SESSION['success'] = null;
            @endphp
        @endif

        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category_id" class="form-control" id="category">
                        @foreach ($category as $item)
                            <option value="{{ $item['id'] }}" {{ $post['category_id'] == $item['id'] ? 'selected' : '' }}>
                                {{ $item['name'] }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter name" name="title"
                        value="{{ $post['title'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="excerpt" class="form-label">excerpt:</label>
                    <input type="text" class="form-control" id="excerpt" placeholder="Enter name" name="excerpt"
                        value="{{ $post['excerpt'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="content" class="form-label">content:</label>
                    <textarea name="content1" required class="form-control" id="content" cols="30" rows="10">{{ $post['content'] }}</textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="image" class="form-label">Ảnh cũ:</label>
                    <img src="{{ $post['image'] }}" width="100" alt="">
                </div>
                <div class="mb-3 mt-3">
                    <label for="image" class="form-label">Ảnh:</label>
                    <input type="file" class="form-control" id="image" placeholder="Enter name" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/admin/post" class="btn btn-primary">Danh sách</a>
            </form>
        </div>
    </div>
    
    <script>
        CKEDITOR.replace('content1');
    </script>
@endsection
