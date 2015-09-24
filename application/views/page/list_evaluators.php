<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 padding_zero">
                  <div class="panel panel-default padding_zero" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                  <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                    <h1 class="panel-title" style="color:white">School Registration</h1>
                  </div>
                  <div class="panel-body">
                    <?php
                         echo $this->session->flashdata('message');
                     ?>
                      <div class="col-md-12">
                        <hr style="border: 1px solid brown;" />
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <td>Name</td>
                              <td>Email Address</td>
                              <td>Contact</td>
                              <td width="150">Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($this->registration->list_evaluate() as $key => $value):
                            extract($value);
                            ?>
                              <tr>
                                <td><?php echo $firstname . " " . $middlename . " " . $lastname; ?></td>
                                <td><?php echo $emailaddress ?></td>
                                <td><?php echo $contact; ?></td>
                                <td>
                                  <?php 
                                      if ($fid == $this->session->userdata('fid')) 
                                      {
                                        $evs = 'Self';
                                      } 
                                      elseif ($usertype == 3) 
                                      {
                                        $evs = 'Supervisor';
                                      } 
                                      elseif ($usertype == 1)
                                      {
                                        $evs = 'Peer';
                                      }
                                      else{
                                        $evs = 'Student';
                                      }
                                    ?>
                                    <a href="/add_evaluators/<?php echo $id ?>" class="btn btn-info btn-sm">Add As My <?php echo $evs ?> Evaluator&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
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
