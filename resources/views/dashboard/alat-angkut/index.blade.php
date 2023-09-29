@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center">
					<h3 class="card-title">{{ $title }}</h3>
					<a href="{{ route('alat-angkut.create') }}" class="btn btn-primary mg-l-auto">Tambah</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="file-datatable" class="border-top-0  table table-bordered text-nowrap key-buttons border-bottom">
						<thead>
							<tr>
								<th class="border-bottom-0">No</th>
								<th class="border-bottom-0" style="width: 100%">Nama</th>
								<th class="border-bottom-0">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($alat_angkuts as $alat_angkut)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $alat_angkut->nama }}</td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{ route('alat-angkut.show', $alat_angkut->slug) }}">
										<i class="fas fa-folder"></i>
										View
									</a>
									<a class="btn btn-info btn-sm" href="{{ route('alat-angkut.edit', $alat_angkut->slug) }}">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>
									<form action="{{ route('alat-angkut.destroy', $alat_angkut->slug) }}" method="post" class="d-inline">
										@method('delete')
										@csrf
										<button class="btn btn-danger btn-sm" id='swal-warning'>
											<i class="fas fa-trash"></i>
											Delete
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
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

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Internal Select2.min js -->
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<!-- DATA TABLE JS-->
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>

<!--Internal  Datatable js -->
<script src="/assets/js/table-data.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- Sweet-alert js  -->
<script src="/assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="/assets/js/sweet-alert.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<script>
	$(document).ready(function() {
		$('#swal-warning').click(function(e) {
			e.preventDefault();

			swal({
				title: "Apakah kamu yakin?",
				text: "Data yang sudah dihapus tidak dapat dikembalikan!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn btn-danger",
				cancelButtonClass: "btn btn-secondary",
				confirmButtonText: "Iya, Hapus!",
				cancelButtonText: "Batal",
				closeOnConfirm: false
			},
			function(isConfirmed) {
				if (isConfirmed) {
					$('form').submit();
				}
			});
		});
	});
</script>

@endsection