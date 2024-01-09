<!DOCTYPE html>
<html lang="en">
<head>
	<title>Сергели терминали</title>
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
		table{
			text-align:center;
		}
	</style>
</head>
<body>

<header>
    <ul class="nav justify-content-end">
        <!-- Button trigger modal -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">Слежение вагонов</a>			
    </li>
    <li class="nav-item">
        <a class="nav-link" href="sprVagonov.php">Справочник вагонов</a>
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
