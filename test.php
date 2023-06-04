<div class="details">
      <div class="tutor">
         <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
         <h3><?= $fetch_tutor['name']; ?></h3>
         <span><?= $fetch_tutor['profession']; ?></span>
      </div>
      <div class="flex">
         <p>Course Catogory : <span><?= $total_playlists; ?></span></p>
         <p>Total Courses : <span><?= $total_contents; ?></span></p>
         <p>Total likes : <span><?= $total_likes; ?></span></p>
      </div>
      <section class="about">
   </div>
<section style="margin-top: 10px; padding: 5px; background: #222222;">

   <div style="display: flex; flex-wrap: wrap; margin: 20px;">
      <div style="flex-grow: 3;">
         <div style="padding: 10px;">
            <h2 style="font-size: 18px; color: #8942a7;"> <i class="fas fa-envelope"></i> Email</h2>
            <a href="about" style="font-size: 15px; color: #fff;"> <?php echo $fetch_tutor['email']; ?> </a>
            <h2 style="font-size: 18px; color: #8942a7;"> <i class="fas fa-phone"></i> Contact</h2>
            <a href="about" style="font-size: 15px; color: #fff;"> <?php echo $fetch_tutor['contact']; ?> </a>
            <h2 style="font-size: 18px; color: #8942a7;"> <i class="fas fa-map-marker-alt"></i> Location</h2>
            <a href="tel:1112223333" style="font-size: 15px; color: #fff;"> <?php echo $fetch_tutor['address']; ?> </a>
         </div>
      </div>
      <div style="flex-grow: 8;">
         <div style="padding: 10px;">
            <h2 style="font-size: 18px; color: #8942a7;"> <i class="fas fa-book"></i> About</h2>
            <a href="about"><p style="font-size: 15px; color: #fff;">
               <?php echo $fetch_tutor['details']; ?>
            <p></a>
         </div>
      </div>
   </div>

</section>



<!-- teachers profile section ends -->

<section class="courses">

   <h1 class="heading">latest courese</h1>

   <div class="box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? AND status = ?");
         $select_courses->execute([$tutor_id, 'active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box">
         <div class="tutor">
            <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_course['title']; ?></h3>
         <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">view Courses</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">No courses added yet!</p>';
      }
      ?>

   </div>
