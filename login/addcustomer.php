<?php

    require_once '../tools/functions.php';
    require_once '../classes/customer.class.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then code and html below will be executed

    //if add customer is submitted
    if(isset($_POST['save'])){

        $customer = new Customer();
        //sanitize user inputs
        $customer->firstname = htmlentities($_POST['first_name']);
        $customer->lastname = htmlentities($_POST['last_name']);
        $customer->username = htmlentities($_POST['username']);
        $customer->email = htmlentities($_POST['email']);
        $customer->password = $_POST['password'];
        $customer->type = $_POST['type'];

        if(isset($_POST)){
            if($customer->add()){
                //redirect user to customer page after saving
                header('location: customer.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Lionico | Add Record';
    $customer = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Record</h3>
                <a class="back" href="customer.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addcustomer.php" method="post">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required placeholder="Enter first name" value="<?php if(isset($_POST['first_name'])) { echo $_POST['first_name']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required placeholder="Enter last name" value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_email($_POST)){
                    ?>
                                <p class="error">Email is invalid. Use only @lionico.ph</p>
                    <?php
                        }
                    ?>

                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" required tabindex="2">
                    <br>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter Password" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                    <br>

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

                    <input type="submit" class="button" value="Save Record" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>