<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}


include 'connection.php';
if (isset($_REQUEST['btn_submit'])) {
    $contest_name = $_REQUEST['cn'];
   
    $contest_sdate = $_REQUEST['sdate'];
    $contest_edate = $_REQUEST['edate'];

    $extension = '';
    $newfilename = '';

    $name = $_FILES['ci']['name'];
    $tmp = $_FILES['ci']['tmp_name'];
    $type = $_FILES['ci']['type'];
    $size = $_FILES['ci']['size'];

    $date = date('dmY_his_');
    $ext = explode('.', $name);
    $extension = end($ext);

    $newfilename = "IMG_" . $date . "." . $extension;
    $path = "img/contest/" . $newfilename;
    move_uploaded_file($tmp, $path);

    $active = 'Active';
    $insert = "insert into contest values('','$contest_name','$contest_sdate','$contest_edate','$newfilename','$active')";
    mysqli_query($con, $insert);
    $msg = 'Successfully Contest Inserted ..!!';
}


?>
<!DOCTYPE html>
<html>

    <head> 
        <title>Forms</title>
        <?php include('link.php') ?>
    </head>

    <body>
        <?php include('top_header.php') ?>
        <!--/.nav-collapse -->
    </div>
</div>
</div>
<?php include('left_menu.php') ?>
<!--/span-->
<div class="span9" id="content">
    <!-- morris stacked chart -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add Contest Details</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <?php
                            if (!empty($msg)) {
                                ?>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert"></button>
                                    <?php echo $msg ?>	
                                </div>
                                <?php
                            }
                            ?>
                            <!--<div class="alert alert-success hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                            </div>-->
                            <div class="control-group">
                                <label class="control-label">Contest Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="cn" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                               

                                <label class="control-label">Contest Starting Date<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="date" name="sdate" id= "sdate" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">Contest Ending Date<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="date" name="edate" id= "edate" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">Contest Image<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="file" name="ci" required data-required="1" class="span6 m-wrap" required max="1"/>
                                </div><br><br>

                            </div>
                            <div class="form-actions">
                                <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit">
                                <input type="reset" name="btn_reset" class="btn" value="Clear">
                            </div>
                        </fieldset>
                        <script src="../../Moment/vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
                    </form>
 <script>
                    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#sdate').attr('min', maxDate);
    $('#edate').attr('min', maxDate);
});
                    </script>

                </div>
            </div>
        </div>
        <!-- /block -->
        
    </div>

  
    <hr>
    <?php include('footer.php') ?>
</div>
<!--/.fluid-container-->
<?php include('js_link.php') ?>
</body>

</html>