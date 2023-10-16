@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				<h4 class="card-title mb-1">{{ $title }}</h4>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('data-perdin.show', $data_perdin->slug) }}" method="post">
					@csrf
					@method('put')
					
					<div class="form-group">
						<label for="surat_dari">Surat Dari</label>
						<input name="surat_dari" value="{{ old('surat_dari', $data_perdin->surat_dari) }}" type="text" class="form-control @error('surat_dari') is-invalid @enderror" id="surat_dari" placeholder="Masukan surat_dari">
						@error('surat_dari')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="tgl_surat">Tanggal Surat</label>
						<input name="tgl_surat" value="{{ old('tgl_surat', $data_perdin->tgl_surat) }}" type="date" class="form-control @error('tgl_surat') is-invalid @enderror" id="tgl_surat" placeholder="Masukan tgl_surat">
						@error('tgl_surat')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="perihal">Perihal</label>
						<input name="perihal" value="{{ old('perihal', $data_perdin->perihal) }}" type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" placeholder="Masukan perihal">
						@error('perihal')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="tgl_berangkat">Tanggal Berangkat</label>
						<input name="tgl_berangkat" value="{{ old('tgl_berangkat', $data_perdin->tgl_berangkat) }}" type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" id="tgl_berangkat" placeholder="Masukan tgl_berangkat">
						@error('tgl_berangkat')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="lama">Lama</label>
						<input name="lama" value="{{ old('lama', $data_perdin->lama) }}" type="number" class="form-control @error('lama') is-invalid @enderror" id="lama" placeholder="Masukan lama">
						@error('lama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="lokasi_id" class="form-label">Lokasi</label>
						<select name="lokasi_id" id="lokasi_id" class="form-control form-select @error('lokasi_id') is-invalid @enderror">
							<option value="">Pilih Lokasi</option>
							@foreach ($lokasis as $lokasi)
							<option value="{{ $lokasi->id }}" @selected(old('lokasi_id', $data_perdin->lokasi_id) == $lokasi->id)>
								{{ $lokasi->nama }}
							</option>
							@endforeach
						</select>
						@error('lokasi_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="jumlah_pegawai">Jumlah Pegawai</label>
						<input name="jumlah_pegawai" value="{{ old('jumlah_pegawai', $data_perdin->jumlah_pegawai) }}" type="number" class="form-control @error('jumlah_pegawai') is-invalid @enderror" id="jumlah_pegawai" placeholder="Masukan jumlah_pegawai">
						@error('jumlah_pegawai')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="biaya">Biaya</label>
						<input name="biaya" value="{{ old('biaya', $data_perdin->biaya) }}" type="number" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="Masukan biaya">
						@error('biaya')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="form-group mb-0 mt-3 justify-content-end">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-secondary ms-3">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="ti-angle-double-up"></i></a>

<!-- JQuery min js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>

<!--Internal  Datepicker js -->
<script src="/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

<!-- Bootstrap Bundle js -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Moment js -->
<script src="/assets/plugins/moment/moment.js"></script>

<!--Internal  jquery.maskedinput js -->
<script src="/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

<!--Internal  spectrum-colorpicker js -->
<script src="/assets/plugins/spectrum-colorpicker/spectrum.js"></script>

<!-- Internal Select2.min js -->
<script src="/assets/plugins/select2/js/select2.min.js"></script>

<!--Internal Ion.rangeSlider.min js -->
<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!--Internal  jquery-simple-datetimepicker js -->
<script src="/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

<!-- Ionicons js -->
<script src="/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

<!--Internal  pickerjs js -->
<script src="/assets/plugins/pickerjs/picker.min.js"></script>

<!--internal color picker js-->
<script src="/assets/plugins/colorpicker/pickr.es5.min.js"></script>
<script src="/assets/js/colorpicker.js"></script>

<!--Bootstrap-datepicker js-->
<script src="/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- Rating js-->
<script src="/assets/plugins/ratings-2/jquery.star-rating.js"></script>
<script src="/assets/plugins/ratings-2/star-rating.js"></script>

<!-- P-scroll js -->
<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Sidebar js -->
<script src="/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>
<script src="/assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- eva-icons js -->
<script src="/assets/js/eva-icons.min.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!--themecolor js-->
<script src="/assets/js/themecolor.js"></script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<!-- Internal form-elements js -->
<script src="/assets/js/form-elements.js"></script>
@endsection