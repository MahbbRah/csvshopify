<?php
	

	// var_dump($shopify);

	// //Read CSV file and save them on array.
	// $csvFile = file('csvfile.csv');
 //    $data = [];
 //    foreach ($csvFile as $line) {
 //        $data[] = str_getcsv($line);
 //    }

 //    $rmFirstElement = array_shift($data);
    
 //    foreach ($data[50] as $key => $value) {
 //    	echo '<li>'.$key." => ".$value.'</li> <hr>';
 //    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Convert CSV Into SHopify Product</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div id="header_area">
		<div class="container-fluid">
			<div class="row">
			    <div class="col-md-4"></div>
				<div class="col-md-8">
					<div class="header-menu">
						<nav class="nav">
						  <a class="nav-link" href="index.php">Home</a>
						  <a class="nav-link" href="uploadProducts.php">Upload Products</a>
						  <a class="nav-link" href="setupStore.php">Setup Store</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="body_area">
		<div class="container-fluid">
			<div class="row">
			    <div class="col-md-12">
			    	<div class="welcome_home">
			    		<h1>
				    		Welcome, CSV to Shopify product creator
				    	</h1>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>