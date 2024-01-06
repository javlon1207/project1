<!DOCTYPE html>
<html lang="en">
<head>
	<title>Справочник вагонов</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

	<script src="dist/table2excel.js" type="text/javascript"></script>

	<style>
		*{
			margin: 0;
			padding: 0;
			font:Roboto;
			font-weight: 400;
			font-size: 14px;
			color: #000;
		}
		
		.container-fluid{
			
		}
		.content{
			margin: 20px auto;
			display: flex;
			 align-content: space-between;
			 width: 95%;

		}
		.search{
			border: 1px solid #e2e2e2;
			width: 200px;
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
		textarea{
			padding:5px;
		}

		tr>th{
			text-align: center;
			font-weight: 700;
		}

		.nav-item{
			padding: 5px 0;
		}

		.nav-link{
			color: #000;
			font-weight: 600;
			border-left:1px solid rgba(99,99,99,0.2);
			text-transform: uppercase;
		}
		.nav{
			background: #e3e3e3;
		}
		

	</style>
</head>
<body>
	<header>
		<ul class="nav justify-content-end">
			<!-- Button trigger modal -->
		<li class="nav-item">
			<a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Импорт данных
			</a>
		</li>
		<li class="nav-item">
		    <a class="nav-link" href="#">Справка вагонов</a>
		</li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Добавить инфо БД Вагон</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Слежение за вагонами</a>
		  </li> 
		  <li class="nav-item">
		    <a class="nav-link" href="#">Список Вагонов в терминале</a>
		  </li> 
		  <li class="nav-item">
		    <a class="nav-link" href="#">Информации о вагонах</a>
		  </li>		 
		</ul>
	</header>
	<div class="container-fluid">
			<div class="content">
		<div class="search">
			<form id="form" method="POST">
				<textarea name="data" cols="22" rows="22" id="data"></textarea>
				<input id="search" type="submit" class="btn btn-success" value="Поиск вагонов">
			</form>
		</div>
		<div class="result col-10">
			<table class="table table-striped table-bordered" id="tblCustomers">
				<tr>
					<th >№</th>
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
			<input type="button" id="btnExport" value="Export" / class="btn btn-success">
		</div>

		</div>
			
			
		</div>

	</div>

	

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="panel panel-default">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <td width="25%"><input type="submit" name="import" 
						id="import" class="btn btn-success" value="Импорт данных" /></td>
                  </tr>
                </table>
              </form>
           <br />

          </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="dist/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
            	var time = new Date()
            	var time = time.getTime()
            	let fullTime = new Date(time).toDateString()
                $("#tblCustomers").table2excel({
                    filename: fullTime +  "_data.xls"
                });
            });
        });

		const exampleModal = document.getElementById('exampleModal')
		exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  		const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  		const recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  		const modalTitle = exampleModal.querySelector('.modal-title')
  		const modalBodyInput = exampleModal.querySelector('.modal-body input')
		modalTitle.textContent = `Окно импорта данных`
  	modalBodyInput.value = recipient
});


$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importPrixod.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
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
		     k=1
		     for(i in data){
		     	output += `
		     		<tr>
		     		<td>${k}</td>
		     		<td>${data[i].nomerVagona}</td>
		     		<td>${data[i].sobstvennik}</td>
		     		<td>${data[i].vladelets}</td>
		     		<td>${data[i].arendator}</td>
		     		<td>${data[i].dataOkon}</td>
		     		<td>${data[i].klient}</td>
		     		<td>${data[i].dlinaVagona}</td></tr>`;
		     		k++;
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
 	