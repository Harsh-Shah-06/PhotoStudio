<?php
session_start();
ob_start();
$email = $_SESSION['email']; 
$sd=$_SESSION['sdate'];

$city=$_SESSION['city'];
$inr=$_SESSION['inr'];
$scategory=$_SESSION['sc'];

//echo $city;

//if (!empty($_SESSION['email']))
//{
//    //header('Location:bookingform.php');
//} else
//{
//    $_SESSION['chkbooking'] = $_GET['sc'];
//    $_SESSION['chkbooking1']=$_GET['in'];
//    header('Location:login.php');
//}


//    foreach($_REQUEST as $l=>$sc)
//    {
//        $_REQUEST[$l]=base64_decode(urldecode($_GET['sc']));
//        
//    }
//    $scategory = $_REQUEST[$l];
//    
//    foreach($_REQUEST as $l=>$in)
//    {
//    $_REQUEST[$l]=base64_decode(urldecode($_GET['in']));
//    }
//    $inr=$_REQUEST[$l];
//    

?>

<?php
$MERCHANT_KEY = "7ZM4pT5t";
$SALT = "rDoUXUO5GT";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";  // For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if (!empty($_POST))
{
    //print_r($_POST);
    foreach ($_POST as $key => $value)
    {
        $posted[$key] = $value;
    }
}

$formError = 0;

if (empty($posted['txnid']))
{
    // Generate random transaction ids
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else
{
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0)
{
    if (
            empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])
    )
    {
        $formError = 1;
    } else
    {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach ($hashVarsSeq as $hash_var)
        {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif (!empty($posted['hash']))
{
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
    <head>
        <title>Booking</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
          <script src="js/wow.js" type="text/javascript"></script>
        <link href="css/animate_2.css" rel="stylesheet" type="text/css"/>
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/loginutil.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->
        <style>
            .error {color: #FF0000;}
        </style>
        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if (hash == '') {
                    return;
                }
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </head>
    <body onload="submitPayuForm()">
        <div class="limiter">

            <div class="container-login100">
                <div class="login100-pic js-tilt" data-tilt  >
                    <img src="images/MDM-Make-a-Booking-1.png" alt="IMG" class="wow rollIn">
                </div>

                <?php if ($formError)
                { ?>

                    <span style="color:red">Please fill all mandatory fields.</span>
                    <br/>
                    <br/>
                <?php } ?>
                <form action="<?php echo $action; ?>" method="post" name="payuForm" class="login100-form validate-form" style= "margin-left: 50px;">
                    <center>
                        <h2 >Booking
                        </h2></center>
                    <hr>
                    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

                    <div class="wrap-input100 validate-input" >
                       Email:
                        <input name="email" id="email" value="<?php echo $email; ?>"  class="input100" readonly=""/>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        First Name: </td>
                    <input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"  class="input100" required="true"/></td>
                    </div>

                     <div class="wrap-input100 validate-input">
                         LastName:
                        <input class="input100" type="text" name="txt_lastname" id="txt_lastname"   value="<?php echo (empty($posted['txt_lastname'])) ? '' : $posted['txt_lastname']; ?>" required="true" >

                    </div>
                    
                    <div class="wrap-input100 validate-input" >
                        Amount: 
                        <input type="text" name="amount" value="<?php echo $inr ?>" class="input100" readonly="" />
                    </div>

                    <div class="wrap-input100 validate-input" >
                        Phone: 
                        <input type="number" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"  class="input100" required="true"/>
                    </div>

<!--      <div class="wrap-input100 validate-input " >
                        Schedule Date: (Venue Date)
                        <input   placeholder="Schedule Date" class="input100" type="text" onfocus="(this.type = 'text')"  id="bookingdate" name="bookingdate"   value="<?php echo $sd?>">
                    </div>-->

                    <div class="wrap-input100 validate-input" > 
                        Suggestion: 
                        <Input name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"  class="input100" required="true"/>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        
                        <input name="scategory" value="<?php echo $scategory?>"  class="input100" hidden/>
                    </div>

                    <div class="wrap-input100 validate-input" >
                      
                        <input name="surl" value="http://localhost:8080/Moment/success.php" size="64"  class="input100" hidden/>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        
                        <input name="furl" value="http://localhost:8080/Moment/failure.php" size="64" class="input100" hidden/>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        <input type="hidden" name="service_provider" value="payu_paisa" size="64" class="input100"/>
                    </div>
  <div class="container-login100-form-btn">
                    <center>
                        <?php if (!$hash)
                        { ?>
                            <input type="submit" value="Book" class="login100-form-btn"/>
                        <?php } ?>
</div>
<!--                        <div class="text-center p-t-12">
                            <br>
                            <a class="txt2" href="customersubcategory.php" class="txt2"><h6>Back</h6></a>
                        </div>-->
                    </center>
      <?php 
                 $_SESSION['sd']=$sd;
                     $_SESSION['ln']=@$_POST['txt_lastname'];
                     $_SESSION['sc']=$scategory; 
                     $_SESSION['phone']=@$_POST['phone'];
                     
                     ?>
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
    
    $('#bookingdate').attr('min', maxDate);
});
                    </script>

                <!--===============================================================================================-->	
                <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
                <!--===============================================================================================-->
                <script src="vendor/bootstrap/js/popper.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                <!--===============================================================================================-->
                <script src="vendor/select2/select2.min.js"></script>
                <!--===============================================================================================-->
                <script src="vendor/tilt/tilt.jquery.min.js"></script>
                <script >
                        $('.js-tilt').tilt({
                            scale: 1.1
                        })
                </script>
                <!--===============================================================================================-->
                <script src="js/main.js"></script>

                </body>
                </html>
