while ($row =$businfos->fetch_assoc()) {?>
				<div class="businfo-res py-4 px-4 col-12" id="businfo-seats">
					<div class="bus row py-2 px-4 col-lg-3">
						<div class="row col-lg-12">
							<h3><?php echo $row['bus_name'];?></h3>
						</div>
						<div class="row col-lg-12">
							<h1><?php echo  $row['bus_type2'] ;?></h1>
						</div>
						<div class="row col-lg-12">
							<h1><?php echo  $row['bus_type1'] ;?></h1>
						</div>  
					</div>
					<div class="departure row py-2 px-4 col-lg-3">
						<div class="row col-lg-12">
							<h3><?php
							$date = strtotime($row['departure_time']);
							$date = date('h:ia' , $date);
							echo $date;
							?></h3>
						</div>
						<div class="row col-lg-12">
						    <h3><?php
							$date = strtotime($row['departure_date']);
							$date = date('d-m' , $date);
							echo $date;
							?></h3>
						</div>
						<div class="row col-lg-12">
							<h1><?php echo $row['departure'];?></h1>
						</div>
					</div>
					<div class="arrival row py-2 px-4 col-lg-3">
						<div class="row col-lg-12">
							<h3><?php
							$date = strtotime($row['arrival_time']);
							$date = date('h:ia' , $date);
							echo $date;
							?></h3>
						</div>
						<div class="row col-lg-12">
							<h3><?php
							$date = strtotime($row['arrival_date']);
							$date = date('d-m' , $date);
							echo $date;
							?></h3>
						</div>
						<div class="row col-lg-12">
							<h1><?php
							echo $row['arrival'];   
							?></h1>
						</div>
					</div>
					<div class="price row py-2 px-4 col-lg-3">
						<div class="row col-lg-12">
							<h3><?php
							echo "Starts From";
							?></h3>
						</div>
						<div class="row col-lg-12">
							<h1><?php
							echo "INR" .$row['fare'];
							?></h1>
						</div>
						<div class="row col-lg-12">
							<button type="button" class="btn btn-primary" id="view-seats">
								<a href="seats.php">View Seats</a>
							</button>
						</div>
					</div>
				</div>