<!DOCTYPE html>
<html>
	<head>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<title>Laravel</title>
	</head>
	<body>
		<div class="container">
			<div class="content" style="margin:30px">
				<div>
					<form class="form-inline" style="margin:20px">
						<div class="form-group">
							<label for="select_month">Select month : </label>
							<select class="form-control" id="select_month" >
								@foreach($output as $key=>$value)
									<option value="{{ $key }}">{{ $key }}</option>
								@endforeach
							</select>
							<a href="javascript:void(0)" class="btn btn-default" id="update_tables_btn">Update</a>
						</div>
					</form>
				</div>
				<div id="user_table">
					@foreach($output as $date=>$value)
						<table class="table table-condensed col-xs-10" id="{{ 'table_date_'.$date }}">
							@foreach ($value as $key => $info) 
								<tr>
									@foreach ($info as $info_key => $info_value)
										<th>{{ $info_key }}</th>
									@endforeach
								</tr>
								<?php break; ?>
							@endforeach
							@foreach ($value as $key => $info) 
								<tr>
									@foreach ($info as $info_key => $info_value)
										<td>{{ $info_value }}</td>
									@endforeach
								</tr>
							@endforeach
						</table>
					@endforeach
				</div>
			</div>
		</div>
		<script>
		$('#update_tables_btn').on('click',function(){
			var value = $('#select_month').val();
			$("#user_table table").hide();
			$("#table_date_"+value).show();
		});
		</script>
	</body>
</html>
