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
        $booking->academic_rank = $_POST['contact_number'];
        $booking->department = $_POST['address'];
        if(isset($_POST['barber'])){
            $booking->barber = $_POST['barber'];
        }
        $booking->date = htmlentities($_POST['date']);
        if(isset($_POST['status'])){
            $booking->status = $_POST['status'];
        }
        if(validate_add_booking($_POST)){
            if($booking->add()){
                //redirect user to faculty page after saving
                header('location: booking.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Lionico | Add Booking';
    $booking = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Record</h3>
                <a class="back" href="booking.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addbooking.php" method="post">
                    <label for="fn">First Name</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Last Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
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
                                <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
                    <?php
                        }
                    ?>

                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" required placeholder="(+63)-9*********" min="5" value="<?php if(isset($_POST['contact_number'])) { echo $_POST['contact_number']; } ?>">
                    <br>

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required placeholder="Enter your Address"  value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } ?>">
                    <br>

                    <label for="barber">Barber</label>
                    <select name="barber" id="barber">
                        <option value="None" <?php if(isset($_POST['barber'])) { if ($_POST['barber'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="Barber 1" <?php if(isset($_POST['barber'])) { if ($_POST['barber'] == 'Barber 1') echo ' selected="selected"'; } ?>>Barber 1</option>
                        <option value="Barber 2" <?php if(isset($_POST['barber'])) { if ($_POST['barber'] == 'Barber 2') echo ' selected="selected"'; } ?>>Barber 2</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_barber($_POST)){
                    ?>
                                <p class="error">Please select a barber from the dropdown.</p>
                    <?php
                        }
                    ?>

                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required value="<?php if(isset($_POST['date'])) { echo $_POST['date']; } ?>">
                    <br>
                    
                    <label for="status">Is Status of Employee Active?</label><br>
                    <label class="container" for="status">Yes
                        <input type="checkbox" name="status" id="status" value="Active Employee" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active Employee') echo ' checked'; } ?>>
                        <span class="checkbox"></span>
                    </label>
                    <input type="submit" class="button" value="Save Record" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>