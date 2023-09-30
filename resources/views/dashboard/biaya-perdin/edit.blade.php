@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				<h4 class="card-title mb-1">{{ $title }}</h4>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('biaya-perdin.show', $biaya_perdin->slug) }}" method="post">
					@csrf
					@method('put')
					
					<div class="form-group">
						<label for="area" class="form-label">Area</label>
						<select name="area" id="area" class="form-control form-select @error('area') is-invalid @enderror">
							<option value="">Pilih Area</option>
							@foreach ($jenis_perdins as $area)
							<option value="{{ $area->id }}" @selected(old('area', $biaya_perdin->area) == $area->id)>
								{{ $area->nama }}
							</option>
							@endforeach
						</select>
						@error('area')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="dari" class="form-label">Dari</label>
						<select name="dari" id="dari" class="form-control form-select @error('dari') is-invalid @enderror">
							<option value="">Darimana</option>
							@foreach ($kota_kabupatens as $dari)
							<option value="{{ $dari->id }}" @selected(old('dari', $biaya_perdin->dari) == $dari->id)>
								{{ $dari->nama }}
							</option>
							@endforeach
						</select>
						@error('dari')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="ke" class="form-label">Ke</label>
						<select name="ke" id="ke" class="form-control form-select @error('ke') is-invalid @enderror">
							<option value="">Kemana</option>
							@foreach ($kota_kabupatens as $ke)
							<option value="{{ $ke->id }}" @selected(old('ke', $biaya_perdin->ke) == $ke->id)>
								{{ $ke->nama }}
							</option>
							@endforeach
						</select>
						@error('ke')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="transport" class="form-label">Uang Transport</label>
						<select name="transport" id="transport" class="form-control form-select @error('transport') is-invalid @enderror">
							<option value="">Pilih Uang Transport</option>
							@foreach ($uang_transports as $transport)
							<option value="{{ $transport->id }}" @selected(old('transport', $biaya_perdin->transport) == $transport->id)>
								{{ $transport->nama }}
							</option>
							@endforeach
						</select>
						@error('transport')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="harian" class="form-label">Uang Harian</label>
						<select name="harian" id="harian" class="form-control form-select @error('harian') is-invalid @enderror">
							<option value="">Pilih Uang Harian</option>
							@foreach ($uang_harians as $harian)
							<option value="{{ $harian->id }}" @selected(old('harian', $biaya_perdin->harian) == $harian->id)>
								{{ $harian->nama }}
							</option>
							@endforeach
						</select>
						@error('harian')
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