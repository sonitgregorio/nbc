<div id="page-content-wrapper">
    <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>

    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                        <h1 class="panel-title" style="color:white">QCE</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                        <thead class="navbar-inverse">
                           <tr >
                            
                            <td style="color:white;text-align:center">
                              Cycle
                            </td>
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
                              Summary
                            </td>
                          </tr>
                        </thead>
                          <tbody>
                            <?php foreach ($this->db->get('tbl_cycle')->result_array() as $key => $value): ?>
                                 <tr>
                                 <td><?php echo $value['description'] ?></td>  
                                 <td><?php echo $std = $this->registration->student_result($this->session->userdata('fid'), $value['id'], 2, .30) ?></td> 
                                 <td><?php echo $self = $this->registration->self_result($this->session->userdata('fid'), $value['id'], 1, .20)  ?></td>
                                 <td><?php echo $peer = $this->registration->peer_result($this->session->userdata('fid'), $value['id'], 1, .20) ?></td>
                                 <td><?php echo $super = $this->registration->supervisor_result($this->session->userdata('fid'), $value['id'], 3, .30) ?></td>
                                 <td><?php echo $std + $self + $peer + $super ?></td>  
                                  <td style="text-align:right"><a href="/view_summary/<?php echo $value['id'] ?>" class="btn btn-info">View Summary</a></td>  
                                 
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
