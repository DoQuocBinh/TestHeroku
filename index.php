<!DOCTYPE html>
<html>
<head>

	<title>
	--Teacher changes 10-10-2019--
	Hello world today 8-Oct-2019 Channged by Nam</title>

	<title>Hello world today 8-Oct-2019 Channged by NamHandsome v2</title>

</head>
<body>
	<?php  
		// $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=GWCourses', 'postgres', '');
		// echo "done";

		$db = parse_url(getenv("DATABASE_URL"));
		$pdo = new PDO("pgsql:" . sprintf(
		    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
		    $db["host"],
		    $db["port"],
		    $db["user"],
		    $db["pass"],
		    ltrim($db["path"], "/")
		));
		
		$sql = "SELECT studentname, course FROM registercourse";
		$stmt = $pdo->prepare($sql);
		//Thiết lập kiểu dữ liệu trả về
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
				
	?>
	<ul>
		<?php  
			foreach ($resultSet as $row) {
			echo '<li>' .
				$row['studentname'] . ' --' . $row['course'] 
				. '</li>';
			}
		?>
	</ul>

</body>
</html>
