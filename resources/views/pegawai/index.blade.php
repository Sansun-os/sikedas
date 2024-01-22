{{-- @extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Data Pegawai</h1>
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('pegawaitambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah Pegawai</a>
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
			   
			
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							
						    <div class="app-card-body p-md-3 ">
								
							    <div class="table-responsive">
									
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">No</th>
												<th class="cell">Nama Pegawai</th>
												<th class="cell">NIP</th>
												<th class="cell">Alamat</th>
												<th class="cell">Jenis Kelamin</th>
												<th class="cell">Email</th>
												<th class="cell">No HP</th>
												<th class="cell">Foto</th>
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $pegawai )
											<tr>
												<td class="cell">{{ $pegawai->id }}</td>
												<td class="cell"><span class="truncate">{{ $pegawai->namapegawai }}</span></td>
												<td class="cell">{{ $pegawai->nip }}</td>
												<td class="cell">Ciampea</td>
												<td class="cell"><span class="badge bg-success ">Laki-laki</span></td>
												<td class="cell">spamungkas202@gmail.com</td>
												<td class="cell"><a class="" href="#">089637034763</a></td>
												<td class="cell"><a class="btn-sm app-btn-secondary" href="#">089637034763</a></td>
												<td>
													<div class="btn-group">
														<button class="btn btn-secondary btn-sm" type="button">
														  Aksi
														</button>
														<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
														  <span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu btn-sm">
															<li><a class="dropdown-item link-dark" href="{{ route('kendaraanedit', $pegawai->id) }}">Edit</a></li>
															<li><a class="dropdown-item link-dark" href="/delete/{{ $pegawai->id }}" onclick="return confirm('Hapus data ini?');">Hapus</a></li>
														</ul>
													  </div></td>
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

 
 
@endsection --}}

@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Data Pegawai</h1>
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('pegawaitambah') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah Pegawai</a>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
											<form action="/pegawai" method="GET">
					                        <input type="search" id="search" name="search" class="form-control search-orders" placeholder="Search">
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
								
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">No</th>
												<th class="cell">Nama Pegawai</th>
												{{-- <th class="cell">NIP</th>
												<th class="cell">Alamat</th> --}}
												<th class="cell">Jenis Kelamin</th>
												<th class="cell">Email</th>
												<th class="cell">No HP</th>
												{{-- <th class="cell">Foto</th> --}}
												<th class="cell">Action</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
											@endphp
											@foreach ($data as $pegawai )
											<tr>
												<td class="cell">{{ $no++ }}</td>
												
												<td class="cell">{{ $pegawai->name }}</td>
												{{-- <td class="cell">{{ $pegawai->nip }}</td>
												<td class="cell">{{ $pegawai->alamat }}</td> --}}
												<td class="cell">{{ $pegawai->jeniskelamin }}</td>
												<td class="cell">{{ $pegawai->email }}</td>
												<td class="cell">0{{ $pegawai->nohp }}</td>
												{{-- <td class="cell">
													<img src="{{ asset('fotopegawai/'.$pegawai->foto) }}" alt="" style="width: 100px">
												</td> --}}
												<td style="color: black; word-spacing: 10px;">
													<a class="" href="/pegawaidelete/{{ $pegawai->id }}" onclick="return confirm('Hapus data ini?');"><i class="fas fa-trash"></i></a>
													<a href="{{ route('pegawaiedit', $pegawai->id) }}"><i class="fas fa-edit "></i></a>
												</td>
												{{-- <td>
														<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
														  <span class="visually-hidden">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu btn-sm">
															<li><a class="dropdown-item link-dark" href="{{ route('pegawaiedit', $pegawai->id) }}">Edit</a></li>
															<li><a class="dropdown-item link-dark" href="/pegawaidelete/{{ $pegawai->id }}" onclick="return confirm('Hapus data ini?');">Hapus</a></li>
														</ul>
													  </td> --}}
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