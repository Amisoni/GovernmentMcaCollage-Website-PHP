<?php
    if(basename($_SERVER['PHP_SELF'])=='home2.php')
    {
        header("location:index.php");
    }
?>
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
      <form method="post" action="home.php?page=syllabus_action" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="s_id" name="s_id">
        <input type="hidden" class="form-control" name="action" value="update">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Semester</label>
            <select class="form-control" id="sem" name="sem" required="yes">
                                                    <option value="">...........Select Semester..........</option>
                                                        <option value="1st">1st</option>
                                                        <option value="2nd">2nd</option>
                                                        <option value="3rd">3rd</option>
                                                        <option value="4th">4th</option>
                                                        <option value="5th">5th</option>
                                                        <option value="6th">6th</option>
            </select>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required="yes" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name">
          </div>
        </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="name">File</label>
            <input class="form-control" id="fileInput" name="file" type="file" autocomplete="off" accept=".doc,.docx,.pdf,.odt,.jpg,.jpeg,.png">
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
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="ks-column ks-page">
    <div class="ks-page-header">
        <section class="ks-title">
            <!--<hs3>Tabs</h3>-->
        </section>
    </div>
    <div class="ks-page-content">
        <div class="ks-page-content-body ks-tabs-page-container">
            <div class="ks-tabs-container-description">
                <h3>Syllabus</h3>
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
                                                    <th>Semester</th>
                                                    <th>Name</th>
                                                    <th>File</th>
                                                    <th>Status</th> 
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i=1;  
                                            $sel="SELECT * FROM `Syllabus`";
                                            $qry=mysqli_query($con,$sel);
                                            while($row=mysqli_fetch_assoc($qry)){
                                            ?>
                                     <tbody>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td hidden><?php echo $row['s_id']; ?></td>
                                             <td><?php echo $row['sem']; ?></td>
                                             <td><?php echo $row['name']; ?></td>
                                             <td><a style="text-decoration: none;color: black;" href ="<?php echo  'assets/img/syllabus/'.$row['file']; ?>"><?php echo $row['file'];?></a></td>
                                             <td><?php if($row['status']==0){echo "Active";}else{echo "Inactive";};?></td>
                                             <td><button type="button" class="btn btn-success editbtn"><i class='la la-pencil'></i></button></td>
                                             <td><button type="button" class="btn btn-danger" 
                                            onclick="if (confirm('Are you Sure Delete This Syllabus')) window.location.href='home.php?page=syllabus_action&file=<?php echo $row['file'] ?>&action=delete&id=<?php echo $row['s_id'] ?>'"><i class='la la-close'></i></button></td>
                                         </tr>
                                     <?php $i++; }?>
                                     </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab5" role="tabpanel">
                                        <form method="post" action="home.php?page=syllabus_action" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="insert">
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Semester</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="select01" name="sem" required="yes">
                                                    <option value="">...........Select Semester..........</option>
                                                        <option value="1st">1st</option>
                                                        <option value="2nd">2nd</option>
                                                        <option value="3rd">3rd</option>
                                                        <option value="4th">4th</option>
                                                        <option value="5th">5th</option>
                                                        <option value="6th">6th</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" required="yes" autocomplete="off"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="default-input" class="col-sm-2 form-control-label">File</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="fileInput" name="file" type="file" autocomplete="off" accept=".doc,.docx,.pdf,.odt,.jpg,.jpeg,.png">
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
<script src="./libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(".editbtn").on("click", function(){

            $("#editmodal").modal("show");

            $tr = $(this).closest("tr");

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#s_id').val(data[1]);
            $('#sem').val(data[2]);
            $('#name').val(data[3]);
        });

    });
</script>


