<?php

    require_once '../tools/functions.php';
    require_once '../classes/faculty.class.php';

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

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $faculty = new Faculty();
        //sanitize user inputs
        $faculty->firstname = htmlentities($_POST['fn']);
        $faculty->lastname = htmlentities($_POST['ln']);
        $faculty->email = htmlentities($_POST['email']);
        $faculty->academic_rank = $_POST['rank'];
        $faculty->department = $_POST['department'];
        if(isset($_POST['role'])){
            $faculty->admission_role = $_POST['role'];
        }
        if(isset($_POST['status'])){
            $faculty->status = $_POST['status'];
        }
        if(validate_add_faculty($_POST)){
            if($faculty->add()){  
                //redirect user to faculty page after saving
                header('location: faculty.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Forecast | Add Faculty';
    $faculty = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Faculty</h3>
                <a class="back" href="faculty.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addfaculty.php" method="post">
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
                    <label for="rank">Academic Rank</label>
                    <select name="rank" id="rank">
                        <option value="None" <?php if(isset($_POST['rank'])) { if ($_POST['rank'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="Instructor" <?php if(isset($_POST['rank'])) { if ($_POST['rank'] == 'Instructor') echo ' selected="selected"'; } ?>>Instructor</option>
                        <option value="Asst. Professor" <?php if(isset($_POST['rank'])) { if ($_POST['rank'] == 'Asst. Professor') echo ' selected="selected"'; } ?>>Asst. Professor</option>
                        <option value="Asso. Professor" <?php if(isset($_POST['rank'])) { if ($_POST['rank'] == 'Asso. Professor') echo ' selected="selected"'; } ?>>Asso. Professor</option>
                        <option value="Professor" <?php if(isset($_POST['rank'])) { if ($_POST['rank'] == 'Professor') echo ' selected="selected"'; } ?>>Professor</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_rank($_POST)){
                    ?>
                                <p class="error">Please select a rank from the dropdown.</p>
                    <?php
                        }
                    ?>
                    <label for="department">Department</label>
                    <select name="department" id="department">
                        <option value="None" <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="Computer Science" <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'Computer Science') echo ' selected="selected"'; } ?>>Computer Science</option>
                        <option value="Information Technology" <?php if(isset($_POST['department'])) { if ($_POST['department'] == 'Information Technology') echo ' selected="selected"'; } ?>>Information Technology</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_department($_POST)){
                    ?>
                                <p class="error">Please select a department from the dropdown.</p>
                    <?php
                        }
                    ?>
                    <div>
                        <label for="role">Admission Role</label><br>
                        <label class="container" for="admin">Admission Officer
                            <input type="radio" name="role" id="admin" value="Admission Officer" <?php if(isset($_POST['role'])) { if ($_POST['role'] == 'Admission Officer') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="interviewer">Interviewer
                            <input type="radio" name="role" id="interviewer" value="Interviewer" <?php if(isset($_POST['role'])) { if ($_POST['role'] == 'Interviewer') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_role($_POST)){
                    ?>
                                <p class="error">Please select admission role.</p>
                    <?php
                        }
                    ?>
                    <label for="status">Is Status of Employee Active?</label><br>
                    <label class="container" for="status">Yes
                        <input type="checkbox" name="status" id="status" value="Active Employee" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active Employee') echo ' checked'; } ?>>
                        <span class="checkbox"></span>
                    </label>
                    <input type="submit" class="button" value="Save Faculty" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>