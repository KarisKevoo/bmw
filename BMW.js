//login and signup handling
window.onload = function () {

	var login = document.getElementById("log in");
	var signup = document.getElementById("sign up");
	var signup_2 = document.getElementById("signup2");

	login.addEventListener("click", function () {
		document.getElementById("Login-modal").style.display = "block";
		document.body.style.overflowY = 'hidden';
	});
	signup.addEventListener("click", function () {
		document.getElementById("Signup-modal").style.display = "block";
		document.body.style.overflowY = 'hidden';
	});
	var cancel = document.getElementById("cancel");
	cancel.addEventListener("click", function () {
		document.getElementById("Signup-modal").style.display = "none";
		document.body.style.overflowY = 'auto';
	});
	var close = document.getElementById("close");
	close.addEventListener("click", function () {
		document.getElementById("Login-modal").style.display = "none";
		document.body.style.overflowY = 'auto';
	});
	signup_2.addEventListener("click", function () {
		document.getElementById("Login-modal").style.display = "none";
		document.getElementById("Signup-modal").style.display = "block";
		document.body.style.overflowY = 'hidden';
	});
}
function close() {
	Document.getElementById("Login-modal").style.display = "none";
}
function shiftsignup() {
	Document.getElementById("Login-modal").style.display = "none";
	Document.getElementById("Signup-modal").style.display = "none";
}

//help alerts
function Help() {
	var name = prompt("Hi? What is your name?");
	var time = new Date().getHours();

	if (name == "," || name == "." || name == "" || name == "  " || name == "?" || name == " ") {

		alert("Invalid input! Please insert your name to get help.");
	}
	else if (name == null) {
		alert("You canceled! Try again");
	}
	else if (time <= 11) {
		alert("Good morning " + name + "? Welcome to the site! Here is a quick help... View the cars in our gallery or search a specific car to see its likes and comments from others. You can also like or dislike and comment on it. Some of those options are on the navigation and the rest are in menu dropdown. Get started and remember to rate the site! If you needed some other help, you can reach me through contacts below the page or social platforms on the right side of the page.");
	}
	else if (time <= 16) {
		alert("Good afternoon " + name + "? Welcome to the site! Here is a quick help... View the cars in our gallery or search a specific car to see its likes and comments from others. You can also like or dislike and comment on it. Some of those options are on the navigation and the rest are in menu dropdown. Get started and remember to rate the site! If you needed some other help, you can reach me through contacts below the page or social platforms on the right side of the page.");
	}
	else {
		alert("Good evening " + name + "? Welcome to the site! Here is a quick help... View the cars in our gallery or search a specific car to see its likes and comments from others. You can also like or dislike and comment on it. Some of those options are on the navigation and the rest are in menu dropdown. Get started and remember to rate the site! If you needed some other help, you can reach me through contacts below the page or social platforms on the right side of the page.");
	}
}

//homepage sideway scrolls
function next() {
	var hide = document.getElementById("mostliked").scrollLeft += 510;
	if (hide = 0) {
		document.getElementById("previous").style.visibility = "hidden";
	}
	else if (hide => 510) {
		document.getElementById("previous").style.visibility = "visible";
	}
}
function previous() {
	document.getElementById("mostliked").scrollLeft -= 510;
}

function next2() {
	var hide = document.getElementById("mostvisited").scrollLeft += 510;
	if (hide = 0) {
		document.getElementById("previous2").style.visibility = "hidden";
	}
	else if (hide => 510) {
		document.getElementById("previous2").style.visibility = "visible";
	}
}
function previous2() {
	document.getElementById("mostvisited").scrollLeft -= 510;
}

//menu button
function showmenu() {
	var v = document.getElementById("dropdown");
	if (v.style.height == "32vw") {
		document.getElementById("dropdown").style.height = "0";
		document.getElementById("dropdown").style.transitionDuration = '1000ms';
	}
	else {
		document.getElementById("dropdown").style.height = "32vw";
		document.getElementById("dropdown").style.transitionDuration = '1000ms';
	}
}

