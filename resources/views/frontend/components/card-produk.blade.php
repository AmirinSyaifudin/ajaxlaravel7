

   <div class="bg-blue px-4 py-4 m-2 shadow-lg rounded">
                <img class="img-responsive w-fill rounded-lg" src="{{url('/assets/covers/'. $pd->cover)}}"  height="200px">
                <div class="px-2 py-2 text-center">
                    <p class="fond-bold text-2xl font-bold mb-2 text-gray-900">{{ $pd->nama_produk }}</p>
                    <div class="mb-4">
                        <div class="h-1 mx-auto bg-pink-500 w-1/4 opacity-75 my-0 py-0 rounded"></div>
                    </div>
                    {{--  <p class="text-white-900 text-base font-bold"> Sistem Pendaftaran Siswa Menggunakan Laravel 5.8, Admin LTE, Bootstrap,
                    </p>  --}}
                    <p class="text-white-900 text-base font-bold"> Harga : {{ 'Rp.'. number_format ($pd->harga) . "  "  }}
                    </p>
                    <p class="text-white-900 text-base font-bold"> QTY : {{ $pd->qty }}
                    </p>
                    <p class="text-white-900 text-base font-bold"> Nama Katagori : {{ $pd->katagori_id }}
                    </p>
                </div>
                {{--  <div class="px-2 py-2 text-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 shadow-md rounded-tr-lg rounded-bl-lg">Detail</button>
                </div>  --}}
                <div class="px-2 py-2 text-center">
                    {{--  <button a href="" class="text-left bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 py-2 shadow-md rounded-tr-lg rounded-bl-lg">Detail Produk</button>  --}}
                    <a href="{{ route('produk.detail', $pd->produk_id) }}" class="text-left bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 py-2 shadow-md rounded-tr-lg rounded-bl-lg">Detail Produk</a>
                    <a href="{{ route('produk.transaksi', $pd->produk_id) }}" class="text-right bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 py-2 shadow-md rounded-tr-lg rounded-bl-lg">Order Produk</a>
                </div>
            </div>