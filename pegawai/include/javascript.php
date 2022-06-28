<script src="../boostrap/js/jquery-3.3.1.min.js" ></script>
<script src="../boostrap/js/sweetalert.min.js"></script>
<script src="../boostrap/js/app.js"></script>
<!-- <script src="../boostrap/js/app.js"></script> -->

	
	<!-- Data Tables -->
	<script>
	  jQuery(document).ready(function($) {

	    "use strict";

	    $(function() {
	      $('[data-toggle="tooltip"]').tooltip()
	    })

	    $('#scheduleTable').DataTable(); 

	  });

		//------------------------------- RAK 
		function delete_rak(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_RAK',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your RAK has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Unit file is safe!");
	          }
	        });
	    }
	    function edit_rak(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_RAK',
	          type: 'post',
	          data: {id: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditRAK').html(body_Edit);
	            // Display Modal
	            $('#editRAK').modal('show');
	          }
	        });
	    }
	    //------------------------------- END OF RAK 
	    //
	   
	   //------------------------------- PROYEK 
		function delete_proyek(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_PROYEK',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your Proyek has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Unit file is safe!");
	          }
	        });
	    }
	    function edit_proyek(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_PROYEK',
	          type: 'post',
	          data: {id: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditProyek').html(body_Edit);
	            // Display Modal
	            $('#editProyek').modal('show');
	          }
	        });
	    }
	    //------------------------------- END OF PROYEK 

	    //------------------------------- DOKUMEN 
		function change_dokumen(id){
	       swal({
	        title: "Anda yakin ingin merubah status dokumen ini?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_DOKUMEN',
	              data: {id_dokumen:id},
	              success: function (data) {
	                  swal(
	                      'Status',
	                      'Data dokumen berhasil diubah.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Unit file is safe!");
	          }
	        });
	    }
	    function edit_dokumen(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_DOKUMEN',
	          type: 'post',
	          data: {id_dokumen: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditDokumen').html(body_Edit);
	            // Display Modal
	            $('#editdokumen').modal('show');
	          }
	        });
	    }
	    //------------------------------- END OF DOKUMEN

	    //------------------------------- MAP 
		function delete_map(id){
	       swal({
	        title: "Anda yakin ingin menghapus data ini?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_MAP',
	              data: {id_map:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Data map berhasil dihapus.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Unit file is safe!");
	          }
	        });
	    }
	    function edit_map(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_MAP',
	          type: 'post',
	          data: {id_map: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditMap').html(body_Edit);
	            // Display Modal
	            $('#editmap').modal('show');
	          }
	        });
	    }
	    //------------------------------- END OF MAP

	    //------------------------------- BERKAS 
		function delete_berkas(id){
	       swal({
	        title: "Anda yakin ingin menghapus data ini?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_BERKAS',
	              data: {id:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Data berkas berhasil dihapus.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });
              }         
              }); 
          } else {
            swal("Your unit file is safe!");
          }
        });
    }
    function edit_berkas(id){
      $.ajax({
          url: 'controller/master_p.php?role=EDIT_BERKAS',
          type: 'post',
          data: {id: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalEditBerkas').html(body_Edit);
            // Display Modal
            $('#editBerkas').modal('show');
          }
        });
    }
	function detail_berkas(id){
      $.ajax({
          url: 'controller/master_p.php?role=DETAIL_BERKAS',
          type: 'post',
          data: {id: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalDetailBerkas').html(body_Edit);
            // Display Modal
            $('#detailBerkas').modal('show');
          }
        });
    }

    //--------------------------------- informasi
     function delete_informasi(id){
       swal({
        title: "Are you sure?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
              type: 'post',
              url: 'Controller/master_p.php?role=DELETE_INFORMASI',
              data: {idx:id},
              success: function (data) {
                  swal(
                      'Deleted!',
                      'Your Information has been deleted.',
                      'success'
                    ).then(function(){
                      location.reload();
                   });

              }         
              }); 
          } else {
            swal("Your Information file is safe!");
          }
        });
    }
    function detail_informasi(id){
      $.ajax({
          url: 'controller/master_p.php?role=DETAIL_INFORMASI',
          type: 'post',
          data: {id: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalDetailInformasi').html(body_Edit);
            // Display Modal
            $('#detailInformasi').modal('show');
          }
        });
    }
    function edit_informasi(id){
      $.ajax({
          url: 'controller/master_p.php?role=EDIT_INFORMASI',
          type: 'post',
          data: {id: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalEditInformasi').html(body_Edit);
            // Display Modal
            $('#editInformasi').modal('show');
          }
        });
    }

    //--------------------------------------------------- Admin 
    function edit_admin(id){
      $.ajax({
          url: 'controller/profile_p.php?role=EDIT_ADMIN',
          type: 'post',
          data: {id_admin: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalEditAdmin').html(body_Edit);
            // Display Modal
            $('#editAdmin').modal('show');
          }
        });
    }

	 //--------------------------------------------------- Pegawai 
	 function edit_pegawai(id){
      $.ajax({
          url: 'controller/profile_p.php?role=EDIT_PEGAWAI',
          type: 'post',
          data: {id_pegawai: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalEditPegawai').html(body_Edit);
            // Display Modal
            $('#editPegawai').modal('show');
          }
        });
    }

    //----------------------------------- laporan
    function view_laporan(id){
      $.ajax({
          url: 'controller/master_p.php?role=VIEW_LAPORAN',
          type: 'post',
          data: {id: id},
          success: function(body_Edit){ 
           
            // Add response in Modal body
            $('.modalViewLaporan').html(body_Edit);
            // Display Modal
            $('#viewLaporan').modal('show');
          }
        });
    }
    function delete_laporan(id){
       swal({
        title: "Are you sure?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
              type: 'post',
              url: 'Controller/master_p.php?role=DELETE_LAPORAN',
              data: {idx:id},
              success: function (data) {
                  swal(
                      'Deleted!',
                      'Your menu has been deleted.',
                      'success'
                    ).then(function(){
                      location.reload();
                   });

              }         
              }); 
          } else {
            swal("Your menu file is safe!");
          }
        });
    }


	</script>
	<!-- End Data Tables -->
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>