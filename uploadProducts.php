<?php

	$message = '';
	$progress = null;
	$totalItem =  null;
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// var_dump($_FILES['csvFile']);
		// array(5) { ["name"]=> string(19) "csv_sample_data.csv" ["type"]=> string(8)
		// 	 "text/csv" ["tmp_name"]=> string(14) "/tmp/phpkVIiyo" ["error"]=> int(0) ["size"]=> int(2538) } 
	ini_set('max_execution_time', 0);
	require 'config.php';
	require 'vendor/autoload.php';

	$config = array(
	    'ShopUrl' => $config['shopify_url'],
	    'ApiKey' => $config['shopify_key'],
	    'Password' => $config['shopify_pass'],
	);

	$shopify = new PHPShopify\ShopifySDK($config);

		$csv =  $_FILES['csvFile'];
		if($csv['error'] === 0) {
			if($csv['type'] == 'text/csv') {

				$csvFile = file($csv['tmp_name']);
				$data = [];
				foreach ($csvFile as $line) {
					$data[] = str_getcsv($line);
				}
				$rmFirstElement = array_shift($data);				
				$totalItem = count($data);
				foreach ($data as $item) {
					$progress += 1;
					$item1 = $item[19] != ''? $item[19]." ," : "";
					$item2 = $item[20] != ''? $item[20]." ," : "";
					$item3 = $item[21] != ''? $item[21]." ," : "";
					$catitems = $item1.$item2.$item3;

					if($progress < $totalItem) {
						$percent = intval($progress/$totalItem * 100);
						echo '<head> <style>
							#setinner {
								font-size: 8rem;
								color: #fff;
								text-align: center;
								font-weight: bolder;
								margin-top: 15%;
							}
							body {
								background-color: teal;
							}
						</style></head>
						<body> <h2 id="setinner"> </h2>
						<script>
							document.getElementById("setinner").innerHTML = "'.$percent.'%"
						</script>
						</body>';
					} else { echo 'Done'; }

					$product = [
						"title" => $item[1],
						"body_html" => $item[8],
						"tags" => $catitems,
						"images" => [
							["src" => $item[9]],
							["src" => $item[10]],
							["src" => $item[11]],
							["src" => $item[12]],
							["src" => $item[13]]
						],
						"variants" => [
							[
								"grams" => $item[5],
								"weight" => $item[6],
								"weight_unit" => "kg",
								"price" => $item[3],
								"inventory_quantity" => (int)$item[29]
							]

						]

					];
					$shopify->Product->post($product);
					ob_flush(); 
   					flush(); 
				}
			}
		}
	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send your CSV file to upload it on Shopify Store</title>
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
			    		<?php //echo $message ?>
						<h1> <?php echo $progress; ?></h1>
						<h4 class="body-header">Upload CSV data to create Shopify products </h4>
			    		<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="file" name="csvFile" id="file" >
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Upload and create product</button>
							</div>
						</form>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>