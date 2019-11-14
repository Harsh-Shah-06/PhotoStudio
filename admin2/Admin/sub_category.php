<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';


if (isset($_REQUEST['btn_submit'])) {
    $a = "Active";
    
    $sub_name = $_REQUEST['txt_scnm'];
    $amount = $_REQUEST['txt_amount'];
    $cname = $_REQUEST['txt_cat'];
    $icon = $_REQUEST['icon'];
    
     $r = mysqli_query($con,"select CategoryId from category where CategoryName = '$cname'");
     $row = mysqli_fetch_row($r);
     $cid = $row[0];
    
    

    $insert = "insert into subcategory values('','$cid','$cname','$sub_name','$amount','$icon','$a')";
    $check = mysqli_query($con, $insert);
    
    if ($check == 0) {
        $msg = 'Something went to wrong...!';
    } else if ($check == 1) {
        $msg = 'Successfully Inserted data...!';
    }

		
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active') {
        $sta = 'Deactive';
    } else {
        $sta = 'Active';
    }
    $update = "update subcategory set Status = '$sta' where SCategoryId = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="sub_category.php"</script>';
}


if (isset($_REQUEST['btn_update'])) {
    $id = $_REQUEST['txt_subcatid'];
    $sc_name = $_REQUEST['txt_subcatname'];
    $sc_amount = $_REQUEST['txt_amount'];
    $in = $_REQUEST['txt_ui'];
    
    $update = "update subcategory set SCategoryName = '$sc_name', INR = '$sc_amount',Icon = '$in' where SCategoryId= '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="sub_category.php"</script>';
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Forms</title>
        <?php include('link.php') ?>

        <script>
            // AJAX code to check input field values when onblur event triggerd.
            function validate(field, query)
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200)
                    {
                        document.getElementById(field).innerHTML = "Validating..";
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById(field).innerHTML = xmlhttp.responseText;
                    } else
                    {
                        document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
                    }
                }
                xmlhttp.open("GET", "ajax.php?field=" + field + "&query=" + query, false);
                xmlhttp.send();
            }
            /*function showtext(id1,str) 
             {
             if (str.length == 0) 
             { 
             document.getElementById("id1").innerHTML = "";
             return;
             } 
             else 
             {
             var xmlhttp;		
             if(window.XMLHttpRequest)
             {
             xmlhttp = new XMLHttpRequest();	
             }
             else
             {
             xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");	
             }
             
             xmlhttp.onreadystatechange = function() 
             {
             if (this.readyState == 4 && this.status == 200) 
             {
             document.getElementById("id1").innerHTML = this.responseText;
             }
             };
             xmlhttp.open("GET", "ajax.php?id=" + id1 + "&str=" + str, false);
             xmlhttp.send();
             }
             }*/
        </script>


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
                <div class="muted pull-left">Add Sub-category</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                            <!--<div class="alert alert-error hide">
                                    <button class="close" data-dismiss="alert"></button>
                                    You have some form errors. Please check below.
                            </div>-->
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
                            <div class="control-group">
                                <label class="control-label" for="select01">Category<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="txt_cat" id="select01" class="chzn-select span6 m-wrap" required="">
                                        <option selected="selected" value="">-- Select Category --</option>
                                        <?php
                                        $s = "select * from category";
                                        $r = mysqli_query($con, $s);
                                        while ($w = mysqli_fetch_array($r)) {
                                            ?>
                                            <option value="<?php echo $w['CategoryName'] ?>"><?php echo $w['CategoryName'] ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub-category Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_scnm" data-required="1" class="span6 m-wrap" required=""/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Sub-category Amount<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="number" name="txt_amount" data-required="1" class="span6 m-wrap" required=""/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Icon<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="icon" required data-required="1" class="span6 m-wrap" required />
                                </div>
                            </div>
                            <div id="text"></div>

                            <div class="form-actions">
                                <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn">Cancel</button>
                            </div>



                        </fieldset>
                    </form>




                </div>
            </div>
        </div>
        <!-- /block -->

        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">View Sub-category</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Sub-category Name</th>
                                <th>Sub-category-Amount</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Edit</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sel = "select * from subcategory";
                            $res = mysqli_query($con, $sel);
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['CategoryName'] ?> </td>        
                                    <td><?php echo $row['SCategoryName'] ?></td>
                                    <td><?php echo $row['INR'] ?></td>
                                    <td><i class="<?php echo $row['Icon'] ?>"></i></td>
                                    <td>
                                        <?php
                                        if ($row['Status'] == 'Active') {
                                            ?>
                                            <a href="sub_category.php?id=<?php echo $row['SCategoryId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="sub_category.php?id=<?php echo $row['SCategoryId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Active ?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <a href="#myAlert<?php echo "a" . $i ?>" data-toggle="modal" class="btn btn-primary">Edit</a>

                                        <div id="myAlert<?php echo "a" . $i ?>" class="modal hide">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                    <center><h3>Update Sub-category Information</h3></center>
                                                </div>
                                                <center>
                                                    <table>
                                                        <div class="modal-body">
                                                            <tr><td>Sub-category Id :</td><td><input type="number" name="txt_subcatid" value="<?php echo $row['SCategoryId'] ?>" readonly="true"></td></tr>
                                                            <tr><td>Sub-category Name :</td><td> <input type="text" name="txt_subcatname" value="<?php echo $row['SCategoryName'] ?>"></td></tr>
                                                            <tr><td>Sub-category Amount :</td><td> <input type="number" name="txt_amount" value="<?php echo $row['INR'] ?>"></td></tr>
                                                            <tr><td>Sub-category Icon :</td><td> <input type="text" name="txt_ui" value="<?php echo $row['Icon'] ?>"</td></tr>
                                                        </div>
                                                    </table>
                                                </center>
                                                <br><br>
                                                <div class="modal-footer">
                                                    <center><input type="submit" name="btn_update" class="btn btn-primary" value="Update">
                                                    <a data-dismiss="modal" class="btn" href="#">Cancel</a></center>
                                                </div>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <hr>
    <?php include('footer.php') ?>
</div>
<!--/.fluid-container-->
<?php include('js_link.php') ?>
</body>

</html>