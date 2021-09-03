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
			@media only screen and (min-width: 700px) {
				.child {
					width: 90%;
					height: auto;
				}
			
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
					include ('wk01-deel2.svg');
				?>
			</div>
			
		</div>
		
		<script>
			
			// https://createjs.com/tweenjs
			const parentOBJ = document.querySelector(".parent");
			
			const images = document.querySelectorAll("image"); 
			const paths = document.querySelectorAll("path"); 
			const patterns = document.querySelectorAll("pattern"); 
			const rects = document.querySelectorAll("rect"); 
			const circles = document.querySelectorAll("circle"); 
			const polygons = document.querySelectorAll("polygon"); 
			const texts = document.querySelectorAll("text");
			
			var count = 0;
		
			
			//TIP: https://developer.mozilla.org/en-US/docs/Web/API/Document/querySelectorAll
			images.forEach(function(el) {SETdefault(el)});
			paths.forEach(function(el) {SETdefault(el)});
			rects.forEach(function(el) {SETdefault(el)});
			circles.forEach(function(el) {SETdefault(el)});
			polygons.forEach(function(el) {SETdefault(el)});
			texts.forEach(function(el) {SETdefault(el)});
			
			parentOBJ.addEventListener("touchmove", myScript);	
			parentOBJ.addEventListener("mousemove", myScript);
			
			function myScript(event){
				count = 0;
				
				images.forEach(function(el) {test(el);});
				
				paths.forEach(function(el) {test2(el);});
				rects.forEach(function(el) {test2(el);});
				circles.forEach(function(el) {test2(el);});
				polygons.forEach(function(el) {test2(el);});
				texts.forEach(function(el) {test2(el);});
				
			}
			function SETdefault(el){
				el.animate = false;
	
				//el.default = { x: 0, y: 0, rot: 0, elem: el}; 
			}
			var ff = false;
			function reset(){
				ff = true;
				images.forEach(function(el) {test(el);});
				
				paths.forEach(function(el) {test2(el);});
				rects.forEach(function(el) {test2(el);});
				circles.forEach(function(el) {test2(el);});
				polygons.forEach(function(el) {test2(el);});
				texts.forEach(function(el) {test2(el);});
				ff = false;
			}
			function test2(el){
				if(el.animate==false){
					
					if(el.dataX == undefined ){
						el.dataX = 0;
						el.dataY = 0;
						el.rot = 0;
					}
					
					var current = { x: el.dataX, y: el.dataY, rot: el.rot, elem: el}; 
					
					var target = { x: getRandomInt(-500, 600), y: getRandomInt(-600, 700), rot: getRandomInt(0, 360)};
					if(ff==true){
						target= el.default;
					}
					var tween = new TWEEN.Tween(current)
					.to( target, getRandomInt(100, 2000))
					.easing(TWEEN.Easing.Bounce.InOut) //https://www.createjs.com/docs/tweenjs/classes/Ease.html
					.onUpdate(function() {
						//el.setAttribute("transform", "translate("+this.x+","+this.y+")")
						el.setAttribute( "transform", "translate("+this.x+","+this.y+"), rotate("+ this.rot+")");
					
					})
					.onComplete(function() {
						this.elem.animate =false;
					}).start();
				
					el.animate=true;
				}
			}
			
			function test(el){
				//el.style.display= "none";
				//return;
				
				if(el.animate==false){
					var xx = el.getAttribute('x');
					var yy = el.getAttribute('y'); 
					if(isNaN(xx)){
						xx = 0;
						yy = 0;
					}
					var current = { x: xx, y: yy, elem: el}; 
					var target = { x: getRandomInt(-500, 600), y: getRandomInt(-600, 700)};
					if(ff==true){
						target= el.default;
					}
					var tween = new TWEEN.Tween(current)
					.to( target, getRandomInt(100, 2000))
					.easing(TWEEN.Easing.Bounce.InOut) //https://www.createjs.com/docs/tweenjs/classes/Ease.html
					.onUpdate(function() {
						this.elem.setAttribute('x', this.x); 
						this.elem.setAttribute('y', this.y);
					})
					.onComplete(function() {
						this.elem.animate =false;
					}).start();
				
					el.animate=true;
				}
			}
			function getRandomInt(min, max) { //https://stackoverflow.com/questions/1527803/generating-random-whole-numbers-in-javascript-in-a-specific-range
				min = Math.ceil(min);
				max = Math.floor(max);
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}
			function animate(time) {
				requestAnimationFrame( animate );
				TWEEN.update(time);
				count++;
				console.log(count)
				if(count>200){
					reset();
				}
			}
			
			
			
			animate();
			
			
		</script>
	</body>
</html>
