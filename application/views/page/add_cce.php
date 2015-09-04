<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
    <?php
        if (empty($description)) {
          $description = "";
          $id = "";
          $point = "";
        }

     ?>
    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                  <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                    <h1 class="panel-title" style="color:white">Add CCE  Criteria</h1>
                  </div>
                  <div class="panel-body">
                    <?php
                        echo $this->session->flashdata('message');
                     ?>
                      <form class="form-horizontal" action="/insert_criteria" method="post">
                        <input type="hidden" name="cid" value="<?php echo $id ?>">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Criteria</label>
                            <div class="col-sm-9">
                              <input type="text" name="criteria" value="<?php echo $description ?>" class="form-control" placeholder="Criteria">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Point</label>
                            <div class="col-sm-9">
                              <input type="text" name="points" value="<?php echo $point ?>" class="form-control" placeholder="Points">
                            </div>
                          </div>
                          <div class="form-goup">
                            <div class="col-sm-12 padding_zero">
                                <a href="/add_criteria" class="btn btn-info pull-right">Cancel</a>
                                <button type="submit" class = "btn btn-success pull-right" name="button" style="margin-right:3px">Save</button>
                            </div>
                            <br /> <br />
                          </div>
                        </div>

                      </form>

                      <div class="col-md-12">

                        <hr style="border: 1px solid brown;" />
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr>
                              <td>Criteria</td>
                              <td width="300">Point System</td>
                              <td width="150">Action</td>
                            </tr>
                          </thead>
                          <tbody>

                              <?php
                                foreach ($this->registration->getAllcce() as $key => $value):
                                extract($value);
                              ?>
                              <tr>
                                <td><?php echo $description ?></td>
                                <td><?php echo $point ?></td>
                                <td>
                                  <a href="/edit_cce/<?php echo $id ?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                  <a href="/delete_cce/<?php echo $id ?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
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