//page position
window.onscroll = function () {
	var progressbar = document.getElementById("progressbar");
	var percent = document.getElementById("percent");

	var totalHeight = document.body.scrollHeight - window.innerHeight;
	var progress = (window.pageYOffset / totalHeight) * 100;
	progressbar.style.height = progress + "%";
	percent.innerHTML = Math.round(progress) + "%<br>scrolled";
}

//social media handler
function FWTT() {
	var slide = document.getElementById("facebook");
	if (slide.style.visibility == "hidden") {
		document.getElementById("facebook").style.visibility = "visible";
		document.getElementById("facebook").style.transitionDelay = "0.1s";

		document.getElementById("twitter").style.visibility = "visible";
		document.getElementById("twitter").style.transitionDelay = "0.23s";

		document.getElementById("whatsapp").style.visibility = "visible";
		document.getElementById("whatsapp").style.transitionDelay = "0.32s";

		document.getElementById("telegram").style.visibility = "visible";
		document.getElementById("telegram").style.transitionDelay = "0.40s";

	}
	else {
		document.getElementById("facebook").style.visibility = "hidden";
		document.getElementById("facebook").style.transitionDelay = "0.23s";

		document.getElementById("twitter").style.visibility = "hidden";
		document.getElementById("twitter").style.transitionDelay = "0.13s";

		document.getElementById("whatsapp").style.visibility = "hidden";
		document.getElementById("whatsapp").style.transitionDelay = "0.03s";

		document.getElementById("telegram").style.visibility = "hidden";
		document.getElementById("telegram").style.transitionDelay = "0.005s";
	}
}

//mobile section
if (window.innerWidth <= 600) {
	function showmenu() {
		var v = document.getElementById("dropdown");
		if (v.style.width == "50vw" && v.style.height == "62%") {
			document.getElementById("dropdown").style.width = "0";
			document.getElementById("dropdown").style.height = "0";
			document.getElementById("dropdown").style.transitionDuration = '1000ms';
		}
		else {
			document.getElementById("dropdown").style.width = "50vw";
			document.getElementById("dropdown").style.height = "62%";
			document.getElementById("dropdown").style.transitionDuration = '1000ms';
		}
	}
	$(window).ready(function () {
		$(".mobile_search").hide();

		$(".search-mobile").click(function () {
			$(".mobile_search").toggle(400);
		});
	});
}

//clickable gallery images
$('.content img').on('click', function () {
	$('body').css('overflow-y', 'hidden');
	var img = $(this).attr('src');
	var appear_image_div = "<div id='appear_image_div'><img id='appear_image' src='" + img + "'/></div>";
	appear_image_div = appear_image_div.concat("<div id='close_image' onclick='close_image()';><i class='fas fa-times'></i></div");
	$('html').append(appear_image_div);
});
function close_image() {
	$('#appear_image_div').remove();
	$('#appear_image').remove();
	$('#close_image').remove();
	$('body').css('overflow-y', 'auto');
}

//showing and hiding save button in profile
$("#my-profile-submit").hide();

setInterval(function () {
	$("#my-profile-input1, #my-profile-input2, #my-profile-input3").change(function () {
		$("#my-profile-submit").show();
	});
}, 1000);//1000ms = 1s

//open login modal after session is expired
$(window).on('load', function () {
	function check_session() {
		$.ajax({
			url: "check_session.php",
			method: "POST",
			success: function (data) {
				if (data == '1') {
					if ($("#Login-modal").css('display') !== 'block') {
						$("#Login-modal").css('display', 'block').css('overflow', 'hidden');
					}
				} else {
					$('.buttons button').css('display', 'none');
				}
			}
		});
	}
	check_session();
});

//Day Night mode
$("#DayNight").on('click', function () {
	$(".content").toggleClass("content-dark-theme");
	$("#dropdown").toggleClass("dark-theme");
	$("#dropdown a").toggleClass("dark-theme");
});

//Loading Animation
$(window).on('load', function () {
	$(".content img").removeClass("loading");
});

//Cookie
$(window).ready(function () {
	$('.cookie').css('height', '10%');
	$('.accept-readmore #accept').on('click', function () {
		$(".cookie").hide();
		Cookies.set("test", "true");
	});
});