

@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Data Kelola Admin</h1>
						<a class="btn btn-secondary mt-4 btn-sm " href="{{ route('tambahadmin') }}"><i class="fa fa-plus-square " aria-hidden="true"></i>Tambah Admin</a>
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
								
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell text-center">No</th>
												<th class="cell text-center">Nama </th>
												<th class="cell text-center">Email</th>
												<th class="cell text-center">Password</th>
												<th class="cell text-center">Level</th>
												<th class="cell text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
											@endphp
											@foreach ($data as $user )
											<tr>
												<td class="cell text-center">{{ $no++ }}</td>
												<td class="cell text-center">{{ $user->name }}</td>
												<td class="cell text-center">{{ $user->email }}</td>
												<td class="cell text-center">********</td>
												<td class="cell text-center">{{ $user->level }}</td>
												<td style="color: black; word-spacing: 10px;" class="text-center">
													<a class="" href="/delete/{{ $user->id }}"><i class="fas fa-trash"></i></a>
													<a href="{{ route('editadmin', $user->id) }}"><i class="fas fa-edit "></i></a>
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