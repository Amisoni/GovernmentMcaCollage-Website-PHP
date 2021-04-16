<?php
include './include/header.php';
include './include/config.php';
?>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #244771;
        color: white;
    }
    .cardbody{
        padding-top: 15px;
    }
    html
    {
        overflow-x:hidden;
        width: 100%;
    }
</style>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Staff Detail</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="staff.php">Staff</a></li>
                            <li>Staff Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->

<!--Teachers Area Start-->
<div class="teachers-area" style="padding-top: 50px;">
    <div class="row">
        <?php
        $id = $_REQUEST['id'];
        $sel = "SELECT * FROM `registration` WHERE `reg_id`='" . $id . "' ";
        $qry = mysqli_query($con, $sel);
        $row = mysqli_fetch_assoc($qry);
        $img_path = $row['profile'];
        ?>
        <?php
        $sel1 = "SELECT * FROM `personal_dtls` WHERE `reg_id`='" . $row['reg_id'] . "'";
        $qry1 = mysqli_query($con, $sel1);
        $row1 = mysqli_fetch_assoc($qry1);
        ?>

       <!--  <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-teacher-item" style="padding-left: 20px;"> 
                <div class="single-teacher-image">
                    <a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>">
                        <img src="<?php echo 'admin_theme/images/registration/' . $img_path; ?>" alt="" style="height: 200px;width: 500px;">
                    </a>
                </div>
                <div class="single-teacher-text">
                    <h3><a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>"></a></h3>
                    <h4><?php echo $row['name']; ?></h4>
                    <h4><?php echo $row1['designation']; ?></h4>
                </div>
            </div>
        </div> -->
        

        <div class="col-md-12"  style="margin-left: 5px;">
            <div class="col-md-3" style="border-right: solid;margin-right:20px;border-color:#d4d0d0;">
                <button class="w3-bar-item w3-button" onclick="openTab('Profile')">Personal Details</button>
                <button class="w3-bar-item w3-button" onclick="openTab('EducationQualification')">Education Qualification</button>
                <button class="w3-bar-item w3-button" onclick="openTab('Portfolio')" >Portfolio </button>
                <button class="w3-bar-item w3-button" onclick="openTab('SkillKnowledge')" >Skill & Knowledge</button>
                <button class="w3-bar-item w3-button" onclick="openTab('CourseTaught')" >Course Taught</button>
                <button class="w3-bar-item w3-button" onclick="openTab('TrainingWorkshop')" >Training & Workshop</button>
                <button class="w3-bar-item w3-button" onclick="openTab('Publication')" >Publication</button>
                <button class="w3-bar-item w3-button" onclick="openTab('Research')">Research Projects</button>
                <button class="w3-bar-item w3-button" onclick="openTab('Experience')" > Work Experience</button>
                <button class="w3-bar-item w3-button" onclick="openTab('Awards')">Awards</button>
                <button class="w3-bar-item w3-button" onclick="openTab('PatentFiled')" >Patent Filed</button>
                <button class="w3-bar-item w3-button" onclick="openTab('AcademicProjects')" >Academic Projects</button>
                <button class="w3-bar-item w3-button" onclick="openTab('ProfessionalInstituteMembership')" >Professional Institute Membership</button>
                <button class="w3-bar-item w3-button" onclick="openTab('ExpertLecture')">Expert Lecture</button>
            </div>

            <!--Personal Details-->

            <div id="Profile" class="w3-container Tab">
                <h4><b><center>Personal Details</center> </b></h4><br><br>  
                <?php
                if (($row1['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <ul>
                            <li>
                                <!-- <div class="row"> -->
                                <div class="col-md-3">
                                    <img src="<?php echo 'http://localhost/GMCA/gmca_admin/assets/img/registration/' . $img_path; ?>" alt="" style="height: 250px;width: 300px;">
                                <br><br>
                                  <h4 style="color: #e9682e;"><b><center><?php echo $row['name']; ?></center></b></h4>
                                </div>
                                
                                <strong style="color: #e9682e" class="f-information-box__name b-information-box__name">DESIGNATION</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i style="color: #e9682e" class="b-dotted f-dotted">:</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-information_data"><?php echo $row1['designation']; ?></span>
                                
                            
                            </li>
                            <hr>
                            <li>

                                <strong style="color: #e9682e" class="f-information-box__name b-information-box__name">QUALIFICATION</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i style="color: #e9682e" class="b-dotted f-dotted">:</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-information_data"><?php echo $row1['qualification']; ?></span>

                            </li>

                            <hr>
                            <li>
                                <strong style="color: #e9682e" class="f-information-box__name b-information-box__name">EXPERIENCE</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i style="color: #e9682e" class="b-dotted f-dotted">:</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-information_data"><?php echo $row1['experience']; ?></span>
                            </li>
                            <hr>
                            <li>
                                <strong style="color: #e9682e" class="f-information-box__name b-information-box__name">AREA OF INTEREST</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i style="color: #e9682e" class="b-dotted f-dotted">:</i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-information_data"><?php echo $row1['area_intrest']; ?></span>
                            </li>
                        <!-- </div> -->
                        </ul>
                    </div>
                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Education & Qualification-->
            <div id="EducationQualification" class="w3-container Tab" style="display:none">
                <h4><b><center>Education & Qualification</center></b></h4>
                <?php
                $i2 = 1;
                $sel2 = "SELECT * FROM edu_qualification WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry2 = mysqli_query($con, $sel2);
                $row2 = mysqli_fetch_assoc($qry2);
                if (($row2['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th hidden align="center">edu_id.</th>
                                        <th style="text-align: center;">Degree</th>
                                        <th style="text-align: center;">University</th>
                                        <th style="text-align: center;">CGPI / Percentage</th>
                                        <th style="text-align: center;">Passing Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i2 = 1;
                                    $sel2 = "SELECT * FROM edu_qualification WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry2 = mysqli_query($con, $sel2);
                                    while ($row2 = mysqli_fetch_assoc($qry2)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i2; ?></td>
                                            <td hidden><?php echo $row2['edu_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row2['degree'] ?></td>
                                            <td style="text-align: center;"><?php echo $row2['university'] ?></td>
                                            <td style="text-align: center;"><?php echo $row2['cgpi'] ?></td>
                                            <td style="text-align: center;"><?php echo $row2['year'] ?></td> 
                                        </tr>
                                        <?php
                                        $i2++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Portfolio-->

            <div id="Portfolio" class="w3-container Tab" style="display:none">
                <h4><b><center>Portfolio</center></b></h4>
                <?php
                $i3 = 1;
                $sel3 = "SELECT * FROM `portfolio` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry3 = mysqli_query($con, $sel3);
                $row3 = mysqli_fetch_assoc($qry3);
                if (($row3['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th hidden="" align="center">portfolio_id</th>
                                        <th style="text-align: center;">Portfolio Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i3 = 1;
                                    $sel3 = "SELECT * FROM `portfolio` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry3 = mysqli_query($con, $sel3);
                                    while ($row3 = mysqli_fetch_assoc($qry3)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i3; ?></td>
                                            <td hidden=""><?php echo $row3['portfolio_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row3['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i3++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>


            <!--Skill Knowledge-->
            <div id="SkillKnowledge" class="w3-container Tab" style="display:none">
                <h4><b><center>Skill Knowledge</center></b></h4>
                <?php
                $i4 = 1;
                $sel4 = "SELECT * FROM skills_knowledge WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry4 = mysqli_query($con, $sel4);
                $row4 = mysqli_fetch_assoc($qry4);
                if (($row1['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="">skill_id.</th>
                                        <th style="text-align: center;">Skill Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i4 = 1;
                                    $sel4 = "SELECT * FROM skills_knowledge WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry4 = mysqli_query($con, $sel4);
//                                    $row4 = mysqli_fetch_assoc($qry4);
                                    while ($row4 = mysqli_fetch_assoc($qry4)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i4; ?></td>
                                            <td hidden=""><?php echo $row4['skill_id'] ?></td>
                                            <td style="text-align: center;"><?php echo $row4['skill_dtls'] ?></td>
                                        </tr>
                                        <?php
                                        $i4++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Course Taught-->
            <div id="CourseTaught" class="w3-container Tab" style="display:none">
                <h4><b><center>Course Taught</center></b></h4>
                <?php
                $i5 = 1;
                $sel5 = "SELECT * FROM `course_taught` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry5 = mysqli_query($con, $sel5);
                $row5 = mysqli_fetch_assoc($qry5);
                if (($row5['reg_id']) != null) {
                    ?>

                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="yes" align="center">edu_id.</th>
                                        <th style="text-align: center;">Course Type</th>
                                        <th style="text-align: center;">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i5 = 1;
                                    $sel5 = "SELECT * FROM `course_taught` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry5 = mysqli_query($con, $sel5);
                                    while ($row5 = mysqli_fetch_assoc($qry5)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i5; ?></td>
                                            <td hidden><?php echo $row5['edu_id'] ?></td>
                                            <td style="text-align: center;"><?php echo $row5['course_type'] ?></td>
                                            <td style="text-align: center;"><?php echo $row5['details'] ?></td> 
                                        </tr>
                                        <?php
                                        $i5++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Training & Workshop-->
            <div id="TrainingWorkshop" class="w3-container Tab" style="display:none">
                <h4><b><center>Training & Workshop</center></b></h4>
                <?php
                $i6 = 1;
                $sel6 = "SELECT * FROM `training_workshop` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry6 = mysqli_query($con, $sel6);
                $row6 = mysqli_fetch_array($qry6);
                if (($row6['reg_id']) != null) {
                    ?>

                    <div class="cardbody">

                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="" align="center">training_id</th>
                                        <th style="text-align: center;">Title</th>
                                        <th style="text-align: center;">Organizer</th>
                                        <th style="text-align: center;">Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i6 = 1;
                                    $sel6 = "SELECT * FROM `training_workshop` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry6 = mysqli_query($con, $sel6);
                                    while ($row6 = mysqli_fetch_assoc($qry6)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i6; ?></td>
                                            <td hidden="yes"><?php echo $row6['training_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row6['title'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row6['organizer'] ?></td>
                                            <td style="text-align: center;"><?php echo $row6['duration'] ?></td>
                                        </tr>
                                        <?php
                                        $i6++;
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Publication-->

            <div id="Publication" class="w3-container Tab" style="display:none">
                <h4><b><center>Publication</center></b></h4>
                <?php
                $i7 = 1;
                $sel7 = "SELECT * FROM `publication` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry7 = mysqli_query($con, $sel7);
                $row7 = mysqli_fetch_assoc($qry7);
                if (($row7['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="yes" align="center">publication_id</th>
                                        <th style="text-align: center;">Publication Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i7 = 1;
                                    $sel7 = "SELECT * FROM `publication` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry7 = mysqli_query($con, $sel7);
                                    while ($row7 = mysqli_fetch_assoc($qry7)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i7; ?></td>
                                            <td hidden="yes"><?php echo $row7['publication_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row7['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i7++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Research Project-->
            <div id="Research" class="w3-container Tab" style="display:none">
                <h4><b><center>Research Project</center></b> </h4>
                <?php
                $i8 = 1;
                $sel8 = "SELECT * FROM `research_project` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry8 = mysqli_query($con, $sel8);
                $row8 = mysqli_fetch_assoc($qry8);
                if (($row8['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="yes" align="center">research_id</th>
                                        <th style="text-align: center;">Research Project Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i8 = 1;
                                    $sel8 = "SELECT * FROM `research_project` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry8 = mysqli_query($con, $sel8);
                                    while ($row8 = mysqli_fetch_assoc($qry8)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i8; ?></td>
                                            <td hidden="yes"><?php echo $row8['research_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row8['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i8++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Work Experience-->
            <div id="Experience" class="w3-container Tab" style="display:none">
                <h4><b><center> Work Experience</center></b> </h4>
                <?php
                $i9 = 1;
                $sel9 = "SELECT * FROM `work_exp` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry9 = mysqli_query($con, $sel9);
                $row9 = mysqli_fetch_assoc($qry9);
                if (($row9['reg_id']) != null) {
                    ?>

                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="yes" align="center">W_id.</th>
                                        <th style="text-align: center;">Work Experience</th>
                                        <th style="text-align: center;">From (Year)</th>
                                        <th style="text-align: center;">TO (Year)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i9 = 1;
                                    $sel9 = "SELECT * FROM `work_exp` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry9 = mysqli_query($con, $sel9);
                                    while ($row9 = mysqli_fetch_assoc($qry9)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i9; ?></td>
                                            <td hidden="yes"><?php echo $row9['w_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row9['work'] ?></td>
                                            <td style="text-align: center;"><?php echo $row9['from'] ?></td>
                                            <td style="text-align: center;"><?php echo $row9['to'] ?></td> 
                                        </tr>
                                        <?php
                                        $i9++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Awards-->
            <div id="Awards" class="w3-container Tab" style="display:none">
                <h4><b> <center>Awards</center></b> </h4>
                <?php
                $i10 = 1;
                $sel10 = "SELECT * FROM `award` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry10 = mysqli_query($con, $sel10);
                $row10 = mysqli_fetch_assoc($qry10);
                if (($row10['reg_id']) != null) {
                    ?>

                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th hidden="yes" align="center">award_id</th>
                                        <th style="text-align: center;">Title</th>
                                        <th style="text-align: center;">Year</th>
                                        <th style="text-align: center;">Award Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i10 = 1;
                                    $sel10 = "SELECT * FROM `award` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry10 = mysqli_query($con, $sel10);
                                    while ($row10 = mysqli_fetch_assoc($qry10)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i10; ?></td>
                                            <td hidden="yes"><?php echo $row10['award_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row10['title'] ?></td>
                                            <td style="text-align: center;"><?php echo $row10['year'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row10['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i10++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <div id="PatentFiled" class="w3-container Tab" style="display:none">
                <h4><b><center>Patent Filed</center> </b></h4>
                <?php
                $i11 = 1;
                $sel11 = "SELECT * FROM `patent_filed` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry11 = mysqli_query($con, $sel11);
                $row11 = mysqli_fetch_assoc($qry11);
                if (($row11['reg_id']) != null) {
                    ?>

                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"> No</th>
                                        <th hidden="yes" align="center">patent_id</th>
                                        <th style="text-align: center;">Patent Filed Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i11 = 1;
                                    $sel11 = "SELECT * FROM `patent_filed` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry11 = mysqli_query($con, $sel11);
                                    while ($row11 = mysqli_fetch_assoc($qry11)) {
                                        ?>
                                        <tr>

                                            <td style="text-align: center;"><?php echo $i11; ?></td>
                                            <td hidden="yes"><?php echo $row11['patent_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row11['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i11++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Academic Projects-->
            <div id="AcademicProjects" class="w3-container Tab" style="display:none">
                <h4><b><center>Academic Projects</center></b></h4>
                <?php
                $i12 = 1;
                $sel12 = "SELECT * FROM `academic_project` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry12 = mysqli_query($con, $sel12);
                $row12 = mysqli_fetch_assoc($qry12);
                if (($row12['reg_id']) != null) {
                    ?>
                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sr No.</th>
                                        <th hidden="yes" align="center">academic_id</th>
                                        <th style="text-align: center;">Academic Project Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i12 = 1;
                                    $sel12 = "SELECT * FROM `academic_project` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry12 = mysqli_query($con, $sel12);
                                    while ($row12 = mysqli_fetch_assoc($qry12)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i12; ?></td>
                                            <td hidden="yes"><?php echo $row12['academic_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row12['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i12++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Professional Institute Membershi-->
            <div id="ProfessionalInstituteMembership" class="w3-container Tab" style="display:none">
                <h4> <b><center>Professional Institute Membership</center></b> </h4>
                <?php
                $i13 = 1;
                $sel13 = "SELECT * FROM `professional_institution_membership` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry13 = mysqli_query($con, $sel13);
                $row13 = mysqli_fetch_assoc($qry13);
                if (($row13['reg_id']) != null) {
                    ?>

                    <div class="cardbody">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sr No.</th>
                                        <th hidden="yes" align="center">pim_id</th>
                                        <th style="text-align: center;">Professional Institution Membership Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i13 = 1;
                                    $sel13 = "SELECT * FROM `professional_institution_membership` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry13 = mysqli_query($con, $sel13);
                                    while ($row13 = mysqli_fetch_assoc($qry13)) {
                                        ?>
                                        <tr>

                                            <td style="text-align: center;"><?php echo $i13; ?></td>
                                            <td hidden="yes"><?php echo $row13['pim_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row13['details'] ?></td>
                                        </tr>
                                        <?php
                                        $i13++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>
            </div>

            <!--Expert Lecture-->
            <div id="ExpertLecture" class="w3-container Tab" style="display:none">
                <h4><b><center>Expert Lecture</center> </b></h4>

                <?php
                $i14 = 1;
                $sel14 = "SELECT * FROM `expert_lecture` WHERE `reg_id`='" . $row['reg_id'] . "'";
                $qry14 = mysqli_query($con, $sel14);
                $row14 = mysqli_fetch_assoc($qry14);
                if (($row14['reg_id']) != null) {
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sr No.</th>
                                        <th hidden="yes" align="center">expert_id</th>
                                        <th style="text-align: center;">Title</th>
                                        <th style="text-align: center;">Expert Lecture Details</th>
                                        <th style="text-align: center;">Expert Lecture Date</th>
                                        <th style="text-align: center;">Expert Lecture Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i14 = 1;
                                    $sel14 = "SELECT * FROM `expert_lecture` WHERE `reg_id`='" . $row['reg_id'] . "'";
                                    $qry14 = mysqli_query($con, $sel14);
                                    while ($row14 = mysqli_fetch_assoc($qry14)) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i14; ?></td>
                                            <td hidden="yes"><?php echo $row14['expert_id'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row14['title'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row14['details'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row14['date'] ?></td>
                                            <td style="text-align: center; word-wrap: break-word;"><?php echo $row14['location'] ?></td>
                                        </tr>
                                        <?php
                                        $i14++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                } else {
                    echo 'Data Not Avalable';
                }
                ?>

            </div>

            <script>
                function openTab(Tab) {
                    var i;
                    var x = document.getElementsByClassName("Tab");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    document.getElementById(Tab).style.display = "block";
                }
            </script>

        </div>
    </div>
</div>
<!--End of Teachers Area-->
<?php
include './include/footer.php';
?>