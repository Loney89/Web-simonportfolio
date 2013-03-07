<body>
<script>
$(document).ready(function() {
	$(".tutor").click(function() { 
	
		//toggle viewable calendar for tutor
		$(this).children(".calendar").slideToggle();  
		
		//find image destination name and each name
		var img = $(this).children("img");
		var src = img.attr("src");
		var up = "includes/images/Arrow_Up.png";
		var down = "includes/images/Arrow_Down.png"
		
		// change destination name to other image
		if(src == down)
		{
			img.attr("src", up);
		} else {
			img.attr("src", down);
		}
	});
});
</script>
<div id="content" class="container_12">
  <div class="tutor">
    <h2>Joe Bloggs</h2>
    <img src="includes/images/Arrow_Down.png" width="50" height="50" alt="Drop Down" />
    <div class="clear"></div>
    <div class="calendar">
      <h3>Calendar</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et metus in sapien placerat consectetur at vel turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel consectetur metus. Donec sagittis iaculis hendrerit. Vivamus et erat tellus. Phasellus at nulla quis nunc faucibus placerat. Cras tristique enim sit amet risus laoreet dapibus. Phasellus vel nulla id turpis aliquet molestie. Suspendisse potenti. Fusce cursus semper iaculis. Mauris hendrerit, ipsum a molestie pretium, lectus elit bibendum ante, non tincidunt neque lorem et quam.</p>
    </div>
  </div>
  <div class="tutor">
    <h2>Example Man</h2>
    <img src="includes/images/Arrow_Down.png" width="50" height="50" alt="Drop Down" />
    <div class="clear"></div>
    <div class="calendar">
      <h3>Calendar</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et metus in sapien placerat consectetur at vel turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel consectetur metus. Donec sagittis iaculis hendrerit. Vivamus et erat tellus. Phasellus at nulla quis nunc faucibus placerat. Cras tristique enim sit amet risus laoreet dapibus. Phasellus vel nulla id turpis aliquet molestie. Suspendisse potenti. Fusce cursus semper iaculis. Mauris hendrerit, ipsum a molestie pretium, lectus elit bibendum ante, non tincidunt neque lorem et quam.</p>
    </div>
  </div>
  <div class="tutor">
    <h2>Some Guy</h2>
    <img src="includes/images/Arrow_Down.png" width="50" height="50" alt="Drop Down" />
    <div class="clear"></div>
    <div class="calendar">
      <h3>Calendar</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et metus in sapien placerat consectetur at vel turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel consectetur metus. Donec sagittis iaculis hendrerit. Vivamus et erat tellus. Phasellus at nulla quis nunc faucibus placerat. Cras tristique enim sit amet risus laoreet dapibus. Phasellus vel nulla id turpis aliquet molestie. Suspendisse potenti. Fusce cursus semper iaculis. Mauris hendrerit, ipsum a molestie pretium, lectus elit bibendum ante, non tincidunt neque lorem et quam.</p>
    </div>
  </div>
  <div class="tutor">
    <h2>A Tutor</h2>
    <img src="includes/images/Arrow_Down.png" width="50" height="50" alt="Drop Down" />
    <div class="clear"></div>
    <div class="calendar">
      <h3>Calendar</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et metus in sapien placerat consectetur at vel turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed vel consectetur metus. Donec sagittis iaculis hendrerit. Vivamus et erat tellus. Phasellus at nulla quis nunc faucibus placerat. Cras tristique enim sit amet risus laoreet dapibus. Phasellus vel nulla id turpis aliquet molestie. Suspendisse potenti. Fusce cursus semper iaculis. Mauris hendrerit, ipsum a molestie pretium, lectus elit bibendum ante, non tincidunt neque lorem et quam.</p>
    </div>
  </div>
</div>
</body>
</html>
