@extends('frontend.templates.default')
@section('content')
<section id="about" class="w-screen mx-auto py-2 gradient">
    <!-- sambutan -->
    <div class="px-16 py-3 text-center text-blue">
        <h1 class="w-full text-5xl font-bold "></h1>

        {{-- <h2 class="text-3xl font-bold mb-2 ">
            COFFEE JAVA
        </h2> --}}
        <div class="mb-4">
            <div class="bg-pink-500 w-2/3 md:w-1/6 opacity-75 rounded h-1 mx-auto"></div>
        </div>
        <h3 class="text-lg font-bold mb-2">

        </h3>
        <div class="w-full">
            <div class="px-4 py-4 ">
                <!-- source image baby.jpg didownload dari situs unsplash.com, koleksi Troy T - @ttcollect -->
                <img src="{{ url('/images/defau.png' )}}" class="w-fill rounded-lg mx-auto text-center">
            </div>
        </div>
    </div>
    <!-- box portofolio -->
</section>
@endsection

