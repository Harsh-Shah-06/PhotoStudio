

                                                            <div class="container">
                                                                <h4 style="font-family:'Tw Cen MT'">Search Anything</h4>

                                                                <input class="form-control" ID="myInput" type="text" placeholder="Search." >
                                                                <br />
                                                                <br />
                                                                <br />
                                                                <table class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sr. No. </th>
                                                                            <th>Ingredient Name </th>
                                                                            <th>Description</th>
                                                                            <th>Nutritions</th>
                                                                            <th>Vitamins</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="myTable">

                                                                        <?php
                                                                        require '../dblink.php';
                                                                        $i = 0;
                                                                        $result = mysqli_query($link, "select * from tbl_ingredient_master order by ingredient_id desc");

                                                                        while ($row = mysqli_fetch_array($result))
                                                                        {
                                                                            ?>


                                                                            <tr>

                                                                                <td><?php echo ++$i; ?></td>
                                                                                <td><?php echo $row['ingredient_name']; ?></td>
                                                                                <td><?php echo $row['description']; ?>
                                                                                <td><?php //echo $gender ?></td>
                                                                            
                                                                                <td><?php //echo $row['speciality']  ?></td>
                                                                                <td><?php //echo $row['degree'] ?></td>
                                                                              

                                                                                <td>
                                                                                    <a href="viewdietitian.php?mem_id=<?php echo $row['member_id'] ?>&status=<?php echo $row['status'] ?>" onClick="return confirm('Are you Sure ?')">
                                                                                        <?php
                                                                                        if ($row['status'] == "1")
                                                                                        {
                                                                                            $status = "Block";
                                                                                            ?>             <input type="button" class="btn btn-danger" value="<?php echo $status ?>"></a>

                                                                                        <?php
                                                                                    } else
                                                                                    {
                                                                                        $status = "Active";
                                                                                        ?>
                                                                                        <input type="button" class="btn btn-info" value="<?php echo $status ?>"></a>

                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                    ?></td>



                        


                                                                            </tr>
                                                                        <?php } ?>

                                                                    </tbody>

                                                                </table>




                                                            </div>
															
															
															  
        <script>
                    $(document).ready(function () {
                        $("#myInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>