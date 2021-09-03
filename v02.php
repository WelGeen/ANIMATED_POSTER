<!DOCTYPE html>
	<html>
		<head>
			<title></title>
			<style>
			html,
			body { 
				height: 100%;
				margin:0px;
			}
			.parent {
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.child {
				width: 50%;
				height: auto;
			}
				
			</style>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/16.3.5/Tween.min.js"></script>
		</head>
		
	<body>
		<!-- make a layout and svg with circle -->
		<div class="parent" id="container">
		
			<div class="child">
				<?php
					include ('poster.svg');
				?>
			</div>
			
		</div>
		
		<script>
			
			// https://createjs.com/tweenjs
			const parentOBJ = document.querySelector(".parent");
			const images = document.querySelectorAll("image"); 
			const paths = document.querySelectorAll("path"); 
			const rects = document.querySelectorAll("rect"); 
			const circles = document.querySelectorAll("circle"); 
			//TIP: https://developer.mozilla.org/en-US/docs/Web/API/Document/querySelectorAll
			
			$(document).ready(function() {
				var movementStrength = 25;
				var height = movementStrength / $(window).height();
				var width = movementStrength / $(window).width();
				
				parentOBJ.addEventListener("mousemove", function(e){
					var pageX = e.pageX - ($(window).width() / 2);
					  var pageY = e.pageY - ($(window).height() / 2);
					  var newvalueX = width * pageX * -1 - 25;
					  var newvalueY = height * pageY * -1 - 50;
				images.forEach(function(el) {
					el.setAttribute("x", newvalueX);
					el.setAttribute("y", newvalueY);
				});
				newvalueX = width * pageX * -1 - getRandomInt(-120, 20);
				newvalueY = height * pageY * -19 - 500;
				paths.forEach(function(el) {
					el.setAttribute( "transform", "translate("+newvalueX+","+newvalueY+")")
					el.setAttribute( "transform", "rotate("+getRandomInt(-1, 3)+")")
				});
				newvalueX = width * pageX * -21 - 125;
				newvalueY = height * pageY * -1 + 500;
				rects.forEach(function(el) {
					el.setAttribute( "transform", "translate("+newvalueX+","+newvalueY+")")
					//el.setAttribute( "transform", "rotate("+getRandomInt(-180, 180)+")")
				});
				circles.forEach(function(el) {
					el.setAttribute( "transform", "translate("+newvalueX+","+newvalueY+")")
					//el.setAttribute( "transform", "translate("+getRandomInt(-120, 20)+","+getRandomInt(-120, 20)+")")
					//el.setAttribute( "transform", "rotate("+getRandomInt(-180, 180)+")")
				});
			});
				
			});
				
			
			
			function getRandomInt(min, max) { //https://stackoverflow.com/questions/1527803/generating-random-whole-numbers-in-javascript-in-a-specific-range
				min = Math.ceil(min);
				max = Math.floor(max);
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}
			
		</script>
	</body>
</html>
