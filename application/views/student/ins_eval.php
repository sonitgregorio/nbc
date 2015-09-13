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
                        <h5 class="text-center">Rating Period:______________________ to ______________________</h5>
                        <?php
                            $pos = $this->db->get_where('position', array('id' => $instructor['position']))->row_array();
                         ?>
                        <h5 class="text-center">Name of Faculty: <?php echo $instructor['firstname'].' '.$instructor['lastname'] ?> &nbsp;&nbsp;&nbsp;Academic Rank : <?php echo $pos['description'] ?></h5>
                        <br>
                        <h4 class="text-center">Instruction: Please evaluate the faculty using the scale below. Select your rating.</h4>
                        <table class="table table-bordered center-block" style="max-width:700px;">
                            <tr class="text-center">
                                <td style="width:10%">
                                    Scale
                                </td>
                                <td style="width:40%">
                                    Descriptive Rating
                                </td>
                                <td style="width:50%">
                                    Qualitative Description
                                </td>
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
                                <td>
                                    The  performance meets and often exceeds the job requirements
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>3</td>
                                <td>Satisfactory</td>
                                <td>
                                    The performance meets job requirements
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>Fair</td>
                                <td>
                                    The performance needs some development to meet job requirements.
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td>Poor</td>
                                <td>
                                    The faculty fails to meet job requirements
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered center-block" style="max-width:700px;">
                            <tr>
                                <td><strong>A. Commitment</strong></td>
                                <td colspan="5" class="text-center"><strong>Scale</strong></td>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    1.	Demonstrates sensitivity to students’ ability to attend and absorb content information.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    2.	Integrates sensitively his/her learning objectives with those of the students in a collaborative process.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    3.	Makes self available to students beyond official time
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    4.	Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    5.	Keeps accurate records of students’ performance and prompt submission of the same.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td  class="text-right">
                                    <strong>Total Score</strong>
                                </td>
                                <td colspan="5">

                                </td>
                            </tr>

                            <tr>
                                <td><strong>B. Knowledge of Subject</strong></td>
                                <td colspan="5" class="text-center"><strong>Scale</strong></td>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    1.	Demonstrates mastery of the subject matter (explain the subject matter without relying solely on the prescribed textbook).
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    2.	Draws and share information on the state on the art of theory and practice in his/her discipline.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    3.	Integrates subject to practical circumstances and learning intents/purposes of students.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    4.	Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    5.	Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td  class="text-right">
                                    <strong>Total Score</strong>
                                </td>
                                <td colspan="5">

                                </td>
                            </tr>

                            <tr>
                                <td><strong>C. Teaching for Independent Learning</strong></td>
                                <td colspan="5" class="text-center"><strong>Scale</strong></td>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    1.	Creates teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    2.	Enhances student self-esteem and/or gives due recognition to students’ performance/potentials.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    3.	Allows students to create their own course with objectives and realistically defined student-professor rules and make them accountable for their performance
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    4.	Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    5.	Encourages students to learn beyond what is required and help/guide the students how to apply the concepts learned
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td  class="text-right">
                                    <strong>Total Score</strong>
                                </td>
                                <td colspan="5">

                                </td>
                            </tr>

                            <tr>
                                <td><strong>D. Management of Learning</strong></td>
                                <td colspan="5" class="text-center"><strong>Scale</strong></td>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    1.	Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g. breaks class into dyads, triads or buzz/task groups).
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    2.	Assumes roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    3.	Designs and implements learning conditions and experience that promotes healthy exchange and/or confrontations.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    4.	Structures/re-structures learning and teaching–learning context to enhance attainment of collective learning objectives.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td class="text-justify">
                                    5.	Use of Instructional Materials ((audio/video materials: fieldtrips, film showing, computer aided instruction and etc.) to reinforces learning processes.
                                </td>
                                <?php for($i = 5; $i >= 1; $i--){ ?>
                                    <td> <input type="radio" name="name" value=""><?php echo $i ?></td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>
