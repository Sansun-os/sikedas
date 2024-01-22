@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
						
			            <h1 class="app-page-title mb-0">Riwayat Peminjaman</h1>
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
												<th class="cell">No</th>
												<th class="cell">Tanggal</th>
												<th class="cell">Nama</th>
												<th class="cell">Jenis kendaraan</th>
												<th class="cell">Merk</th>
												<th class="cell">Tipe</th>
												<th class="cell">No Polisi</th>
                                                <th class="cell">Tujuan</th>
                                                <th class="cell">Keterangan</th>
												@if (auth()->user()->level=="admin")
                                                
												@endif
											
												
											</tr>
										</thead>
										<tbody>
											@if (auth()->user()->name)
											
											@php
												$no = 1;
											@endphp
											@foreach ($data as $peminjaman )
											<tr>
												<td class="cell">{{ $no++ }}</td>
												<td class="cell">{{ \Carbon\Carbon::parse($peminjaman->created_at)->format('Y-m-d') }}</td>
												<td class="cell">{{ $peminjaman->user->name }}</td>
												<td class="cell">{{ $peminjaman->jeniskendaraan->jeniskendaraan }}</td>
												<td class="cell">{{ $peminjaman->merk_id }}</td>
											
												<td class="cell">{{ $peminjaman->tipe_id }}</td>
												<td class="cell">{{ $peminjaman->nopolisi_id }}</td>
												<td class="cell">{{ $peminjaman->tujuan }}</td>	
												<td class="cell">
													<i class="fa fa-xing " aria-hidden="true"></i><span class="badge bg-warning ">{{ $peminjaman->keterangan }}</span></td>
												</td>
													@if (auth()->user()->level=="admin")
													@if ($peminjaman->kendaraan)
													
													<!-- Tampilkan informasi lainnya dari kendaraan jika diperlukan -->
												@else
												<td class="cell"><span class="badge bg-warning ">tidak ada</span></td>
													@endif
														@endif
											
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
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
	Kembalikan
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" style="text-align: center;" id="exampleModalLabel" >Pengembalian Kendaraan</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="tab-content" id="orders-table-tab-content s">
				<div class="tab-pane fade show active w-100 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm ">
						<form action="insert" method="POST" enctype="multipart/form-data">
							@csrf
						<div class="app-card-body p-md-3 ">
							
							<div class="form-group w-100 mb-3    ">
								<label class="mb-2" >Pilih Kendaraan</label>
								<select name="jenis_id" class="form-select" aria-label="Default select example" id="pilihKendaraan"  >
								  </select>
							  </div>
						   
							  <div class="form-group w-100  mb-3 ">
								<label class="mb-2" >merk</label>
								<input type="text" name="merk_id" class="form-control" id="merkKendaraan" readonly />
								
							  </div>
							<div class="form-group w-100  mb-3 ">
								<label class="mb-2" >Tipe</label>
								<input type="text" name="tipe_id" id="tipeKendaraan" class="form-control" readonly />
							  </div>
							  
							  <div class="form-group w-100  mb-3 ">
								<label class="mb-2" >No polisi</label>
								<input type="text" name="nopolisi_id" id="noPolisi" class="form-control" readonly />
								
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
								<button type="button" class="btn btn-primary">Kirim</button>
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
