<div id="page-content-wrapper">
  <a href="#menu-toggle" id="menu-toggle" class="btn btn-info">Menu</a>
    <div class="container-fluid padding_zero">
        <div class="row padding_zero">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(157, 90, 71)" >
                        <h1 class="panel-title" style="color:white">Evaluate</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="navbar-inverse">
                                    <td style="color:#fff" class="text-center">Name</td>
                                    <td style="color:#fff" class="text-center">Current Position</td>
                                    <td style="color:#fff" class="text-center">School</td>
                                    <td style="color:#fff" class="text-center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $this->db->where('student_id', $this->session->userdata('id'));
                                $i = $this->db->get('tbl_student_eval')->result_array();
                                foreach($i as $ins)
                                {
                                    $instruc = $this->db->get_where('tbl_faculty', array('id' => $ins['instructor']))->row_array();
                            ?>
                                <tr>
                                    <td><?php echo $instruc['firstname'].' '.$instruc['lastname']; ?></td>
                                    <td>
                                        <?php
                                            $this->db->where('id', $instruc['position']);
                                            $pos = $this->db->get('position')->row_array();
                                            echo $pos['description'];
                                         ?>
                                    </td>
                                    <td>
                                        <?php
                                            $this->db->where('id', $instruc['school']);
                                            $sch = $this->db->get('tbl_school')->row_array();
                                            echo $sch['sch_name'];
                                         ?>
                                    </td>
                                    <td>
                                        <?php
                                            $this->db->where('evaluator', session('id'));
                                            $this->db->where('to_evaluate', $ins['instructor']);
                                            $c = $this->db->count_all_results('tbl_evaluation');
                                            $style = '';
                                            if($c > 0)
                                                $style = 'disabled';
                                         ?>
                                        <a href="/instructor_eval/<?php echo $instruc['id'] ?>" <?php echo $style ?> class="btn btn-info btn-block">Evaluate</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
