@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Tambah Data Pegawai</h1>
				    </div>
				
			    </div><!--//row-->
			   
				
				<div class="tab-content" id="orders-table-tab-content s">
			        <div class="tab-pane fade show active w-75 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							<form action="/pegawaiinsert" method="POST" enctype="multipart/form-data">
                                @csrf
						    <div class="app-card-body p-md-3 ">
                              
                                <div class="form-group w-100 mb-3    ">
                                    <label class="mb-2" >Nama Pegawai</label>
                                    <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Pegawai">
                                    @error('name')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
                                  </div>
								  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-select" aria-label="Default select example" ">
                                      <option disabled>--Pilih jenis kelamin--</option>
                                      <option value="laki-laki"  {{ old('jeniskelamin') == 'laki-laki' ? 'selected' : '' }}>Laki Laki</option>
                                      <option value="perempuan" {{ old('jeniskelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    
                                  </div>
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >email</label>
                                    <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                                    @error('email')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
                                  </div>
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >No HP</label>
                                    <input type="number" name="nohp"  class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp') }}"placeholder="Enter No HP" >
                                    @error('nohp')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
                                  </div>
								  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >password</label>
                                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" >
                                    @error('password')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
                                  </div>
									<div class="form-group w-100  mb-3 ">
										<label class="mb-2" >level</label>
										<select name="level" class="form-select" aria-label="Default select example" ">
											
											<option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
											
										  </select>
									</div>
									
                                  <button type="submit" class="btn btn-primary ">kirim</button>

						    </div><!--//app-card-body-->
                        </form>		
						</div><!--//app-card-->
					
						
			        </div><!--//tab-pane-->
			        
			       
			        
			       
			       
				</div><!--//tab-content-->
				
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	 
	    
    </div><!--//app-wrapper-->    					

 
 
@endsection