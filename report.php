<section id="bg-bus" class="d-flex align-items-center">
    <main id="main">
        <div class="container">
            <div class="col-lg-12">
				<div class="row">
					<div class="col-md-12">
						<button class="float-right btn btn-primary btn-sm" type="button" id="report">Generate Report</button>
					</div>
				</div>
				<div class="row">
					&nbsp;
				</div>

                <div class="row">
                    <div class="card col-md-12">  
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="user-field">
                                <thead>
                                    <tr>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Bus Name</th>
                                        <th class="text-center">Bus Number</th>
                                        <th class="text-center">Dep. Time</th>
                                        <th class="text-center">Terminal Name</th>
                                        <th class="text-center">Num Of Tickets</th>
										<th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
  
        </div>
    </main>
</section>

<script>
    	window.load_user = function(){
		$('#user-field').dataTable().fnDestroy();
		$('#user-field tbody').html('<tr><td colspan="4" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_report.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#user-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+resp[k].customer_name+'</td>')
                                    tr.append('<td class="text-center">'+resp[k].bus_name+'</td>')
                                    tr.append('<td class="text-center">'+resp[k].bus_number+'</td>')
									tr.append('<td class="text-center">'+resp[k].departure_time+'</td>')
                                    tr.append('<td class="text-center">'+resp[k].terminal_name+'</td>')
									tr.append('<td>'+resp[k].num_of_tickets+'</td>')
									//The print button
									tr.append('<td><center><button class="btn btn-sm btn-primary print mr-2" data-id="'+resp[k].id+'">Print</button></center></td>')
									$('#user-field tbody').append(tr)
								})

							}else{
								$('#user-field tbody').html('<tr><td colspan="4" class="text-center">No data.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#user-field').dataTable()
				manage();
			}
		})
	}

	$(document).ready(function(){
		load_user()
	})


</script>