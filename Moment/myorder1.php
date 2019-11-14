<?php

session_start();

$e = $_SESSION['email'];
$con=mysqli_connect('localhost','root','','moment')
    or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$col =array(
    0  =>  'Id',
    1   =>  'Email',
    2   =>  'Amount',
    3  =>  'ScheduleDate',
    4   => 'BookingDate',
    5 =>  'Category',
    6=>'SCategory',
     7=>'PId',
    8=>'Status'
    
);  //create column like table in database

$sql ="SELECT Id,Email,Amount,ScheduleDate,BookingDate,Category,Scategory,PId,Status FROM bookingorder where Email='$e'";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT Id,Email,Amount,ScheduleDate,BookingDate,Category,Scategory,PId,Status  FROM bookingorder where Email='$e'";
if(!empty($request['search']['value'])){
    $sql.=" AND (Email Like '".$request['search']['value']."%' ";
    
    $sql.=" OR Amount Like '".$request['search']['value']."%' ";
   
    $sql.=" OR ScheduleDate Like '".$request['search']['value']."%' ";
  $sql.=" OR BookingDate Like '".$request['search']['value']."%' ";
  $sql.=" OR Category Like '".$request['search']['value']."%' ";
  $sql.=" OR Status Like '".$request['search']['value']."%' ";
 $sql.=" OR Scategory Like '".$request['search']['value']."%' )";
 
     
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();
$r=0;
while($row=mysqli_fetch_array($query)){
    $r++;
    $subdata=array();
     //id
    $subdata[]=$row[0];
    
    $subdata[]=$row[1]; //salary
   
    $subdata[]=$row[2];
    $subdata[]=$row[3];
    $subdata[]=$row[4];
    $subdata[]=$row[5];

            $subdata[]=$row[6];
             $qs="select Email from photographerdata where Id=$row[7]";
         $rs=mysqli_query($con,$qs);
         if(mysqli_num_rows($rs)>0)
         {
    while($result=mysqli_fetch_assoc($rs))
    {
        
        $si=$result['Email'];
        $subdata[]=$si;
    }
         }
         else
         {
             $subdata[]="N/A";
         }
     
           // $subdata[]=$row[7];
             $subdata[]=$row[8];
            
      

    
    
    //age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
      
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
