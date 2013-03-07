<?php
ini_set('display_errors',1);
require_once('index.php');

//store any validation and error messages
$error_msg = '';

//check the form has been submitted
if(array_key_exists('go',$_GET)){
	
	//lets validate the fields!
	
	//are we missing a tutor?
	if(empty($_GET['tutor'])){
		$error_msg = 'Missing Tutor';
	}
	
	//are we missing a student?
	if(empty($_GET['student'])){
		$error_msg = 'Missing Student';
	}
	
	//no errors set so validated fine!
	if($error_msg == ''){
		
		//lets make an appointment
		$appointment = new appointments();
		
		//lets get our form data
		$tutor = $_GET['tutor'];
		$student = $_GET['student'];
		$date = $_GET['year'].
					"-".$_GET['month'].
					"-".$_GET['day'].
					" ".$_GET['hour'].
					":".$_GET['minute'].
					":00";
		$description = $_GET['description'];
		
		//lets make that appointment now!
		$result = $appointment->makeAppointment($tutor, $student, $date, $description);
		
		//did it create a new appointment or not?
		if(!$result){
			$error_msg = 'This Tutor already has an appointment at this time!';
		}else{
			$error_msg = 'Sucess!';
		}
		
	}
	
}

?>
<form method="get" action="book.php">
	<table id="booking">
		<?php
			if($error_msg != ''){
				echo "<tr>
						<td colspan=\"2\">".$error_msg."</td>
					</tr>
				";
			}
		?>
		<tr>
			<td>Tutor:</td>
			<td>
				<input type="text" name="tutor">
			</td>
		</tr>
		<tr>
			<td>Student:</td>
			<td>
				<input type="text" name="student">
			</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td>
				<select name="day">
					<?php
						for($i=1;$i<32;$i++)
							echo "<option value=\"".$i."\">".$i."</option>";
					?>
				</select>
				/
				<select name="month">
					<option value="01">January</option>
					<option value="02">Feburary</option>
					<option value="03">March</option>
					<option value="04">April</option>
				</select>
				/
				<select name="year">
					<option value="2012">2012</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Time:</td>
			<td>
				<select name="hour">
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
				</select>
				:
				<select name="minute">
					<option value="00">00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td>
				<textarea name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="go" value="Book"></td>
		</tr>
	</table>
</form>