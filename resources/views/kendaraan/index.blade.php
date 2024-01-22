@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Data Kendaraan</h1>
						{{-- <a class="btn btn-secondary mt-4 btn-sm " href="{{ route('kendaraantambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah Kendaraan</a> --}}
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('kendaraantambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah Kendaraan</a>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
											<form action="/kendaraan" method="GET">
					                        <input  type="search" id="search" name="search" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
										</form>
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
												<th class="cell">No</th>
												<th class="cell">Jenis</th>
												<th class="cell">Merk</th>
												<th class="cell">Tipe</th>
												<th class="cell">No Polisi</th>
												<th class="cell">Kondisi</th>
												<th class="cell">Status</th>
											
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
											@endphp
											@foreach ($data as $kendaraan )
											<tr>
												<td class="cell">{{ $no++ }}</td>
												<td class="cell">{{ $kendaraan->id_jenis }}</td>
												<td class="cell">{{ $kendaraan->id_merk }}</td>
												<td class="cell">{{ $kendaraan->id_tipe }}</td>
											
												<td class="cell">{{ $kendaraan->id_nopolisi}}</td>
												<td class="cell">{{ $kendaraan->kondisi }}</td>
												<td class="cell">
													@php
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
												</span>
												</td>
												
												<td style="color: black; word-spacing: 10px;">
													<a class="" href="/delete/{{ $kendaraan->id }}" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash"></i></a>
													<a href="{{ route('kendaraanedit', $kendaraan->id) }}"><i class="fas fa-edit "></i></a>
														{{-- <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
														  <span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu btn-sm">
															<li><a class="dropdown-item link-dark" href="{{ route('kendaraanedit', $kendaraan->id) }}">Edit</a></li>
															<li><a class="dropdown-item link-dark" href="/delete/{{ $kendaraan->id }}" onclick="return confirm('Hapus data ini?');">Hapus</a></li>
														</ul> --}}
													</td>
											</tr>
											@endforeach
										</tbody>
									</table>
						</div><!--//table-responsive-->
					
						</div><!--//app-card-body-->		
						</div><!--//app-card-->
					
						
			</div><!--//tab-pane-->
				</div><!--//tab-content-->
				
				
		
		</div><!--//container-fluid-->
	</div><!--//app-content-->
    </div><!--//app-wrapper-->    					

 
 
@endsection