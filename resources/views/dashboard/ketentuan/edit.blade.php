@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				<h4 class="card-title mb-1">{{ $title }}</h4>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('ketentuan.show', $ketentuan->slug) }}" method="post">
					@csrf
					@method('put')
					
					<div class="form-group">
						<label for="kegiatan" class="form-label">Uang Harian</label>
						<select name="kegiatan" id="kegiatan" class="form-control form-select @error('kegiatan') is-invalid @enderror">
							<option value="">Pilih Uang Harian</option>
							@foreach ($kegiatans as $kegiatan)
							<option value="{{ $kegiatan->id }}" @selected(old('kegiatan', $ketentuan->kegiatan) == $kegiatan->id)>
								{{ $kegiatan->nama }}
							</option>
							@endforeach
						</select>
						@error('kegiatan')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="kode_rek_dalam_daerah">Nama</label>
						<input name="kode_rek_dalam_daerah" value="{{ old('kode_rek_dalam_daerah', $ketentuan->kode_rek_dalam_daerah) }}" type="text" class="form-control @error('kode_rek_dalam_daerah') is-invalid @enderror" id="kode_rek_dalam_daerah" placeholder="Masukan kode_rek_dalam_daerah">
						@error('kode_rek_dalam_daerah')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="kode_rek_luar_daerah">Nama</label>
						<input name="kode_rek_luar_daerah" value="{{ old('kode_rek_luar_daerah', $ketentuan->kode_rek_luar_daerah) }}" type="text" class="form-control @error('kode_rek_luar_daerah') is-invalid @enderror" id="kode_rek_luar_daerah" placeholder="Masukan kode_rek_luar_daerah">
						@error('kode_rek_luar_daerah')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="pptk" class="form-label">Uang Harian</label>
						<select name="pptk" id="pptk" class="form-control form-select @error('pptk') is-invalid @enderror">
							<option value="">Pilih Uang Harian</option>
							@foreach ($pegawais as $pptk)
							<option value="{{ $pptk->id }}" @selected(old('pptk', $ketentuan->pptk) == $pptk->id)>
								{{ $pptk->nama }}
							</option>
							@endforeach
						</select>
						@error('pptk')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="bendahara" class="form-label">Uang Harian</label>
						<select name="bendahara" id="bendahara" class="form-control form-select @error('bendahara') is-invalid @enderror">
							<option value="">Pilih Uang Harian</option>
							@foreach ($pegawais as $bendahara)
							<option value="{{ $bendahara->id }}" @selected(old('bendahara', $ketentuan->bendahara) == $bendahara->id)>
								{{ $bendahara->nama }}
							</option>
							@endforeach
						</select>
						@error('bendahara')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="pelaksana_administrasi" class="form-label">Uang Harian</label>
						<select name="pelaksana_administrasi" id="pelaksana_administrasi" class="form-control form-select @error('pelaksana_administrasi') is-invalid @enderror">
							<option value="">Pilih Uang Harian</option>
							@foreach ($pegawais as $pelaksana_administrasi)
							<option value="{{ $pelaksana_administrasi->id }}" @selected(old('pelaksana_administrasi', $ketentuan->pelaksana_administrasi) == $pelaksana_administrasi->id)>
								{{ $pelaksana_administrasi->nama }}
							</option>
							@endforeach
						</select>
						@error('pelaksana_administrasi')
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