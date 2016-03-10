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
                          <h1 class="panel-title" style="color:white">Set Active School Year</h1>
                        </div>
                       
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('message') ?>
                          <form class="form" action="/insert_sy" method="POST">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Instructor</label>
                             <input type="text" class="form-control" name="desc">
                            </div>

                          </div>
                          <div class="col-md-6">
                         
                            <div class="form-group">
                              <label class="control-label">Semester</label>
                              <select class="form-control" name="semester">
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                <option>Summer</option>
                              </select>
                              <div class="pull-right" style="margin-top:10px">
                                <a href="/add_class" class="btn btn-info">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                              </div>
                            </div>
                          </div>
                          </form>
                            <div class="col-md-12 table-resposive">   

                              <hr style="border: 1px solid brown;" />
                              <table id="example" class="table table-bordered">
                                <thead>
                                  <tr class="navbar-inverse">
                                    <td style="color:white;text-align:center">Description</td>
                                    <td style="color:white;text-align:center">Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->addclassmd->get_sy() as $key => $value): ?>
                                      <tr>
                                        <td><?php echo $value['description'] ?></td>
                                         <td>
                                        <?php if ($value['status'] == 1): ?>
                                          <h5 style="padding:0"><span class="label label-success" style="margin:0">Activated</span></h5>
                                        <?php else: ?>
                                         <a class="btn btn-info btn-xs" href="/set_active/<?php echo $value['id'] ?>">Set Active</a>
                                        <?php endif ?>
                                        </td>
                                      </tr>
                                    <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
</div>