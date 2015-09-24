<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>

    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                  <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                    <h1 class="panel-title" style="color:white">QCE and CCE</h1>
                  </div>
                  <div class="panel-body">
                      <table id="example" class="table table-bordered table-striped responsive">
                        <thead>
                          <tr class="navbar-inverse">
                            <td style="color:white;text-align:center">
                              Name
                            </td>
                            <td style="color:white;text-align:center">
                              School
                            </td>
                            <td style="color:white;text-align:center">
                              Student
                            </td>
                            <td style="color:white;text-align:center">
                              Self
                            </td>
                            <td style="color:white;text-align:center">
                              Peer
                            </td>
                            <td style="color:white;text-align:center">
                              Supervisor
                            </td>
                            <td style="color:white;text-align:center">
                              QCE Result
                            </td>
                            <td style="color:white;text-align:center">
                              CCE Result
                            </td>
                            <td style="color:white;text-align:center">
                              Position
                            </td>
                          </tr>
                          <tbody>
                            <?php
                             foreach ($this->registration->get_fs() as $key => $value):
                              $x = $this->api->rank($value['userid']);
                             ?>
                               <tr>
                                 <td><?php echo $value['firstname'] ?></td>
                                 <td><?php echo $value['sch_name'] ?></td> 
                                 <td><?php echo $this->api->student_eval($value['facid']) ?></td> 
                                 <td><?php echo $this->api->self_eval($value['facid']) ?></td>
                                 <td><?php echo $this->api->peer_eval($value['facid']) ?></td>
                                 <td><?php echo $this->api->super_eval($value['facid']) ?></td>
                                 <td><?php echo  $this->api->self_eval($value['facid']) + $this->api->peer_eval($value['facid']) + $this->api->student_eval($value['facid']) + $this->api->super_eval($value['facid']) ?></td>  
                                 <td><?php echo $x['cce'] ?></td>  
                                 <td><?php echo $this->registration->getPo($x['position']) ?></td>  
                               </tr>
                            <?php endforeach ?>
                           
                          </tbody>
                        </thead>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
