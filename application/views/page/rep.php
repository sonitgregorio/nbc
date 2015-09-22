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
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <td>
                              Name
                            </td>
                            <td>
                              School
                            </td>
                            <td>
                              QCE Result
                            </td>
                            <td>
                              CC Result
                            </td>
                            <td>
                              Position
                            </td>
                          </tr>
                          <tbody>
                            <?php
                             foreach ($this->registration->get_fs() as $key => $value):
                              
                             ?>
                               <tr>
                                
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
