<?php 
  if ($this->session->has_userdata('subject')) 
  {
      $x = $this->subjectmod->get_spec_subject($this->session->userdata('subject'));
      $id = $x['id'];
      $code = $x['code'];
      $descr = $x['description'];
  }
  else
  {
      $id = '';
      $code ='';
      $descr = '';
  } 

 ?>


<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
  
    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                  <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                    <h1 class="panel-title" style="color:white">Add Subject</h1>
                  </div>
                  <div class="panel-body">
                    <?php
                        echo $this->session->flashdata('message');
                     ?>
                      <form class="form-horizontal" action="/insert_subject" method="post">
                        <input type="hidden" name="sid" value="<?php echo $id ?>">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Subject Code</label>
                            <div class="col-sm-8">
                              <input type="text" name="subcode" value="<?php echo $code ?>" class="form-control" placeholder="Subject Code">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Descriptive Title</label>
                            <div class="col-sm-8">
                              <input type="text" name="description" value="<?php echo $descr ?>" class="form-control" placeholder="Subject Description" required>
                            </div>
                          </div>
                          <div class="form-goup">
                            <div class="col-sm-12 padding_zero">
                                <a href="/cancel_subject" class="btn btn-info pull-right">Cancel</a>
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
                              <td style="color:white;text-align:center">Subject Code</td>
                              <td width="300" style="color:white;text-align:center"></td>
                              <td width="150" style="color:white;text-align:center">Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($this->subjectmod->get_all_subject() as $key => $value): ?>
                              <tr>
                                <td><?php echo $value['code'] ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <td>
                                  <a href="/edit_subject/<?php echo $value['id'] ?>" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                  <a href="/delete_subject/<?php echo $value['id'] ?>" class="label label-danger" onclick="return confirm('Do you sure?')">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
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
