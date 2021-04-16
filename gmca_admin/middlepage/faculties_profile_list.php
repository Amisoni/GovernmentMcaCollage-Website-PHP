<?php
    if(basename($_SERVER['PHP_SELF'])=='home.php')
    {
        header("location:index.php");
    }
?>
<div class="ks-column ks-page">
    <div class="ks-page-header">
        <section class="ks-title">
            <!--<hs3>Tabs</h3>-->
        </section>
    </div>
    <div class="ks-page-content">
        <div class="ks-page-content-body ks-tabs-page-container">
            <div class="ks-tabs-container-description">
                <h3>Profile</h3>
            </div>
            <div class="tab-content">
                <div class="tab-pane active ks-column-section" id="in-patient" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ks-tabs-container ks-tabs-default ks-tabs-with-separator ks-tabs-header-default ks-tabs-primary tabs-bordered">
                                <ul class="nav ks-nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab4">
                                            <span class="ks-icon la la-th text-success"></span>
                                            List
                                        </a>
                                    </li>
                                    <?php
                                    $check_email=mysqli_query($con,"SELECT * FROM `personal_dtls` WHERE `reg_id`='".$_SESSION['reg_id']."' ");
                                    $count=mysqli_num_rows($check_email);?>
                                    <li class="nav-item" <?php if ($count == 1){echo 'style="display:none;"';}?>>
                                        <a class="nav-link" href="#" data-toggle="tab" data-target="#tab5">
                                            <span class="ks-icon la la-file-text-o text-danger"></span>
                                            Add
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content table-responsiv">
                                    <div class="tab-pane active" id="tab4" role="tabpanel">
                                        <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact No.</th>
                                                    <th>Gender</th>
                                                    <th>Designation</th>
                                                    <th>Area Intrest</th>
                                                    <th>Qualification</th>
                                                    <th>Experience</th>
                                                    <th>Profile</th>
                                                    <th hidden>id</th>
                                                    <th hidden>password</th>
                                                    <th>Update</th> 
                                                </tr>
                                            </thead>
                                                    <?php
                                    $i=1;  
                                        $sel="SELECT * FROM `registration` WHERE `reg_id`='".$_SESSION['reg_id']."'";
                                        $qry=mysqli_query($con,$sel);
                                        while($row=mysqli_fetch_assoc($qry)){

                                        	$sel_designation_mst="SELECT * FROM `personal_dtls` WHERE `reg_id`='".$row['reg_id']."' ";
                                            $qry_designation_mst=mysqli_query($con,$sel_designation_mst);
                                            $row_designation_mst=mysqli_fetch_assoc($qry_designation_mst);	

                                        if(!$row['profile']==""){
                                            $img_path=$row['profile'];
                                        }else{
                                            $img_path="avatar.png";
                                        }    
                                     ?>
                                     <tbody>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $row['name']; ?></td>
                                             <td><?php echo $row['email']; ?></td>
                                             <td><?php echo $row['phone']; ?></td>
                                             <td><?php echo $row['gender']; ?></td>
                                             <td><?php echo $row_designation_mst['designation']; ?></td>
                                             <td><?php echo $row_designation_mst['area_intrest']; ?></td>
                                             <td><?php echo $row_designation_mst['qualification']; ?></td>
                                             <td><?php echo $row_designation_mst['experience']; ?></td>
                                             <td><img style="border-color: #d3d300;" src="<?php echo 'assets/img/registration/'.$img_path ;?>" alt="" height="80" width="80"></td>
                                             <td hidden><?php echo $row['reg_id'];?></td>
                                             <td hidden><?php echo $row['password'];?></td>
                                             <td style="text-align: center;"><button type="button" class="btn btn-success editbtn"><i class='la la-pencil'></i></button></td>
                                         </tr>
                                     <?php $i++; }?>
                                     </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab5" role="tabpanel">
                                        <form method="post" action="home2.php?page=faculties_profile_action" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="insert">
                                            <input type="hidden" name="reg_id" value="<?php echo $_SESSION['reg_id']?>">
                                            <input type="hidden" name="no" value="1">
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Designation</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="designation" required="yes" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Qualification</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="qualification" required="yes"  autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Experience</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="pas" name="experience" required="yes" autocomplete="off"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Area Of Interest</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="4" cols="2" name="area_intrest" required="yes"  class="form-control" id="input01" autocomplete="off"></textarea>
                                                </label>
                                                </div>
                                            </div>
                                            <center><button type="submit" class="btn btn-primary">Submit</button>  </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOdal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="home2.php?page=faculties_profile_action" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="reg_id" name="reg_id">
        <input type="hidden" class="form-control" name="action" value="update">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Password</label><i class="la la-eye" onclick="modaleye()"></i>
            <input type="password" required="yes" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Designation</label>
            <input type="text" required="yes" class="form-control" id="designation" name="designation" aria-describedby="emailHelp" placeholder="Designation">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Qualification</label>
            <input type="text" required="yes" class="form-control" id="qualification" name="qualification" aria-describedby="emailHelp" placeholder="Qualification">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Experience</label>
            <input type="text" required="yes" class="form-control" id="experience" name="experience" aria-describedby="emailHelp" placeholder="Experience">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Area Of Interest</label>
            <textarea rows="4" cols="2" name="area_intrest" required="yes"  class="form-control" id="area_intrest" autocomplete="off" placeholder="Area Of Interest"></textarea>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Profile</label>
            <input class="form-control" id="profile" name="profile" type="file" autocomplete="off" accept=".jpg,.jpeg,.png">
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="./libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function modaleye() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $(".editbtn").on("click", function(){

            $("#editmodal").modal("show");

            $tr = $(this).closest("tr");

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);
            
            $('#profile').val(data[9]);
            $('#experience').val(data[8]);
            $('#qualification').val(data[7]);
            $('#area_intrest').val(data[6]);
            $('#designation').val(data[5]);
            $('#reg_id').val(data[10]);
            $('#password').val(data[11]);
        });

    });
</script>

