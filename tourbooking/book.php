<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bus Website-book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<section class="book-now">
  <div class="container" id="book-cont">
     <div class="book-search">
        <!--div class="book-img  col-12  col-md-4">
           <img src="images\s-bus.png" alt="bus-img">
        </div-->
        <div class="form-bg col-12">
         <div class="book-form">
           <form method="post" action="book1.php" class="was-validated"> 
             <div class="form-group py-2">
               <input type="search" class="form-control form_data" id="source" value="" placeholder="Source" name="source" required>
               <div class="invalid-feedback"></div>
             </div>
             <div class="interchange py-2">
                <button type="button" onclick="exchange()" class="btn btn-primary" id="inter-c"><i class="fas fa-exchange-alt"></i></button>
             </div>
             <div class="form-group py-2">
                <input type="search" class="form-control form_data" id="dest" value="" placeholder="Destination" name="dest" required>
                <div class="invalid-feedback"></div>
             </div>
             <div class="form-group py-2">
               <div class="input-group">
                 <input type="date" class="form-control form_data" id="date"  value="" placeholder="select date" name="date" required>
                 <div class="invalid-feedback"></div>
               </div>
             </div>
             <div class="search-busses py-2">
               <button type="submit" class="btn btn-primary"  id="search-b">Search Busses</button>
             </div>
           </form>
         </div>
       </div> 
     </div>
   </div>
  </div>
</section>
<section class="trust">
  <div class="container">
   <div class="row py-5 col-12">
     <div class="about-mission col-12 col-md-6  py-3">
       <h3>Trusted by</h3>
     </div>
     <div class="about-trusted-info col-12 col-md-6  py-3">
       <p>
         <?php
           $id=3;
           include('includes/fetch.php');
           ?>
       </p>
     </div>
   </div>
  </div>
</secton>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/date.js"></script>
<script src="js/searchajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 