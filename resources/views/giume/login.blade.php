@extends('layout.master')



@section('content')

<div class="card shadow d-flex my-5">
    <div class = "card-header">
        <div style = "cursor : pointer;" >sign in</div>
    </div>
    <div class = "card-body m-4">
        <form action="{{route('giume.check')}}" method="POST">
            @csrf
            <div calss = "mr-4">
                <label calss="mb-2" for="phone_number">شماره همراه :</label><br>
                <input type="text" required placeholder = "شماره همراه" id = "phone_number" name = "phone_number">
            </div>
            <div calss = "mr-4">
                <label calss="mb-2" for="password">رمز عبور :</label><br>
                <input type="password" required placeholder = "رمز عبور" id = "password" name = "password">
            </div>
            <div class="d-flex justify-content-between mt-5">
                <button type = "submit" class="btn btn-primary">تایید</button>
                <a class="btn" href="{{route('giume.register')}}">آیا حساب کاربری ندارید؟</a>
            </div>
        </form>
    </div>

</div>
@endsection