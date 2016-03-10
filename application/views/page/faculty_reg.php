<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="position:fixed">Menu</a>
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
          <div class="container-fluid padding_zero" style="margin-top:30px">
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
                                  <label class="col-sm-3 control-label">Type</label>
                                  <div class="col-sm-9">
                                    <label for="fac">Faculty</label>
                                    <input type="radio" id="fac" name="types" value="1">

                                    <label for="sup">Supervisor</label>
                                    <input type="radio" id="sup" name="types" value="3">
                                  </div>
                                </div>
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
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Email Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="emailaddress" value="<?php echo $emailaddress ?>" class="form-control" placeholder="Email Address">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Contact</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="contact" value="<?php echo $contact ?>" class="form-control" placeholder="Contact">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Date Hired</label>
                                  <div class="col-sm-9">
                                    <input type="date" name="dates" value="<?php echo $dates ?>" class="form-control" placeholder="Contact">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Current Position</label>
                                  <div class="col-sm-9">
                                    <select class="form-control js-example-theme-single" name="position">
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
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Subject</label>
                                  <div class="col-sm-9">
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="" disabled="">
                                      <span class="input-group-btn">
                                        <button class="btn btn-danger add_subs" type="button">Add Subject</button>
                                      </span>
                                    </div><!-- /input-group -->
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
                              <table id="example" class="table table-bordered">
                                <thead>
                                  <tr class="navbar-inverse">
                                    <td style="color:white;text-align:center">Name</td>
                                    <td style="color:white;text-align:center">Current Position</td>
                                    <td style="color:white;text-align:center">School</td>
                                    <td style="color:white;text-align:center">Address</td>
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
                                        <a href="/edit_faculty/<?php echo $fid?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="/add_fac_user/<?php echo $fid?>" class="label label-info">Add As User&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></a>
                                        <a href="/delete_faculty/<?php echo $fid?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                                        <a class="label label-info chekc" data-type="1" data-toggle="modal" data-target="#ccedd" data-param1="<?php echo $fid ?>">Add CCE</a>
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






<div class="modal" id="cced" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:10%">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: rgb(157, 90, 71)">
          <button type="button" class="close backs" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title backs" id="myModalLabel" style="color:#FFFF00;"><strong><i class="fa fa-lock fa-fw"></i>&nbsp;Add CCE</strong></h4>
        </div>
            <div class="modal-body">
            <form class="subcce" action="/insert_this_cce" method="POST" onsubmit="return false">
              <div class="mes">
                
              </div>
              <div class="panel-body" id="lo">
                  <input type="hidden" name="fiddss" value="" id="fidds">
                </div>
                <div class="form-group">
                  <label>Select CCE Type</label>
                  <select class="form-control js-example-basic-single" name="ccetype" style="width:100%;">
                    <?php foreach ($this->registration->get_cce_type() as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php  echo $value['description'] ?></option>
                    <?php endforeach ?>
                  </select>
                <div class="form-group">
                    <label>Coressponding Points</label>
                    <input type="text" class="form-control" name="points">
                  

                </div>
                <div class="form-group">
                  <a href="/faculty_registration" class="btn btn-info">Done</a>
                  <button class="btn btn-success" type="submit">Save</button>
                </div>
                </div>
            </form>
                
            </div>
        </div>
      </div>
    </div>




    <div class="modal bs-example-modal-lg" id="subsshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background: rgb(157, 90, 71)">
          <button type="button" class="close backs" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title backs" id="myModalLabel" style="color:#FFFF00;"><strong><i class="fa fa-lock fa-fw"></i>&nbsp;Add Subject Handled</strong></h4>
        </div>
            <div class="modal-body">
                <form class="form-horizontal subsubmit" method="POST" onsubmit="return false">
                  <div class="err">
                    
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Subject</label>
                    <div class="col-sm-9">
                      <select class="form-control js-example-theme-single" style="width:100%" name="subject">
                        <option value="0">Select Subject</option>
                        <?php foreach ($this->addclassmd->get_subj() as $key => $value): ?>
                          <option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['sname']) ?></option>
                        <?php endforeach ?>
                      </select>  
                    </div>
                  </div>
                  <div class="form-group">

                    <label class="col-sm-3 control-label">Year & Section</label>
                    <div class="col-sm-9">
                      <select class="form-control js-example-theme-single" style="width:100%" name="yrsec">
                        <option value="0">Select Year & Section</option>
                        <?php foreach ($this->addclassmd->yrsect() as $key => $value): ?>
                          <option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['yrsec']) ?></option>
                        <?php endforeach ?>
                      </select>  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">S.Y Semester</label>
                    <div class="col-sm-9">
                      <select class="form-control js-example-theme-single" style="width:100%" name="semester">
                        <?php foreach ($this->addclassmd->get_sy() as $key => $value): ?>
                          <option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['description']) ?></option>
                        <?php endforeach ?>
                      </select> 
                      <br />
                      <button class="btn btn-success pull-right" type="submit" style="margin-top:1%">Save</button>
                    </div>
                    
                  </div>
                </form>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <td>Subject</td>
                      <td>Section</td>
                      <td>S.Y Semester</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody class="refretbl">
                    <?php foreach ($this->addclassmd->get_temp_sub() as $key => $value): ?>
                      <tr>
                        <td><?= $value['subs'] ?></td>
                        <td><?= $value['yrsec'] ?></td>
                        <td><?= $value['sy'] ?></td>
                        <td>
                          <button class="btn btn-danger delsub" data-param=<?= $value['id']  ?> onclick="return confirm('Are You Sure?')"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                
            </div>
        </div>
      </div>
    </div>



