<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info" style="position:fixed">Menu</a>
    <div class="col-md-12">
          <div class="container-fluid padding_zero" style="margin-top:30px">
              <div class="row"  style="padding:0" >
                  <div class="col-lg-12 padding_zero">
                        <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49);" >
                        <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                          <h1 class="panel-title" style="color:white">User logs</h1>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal">
                            <div class="col-md-4" style="padding:0px">
                              <label class="col-sm-3 control-label">From</label>
                              <div class="col-sm-9">
                              <input type="date" name="from" class="form-control fr" />
                                
                              </div>
                            </div>
                            <div class="col-md-4" style="padding:0px">
                              <label class="col-sm-3 control-label">To</label>
                              <div class="col-sm-9">
                              <input type="date" name="to" class="form-control tok" />
                                
                              </div>
                            </div>

                          </form>
                    		    <div class="table table-responsive">

                            <br />
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <tr class="navbar-inverse" style="text-align:center;color:white">
                                    <td>Name</td>
                                    <td>Activity</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                  </tr>
                                </thead>
                                <tbody class="reft">
                                  <?php foreach ($this->db->query("SELECT * FROM tbl_logs ORDER BY id desc")->result_array() as $key => $value): ?>
                                    <tr>
                                      <td><?= $value['names']?></td>
                                      <td><?= $value['activity']?></td>
                                      <td><?= $value['date_log']?></td>
                                      <td><?= $value['time_log']?></td>
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