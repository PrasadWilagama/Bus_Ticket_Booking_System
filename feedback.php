<section id="bg-bus" class="d-flex align-items-center">
    <main id="main">
        <div class="container">
            <div class="col-lg-12">

                <div class="row">
                    <div class="card col-md-12">
                        
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="user-field">
                                <thead>
                                    <tr>
                                        <th class="text-center">Feedback ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Comments</th>
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
			url:'load_feedback.php',
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
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+resp[k].feedback_ID+'</td>')
									tr.append('<td class="text-center">'+resp[k].name+'</td>')
									tr.append('<td>'+resp[k].comment+'</td>')
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