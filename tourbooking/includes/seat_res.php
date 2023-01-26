<?php
session_start();
include('connection.php');
$_SESSION["btnsid"] = $_POST["btnid"];
$btnid = $_POST["btnid"];
$bus_type = "Seater";
$seatsql = "SELECT * FROM businfo WHERE id LIKE ?";
$stmt = $pdo->prepare($seatsql);
$stmt->execute([$btnid]);
$seatinfos = $stmt->fetchall();
foreach ($seatinfos as $seatinfo) {
	$seattype = $seatinfo->bus_type1;
	$seatarrg = $seatinfo->seat_arragement;
	$seatbooked = $seatinfo->seat_booked;
}
?>
<?php $seatnoarr = explode(',',$seatarrg); 
      $seatbookarray = explode(',',$seatbooked); ?>
<div class="seats-book-active" id="seats-book">
	<span class="close">&times;</span>
	<div class="row">
		<div class="seats-sec  col-md-6 col-lg-6">
			<div class="seat-type">
			<?php 
			    if ($seattype == $bus_type) {?>
			    	<div class="seater">
			    		<hr style="transform: translate(164px,239px) rotate(90deg);"  width="50%" color="grey">
			    		<hr style="transform: translate(200px,222px) rotate(90deg);" width="50%" color="grey">
			    		<img src="images/s.png" id="wheel-img">
			    		<span><h2>Click on an Available seat to proceed with your transaction.</h2></span>
			    		<ul>
			    			<?php for($i=0;$i<12;$i++){
			    				if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    					<li>
			    						<button class="seatn-disable" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/seater1.png"></label>   
			    					</li> <?php
			    				}
			    				else{ ?>
			    					<li>
			    						<button class="seatB" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>" disabled></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/blackseat.png" class="blackseat"></label>   
			    					</li> <?php
			    				}
			    		    }?>
			    		</ul>
			    		<ul>
			    			<?php for($i=12;$i<24;$i++){
			    				if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    					<li>
			    						<button class="seatn-disable" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/seater1.png"></label>   
			    					</li> <?php
			    				}
			    				else{ ?>
			    					<li>
			    						<button class="seatB" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>" disabled></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/blackseat.png" class="blackseat"></label>   
			    					</li> <?php
			    				}
			    		    }?>
			    		</ul>
			    		<ul><?php
			    			if (strlen(array_search($seatnoarr[24],$seatbookarray)) < "1") { ?>
			    				<li>
			    					<button class="seatn-disable" id="spp-<?php echo "24" ;?>" onclick="seatp(this)" 
			    					value="<?php echo $seatnoarr[24];?>"><?php echo $seatnoarr[24];?></button>
			    					<label for="sp-<?php echo "24" ;?>"><img src="images/seater1.png"></label>   
			    				</li> <?php
			    			}
			    			else{ ?>
			    				<li>
			    					<button class="seatB" disabled></button>
			    					<label><img src="images/blackseat.png" class="blackseat"></label>   
			    				</li> <?php
			    			} ?>
			    		</ul>
			    		<ul>
			    			<?php for($i=25;$i<37;$i++){
			    				if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    					<li>
			    						<button class="seatn-disable" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/seater1.png"></label>   
			    					</li> <?php
			    				}
			    				else{ ?>
			    					<li>
			    						<button class="seatB" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>" disabled></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/blackseat.png" class="blackseat"></label>   
			    					</li> <?php
			    				}
			    			}?>
			    		</ul>
			    		<ul>
			    			<?php for($i=37;$i<49;$i++) {
			    				if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    					<li>
			    						<button class="seatn-disable" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/seater1.png"></label>   
			    					</li> <?php
			    				}
			    				else{ ?>
			    					<li>
			    						<button class="seatB" id="spp-<?php echo $i ;?>" onclick="seatp(this)" 
			    						value="<?php echo $seatnoarr[$i];?>" disabled></button>
			    						<label for="sp-<?php echo $i ;?>"><img src="images/blackseat.png" class="blackseat">
			    						</label>   
			    					</li> <?php
			    				}
			    			}?>
			    		</ul>
			    	</div><?php
			    }
			    else{ ?>
			    	<div class="sleeper">
			    		<span><h2>Click on an Available seat to proceed with your transaction.</h2></span>
			    		<div class="col-lg-12 upper-d">
			    			<hr style="transform: translate(90px,172px) rotate(90deg);"  width="42%" color="grey">
			    		    <hr style="transform: translate(132px,155px) rotate(90deg);" width="42%" color="grey">
			    			<span><h1>Upper-Deck</h1></span>
			    			<ul>
			    				<?php for ($i=0 ; $i < 6 ; $i++ ) { 
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    			<ul>
			    				<?php for ($i=6 ; $i < 12 ; $i++ ) { 
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    			<br>
			    			<ul>
			    				<?php for ($i=12 ; $i < 18 ; $i++ ) { 
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    		</div>
			    		<div class="col-lg-12 lower-d">
			    			<hr style="transform: translate(90px,202px) rotate(90deg);"  width="42%" color="grey">
			    		    <hr style="transform: translate(132px,185px) rotate(90deg);" width="42%" color="grey">
			    			<img src="images/s.png" id="wheel-img">
			    			<span><h1>Lower-Deck</h1></span>
			    			<ul>
			    				<?php for ($i=18 ; $i < 24 ; $i++ ) {
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    			<ul>
			    				<?php for ($i=24 ; $i < 30 ; $i++ ) { 
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    			<br>
			    			<ul>
			    				<?php for ($i=30 ; $i < 36 ; $i++ ) {
			    					if (strlen(array_search($seatnoarr[$i],$seatbookarray)) < "1") { ?>
			    						<li>  
			    							<button class="seatsl-disable" id="spp-<?php echo $i ;?>" onclick="seatsl(this)" 
			    							value="<?php echo $seatnoarr[$i];?>"><?php echo $seatnoarr[$i];?></button>
			    							<label for="sp-<?php echo $i ;?>"><img src="images/sleeper.png"></label> 
			    						</li> <?php
			    					}
			    				    else{ ?>
                                        <li>
			    					        <button class="seatB" disabled></button>
			    					        <label><img src="images/Sblack.png" class="Sblack"></label>   
			    				        </li> <?php
                                    }
			    				}?>
			    			</ul>
			    		</div>
			    	</div>
			    	<?php
			    } ?>
			</div>
		</div>
		<div class="points-sec  col-md-6 col-lg-6" id="dbpoints">
			<div class="seat-legend">
				<div class="row sec-1">
					<h2>Seat Legend</h2>
				</div>
				<div class="row sec-2">
					<div class="available d-flex col-lg-6">
						<div class="ava"></div>
						<h3>Available</h3>
					</div>
					<div class="unavailable d-flex col-lg-6">
						<div class="unava"></div>
						<h3>Unavailable</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>