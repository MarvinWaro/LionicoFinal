<?php
    $page_title = 'Lionico - Login';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    $accounts = array(
        "user1" => array(
            "firstname" => 'Jaydee',
            "lastname" => 'Ballaho',
            "type" => 'admin',
            "username" => 'jaydee',
            "password" => 'jaydee'
        ),
        "user2" => array(
            "firstname" => 'Root',
            "lastname" => 'Root',
            "type" => 'admin',
            "username" => 'root',
            "password" => 'root'
        ),
        "user3" => array(
            "firstname" => 'Robin',
            "lastname" => 'Almorfi',
            "type" => 'staff',
            "username" => 'robin',
            "password" => 'robin'
        )
    );
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        foreach($accounts as $keys => $value){
            //check if the username and password match in the array
            if($username == $value['username'] && $password == $value['password']){
                //if match then save username, fullname and type as session to be reused somewhere else
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                $_SESSION['user_type'] = $value['type'];
                //display the appropriate dashboard page for user
                if($value['type'] == 'admin'){
                    header('location: ../admin/dashboard.php');
                }else{
                    header('location: ../faculty/faculty.php');
                }
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

    require_once '../includes/header.php';

?>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <img class="lion" src="../img/lion2.png" alt="lion-head">
                <span class="logo-name">Lionico Barber</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <a class="create" href="#">Create an Account</a>
            <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
<?php
    require_once '../includes/footer.php';
?>