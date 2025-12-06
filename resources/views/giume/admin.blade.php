@extends('layout.master')

@section('content')
<div class="container shadow p-4">
    <h2>پنل ادمین</h2>
    <hr>
    <div class=" my-5">
            <h4 class="text-primary my-4">مدیریت کاربران :</h4>
            <table class="table table-bordered">
                <th>
                    نام کاربر
                </th>
                <th>
                    شماره کاربر
                </th>
                <th>
                    عملیات
                </th>
            @foreach($member as $member)
                <tr> <td>{{$member->id}} - {{$member->name}} </td>
                 <td>{{$member->phone_number}}</td>
                 <td>
                    <div class="d-flex">
                    <form action="{{route('giume.admin.remove' , [$member->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type = "submit" class ="btn btn-danger">حذف</button>
                    </form>
                    @if(!$member->admin)
                    <form action="{{route('giume.admin.update', [$member->id])}}" method="POST">
                    @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <button type = "submit" class ="btn btn-primary mx-2">ادمین</button>
                    </form>
                    @endif
                    @if($member->admin)
                    <form action="{{route('giume.admin.gate', [$member->id])}}" method="POST">
                    @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <button type = "submit" class ="btn btn-primary mx-2">کاربر</button>
                    </form>
                    @endif
                    </div>
                 </td>
                </tr>
            @endforeach
            </table>
        
    </div>
    <hr>
    <div>
        <h4 class="text-primary my-4">مدیریت سرویس ها :</h4>
        <table class="table table-bordered">
            <th>نام سرویس</th>
            <th>ارزش سرویس</th>
            <th>عملیات</th>
            @foreach($types as $service)
            <tr>
                <td>{{$service->id}} - {{$service->service_name}} </td>
                <td>{{$service->service_price}}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{route('giume.admin.delete' , [$member->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type = "submit" class ="btn btn-danger">حذف</button>
                        </form>
                        <a class="btn btn-primary mx-2" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#deleteModal2">ویرایش</a>
                        
                    </div>
                </td>
             
            </tr>
            @endforeach
        </table>
            <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModallable2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">ویرایش</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('giume.admin.edit', [$member->id])}}" method="POST">
                                            @csrf
                                            <label for="">نام سرویس :</label><br>
                                            <input type="text" name = "name" ><br>
                                            <label for="">قیمت سرویس</label><br>
                                            <input type="text" name="price"><br>
                                            
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type = "submit" class ="btn btn-primary mx-2 mt-5">ویرایش</button>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                         </div>
                        
    </div>
        <hr>
        <div>
            <h4 class="text-primary my-4"> درخواست های کاربران :</h4>
            <table class="table table-bordered">
                <th>نام کاربر</th>
                <th>شماره همراه کاربر</th>
                <th>سرویس درخواستی</th>
                <th>عملیات</th>
                @php
                $i = 0;
                @endphp
                @foreach($name as $services)
                <tr>
                    <td>{{$services->name}}</td>
                    <td>{{$services->phone_number}}</td>
                    <td>{{$serviceName[$i]->service_name}}</td>
                    <td><form action="{{route('giume.admin.update-serv', [$services->id])}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type = "submit" class ="btn btn-primary mx-2">اتمام سرویس</button>
                        </form></td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
            </table>
        </div>
        <hr>
        <div>
            <h4 class="text-primary my-4">مدیریت نظرات کاربران :</h4>
            <table class="table table-bordered">
                <th>نام کاربر</th>
                <th>متن نظر</th>
                <th>عملیات</th>
                @php
                $i=0
                @endphp
                @foreach($comment as $comments)
                <tr>
                    <td>{{$authr[$i]->name}}</td>
                    <td>{{$comments->description}}</td>
                    <td>
                        <div class="d-flex">
                        <form action="{{route('giume.comment.remove' , [$comments->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type = "submit" class ="btn btn-danger">حذف</button>
                        </form>
                        <form action="{{route('giume.comment.update', [$comments->id])}}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type = "submit" class ="btn btn-primary mx-2">تایید</button>
                        </form>
                        </div>
                        </td>
                </tr>
                @php
                $i++
                @endphp
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection