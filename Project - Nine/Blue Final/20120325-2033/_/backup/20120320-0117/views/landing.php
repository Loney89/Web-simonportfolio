<body>
<div id="content" class="container_12">
  <div id="name" class="grid_11">
    <h3>Welcome <?php echo $usertype.' - '.$_SESSION['email'];?></h3>
  </div>
  <div id="assistance" class="grid_1"><img src="includes/images/QuestionMark.png" width="60" height="60" alt="Assistance" onMouseOver="popup('Here is the help text for this page. This can be added individually to every page to give the tutor/tutees help.');"/></div>

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
        <!-- <button type="submit" name="submit">Send Announcement</button> -->
      </fieldset>
    </form>
  </div><br><br>
<button type="submit" name="submit"><div class="grid_1"><a href="index.php?action=details">My Details</a></div></button>
<button type="submit" name="submit"><div class="grid_1"><a href="index.php?action=logout">Sign Out</a></div></button>
</div>
</body>
</html>
