<?php 

	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'root';
	$db_name = 'php.auth.db';

	// Always start this first
	session_start();

	if ( ! empty( $_POST ) ) {

	    if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
	        
	        // Getting submitted user data from database
	        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
	        
	        $stmt = $con->prepare("SELECT * FROM users WHERE email = ? && password = ?");
	        
	        $stmt->bind_param('ss', $_POST['email'], $_POST['password']);
	        
	        $stmt->execute();
	        
	        $result = $stmt->get_result();
	    	
	    	$user = $result->fetch_object();
	    
	    	if ($user) {
	    		// Verify user password and set $_SESSION
	    		$_SESSION['user_id'] = $user->id;
		    	header("Location: /home.php"); /* Redirect browser */
	    	} else {

	    		$errors[] = 'Invalid Credentials.';
	    		
	    		$_SESSION['errors'] = $errors;

		    	header("Location: /"); /* Redirect browser */
	    	}
	    	
			exit();
	    } else {
	    	if (! isset( $_POST['email'] )) {
	    		$errors[] = 'Email is required.';
	    	}

	    	if (! isset( $_POST['password'] )) {
	    		$errors[] = 'Password is required.';
	    	}

	    	$_SESSION['errors'] = $errors;
	    }
	}

	header("Location: /"); /* Redirect browser */
	exit();