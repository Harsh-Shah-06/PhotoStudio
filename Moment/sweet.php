<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
    </head>
    <body>
      
        <?php
       
  //      echo "<script>swal('Good job!', 'You clicked the button!', 'success');</script>";
       //echo "<script>swal('Opps!', 'You clicked the button!', 'error');</script>";
        //echo "<script>swal('Good job!', 'You clicked the button!', 'info');</script>";
        
        echo "<script>swal({
  title: 'An input!',
  text: 'Write something interesting:',
  type: 'input',
  showCancelButton: true,
  closeOnConfirm: false,
  inputPlaceholder: 'Write something'
}, function (inputValue) {
  if (inputValue === false) return false;
  if (inputValue === '') {
    swal.showInputError('You need to write something!');
    return false
  }
  swal('Nice!', 'You wrote: ' + inputValue, 'success');
});</script>";
        ?>
      
        <script>swal({
  title: "An input!",
  text: "Write something interesting:",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  inputPlaceholder: "Write something"
}, function (inputValue) {
  if (inputValue === false) return false;
  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }
  swal("Nice!", "You wrote: " + inputValue, "success");
});</script>
    </body>
</html>
