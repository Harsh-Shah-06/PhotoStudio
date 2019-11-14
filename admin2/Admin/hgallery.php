<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';
$msg = '';
if (isset($_REQUEST['btn_submit'])) {

    $a = "Active";
    $img_no = 0;
    $no = $_REQUEST['txt_pname'];
    //$txt_ccode=$_REQUEST['txt_ccode'];
    $extension = '';
    $newfilename = '';
    for ($i = 1; $i <= $no; $i++) {
        $name = $_FILES['img' . $i]['name'];
        $tmp = $_FILES['img' . $i]['tmp_name'];
        $type = $_FILES['img' . $i]['type'];
        $size = $_FILES['img' . $i]['size'];

        $date = date('dmY_his_');
        $ext = explode('.', $name);
        $extension = end($ext);

        $newfilename = "IMG_" . $date . $i . "." . $extension;
        $cname = $_POST['txt_cat'];
        $path = "img/home/" . $newfilename;
        move_uploaded_file($tmp, $path);

        $in = "insert into hgallery values('','$newfilename','$cname','$a')";
        mysqli_query($con, $in);
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
    $update = "update hgallery set Status = '$sta' where Id = '$id'";
    echo $update . "<br />";
    mysqli_query($con, $update) or die(mysqli_errno($con));
    echo '<script>window.location.href="hgallery.php"</script>';
    
}

if (isset($_REQUEST['btn_update'])) {
    //$txt_id=$_REQUEST['txt_id'];


    $txt_id = $_REQUEST['txt_id'];

    $img_no = 0;
    $extension = '';
    $newfilename = '';

    $name = $_FILES['path']['name'];
    $tmp = $_FILES['path']['tmp_name'];
    $type = $_FILES['path']['type'];
    $size = $_FILES['path']['size'];

    $date = date('dmY_his_');
    $ext = explode('.', $name);
    $extension = end($ext);

    $newfilename = "IMG_" . $date . $txt_id . "." . $extension;
    if ($name != '') {
        $path = "img/home/" . $newfilename;
        move_uploaded_file($tmp, $path) or die("Upload fail");


        $up = "update hgallery set Path='$newfilename' where Id = '$txt_id'";
        mysqli_query($con, $up);
        echo '<script>window.location.href="hgallery.php"</script>';
    }
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
                xmlhttp.open("GET", "image_ajax.php?field=" + field + "&query=" + query, false);
                xmlhttp.send();
            }
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
                <div class="muted pull-left">Home Gallery</div>

            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
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
                            <!-----Middle Content --->
                            <div class="control-group">
                                <label class="control-label" for="select01">Category<span class="required">*</span></label>
                                <div class="controls">
                                    <select name="txt_cat" id="select01" class="chzn-select span6 m-wrap" >
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
                                <label class="control-label">No Of Images<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="number" name="txt_pname" class="span6 m-wrap" onKeyUp="validate('text', this.value)" min="1" />
                                </div>
                            </div>
                            <div id="text"></div>

                            <div class="form-actions">
                                <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn">Cancel</button>
                            </div>



                            <!-----Middle Content End--->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Main Gallery Details</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sel = "select * from hgallery";
                                                $res = mysqli_query($con, $sel);
                                                while ($row = mysqli_fetch_array($res)) {
                                                    ?>
                                                    <tr align="center">	
                                                        <td><?php echo $i++ ?></td>
                                                        <td><img src="img/home/<?php echo $row['Path'] ?>" alt="" height="200px" width="200px" ></td>        
                                                        <td><?php echo $row['Type'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['Status'] == 'Active') {
                                                                ?>
                                                                <a href="hgallery.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Deactive ?')"><input type="button" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="hgallery.php?id=<?php echo $row['Id'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Active ?')"><input type="button" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
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
                                                                        <center><h3>Update Home Gallery</h3></center>
                                                                    </div>
                                                                    <center>
                                                                        <table>
                                                                            <div class="modal-body">
                                                                                <tr><td>Image Id :</td><td><input type="text" name="txt_id" value="<?php echo $row['Id'] ?>" readonly="true"></td></tr>
                                                                                <tr><td>Image Path :</td><td> <input type="file" name="path"></td></tr>
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
