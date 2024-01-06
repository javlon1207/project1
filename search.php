<?

	$array = explode("\r\n", $_POST["data"]);

	$str = implode($array,",");

	$str1 = rtrim($str, ", ");

	$connect = mysqli_connect('localhost', 'root', 'root', 'xurshid');
	$sql = "SELECT * FROM vagon WHERE nomerVagona IN ($str1)";

	$result = mysqli_query($connect, $sql);

	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

	exit(json_encode($data));
