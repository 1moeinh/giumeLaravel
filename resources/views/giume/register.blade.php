@extends('layout.master')



@section('content')

<div class="card shadow d-flex my-5">
    <div class = "card-header">
        <div style = "cursor : pointer;" >sign up</div>
    </div>
    <div class = "card-body m-4">
        <form action="{{route('giume.store')}}" method="POST">
            @csrf
            <div calss = "mr-4">
                <label calss="mb-2" for="user_name">نام کاربری :</label><br>
                <input type="text" required placeholder = "نام کاربری" id = "user_name" name = "name">
            </div>
            <div calss = "mr-4">
                <label calss="mb-2" for="phone_number">شماره همراه :</label><br>
                <input type="text" required placeholder = "شماره همراه" id = "phone_number" name = "phone_number">
            </div>
            <div calss = "mr-4">
                <label calss="mb-2" for="password"> رمز عبور :</label><br>
                <input type="password" required minlength="5" pattern="\d+" title="لطفا حداقل 5 رقم وارد کنید" placeholder = "رمز عبور" id = "password" name = "password">
            </div>
            <div>
                <button type = "submit" class="btn btn-primary mt-5">تایید</button>
            </div>
        </form>
    </div>

</div>
@endsection