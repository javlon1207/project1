<?php
	// include 'config.php';
	include 'functions.php';

	$tableResults = getInfoOperations();
	$i=1;
	
?>
<? include 'header.php'; ?>
	
<div>
    <ul class="nav mt-2" style="background-color:#f2f2f2;">
    <li class="nav-item">
        <a class="nav-link" href="#">УТЙ</a>			
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Кеден</a>
    </li>
        <li class="nav-item">
        <a class="nav-link" href="#">ЛогБокс</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Iron Box</a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="#">Атасу</a>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="#">Артвей</a>
        </li>
		<li class="nav-item">
        <a class="nav-link" href="#">Смартлог</a>
        </li>		 
    </ul>
</div>


<div class="container-fluid">
    <div class="content">


		<div class="search">
			<a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
				 Импорт данных
			</a>
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
					<th>Код дороги отправления</th>
					<th>Код станции отправления</th>
					<th>Станция отправления</th>
					<th>Код дороги назначения</th>
					<th>Код станции назначения</th>
					<th>Станция назначения</th>
					<th>Дата и время отправки</th>
				</tr>
				<tbody class="tbody">
					<? while($row = mysqli_fetch_array($tableResults)): ?>
						<tr>
							<td><?= $i++?></td>
							<td><?= $row[0]; ?></td>
							<td><?= $row[1]; ?></td>
							<td><?= $row[2]; ?></td>
							<td><?= $row[3]; ?></td>
							<td><?= $row[4]; ?></td>
							<td><?= $row[5]; ?></td>
							<td><?= $row[6]; ?></td>
							<td><?= $row[7]; ?></td>
						</tr>
					<? endWhile; ?>
					
				</tbody>
									
			</table>
			<input type="button" id="btnExport" value="Экспорт таблицы" / class="btn btn-success">
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
      url:"importData.php",
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
 	