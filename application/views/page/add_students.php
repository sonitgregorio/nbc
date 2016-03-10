<?php 
    
  $info = $this->addclassmd->get_info($classid);
$ctr = 0;
 ?>

<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="position:fixed">Menu</a>
    <div class="col-md-12">
          <div class="container-fluid padding_zero" >
              <div class="row"  style="padding:0" >
                  <div class="col-lg-12 padding_zero" style="margin-top:30px">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Add Student</h1>
                        </div>
                        <div class="panel-body">
                    		    <?php echo $this->session->flashdata('message') ?>


                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Instructor</label>
                              <label class="form-control"><?php echo $info['fname'] ?></label>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Subject</label>
                              <label class="form-control"><?php echo $info['subdesc'] ?></label>
                            </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                              <label class="control-label">Year & Section</label>
                              <label class="form-control"><?php echo $info['yrsec'] ?></label>
                            </div>
                            <div class="form-group">
                              <label class="control-label">S.Y Semester</label>
                             <label class="form-control"><?php echo $info['semester'] ?></label>
                            </div>
                          </div>
                           <hr style="border: 1px solid brown;" />
                        	<form class="form" action="/insert_student" method="POST">
                        	<div class="col-md-6">
                            <input type="hidden" name="subid" value="<?php echo $info['subid'] ?>" />
                            <input type="hidden" name="classid" value="<?php echo $classid ?>" />
                            <input type="hidden" name="sy" value="<?php echo $info['sy'] ?>" />
	                        	<div class="form-group">
	                        		<label class="control-label">Name</label>
	                        		<select class="form-control js-example-theme-single" name="student">
	                        			<option value="0">Select Student</option>
	                        			<?php foreach ($this->addclassmd->get_students($info['subid'], $info['sy']) as $key => $value): ?>
	                        				<option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['firstname'] . " " . $value['lastname']) ?></option>
	                        			<?php endforeach ?>
	                        		</select>
                              <div class="pull-right" style="margin-top:10px">
                                <button type="submit" class="btn btn-success">Save</button>
                              </div>
	                        	</div>
                        	</div>
                        
	                        </form>
                            <div class="col-md-12" style="padding:0">
                            <hr style="border: 1px solid brown;" />
                            <div class="table-responsive">
                              <table id="example" class="table table-bordered dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                  <tr class="navbar-inverse">
                                    <td style="color:white;text-align:center" width="3">No.</td>
                                    <td style="color:white;text-align:center">Student Name</td>
                                    <td style="color:white;text-align:center">Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($this->addclassmd->get_stud_class($classid) as $key => $value): ?>
                                    <tr>
                                      <td><?php echo $ctr += 1 ?></td>
                                      <td><?php echo $value['firstname'] . " " . $value['middlename'] . " " . $value['lastname']?></td>
                                      <td>
                                        <a href="/addClassed/delete_stud/<?php echo $value['cid'] . "/" . $classid?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</a>
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
</div>