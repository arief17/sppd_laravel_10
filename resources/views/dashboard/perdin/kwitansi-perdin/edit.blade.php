@extends('layouts.main')

@section('container')

<div class="row row-sm">
	<div class="col-xl-6">
		<div class="card box-shadow-0 ">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-1">{{ $title }}</h4>
				<a class="btn btn-secondary btn-sm" href="{{ route('kwitansi-perdin.index') }}">
					<i class="fa fa-reply"></i>
				</a>
			</div>
			<div class="card-body pt-0">
				<form action="{{ route('kwitansi-perdin.show', $kwitansi_perdin->slug) }}" method="post">
					@csrf
					@method('put')
					
					<form action="{{ route('kwitansi-perdin.update', $kwitansi_perdin->id) }}" method="post">
						<div class="table-responsive">
							<table class="table mg-b-0 text-md-nowrap border-bottom">
								<tr>
									<th style="white-space: nowrap; width: 1%;">Surat Dari:</th>
									<td>{{ $kwitansi_perdin->data_perdin->surat_dari }}</td>
									<th style="white-space: nowrap; width: 1%;">No:</th>
									<td>{{ $kwitansi_perdin->data_perdin->no_surat }}</td>
								</tr>
								<tr>
									<th style="white-space: nowrap; width: 1%;">Perihal:</th>
									<td>{{ $kwitansi_perdin->data_perdin->perihal }}</td>
									<th style="white-space: nowrap; width: 1%;">Tanggal Surat:</th>
									<td>{{ $kwitansi_perdin->data_perdin->tgl_surat }}</td>
								</tr>
								<tr>
									<th style="white-space: nowrap; width: 1%;">Alat Angkut:</th>
									<td>{{ $kwitansi_perdin->data_perdin->alat_angkut->nama }}</td>
									<th style="white-space: nowrap; width: 1%;">Kegiatan:</th>
									<td>{{ $kwitansi_perdin->data_perdin->kegiatan->nama }}</td>
								</tr>
								<tr>
									<th style="white-space: nowrap; width: 1%;">Tanggal Bayar:</th>
									<td>
										<input name="tgl_bayar" value="{{ old('tgl_bayar', $kwitansi_perdin->tgl_bayar) }}" type="text" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" placeholder="Masukan Tanggal Bayar">
										@error('tgl_bayar')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
									<th style="white-space: nowrap; width: 1%;">PPTK:</th>
									<td>
										<div class="form-group">
											<label for="pptk_id" class="form-label">PPTK</label>
											<select name="pptk_id" id="pptk_id" class="form-control form-select @error('pptk_id') is-invalid @enderror">
												<option value="">Pilih PPTK</option>
												@foreach ($pptks as $pptk)
												<option value="{{ $pptk->id }}" @selected(old('pptk_id', $kwitansi_perdin->pptk_id) == $pptk->id)>
													{{ $pptk->nama }}
												</option>
												@endforeach
											</select>
											@error('pptk_id')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</td>
								</tr>
								<tr>
									<th style="white-space: nowrap; width: 1%;">Kegiatan:</th>
									<td>
										<div class="form-group">
											<label for="kegiatan_id" class="form-label">Kegiatan</label>
											<select name="kegiatan_id" id="kegiatan_id" class="form-control form-select @error('kegiatan_id') is-invalid @enderror">
												<option value="">Pilih Kegiatan</option>
												@foreach ($kegiatans as $kegiatan)
												<option value="{{ $kegiatan->id }}" @selected(old('kegiatan_id', $kwitansi_perdin->kegiatan_id) == $kegiatan->id)>
													{{ $kegiatan->nama }}
												</option>
												@endforeach
											</select>
											@error('kegiatan_id')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</td>
									<th style="white-space: nowrap; width: 1%;">Nomor Rekening:</th>
									<td>
										<input name="no_rek" value="{{ old('no_rek', $kwitansi_perdin->no_rek) }}" type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Masukan Nomor Rekening">
										@error('no_rek')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</td>
								</tr>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table mg-b-0 text-md-nowrap border-bottom">
								<thead>
									<tr>
										<th class="border-bottom-0" style="width: 1%">No</th>
										<th class="border-bottom-0">Nama</th>
										<th class="border-bottom-0">NIP</th>
										<th class="border-bottom-0">Pangkat</th>
										<th class="border-bottom-0">Uang Harian</th>
										<th class="border-bottom-0">Uang Transport</th>
										<th class="border-bottom-0">Uang Tiket</th>
										<th class="border-bottom-0">Uang Penginapan</th>
										<th class="border-bottom-0">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($kwitansi_perdin->pegawais as $pegawai)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $pegawai->nama }}</td>
										<td>{{ $pegawai->nip }}</td>
										<td>{{ $pegawai->pangkat->nama ?? '-'}}</td>
										<td>
											<input name="uang_harian[{{ $pegawai->id }}]" value="{{ old('uang_harian.' . $pegawai->id, $pegawai->pivot->uang_harian) }}" type="text" class="form-control @error('uang_harian.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Harian">
											@error('uang_harian.' . $pegawai->id)
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</td>
										<td>
											<input name="uang_transport[{{ $pegawai->id }}]" value="{{ old('uang_transport.' . $pegawai->id, $pegawai->pivot->uang_transport) }}" type="text" class="form-control @error('uang_transport.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Transport">
											@error('uang_transport.' . $pegawai->id)
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</td>
										<td>
											<input name="uang_tiket[{{ $pegawai->id }}]" value="{{ old('uang_tiket.' . $pegawai->id, $pegawai->pivot->uang_tiket) }}" type="text" class="form-control @error('uang_tiket.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Tiket">
											@error('uang_tiket.' . $pegawai->id)
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</td>
										<td>
											<input name="uang_penginapan[{{ $pegawai->id }}]" value="{{ old('uang_penginapan.' . $pegawai->id, $pegawai->pivot->uang_penginapan) }}" type="text" class="form-control @error('uang_penginapan.' . $pegawai->id) is-invalid @enderror" placeholder="Masukan Uang Tiket">
											@error('uang_penginapan.' . $pegawai->id)
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</td>
										<td>total</td>
									</tr>
									@endforeach
								</tbody>	
							</table>
						</div>
					</form>
					
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