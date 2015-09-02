<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="margin-left:-30px;margin-top:-30px; height:40px;background: #B22222;">Menu</a>
    <div class="container-fluid">
      <?php


          if (!empty($sch_name)) {
          }else{
            $sch_name = "";
            $sch_address = "";
            $sch_contact = "";
            $id = "";
          }
       ?>
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
                      <form class="form-horizontal" action="/save_school" method="post">
                        <input type="hidden" name="shid" value="<?php echo $id ?>">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">School Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="sch_name" class="form-control" placeholder="School Name" value="<?php echo $sch_name ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">School Address</label>
                            <div class="col-sm-9">
                              <input type="text" name="sch_address" class="form-control" placeholder="School Address"  value="<?php echo $sch_address ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">School Contact</label>
                            <div class="col-sm-9">
                              <input type="text" name="sch_contact" class="form-control" placeholder="School Contact"  value="<?php echo $sch_contact ?>">
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
                              <td>School</td>
                              <td>Address</td>
                              <td>Contact</td>
                              <td width="150">Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($this->registration->schoolList() as $key => $value):
                            extract($value);
                            ?>
                              <tr>
                                <td><?php echo $sch_name; ?></td>
                                <td><?php echo $sch_address ?></td>
                                <td><?php echo $sch_contact; ?></td>
                                <td>
                                  <a href="/edit/<?php echo $id ?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                  <a href="/delete/<?php echo $id ?>" class="label label-danger" onclick="return confirm('Delete School?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
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
