<script src="{{ asset('eshopper/js/jquery.js') }}"></script>
<script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('eshopper/js/price-range.js') }}"></script>
<script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('eshopper/js/main.js') }}"></script>

//toastr javascript
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{--toastr--}}
	<script>
		@if(Session::has('sukses'))
			toastr.success("{{Session::get('sukses')}}", "Sukses") // meenampilkan pesan yang di lempar dari controller ,,, di koneksikan ke controller delete sukses berhasil di hapus
        @endif

        @if(Session::has('info'))
			toastr.info("{{Session::get('info')}}", "Sukses") // meenampilkan pesan yang di lempar dari controller ,,, di koneksikan ke controller delete sukses berhasil di hapus
        @endif

        @if(Session::has('warning'))
			toastr.danger("{{Session::get('danger')}}", "Sukses") // meenampilkan pesan yang di lempar dari controller ,,, di koneksikan ke controller delete sukses berhasil di hapus
		@endif
	</script>
// Ajax
@stack('scripts')
