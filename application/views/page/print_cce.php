<?php 
    $count = 0;
    $x = $this->db->query("SELECT * FROM tbl_cycle ORDER BY id DESC LIMIT 2")->result_array();
    foreach ($x as $key => $value) {
        $x = $value['id'];
        $count += 1;
    }


    $get_prev = $this->db->query("SELECT * FROM tbl_cycle WHERE id = $x")->row_array();
    $dat = strtotime($get_prev['date_from']);
    $f = date('F j, Y', $dat);


    $active = $this->db->query("SELECT * FROM tbl_cycle ORDER by id DESC LIMIT 1")->row_array();
    $ac = $active['id'];
    $d =date('F j, Y', strtotime($active['date_from']));


 ?>




<div class="navbar-inverse hide_this" style="padding:10px;border-radius:0px;">
     <button class="btn btn-primary hideprint" onclick="window.print()"><span class="glyphicon glyphicon-print">&nbsp;Print</span></button>      
</div>

    <div class="col-md-10 col-md-offset-1 bor">
        <div style="margin-top:20px;margin-bottom:30px">
            <center><p><img src="<?= base_url() ?>assets/images/EVSU.jpg" width="30px">&nbsp;<b>EASTERN VISAYAS STATE UNIVERSITY</b></p></center>
            <center><p>Tacloban City</p></center>

            <center>
            <table style="width:80%;">
                <tr >
                    <td style="width:10%">Name</td>
                    <td style="width:30%;border-bottom:1px solid black"></td>
                    <td style="width:25%;padding-left:10px">Campus / College</td>
                    <td style="width:30%;border-bottom:1px solid black"></td>
                </tr>
                <tr>
                    <td style="width:20%">Present Rank</td>
                    <td style="width:10%;border-bottom:1px solid black"></td>
                    <td style="width:10%;padding-left:10px">Department</td>
                    <td style="width:10%;border-bottom:1px solid black"></td>
                </tr>
            </table>
            <br />
            <br />
            <center><h5><b>PASUC CRITERIA FOR EVALUATION OF FACULTY</b></h5></center>
            <center><h5><b>NBC 461 <u><?= $active['description'] ?></u> Cycle</b></h5></center>
            </center>
            <br />
            <table class="table table-bordered">
                <thead>
                    <tr style="text-align:center">
                        <td>MAJOR COMPONENTS</td>
                        <td>MAXIMUM POINTS</td>
                        <td>PREVIOUS POINTS AS <?= $f ?></td>
                        <td>ADDITIONAL POINTS AS <?= $d ?></td>
                        <td>TOTAL CCE POINTS </td>
                        <td>QCE POINTS </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Educational Qualification</td>
                        <td>85</td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '1') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($active['id'], '1') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '1') + $this->registration->get_sum_points_cce($active['id'], '1') ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Experience and Length of Service</td>
                        <td>25</td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '2') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($active['id'], '2') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '2') + $this->registration->get_sum_points_cce($active['id'], '2') ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Professional Development Achievement and Honors</td>
                        <td>90</td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '3') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($active['id'], '3') ?></td>
                        <td><?= $this->registration->get_sum_points_cce($get_prev['id'], '3') + $this->registration->get_sum_points_cce($active['id'], '3') ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table>
                    <tr style="margin-right:300px">
                        <td colspan="4" style="padding-right:400px;">Local Evaluation Committee</td>
                        <td colspan="4" style="padding-right:300px;">Review Committee</td>
                    </tr>
                    <tr>
                        
                        <td colspan="3" style="padding-left:80px">&nbsp;</td>
                        <td colspan="4" style="padding-left:80px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>

                    <tr>
                        <td colspan="4" style="padding-left:80px">Chairman</td>
                        <td colspan="4" style="padding-left:80px">Chairman</td>
                    </tr>
                    <tr>
                        
                        <td colspan="4" style="padding-left:80px">&nbsp;</td>
                        <td colspan="4" style="padding-left:80px">&nbsp;</td>
                    </tr>
                     <tr>
                        
                        <td colspan="3" style="padding-left:80px">Members</td>
                        <td colspan="4" style="padding-left:80px">Members</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
                     <tr>
                        <td colspan="4">____________________________</td>
                        <td colspan="4">____________________________</td>
                    </tr>
            </table>
        </div>
    </div>
        