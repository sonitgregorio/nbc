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
                      <form class="form-horizontal" action="/insert_cycle" method="post">
                        <input type="hidden" name="cid" value="<?php echo $id ?>">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Cycle</label>
                            <div class="col-sm-8 padding_zero">
                              <input type="text" name="descrip" value="<?php echo $description ?>" class="form-control" placeholder="Criteria">
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">FROM</label>
                            <div class="col-sm-9  padding_zero">
                              <input type="date" name="date_from" value="<?php echo $description ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">To</label>
                            <div class="col-sm-9  padding_zero">
                              <input type="date" name="date_to" value="<?php echo $point ?>" class="form-control" required>
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
                        <table id="example"class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr class="navbar-inverse">
                              <td style="color:white;text-align:center">Cycle</td>
                              <td width="300" style="color:white;text-align:center">From</td>
                              <td width="150" style="color:white;text-align:center">To</td>
                            </tr>
                          </thead>
                          <tbody>

                              <?php
                                foreach ($this->registration->get_all_cycle() as $key => $value):
                              ?>
                              <tr>
                                <td><?php echo $value['description'] ?></td>
                                <td><?php echo $value['date_from'] ?></td>
                                <td><?php echo $value['date_to'] ?></td>  
                               
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
