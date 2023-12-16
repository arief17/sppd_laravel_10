@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card box-shadow-0 ">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('uang-transport.index') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('uang-transport.index') }}" method="post">
					@csrf
					
					<div class="form-group">
						<label for="wilayah" class="form-label">Wilayah Kota Kabupaten atau Provinsi</label>
						<select name="wilayah" id="wilayah" class="form-control form-select" required>
							<option value="">Pilih Wilayah Kota Kabupaten atau Provinsi</option>
							<option value="kota_kabupaten">Kota Kabupaten</option>
							<option value="provinsi">Provinsi</option>
						</select>
					</div>
					<div id="kotaKabupatenHide" class="form-group">
						<label for="kota_kabupaten_id" class="form-label">Kota Kabupaten</label>
						<select name="kota_kabupaten_id" id="kota_kabupaten_id" class="form-control form-select @error('kota_kabupaten_id') is-invalid @enderror">
							<option value="">Pilih Kota Kabupaten</option>
							@foreach ($kota_kabupatens as $kota_kabupaten)
							<option value="{{ $kota_kabupaten->id }}" @selected(old('kota_kabupaten_id') == $kota_kabupaten->id)>
								{{ $kota_kabupaten->nama }}
							</option>
							@endforeach
						</select>
						@error('kota_kabupaten_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div id="provinsiHide" class="form-group">
						<label for="provinsi_id" class="form-label">Provinsi</label>
						<select name="provinsi_id" id="provinsi_id" class="form-control form-select @error('provinsi_id') is-invalid @enderror">
							<option value="">Pilih Provinsi</option>
							@foreach ($provinsis as $provinsi)
							<option value="{{ $provinsi->id }}" @selected(old('provinsi_id') == $provinsi->id)>
								{{ $provinsi->nama }}
							</option>
							@endforeach
						</select>
						@error('provinsi_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="alat_angkut_id" class="form-label">Alat Angkut</label>
						<select name="alat_angkut_id" id="alat_angkut_id" class="form-control form-select @error('alat_angkut_id') is-invalid @enderror">
							<option value="">Pilih Alat Angkut</option>
							@foreach ($alat_angkuts as $alat_angkut)
							<option value="{{ $alat_angkut->id }}" @selected(old('alat_angkut_id') == $alat_angkut->id) data-tiket="{{ $alat_angkut->tiket }}">
								{{ $alat_angkut->nama }}
							</option>
							@endforeach
						</select>
						@error('alat_angkut_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div id="tiketHide" class="form-group">
						<label for="harga_tiket">Harga Tiket</label>
						<input name="harga_tiket" value="{{ old('harga_tiket') }}" type="number" class="form-control @error('harga_tiket') is-invalid @enderror" id="harga_tiket" placeholder="Masukan harga_tiket">
						@error('harga_tiket')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="eselon_i">Eselon I</label>
						<input name="eselon_i" value="{{ old('eselon_i') }}" type="number" class="form-control @error('eselon_i') is-invalid @enderror" id="eselon_i" placeholder="Masukan eselon_i">
						@error('eselon_i')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="eselon_ii">Eselon II</label>
						<input name="eselon_ii" value="{{ old('eselon_ii') }}" type="number" class="form-control @error('eselon_ii') is-invalid @enderror" id="eselon_ii" placeholder="Masukan eselon_ii">
						@error('eselon_ii')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="eselon_iii">Eselon III</label>
						<input name="eselon_iii" value="{{ old('eselon_iii') }}" type="number" class="form-control @error('eselon_iii') is-invalid @enderror" id="eselon_iii" placeholder="Masukan eselon_iii">
						@error('eselon_iii')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="eselon_iv">Eselon IV</label>
						<input name="eselon_iv" value="{{ old('eselon_iv') }}" type="number" class="form-control @error('eselon_iv') is-invalid @enderror" id="eselon_iv" placeholder="Masukan eselon_iv">
						@error('eselon_iv')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="golongan_iv">Golongan IV</label>
						<input name="golongan_iv" value="{{ old('golongan_iv') }}" type="number" class="form-control @error('golongan_iv') is-invalid @enderror" id="golongan_iv" placeholder="Masukan golongan_iv">
						@error('golongan_iv')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="golongan_iii">Golongan III</label>
						<input name="golongan_iii" value="{{ old('golongan_iii') }}" type="number" class="form-control @error('golongan_iii') is-invalid @enderror" id="golongan_iii" placeholder="Masukan golongan_iii">
						@error('golongan_iii')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="golongan_ii">Golongan II</label>
						<input name="golongan_ii" value="{{ old('golongan_ii') }}" type="number" class="form-control @error('golongan_ii') is-invalid @enderror" id="golongan_ii" placeholder="Masukan golongan_ii">
						@error('golongan_ii')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="golongan_i">Golongan I</label>
						<input name="golongan_i" value="{{ old('golongan_i') }}" type="number" class="form-control @error('golongan_i') is-invalid @enderror" id="golongan_i" placeholder="Masukan golongan_i">
						@error('golongan_i')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="non_asn">Non ASN</label>
						<input name="non_asn" value="{{ old('non_asn') }}" type="number" class="form-control @error('non_asn') is-invalid @enderror" id="non_asn" placeholder="Masukan non_asn">
						@error('non_asn')
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

<script>
	$(document).ready(function() {
		$('#tiketHide').hide();
		$('#alat_angkut_id').on('change', function() {
			const selectedOption = $(this).find(':selected');
			const tiketStatus = selectedOption.data('tiket');
			
			if (tiketStatus === 1) {
				$('#tiketHide').show();
			} else {
				$('#tiketHide').hide();
			}
		});
		
		const initialTiketStatus = $('#alat_angkut_id').find(':selected').data('tiket');
		if (initialTiketStatus === 0) {
			$('#tiketHide').hide();
		}
	});
</script>

<script>
	$(document).ready(function(){
		$('#kotaKabupatenHide, #provinsiHide').hide();
		
		$('#wilayah').change(function(){
			let selectedValue = $(this).val();
			
			if(selectedValue === 'kota_kabupaten'){
				$('#provinsi_id').val('').prop('required', false);
				$('#provinsiHide').hide();
				$('#kota_kabupaten_id').prop('required', true);
				$('#kotaKabupatenHide').show();
			} else if(selectedValue === 'provinsi'){
				$('#kota_kabupaten_id').val('').prop('required', false);
				$('#kotaKabupatenHide').hide();
				$('#provinsi_id').prop('required', true);
				$('#provinsiHide').show();
			}
		});
	});
</script>

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