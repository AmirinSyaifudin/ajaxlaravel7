<html>
<head>
    @include('frontend.templates.partials.head')
</head>

<body>
    <!--section navbar-->
    <div class="navbar-fixed">
  <section class="w-screen mx-auto px-4 gradient-nav">

        <nav class="flex flex-wrap p-6 justify-between">
            <!-- Logo -->
            <div class="flex flex-shrink-0 mr-6">
                <img src="{{ url('/images/brek.png' )}}" class="h-10 w-50 mr-2">
                {{-- <img src="{{ url('/images/brek.png' )}}" class="h-10 w-50 mr-2"> --}}
            </div>

            <!-- Menu -->
            <div class="block lg:hidden">
                <a class="flex items-center px-3 py-2 rounded border border-indigo-400 text-indigo-500 hover:text-indigo-700 hover:border-indigo-700">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </a>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                    <a href="/" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        HOME
                    </a>

                     <a href="/detail" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        DETAIL PRODUK
                    </a>

                     <a href="/transaksi" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        TRANSAKSI PRODUK
                    </a>

                    <a href="/produk" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        PRODUK
                    </a>

                    <a href="{{ route('login')}}" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        ADMIN
                    </a>

                    {{--  <button type="button" class="btn btn-danger btn-fill" data-toggle="modal" data-target="#exampleModal">VISITOR</button>  --}}
                    <a href="/customer" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        CUSTOMER
                    </a>

                    <a href="/kontak" class="block mt-4  font-bold lg:inline-block lg:mt-0 text-blue hover:text-gray-900 text-lg mr-4">
                        KONTAK
                    </a>

                </div>

                <div class="mb-4">
                    <div class=" w-2/6 md:w-1/6 opacity-75 rounded h-1 mx-auto"></div>
                </div>

                <div>
                    <a href="{{ route('register')}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 shadow-md rounded-tr-lg rounded-bl-lg gradient-ungu">
                        PENGUNJUNG
                    </a>
                </div>
            </div>
        </nav>

</section>
</div>

    <!-- end navbar -->

    <!-- section about -->
            @yield('content')
    <!-- end my recent work -->

    <!-- section contact -->
    {{--  @include('frontend.templates.layouts.contact')  --}}
    </section>
    <!-- end section contact me -->

    <!-- section footer -->
          @include('frontend.templates.partials.footer')
    <!-- end footer -->
</body>

</html>



