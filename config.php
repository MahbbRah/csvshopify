<?php
	try{
		$db = new PDO("sqlite:".__DIR__."/inc/database.sqlite");
		// echo 'Database Connected Successfully <br>';
	}catch(PDOException $e){
		echo 'Something Wrong '.$e->getMessage();
	}

	function getCreds($db) {
        $stmt = $db->query('SELECT * FROM config');
        $projects = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $projects[] = [
                'shopify_url' => $row['shop_url'],
                'shopify_key' => $row['shop_key'],
                'shopify_pass' => $row['key_pass']
            ];
        }
        return $projects;
	}
	$config = getCreds($db)[0];
	
	/* Initializing the database first to use */
	// $prpare = $db->prepare(
	//      'CREATE TABLE "config" (
	//      "name" VARCHAR(100) NOT NULL UNIQUE, 
	//      "shop_url" VARCHAR(100) NOT NULL, "shop_key" VARCHAR(100) NOT NULL, "key_pass" VARCHAR(100) NOT NULL);
   	//    ');
	// $prpare->execute();

	/* Insert Query  */
	// $sql = "INSERT INTO config (name, shop_url, shop_key, key_pass) VALUES(:name, :url, :key, :pass)";
	// $con = $db->prepare($sql);
	// $con->execute([
	// 	":name"   => "shopify_credentials",
	// 	":url"   => "https://virtumall.myshopify.com",
	// 	":key"   => "425201bb46caf1de7343e5e2563fc535",
	// 	":pass"   => "2f983ef3384cece893d372f143fd48ad"
	// 	]);
	
		
	/* Update Query Query  */
	// $sql = "UPDATE config SET shop_url=:url, shop_key=:key, key_pass=:pass WHERE name='shopify_credentials'";
	// $con = $db->prepare($sql);
	// $con->execute([
	// 	":url"   => "https://virtumall.myshopify.com",
	// 	":key"   => "425201bb46caf1de7343e5e2563fc535",
	// 	":pass"   => "2f983ef3384cece893d372f143fd48ad"
	// 	]);

?>