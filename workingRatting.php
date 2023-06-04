<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
<div class="container">
    <div class="row">
<form action="add_rate.php" method="post">
<div class="card text-center">
  <div class="card-header">
    V1
  </div>
  
  <div class="card-body">
      <div class="row">
          <div class="col-md-12 text-center">

  <!--<li class="list-group-item">Building</li>-->
  <!--<li class="list-group-item">Faculty Member</li>-->
  <p>Quality Education <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p>
         
         <p>Faculty Member<div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p>
         
         <p>Quality Education <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p
         <p>Inerractive class room <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p>
         <p>Water/Toilet <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p>
         <p>Lab for study <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div></p>
   <!--<li class="list-group-item">Interractive Class Room</li>-->
   <!--<li>Water/Toilet   </li>-->
   <!--<li>Lab for Study  </li>-->

          </div>
<!--          <div class="col-md-6">-->
<!--              <ol class="">-->
<!--  <li class=""> </li>-->
<!--  <li class="">A list item</li>-->
<!--  <li class="">A list item</li>-->
<!--</ol>-->
<!--          </div>-->
      </div>
    <!--<h5 class="card-title">Special title treatment</h5>-->
    
    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
  </div>
  <div class="card-footer text-body-secondary">
    2 days ago
  </div>
</div>
    <div>
        <h3>Student Rating System</h3>
    </div>

    <div>
         <label>Name</label>
        <input type="text" name="name">
    </div>

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>

    <div><input type="submit" name="add"> </div>

</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>

</html>
<?php
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO ratee (name,rate) VALUES ('$name','$rating')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>