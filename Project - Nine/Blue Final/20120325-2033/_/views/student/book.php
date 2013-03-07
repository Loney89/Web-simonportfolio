<body>
	<div id="content" class="container_12">
		<?php
        include_once (__SITE_PATH . '/views/student/nav.php');
		?>
		<form method="post" action="index.php?action=appointments">
			<table id="booking">
				<?php
                if ($error_msg != '')
                {
                    echo "<tr><td colspan=\"2\">" . $error_msg . "</td></tr>";
                }
				?>
				<tr>
					<td>Tutor:</td>
					<td>
					<select name="tutor">
						<?php
                        foreach ($tutors as $t)
                        {
                            echo "<option value=\"" . $t['staff_id'] . "\">" . $t['name'] . "</option>";
                        }
						?>
					</select></td>
				</tr>
				<tr>
					<td>Student:</td>
					<td>
					<select name="student">
						<option value="<?php echo $user['role_id'];?>"><?php echo $user['name'];?></option>
					</select></td>
				</tr>
				<tr>
					<td>Date:</td>
					<td>
					<select name="day">
						<?php
                        for ($i = 1; $i < 32; $i++)
                            echo "<option value=\"" . $i . "\">" . $i . "</option>";
						?>
					</select> /
					<select name="month">
						<option value="01">January</option>
						<option value="02">Feburary</option>
						<option value="03">March</option>
						<option value="04">April</option>
					</select> /
					<select name="year">
						<option value="2012">2012</option>
					</select></td>
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
					</select> :
					<select name="minute">
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td>					<textarea name="description"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="go" value="Book">
					</td>
				</tr>
			</table>
		</form>
	</div>
