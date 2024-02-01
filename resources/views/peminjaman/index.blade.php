@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
						
			            <h1 class="app-page-title mb-0">Data Peminjaman</h1>
						@if (auth()->user()->level=="user")
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('peminjamantambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i> Pinjam Kendaraan</a>
						@endif
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input  type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					    
							    </div><!--//col-->
							
								
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
					
			    </div><!--//row-->
				@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
	
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							
						    <div class="app-card-body p-md-3 ">
                                
							    <div class="table-responsive">
									@if(session()->has('success'))
									<script>
										// Use JavaScript (e.g., SweetAlert2) to display the success message
										Swal.fire({
											icon: 'success',
											title: 'Success!',
											text: '{{ session("success") }}',
										});
									</script>
								@endif
							<table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell text-center">No</th>
												<th class="cell text-center">Tanggal Peminjaman</th>
												<th class="cell text-center">Nama</th>
												<th class="cell text-center">Jenis kendaraan</th>
												<th class="cell text-center">Merk</th>
												<th class="cell text-center">Tipe</th>
												<th class="cell text-center">No Polisi</th>
                                                <th class="cell text-center">Tujuan</th>
												@if (auth()->user()->level=="admin")
                                                <th class="cell text-center">Kondisi Pengembalian</th>
												@endif
                                                <th class="cell text-center">Keterangan</th>
												@if (auth()->user()->level=="admin")
												
												@endif
												
												<th class="cell text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											@if (auth()->user()->name)
											
											@php
												$no = 1;
											@endphp
											@foreach ($data as $peminjaman )
											
											<tr>
												<td class="cell text-center">{{ $no++ }}</td>
												<td class="cell text-center">{{ \Carbon\Carbon::parse($peminjaman->created_at)}}</td>
												<td class="cell text-center">{{ $peminjaman->user->name }}</td>
												<td class="cell text-center">{{ $peminjaman->jenis_id }}</td>
												<td class="cell text-center">{{ $peminjaman->merk_id }}</td>
												<td class="cell text-center">{{ $peminjaman->tipe_id }}</td>
												<td class="cell text-center">{{ $peminjaman->nopolisi_id }}</td>
												<td class="cell text-center">{{ $peminjaman->tujuan }}</td>	
												@if (auth()->user()->level=="admin")
												<td class="cell text-center " >{{ $peminjaman->kondisi_pengembalian }} </td>	
												@endif
												<td class="cell">
													{{-- @php
													$brightness = 25; // Default brightness untuk status 'Pemeliharaan'
													$hue = 0; // Default hue untuk status 'Pemeliharaan'

													if ($kendaraan->status === 'Sedang Digunakan') {
														$brightness = 50;
														$hue = 60; // Nilai hue untuk warna kuning
													} elseif ($kendaraan->status === 'Tersedia') {
														$brightness = 70; // Nilai kecerahan untuk warna hijau
														$hue = 120; // Nilai hue untuk warna hijau
													}
												@endphp

												<span class="badge" style="background-color: hsl({{ $hue }}, 100%, {{ $brightness }}%)">
													{{ $kendaraan->status }}
												</span> --}}
												@php
    $brightness = $peminjaman->keterangan === 'dikembalikan' ? 60 : 40; // Sesuaikan nilai kecerahan sesuai kebutuhan
    $hue = $peminjaman->keterangan === 'dipinjam' ? 90 : 70; // Sesuaikan nilai hue sesuai kebutuhan
@endphp

<span class="badge" style="background-color: hsl({{ $hue }}, 100%, {{ $brightness }}%)">
    {{$peminjaman->keterangan }}
</span>
												</td>
												</td>
													@if (auth()->user()->level=="admin")
													@if ($peminjaman->kendaraan)
													<!-- Tampilkan informasi lainnya dari kendaraan jika diperlukan -->
												@else
													@endif
														@endif
														<td style="color: black; word-spacing: 10px;" class="text-center">
															<a class="" href=" {{  route('peminjaman.delete', ['id' => $peminjaman->id]) }}" onclick="return confirm('Hapus data ini?');"><i class="fas fa-trash"></i></a>
															@if (auth()->user()->level=="user")
															<a href="{{ route('peminjamanedit', $peminjaman->id) }}"><i class="fas fa-edit "></i></a>
															@endif
														</td>
												{{-- <td>
														<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
														<span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu btn-sm">
														<li><a class="dropdown-item link-dark" href="{{ route('peminjamanedit', $peminjaman->id) }}">Edit</a></li> 
														<li><a class="dropdown-item link-dark" href=" {{  route('peminjaman.delete', ['id' => $peminjaman->id]) }}" onclick="return confirm('Hapus data ini?');">Hapus</a></li> 
														</ul>
													</td> --}}
											</tr>
											@endforeach
											@endif
										</tbody>
									</table>
									
						</div><!--//table-responsive-->
						</div><!--//app-card-body-->
								
						</div><!--//app-card-->
						@if (auth()->user()->level=="user")
						<div class="text-center">
							<h3 class=" font-weight-normal" > <b> Pengembalian Kendaraan </b></h3>	
							<!-- Button trigger modal -->
							<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" onclick="openModal()" id="openModalButton" data-toggle="modal" data-target="#exampleModal">
	Kembalikan
</button>

<!-- Modal -->
<div class="modal fade" id="peminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" style="text-align: center;" id="exampleModalLabel" >Pengembalian Kendaraan</h5>
		<button type="button" onclick="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<div class="tab-content" id="orders-table-tab-content s">
				<div class="tab-pane fade show active w-100 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm ">
						<form action="{{ route('peminjamaninsert') }}" method="POST" enctype="multipart/form-data">
							@csrf
						<div class="app-card-body p-md-3 ">
							
							<div class="form-group w-100 mb-3    ">
								<label class="mb-2" >Pilih Kendaraan</label>
								<select name="jenis_id" class="form-select" aria-label="Default select example" id="selectKendaraan"  >
								</select>
							</div>
							
							<div class="form-group w-100  mb-3 ">
								<label class="mb-2" >merk</label>
								<input type="text" name="merk_id" class="form-control" id="merkKendaraanModal" readonly />
								
							</div>
							<div class="form-group w-100  mb-3 ">
								<label class="mb-2" >Tipe</label>
								<input type="text" name="tipe_id" id="tipeKendaraanModal" class="form-control" readonly />
							</div>
							<div class="form-group w-100  mb-3 ">
								<label class="mb-2" >No polisi</label>
							<input type="text" name="nopolisi_id" id="noPolisiModal" class="form-control" readonly />
							</div>
							<div class="form-group w-100  mb-3 ">
								<label class="mb-2" >Kondisi setelah peminjaman</label>
								<input type="text" name="kondisi_pengembalian" id="kondisiPengembalianModal" required class="form-control" placeholder="enter keterangan..." />
							</div>
							<div class="modal-footer">
								<button type="button" onclick="closeModal()" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
								<button type="button" onclick="saveDataModal()" class="btn btn-primary">Kembalikan</button>
							</div>
						</div><!--//app-card-body-->
					</form>		
					</div><!--//app-card-->
					
					
				</div><!--//tab-pane-->
				
				
				
			
			
			</div><!--//tab-content-->
		</div>
		
	</div>
	</div>
</div>
						</div>
						@endif
						
			        </div><!--//tab-pane-->

				</div><!--//tab-content-->

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	 
	
    </div><!--//app-wrapper-->    					

 
 
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	console.log($('meta[name="csrf-token"]').attr("content"))
	$.ajaxSetup({
	headers: {
		"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
	});
</script>
<script>
console.log("first")
let idKendaraan = 0;

const getJenisKendaraan = async () => {
  $.ajax({
    type: "get",
    url: "get-kendaraan",
    success: function (response) {
      console.log(response)
      if(response.code == "00"){
        for(let data of response.data){
          $("#pilihKendaraan").append("<option disabled selected>pilih kendaraan</option>")
          $("#kendaraanId").val(data.id)
          $("#pilihKendaraan").append(`
            <option value="${data.id}">${data.jeniskendaraan} - ${data.merk} - ${data.tipe} - ${data.nopolisi}</option>
          `)
      }
      } else {
        alert(response.message)
      }
    }
  });
}

$("#pilihKendaraan").on("change", () => {
  $.ajax({
    type: "get",
    url: "find-kendaraan",
    data: {id: $("#pilihKendaraan").val()},
    success: function (response) {
      console.log(response.data)
      if(response.code == "00"){
        $("#merkKendaraan").val(response.data.merk)
        $("#tipeKendaraan").val(response.data.tipe)
        $("#noPolisi").val(response.data.nopolisi)
      }
    }
  });
})

const openModal = () => {
	$("#peminjamanModal").modal("show")
	$.ajax({
		type: "get",
		url: "peminjaman/get-peminjaman",
		success: function (response) {
			console.log(response)
			$("#selectKendaraan").append("<option selected disabled>Pilih Kendaraan</option>")
			for(let data of response.data){
				$("#selectKendaraan").append(
				`
					<option value="${data.id}">${data.merk_id} - ${data.nopolisi_id}</option>
				`)
				$("#selectKendaraan").on("change", () => {
					idKendaraan = data.kendaraan_id;
					$("#merkKendaraanModal").val(data.merk_id)
					$("#tipeKendaraanModal").val(data.tipe_id)
					$("#noPolisiModal").val(data.nopolisi_id)
				})
			}	
		}
	});
}

const closeModal = () => {
	$("#peminjamanModal").modal("hide")
	$("#selectKendaraan").empty();
	idKendaraan = 0;
}

const saveDataModal = () => {
	console.log(idKendaraan)
	$.ajax({
		type: "post",
		url: "peminjaman/insert-pengembalian",
		data: {id: $("#selectKendaraan").val(),  idKendaraan: idKendaraan,
		kondisi_pengembalian: $("#kondisiPengembalianModal").val() },
		success: function (response) {
			if(response.code == "00"){
				alert("success")
				closeModal()
			} else {
				alert(response.message)
			}
		}
	});
}

getJenisKendaraan();
</script>
@endpush