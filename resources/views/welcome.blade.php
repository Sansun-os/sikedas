@extends('layout.app')
@section('content')

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Dashboard</h1>
			    <!--//app-card-->
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Data Kendaraan</h4>
							    <div class="stats-figure">{{ $kendaraanCount }}</div>
								<div class="stats-meta">
								    New</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Data Pegawai</h4>
							    <div class="stats-figure">{{ $pegawaiCount }}</div>
								<div class="stats-meta">
								    New</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Data Peminjaman</h4>
							    <div class="stats-figure">{{ $peminjamanCount }}</div>
							    <div class="stats-meta">
								    New</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Riwayat Pemakaian</h4>
							    <div class="stats-figure">{{ $peminjamanCount }}</div>
							    <div class="stats-meta">New</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    <!--//row-->
			    <!--//row-->
				
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									
								</div>
								<div class="panel-body">
									<div id="chart1"></div>
								</div>
							</div>
						</div>
						
					</div>
					
				
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
      
	   
	    
    </div><!--//app-wrapper-->    					

 
   
	<script type="text/javascript">
		jQuery(function ($) {
			var data1 = [12, 3, 4, 2, 12, 3, 4, 17, 22, 34, 54, 67];
			var data2 = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7];
			var data3 = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];
			var data4 = [13, 19, 112, 114, 212, 332, 435, 132, 67, 45, 55, 7];
				
			$("#chart1").shieldChart({
				exportOptions: {
					image: false,
					print: false
				},
				axisY: {
					title: {
						text: "Break-Down for selected quarter"
					}
				},
				dataSeries: [{
					seriesType: "line",
					data: data1
				}]
			});
	
			
		});
	</script>
</body>
</html> 
@endsection
