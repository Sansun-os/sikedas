@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Data BBM</h1>
						@if (auth()->user()->level=="user")
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('kendaraantambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah service</a>
				   @endif
					</div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
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
												<th class="cell">Penanggung Jawab</th>
												<th class="cell">Service</th>
												<th class="cell">Nota</th>
												<th class="cell">Jumlah Kotor</th>
												<th class="cell">Jumlah bersih</th>
												<th class="cell">Keterangan</th>
												<th class="cell">Aksi</th>
											</tr>
										</thead>
										<tbody>
											{{-- @php
												$no = 1;
											@endphp
											@foreach ($data as $kendaraan ) --}}
											<tr>
												<td class="cell">1</td>
												<td class="cell">19-25-23</td>
												<td class="cell">Prasetya</td>
												<td class="cell">Ganti oli</td>
												<td class="cell"></td>
												<td class="cell">5000</td>
												<td class="cell"><span class="badge bg-success ">OK</span></td>
												<td class="cell"></td>
												<td>
														<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
														  <span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu btn-sm">
															<li><a class="dropdown-item link-dark" href="">Edit</a></li>
															<li><a class="dropdown-item link-dark" href="" onclick="return confirm('Hapus data ini?');">Hapus</a></li>
														</ul>
													  </td>
											</tr>
											{{-- @endforeach --}}
		
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