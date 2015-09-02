<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="margin-left:-30px;margin-top:-30px; height:40px;background: #B22222;">Menu</a>
    <div class="col-md-12">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Faculty Registration</h1>
                        </div>
                        <div class="panel-body">
                          <?php
                            echo $this->session->flashdata('message');
                           ?>
                            <form class="form-horizontal" action="/insert_faculty" method="post">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">First Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="firstname" value="" class="form-control" placeholder="First Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Middle Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="middlename" value="" class="form-control" placeholder="Middle Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Last Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="lastname" value="" class="form-control" placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="address" value="" class="form-control" placeholder="Address">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Email Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="emailaddress" value="" class="form-control" placeholder="Email Address">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Contact</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="contact" value="" class="form-control" placeholder="Contact">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Current Position</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="position" value="" class="form-control" placeholder="Enter Current Position">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">School</label>
                                  <div class="col-sm-9">
                                    <select class="form-control" name="school">
                                      <?php foreach ($this->registration->schoolList() as $key => $value):
                                        extract($value);
                                        ?>
                                        <option value="<?php echo $id ?>"><?php echo $sch_name ." - ". $sch_address ?>y</option>
                                      <?php endforeach; ?>

                                    </select>
                                  </div>

                                </div>
                                <div class="form-goup">
                                <div class="col-sm-12">
                                    <button type="submit" class = "btn btn-success pull-right" name="button">Save</button>
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
                                        <a href="#" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="#" class="label label-danger">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
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
