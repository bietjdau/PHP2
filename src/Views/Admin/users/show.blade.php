@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Chi tiết người dùng :{{$user['name']}}</h1>
   <div class="row">
        <table class="table">
            <tr>
                <td>Trường dữ liệu</td>
                <td>Giá trị</td>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$user['id']}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$user['name']}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user['email']}}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{$user['password']}}</td>
            </tr>
        </table>
   </div>
</div>
@endsection