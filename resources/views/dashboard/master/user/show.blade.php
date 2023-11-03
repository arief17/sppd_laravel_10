@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header pb-0">
				<div class="d-flex justify-content-between">
					<h4 class="card-title mg-b-0">{{ $title }}</h4>
					<div>
						<a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->username) }}">
							<i class="fas fa-pencil-alt"></i>
							Edit
						</a>
						<form action="{{ route('user.destroy', $user->username) }}" method="post" class="d-inline">
							@method('delete')
							@csrf
							<button class="btn btn-danger btn-sm" id='deleteData' data-title="{{ $user->nama }}">
								<i class="fas fa-trash"></i>
								Delete
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table mg-b-0 text-md-nowrap border-bottom">
						<tr>
							<th>Nama:</th>
							<td style="width: 90%">{{ $user->nama }}</td>
						</tr>
						<tr>
							<th>Username:</th>
							<td style="width: 90%">{{ $user->username }}</td>
						</tr>
						<tr>
							<th>Email:</th>
							<td style="width: 90%">{{ $user->email }}</td>
						</tr>
						<tr>
							<th>Level Admin:</th>
							<td style="width: 90%">{{ $user->level_admin }}</td>
						</tr>
						<tr>
							<th>Seksi:</th>
							<td style="width: 90%">{{ $user->seksi }}</td>
						</tr>
						<tr>
							<th>Bidang:</th>
							<td style="width: 90%">{{ $user->bidang }}</td>
						</tr>
						<tr>
							<th>Last Login:</th>
							<td style="width: 90%">{{ $user->last_login }}</td>
						</tr>
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