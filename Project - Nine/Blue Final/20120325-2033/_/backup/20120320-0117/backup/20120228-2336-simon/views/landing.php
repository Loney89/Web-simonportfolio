<body>
<div id="content" class="container_12">
  <div id="name" class="grid_11">
    <h3>Welcome CHANGE ME</h3>
	<?php echo $usertype;?>
  </div>
  <div id="assistance" class="grid_1"><img src="includes/images/QuestionMark.png" width="60" height="60" alt="Assistance" onmouseover="popup('Here is the help text for this page. This can be added individually to every page to give the tutor/tutees help.');"/></div>
  <div id="threeButtons">
    <div class="grid_4"><a href="index.php?action=appointments">Appointments</a></div>
    <div class="grid_4"><a href="#">Blank</a></div>
    <div class="grid_4"><a href="index.php?action=details">Details</a></div>
  </div>
  <div class="clearfix"></div>
  <h2>Notifications</h2>
  <div class="appointment_notification">
    <div class="notification_thumbnail"><img src="" width="70" height="80"/></div>
    <div class="notification_buttons"><a href="#"><img src="includes/images/Tick-Icon.png" width="64" height="64" alt="Accept" /></a><a href="#"><img src="includes/images/Cross-Icon.png" width="64" height="64" alt="Reject" /></a></div>
    <div class="notification_details"><p>Persons Name @ Time and Date</p></div>
    <div class="clearfix"></div>
  </div>
  <h2>Announcements</h2>
  <div class="announcements_form">
    <form action="index.php?action=sendAnnouncement" method="post">
      <fieldset>
            <textarea rows="5" name="announcement" value="Broadcast an Announcement to all linked Students" required></textarea>
        <button type="submit" name="submit">Send Announcement</button>
      </fieldset>
    </form>
  </div>
  <h2>Students</h2>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><a href="index.html?user=PERSONS_NAME&TB_iframe=true&height=400&width=600" class="thickbox"><img src="" width="140" height="160" /></a></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
  <div class="grid_2">
    <div class="close_button"><a href="close"></a></div>
    <div class="student_thumbnail"><img src="" width="140" height="160" /></div>
    <div class="student_details">
      <p>Full Name</p>
      <p>ID Number</p>
    </div>
  </div>
</div>
</body>
</html>
