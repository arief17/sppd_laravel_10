// Tanggal kembali otomatis
function hitungTanggalKembali() {
	let tanggalBerangkat = new Date($('#tgl_berangkat').val());
	let lama = parseInt($('#lama').val());
	
	if (!isNaN(lama) && tanggalBerangkat instanceof Date && !isNaN(tanggalBerangkat.getTime())) {
		let tanggalKembali = new Date(tanggalBerangkat);
		tanggalKembali.setDate(tanggalKembali.getDate() + lama);
		let formattedDate = tanggalKembali.toISOString().split('T')[0];
		$('#tgl_kembali').val(formattedDate);
	} else {
		$('#tgl_kembali').val('');
	}
}

$('#lama').on('change', hitungTanggalKembali);
$('#tgl_berangkat').on('input', hitungTanggalKembali);


// Pegawai disable
$(document).ready(function() {
	$('#tujuan_id').on('change', function() {
		if ($('#tujuan_id').val() !== '') {
			$('#pegawai_diperintah_id').prop('disabled', false);
			$('#pegawai_mengikuti_id').prop('disabled', false);
		} else {
			$('#pegawai_diperintah_id').prop('disabled', true);
			$('#pegawai_mengikuti_id').prop('disabled', true);
		}
	});
});

// Pilih pegawai
let selectedPegawai = [];

async function addPegawaiDiperintah() {
	const pegawaiDiperintahSelect = $('#pegawai_diperintah_id');
	const selectedOption = pegawaiDiperintahSelect.find(':selected');
	const pegawaiId = selectedOption.val();
	const pegawaiNama = selectedOption.text();
	const kotaKabupatenId = $('#tujuan_id').val();
	
	if (!selectedPegawai.find(pegawai => pegawai.id === pegawaiId)) {
		const dataPegawai = await getPegawaiInfo(kotaKabupatenId, pegawaiId);
		selectedPegawai.push({
			id: pegawaiId,
			nama: pegawaiNama,
			nip: dataPegawai.nip,
			jabatan: dataPegawai.jabatan,
			uang_harian: dataPegawai.uang_harian,
			keterangan: 'Pegawai yang ditugaskan'
		});
		updatePegawaiList();
		updateSelectedPegawaiInput();
	}
}

async function addPegawaiToSelected() {
	const pegawaiSelect = $('#pegawai_mengikuti_id');
	const selectedOption = pegawaiSelect.find(':selected');
	const pegawaiId = selectedOption.val();
	const pegawaiNama = selectedOption.text();
	const kotaKabupatenId = $('#tujuan_id').val();
	
	if (!selectedPegawai.find(pegawai => pegawai.id === pegawaiId)) {
		const dataPegawai = await getPegawaiInfo(kotaKabupatenId, pegawaiId);
		selectedPegawai.push({
			id: pegawaiId,
			nama: pegawaiNama,
			nip: dataPegawai.nip,
			jabatan: dataPegawai.jabatan,
			uang_harian: dataPegawai.uang_harian,
			keterangan: 'Pegawai sebagai pengikut'
		});
		updatePegawaiList();
		updateSelectedPegawaiInput();
		
		pegawaiSelect.val('');
	} else {
		pegawaiSelect.val('');
	}
}

async function getPegawaiInfo(kotaKabupatenId, pegawaiId) {
	try {
		const response = await fetch(`/get-pegawai-info/${kotaKabupatenId}/${pegawaiId}`);
		if (!response.ok) {
			throw new Error('Network response was not ok.');
		}
		const data = await response.json();
		return data.data_pegawai;
	} catch (error) {
		console.error('There was a problem with the fetch operation:', error.message);
	}
}

function removePegawaiFromSelected(pegawaiId) {
	selectedPegawai = selectedPegawai.filter(pegawai => pegawai.id !== pegawaiId);
	updatePegawaiList();
	updateSelectedPegawaiInput();
}

function updateSelectedPegawaiInput() {
	const selectedPegawaiInput = $('#selected_pegawais');
	selectedPegawaiInput.val(selectedPegawai.map(pegawai => pegawai.id).join(','));
}

function updatePegawaiList() {
	const pegawaiList = $('#pegawai-list');
	pegawaiList.empty();
	
	selectedPegawai.forEach((pegawai, index) => {
		const row = `
		<tr>
		<td>${index + 1}</td>
		<td>${pegawai.nama}</td>
		<td>${pegawai.nip}</td>
		<td>${pegawai.jabatan}</td>
		<td>${formatToRupiah(pegawai.uang_harian)}</td>
		<td>${pegawai.keterangan}</td>
		<td>
		<button type="button" class="btn btn-danger btn-sm btn-hapus-pegawai" onclick="removePegawaiFromSelected('${pegawai.id}')">Hapus</button>
		</td>
		</tr>
		`;
		pegawaiList.append(row);
	});
	
	calculateTotal();
}

$('#pegawai_diperintah_id').on('change', addPegawaiDiperintah);
$('#pegawai_mengikuti_id').on('change', addPegawaiToSelected);


function formatToRupiah(angka) {
	return new Intl.NumberFormat('id-ID', {
		style: 'currency',
		currency: 'IDR'
	}).format(angka);
}

function calculateTotal() {
	let totalUangHarian = 0;
	
	selectedPegawai.forEach(pegawai => {
		totalUangHarian += pegawai.uang_harian;
	});
	
	const tfootRow = `
	<tr>
	<th colspan="4">Total:</th>
	<td colspan="4">${formatToRupiah(totalUangHarian)}</td>
	</tr>
	`;
	
	$('#pegawai-total').html(tfootRow);
}

// Tujuan yang menyesuaikan wilayah
$(document).ready(function() {
	$('#dalamLuarHide').hide();
	$('#jenis_perdin_id').on('change', function() {
		let jenisPerdinId = $('#jenis_perdin_id').val();
		let jenisPerdinSelected = $('#jenis_perdin_id option:selected').text();
		jenisPerdinText = jenisPerdinSelected.trim().toLowerCase();
		
		$('#tujuan_id').empty();
		$('#tujuan_id').append('<option value="">Pilih Tujuan</option>');
		
		if (jenisPerdinText == 'dalam daerah') {
			$('#dalamLuarHide').hide();
			
			$.ajax({
				url: '/get-tujuan/' + jenisPerdinId,
				type: 'GET',
				dataType: 'json',
				success: function(data) {
					$.each(data, function(key, value) {
						$('#tujuan_id').append('<option value="' + key + '">' + value + '</option>');
					});
				}
			});
		} else if (jenisPerdinText == 'perjalanan dinas biasa') {
			$('#dalamLuarHide').show();
			
			$('#dalamLuar').on('change', function() {
				$('#tujuan_id').empty();
				$('#tujuan_id').append('<option value="">Pilih Tujuan</option>');
				
				let dalamLuarValue = $('#dalamLuar').val();
				
				$.ajax({
					url: '/get-tujuan/' + jenisPerdinId + '?dalam_luar=' + dalamLuarValue,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						$.each(data, function(key, value) {
							$('#tujuan_id').append('<option value="' + key + '">' + value + '</option>');
						});
					}
				});
			});
		}
	});
});
