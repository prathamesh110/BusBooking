
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bus Website-book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<?php include('includes/header.php');?>
<section class="full-sec">
  <div class="container-fluid">
   <div class="row">
     <!--div class="sec-filter col-12   col-md-2 col-lg-2">
        <div class="filter-bg">


        </div>
     </div-->
     <div class="sec-search  col-12  col-md-12 col-lg-12">
       <form method="post" action="book1.php" class="was-validated form_data" id="frmsearch">
         <div class="top-search-bg">
           <div class="form-search">
              <div class="form-group  px-2 ">
                 <input type="search" class="form-control form_data" id="source" value="<?php echo $_POST['source'];?>" placeholder="Source" name="source" required>
                 <div class="invalid-feedback"></div>
              </div>
              <div class="interchange-search px-2">
                <button type="button" onclick="exchange()" class="btn btn-primary" id="inter-c"><i class="fas fa-exchange-alt"></i></button>
              </div>
              <div class="form-group  px-2 ">
                <input type="search" class="form-control form_data" id="dest" value="<?=$_POST['dest']?>" placeholder="Destination" name="dest" required>
                <div class="invalid-feedback"></div>
              </div>
              <div class="form-group  px-2">
                <div class="input-group">
                  <input type="date" class="form-control form_data" id="date"  value="<?=$_POST['date']?>" placeholder="select date" name="date" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="search-busses  px-2">
                <button type="button" class="btn btn-primary" onclick="loadDoc()" id="search-b">Search Busses</button>
              </div>
            </div>
          </div>
        </form>
        <div class="res-search-bg">
          <div class="bus-res" id="bus-res">
            <?php include('includes/bus_res1.php');?>
          </div>
        </div>
     </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/date.js"></script>
<script src="js/searchajax.js"></script>
<script src="js/seatsres.js"></script>
<script src="js/seatarrang.js"></script>
<script src="js/dbvalidateajax.js"></script>
<script src="js/sucessajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>