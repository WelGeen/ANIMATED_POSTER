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

		</head>
		
	<body>
		<!-- make a layout and svg with circle -->
		<div class="parent">
		
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
			
			
			parentOBJ.addEventListener("mousemove", function(event){
				images.forEach(function(el) {
					el.setAttribute("x", getRandomInt(-20, 20));
					el.setAttribute("y", getRandomInt(-20, 20));
				});
				paths.forEach(function(el) {
					el.setAttribute( "transform", "translate("+getRandomInt(-120, 20)+","+getRandomInt(-20, 120)+")")
					el.setAttribute( "transform", "rotate("+getRandomInt(-180, 180)+")")
				});
				rects.forEach(function(el) {
					el.setAttribute( "transform", "translate("+getRandomInt(-20, 120)+","+getRandomInt(-20, 120)+")")
					el.setAttribute( "transform", "rotate("+getRandomInt(-180, 180)+")")
				});
				circles.forEach(function(el) {
					el.setAttribute( "transform", "translate("+getRandomInt(-120, 20)+","+getRandomInt(-120, 20)+")")
					el.setAttribute( "transform", "rotate("+getRandomInt(-180, 180)+")")
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
