<?php
session_start();

if(empty($_SESSION['email']))
{
    header('Location:../../Moment/login.php');
}

include 'connection.php';

if (isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];

    if ($status == 'Active')
    {
        $sta = 'Deactive';
    } else
    {
        $sta = 'Active';
    }
    $update = "update city set Status = '$sta' where CityId= '$id'";
    mysqli_query($con, $update);
    echo '<script>window.location.href="viewlocation.php"</script>';
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

        <!-- /block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">View Location</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Country Name</th>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sel = "select * from country c,state s,city ct where c.CountryId=s.CountryId and ct.StateId=s.StateId";
                            $res = mysqli_query($con, $sel);
                            while ($row = mysqli_fetch_array($res))
                            {
                                ?>
                                <tr align="center">	
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['CountryName'] ?></td>
                                    <td><?php echo $row['StateName'] ?></td>
                                    <td><?php echo $row['CityName'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['Status'] == 'Active')
                                        {
                                            ?>
                                            <a href="viewlocation.php?id=<?php echo $row['CityId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Deactive ?')"><input type="submit" class="btn btn-success" value="<?php echo $row['Status'] ?>"></a>
                                                <?php
                                            } else
                                            {
                                                ?>
                                            <a href="viewlocation.php?id=<?php echo $row['CityId'] ?>&status=<?php echo $row['Status'] ?>" onClick="return confirm('Are U Sure want to Active ?')"><input type="submit" class="btn btn-danger" value="<?php echo $row['Status'] ?>"></a>
        <?php
    }
    ?>

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