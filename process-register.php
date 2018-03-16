<?php 

	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'root';
	$db_name = 'php.auth.db';

	// Always start this first
	session_start();

	$errors = [];
	// echo '<pre>' . var_dump($_POST) . '</pre>';
	// die();

	if ( ! empty( $_POST ) ) {
	    if ( isset( $_POST['email'] ) && isset( $_POST['name'] ) && isset( $_POST['password'] ) ) {
	        
	        // Getting submitted user data from database
	        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
	        
	        // $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
	        // Check connection
			if ($con->connect_error) { die("Connection failed: " . $con->connect_error); } 

			//  Prepared statement
	        $statement = $con->prepare("INSERT INTO Users(email, name, password) VALUES (?, ?, ?)");

			$statement->bind_param('sss', $_POST['email'], $_POST['name'], $_POST['password']); 
	      	
	        if ($statement->execute()) {

	        	// Verify user password and set $_SESSION
	    		// SET SESSION
	    		$_SESSION['user_id'] = $con->insert_id;

				$statement->close();
				$con->close();

				header("Location: /home.php"); /* Redirect browser */
				exit();
	        }

    		$errors[] = 'Failed to register. Please try again.';

	    } else {

	    	if (! isset( $_POST['email'] )) {
	    		$errors[] = 'Email is required.';
	    	}

	    	if (! isset( $_POST['name'] )) {
	    		$errors[] = 'Name is required.';
	    	}

	    	if (! isset( $_POST['password'] )) {
	    		$errors[] = 'Password is required.';
	    	}

	    	$_SESSION['errors'] = $errors;

	    	// redirect back to register
	    }
	}
	/* Redirect browser */
	header("Location: /"); 
	exit();