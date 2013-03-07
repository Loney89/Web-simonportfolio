<body>
<div id="content" class="container_12">
  <div class="details_form">
    <form action="index.php?action=updatedetails" method="post">
      <fieldset>
        <ol>
          <li>
            <label for="student_id">Student ID:</label>
	    <input type="text" maxlength="50" name="student_id" value="<?php echo($student_id);?>" readonly>
          </li>
          <li>
            <label for="title">Title:</label>
            <select enabled="false">
              <option value ="Mr" selected>Mr</option>
              <option value ="Mrs">Mrs</option>
              <option value ="Miss">Miss</option>
              <option value ="Ms">Ms</option>
              <option value ="Dr">Dr</option>
            </select>
          </li>
          <li>
            <label for="first_name">First Name:</label>
	    <input type="text" maxlength="50" name="first_name" value="<?php echo($stu_firstname);?>" required>
          </li>
          <li>
            <label for="surname">Surname:</label>
	    <input type="text" maxlength="50" name="surname" value="<?php echo($stu_surname);?>" required>
          </li>
          <li>
            <label for="email_address">Email Address:</label>
            <input type="email" maxlength="50" name="email" value="" required>
          </li>
          <li>
            <label for="gender">Gender:</label>
            <select>
              <option value ="Male" selected>Male</option>
              <option value ="Female">Female</option>
            </select>
          </li>
          <li>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" required>
          </li>
          <li>
            <label for="marital_status">Marital Status:</label>
            <select>
              <option value ="Single" selected>Single</option>
              <option value ="Married">Married</option>
              <option value ="Divorced">Divorced</option>
            </select>
          </li>
          <li>
            <label for="address_first_line">Address First Line:</label>
            <input type="text" maxlength="50" name="address_first_line" value="" required>
          </li>
          <li>
            <label for="address_second_line">Address Second Line:</label>
            <input type="text" maxlength="50" name="address_second_line" value="" required>
          </li>
          <li>
            <label for="address_third_line">Address Third Line:</label>
            <input type="text" maxlength="50" name="address_third_line" value="" required>
          </li>
          <li>
            <label for="town_city">Town/City:</label>
            <input type="text" maxlength="50" name="town/city" value="" required>
          </li>
          <li>
            <label for="postcode">Postcode:</label>
            <input type="text" maxlength="8" name="postcode" value="" required>
          </li>
          <li>
            <label for="home_phone_number">Home Phone Number:</label>
            <input type="tel" maxlength="50" name="home_phone_number" value="" required>
          </li>
          <li>
            <label for="mobile_phone_number">Mobile Phone Number:</label>
            <input type="tel" maxlength="50" name="mobile_phone_number" value="" required>
          </li>
          <li>
            <label for="award_identifier">Award Identifier:</label>
            <input type="text" maxlength="50" name="award_identifier" value="" required>
          </li>
          <li>
            <label for="award_type">Award Type:</label>
            <input type="text" maxlength="50" name="award_type" value="" required>
          </li>
          <li>
            <label for="fulltime_parttime">Full-Time/Part-Time:</label>
            <select>
              <option value ="Full-Time" selected>Full-Time</option>
              <option value ="Part-Time">Part-time</option>
            </select>
          </li>
          <li>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" value="" required>
          </li>
          <li>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" value="" required>
          </li>
          <li>
            <label for="registration_status">Registration Status:</label>
            <input type="checkbox" name="registration_status" value="">
          </li>
          <li>
            <label for="sponsor">Sponsor:</label>
            <input type="text" maxlength="50" name="sponsor" value="" required>
          </li>
          <li>
            <label for="previous_qualification">Previous Qualification:</label>
            <input type="text" maxlength="50" name="previous_qualification" value="" required>
          </li>
          <li>
            <label for="previous_experience">Previous Experience:</label>
            <input type="text" maxlength="50" name="previous_experience" value="" required>
          </li>
          <li>
            <label for="comments">Comments:</label>
            <input type="text" maxlength="50" name="comments" value="" required>
          </li>
          <li>
            <label for="award_id">Award ID:</label>
            <input type="text" maxlength="50" name="award_id" value="" required>
          </li>
        </ol>
      </fieldset>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</div>
</body>
</html>
