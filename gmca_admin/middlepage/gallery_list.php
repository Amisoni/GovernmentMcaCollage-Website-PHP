<?php
    if(basename($_SERVER['PHP_SELF'])=='home2.php')
    {
        header("location:index.php");
    }
?>
<div class="ks-column ks-page">
    <div class="ks-page-header">
        <section class="ks-title">
        </section>
    </div>
    <div class="ks-page-content">
        <div class="ks-page-content-body ks-tabs-page-container">
            <div class="ks-tabs-container-description">
                <h3>Gallery</h3>
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
                                                    <th hidden>Id</th>
                                                    <th>Event Type</th>
                                                    <th>Event Name</th>
                                                    <th>Image</th> 
                                                    <th>Status</th> 
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                        <?php
                                            $i=1;  
                                        $sel="SELECT * FROM `gallery`";
                                        $qry=mysqli_query($con,$sel);
                                        while($row=mysqli_fetch_assoc($qry)){

                                        $sel_event="SELECT * FROM `event` WHERE `event_id`='".$row['event_id']."' ";
                                        $qry_event=mysqli_query($con,$sel_event);
                                        $row_event=mysqli_fetch_assoc($qry_event); 

                                            if(!$row['image']==""){
                                                $img_path=$row['image'];
                                            }else{
                                                $img_path="default.jpg";
                                            }
                                     ?>
                                     <tbody>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td hidden><?php echo $row['g_id']; ?></td>
                                             <td><?php echo $row_event['name']; ?></td>
                                             <td><?php echo $row['event_name']; ?></td>
                                             <td><img style="border-color: #d3d300;" src="<?php echo 'assets/img/gallery/'.$img_path ;?>" alt="" height="80" width="80"></td>
                                             <td><?php if($row['status']==0){echo "Active";}else{echo "Inactive";};?></td>
                                             <td style="text-align: center;"><button type="button" class="btn btn-success editbtn"><i class='la la-pencil'></i></button></td>
                                            <td style="text-align: center;"><button type="button" class="btn btn-danger" 
                                            onclick="if (confirm('Are you Sure Delete This Gallery Image')) window.location.href='home.php?page=gallery_delete&action=delete&image=<?php echo $row['image'] ?>&id=<?php echo $row['g_id'] ?>'"><i class='la la-close'></i></button></td>
                                         </tr>
                                     <?php $i++; }?>
                                     </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab5" role="tabpanel">
                                        <form method="post" action="home.php?page=gallery_action" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="insert">
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Event Type</label>
                                                <div class="col-sm-10">
                                                    <select id="select01" class="form-control" name="event_id" required>
                                                <option>...........Select Event Type..........</option>
                                                <?php
                                                  
                                                    $sel="SELECT * FROM `event`";
                                                    $qry=mysqli_query($con,$sel);
                                                    while($row_event=mysqli_fetch_assoc($qry)){
                                                 ?>
                                                
                                                <option value="<?php echo $row_event['event_id']; ?>"><?php echo $row_event['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Event Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="event_name" required="yes" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="fileInput" name="image[]" type="file" autocomplete="off" accept="image/*" multiple>
                                                </label>
                                                </div>
                                            </div>
                                            <center><button name="submit" type="submit" class="btn btn-primary">Submit</button></center>
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
      <form method="post" action="home.php?page=gallery_action" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="g_id" name="g_id">
        <input type="hidden" class="form-control" name="action" value="update">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Event Type</label>
               <select id="" class="form-control" name="event_id" required>
                                                <option>...........Select Event Type..........</option>
                                                <?php
                                                  
                                                    $sel="SELECT * FROM `event`";
                                                    $qry=mysqli_query($con,$sel);
                                                    while($row_event=mysqli_fetch_assoc($qry)){
                                                 ?>
                                                
                                                <option value="<?php echo $row_event['event_id']; ?>"><?php echo $row_event['name']; ?></option>
                                                <?php } ?>
                                            </select>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="event_name" name="event_name" aria-describedby="emailHelp" placeholder="Event Name">
          </div>
        </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="name">Image</label>
            <input class="form-control" id="fileInput" name="image[]" type="file" autocomplete="off" accept="image/*" multiple>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="mr-2">Status</label>
            <input type="radio"  name="status" id="status" value="0" checked> Active
            <input class="ml-2" type="radio"  name="status" id="status" value="1" > Inactive
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" name="submit" class="btn btn-success">Update</button>
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

            $('#g_id').val(data[1]);
            $('#name').val(data[2]);
            $('#event_name').val(data[3]);
            $("#image").val(data[4]);
            $('#status').val(data[5]);
        });

    });
</script>


