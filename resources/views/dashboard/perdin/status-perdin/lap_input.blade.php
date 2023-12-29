<div class="modal fade" id="lap-input-{{ $laporan_perdin->id }}">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Laporan (ID.Reg : {{ $laporan_perdin->id }})</h6>
				<button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<iframe src="data:application/pdf;base64,{{ base64_encode(file_get_contents(storage_path('app/' . $laporan_perdin->file_laporan))) }}" width="100%" height="500px"></iframe>
			</div>
		</div>
	</div>
</div>
