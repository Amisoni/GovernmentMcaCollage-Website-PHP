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
                <h3>Portfolio</h3>
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
                                                    <th>Portfolio Details</th>
                                                    <th>Status</th>
                                                    <th hidden>portfolio_id</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                      <?php
                                     $i=1;  
                                        $sel="SELECT * FROM `portfolio` WHERE `reg_id`='".$row['reg_id']."'";
                                        $qry=mysqli_query($con,$sel);
                                        while($row=mysqli_fetch_assoc($qry)){

                                     ?>
                                     <tbody>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $row['details']; ?></td>
                                             <td><?php if($row['status']==0){echo "Active";}else{echo "Inactive";};?></td>
                                             <td hidden><?php echo $row['portfolio_id'];?></td>
                                             <td style="text-align: center;"><button type="button" class="btn btn-success editbtn"><i class='la la-pencil'></i></button></td>
                                             <td><button type="button" class="btn btn-danger" 
                                            onclick="if (confirm('Are you Sure Delete This Portfolio')) window.location.href='home2.php?page=portfolio_update_action&action=delete&id=<?php echo $row['portfolio_id'] ?>'"><i class='la la-close'></i></button></td>
                                         </tr>
                                     <?php $i++; }?>
                                     </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab5" role="tabpanel">
                                        <form method="post" action="home2.php?page=portfolio_action" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="insert">
                                            <div style="overflow-x:auto;">
                                            <table class="table table-striped table-bordered table-highlight" id="dynamic_field">  
                                            <thead>
                                                <tr>   
                                                <th style="text-align: center;">Portfolio Details</th>
                                                <th style="text-align: center;">Add</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr> 
                                                <td style="text-align: center;"><textarea class="form-control" name="details[]" autocomplete="off" required="yes"></textarea></td>
                                                <td style="text-align: center;"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                                <td hidden="yes"><input type="hidden" name="reg_id[]" value="<?php echo $_SESSION['reg_id']; ?>"></td>
                                            </tr>
                                            </tbody>
                                            </table>
                                            </div>
                                            <center><button name="submit" type="submit" class="btn btn-primary">Submit</button>  </center>
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
      <form method="post" action="home2.php?page=portfolio_update_action" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="portfolio_id" name="portfolio_id">
        <input type="hidden" class="form-control" name="action" value="update">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Portfolio Details</label>
            <textarea rows="4" cols="2" name="details" required="yes"  class="form-control" id="details" autocomplete="off" placeholder="Portfolio Details"></textarea>
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
          <button name="submit" type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
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

            $('#details').val(data[1]);
            $('#status').val(data[2]);
            $('#portfolio_id').val(data[3]);
        });

    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td style="text-align: center;"><textarea class="form-control" name="details[]"  autocomplete="off" required="yes"></textarea></td><td style="text-align: center;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td><td hidden="yes"><input type="hidden" name="reg_id[]" value="<?php echo $_SESSION['reg_id']; ?>"></td></tr>');
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
    });
    
</script>

