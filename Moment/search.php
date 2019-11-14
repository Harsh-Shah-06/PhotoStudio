<!DOCTYPE html>
 <?php include 'backend-search.php';?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.example input[type=text] {
    border-radius: 10px;  
   margin-bottom: 5px;
    margin-left: 60%;
    padding: 10px;
    font-size: 17px;
    border: 1.5px solid black;
    width: 23%;
    background: white;
    outline: none;
}

form.example button {
    border-radius: 10px;
    width: 10%;
    padding: 10px;
    margin-right: 10px;
    background: white;
    color: black;
    font-size: 17px;
    border: 1.5px solid black;
 outline: none;
    cursor: pointer;
}

form.example button:hover {
    color: white;
    background: black;
    border:1.5px solid black;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
hr{
    border:solid black 1px; 
    
    
}
</style>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
            $(document).ready(function () {
                $('.search-box input[type="text"]').on("keyup input", function () {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("backend-search.php", {term:  inputVal}).done(function (data) {
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });

                // Set search input value on click of result item
                $(document).on("click", ".result p", function () {
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });

            //Scroll;

            $(document).ready(function () {
                $("#click").click(function () {
                    $("#sug").show(1000);
                    $('html, body').animate({
                        scrollTop: $("#sug").offset().top
                    }, 1000);

                });
            });
        </script>
</head>
<body>


<center>
<form method="post" >
                        <div class="col-md-6">
                            <!-- Search Form -->
                            <!-- Search Field -->
                            <div class="row">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="search-box " >
                                            <input class="form-control" name="fname" type="text" id="search" placeholder="Search" />
                                            <div class="result"></div>
                                        </div>
                                        <span class="input-group-btn">
                                            <input type="submit"   value="Search" class="btn btn-primary btn-lg" name="submit" value="Search" > 
                                        </span>
                                    </div>
                                </div>
                                <!-- End of Search Form -->
                            </div>
                        </div>
                    </form></center>

</body>
</html> 

