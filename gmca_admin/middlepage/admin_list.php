<?php
    if(basename($_SERVER['PHP_SELF'])=='home2.php')
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
                <h3>Admin</h3>
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
                                    <li class="nav-item">
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
                                                    <th>Profile</th>
                                                    <th>Status</th>
                                                    <th hidden>id</th>
                                                    <th hidden>password</th> 
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                                    <?php
                                    $i=1;  
                                        $sel="SELECT * FROM registration WHERE no=0";
                                        $qry=mysqli_query($con,$sel);
                                        while($row=mysqli_fetch_assoc($qry)){

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
                                             <td><img style="border-color: #d3d300;" src="<?php echo 'assets/img/registration/'.$img_path ;?>" alt="" height="80" width="80"></td>
                                             <td><?php if($row['status']==0){echo "Active";}else{echo "Inactive";};?></td>
                                             <td hidden><?php echo $row['reg_id'];?></td>
                                             <td hidden><?php echo $row['password'];?></td>
                                             <td style="text-align: center;"><button type="button" class="btn btn-success editbtn"><i class='la la-pencil'></i></button></td>
                                             <td><button type="button" class="btn btn-danger" 
                                            onclick="if (confirm('Are you Sure Delete This Admin')) window.location.href='home.php?page=admin_action&action=delete&profile=<?php echo $row['profile'] ?>&id=<?php echo $row['reg_id'] ?>'"><i class='la la-close'></i></button></td>
                                         </tr>
                                     <?php $i++; }?>
                                     </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab5" role="tabpanel">
                                        <form method="post" action="home.php?page=admin_action" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="insert">
                                            <input type="hidden" name="no" value="0">
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" required="yes" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" required="yes"  autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="pas" name="password" required="yes" autocomplete="off"><i class="la la-eye" onclick="eye()"></i></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Contact No.</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" class="form-control" name="phone" autocomplete="off">
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Profile</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="profile" autocomplete="off" accept=".jpg,.jpeg,.png">
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Gender</label>
                                                <div class="col-sm-10">
                                                <label class="radio-inline">
                                                  <input type="radio"  name="gender" id="gender" value="male" > Male
                                                </label>
                                                <label class="radio-inline ml-2">
                                                  <input type="radio" name="gender" id="gender" value="female"> Female
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Status</label>
                                                <div class="col-sm-10">
                                                <label class="radio-inline">
                                                  <input type="radio"  name="status" id="status" value="0" checked> Active
                                                </label>
                                                <label class="radio-inline ml-2">
                                                  <input type="radio" name="status" id="status" value="1"> Inactive
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
      <form method="post" action="home.php?page=admin_action" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="reg_id" name="reg_id">
        <input type="hidden" class="form-control" name="action" value="update">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input required type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Email</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Password</label><i class="la la-eye" onclick="modaleye()"></i>
            <input required type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Contact No.</label>
            <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Contact No.">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="mr-2">Gender</label>
            <input type="radio"  name="gender" id="gender" value="male"> Male
            <input class="ml-2" type="radio"  name="gender" id="gender" value="female"> Female
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="mr-2">Status</label>
            <input type="radio"  name="status" id="status" value="0" checked> Active
            <input class="ml-2" type="radio"  name="status" id="status" value="1" > Inactive
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
  function eye() {
  var x = document.getElementById("pas");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
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

            $('#status').val(data[6]);
            $('#reg_id').val(data[7]);
            $('#name').val(data[1]);
            $('#email').val(data[2]);
            $('#password').val(data[8]);
            $('#phone').val(data[3]);
            $("#gender").val(data[4]);
            $('#profile').val(data[5]);
        });

    });
</script>


