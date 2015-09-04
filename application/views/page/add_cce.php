<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                  <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                  <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                    <h1 class="panel-title" style="color:white">Add CCE  Criteria</h1>
                  </div>
                  <div class="panel-body">
                      <form class="form-horizontal" action="index.html" method="post">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Criteria</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" value="" class="form-control" placeholder="First Name">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Point</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" value="" class="form-control" placeholder="Middle Name">
                            </div>
                          </div>
                          <div class="form-goup">
                            <div class="col-sm-12">
                                <button type="submit" class = "btn btn-success pull-right" name="button">Save</button>
                            </div>
                            <br /> <br />
                          </div>
                        </div>

                      </form>

                      <div class="col-md-12">

                        <hr style="border: 1px solid brown;" />
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr>
                              <td>Criteria</td>
                              <td width="300">Point System</td>
                              <td width="150">Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Doctorate</td>
                              <td>85</td>
                              <td>
                                <a href="#" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#" class="label label-danger">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                              </td>
                            </tr>
                            <tr>
                              <td>Masters</td>
                              <td>60</td>
                              <td>
                                <a href="#" class="label label-info">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#" class="label label-danger">Delete&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>


                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
