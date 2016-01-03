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
                    <table class="table table-bordered">
                        <thead>




                            <?php 
                                $info = $this->registration->info();

                                $datetime1 = new DateTime($info['dates']);
                                $datetime2 = new DateTime(Date('Y-m-d'));
                                $interval = $datetime1->diff($datetime2);
                                echo $interval->format('%y');

                             ?>
                            <tr>
                                <th colspan="2" style="text-align:center;color:white" class="navbar-inverse">COMON CRITERIA EVALUATION</th>
                            </tr>
                            <tr>
                                <td style="width:50%">Name of Faculty</td>
                                <td><?php echo $info['firstname'] . " " . $info['middlename'] . " " . $info['lastname'] ?></td>
                            </tr>
                            <tr>
                                <td>Name of School</td>
                                <td><?php echo $this->registration->sch_per($info['school']) ?></td>
                            </tr>
                            <tr>
                                <td>Academic Rank</td>
                                <td><?php echo $this->registration->get_pos($info['position']) ?></td>
                            </tr>
                            <tr>
                                <td>Total CCE Points</td>
                                <td><?php echo number_format($this->registration->get_total_cce() , 2, '.', '')?></td>
                            </tr>
                        </thead>
                        
                    </table>

                <form class="form" method="post" action="/insert_this_cce">
                     <div style="max-height: 440px; overflow-y: auto;">
                    <table class="table table-bordered" style="height:10px" id="table-container">
                        <thead class="navbar-inverse" style="color:white;">
                            <th style="text-align:center">Components</th>
                            <th style="text-align:center">Point System</th>
                            <td>No. Of Days</td>
                            <th style="text-align:center">Score</th>
                        </thead>
                        <tbody>
                            <?php foreach ($this->registration->load_cce() as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['description'] ?></td>
                                    <td><?php echo $value['point'] ?></td>
                                    <td>
                                        <?php if ($value['id'] == 78 OR $value['id'] == 79 or $value['id'] == 77): ?>
                                            <input type="text" class="<?php echo $value['id'] ?> form-control"  name="daysss">
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($value['point'] != ""): ?>
                                            <?php
                                                 $x = $this->registration->get_cce_points($value['id']);
                                                 if ($x == "") {
                                                     $x = 0;
                                                 } 
                                             ?>
                                             <?php if ($value['id'] == 78 OR $value['id'] == 79 or $value['id'] == 77): ?>
                                            <input type="hidden" id="<?php echo $value['id'] ?>" class="form-control" name="<?php echo $value['id'] ?>" value="<?php echo $x ?>">
                                            <input type="text" disabled id="<?php echo $value['id'] . '-1' ?>" class="form-control" name="<?php echo $value['id'] ?>" value="<?php echo $x ?>">
                                               
                                            <?php else: ?>
                                            <input type="text" id="<?php echo $value['id'] ?>" class="form-control" name="<?php echo $value['id'] ?>" value="<?php echo $x ?>">

                                             <?php endif ?>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                           
                        </tbody>

                           
                    </table>
                </div>
                <br/>
                     <button type='submit' class="btn btn-success pull-right">Submit</button>
             </form>
                </div>
            </div>
        </div>
    </div>
</div>