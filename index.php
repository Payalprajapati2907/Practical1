<html>
<head>
<title>Booking Form</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
<div class="form-body">
<div class="row">
<div class="form-holder">
<div class="form-content">
<div class="form-items">
   <h3>Booking Today</h3>
   <!-- Name Field -->
  <div class="form-group">
    <label for="name">Name : </label>
    <input type="email" class="form-control" id="name" name="Name" placeholder="Enter Your Name">
  </div>
  <!-- Mobile no Field -->
  <div class="form-group">
    <label for="mobile">Mobile No : </label>
    <input type="email" class="form-control" id="mobile" min="9" max="11" placeholder="Enter Mobile No">
  </div>
  <!-- Email Field -->
  <div class="form-group">
    <label for="email">Email : </label>
    <input type="email" class="form-control" id="email" placeholder="Enter Email">
  </div>
  <!-- Days Field -->
  <div class="form-group">
    <label for="day">Days : </label><br>
   <button onclick="checkAll()">Check all</button><br><br>  <!-- checkall button -->
	 Monday: <input type="checkbox" class="form-check-input" id="check1" name="pl" value="Monday">  
	 Tuesday: <input type="checkbox" class="form-check-input" id="check2" name="pl" value="Tuesday">   
	Wednesday: <input type="checkbox" class="form-check-input" id="check3" name="pl" value="Wednesday">  
	Thursday: <input type="checkbox" class="form-check-input" id="check4" name="pl" value="Thursday"> 
	Friday: <input type="checkbox" class="form-check-input" id="check5" name="pl" value="Friday"> 
	Saturday: <input type="checkbox" class="form-check-input" id="check6" name="pl" value="Saturday">
	Sunday: <input type="checkbox" class="form-check-input" id="check6" name="pl" value="Sunday">	<br> <br>  
  </div>
  <!-- Select TimeSlot Field -->
  <div class="form-group">
    <label for="timeslot">Select TimeSlot : </label>
    <select class="form-control" id="timeslot">
      <option>10:00 to 10:30</option>
      <option>10:30 to 11:00</option>
      <option>11:00 to 11:30</option>
      <option>11:30 to 12:00</option>
      <option>12:00 to 12:30</option>
	  <option>12:30 to 01:00</option>
	  <option>01:00 to 01:30</option>
    </select>
  </div>
  <!-- Apply date Field -->
   <div class="form-group">
	<label for="fromdate">Apply From Date : </label>
	<input type="date" id="fromdate" name="from"/>
  </div>
  <!-- Comments Field -->
  <div class="form-group">
    <label for="comments">Comments : </label>
    <textarea class="form-control" id="comments" rows="3"></textarea>
  </div>
  <!-- Submit Button -->
  <div class="form-group">
	<div class="label">&nbsp</div>
	
	<div class="control"><input class="btn" type="button" value="Submit" onClick="saveBooking()" /><span id="save_process"></span>
	</div>
</div>
</div>
</div>
</div>
</div>
<script>
function checkAll() {  
        $('input:checkbox').prop('checked', true);  
    }
function saveBooking(){
	var valid=true;
	<!-- Name Field validation -->
	if($("#name").val() =="")
	{
		alert("Please Enter Name");
		$("#name").focus()
		valid = false;
		return false;
	}else{
		var Name = $("#name").val();
	}
	<!-- Email Field validation -->
	if($("#email").val() =="")
	{
		alert("Please Enter email");
		$("#email").focus()
		valid = false;
		return false;
	}else{
	var email = $("#email").val();
	}
	<!-- Mobile Field validation -->
	if($("#mobile").val() =="")
	{
		alert("Please Enter mobile");
		$("#mobile").focus()
		valid = false;
		return false;
	}else{
	var mobile = $("#mobile").val();
	}
	<!-- Fromdate Field validation -->
	if($("#fromdate").val() =="")
	{
		alert("Please select from date");
		$("#fromdate").focus()
		valid = false;
		return false;
	}else{
	var fromdate = $("#fromdate").val();
	}
	<!-- timeslot Field validation -->
	if($("#timeslot").val() =="")
	{
		alert("Please Enter timeslot");
		$("#timeslot").focus()
		valid = false;
		return false;
	}else{
	var timeslot = $("#timeslot").val();
	}
	var comments = $("#comments").val();
	<!-- store all checked checkbox in array start here -->
	var selected = [];
	var markedCheckbox = document.getElementsByName('pl');  
	  for (var checkbox of markedCheckbox) {  
		if (checkbox.checked)  
			selected.push(checkbox.value);  
	  }
	<!-- store all checked checkbox in array end here -->
	 if(valid == true)
	{
		<!-- send post data to addtodatabase file -->
		$.post("addtodatabase.php",{Name:Name,fromdate:fromdate,email:email,mobile:mobile,comments:comments,timeslot:timeslot,selected:selected},function(data){
			if(data)
			{
				alert(data);
			}
			else
			{
				alert("Can't load...");
			}
		});
	}
}
    
</script>