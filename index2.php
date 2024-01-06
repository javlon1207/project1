<!DOCTYPE html>
<html lang="en">
<head>
	<title>Справочник вагонов</title>

<script src="../dist/jquery.table2excel.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

	<style>
		.container-fluid{
			margin: 20px auto;
			display: flex;
			 align-content: space-between;
			 width: 95%;
		}
		.search{
			border: 1px solid #e2e2e2;
			width: 300px;
			padding: 10px;
			background: #f2f2f2;
			margin-right: 20px;
		}
		.item{
			display: flex;
			 align-items: center;
		}
		input{
			margin-top:8px;
			margin-right: 5px;
		}
		.result{
			width: auto;
			
		}

	</style>
</head>
<body>
	<a href="import.php" class="btn btn-success mt-4">IMPORT file</a>
	<div class="container-fluid">
		

		<div class="search">
			<form id="form" method="POST">
				<textarea name="data" cols="30" rows="10" id="data"></textarea>
				<input id="search" type="submit" class="btn btn-success btn-sm">
			</form>
		</div>
		<div class="result">
			<table class="table table-striped table-bordered" id="tblCustomers">
				<tr>
					<th >№ Вагона</th>
					<th>Собственник (ЖА)</th>
					<th>Предприятие владелец</th>
					<th>Арендатор</th>
					<th>Дата окончания аренды</th>
					<th>Клиент</th>
					<th>Длина вагона</th>
				</tr>
				<tbody class="tbody">
				</tbody>
									
			</table>
			<input type="button" id="btnExport" value="Export" />
		</div>

	</div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
  </script>
    <script src="dist/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#tblCustomers").table2excel({
                    filename: "Table.xls"
                });
            });
        });
  


	 
	$("#form").on( "submit", function(e){
	e.preventDefault();
  	var data= $('#data').val();
  		if(data != '')
	  {
	   $.ajax({
	    url:"search.php",
	    method:"POST",
	    data:$('#form').serialize(),
	    dataType:"JSON",
	    success:function(data)
	    {     
		     output = '';
		     for(i in data){
		     	output += `
		     		<tr>
		     		<td>${data[i].nomerVagona}</td>
		     		<td>${data[i].sobstvennik}</td>
		     		<td>${data[i].vladelets}</td>
		     		<td>${data[i].arendator}</td>
		     		<td>${data[i].dataOkon}</td>
		     		<td>${data[i].klient}</td>
		     		<td>${data[i].dlinaVagona}</td></tr>`;
		     }
		     document.querySelector('.tbody').innerHTML = output;
		     
	    }
	   })
	  }
  else
    {
     alert("Please Select Employee");
     $('#employee_details').css("display", "none");
    }
   });
  

</script>

	
</body>
</html>