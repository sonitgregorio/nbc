<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" style="background: rgb(157, 90, 71);box-shadow: 0px 0px 10px black">
        <ul class="sidebar-nav">
            <li class="sidebar-brand" style="padding:0;margin:0 auto">
                <a href="#" style="color:#fff">
                  <img src="../assets/images/EVSU.jpg" alt="x" width="40" style="border-radius:20px"/> EVSU
                </a>
            </li>
            <li>
                <a href="#" style="color:white">Home</a>
            </li>
            <?php if($this->session->userdata('type') == 1) { ?>
            <li>
                <a href="/user_registration" style="color:#fff">User Registration</a>
            </li>
            <li>
                <a href="#" style="color:#fff">QCE</a>
            </li>
            <li>
                <a href="/cce" style="color:#fff">CCE</a>
            </li>
            <li>
                <a href="#" style="color:#fff">Reports</a>
            </li>
            <?php } elseif($this->session->userdata('type') == 0) { ?>
            <li>
                <a href="/user_registration" style="color:#fff">User Registration</a>
            </li>
            <li>
                <a href="/faculty_registration" style="color:#fff">Faculty Registration</a>
            </li>
            <li>
                <a href="/add_criteria" style="color:#fff">ADD Common CCE</a>
            </li>
            <li>
                <a href="/add_school" style="color:#fff">Add School</a>
            </li>
            <?php } else { ?>
            <li>
                <a href="/evaluate" style="color:#fff;">Evaluate</a>
            </li>
            <?php } ?>
            <li>
                <a href="/logout" style="color:white">Logout</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

    <!-- /#page-content-wrapper -->

<!-- /#wrapper -->
