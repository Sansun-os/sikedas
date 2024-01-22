@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Edit Data Kendaraan</h1>
				    </div>
				
			    </div><!--//row-->
			   
				
				<div class="tab-content" id="orders-table-tab-content s">
			        <div class="tab-pane fade show active w-75 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							<form action="{{ route('kendaraanupdate',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
						    <div class="app-card-body p-md-3 ">
                  <div class="form-group w-100  mb-3 ">
                    <label class="mb-2" >jenis</label>
                    <input type="text" name="id_jenis" class="form-control @error('id_jenis') is-invalid @enderror" value="{{old('id_jenis', $data->id_jenis) }}"  >
                    @error('id_jenis')
                        <div class="invalid-feedback ">{{ $message }}</div>
                    @enderror
                    
                  </div>
                  <div class="form-group w-100  mb-3 ">
                    <label class="mb-2" >merk</label>
                    <input type="text" name="id_merk" class="form-control @error('id_merk') is-invalid @enderror" value="{{old('id_merk', $data->id_merk) }}"  >
                    @error('id_merk')
                        <div class="invalid-feedback ">{{ $message }}</div>
                    @enderror
                    
                  </div>
                  <div class="form-group w-100  mb-3 ">
                    <label class="mb-2" >Tipe</label>
                    <input type="text" name="id_tipe" class="form-control @error('id_tipe') is-invalid @enderror" value="{{old('id_tipe', $data->id_tipe) }}"  >
                    @error('id_tipe')
                        <div class="invalid-feedback ">{{ $message }}</div>
                    @enderror
                    
                  </div>
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >No Polisi</label>
                                    <input type="text"  name="id_nopolisi" class="form-control @error('id_nopolisi') is-invalid @enderror" value="{{old('nama', $data->id_nopolisi) }}"  >
                                    @error('id_nopolisi')
                                        <div class="invalid-feedback ">{{ $message }}</div>
                                    @enderror
                                    
                                  </div>
                                  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Kondisi</label>
                                    <input type="text"  name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" value="{{old('kondisi', $data->kondisi) }}"  >
                                    @error('kondisi')
                                        <div class="invalid-feedback ">{{ $message }}</div>
                                    @enderror
                                    
                                  </div>
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Status</label>
                                    <select name="status" class="form-select" aria-label="Default select example" ">
                                      <option disabled selected >Pilih Status</option>
                                      <option value="Tersedia"  {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                      <option value="Sedang Digunakan" {{ old('status') == 'Sedang Digunakan' ? 'selected' : '' }}>Sedang Digunakan</option>
                                      <option value="Pemeliharaan" {{ old('status') == 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan</option>

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