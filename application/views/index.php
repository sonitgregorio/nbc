<div class="col-md-4 col-md-offset-4" style="margin-top: 18%">
    <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
        <div class="panel-heading" style="background: rgb(157, 90, 71)"><h3 class="panel-title" style="color:white; font-size:30px;">User Login</h3></div>
          <div class="panel-body">
              <form class="form-horizontal" action="/" method="post">
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" placeholder="Username">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" value="" placeholder="Password">
                      </div>
                  </div>
                  <button type="submit" class="btn btn-success pull-right">Login</button>
              </form>
          </div>
    </div>
</div>
