<div id="page-content-wrapper">
    <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>

    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                <div class="panel panel-default" style="box-shadow: 0px 0px 20px rgb(49, 49, 49)">
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                        <h1 class="panel-title" style="color:white">CCE</h1>
                    </div>
                    <div class="panel-body">
                        <div style="max-width:400px;" class="center-block">
                            <div class="well well-lg">
                                <?php echo $error ?>
                                <form action="/show_instruc" method="post" enctype="multipart/form-data">
                                    <label>Criteria</label>
                                    <select class="form-control" name="criteria">
                                        <?php
                                            $c = $this->db->get('tbl_cce')->result_array();
                                            foreach($c as $cce)
                                            {
                                             ?>
                                             <option value="<?php echo $cce['id'] ?>"><?php echo $cce['description']; ?></option>
                                        <?php
                                            }
                                         ?>
                                    </select>
                                    <br>
                                    <div class="fileUpload btn btn-primary btn-block">
                                        <span class="glyphicon glyphicon-paperclip"></span>
                                        <input type="file" name="userfile" class="upload" />
                                        Attach a file
                                    </div>

                                    <br>
                                    <input type="submit" class="btn btn-primary pull-right" name="name" value="Submit">
                                    <span class="clearfix"></span>
                                </form>
                            </div>
                            <table class="table table-bordered">
                                <tr class="navbar-inverse">
                                    <td style="color:#fff" class="text-center">
                                        Criteria
                                    </td>
                                    <td class="text-center" style="color:#fff">
                                        Attachment
                                    </td>
                                </tr>
                                <?php
                                    $this->db->where('instructor', session('id'));
                                    $c = $this->db->get('attachment')->result_array();
                                    foreach($c as $criteria)
                                    {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    $e = $this->db->get_where('tbl_cce', array('id', $criteria['criteria']))->row_array();
                                                    echo $e['description'];
                                                 ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                 ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
