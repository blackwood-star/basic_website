<?php
    // DB CONNECTION
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mycompany";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
        $sql = "SELECT customername, customeremail, customersubject, customermessages FROM customers WHERE customeremail='".$email."'";
        $create = "INSERT INTO customers (customername, customeremail, customersubject, customermessages) VALUES ('".$name."', '".$email."', '".$subject."', '".$message."')";
        $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    // echo "Name : " . $row['customername'] . "<br>Email : " . $row['customeremail'] . "<br>Subject : " . $row['customersubject'] . "<br>messages : " . $row['customermessages'] . "<br>";
                    // $session['form_status'] = "Existing customer";
                    ?>
                        <script>
                            alert("Existing contact <?php print_r($name);?>");
                        </script>
                    <?php
                
                }
            }else{
                if($conn->query($create) == TRUE){
                    ?>
                        <script>
                            alert("Your request has sent successfully <?php print_r($name);?>");
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Ther is an error while creating a contact");
                        </script>
                    <?php
                }
            }
    }   
    $conn->close();
?>