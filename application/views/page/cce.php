<div id="page-content-wrapper">
    <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>

    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                        <h1 class="panel-title" style="color:white">CCE</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr class="navbar-inverse text-center">
                                <td style="color:#fff">Name</td>
                                <td style="color:#fff">Current Position</td>
                                <td style="color:#fff">School</td>
                                <td style="color:#fff">Address</td>
                                <td style="color:#fff">Contact</td>
                                <td style="color:#fff">Action</td>
                            </tr>

                        <?php
                            $r = $this->faculty->all();
                            foreach($r as $faculty)
                            {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $faculty['firstname'].' '.$faculty['middlename'].' '.$faculty['lastname'] ?>
                                </td>
                                <td>
                                    <?php
                                        $pos = $this->db->get_where('position', array('id' => $faculty['position']))->row_array();
                                        echo $pos['description'];
                                     ?>
                                </td>
                                <td>
                                    <?php
                                        $school = $this->db->get_where('tbl_school', array('id' => $faculty['school']))->row_array();
                                        echo $school['sch_name'];
                                     ?>
                                </td>
                                <td>
                                    <?php echo $faculty['address'] ?>
                                </td>
                                <td>
                                    <?php echo $faculty['contact'] ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm btn-block">View</a>
                                </td>
                            </tr>
                        <?php
                            }
                         ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
