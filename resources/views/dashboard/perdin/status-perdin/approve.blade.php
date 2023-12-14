<div class="modal fade" id="approve-{{ $data_perdin->slug }}">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Perjalanan Data Dinas</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				
				<div class="py-2">
					<form action="{{ route('status-perdin.approve', $data_perdin->status_id) }}" method="post" class="d-inline">
						@method('put')
						@csrf
						
						<div class="row">
							<div class="col-2">
								<div class="d-grid gap-2">
									<button class="btn btn-success">
										<i class="fa fa-times"></i>
										Setuju
									</button>
								</div>
							</div>
							<div class="col-10"></div>
						</div>
					</form>
				</div>
				
				<div class="py-2">
					<form action="{{ route('status-perdin.tolak', $data_perdin->status_id) }}" method="post" class="d-inline">
						@method('put')
						@csrf
						
						<div class="row">
							<div class="col-2">
								<div class="d-grid gap-2">
									<button class="btn btn-danger">
										<i class="fa fa-times"></i>
										Tolak
									</button>
								</div>
							</div>
							<div class="col-10">
								<input name="alasan_tolak" type="text" class="form-control" id="alasan_tolak" placeholder="Masukan alasan_tolak" required>
							</div>
						</div>
					</form>
				</div>
				
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>