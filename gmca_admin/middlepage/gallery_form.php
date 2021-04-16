<?php
        
        @$id=$_REQUEST['id'];
        $sel="SELECT * FROM `gallery` WHERE `g_id`='".$id."' ";
        $qry=mysqli_query($con,$sel);
        $row=mysqli_fetch_assoc($qry); 
        if(@$_REQUEST['id']!='')
        {
            $action="update";
        }else
        {
            $action="insert";
        }


 ?>
 <style type="text/css">
.field-icon {
  margin-left:auto;
  position: relative;
}     
 </style>

    <div id="content">

        <div class="container">

            <div id="page-title" class="clearfix">

                <ul class="breadcrumb">
                    <li>
                        <a href="home.php">Home</a> <span class="divider">/</span>
                    </li>
                    <!-- <li>
                        <a href="#">Components</a> <span class="divider">/</span>
                    </li>
 -->                    <li class="active">Gallery</li>
                </ul>

            </div>
            <!-- /.page-title -->

            <div class="row">

                <div class="span12">

                    <div id="horizontal" class="widget widget-form">

                        <div class="widget-header">
                            <h3>
                                <i class="icon-pencil"></i>
                                Gallery Form	      					
                            </h3>
                        </div>
                        <!-- /widget-header -->

                        <div class="widget-content">

                            <form class="form-horizontal" method="post" action="home.php?page=gallery_action" enctype="multipart/form-data">

                                <fieldset>
                                    <input type="hidden" name="g_id" value="<?php echo $row['g_id']; ?>">
                                    <input type="hidden" name="action" value="<?php echo $action;  ?>">

                                   <div class="control-group">
                                        <label class="control-label" for="select01">Event Type</label>
                                        <div class="controls">
                                            
                                            <select id="select01" name="event_id">
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

                                    <div class="control-group">
                                        <label class="control-label" for="input01">Event Name</label>
                                        <div class="controls">
                                            <input type="text" name="event_name" required="yes" value="<?php if(isset($_SESSION['event_name'])){echo $_SESSION['event_name'];unset($_SESSION['event_name']);} ?><?php echo $row['event_name'] ?>" class="input-large" id="input01" autocomplete="off">
                                            
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">Image</label>
                                        <div class="controls">
                                            <input class="input-file" id="fileInput" name="image[]" type="file" required="yes" autocomplete="off" accept="image/*" multiple>
                                        </div>
                                    </div>

                                   

                                
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-primary btn-large">Save & changes</button>
                                        <button class="btn btn-large" /><a href="home.php?page=gallery_list">Cancel</a>
                                    </div>
                                </fieldset>
                            </form>

                        </div>
                        <!-- /widget-content -->

                    </div>


                </div>
                <!-- /span8 -->



            </div>
            <!-- /row -->




        </div>
        <!-- /.container -->

    </div>
    <!-- /#content -->


