<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';
$msg1 = 0;
$msg = '';
if (isset($_REQUEST['btn_submit'])) {
    //$category_name = $_REQUEST['txt_cnm'];
    $active = 'Active';
    $cid = 0;
    $result = mysqli_query($con, "select CountryId from country where CountryName='" . $_POST['txt_cn'] . "'");
    //echo "affected rows :" . mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row["CountryId"];
        }
    } else {
        $q = "insert into country (CountryName) values('$_POST[txt_cn]')";
        mysqli_query($con, $q);

        $result = mysqli_query($con, "select CountryId from country where CountryName='$_POST[txt_cn]'");


        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row["CountryId"];
        }
    }

    $sid = 0;
    $result = mysqli_query($con, "select StateId from state where StateName='$_POST[txt_sn]' and CountryId=$cid");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sid = $row["StateId"];
        }
    } else {
        //  echo "inserting state" . $cid;
        $q = "insert into state (StateName,CountryId) values('$_POST[txt_sn]',$cid)";
        mysqli_query($con, $q);
        $result = mysqli_query($con, "select StateId from state where StateName='$_POST[txt_sn]' and CountryId=$cid");
        while ($row = mysqli_fetch_assoc($result)) {
            $sid = $row["StateId"];
        }
    }

    $ctid = 0;
    $result = mysqli_query($con, "select CityId from city where CityName='$_POST[txt_cityn]' and StateId=$sid");
    if (mysqli_num_rows($result) > 0) {
        $msg1 = 2;
    } else {
        //echo "inserting city" . $sid;
        $q = "insert into city (CityName,StateId,Status) values('$_POST[txt_cityn]',$sid,'$active')";
        mysqli_query($con, $q);
        $msg1 = 1;
    }




//                    if(empty($_POST['txt_name']))
//                    {
//                        echo "Name can not be empty";
//                    }
//                    else
//                    {
//                        $n=$_POST['txt_name'];
//                        $q="insert into stud (name) values('$n')";
//
//                        $result= mysqli_query($c,$q);
//                        header('location:succesful.php');
//                    }
    //echo $n;
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
                <div class="muted pull-left">Manage Location</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="#" class="form-horizontal" method="post">
                        <fieldset>
                            <?php
                            if ($msg1 != 0) {
                                if ($msg1 == 1) {
                                    ?>
                                    <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert"></button>
        <?php echo "City Added Successfully" ?>	
                                    </div>
                                        <?php
                                    } else if ($msg1 == 2) {
                                        ?>
                                    <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert"></button>
        <?php echo "City Already Exist.!!" ?>	
                                    </div>
                                        <?php
                                    }
                                }
                                ?>
                            <!--<div class="alert alert-success hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                            </div>-->


                            <div class="control-group">
                                <label class="control-label">Country Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_cn" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">State Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_sn" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">City Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_cityn" required data-required="1" class="span6 m-wrap" required/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                                <button type="reset" name="btn_reset" class="btn">Clear</button>
                            </div>
                        </fieldset>
                    </form>

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