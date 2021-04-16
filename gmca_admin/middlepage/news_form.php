<?php
        
        @$id=$_REQUEST['id'];
        $sel="SELECT * FROM `news` WHERE `n_id`='".$id."' ";
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
 -->                    <li class="active">News</li>
                </ul>

            </div>
            <!-- /.page-title -->

            <div class="row">

                <div class="span12">

                    <div id="horizontal" class="widget widget-form">

                        <div class="widget-header">
                            <h3>
                                <i class="icon-pencil"></i>
                                News Form	      					
                            </h3>
                        </div>
                        <!-- /widget-header -->

                        <div class="widget-content">

                            <form class="form-horizontal" method="post" action="home.php?page=news_action" enctype="multipart/form-data">

                                <fieldset>
                                    <input type="hidden" name="n_id" value="<?php echo $row['n_id']; ?>">
                                    <input type="hidden" name="action" value="<?php echo $action;  ?>">
                                    

                                    <div class="control-group">
                                        <label class="control-label" for="input01">News Title</label>
                                        <div class="controls">
                                            <input type="text" name="title" required="yes" value="<?php if(isset($_SESSION['title'])){echo $_SESSION['title']; unset($_SESSION['title']);} ?><?php echo $row['title'] ?>" class="input-large" id="input01" autocomplete="off">
                                            
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="input01">Date</label>
                                        <div class="controls">
                                            <input type="date" name="date" required="yes" class="input-large" id="input01" autocomplete="off" value="<?php echo $row['date']?>">
                                            
                                        </div>
                                    </div>
                                    

                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">File</label>
                                        <div class="controls">
                                            <input class="input-file" id="fileInput" name="file" type="file" required="yes" autocomplete="off" accept=".doc,.docx,.pdf,.odt,.jpg,.jpeg,.png">
                                        </div>
                                    </div>

                                   

                                
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-primary btn-large">Save & changes</button>
                                        <button class="btn btn-large" /><a href="home.php?page=news_list">Cancel</a>
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


