@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Sửa danh mục : {{ $category['name'] }}</h1>
        @if (!empty($_SESSION['success']))
            <div class="alert alert-success">
                {{ $_SESSION['success'] }}
            </div>

            @php
                $_SESSION['success'] = null;
            @endphp
        @endif

        <div class="row">
            <form action="" method="POST">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                        value="{{ $category['name'] }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/admin/category" class="btn btn-primary">Danh sách</a>
            </form>
        </div>
    </div>
@endsection
