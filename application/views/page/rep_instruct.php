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
                              Student 30%
                            </td>
                            <td style="color:white;text-align:center">
                              Self 20%
                            </td>
                            <td style="color:white;text-align:center">
                              Peer 20%
                            </td>
                            <td style="color:white;text-align:center">
                              Supervisor 30%
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
                            
                               <tr>
                                 <td><?php echo $std = $this->registration->student_result($this->session->userdata('fid'), $this->registration->get_cycle_end(), 2, .30) ?></td> 
                                 <td><?php echo $self = $this->registration->self_result($this->session->userdata('fid'), $this->registration->get_cycle_end(), 1, .20)  ?></td>
                                 <td><?php echo $peer = $this->registration->peer_result($this->session->userdata('fid'), $this->registration->get_cycle_end(), 1, .20) ?></td>
                                 <td><?php echo $super = $this->registration->supervisor_result($this->session->userdata('fid'), $this->registration->get_cycle_end(), 3, .30) ?></td>
                                 <td><?php echo $std + $self + $peer + $super ?></td>  
                                 <td><?php echo $cce_res = $this->registration->get_cce_results($this->session->userdata('fid'), $this->registration->get_cycle_end()) ?></td>  
                                 <td>
                                  <?php
                                  echo $this->registration->get_positions($this->registration->get_ranked($this->session->userdata('fid')))
                                  
                                    ?></td>  
                               </tr>
                           
                          </tbody>
                        </thead>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
