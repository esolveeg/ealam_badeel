<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> الإعلام البديل</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> --}}
        @stack('css')

    </head>
    <body>
    <div class="preloader"><img src="{{loadImage('loader.gif')}}" alt="loader"></span></div>
        <div id="app">
            @include('layouts.header')
            @include('layouts.nav')
            <main>
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            //after window is loaded completely 
            window.onload = function(){
                //hide the preloader
                document.querySelector(".preloader").style.display = "none";
            }
            const nav= document.querySelector('.nav')
            const toggler = document.querySelector('.menue-toggler')
            const close = document.querySelector('.mobile-close')
            
            toggler.addEventListener('click' , () => {
                nav.classList.toggle('open')
            })
            close.addEventListener('click' , () => {
                nav.classList.remove('open')
            })
        </script>
        
        @stack('js')
    </body>

</html>
