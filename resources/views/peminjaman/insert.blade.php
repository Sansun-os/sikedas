@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Tambah Peminjaman Kendaraan</h1>
				    </div>
				
			    </div><!--//row-->
			   
				
				<div class="tab-content" id="orders-table-tab-content s">
			        <div class="tab-pane fade show active w-75 " id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
							<form action="insert" method="POST" enctype="multipart/form-data">
                                @csrf
						    <div class="app-card-body p-md-3 ">
                                <div class="form-group w-100 mb-3  ">
                                     <label class="mb-2" >Nama</label>
                                    <input type="hidden"  name="userId" id="userId" value="{{ $userId }}">
                                    <input type="hidden"  name="kendaraanId" id="kendaraanId">
                                    <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $userName }}" readonly >
                                  </div>
                                <div class="form-group w-100 mb-3    ">
                                    <label class="mb-2" >Pilih Kendaraan</label>
                                    <select name="jenis_id" class="form-select" aria-label="Default select example" id="pilihKendaraan"  >
                                      </select>
                                  </div>
                               
                                  <div class="form-group w-100  mb-3 ">
                                   
                                    <input type="text" name="kendaraan_id" hidden class="form-control" id="idKendaraan" readonly />
                                    
                                  </div>
                                  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Jenis</label>
                                    <input type="text" name="jenis_id" class="form-control" id="jenisKendaraan" readonly />
                                    
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
                                <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Tujuan</label>
                                    <input type="text" id="tujuan"  name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" value="{{ old('tujuan') }}"  >
                                    @error('tujuan')
                                        <div class="invalid-feedback ">{{ $message }}</div>
                                    @enderror
                                    
                                  </div>
                                  <div class="form-group w-100  mb-3 ">
                                    <label class="mb-2" >Keterangan</label>
                                    <select name="keterangan" id="keterangan" class="form-select" aria-label="Default select example" id="keterangan"  >
                                        <option value="dipinjam" {{ old('jenis') == 'Roda Empat' ? 'selected' : '' }}>Dipinjam</option>
                                        
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
@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
console.log("first")

const getJenisKendaraan = async () => {
  $.ajax({
    type: "get",
    url: "get-kendaraan",
    success: function (response) {
      console.log(response)
      if(response.code == "00"){
        $("#pilihKendaraan").append("<option disabled selected>pilih kendaraan</option>")
        for(let data of response.data){
          $("#kendaraanId").val(data.id)
          $("#pilihKendaraan").append(`
            <option value="${data.id}">${data.id_jenis} - ${data.id_merk} - ${data.id_tipe} - ${data.id_nopolisi}</option>
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
        $("#idKendaraan").val(response.data.id)
        $("#jenisKendaraan").val(response.data.id_jenis)
        $("#merkKendaraan").val(response.data.id_merk)
        $("#tipeKendaraan").val(response.data.id_tipe)
        $("#noPolisi").val(response.data.id_nopolisi)
      }
    }
  });
})

getJenisKendaraan();
</script>
@endpush