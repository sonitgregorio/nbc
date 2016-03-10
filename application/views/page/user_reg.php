<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="position:fixed">Menu</a>
    <div class="col-md-12">
      <?php
          if (!empty($this->session->flashdata('data')))
          {
              extract($this->session->flashdata('data'));
              extract($this->session->flashdata('ids'));
              $id = $uid;
              // echo $id = $this->session->flashdata('uid') . "st";
          }
          else
          {
            if (empty($firstname)) {
                $firstname = "";
                $lastname = "";
                $middlename = "";
                $emailaddress = "";
                $address = "";
                $contact = "";
                $username = "";
                $usertype = "";
                $id = "";
                $password = "";
                $dates = "";
              }
          }

       ?>
          <div class="container-fluid padding_zero" style="margin-top:30px">
              <div class="row padding_zero">
                  <div class="col-lg-12 padding_zero">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Student Registration <?php echo $this->session->userdata('type') == 1 ? '(For Instructor)': '' ?></h1>
                        </div>
                        <div class="panel-body">

                          <?php
                            echo $this->session->flashdata('message');
                           ?>
                            <form class="form-horizontal" action="/user_reg" method="post">
                              <input type="hidden" name="uid" value="<?php echo $id ?>">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">First Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="firstname" value="<?php echo $firstname ?>" class="form-control" placeholder="First Name" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Middle Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="middlename" value="<?php echo $middlename ?>" class="form-control" placeholder="Middle Name" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Last Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="lastname" value="<?php echo $lastname ?>" class="form-control" placeholder="Last Name" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Email Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="emailaddress" value="<?php echo $emailaddress ?>" class="form-control" placeholder="Email Address" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" placeholder="Address" required>
                                  </div>
                                </div>

                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Contact</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" placeholder="Contact" required>
                                  </div>
                                </div>

                                <?php if ($this->session->userdata('type') == 1): ?>
                                  <input type="hidden" name="dates" value="">
                                <?php else: ?>
                                <!--   <div class="form-group">
                                  <label class="col-sm-4 control-label">Date Hired</label>
                                  <div class="col-sm-8">
                                    <input type="date" name="dates" value="<?php echo $dates ?>" class="form-control">
                                  </div>
                                </div> -->
                                <?php endif; ?>


                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Username</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="username" value="<?php echo $username ?>" class="form-control" placeholder="Username" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Password</label>
                                  <div class="col-sm-8">
                                    <input type="password" name="password" value="<?php echo $password ?>" class="form-control" placeholder="Password" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Confirm Password</label>
                                  <div class="col-sm-8">
                                    <input type="password" name="confirmpassword" value="<?php echo $password; ?>" class="form-control" placeholder="Confirm Password" required>
                                  </div>
                                </div>

                                <!-- <div class="form-group">
                                  <label class="col-sm-4 control-label">Position</label>
                                  <div class="col-sm-8">
                                    <select class="form-control posi" name="usertype">

                                        <?php if ($this->session->userdata('type') == 0): ?>
                                          <?php
                                                foreach ($this->registration->getAlltype() as $key => $value):
                                                extract($value);
                                              ?>
                                              <?php if ($id == $usertype): ?>
                                                  <option value="<?php echo $id ?>" selected><?php echo $description ?></option>
                                              <?php else: ?>
                                                    <option value="<?php echo $id ?>"><?php echo $description ?></option>
                                              <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                                <option value="2">Student</option>
                                        <?php endif; ?>

                                    </select>
                                  </div>
                                </div> -->
                                <div class="form-group showsinput">
                                  <label class="col-sm-4 control-label">Select Subject</label>
                                  <div class="col-sm-8">
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="" disabled="">
                                      <span class="input-group-btn">
                                        <button class="btn btn-danger stud_add_subs" type="button">Add Subject</button>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-goup">
                                <div class="col-sm-12" style="padding:0">
                                    <a href="/user_registration" class="btn btn-info pull-right">Cancel</a>
                                    <button type="submit" class = "btn btn-success pull-right" name="button" style="margin-right:3px">Save</button>
                                </div>
                                <br /> <br />
                                </div>
                              </div>


                            </form>

                            <div class="col-md-12">

                              <hr style="border: 1px solid brown;" />
                              <div>
                                <!-- <form class="form-horizontal" method="post">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Position</label>
                                      <div class="col-sm-8">
                                        <select class="form-control" id="category" name="cat">
                                          <option>All</option>
                                          <option></option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label class="col-sm-3 control-label">Name</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" name="searchedname" id="searching">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <button type="submit" class="btn btn-success">Search</button>
                                  </div>
                                </form> -->
                              </div>
                              <table  id="example" class="table table-bordered ">
                                <thead>
                                  <tr class="navbar-inverse">
                                    <td style="color:white;text-align:center">Name</td>
                                    <td style="color:white;text-align:center">Email Address</td>
                                    <td style="color:white;text-align:center">Contact</td>
                                    <td style="color:white;text-align:center">Address</td>
                                    <td style="color:white;text-align:center">User Type</td>
                                    <td style="color:white;text-align:center">Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if($this->session->userdata('type') == 0)
                                  {
                                    foreach ($this->registration->getAllusers() as $key => $values):
                                    extract($values);
                                  ?>
                                      <tr>
                                        <td><?php echo $firstname . " " . $middlename . " " . $lastname; ?></td>
                                        <td><?php echo $emailaddress ?></td>
                                        <td><?php echo $contact ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $description ?></td>
                                        <td>
                                          <a href="/edit_users/<?php echo $uid ?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                          <a href="/delete_users/<?php echo $uid ?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                      </tr>
                                  <?php
                                        endforeach;
                                    }
                                    else
                                    {
                                        $this->db->where('instructor', $this->session->userdata('id'));
                                        $u = $this->db->get('tbl_student_eval')->result_array();
                                        foreach($u as $student)
                                        {
                                            $info = $this->db->get_where('tbl_userreg', array('id' => $student['student_id']))->row_array();
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $info['firstname'].' '.$info['lastname'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $info['emailaddress'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $info['contact'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $info['address'] ?>
                                                </td>
                                                <td>
                                                    <a href="/edit_users/<?php echo $info['id'] ?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="/delete_users/<?php echo $info['id'] ?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
</div>





    <div class="modal bs-example-modal-lg" id="adddshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: rgb(157, 90, 71)">
          <button type="button" class="close backs" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title backs" id="myModalLabel" style="color:#FFFF00;"><strong><i class="fa fa-lock fa-fw"></i>&nbsp;Add Subject Taken</strong></h4>
        </div>
            <div class="modal-body">
                  <div class="err">
                    
                  </div>
                <h3>List Of Subjects</h3>  
                <table class="table table-bordered ex">
                  <thead>
                    <tr class="navbar-inverse">
                      <td style="color:white;text-align:center">Instructor</td>
                      <td style="color:white;text-align:center">Subject</td>
                      <td style="color:white;text-align:center">Year & Section</td>
                      <td style="color:white;text-align:center">Semester</td>
                      <td style="color:white;text-align:center">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($this->addclassmd->get_classes_mod() as $key => $value): ?>
                    <tr>
                      <td><?= $value['facname'] ?></td>
                      <td><?= $value['subs']?></td>
                      <td><?= $value['yrsec']?></td>
                      <td><?= $value['description']?></td>
                      <td>
                          <a href="#" class="btn btn-info btn-xs subadd" data-param="<?= $value['id'] ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  
                  </tbody>
                </table>

                <br />
                <h3>Subject Added</h3>
                <table class="table table-bordered ex">
                  <thead>
                    <tr class="navbar-inverse">
                      <td style="color:white;text-align:center">Instructor</td>
                      <td style="color:white;text-align:center">Subject</td>
                      <td style="color:white;text-align:center">Year & Section</td>
                      <td style="color:white;text-align:center">Semester</td>
                      <td style="color:white;text-align:center">Action</td>
                    </tr>
                  </thead>
                  <tbody class="ref_tab">
                    <?php foreach ($this->addclassmd->get_temp_cl() as $key => $value): ?>
                      <?php $x = $this->addclassmd->get_spc_temp($value['classid'])  ?>
                        <tr>
                            <td><?= $x['facname'] ?></td>
                            <td><?= $x['subs']?></td>
                            <td><?= $x['yrsec']?></td>
                            <td><?= $x['description']?></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-xs deltempsub" data-param="<?= $value['id'] ?>"><span class="glyphicon glyphicon-remove-sign"></span>&nbsp;&nbsp;Remove</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                  
                  
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
