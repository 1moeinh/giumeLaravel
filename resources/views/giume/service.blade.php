@extends('layout.master')

@section('content')

<h2 class="m-4"> خدمات گیومه</h2>
<div class="d-flex row g-3 m-4">
    <hr>
@foreach($type as $service)
<div class="col-4">
    <div class="card shadow mb-5 pb-3">
        
        <img width = "345" class="card-img-top" height = "270" src="{{$service->photo}}" alt="">
        
        <div lass="card-body">
            <a class="btn d-block fw-bold fs-5 mb-4" href="{{route('giume.show',[$service->id])}}">{{$service->service_name}}</a>
            <div class="d-flex justify-content-between m-2">
                <span  id="text">{{$service->service_price}} تومان</span>
                <a class="btn btn-outline-primary" href="{{route('giume.show',[$service->id])}}">توضیحات بیشتر</a>
            </div>
        </div>
    </div>
    </div>
    
@endforeach
</div>
@endsection