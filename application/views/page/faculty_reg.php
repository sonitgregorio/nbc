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
              }
       ?>
          <div class="container-fluid padding_zero">
              <div class="row"  style="padding:0" >
                  <div class="col-lg-12 padding_zero">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Faculty Registration</h1>
                        </div>
                        <div class="panel-body">
                          <?php
                            echo $this->session->flashdata('message');
                           ?>
                            <form class="form-horizontal" action="/insert_faculty" method="post">
                              <input type="hidden" name="fid" value="<?php echo $fid ?>">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">First Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="firstname" value="<?php echo $firstname ?>" class="form-control" placeholder="First Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Middle Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="middlename" value="<?php echo $middlename ?>" class="form-control" placeholder="Middle Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Last Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="lastname" value="<?php echo $lastname ?>" class="form-control" placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" placeholder="Address">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Email Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="emailaddress" value="<?php echo $emailaddress ?>" class="form-control" placeholder="Email Address">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Contact</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" placeholder="Contact">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Current Position</label>
                                  <div class="col-sm-9">
                                    <select class="form-control" name="position">
                                        <?php
                                          foreach ($this->registration->Allposition() as $key => $v):
                                          extract($v);
                                        ?>
                                        <?php if ($positionid == $pid): ?>
                                              <option value="<?php echo  $positionid ?>" selected><?php echo $descr ?></option>
                                          <?php else: ?>
                                              <option value="<?php echo  $positionid ?>"><?php echo $descr ?></option>
                                        <?php endif; ?>

                                        <?php endforeach; ?>

                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">School</label>
                                  <div class="col-sm-9">
                                    <select class="form-control" name="school">
                                      <?php
                                        foreach ($this->registration->schoolList() as $key => $value):
                                        extract($value);
                                      ?>
                                        <?php if ($id == $schid): ?>
                                            <option value="<?php echo $id ?>" selected><?php echo $sch_name ." - ". $sch_address ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $id ?>"><?php echo $sch_name ." - ". $sch_address ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-goup">
                                <div class="col-sm-12" style="padding:0">
                                  <a href="/faculty_registration" class = "btn btn-info pull-right">Cancel</a><span>&nbsp;</span>
                                  <button type="submit" class = "btn btn-success pull-right" name="button" style="margin-right:3px;">Save</button>
                                </div>
                                <br /> <br />
                                </div>
                              </div>

                            </form>

                            <div class="col-md-12">

                              <hr style="border: 1px solid brown;" />
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <td>Name</td>
                                    <td>Current Position</td>
                                    <td>School</td>
                                    <td>Address</td>
                                    <td>Contact</td>
                                    <td>Action</td>
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
                                      <td><?php echo $address ?></td>
                                      <td><?php echo $contact; ?></td>
                                      <td>
                                        <a href="/edit_faculty/<?php echo $fid?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="/delete_faculty/<?php echo $fid?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
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
