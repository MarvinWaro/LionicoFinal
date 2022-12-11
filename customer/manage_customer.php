<?php

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
    //if the above code is false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'Lionico | Show Customer';
    $customer = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Customer Details</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){
                ?>
                    <a href="#" class="button">Add New Customer</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact_Number</th>
                        <th>Barangay</th>
                        <th>Status</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //create an array for list of customer, use session so we can access this anywhere
                        if(!isset($_SESSION['customer'])){
                            $_SESSION['customer'] = array(
                                "customer1" => array(
                                    "firstname" => 'Jaydee',
                                    "lastname" => 'Ballaho',
                                    "email" => 'jaydee.ballaho@wmsu.edu.ph',
                                    "customer_number" => '25',
                                    "address" => 'Pasonanca',
                                    "status" => 'Active Employee'
                                ),
                                "customer2" => array(
                                    "firstname" => 'Robin',
                                    "lastname" => 'Almorfi',
                                    "email" => 'robin@wmsu.edu.ph',
                                    "customer_number" => '21',
                                    "address" => 'Recodo',
                                    "status" => 'Active Employee'
                                )
                            );
                        }

                        require_once '../classes/customer.class.php';
                        $customer = new Customer();

                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($customer->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['lastname'] . ', ' . $value['firstname'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['customer_number'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>