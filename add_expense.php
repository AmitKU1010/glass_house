<?php
include("header.php");
include("sidebar.php");
if(@$_SESSION['gymlogedinuserid']==""){
		header("location:index.php");
	}
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add Expense
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashbord.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  
  <section class="content">
	<div class="data_field_div" style="margin-top: 2%">
  		<form method="post" action="">
  			<div class="col-md-12">
  				<div class="col-md-6">
					<lebel>Name</lebel><br>
					<input type="text" name="name" id="name" class="form_field" placeholder="Name" required>
				</div>
				<div class="col-md-6">
					<lebel>Details</lebel><br>
					<input type="text" name="details" id="details" class="form_field" placeholder="Details" required>
				</div>
				<div class="col-md-6">
					<lebel>Amount</lebel><br>
					<input type="text" name="amount" id="amount" class="form_field" placeholder="Amount" required>
				</div>
				<div class="col-md-6">
					<lebel>Payment Type</lebel><br>
					<select name="payment_type" id="payment_type" class="form_field" required>
						<option value="">Select Payment Type</option>
						<option value="0">Debit</option>
						<option value="1">Credit</option>
						
					</select>
				</div>
				<div class="col-md-6">
					<lebel>Transaction Mode</lebel><br>
					<select name="transaction_mode" id="transaction_mode" class="form_field" required onChange="get_payment_mode()">
						<option value="">Select Transaction Mode</option>
						<option value="1">Cash</option>
						<option value="2">Cheque</option>
						<option value="3">Online Transfer</option>
						
					</select>
				</div>
				<div class="col-md-6">
					<lebel>Date</lebel><br>
					<input type="date" name="date" id="date" class="form_field" value="<?php echo(date('Y-m-d')) ?>">
				</div>
				<div class="col-md-6" id="trans_div" style="display: none">
					<lebel>Cheque No / Transaction No</lebel><br>
					<input type="text" name="transaction_no" id="transaction_no" class="form_field" placeholder="Cheque No / Transaction No">
				</div>
  			</div>
  			<div class="col-md-12">
				<div class="col-md-6">

					<td><input type="submit" name="submit" value="Save" class="submit_button"></td>
				</div>
			</div>
  		</form>
  
<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$details = $_POST['details'];
		$amount = $_POST['amount'];
		$payment_type = $_POST['payment_type'];
		$transaction_mode = $_POST['transaction_mode'];
		$date = $_POST['date'];
		$transaction_no = $_POST['transaction_no'];
		$sql = mysqli_query($con,"INSERT INTO `expense`(`name`, `details`, `amount`, `pay_type`, `payment_mode`, `date`, `transaction_no`, `expense_status`) VALUES ('$name','$details','$amount','$payment_type','$transaction_mode','$date','$transaction_no','1')");
		header("location:add_expense.php");
	}
?>

  	</div>
   </section>
   <div class="clearfix"></div>
  </div>
<script type="text/javascript">
function get_payment_mode(){
	var payment_mode = $('#transaction_mode').val();
	if(payment_mode==1){
		$('#trans_div').css("display","none");
		$('#transaction_no').attr("required",false)
	}else{
		$('#trans_div').css("display","block");
		$('#transaction_no').attr("required",true);
	}
}		
</script>
<?php include("footer.php"); ?>