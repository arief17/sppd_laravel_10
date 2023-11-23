@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
		<div class="card box-shadow-0 ">
			<div class="card-header">
				@if(session()->has('failedSave'))
				<div class="alert alert-danger mg-b-0 mb-5" role="alert">
					<button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
						<span aria-hidden="true">×</span>
					</button>
					<strong>Peringatan!</strong> <br>
					{{ session('failedSave') }}
				</div>
				@endif
				
				<h4 class="card-title mb-1">{{ $title }}</h4>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('data-perdin.store') }}" method="post">
					@csrf
					
					<div class="row row-sm">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="surat_dari">Surat Dari</label>
								<input name="surat_dari" value="{{ old('surat_dari') }}" type="text" class="form-control @error('surat_dari') is-invalid @enderror" id="surat_dari" placeholder="Masukan surat_dari">
								@error('surat_dari')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="nomor_surat">Nomor Surat</label>
								<input name="nomor_surat" value="{{ old('nomor_surat') }}" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" placeholder="Masukan nomor_surat">
								@error('nomor_surat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="tgl_surat">Tanggal Surat</label>
						<input name="tgl_surat" value="{{ old('tgl_surat') }}" type="date" class="form-control @error('tgl_surat') is-invalid @enderror" id="tgl_surat" placeholder="Masukan tgl_surat">
						@error('tgl_surat')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="perihal">Perihal</label>
						<textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror" id="perihal" placeholder="Masukan perihal" rows="3">{{ old('perihal') }}</textarea>
						@error('perihal')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					{{-- <div class="form-group">
						<label for="no_spt">No. SPT</label>
						<input name="no_spt" value="{{ old('no_spt') }}" type="text" class="form-control @error('no_spt') is-invalid @enderror" id="no_spt" placeholder="Masukan no_spt">
						@error('no_spt')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div> --}}
					
					<hr>
					
					<div class="form-group">
						<label for="tanda_tangan_id" class="form-label">Pejabat yang memberi perintah</label>
						<select name="tanda_tangan_id" id="tanda_tangan_id" class="form-control form-select @error('tanda_tangan_id') is-invalid @enderror">
							<option value="">Pilih Pejabat</option>
							@foreach ($tanda_tangans as $tanda_tangan)
							<option value="{{ $tanda_tangan->id }}" @selected(old('tanda_tangan_id') == $tanda_tangan->id)>
								{{ $tanda_tangan->pegawai->jabatan->nama }}
							</option>
							@endforeach
						</select>
						@error('tanda_tangan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="maksud">Madsud Perjalanan Dinas</label>
						<textarea name="maksud" class="form-control @error('maksud') is-invalid @enderror" id="maksud" placeholder="Masukan maksud" rows="3">{{ old('maksud') }}</textarea>
						@error('maksud')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="lama" class="form-label">Lamanya Perjalanan Dinas</label>
						<select name="lama" id="lama" class="form-control form-select @error('lama') is-invalid @enderror">
							<option value="">Pilih Lama Hari</option>
							<option value="1">1 hari</option>
							<option value="2">2 hari</option>
							<option value="3">3 hari</option>
						</select>
						@error('lama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="row row-sm">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="tgl_berangkat">Tanggal Berangkat</label>
								<input name="tgl_berangkat" value="{{ old('tgl_berangkat') }}" type="date" class="form-control @error('tgl_berangkat') is-invalid @enderror" id="tgl_berangkat" placeholder="Masukan tgl_berangkat">
								@error('tgl_berangkat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="tgl_kembali">Tanggal Kembali</label>
								<input readonly name="tgl_kembali" value="{{ old('tgl_kembali') }}" type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" placeholder="Masukan tgl_kembali">
								@error('tgl_kembali')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="alat_angkut_id" class="form-label">Alat Angkut</label>
						<select name="alat_angkut_id" id="alat_angkut_id" class="form-control form-select @error('alat_angkut_id') is-invalid @enderror">
							<option value="">Pilih Alat Angkut</option>
							@foreach ($alat_angkuts as $alat_angkut)
							<option value="{{ $alat_angkut->id }}" @selected(old('alat_angkut_id') == $alat_angkut->id)>
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
					<div class="form-group">
						<label for="area_id" class="form-label">Area</label>
						<select name="area_id" id="area_id" class="form-control form-select @error('area_id') is-invalid @enderror">
							<option value="">Pilih Area</option>
							@foreach ($areas as $area)
							<option value="{{ $area->id }}" @selected(old('area_id') == $area->id)>
								{{ $area->nama }}
							</option>
							@endforeach
						</select>
						@error('area_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="kedudukan_id" class="form-label">Tempat Kedudukan</label>
						<select name="kedudukan_id" id="kedudukan_id" class="form-control form-select @error('kedudukan_id') is-invalid @enderror">
							<option value="">Pilih Tempat Kedudukan</option>
							@foreach ($kota_kabupatens as $kota_kabupaten)
							<option value="{{ $kota_kabupaten->id }}" @selected(old('kedudukan_id') == $kota_kabupaten->id)>
								{{ $kota_kabupaten->nama }}
							</option>
							@endforeach
						</select>
						@error('kedudukan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="tujuan_id" class="form-label">Tujuan</label>
						<select name="tujuan_id" id="tujuan_id" class="form-control form-select @error('tujuan_id') is-invalid @enderror">
							<option value="">Pilih Tujuan</option>
							@foreach ($kota_kabupatens as $kota_kabupaten)
							<option value="{{ $kota_kabupaten->id }}" @selected(old('tujuan_id') == $kota_kabupaten->id)>
								{{ $kota_kabupaten->nama }}
							</option>
							@endforeach
						</select>
						@error('tujuan_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="lokasi">Lokasi</label>
						<textarea name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Masukan lokasi" rows="3">{{ old('lokasi') }}</textarea>
						@error('lokasi')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="pegawai_diperintah_id" class="form-label">Pegawai Yang Diperintahkan</label>
						<select name="pegawai_diperintah_id" id="pegawai_diperintah_id" class="form-control form-select @error('pegawai_diperintah_id') is-invalid @enderror">
							<option value="">Pilih Pegawai Yang Diperintahkan</option>
							@foreach ($pegawais as $pegawai)
							<option value="{{ $pegawai->id }}" @selected(old('pegawai_diperintah_id') == $pegawai->id)>
								{{ $pegawai->nama }}
							</option>
							@endforeach
						</select>
						@error('pegawai_diperintah_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="biaya">Tingkat Biaya</label>
						<input name="biaya" value="{{ old('biaya') }}" type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" placeholder="Masukan biaya">
						@error('biaya')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="pegawai_mengikuti_id" class="form-label">Pegawai Yang Mengikuti</label>
						<select name="pegawai" id="pegawai_mengikuti_id" class="form-control form-select @error('pegawai_mengikuti_id') is-invalid @enderror">
							<option value="">Pilih Pegawai Yang Mengikuti</option>
							@foreach ($pegawais as $pegawai)
							<option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
							@endforeach
						</select>
						<input type="hidden" name="pegawai_mengikuti_id" id="selected_pegawais">
						
						@error('pegawai_mengikuti_id')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<hr>
					<div class="table-responsive">
						<table class="table mg-b-0 text-md-nowrap">
							<thead>
								<tr>
									<th style="width: 1%">No</th>
									<th>Nama</th>
									<th style="width: 1%">Aksi</th>
								</tr>
							</thead>
							<tbody id="pegawai-list"></tbody>
						</table>
					</div>
					<hr>
					
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukan keterangan" rows="3">{{ old('keterangan') }}</textarea>
						@error('keterangan')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<hr>
					
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

<script>
	function hitungTanggalKembali() {
		var tanggalBerangkat = new Date(document.getElementById('tgl_berangkat').value);
		var lama = parseInt(document.getElementById('lama').value);
		
		if (!isNaN(lama) && tanggalBerangkat instanceof Date && !isNaN(tanggalBerangkat.getTime())) {
			var tanggalKembali = new Date(tanggalBerangkat);
			tanggalKembali.setDate(tanggalKembali.getDate() + lama);
			var formattedDate = tanggalKembali.toISOString().split('T')[0];
			document.getElementById('tgl_kembali').value = formattedDate;
		} else {
			document.getElementById('tgl_kembali').value = '';
		}
	}
	
	document.getElementById('lama').addEventListener('change', hitungTanggalKembali);
	document.getElementById('tgl_berangkat').addEventListener('input', hitungTanggalKembali);
</script>

<script>
	let selectedPegawai = [];
	
	function addPegawaiToSelected() {
		const pegawaiSelect = document.getElementById('pegawai_mengikuti_id');
		const selectedOption = pegawaiSelect.options[pegawaiSelect.selectedIndex];
		const pegawaiId = selectedOption.value;
		const pegawaiNama = selectedOption.text;
		
		if (!selectedPegawai.find(pegawai => pegawai.id === pegawaiId)) {
			selectedPegawai.push({ id: pegawaiId, nama: pegawaiNama });
			updatePegawaiList();
			updateSelectedPegawaiInput();
			
			pegawaiSelect.selectedIndex = 0;
		} else {
			pegawaiSelect.selectedIndex = 0;
		}
	}
	
	function removePegawaiFromSelected(pegawaiId) {
		selectedPegawai = selectedPegawai.filter(pegawai => pegawai.id !== pegawaiId);
		updatePegawaiList();
		updateSelectedPegawaiInput();
	}
	
	function updateSelectedPegawaiInput() {
		const selectedPegawaiInput = document.getElementById('selected_pegawais');
		selectedPegawaiInput.value = selectedPegawai.map(pegawai => pegawai.id).join(',');
	}
	
	function updatePegawaiList() {
		const pegawaiList = document.getElementById('pegawai-list');
		pegawaiList.innerHTML = '';
		
		selectedPegawai.forEach((pegawai, index) => {
			const row = document.createElement('tr');
			row.innerHTML = `
			<td>${index + 1}</td>
			<td>${pegawai.nama}</td>
			<td>
				<button type="button" class="btn btn-danger btn-sm btn-hapus-pegawai"
				onclick="removePegawaiFromSelected('${pegawai.id}')">Hapus</button>
			</td>
			`;
			pegawaiList.appendChild(row);
		});
	}
	
	document.getElementById('pegawai_mengikuti_id').addEventListener('change', addPegawaiToSelected);
</script>

<!-- custom js -->
<script src="/assets/js/custom.js"></script>

<!-- Internal form-elements js -->
<script src="/assets/js/form-elements.js"></script>
@endsection