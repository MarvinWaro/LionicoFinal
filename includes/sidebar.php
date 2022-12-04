<div class="side-bar">
    <div class="logo-details">
        <img class="lion" src="../img/lion2.png" alt="lion-head">
        <span class="logo-name">Lionico</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php" class="<?php echo $dashboard; ?>">
                <i class='bx bx-grid-alt' ></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
        <a href="../booking/booking.php" class="<?php echo $booking; ?>">
                <i class='bx bx-book-reader'></i>
                <span class="links-name">Manage Bookings</span>
            </a>
        </li>
        <li>
        <a href="../mbarber/mbarber.php" class="<?php echo $mbarber; ?>">
                <i class='bx bx-user'></i>
                <span class="links-name">Manage Barber</span>
            </a>
        </li>
        <li>
        <a href="../customer/customer.php" class="<?php echo $customer; ?>">
                <i class='bx bx-group' ></i>
                <span class="links-name">Manage Customer</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $settings; ?>">
                <i class='bx bx-cog'></i>
                <span class="links-name">Settings</span>
            </a>
        </li>
        <hr class="line">
        <li id="logout-link">
            <a href="../login/logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
            </a>
        </li>
    </ul>
</div>