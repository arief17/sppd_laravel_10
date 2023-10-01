@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				<h4 class="card-title mb-1">{{ $title }}</h4>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('pegawai.show', $pegawai->slug) }}" method="post">
					@csrf
					@method('put')
					
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" value="{{ old('nama', $pegawai->nama) }}" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="nip">NIP</label>
						<input name="nip" value="{{ old('nip', $pegawai->nip) }}" type="number" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan nip">
						@error('nip')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="ruang">Ruang</label>
						<input name="ruang" value="{{ old('ruang', $pegawai->ruang) }}" type="text" class="form-control @error('ruang') is-invalid @enderror" id="ruang" placeholder="Masukan ruang">
						@error('ruang')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="eselon_id" class="form-label">Eselon</label>
						<select name="eselon_id" id="eselon_id" class="form-control form-select @error('eselon_id') is-invalid @enderror">
							<option value="">Pilih Eselon</option>
							@foreach ($golongans as $eselon)
							<option value="{{ $eselon->id }}" @selected(old('eselon_id', $pegawai->eselon_id) == $eselon->id)>
								{{ $eselon->nama }}
							</option>
							@endforeach
						</select>
						@error('eselon_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="jabatan_id" class="form-label">Jabatan</label>
						<select name="jabatan_id" id="jabatan_id" class="form-control form-select @error('jabatan_id') is-invalid @enderror">
							<option value="">Pilih Jabatan</option>
							@foreach ($golongans as $jabatan)
							<option value="{{ $jabatan->id }}" @selected(old('jabatan_id', $pegawai->jabatan_id) == $jabatan->id)>
								{{ $jabatan->nama }}
							</option>
							@endforeach
						</select>
						@error('jabatan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input @error('pptk') is-invalid @enderror" type="checkbox" name="pptk" value="1" id="pptk" @checked(old('pptk', $pegawai->pptk))>
							<label class="form-check-label" for="pptk">
								PPTK
							</label>
							@error('pptk')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
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