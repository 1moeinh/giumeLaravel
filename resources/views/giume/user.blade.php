@extends('layout.master')

@section('content')
<div class="container shadow p-4">
    <h3>پروفایل کاربر</h3>
    <hr>
    <div class="d-flex align-items-center justify-content-between">
        <div class="m-5">
            <span>نام کاربر :</span>
            <p>{{$userpanel->name}}</p>
        </div>
        <div class="m-5">
            <span>شماره تلفن :</span>
            <p>{{$userpanel->phone_number}}</p>
        </div>
        <div>
            <a class="btn btn-primary mx-2 p-2" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#deleteModal2">ویرایش اطلاعات</a>
        </div>
        
    </div>
    <hr>
    
    <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModallable2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">ویرایش</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('giume.panel.edit', [$userpanel->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="">نام جدید :</label><br>
                                            <input type="text" name = "name" ><br>
                                            <label for=""> شماره همراه :</label><br>
                                            <input type="text" name="phone"><br>
                                            <button type = "submit" class ="btn btn-primary mx-2 mt-5">ویرایش</button>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                         </div>
    <table  class="table table-bordered mt-3">
        <h3 class="mt-5">خدمات دریافت شده کاربر</h3>
        <th>نام خدمت</th>
        <th>بهای خدمت </th>
        <th>توضیحات</th>
        @foreach($products as $product)
            <tr>
                <td>{{$product->service_name}}</td>
                <td>{{$product->service_price}}</td>
                <td>{{$product->description}}</td>
            </tr>
        @endforeach
        
    </table>
</div>
@endsection