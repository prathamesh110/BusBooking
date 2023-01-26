<?php
include 'includes/connection.php';
$search_source=$_POST['source'];
$search_dest=$_POST['dest'];
$search_date=$_POST['date'];
$sql = 'SELECT * FROM businfo WHERE departure = ? AND arrival = ? AND departure_date = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search_source , $search_dest , $search_date]);
$businfos = $stmt->fetchAll();
date_default_timezone_set("Asia/Calcutta");
if(count($businfos) > "0"){  
?>
    <div class="res-bg py-4">
        <?php
            foreach ($businfos as $businfo){
                $c_date = date('Y-m-d');
                $c_time = time();
                $d_time = strtotime($businfo->departure_time);
                $d_date = strtotime($businfo->departure_date);
                if($y_store = $d_time > $c_time ||  $search_date > $c_date){
                    $y_time[] = $y_store;?>
                    <div class="businfo-res py-4 px-4 col-12" id="businfo-seats">
                        <div class="bus row py-2 px-4 col-lg-3">
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h3>'.$businfo->bus_name.'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h1>'.$businfo->bus_type2.'</h1>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h1>'.$businfo->bus_type1.'</h1>';
                                ?>
                            </div>  
                        </div>
                        <div class="departure row py-2 px-4 col-lg-3">
                            <div class="row col-lg-12">
                                <?php

                                    $date = strtotime($businfo->departure_time);
                                    $date = date('h:ia' , $date);
                                    echo '<h3>'.$date.'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    $date = strtotime($businfo->departure_date);
                                    $date = date('d-m' , $date);
                                    echo '<h3>'.$date.'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h1>'.$businfo->departure.'</h1>';
                                ?>
                            </div>
                        </div>
                        <div class="arrival row py-2 px-4 col-lg-3">
                            <div class="row col-lg-12">
                                <?php
                                    $date = strtotime($businfo->arrival_time);
                                    $date = date('h:ia' , $date);
                                    echo '<h3>'.$date.'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    $date = strtotime($businfo->arrival_date);
                                    $date = date('d-m' , $date);
                                    echo '<h3>'.$date.'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h1>'.$businfo->arrival.'</h1>';   
                                ?>
                            </div>
                        </div>
                        <div class="price row py-2 px-4 col-lg-3">
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h3>'."Starts From".'</h3>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <?php
                                    echo '<h1>'."INR" .$businfo->fare.'</h1>';
                                ?>
                            </div>
                            <div class="row col-lg-12">
                                <button type="button" class="btn btn-primary" id="view-seats">
                                    <a href="seats.php">View Seats</a>
                                </button>
                            </div>
                        </div>
                    </div> <?php
                }
                else{
                    if (count($businfos) == "1") {
                        echo '<h3>'."No Result Found".'</h3>'; 
                     }
                    elseif (count($businfos) > "1") {
                         if ($n_store = $d_time < $c_time) {
                            $n_time[] = $n_store;
                            

                                
                            

                        }
                    } 
                    
                }
            }
            ?>
        </div>
    <?php
}
else{
    echo '<h3>'."No Result Found".'</h3>';
}
?>