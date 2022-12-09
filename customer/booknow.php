<?php

    require_once '../tools/functions.php';
    require_once '../classes/booking.class.php';

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

    //if add booking is submitted
    if(isset($_POST['save'])){

        $booking = new Booking();
        //sanitize user inputs
        $booking->firstname = htmlentities($_POST['fn']);
        $booking->lastname = htmlentities($_POST['ln']);
        $booking->email = htmlentities($_POST['email']);
        $booking->contact_number = $_POST['contact_number'];
        $booking->address = $_POST['address'];
        $booking->date = $_POST['date'];
        if(isset($_POST)){
            if($booking->add()){
                //redirect user to booking page after saving
                header('location: home.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Lionico | Add Record';
    $booking = 'active';

    require_once '../includes/cheader.php';

?>
    <div class="home-content">

    <header>
        <div class="container">
            <div class="label">
                <img src="../img/lion2.png" alt="lion-head" id="lion">
                <span class="logo-name">LIONICO BARBER</span>
            </div>

            <nav>
                <ul class="menu">
                    <li><a href="../customer/home.php">Home</a></li>
                    <li><a href="../customer/booknow.php">Book Now</a></li>
                    <li><a href="../customer/about.php">About</a></li>
                    <li><a href="../login/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>


        <div class="table-container">
            <div class="add-form-customer-container">
                <h2>Booking Form</h2>
                <form class="add-form" action="booknow.php" method="post">
                    <label for="fn">First Name</label>
                    <br>
                    <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <br>

                    <label for="ln">Last Name</label>
                    <br>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <br>

                    <label for="email">Email</label>
                    <br>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_email($_POST)){
                    ?>
                                <p class="error">Email is invalid. Use only @lionico.ph</p>
                    <?php
                        }
                    ?>
                    <br>

                    <label for="contact_number">Contact Number</label>
                    <br>
                    <input type="text" id="contact_number" name="contact_number" required placeholder="contact_number" value="<?php if(isset($_POST['contact_number'])) { echo $_POST['contact_number']; } ?>">
                    <br>

                    <label for="address">Address</label>
                    <br>
                    <input type="text" id="address" name="address" required placeholder="address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } ?>">
                    <br>

                    <label for="date">Date</label>
                    <br>

                    <input type="datetime-local" id="date" name="date" required value="<?php if(isset($_POST['date'])) { echo $_POST['date']; } ?>">
                    <br>

                    <input type="submit" class="button" value="Save Record" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/cbottomnav.php';
    require_once '../includes/cfooter.php';
?>