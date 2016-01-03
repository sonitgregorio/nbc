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
                $dates ="";
              }
       ?>
          <div class="container-fluid padding_zero">
              <div class="row"  style="padding:0" >
                  <div class="col-lg-12 padding_zero">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">Add Class</h1>
                        </div>
                        <div class="panel-body">
                    		    <?php echo $this->session->flashdata('message') ?>
                        	<form class="form" action="/insert_class" method="POST">
                        	<div class="col-md-6">
                        		<div class="form-group">
	                        		<label class="control-label">Instructor</label>
	                        		<select class="form-control js-example-theme-single" name="instructor" id="grp">
	                        			<option value="0">Select Instructor</option>
	                        			<?php foreach ($this->addclassmd->get_instruc() as $key => $value): ?>
	                        				<option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['fname']) ?></option>
	                        			<?php endforeach ?>
	                        		</select>
	                        	</div>
	                        	<div class="form-group">
	                        		<label class="control-label">Subject</label>
	                        		<select class="form-control js-example-theme-single" name="subject">
	                        			<option value="0">Select Subject</option>
	                        			<?php foreach ($this->addclassmd->get_subj() as $key => $value): ?>
	                        				<option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['sname']) ?></option>
	                        			<?php endforeach ?>
	                        		</select>
	                        	</div>
                        	</div>
                        	<div class="col-md-6">
	                    		<div class="form-group">
	                        		<label class="control-label">Year & Section</label>
	                        		<select class="form-control js-example-theme-single" name="yrsec">
	                        			<option value="0">Select Year & Section</option>
	                        			<?php foreach ($this->addclassmd->yrsect() as $key => $value): ?>
	                        				<option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['yrsec']) ?></option>
	                        			<?php endforeach ?>
	                        		</select>
	                        	</div>
	                        	<div class="form-group">
	                        		<label class="control-label">S.Y Semester</label>
	                        		<select class="form-control js-example-theme-single" name="semester">
	                        			<?php foreach ($this->addclassmd->get_sy() as $key => $value): ?>
                                  <option value="<?php echo $value['id'] ?>"><?php echo strtoupper($value['description']) ?></option>
                                <?php endforeach ?>
	                        		</select>
	                        		<div class="pull-right" style="margin-top:10px">
	                        			<a href="/add_class" class="btn btn-info">Cancel</a>
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
                                    <td style="color:white;text-align:center">Instructor</td>
                                    <td style="color:white;text-align:center">Subject</td>
                                    <td style="color:white;text-align:center">Year & Section</td>
                                    <td style="color:white;text-align:center">Semester</td>
                                    <td style="color:white;text-align:center">Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($this->addclassmd->get_classes() as $key => $value): ?>
                                    <tr>
                                      <td><?php echo $value['fname'] ?></td>
                                      <td><?php echo $value['subdesc'] ?></td>
                                      <td><?php echo $value['yrsec'] ?></td>
                                      <td><?php echo $value['semester'] ?></td>
                                      <td>
                                        <a href="/add_stud/<?php echo $value['id'] ?>" class="btn btn-info btn-xs">Add Student</a>
                                        <a href="" class="btn btn-danger btn-xs">Delete</a>
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