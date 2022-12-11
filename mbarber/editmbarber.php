<?php

    require_once '../tools/functions.php';
    require_once '../classes/mbarber.class.php';

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
    $mbarber= new MBarber;
    //if add mbarber is submitted
    if(isset($_POST['save'])){
        //sanitize user inputs
        $mbarber->id = $_POST['mbarber-id'];
        $mbarber->firstname = htmlentities($_POST['fn']);
        $mbarber->lastname = htmlentities($_POST['ln']);
        $mbarber->email = htmlentities($_POST['email']);
        $mbarber->contact_number = $_POST['contact_number'];
        $mbarber->address = $_POST['address'];
        $mbarber->chair_assigned = $_POST['chair_assigned'];

        if(isset($_POST['status'])){
            $mbarber->status = $_POST['status'];
        }
        if(validate_add_booking($_POST)){
            if($mbarber->edit()){
                //redirect user to mbarber page after saving
                header('location: mbarber.php');
            }
        }
    }else{
        if ($mbarber->fetch($_GET['id'])){
            $data = $mbarber->fetch($_GET['id']);
            $mbarber->firstname = $data['firstname'];
            $mbarber->lastname = $data['lastname'];
            $mbarber->email = $data['email'];
            $mbarber->contact_number = $data['contact_number'];
            $mbarber->address = $data['address'];
            $mbarber->chair_assigned = $data['chair_assigned'];
            $mbarber->status = $data['status'];
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Forecast | Update Barber';
    $mbarber = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
            <div class="table-container">
                <div class="table-heading form-size">
                    <h3 class="table-title">Update Record</h3>
                    <a class="back" href="mbarber.php"><i class='bx bx-caret-left'></i>Back</a>
                </div>
                <div class="add-form-container">
                    <form class="add-form" action="editmbarber.php" method="post">
                        <input type="text" hidden name="mbarber-id" value="<?php echo $data['id']; ?>">
                        <label for="fn">First Name</label>
                        <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } else { echo $data['firstname']; }?>">
                        <?php
                            if(isset($_POST['save']) && !validate_first_name($_POST)){
                        ?>
                                    <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                        <?php
                            }
                        ?>
                        <label for="ln">Last Name</label>
                        <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } else { echo $data['lastname']; }?>">
                        <?php
                            if(isset($_POST['save']) && !validate_last_name($_POST)){
                        ?>
                                    <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                        <?php
                            }
                        ?>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $data['email']; }?>">
                        <?php
                            if(isset($_POST['save']) && !validate_email($_POST)){
                        ?>
                                    <p class="error">Email is invalid. Use only @lionico.ph</p>
                        <?php
                            }
                        ?>
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" required placeholder="contact_number" value="<?php if(isset($_POST['contact_number'])) { echo $_POST['contact_number']; } ?>">
                        <br>

                        <label for="address">Barangay</label>
                        <input type="text" id="address" name="address" required placeholder="address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } ?>">
                        <br>

                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required value="<?php if(isset($_POST['date'])) { echo $_POST['date']; } ?>">
                        <br>

                        <label for="chair_assigned">Chair Assigned</label>
                        <input type="text" id="chair_assigned" name="chair_assigned" required value="<?php if(isset($_POST['chair_assigned'])) { echo $_POST['chair_assigned']; } ?>">
                        <br>

                        <label for="status">Is Status of Employee Active?</label><br>
                        <label class="container" for="status">Yes
                            <input type="checkbox" name="status" id="status" value="Active Employee" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active Employee') echo ' checked'; } elseif ($data['status'] == 'Active Employee') echo ' checked'; ?>>
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
