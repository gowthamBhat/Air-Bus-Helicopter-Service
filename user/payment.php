<?php 

$con=mysqli_connect('localhost','root','','project');
session_start();


if(!isset($_SESSION['username'])){
    header("location:user-login.php");
}
else
{
 //  $pnr=$_GET['pnr'];
  
    $holder="";
    $cvv="";
    $num="";

    $error_cvv="";
    $error_number="";
    $empty="";
    $daterm="";
    $datery="";
    $expr_error="";





  $u_name=$_SESSION['username'];

$pnr=$_GET['data1'];
$customer=$_GET['data2'];
$no=$_GET['data3'];
$name=$_GET['data4'];
$departure=$_GET['data5'];
$d_time=$_GET['data6'];
$arrival=$_GET['data7'];
$a_time=$_GET['data8'];
$date=$_GET['data9'];
$adult=$_GET['data10'];
$child=$_GET['data11'];
$seats=$_GET['data12'];
$email=$_GET['data13'];
$dob=$_GET['data14'];
$gender=$_GET['data15'];
$total_price=$_GET['data16'];
$uname=$_GET['data17'];





    
    if(isset($_POST['submit']))
    {


      $holder=$_POST['holder'];
      $num=$_POST['number'];
      $cvv=$_POST['cvv'];

     // $daterm=$_POST['expr1'];
     // $datery=$_POST['expr2'];

     // $curm=date('m');
     //$cury=date('y');
     

     if(empty($holder)||empty($num)||empty($cvv))
      {
        $empty="<p class='error'>fields are empty</p>";
      }
      else if(strlen($num)<16||strlen($num)>16)
      {
       $error_number="<p class='error'>Card number not valid,16 numbers needed </p>";
      } 
      
     
   
   // else
   // {

   //  if($datery < $cury)
   //  {
   //     $expr_error="<p class='error'>card not valid 1</p> ";
   //  }
   //  else if($daterm >12 || $daterm<=0)
   //  {
   //   $expr_error="<p class='error'>month limit excceded</p> "; 
   //  }

   //  else if($daterm < $curm)
   //  {
   //       $expr_error="<p class='error'>card not valid 2</p> ";
   //  }

    else if(strlen($cvv)<3||strlen($cvv)>3)
    {
       $error_cvv="<p class='error'>cvv must contain only 3 numbers</p> ";
    }
       /*  if($daterm < $curm)
        {
                $expr_error="<p class='error'>month error</p> ";
        } */
   



    else 
    {

     
        header("location:reservation.php?data1=".$pnr."&data2=".$customer."&data3=".$no."&data4=".$name."&data5=".$departure."&data6=".$d_time."&data7=".$arrival."&data8=".$a_time."&data9=".$date."&data10=".$adult."&data11=".$child."&data12=".$seats."&data13=".$email."&data14=".$dob."&data15=".$gender."&data16=".$total_price."&data17=".$u_name);


    }    
    
   

  }



?>




<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
<link rel="stylesheet" type="text/css" href="modcss.css">
<script type="text/javascript" src="modjs.js"></script>
<style type="text/css">
  
.mybt
{
 background-color: #0080ff; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  border-radius: 50%;
  cursor: pointer; 
}
.error{
    margin: 40px auto 0px;
    text-align: center;
    color: #fb0202;
    font-size: 16px;
    letter-spacing: 1px;
    border: 1px solid #fb0202;
    padding: 15px;
    width: 71%;
    border-radius: 5px;
    background-color: #fb020224;
    font-weight: bold;
}

#d1
{
  width: 40%;
}
#d2
{
  width: 40%;
}



</style>
</head>
<body>
<div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    <form action="" method="POST">
      

                       <?php echo "$error_cvv"; ?>
                      <?php echo "$error_number"; ?>  
                       <?php echo "$empty"; ?>
                        <?php echo "$expr_error"; ?>
                        
    <h2>Payment Gateway</h2>
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Card holder:</label>
        <input type="text" name="holder" class="input" placeholder="card holder name" value="<?php echo $holder; ?>">
        <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" name="number" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" value="<?php echo $num; ?>">
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card-grp space">



        <!-- <div class="card-item icon-relative">

       <label class="label">Expiry date:</label>
          <input type="text" name="expr1" class="input" id="d1"  placeholder="m"  value="<?php echo $daterm; ?>" >
          <input type="text" name="expr2" class="input" id="d2"  placeholder="y" value="<?php echo $datery; ?>" >
         
        </div> -->


        <div class="card-item icon-relative">
          <label class="label">CVV:</label>
          <input type="text" name="cvv" class="input" data-mask="000" placeholder="000" value="<?php echo $cvv; ?>" >
          <i class="fas fa-lock"></i>
        </div>
      </div>
        
      <div>        <!--class="btn"  -->                             
      <center>  <input type="submit" name="submit" value="pay" class="mybt" /> <a href="user-home.php" class="mybt">cancle</a>   </center>
      </div> 
      
    </div>
  </div>
</div>
</form>
 

 <!-- <?php //echo "$curdate"."<br>"."$expr" ?> -->  
                                     
</body>
</html>
<?php 

} 

?>