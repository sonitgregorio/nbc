<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                        <h1 class="panel-title" style="color:white">Evaluate</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="navbar-inverse">
                                    <td style="color:#fff" class="text-center">Name</td>
                                    <td style="color:#fff" class="text-center">Current Position</td>
                                    <td style="color:#fff" class="text-center">School</td>
                                    <td style="color:#fff" class="text-center">Address</td>
                                    <td style="color:#fff" class="text-center">Contact</td>
                                    <td style="color:#fff" class="text-center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($this->registration->getallfaculty() as $key => $value){
                                extract($value);
                            ?>
                                <tr>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $position; ?></td>
                                    <td><?php echo $sch; ?></td>
                                    <td><?php echo $address ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td>
                                        <a href="/instructor_eval/<?php echo $fid ?>" class="btn btn-info">Evaluate</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
