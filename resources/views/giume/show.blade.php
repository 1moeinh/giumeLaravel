@extends('layout.master')

@section('content')

    <div class="container shadow p-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 >
                {{$show->service_name}}
            </h3>
            <div id="text" class="pb-3">
                {{$show->service_price}} تومان
            <br>
                <br>
                {{$show->description}}
            </div>
            <form class=" text-start" action="{{ route('giume.req') }}" method="POST">
                @csrf
                <p >برای ثبت سفارش سرویس,درخواست خود را ثبت کنید</p>
                <input type="hidden" name="id" value="{{ $show->id }}">
                <input type="hidden" name="userid" value="{{ Auth::id() }}">
                <button class="btn btn-outline-primary" type="submit">درخواست سرویس</button>
            </form>
           
        </div>
        <img src="{{$show->photo}}" width="600">
    </div>
    <div class="container shadow p-4 mt-5">
        <h3>نظرات کاربران</h3>
        <table class="table table-bordered mt-3">
        <th>نام :</th>
        <th class="d-flex justify-content-between align-items-center"> متن نظر
            <a class="btn btn-primary mx-2" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#deleteModal2">ایجاد نظر</a>
            </th>
            
            
            @php
                $i=0
            @endphp
            @foreach($comment as $comments)
            <tr>
                <td>{{$authr[$i]->name}}</td>
                <td>{{$comments->description}}</td>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
        </table>
        
                        <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModallable2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">ایجاد نظر</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{route('giume.comment.create')}}" method="POST">
                                            @csrf
                                            <label for="">نام کاربر :</label><br>
                                            <input disabled class="col-6 mx-5 " type="text" value="{{$user->name}}"><br>
                                            <input type="hidden" name="contact" value="{{$user->id}}">
                                            <label for="">متن نظر</label><br>
                                            <textarea class="form-control" name="description" rows="4"></textarea><br>
                                            <input type="hidden" name="type" value="{{$show->id}}">
                                            <button type = "submit" class ="btn btn-primary mx-2 mt-5">ایجاد نظر</button>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                         </div>
    </div>


@endsection