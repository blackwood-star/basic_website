<?php
    $name = $email = $subject = $message = "";

    if($_SERVER["REQUEST_METHOD"] == true) {
        $name = setfunction($_POST['name']);
        $email = setfunction($_POST['email']);
        $subject = setfunction($_POST['subject']);
        $message = setfunction($_POST['message']);
    }

    function setfunction($data) {
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }
    print_r($name);
    print_r($email);

    if(!empty($name && $email && $subject && $message)){
        require dirname(__FILE__) . "/connection.php";
        // echo "ther is no issues";
    }else{
        echo "not success";
    }
?>