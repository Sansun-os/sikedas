@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Edit Data Pegawai</h1>
				    </div>
				
			    </div><!--//row-->
			   
				
				<div class="tab-content" id="orders-table-tab-content s">
			        <div class="tab-pane fade show active w-75 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							<form action="{{ route('pegawaiupdate',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
						    <div class="app-card-body p-md-3 ">
                            
                                <div class="form-group w-100 mb-3    ">
                                    <label class="mb-2" >Nama Pegawai</label>
                                    <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$data->name) }}" placeholder="Enter Pegawai">
                                    @error('name')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
                                  </div>
								  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Jenis kelamin</label>
                                    <select name="jeniskelamin" class="form-select" aria-label="Default select example" id="jeniskelamin"  >
										{{-- <option selected >Pilih jenis kelamin</option> --}}
										<option value="Laki-Laki" {{ old('jeniskelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
										<option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
										@error('jeniskelamin')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
									  </select>
                                    
                                  </div>
								  <div class="form-group w-100  mb-3 ">
									<label class="mb-2" >Email</label>
									<input type="text" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$data->email) }}" >
									@error('email')
									<div class="invalid-feedback ">{{ $message }}</div>
								@enderror
								</div>
								<div class="form-group w-100  mb-3 ">
									<label class="mb-2" >No HP</label>
									<input type="number" name="nohp"  class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp',$data->nohp) }}" >
									@error('nohp')
									<div class="invalid-feedback ">{{ $message }}</div>
								@enderror
								</div>
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Password</label>
                                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" value="{{ old('password',$data->password) }}" >
                                    @error('password')
										<div class="invalid-feedback ">{{ $message }}</div>
									@enderror
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