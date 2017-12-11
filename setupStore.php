<?php 

	require 'config.php';
	$message = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {


		$app_url = $_POST['store_url'];
		$app_key = $_POST['private_key'];
		$app_pass = $_POST['key_password'];

		/* Update Query Query  */
		$sql = "UPDATE config SET shop_url=:url, shop_key=:key, key_pass=:pass WHERE name='shopify_credentials'";
		$con = $db->prepare($sql);
		$isAdded = $con->execute([
					":url"   => $app_url,
					":key"   => $app_key,
					":pass"   => $app_pass
					]);
		if($isAdded) {
			$message = '<div class="alert alert-info" role="alert">
				<strong>Well done!</strong> You successfully updated your shopify credentials.
				</div>';
		}
	}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Setup your Shopify Store</title>
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
				<div class="col-md-2"></div>
			    <div class="col-md-8">
			    	<div class="welcome_home">
						<?php echo $message ?>
						<h4 class="body-header">Update your shopify credentials: </h4>
			    		<form method="POST">
							<div class="form-group">
								<label class="col-form-label">Shopify Store URL</label>
								<input type="text" class="form-control" name="store_url" value=<?php echo $config['shopify_url'] ?> placeholder="https://storeurl.com">
							</div>
							<div class="form-group">
								<label class="col-form-label" >Shopify Private Key</label>
								<input type="text" class="form-control" value=<?php echo $config['shopify_key'] ?>  name="private_key" placeholder="Another input">
							</div>
							<div class="form-group">
								<label class="col-form-label">Shopify key Password</label>
								<input type="text" class="form-control" value=<?php echo $config['shopify_pass'] ?>  name="key_password" placeholder="Another input">
							</div>
							<div class="form-group">
								  <button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>