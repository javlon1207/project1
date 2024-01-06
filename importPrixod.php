<?php

//import.php

include 'vendor/autoload.php';

$connect = mysqli_connect('localhost', 'root', 'root', 'xurshid');

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  // for($i=0; $i<4; $i++)
  // array_shift($data);

  // for($j=1; $j<=4; $j++)
  // array_pop($data);

  // print_arr($data);
  echo "<table border=1>";
  foreach($data as $row)
  {

    $nomerVagona  = $row[0];
    $sobstvennik   = addslashes($row[1]);
    $vladelets = addslashes($row[2]);

    $arendator  = addslashes($row[3]);
    $dataOkon  = $row[4];
    $klient  = $row[5];
    $dlinaVagona  = $row[6];
    

     echo "<tr>";
        echo "<td>".$nomerVagona."</td>";
        echo "<td>".$sobstvennik."</td>";
        echo "<td>".$vladelets."</td>";
        echo "<td>".$arendator."</td>";
        echo "<td>".$dataOkon."</td>";
        echo "<td>".$klient."</td>";
        echo "<td>".$dlinaVagona."</td>";
        echo "</tr>";

        $sql = "INSERT INTO vagon(`nomerVagona`, `sobstvennik`, `vladelets`, `arendator`, `dataOkon`, `klient`, `dlinaVagona`)
        VALUES (
          '$nomerVagona',
          '$sobstvennik',
          '$vladelets',
          '$arendator',
          '$dataOkon',
          '$klient',
          '$dlinaVagona'
      )";

        $result = mysqli_query($connect, $sql);
        if($resul){
          echo 'Bazaga yozildi!';
        }

  }

  $message = '<div class="alert alert-success">Данные успешно импортированы!</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Разрешено только файлы excel</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Пожалуйста выберите файл...</div>';
}

echo $message;


function print_arr($arr){
  echo '<pre>';
  var_dump($arr);
  echo '</pre>';
}

echo "</table>";
?>
