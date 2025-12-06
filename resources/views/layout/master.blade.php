<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>giume</title>
    <link rel="stylesheet" href="{{asset('style/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<body>
    <header id="head" class="d-flex align-items-center justify-content-between my-4 shadow p-3 mb-5 bg-body-tertiary" style="z-index: 50;position: relative;">
        <div class="mx-4 d-flex">
            <a id="head" class="btn" href="{{route('giume.index')}}">صفحه اصلی</a>
            <a id="head" class="btn" href="{{route('giume.service')}}">خدمات</a>
            <a id="head" class="btn" href="{{route('giume.learn')}}">آموزش</a>
            <a id="head" class="btn" href="{{route('giume.about')}}">درباره</a>
        
            @guest
            <a id="head" class="btn" href="{{route('giume.login')}}">ورود / ثبت نام</a>
            @endguest
            @auth 
                <form action="{{route('giume.logout')}}" method="POST">
                    @csrf
                    <button id="head" class="btn" type = "submit">خروج</button>
                </form>
            @endauth
        </div>
        <div class="mx-4">
            <span class="mx-5">
                <a id="head" class="btn" href="{{route('giume.panel')}}">
                @auth
                    {{auth()->user()->name}}
                    خوش آمدید
                @endauth </a>
            </span>
            <span>giume logo</span>
        </div>
    </header>

    @yield('content')
    <footer id="head" class="d-flex justify-content-between mt-4 pt-4 shadow p-3 mt-5 bg-body-tertiary">
        <div class="mx-4 w-25">
            <span class="text-bold">چند خط درباره گیومه</span>
            <div id="text" class="my-4">گیومه ، با افتخار از سال 1400 با هدف گسترش بستر دیجیتال مارکتینگ و ارائه خدمات این حوزه در قم شروع به فعالیت کرد ، از جمله فعالیت های وبینو می توان به طراحی سایت و اپلیکیشن ، طراحی انواع لوگو ، تیزر تبلیغاتی ، سئو و مدیریت و تعیین استراتژی در شبکه های اجتماعی اشاره کرد</div>
        </div>
        <div class="mx-4">
            <span>لینک های مهم</span>
            <div class="mt-4" id="text">صفحه اصلی</div>
            <div id="text" class="mt-2">خدمات </div>
            <div id="text" class="mt-2">درباره</div>
        </div>
        <div class="mx-4">
            <span>خدمات</span>
            <div class="mt-4" id="text">طراحی سایت</div>
            <div id="text" class="mt-2">طراحی لوگو</div>
            <div id="text" class="mt-2">تولید محتوا</div>
            <div id="text" class="mt-2">تدوین</div>
        </div>
        <div class="mx-4">
            <span>ارتباط با ما</span>
            <div id="text" class="mt-4">آدرس : قم، پردیسان، دانشگاه پویش</div>
            <div id="text" class="mt-2">تلفن :0912 222 2222</div>
            <div id="text" class="mt-2">test@giume.ir</div>
        </div>
    </footer>
    <script src="{{asset('script/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>