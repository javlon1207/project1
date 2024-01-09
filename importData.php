<?php
include 'vendor/autoload.php';
include 'config.php';



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

  for($i=0; $i<=1; $i++)
  array_shift($data);

  for($j=0; $j<=1; $j++)
  array_pop($data);

  // print_arr($data);
  echo "<table border=1>";
  foreach($data as $row)
  {
    $nomerVagona  = $row[0];
    $kodDorogi   = $row[1];
    $kodStansii = $row[2];
    $StansiyaOtpr = $row[3];
    $kodDorogiNaz = $row[4];
    $kodStansiNaz = $row[5];
    $stansiyaNaz = $row[6];
    $dataOtpavki = $row[7];
    $dataPoslOper = $row[8];
    $kodDorogiPoslOper = $row[9];
    $kodStansiPoslOper = $row[10];
    $StansiyaPoslOper = $row[11];
    $operatsiya = $row[12];
    $rastStansiNaznach = $row[13];
    $gruz = $row[14];
    $indexPoezda = $row[15];
    $glavnayaGruppa = $row[16];
    $vesGruza = $row[17];
    $primechaniye = $row[18];
    $dataPrimPribitiya = $row[19];
    $sostSlejeniya = $row[20];
    $dniBezDvijeniya = $row[21];
    $kodOperatsii = $row[22];
    $tipSlejeniya = $row[23];
    $nomerPlatformi = $row[24];
    $comments = $row[25];
    $konteynerVagone = $row[26];

     echo "<tr>";
        echo "<td>".$nomerVagona."</td>";
        echo "<td>".$kodDorogi."</td>";
        echo "<td>".$dataPoslOper."</td>";
        echo "<td>".$kodDorogiPoslOper."</td>";
        echo "<td>".$StansiyaPoslOper."</td>";
        echo "<td>".$operatsiya."</td>";
        echo "<td>".$rastStansiNaznach."</td>";
        echo "</tr>";


        $sql  = "INSERT INTO `utytable`(`nomerVagona`, `kodDorogi`, `kodStansii`, `StansiyaOtpr`, `kodDorogiNaz`, `kodStansiNaz`, `stansiyaNaz`, `dataOtpavki`, `dataPoslOper`, `kodDorogiPoslOper`, `kodStansiPoslOper`, `StansiyaPoslOper`, `operatsiya`, `rastStansiNaznach`, `gruz`, `indexPoezda`, `glavnayaGruppa`, `vesGruza`, `primechaniye`, `dataPrimPribitiya`, `sostSlejeniya`, `dniBezDvijeniya`, `kodOperatsii`, `tipSlejeniya`, `nomerPlatformi`, `comments`, `konteynerVagone`) 
        VALUES (
          '$nomerVagona', '$kodDorogi', '$kodStansii', '$StansiyaOtpr', '$kodDorogiNaz', '$kodStansiNaz', '$stansiyaNaz', '$dataOtpavki', '$dataPoslOper', '$kodDorogiPoslOper', '$kodStansiPoslOper', '$StansiyaPoslOper', '$operatsiya', '$rastStansiNaznach', '$gruz', '$indexPoezda', '$glavnayaGruppa', '$vesGruza', '$primechaniye', '$dataPrimPribitiya', '$sostSlejeniya', '$dniBezDvijeniya', '$kodOperatsii', '$tipSlejeniya', '$nomerPlatformi', '$comments', '$konteynerVagone')";

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
