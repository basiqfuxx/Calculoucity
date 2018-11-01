<?php
/*
 * Plugin Name: Calculoucity
 * Plugin URI: http://wordpress.org/plugins/calculoucity/
 * Description: This is a plugin to play a game with numbers.
 * Author: Tommy Göransson, Smelink AB
 * Text Domain: calculoucity
 * Version: 1.00
 * Author URI: http://smelink.se/
 * License: MIT & GPL3
*/

/*

Copyright 2017 Smelink AB

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

add_shortcode( 'calculoucity', 'calculoucity_func' );

function calculoucity_theme_scripts() {
  wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'calculoucity_theme_scripts');

function GetCalculoucityGrid() {
	return '
<p>
	' . __('The goal is to get the sum 10 in all the boxes, fewer moves are better.', 'calculoucity') . '<br>
	' . __('(Just put the cursor in a box and press a numberkey on the keyboard)', 'calculoucity') . '<br>
	' . __('Number of moves', 'calculoucity') . ': <span id="calculoucity_moves">0</span>&nbsp;
	<span id="calculoucity_win">'.__('You have finished the challenge!', 'calculoucity') . '</span>
</p>
<table class="calculoucity_table">
	<tbody>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc11" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc12" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc13" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc14" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc15" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc16" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc17" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc18" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc19" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc21" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc22" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc23" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc24" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc25" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc26" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc27" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc28" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc29" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc31" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc32" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc33" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc34" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc35" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc36" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc37" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc38" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc39" class="calculoucity_input" value="0" /></td>
		</tr>

		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc41" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc42" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc43" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc44" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc45" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc46" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc47" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc48" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc49" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc51" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc52" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc53" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc54" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc55" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc56" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc57" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc58" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc59" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc61" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc62" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc63" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc64" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc65" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc66" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc67" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc68" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc69" class="calculoucity_input" value="0" /></td>
		</tr>

		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc71" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc72" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc73" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc74" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc75" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc76" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc77" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc78" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc79" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc81" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc82" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc83" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc84" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc85" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc86" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc87" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc88" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc89" class="calculoucity_input" value="0" /></td>
		</tr>
		<tr class="calculoucity_row">
			<td class="calculoucity_cell"><input id="rc91" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc92" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc93" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc94" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc95" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc96" class="calculoucity_input" value="0" /></td>

			<td class="calculoucity_cell"><input id="rc97" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc98" class="calculoucity_input" value="0" /></td>
			<td class="calculoucity_cell"><input id="rc99" class="calculoucity_input" value="0" /></td>
		</tr>
	</tbody>
</table>
	';
}




// This just echoes the chosen line, we'll position it later
function calculoucity_func() {
	
	$strGrid = GetCalculoucityGrid();
	
	echo "<p id='calculoucity'>$strGrid</p>";
}


// We need some CSS to position the paragraph and JS to do some calculations
function calculoucity_head() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#calculoucity {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	
	#calculoucity_moves {
		border: none;
	}
	
	.calculoucity_table {
		border: none;
	}
	
	.calculoucity_row {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		border: none;
	}
	
	.calculoucity_cell {
		/*padding: 10px;*/
		border: none;
		vertical-align: middle;		
	}
	
	.calculoucity_input:hover {
		background-color: #f5f5f5;
	}
	
	.calculoucity_input {
		width: 35px;
		text-align: center;
	}
	</style>

	<script type='text/javascript'>
	
		jQuery(document).ready(function($) {

			var Calculoucity =
			{
				arrAnimationPattern : [],
				intIntervalId : 0,
				intAnimationTimer : 10,
				intPatternStep : 0,
				strPatternColor : '',
				intMaxPattern : 5,
				arrRandomPattern : [],
				intNrMoves : 0,
				
				Init : function()
				{
					$('#calculoucity_win').hide();
					
					for(var y = 1; y < 10; y++) {
						for(var x = 1; x < 10; x++) {
							strCell = 'rc'+y+x;
							Calculoucity.arrRandomPattern.push(strCell);
						}
					}

					$('.calculoucity_input').on('keyup', function(e) {
						var intCode = e.which;
						switch (intCode) {
							case 35:
								//1
								intCode = 49;
								break;

							case 40:
								//2
								intCode = 50;
								break;

							case 34:
								//3
								intCode = 51;
								break;

							case 37:
								//4
								intCode = 52;
								break;

							case 12:
								//5
								intCode = 53;
								break;

							case 39:
								//6
								intCode = 54;
								break;

							case 36:
								//7
								intCode = 55;
								break;

							case 38:
								//8
								intCode = 56;
								break;

							case 33:
								//9
								intCode = 57;
								break;

						}
						if (intCode >= 49 && intCode <= 57 && Calculoucity.intIntervalId == 0) {
							var strId = this.id;
							Calculoucity.Calc(strId, intCode-48);
						}
						e.preventDefault();
						return false;
					});

					$('.calculoucity_input').on('keypress', function(e) {
						e.preventDefault();
						return false;
					});
				},
				
				Calc : function(strId, intKeyValue) {
					var intCurrentValue = parseInt($('#'+strId).val());
					if (isNaN(intCurrentValue)) {
						intCurrentValue = 0;
					}
					var intNearValue = parseInt(Math.floor(intKeyValue/2));
					var intX = parseInt(strId.charAt(3));
					var intY = parseInt(strId.charAt(2));
					var intNewValue = intCurrentValue-intKeyValue;
					if (intNewValue < 0) {
						intNewValue = 0;
					}
					$('#'+strId).val(intNewValue);
					var intTempValue = 0;
					if (intX > 1) {
						intTempValue = parseInt($('#rc'+intY+(intX-1)).val());
						if (isNaN(intTempValue)) {
							intTempValue = 0;
						}
						$('#rc'+intY+(intX-1)).val(intTempValue + intNearValue);
					}
					if (intX < 9) {
						intTempValue = parseInt($('#rc'+intY+(intX+1)).val());
						if (isNaN(intTempValue)) {
							intTempValue = 0;
						}
						$('#rc'+intY+(intX+1)).val(intTempValue + intNearValue);
					}
					if (intY > 1) {
						intTempValue = parseInt($('#rc'+(intY-1)+intX).val());
						if (isNaN(intTempValue)) {
							intTempValue = 0;
						}
						$('#rc'+(intY-1)+intX).val(intTempValue + intNearValue);
					}
					if (intY < 9) {
						intTempValue = parseInt($('#rc'+(intY+1)+intX).val());
						if (isNaN(intTempValue)) {
							intTempValue = 0;
						}
						$('#rc'+(intY+1)+intX).val(intTempValue + intNearValue);
					}
					
					Calculoucity.intNrMoves++;
					$('#calculoucity_moves').html(Calculoucity.intNrMoves);
					Calculoucity.StartAnimation();
					Calculoucity.CheckForWin();
				},
				
				CheckForWin : function() {
					var intResult = 0;
					$('.calculoucity_input').each(function() {
						if ($(this).val() == 10) {
							intResult++;
						}
					});
					
					if (intResult == 81) {
						$('#calculoucity_win').show();
						$('.calculoucity_input').prop( 'disabled', true );
					}
					
				},
				
				SetAnimationPattern : function(intPattern) {
					switch(intPattern) {
						case 1:
							Calculoucity.arrAnimationPattern = new Array('rc55', 'rc56', 'rc66', 'rc65', 'rc64', 'rc54', 'rc44', 'rc45', 'rc46', 'rc47', 'rc57', 'rc67', 'rc77', 'rc76', 'rc75', 'rc74', 'rc73', 'rc63', 'rc53', 'rc43', 'rc33', 'rc34', 'rc35', 'rc36', 'rc37', 'rc38', 'rc48', 'rc58', 'rc68', 'rc78', 'rc88', 'rc87', 'rc86', 'rc85', 'rc84', 'rc83', 'rc82', 'rc72', 'rc62', 'rc52', 'rc42', 'rc32', 'rc22', 'rc23', 'rc24', 'rc25', 'rc26', 'rc27', 'rc28', 'rc29', 'rc39', 'rc49', 'rc59', 'rc69', 'rc79', 'rc89', 'rc99', 'rc98', 'rc97', 'rc96', 'rc95', 'rc94', 'rc93', 'rc92', 'rc91', 'rc81', 'rc71', 'rc61', 'rc51', 'rc41', 'rc31', 'rc21', 'rc11', 'rc12', 'rc13', 'rc14', 'rc15', 'rc16', 'rc17', 'rc18', 'rc19');
							break;
						
						case 2:
							Calculoucity.arrAnimationPattern = new Array('rc19', 'rc18', 'rc17', 'rc16', 'rc15', 'rc14', 'rc13', 'rc12', 'rc11', 'rc21', 'rc31', 'rc41', 'rc51', 'rc61', 'rc71', 'rc81', 'rc91', 'rc92', 'rc93', 'rc94', 'rc95', 'rc96', 'rc97', 'rc98', 'rc99', 'rc89', 'rc79', 'rc69', 'rc59', 'rc49', 'rc39', 'rc29', 'rc28', 'rc27', 'rc26', 'rc25', 'rc24', 'rc23', 'rc22', 'rc32', 'rc42', 'rc52', 'rc62', 'rc72', 'rc82', 'rc83', 'rc84', 'rc85', 'rc86', 'rc87', 'rc88', 'rc78', 'rc68', 'rc58', 'rc48', 'rc38', 'rc37', 'rc36', 'rc35', 'rc34', 'rc33', 'rc43', 'rc53', 'rc63', 'rc73', 'rc74', 'rc75', 'rc76', 'rc77', 'rc67', 'rc57', 'rc47', 'rc46', 'rc45', 'rc44', 'rc54', 'rc64', 'rc65', 'rc66', 'rc56', 'rc55');
							break;
						
						case 3:
							Calculoucity.arrAnimationPattern = new Array('rc11', 'rc21', 'rc31', 'rc41', 'rc51', 'rc61', 'rc71', 'rc81', 'rc91', 'rc99', 'rc89', 'rc79', 'rc69', 'rc59', 'rc49', 'rc39', 'rc29', 'rc19', 'rc12', 'rc22', 'rc32', 'rc42', 'rc52', 'rc62', 'rc72', 'rc82', 'rc92', 'rc98', 'rc88', 'rc78', 'rc68', 'rc58', 'rc48', 'rc38', 'rc28', 'rc18', 'rc13', 'rc23', 'rc33', 'rc43', 'rc53', 'rc63', 'rc73', 'rc83', 'rc93', 'rc97', 'rc87', 'rc77', 'rc67', 'rc57', 'rc47', 'rc37', 'rc27', 'rc17', 'rc14', 'rc24', 'rc34', 'rc44', 'rc54', 'rc64', 'rc74', 'rc84', 'rc94', 'rc96', 'rc86', 'rc76', 'rc66', 'rc56', 'rc46', 'rc36', 'rc26', 'rc16', 'rc15', 'rc25', 'rc35', 'rc45', 'rc55', 'rc65', 'rc75', 'rc85', 'rc95');
							break;

						case 4:
							Calculoucity.arrAnimationPattern = new Array('rc11', 'rc12', 'rc13', 'rc14', 'rc15', 'rc16', 'rc17', 'rc18', 'rc19', 'rc99', 'rc98', 'rc97', 'rc96', 'rc95', 'rc94', 'rc93', 'rc92', 'rc91', 'rc21', 'rc22', 'rc23', 'rc24', 'rc25', 'rc26', 'rc27', 'rc28', 'rc29', 'rc89', 'rc88', 'rc87', 'rc86', 'rc85', 'rc84', 'rc83', 'rc82', 'rc81', 'rc31', 'rc32', 'rc33', 'rc34', 'rc35', 'rc36', 'rc37', 'rc38', 'rc39', 'rc79', 'rc78', 'rc77', 'rc76', 'rc75', 'rc74', 'rc73', 'rc72', 'rc71', 'rc41', 'rc42', 'rc43', 'rc44', 'rc45', 'rc46', 'rc47', 'rc48', 'rc49', 'rc69', 'rc68', 'rc67', 'rc66', 'rc65', 'rc64', 'rc63', 'rc62', 'rc61', 'rc51', 'rc52', 'rc53', 'rc54', 'rc55', 'rc56', 'rc57', 'rc58', 'rc59');
							break;
							
						case 5:
							Calculoucity.arrAnimationPattern = Calculoucity.arrRandomPattern;
							Calculoucity.ShuffleArray(Calculoucity.arrAnimationPattern);
							break;
					}
				},
				
				StartAnimation : function() {
					Calculoucity.intIntervalId = setInterval(Calculoucity.AnimatePattern, Calculoucity.intAnimationTimer);
				},
				
				AnimatePattern : function() {
					if (Calculoucity.intPatternStep == 0) {
						Calculoucity.strPatternColor = Calculoucity.GetRandomColor();
						Calculoucity.SetAnimationPattern(Math.floor((Math.random() * Calculoucity.intMaxPattern) + 1));
					}

					$('#'+Calculoucity.arrAnimationPattern[Calculoucity.intPatternStep]).css('background-color', Calculoucity.strPatternColor);
					Calculoucity.intPatternStep++;

					if (Calculoucity.intPatternStep >= Calculoucity.arrAnimationPattern.length) {
						Calculoucity.intPatternStep = 0;
						clearInterval(Calculoucity.intIntervalId);
						Calculoucity.intIntervalId = 0;
						$('.calculoucity_input').css('background-color', '#ffffff');
					}

				},
				
				GetRandomColor : function() {
					var strLetters = '0123456789ABCDEF';
					var strColor = '#';
					for (var i = 0; i < 6; i++ ) {
						strColor += strLetters[Math.floor(Math.random() * 16)];
					}
					return strColor;
				},
				
				ShuffleArray : function(arrTemp) {
					for (var i = arrTemp.length - 1; i > 0; i--) {
						var j = Math.floor(Math.random() * (i + 1));
						var strNewTemp = arrTemp[i];
						arrTemp[i] = arrTemp[j];
						arrTemp[j] = strNewTemp;
					}
				}
				
			}

			Calculoucity.Init();
		});
		
	</script>
	";

}

add_action( 'wp_head', 'calculoucity_head' )

?>