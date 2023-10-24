<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming using PHP - Coursework 1 - Task 2</title>
</head>
<body>
	<header>   
        <h1>Web Programming using PHP - Coursework 1 - Task 2</h1>
	</header>
	<main>


    <?php
$passwords = ['Aaaa£1111','A\123cGabc','%abcdef123','Aa$aaOOOO','$0123456O','saAa1#&','A^BCO','#PHPisC00L#'];

foreach ($passwords as $pwd) {
    $valid = true;
    $errors = [];
    
    if (strlen($pwd) < 8) {
        $errors[] = 'less than 8 characters ';
        $valid = false;
    }
    
    $lowercase = false;
    $uppercase = false;
    $numeric = false;
    $specialChars = false;
    
    for ($i = 0; $i < strlen($pwd); $i++) {
        $char = $pwd[$i];
        
        if (ctype_lower($char)) {
            $lowercase = true;
        } elseif (ctype_upper($char)) {
            $uppercase = true;
        } elseif (ctype_digit($char)) {
            $numeric = true;
        } elseif (strpos('$#@%&£', $char) !== false) {
            $specialChars = true;
        }
        
        if ($lowercase && $uppercase && $numeric && $specialChars) {
            break;
        }
    }
    
    echo "<p>Password: $pwd - ";
    
    if (!$lowercase) {
        $errors[] = ' no lowercase character ';
        $valid = false;
    }
    
    if (!$uppercase) {
        $errors[] = ' no uppercase character';
        $valid = false;
    }
    
    if (!$numeric) {
        $errors[] = ' no numeric character';
        $valid = false;
    }
    
    if (!$specialChars) {
        $errors[] = ' no special character';
        $valid = false;
    }
    
    if (!$valid) {
        echo "INVALID - " . implode(', ', $errors) . "</p>";
    } else {
        echo "VALID </p>";
    }
}
?>
