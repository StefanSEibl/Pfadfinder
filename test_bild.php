<html>
	<head>
		<title>Pathfinder wins!</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			var verb = [
				["v1", 73],
				["v2", 353],
				["v3", 32],
				["v4", 35],
				["v5", 78],
				["v6", 355],
				["v7", 350],
				["v8", 350],
				["v9", 355],
				["v10", 85],
				["v11", 347],
				["v12", 355],
				["v13", 70]
			]
			var weather = false;
			var strassen = false; 
			var erschuetterung = false;
			
				$("input[name='richtung']").change(function(){
					redo();
				});
				
				$("input[name='speed']").change(function(){
					changeTransp();
				});
				
				$("#weather").click(function(){
					if(weather){
						weather = false; 
						$("input").prop('disabled', true);
						$(".verb").css({ 'opacity' : 0});
					} else {
						weather = true;
						$("input").prop('disabled', false);
						redo();
					}
				});
				
				$("#street_disabled").click(function(){
					if(strassen){
						strassen = false;
						if(weather)
							redo();
						else
							$(".verb").css({ 'opacity' : 0});
					} else {
						strassen = true;
						entferneStrasse();
					}
				});
				
				$("#erschuetterung").click(function(){
					if(erschuetterung){
						erschuetterung = false;
						if(weather)
							redo();
						else{
							$(".verb").css({ 'opacity' : 0});
							$(".verb").css("background-color", "rgb(255, 255, 255)");
						}
					} else {
						erschuetterung = true;
						zeigeErschuetterung();
					}
				});
				
				function zeigeErschuetterung(){
					if(!weather)
						$(".verb").css("border", "0px solid white");
					$(".v3").css("background-color", "rgb(255, 225, 0)");
					$(".v3").css({"opacity": 1});
					$(".v4").css("background-color", "rgb(255, 225, 0)");
					$(".v4").css({"opacity": 1});
					$(".v1").css("background-color", "rgb(255, 255, 0)");
					$(".v1").css({"opacity": 1});
					$(".v13").css("background-color", "rgb(255, 225, 0)");
					$(".v13").css({"opacity": 1});
				}
				
				function entferneStrasse(){
					$(".v2").css("border-right", "3px solid rgb(255, 0, 0)");
					$(".v2").css("border-left", "3px solid rgb(255, 0, 0)");
					$(".v2").css("width", "2px");
					$(".v2").css({"opacity": 1});
					$(".v5").css("border-right", "3px solid rgb(255, 0, 0)");
					$(".v5").css("border-left", "3px solid rgb(255, 0, 0)");
					$(".v5").css("width", "2px");
					$(".v5").css({"opacity": 1});
				}
				
				function changeTransp(){
					windanfälligkeit = 1;
					var val = $("input[name='speed']").val();
					if(val < 25){
						val = (val/25) * 0.4;
					} else if (val < 50){
						val = (val/50) *0.35 + 0.4;
					} else {
						val = (val/100)*0.25 + 0.75;
					}
					
					$(".verb").each(function(){
						val = val * windanfälligkeit;
						$(this).css({ 'opacity' :  val});
					});
					if(strassen)
						entferneStrasse();
				}
					
				function redo() {
					var dir = $("input[name='richtung'").val();
					switch(dir){
						case "N":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = (360 - verb[i][1]);
								} else {
									var val = verb[i][1];
								}
								console.log(val);
								var beeinträchtigung = (val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#N").show();
							})
						break;
						case "NE":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = 405 - verb[i][1];
								} else {
									if((verb[i][1]+45) > 90)
										var val = verb[i][1] - 45;
									else
										var val = 45 - verb[i][1]
								}
								console.log(verb[i][1] + "     " + val);
								var beeinträchtigung = (90-val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#NE").show();
							})
						break;
						case "NW":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 315){
									var val = verb[i][1] - 315;
								} else if(verb[i][1] > 270){
									var val = 270 - verb[i][1];
								} else if(verb[i][1] < 45) {
									var val = verb[i][1] + 45;
								} else {
									var val = 90 - (verb[i][1] - 45);
								}
								var val = 90-val;
								console.log(verb[i][1] + "     " + val);
								var beeinträchtigung = (val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#NW").show();
							})
						break;							
						case "E":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = verb[i][1] - 270;
									console.log(verb[i][1] + "    " + val);
								} else {
									var val = 90 - verb[i][1];
								}
								var beeinträchtigung = (90-val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#E").show();
							})
						break;
						case "SE":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 315){
									var val = verb[i][1] - 315;
								} else if(verb[i][1] > 270){
									var val = 270 - verb[i][1];
								} else if(verb[i][1] < 45) {
									var val = verb[i][1] + 45;
								} else {
									var val = 90 - (verb[i][1] - 45);
								}
								var val = 90-val;
								console.log(verb[i][1] + "     " + val);
								var beeinträchtigung = (val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#SE").show();
							})
						break;
						case "S":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = 360 - verb[i][1];
								} else {
									var val = verb[i][1];
								}
								var beeinträchtigung = (90-val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#S").show();
							})
						break;
						case "SW":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = 405 - verb[i][1];
								} else {
									if((verb[i][1]+45) > 90)
										var val = verb[i][1] - 45;
									else
										var val = 45 - verb[i][1]
								}
								console.log(verb[i][1] + "     " + val);
								var beeinträchtigung = (90-val) / 90;
								var red = Math.round((1-beeinträchtigung) * 255);
								var green = Math.round((beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#SW").show();
							})
						break;	
						case "W":
							console.log(dir);
							var i = 0;
							$(".verb").each(function(){
								if(verb[i][1] > 270){
									var val = verb[i][1] - 270;
									console.log(verb[i][1] + "    " + val);
								} else {
									var val = 90 - verb[i][1];
								}
								var beeinträchtigung = (90-val) / 90;
								var red = Math.round(beeinträchtigung * 255);
								var green = Math.round((1-beeinträchtigung) * 255);
								color1 = "rgb(" + red + "," + green + ",00)";
								color2 = "rgb(" + green + "," + red + ",00)";
								if(315 < verb[i][1]){
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("width", "2px");
								}else if (verb[i][1] < 45){
									$(this).css("border-right", "3px solid " + color1);
									$(this).css("border-left", "3px solid " + color2);
									$(this).css("width", "2px");
									
								} else {
									$(this).css("border-right", "3px solid " + color2);
									$(this).css("border-left", "3px solid " + color1);
									$(this).css("width", "2px");
								} 
								i++;
								$(".box2").hide();
								$("#W").show();
							})
						break;
					}
					
					changeTransp();
					if(strassen){
						entferneStrasse();
					}
				};
			
			})
		</script>
		<style>
			.punkt { 
			   width: 20px;
			   height: 20px;
			   background: #CCCC00; 
			   -moz-border-radius: 70px; 
			   -webkit-border-radius: 70px; 
			   border-radius: 10px;
			   position:absolute;
			}
			.verb {
				width: 5px;
				position:absolute;
			}
			body{
				background-image: url("testbild1.jpg");
				
			}
			button {
				background-color: #AAAAAA; /* Green */
				border: none;
				color: white;
				padding: 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				border-radius: 12px
			}
			.box2 {
				position: absolute;
				width: 200px;
				height: 200px;
				top: 100px;
				left: 250px;
				border: 2px solid black;
				text-align: center;
				border-radius: 100px;
				display: none;
			}
		</style>
	<head>
	<body>
	<div id = "punkte">
		<div class = "punkt" style = "top: 480; left: 250"></div>
		<div class = "punkt" style = "top: 450; left: 325"></div>
		<div class = "punkt" style = "top: 330; left: 230"></div>
		<div class = "punkt" style = "top: 430; left: 375"></div>
		<div class = "punkt" style = "top: 340; left: 365"></div>
		<div class = "punkt" style = "top: 380; left: 370"></div>
		<div class = "punkt" style = "top: 305; left: 360"></div>
		<div class = "punkt" style = "top: 240; left: 345"></div>
		<div class = "punkt" style = "top: 245; left: 270"></div>
		<div class = "punkt" style = "top: 150; left: 340"></div>
		<!--<div class = "punkt" style = "top: 120; left: 360"></div>
		<div class = "punkt" style = "top: 190; left: 435"></div>
		<div class = "punkt" style = "top: 255; left: 430"></div>
		<div class = "punkt" style = "top: 250; left: 490"></div>
		<div class = "punkt" style = "top: 270; left: 500"></div>
		<div class = "punkt" style = "top: 410; left: 445"></div>
		<div class = "punkt" style = "top: 390; left: 480"></div>
		<div class = "punkt" style = "top: 350; left: 590"></div>-->
	</div>
	<div id = "verbindungen">
		<div class = "verb v1" style = "top: 445; left: 295; transform:rotate(73deg); height: 65px"></div>
		<div class = "verb v2" style = "top: 350; left: 248; transform:rotate(353deg); height: 130px"></div>
		<div class = "verb v3" style = "top: 258; left: 254; transform:rotate(32deg); height: 78px"></div>
		<div class = "verb v4" style = "top: 157; left: 313; transform:rotate(35deg); height: 100px"></div>
		<div class = "verb v5" style = "top: 230; left: 313; transform:rotate(78deg); height: 60px"></div>
		<div class = "verb v6" style = "top: 170; left: 350; transform:rotate(355deg); height: 70px"></div>
		<div class = "verb v7" style = "top: 257; left: 360; transform:rotate(350deg); height: 50px"></div>
		<div class = "verb v8" style = "top: 322; left: 368; transform:rotate(350deg); height: 20px"></div>
		<div class = "verb v9" style = "top: 358; left: 374; transform:rotate(355deg); height: 25px"></div>
		<div class = "verb v10" style = "top: 365; left: 343; transform:rotate(85deg); height: 55px"></div>
		<div class = "verb v11" style = "top: 395; left: 322; transform:rotate(347deg); height: 58px"></div>
		<div class = "verb v12" style = "top: 400; left: 380; transform:rotate(355deg); height: 32px"></div>
		<div class = "verb v13" style = "top: 435; left: 359; transform:rotate(70deg); height: 35px"></div>
	</div>
	<div style = "background-color: white; position:absolute; left: 950px; top: 0px; width: 1000px; height: 100%">
		<div style = " top: 20px;  border-radius: 20px; margin: 20px; width: 200px; border-radius: 12px; background-color: #EEEEEE">
			<table>
				<tr>
					<td><button id = "weather" style = "padding-left: 30px; padding-right: 30px">Wetter einblenden</button></td>
				</tr>
				<tr>
					<td><button id = "street_disabled">Nicht durchfahrbare Straßen zeigen</button></td>
				</tr>
				<tr>
					<td><button id = "erschuetterung">Erschütterungsreiche Straßen zeigen</button></td>
				</tr>
				<!--<tr>
					<td><button id = "road_inclination" disabled>Steigung</button></td>
				</tr>
				<tr>
					<td><button id = "lighting" disabled>Beleuchtung</button></td>
				</tr>
				<tr>
					<td><button id = "usage_density" disabled>Auslastung</button></td>
				</tr>-->
			</table>
		</div>
	
	</div>
	<div style = "position: absolute; top: 40px; left: 1200px">
		<table>
		<form>
		<tr>
			<td><label for = "richtung">Windrichtung</label></td>
			<td><input name = "richtung" size = 2 value = "N" disabled = true /></td>
			<td></td>
		</tr><tr>
			<td><label for = "speed">Windgeschwindigkeit: </label></td>
			<td><input name = "speed" type = "number" value = 30 max = 100 step = 5 min = 0 disabled = true /></td>
			<td>kmh</td>
		</tr>
		</form>	
		</table>
		<img src = "Windrose-600x600.png" width = auto height = "40%" style = "padding-top: 50px; padding-left: 10px"/>
		<div id = "N" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 100px; left: 132px;"></div>
		<div id = "E" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 225px; left: 260px"></div>
		<div id = "S" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 350px; left: 132px;"></div>
		<div id = "W" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 225px; left: 10;"></div>
		<div id = "NE" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 155px; left: 205"></div>
		<div id = "NW" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 155px; left: 65"></div>
		<div id = "SW" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 295; left: 65"></div>
		<div id = "SE" class = "box2" style = "position: absolute; width: 40px; height: 40px; top: 295; left: 205"></div>
	</div>
	<!--<footer style = "align: bottom">
		<p>&copy; 2018 Michael, Michael, Marco, Patrick, Christian, Stefan</p>
	</footer>-->
	</body>
</html>