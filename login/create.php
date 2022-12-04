<?php
    require_once '../classes/database.php';
    require_once '../classes/customer.class.php';

    $page_title = 'Create Account';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/header.php';

    if(isset($_POST['sign-up'])){

        $customer = new Customer();
        //sanitize user inputs
        $customer->firstname = htmlentities($_POST['first_name']);
        $customer->lastname = htmlentities($_POST['last_name']);
        $customer->username = htmlentities($_POST['username']);
        $customer->password = htmlentities($_POST['password']);
        $customer->email = htmlentities($_POST['email']);
        $customer->type = $_POST['type'];
        if(isset($_POST)){
            if($customer->add()){
                //redirect user to create page after saving
                header('location: login.php');
            }
        }
    }

?>
    <div class="login-container">
        <form class="login-form" action="create.php" method="post">
            <div class="logo-details">
                <img class="lion" src="../img/lion2.png" alt="lion-head">
                <span class="logo-name">Lionico Barber</span>
            </div>
            <hr class="divider">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required tabindex="1">
            <br>

            <label for="last_name">LastName</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" required tabindex="2">
            <br>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required tabindex="2">
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required tabindex="2">
            <br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                <?php
                    if(isset($_POST['save']) && !validate_email($_POST)){
                ?>
                        <p class="error">Email is invalid. Use only @lionico.ph</p>
                <?php
                    }
                ?>

            <div>
                <label for="type">Classification</label><br>
                <label class="container" for="customer">Customer
                    <input type="radio" name="type" id="customer" value="customer" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'customer') echo ' checked'; } ?>>
                    <span class="checkmark"></span>
                </label>
                <label class="container" for="barber">Barber
                    <input type="radio" name="type" id="barber" value="barber" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'barber') echo ' checked'; } ?>>
                    <span class="checkmark"></span>
                </label>
            </div>
            <input class="button" type="submit" value="Sign up" name="sign-up" tabindex="3">
            <a href="login.php">Back to Login page</a>

        </form>
    </div>
<?php
    require_once '../includes/footer.php';
?>