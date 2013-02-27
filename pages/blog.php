	<article>
		<h4>Moving from the Purely HTML and CSS to PHP</h4>
		<b><i>27/02/2013</i></b><br>
		<p>I've recently changed the website from being purely HTML5 & CSS3 to now incorporating PHP. Now to do this I had to go few a steps.
		Firstly I had to download and Install a local server, I've used WAMP a number of times before; however I'm currently running a new computer and had 
		to setup WAMP for the first time on here. My current PC is running a Version of 64bits Windows and I encountered a little bit of niggly problems with 
		getting the server to effectively start up. Unsure of the true source of problem with a odd error saying a .dll file was missing from the installtion, despite
		having both the 2008 and 2010 service packs installed from Microsoft's website. Now I could have simple just hardcoded the PHP via the live server I'm currently using,
		but that's a bit of a bother and would slow the process down. So after hunting around on the web someone had mentioned a 32bit version of WAMP was running fine; so I uninstalled
		WAMP and then re-installed a 32bit version, and Boom! Working. </p>
		<p>So the biggest change to using PHP isn't on the design front all. Infact the wesbsite it's self looks mostly the same, what has changed is more behind the scenes. PHP is a verstiale
		scripting language, which is great for Front End to Database communication plus a number of other aspects. I've got some basic knowledge of how it all works, and how you can use it. On this
		site the PHP is used for a couple places, mainly naviagation aspects. Everything about this Article thread is now part of "header.php" and everything at the bottom is "footer.php", this means
		if I want to change either the top or bottom of the page I can do it by editting one file! (and not individual pages). It's a great time saver! So now website loads it loads index.php, index.php
		at the moment is pretty bare, having simply a includes section;</p>
		
		<div id="code">
		include_once('partials/header.php');
		</div>
		<p> This line is the first line after the PHP tags, it simply includes the top of this page, which currently contains the Title, Slogan and Navigational Links.</p>
		
		<div id="code">
			$page_set = isset($_GET['page']); <br><br>
						
			if($page_set == true) <br>
					{ <br>
						if($_GET['page'] == "blog")<br>
							{<br>
								include_once('pages/blog.php');<br>
							}<br>
		</div>
		
		<p> These few lines are slightly more complex, the first bit, <b>"Page_Set = isset($_GET['page'])"</b> is a method which can be used to query the what the current page in the URL address is;
			specifically, what comes after the '?' in the url. In the case of this site it could be displayed as 'simon.ajnicholls.co.uk/index.php<b>?page=blog'</b>, the bolded out part is the Query,
			and the PHP is querying what page is set, now 'page' in this script is interchangeable, it could be 'action' (which is a fairly common assoicated word) or other various words.</p>
			
		<p> So next the script says if the page set is TRUE and IF equal to 'blog' Include Once; 'Blog.php'. This process kind of threw me out at first, partly cause I'm still getting use to how PHP
		works, because whilst I've used PHP before in Project Nine, and I was involved quite heavily in that process, I was 'creating' the PHP I was modifying exisiting code to make it do what we needed.
		Most of the actual PHP was done by a very very skilled and talented developer, and I learnt quite alot from his code and his practise. Anyway, that's a different story. So now the page loads if page 
		is set to 'Pages/blog.php'. But what happens if you click one of the various links?</p>
		
		<div id="code">
							if($_GET['page'] == "about")<br>
							{<br>
								include_once('pages/about.php');<br>
							}<br><br><br>

							
							if ($_GET['page'] == "projects") <br>
							{ <br>
								include_once('pages/projects.php');<br>
							}<br><br><br>
							
							
							if ($_GET['page'] == "contact")<br>
							{<br>
								include_once('pages/contact.php');<br>
							}<br><br><br>
		</div>
		
		<p> You guessed it! More IF commands, if the query of the page is set to "About" then load about, or Projects or Contact, etc etc. But what happens if the page isn't set?</p>
		<div id="code">
		
				}else<br>
				{<br>
					include_once('pages/blog.php');<br>
				}<br>
		</div>
		
		<p> Well if page isn't set, then Else load the main page in this case, which I've simply called Blog.php,</p>
						
		<div id="code">
		include_once('partials/footer.php');	
		</div>
		
		<p> Then lastly! The footer is loaded in! Now that might seem a very long winded way of doing it - and trust me with the fiddling around and trying to get intially to work, it kind of was.
		However, this is much a better and convential way of setting up the site. Now that the site is made up of three sections - I can effectively modifiy them as a I want. Which is much more efficient
		way of doing it! Plus I need the PHP practise. </p>
		<p>Now the site is coming on nicely, I've added borders to the articles, changed the article background to a slightly more duller color, but I think it's
		an easier color to read, plus the interchange of Black character and White character isn't garish, other noteable changes is that I've added more content to the Projects page, I'm in two minds whether
		to make seperate pages for each projects, with a much more in depth analysis (kind of like what I did above) or whether to leave them as tiny snibbits of information. Another section I was going to add
		was perhaps having a "Currently working on" page, which would include Blog entries regarding my Dissertation project, of which I'm pretty sure I'm going to do a Social Media focused project. I also want
		to work on the design elements of this site. Because whilst functional, it does look a tiny bit dull.</p> <br>
		
		Much Love! GG
		Simon!
	</article>
	
	<article>
		<h4>Recently Changed</h4>
		<b><i>25/02/2013</i></b><br>
		<p>So I've completely changed my background on this. Changed the links and Title of the page, i've taken major ideas from various sources online now.
		I've spent most of the day juking around with GIMP, which I haven't done in a while. Making the background in the end was pretty simple, it's an image of 
		concrete with inverted colours and a noise filter over the top. Looks kind of slick. Which is cool right?</p>
	</article>

	<article>
		<h4>Recently Changed;</h4>
		<figure>
			<img src="images/me1.jpg" alt="me!" height="240" width="380">
				<figcaption>
					This is me at the library, needless to say, I did alot of work <br>That's actually a complete an utter lie
				</figcaption>
	</figure>
		<b><i>12/02/2013</i></b>
		<p>This is a test! This should create another article section and the image to the right; should remain where it is! FFFunky right?
		Pretty cool! If you ask me!, The picture's frame was totally ripped from CSS3. But the photo frame is pretty cool! As is the caption!
		Badass! Notice how the text follows the degree of the images rotate! And I didn't even do that! One thing to note is that you can't size
		the images by Percentage! Cause the CSS won't work D: I'm sure there's a neato'o way to complete this! But whatever!</p>
	<div class="clear"></div>
	</article>
		
		<article>
		 <h4>Recently Changed;</h4>
		 <b><i>12/02/2013</i></b><br>
		 <p>More work is to be taken on the site, hopefully I can play around with an Image, with perhaps the use of Captions and Positioning.
		 Might also create the four other pages - mainly so I've got something to play around with on each. Need to source images for Footer Nav.
		 And also need to find out what's happening with my main computer - Since it's pretty difficult to do anything on this netbook. Hell 
		 it doesn't even like Minecraft! D: </p>
	</article>