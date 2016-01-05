<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="">Menu</a>
    <div class="col-md-12">

     <div class="container-fluid padding_zero">
          <div class="row"  style="padding:0" >
             <div class="col-lg-12 padding_zero">
                    <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                      <h1 class="panel-title" style="color:white">Add Evaluator</h1>
                    </div>
                    <div class="panel-body">
                       <div class="col-md-12">
                       	<?php echo $this->session->flashdata('message') ?>

                        <center><a href="/generate_eval/<?php echo $id ?>" class="btn btn-success btn-lg">Generate Evaluators</a></center>

                       	<form class="form" action="/insert_faculty_evaluator" method="post">
                       		<!-- <input type="hidden" value="<?php echo $id ?>" name="uid">
                       		<div class="col-md-6">
                       			<label>Evaluator</label>
                       			<select class="form-control" name="evaluator">
	                       			<?php foreach ($this->registration->getAllusers() as $key => $value): ?>
	                       				<option value="<?php echo $value['uid'] ?>"><?php echo ucwords(strtolower($value['firstname'] . " " . $value['lastname'])) ?></option>
	                       			<?php endforeach ?>                       			
	                       		</select>
                       			<label>Subject</label>
	                       		<select class="form-control" name="subid">
	                       			<?php foreach ($this->subjectmod->get_all_subject() as $key => $value): ?>
	                       				<option value="<?php echo $value['id'] ?>"><?php echo $value['description'] ?></option>
	                       			<?php endforeach ?>
	                       		</select>
	                       		<div class="pull-right" style="margin-top:10px">
	                       			<button type="submit" class="btn btn-success">Save</button>
	                       			<a href="/faculty_list" class="btn btn-info">Cancel</a>
	                       		</div>
                       		</div> -->
                       	</form>
                          <hr style="border: 1px solid brown;"/>
                          <table id="example" class="table table-bordered">
                            <thead>
                              <tr class="navbar-inverse">
                                <td style="color:white;text-align:center">Name of Evaluator</td>

                                <td style="color:white;text-align:center">Subject</td>
                                <td style="color:white;text-align:center;width:60px">Action</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($this->facultymod->get_evaluators($id) as $key => $value):
                                
                                ?>
                                <tr>
                                  <td><?php echo ucwords(strtolower($value['names'])); ?></td>
                                  <td><?php echo $value['description'] ?></td>
                                  <td><a href="/delete_evaluators/<?php echo $value['eid'] . '/' . $id ?>" class="btn btn-danger" onclick="confirm('Are You Sure?')">Delete</a></td>
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
 </div>
