<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="">Menu</a>
    <div class="col-md-12">
      <?php
              if (empty($firstname))
              {
                $firstname = "";
                $middlename = "";
                $lastname = "";
                $address= "";
                $emailaddress ="";
                $contact = "";
                $schid = "";
                $pid = "";
                $fid = "";
                $dates ="";
              }
       ?>
          <div class="container-fluid padding_zero">
              <div class="row"  style="padding:0" >
                  <div class="col-lg-12 padding_zero">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Add Evaluator To Instructor</h1>
                        </div>
                        <div class="panel-body">
                           <div class="col-md-12">
                              <hr style="border: 1px solid brown;" />
                              <table id="example" class="table table-bordered">
                                <thead>
                                  <tr class="navbar-inverse">
                                    <td style="color:white;text-align:center">Name</td>
                                    <td style="color:white;text-align:center">Current Position</td>
                                    <td style="color:white;text-align:center">School</td>
                                    <td style="color:white;text-align:center">Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($this->registration->getallfaculty() as $key => $value):
                                    extract($value);
                                    ?>
                                    <tr>
                                      <td><?php echo $fullname; ?></td>
                                      <td><?php echo $position; ?></td>
                                      <td><?php echo $sch; ?></td>
                                      <td>
                                        <a class="btn btn-info" href="/add_faculty_evaluator/<?php echo $fid ?>">Add Evaluator</a>
                                      </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
</div>







