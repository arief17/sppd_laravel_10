@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('biaya-perdin.index') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table mg-b-0 text-md-nowrap border-bottom">
						<tr>
							<th style="white-space: nowrap; width: 1%;">Jenis Perdin:</th>
							<td>{{ $biaya_perdin->jenis_perdin->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Dari:</th>
							<td>{{ $biaya_perdin->dari->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Ke:</th>
							<td>{{ $biaya_perdin->ke->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Transport:</th>
							<td>{{ $biaya_perdin->transport->nama }}</td>
						</tr>
						<tr>
							<th style="white-space: nowrap; width: 1%;">Harian:</th>
							<td>{{ $biaya_perdin->harian->nama }}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<a class="btn btn-info me-2" href="{{ route('biaya-perdin.edit', $biaya_perdin->slug) }}">
					<i class="fas fa-pencil-alt"></i>
					Edit
				</a>
				<form action="{{ route('biaya-perdin.destroy', $biaya_perdin->slug) }}" method="post" class="d-inline">
					@method('delete')
					@csrf
					<button class="btn btn-danger" id='deleteData' data-title="{{ $biaya_perdin->nama }}">
						<i class="fas fa-trash"></i>
						Delete
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!-- Sweet-alert js  -->
<script src="/assets/plugins/sweet-alert/sweetalert2.all.min.js"></script>

<script>
	$(document).ready(function() {
		$('#deleteData').click(function(e) {
			e.preventDefault();
			var title = $(this).data('title');
			
			Swal.fire({
				title: 'Hapus ' + title + '?',
				html: "Apakah kamu yakin ingin menghapus <b>" + title + "</b>? Data yang sudah dihapus tidak bisa dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$(this).closest('form').submit();
				}
			});
		});
	});
</script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!-- Eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

@endsection