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
                              Subject Code
                            </td>
                            <td style="color:white;text-align:center">
                              Subject Description
                            </td>
                           <td style="color:white;text-align:center">
                              Summary
                            </td>
                          </tr>
                        </thead>
                          <tbody>
                            <?php foreach ($this->db->get('tbl_cycle')->result_array() as $key => $value): ?>
                              <?php foreach ($this->registration->get_subject_qce($value['id']) as $key => $vals): ?>
                                 <tr>
                                  <td><?php echo $vals['code'] ?></td>
                                  <td><?php echo $vals['description'] ?></td>
                                  <td style="text-align:right"><a href="/view_summary_subject/<?php echo $value['id'] ?>/<?php echo $vals['subject'] ?>" class="btn btn-info">View Summary</a></td>  
                                 
                               </tr>
                              <?php endforeach ?>
                                
                            <?php endforeach ?>

                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
