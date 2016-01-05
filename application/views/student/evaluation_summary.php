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
                        <h4 class="text-center">The QCE of the NBC No. 461</h4>
                        <h4 class="text-center">Instrument for Instruction/Teaching Effectiveness</h4>
                        <br>
                         <?php

                            //First Group
                            $aname1 = $this->facultymod->get_points_qce('group1', 'aname1', $id);
                            $aname2 = $this->facultymod->get_points_qce('group1', 'aname2', $id);
                            $aname3 = $this->facultymod->get_points_qce('group1', 'aname3', $id);
                            $aname4 = $this->facultymod->get_points_qce('group1', 'aname4', $id);
                            $aname5 = $this->facultymod->get_points_qce('group1', 'aname5', $id);
                            $anamelowest = $this->facultymod->get_lowest('group1', $id);
                            $anametotal = $aname1 + $aname2 + $aname3 + $aname4 + $aname5;

                            //Second Group
                            $bname1 = $this->facultymod->get_points_qce('group2', 'bname1', $id);
                            $bname2 = $this->facultymod->get_points_qce('group2', 'bname2', $id);
                            $bname3 = $this->facultymod->get_points_qce('group2', 'bname3', $id);
                            $bname4 = $this->facultymod->get_points_qce('group2', 'bname4', $id);
                            $bname5 = $this->facultymod->get_points_qce('group2', 'bname5', $id);
                            $bnamelowest = $this->facultymod->get_lowest('group2', $id);
                            $bnametotal = $bname1 + $bname2 + $bname3 + $bname4 + $bname5;
                            //Third Group
                            $cname1 = $this->facultymod->get_points_qce('group3', 'cname1', $id);
                            $cname2 = $this->facultymod->get_points_qce('group3', 'cname2', $id);
                            $cname3 = $this->facultymod->get_points_qce('group3', 'cname3', $id);
                            $cname4 = $this->facultymod->get_points_qce('group3', 'cname4', $id);
                            $cname5 = $this->facultymod->get_points_qce('group3', 'cname5', $id);
                            $cnamelowest = $this->facultymod->get_lowest('group3', $id);
                            $cnametotal = $cname1 + $cname2 + $cname3 + $cname4 + $cname5;
                            //Fourth Group
                            $dnamelowest = $this->facultymod->get_lowest('group4', $id);
                            $dname1 = $this->facultymod->get_points_qce('group4', 'dname1', $id);
                            $dname2 = $this->facultymod->get_points_qce('group4', 'dname2', $id);
                            $dname3 = $this->facultymod->get_points_qce('group4', 'dname3', $id);
                            $dname4 = $this->facultymod->get_points_qce('group4', 'dname4', $id);
                            $dname5 = $this->facultymod->get_points_qce('group4', 'dname5', $id);
                            $dnametotal = $dname1 + $dname2 + $dname3 + $dname4 + $dname5;


                         ?>
                        <br>
                        <?php

                             $ds = $this->facultymod->get_sy($id); 
                             $xtra = explode(' - ', $ds);

                        ?>
                        <h4 class="text-center">Note. The highlited Part is lowest Points in your Evaluation</h4>
                        <center><b>School Year:&nbsp;&nbsp;<?php echo $xtra[0] ?>&nbsp;&nbsp;&nbsp;Semester:&nbsp;&nbsp;<?php echo $xtra[1] ?></b></center>
                        <form action="/submit_evaluate" method="post">
                        
                            <table class="table table-bordered center-block" style="max-width:700px;">
                                <tr class="text-center">
                                    <td style="width:10%">Score</td>
                                    <td style="width:40%">Descriptive Rating</td>
                                    <td style="width:50%">Qualitative Description</td>
                                </tr>
                                <tr class="text-center">
                                    <td>5</td>
                                    <td>Outstanding</td>
                                    <td>
                                        The performance almost always exceeds the job requirements.
                                        The Faculty is an exceptional role model
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>4</td>
                                    <td>Very Satisfactory</td>
                                    <td>The  performance meets and often exceeds the job requirements</td>
                                </tr>
                                <tr class="text-center">
                                    <td>3</td>
                                    <td>Satisfactory</td>
                                    <td>The performance meets job requirements</td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Fair</td>
                                    <td>The performance needs some development to meet job requirements.</td>
                                </tr>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Poor</td>
                                    <td>The faculty fails to meet job requirements</td>
                                </tr>
                            </table>

                            <table class="table table-bordered center-block" style="max-width:700px;">
                                <tr>
                                    <td><strong>A. Commitment</strong></td>
                                    <td colspan="5" class="text-center"><strong>Score</strong></td>
                                </tr>
                                <tr <?php echo $aname1 == $anamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        1.	Demonstrates sensitivity to students’ ability to attend and absorb content information.
                                    </td>
                                   <td style="text-align:right"><?php echo $aname1 ?></td>
                                </tr>
                                <tr <?php echo $aname2 == $anamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        2.	Integrates sensitively his/her learning objectives with those of the students in a collaborative process.
                                    </td>
                                   <td style="text-align:right"> <?php echo $aname2 ?></td>
                                </tr>
                                <tr <?php echo $aname3 == $anamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        3.	Makes self available to students beyond official time
                                    </td>
                                   <td style="text-align:right"><?php echo $aname3 ?></td>
                                </tr>
                                <tr <?php echo $aname4 == $anamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        4.	Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.
                                    </td>
                                   <td style="text-align:right"><?php echo $aname4 ?></td>
                                </tr>
                                <tr <?php echo $aname5 == $anamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        5.	Keeps accurate records of students’ performance and prompt submission of the same.
                                    </td>
                                   <td style="text-align:right"><?php echo $aname5 ?></td>
                                </tr>
                                <tr>
                                    <td  class="text-right">
                                        <strong>Total Score</strong>
                                    </td>
                                    <td colspan="5">
                                        <span id="aname"><?php echo $anametotal ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>B. Knowledge of Subject</strong></td>
                                    <td colspan="5" class="text-center"><strong>Score</strong></td>
                                </tr>
                                <tr <?php echo $bname1 == $bnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        1.	Demonstrates mastery of the subject matter (explain the subject matter without relying solely on the prescribed textbook).
                                    </td>
                                   <td style="text-align:right"><?php echo $bname1 ?></td>

                                </tr>
                                <tr <?php echo $bname2 == $bnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        2.	Draws and share information on the state on the art of theory and practice in his/her discipline.
                                    </td>
                                   <td style="text-align:right"><?php echo $bname2 ?></td>
                                </tr>
                                 <tr <?php echo $bname3 == $bnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        3.	Integrates subject to practical circumstances and learning intents/purposes of students.
                                    </td>
                                   <td style="text-align:right"><?php echo $bname3 ?></td>
                                    
                                </tr>
                                 <tr <?php echo $bname4 == $bnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        4.	Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.
                                    </td>
                                  <td style="text-align:right"><?php echo $bname4 ?></td>
                                </tr>
                                 <tr <?php echo $bname5 == $bnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        5.	Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.
                                    </td>
                                    <td style="text-align:right"><?php echo $bname5 ?></td>
                                   
                                </tr>
                                <tr>
                                    <td  class="text-right">
                                        <strong>Total Score</strong>
                                    </td>
                                    <td colspan="5">
                                        <span id="bname"><?php echo $bnametotal ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>C. Teaching for Independent Learning</strong></td>
                                    <td colspan="5" class="text-center"><strong>Score</strong></td>
                                </tr>
                                 <tr <?php echo $cname1 == $cnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        1.	Creates teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).
                                    </td>
                                    <td style="text-align:right"><?php echo $cname1 ?></td>

                                  
                                </tr>
                                 <tr <?php echo $cname2 == $cnamelowest ? "style='background:tomato;color:white'": ''?>>                                
                                    <td class="text-justify">
                                        2.	Enhances student self-esteem and/or gives due recognition to students’ performance/potentials.
                                    </td>
                                    <td style="text-align:right"><?php echo $cname2 ?></td>
                                    
                                   
                                </tr>
                                 <tr <?php echo $cname3 == $cnamelowest ? "style='background:tomato;color:white'": ''?>>                                
                                    <td class="text-justify">
                                        3.	Allows students to create their own course with objectives and realistically defined student-professor rules and make them accountable for their performance
                                    </td>
                                    <td style="text-align:right"><?php echo $cname3 ?></td>
                              
                                   
                                </tr>
                                <tr <?php echo $cname4 == $cnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        4.	Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.
                                    </td>
                                    <td style="text-align:right"><?php echo $cname4 ?></td>
                                    
                                    
                                </tr>
                                <tr <?php echo $cname5 == $cnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        5.	Encourages students to learn beyond what is required and help/guide the students how to apply the concepts learned
                                    </td>
                                    <td style="text-align:right"><?php echo $cname5 ?></td>
                                    
                                    
                                </tr>
                                <tr>
                                    <td  class="text-right">
                                        <strong>Total Score</strong>
                                    </td>
                                    <td colspan="5">
                                        <span id="cname"><?php echo $cnametotal ?></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>D. Management of Learning</strong></td>
                                    <td colspan="5" class="text-center"><strong>Score</strong></td>
                                </tr>
                                <tr <?php echo $dname1 == $dnamelowest ? "style='background:tomato;color:white'": ''?>>
                                
                                    <td class="text-justify">
                                        1.	Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g. breaks class into dyads, triads or buzz/task groups).
                                    </td>
                                    <td style="text-align:right"><?php echo $dname1 ?></td>
                                    
                                   
                                </tr>
                                <tr <?php echo $dname2 == $dnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        2.	Assumes roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.
                                    </td>
                                    <td style="text-align:right"><?php echo $dname2 ?></td>
                                    
                                </tr>
                                <tr <?php echo $dname3 == $dnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        3.	Designs and implements learning conditions and experience that promotes healthy exchange and/or confrontations.
                                    </td>
                                    <td style="text-align:right"><?php echo $dname3 ?></td>
                                    
                                </tr>
                                <tr <?php echo $dname4 == $dnamelowest ? "style='background:tomato;color:white'": ''?>>
                                    <td class="text-justify">
                                        4.	Structures/re-structures learning and teaching–learning context to enhance attainment of collective learning objectives.
                                    </td>
                                    <td style="text-align:right"><?php echo $dname4 ?></td>
                                    
                                </tr>
                                <tr <?php echo $dname5 == $dnamelowest ? "style='background:tomato;color:white'": ''?>>
                                  <td class="text-justify">
                                        5.	Use of Instructional Materials ((audio/video materials: fieldtrips, film showing, computer aided instruction and etc.) to reinforces learning processes.
                                    </td>
                                    <td style="text-align:right"><?php echo $dname5 ?></td>
                                </tr>
                                <tr>
                                    <td  class="text-right">
                                        <strong>Total Score</strong>
                                    </td>
                                    <td colspan="5">
                                        <span id="dname"><?php echo $dnametotal ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <input type="submit" class="btn btn-primary btn-sm pull-right" name="name" value="Submit">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
