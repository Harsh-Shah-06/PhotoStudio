<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';
if (isset($_REQUEST['btn_submit'])) {

    $category_name = $_REQUEST['txt_cnm'];
    $active = 'Active';
    $des = $_REQUEST['txt_des'];
    $icon = $_REQUEST['txt_icon'];

    $insert = "insert into category values('','$category_name','$des','$active','$icon')";
    mysqli_query($con, $insert);
    $msg = 'Successfully Inserted Category..!!';
}

if (isset($_REQUEST['btn_update'])) {
    $id = $_REQUEST['txt_id'];
    $c_name = $_REQUEST['txt_catname'];
    $des = $_REQUEST['txt_des'];
    $icon = $_REQUEST['txt_icon'];

    $update = "update category set CategoryName = '$c_name',CategoryDesc = '$des',Icon = '$icon' where CategoryId = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="category.php"</script>';
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active') {
        $sta = 'Deactive';
    } else {
        $sta = 'Active';
    }
    $update = "update category set Status = '$sta' where CategoryId = '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="category.php"</script>';
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
                <div class="muted pull-left">Add Main Category</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="#" class="form-horizontal" method="post">
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
                                <label class="control-label">Main Category Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_cnm" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">Category Description<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_des" required data-required="1" class="span6 m-wrap" required/>
                                </div><br><br>

                                <label class="control-label">Category Icon<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="txt_icon" required data-required="1" class="span6 m-wrap" required/>
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
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">View Main Category</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Status</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 1;
$sel = "select * from category";
$res = mysqli_query($con, $sel);
while ($row = mysqli_fetch_array($res)) {
    ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['CategoryName'] ?></td>
                                    <td><?php echo $row['CategoryDesc'] ?></td>
                                    <td><i class="<?php echo $row['Icon'] ?>"></i></td>




                                    <td>
    <?php
    if ($row['Status'] == 'Active') {
        ?>
                                            <a href="category.php?id=<?php echo $row['CategoryId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="category.php?id=<?php echo $row['CategoryId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are you Sure want to Active ?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
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
                                                            <tr><td>Category Id :</td><td><input type="number" name="txt_id" value="<?php echo $row['CategoryId'] ?>" readonly="true"></td></tr>
                                                            <tr><td>Category Name :</td><td> <input type="text" name="txt_catname" value="<?php echo $row['CategoryName'] ?>"></td></tr>
                                                            <tr><td>Category Description :</td><td> <input type="text" name="txt_des" value="<?php echo $row['CategoryDesc'] ?>"></td></tr>
                                                            <tr><td>Category Icon :</td><td> <input type="text" name="txt_icon" value="<?php echo $row['Icon'] ?>"</td></tr>
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