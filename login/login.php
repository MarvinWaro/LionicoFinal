<?php
    require_once '../classes/database.php';
    $page_title = 'Login';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    $conn=mysqli_connect("localhost","root","","lionico");
     $error="";
    if (isset($_POST['login'])) {
      //echo "<pre>";
      //print_r($_POST);
      $username=mysqli_real_escape_string($conn,$_POST['username']);
      $password=mysqli_real_escape_string($conn,$_POST['password']);
      $sql=mysqli_query($conn,"SELECT * FROM useraccounts WHERE BINARY username='$username' && BINARY password='$password'");
      $num=mysqli_num_rows($sql);
      if ($num>0) {
            //echo "found";
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['logged-in'] = $username;
            $_SESSION['fullname']=$row['firstname'] . ' ' . $row['lastname'];
            $_SESSION['user_type'] = $row['type'];
            //display the appropriate dashboard page for user
            if (($_SESSION['user_type']) == 'customer'){
                header('location: ../customer/home.php');
            }else if (($_SESSION['user_type']) == 'admin'){
                header('location: ../admin/dashboard.php');
            }else{
                header('location: login/login.php');
            }
        }
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
            <a class="create" href="create.php">Create an Account</a>
            <?php
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }

            ?>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                rel="stylesheet" type="text/css" />

            <span id="toggle_pwd" class="fa fa-w fa-eye field_icon"></span>
            <script type="text/javascript">
                $(function () {
                    $("#toggle_pwd").click(function () {
                        $(this).toggleClass("fa-eye fa-eye-slash");
                    var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                        $("#password").attr("type", type);
                    });
                });
            </script>
<?php
    require_once '../includes/footer.php';
?>