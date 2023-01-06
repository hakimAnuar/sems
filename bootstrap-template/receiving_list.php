<?php 
include 'db_connect.php';
include 'header.php';
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Receiving List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Operator ID</th>
								<th class="text-center">Part Number</th>
								<th class="text-center">Quantity</th>
								<th class="text-center">Receive Date</th>
								<th class="text-center">Expiry Date</th>
								<th class="text-center">Action</th>
							</thead>
							<tbody>
							<?php 
								
								$i = 1;
								$receiving = $conn->query("SELECT * FROM test ORDER BY expiry_date ASC");
								while($row=$receiving->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
                                    <td class=""><?php echo $row['operator_id'] ?></td>
									<td class=""><?php echo $row['part_no'] ?></td>
									<td class=""><?php echo $row['qty'] ?></td>
									<td class=""><?php echo date("d/m/Y",strtotime($row['receive_date'])) ?></td>
									<td class=""><?php echo date("d/m/Y",strtotime($row['expiry_date'])) ?></td>
									
									<td class="text-center">
										<input type="hidden" name="id" value="<?php echo $id; ?>"/>
										<a class="btn btn-sm btn-primary" href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
										<a class="btn btn-sm btn-danger delete_receiving" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
									</td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>