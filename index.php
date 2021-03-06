<?php

$db_name = 'mysql:host=localhost;dbname=course_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $courses, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact_form`(name, number, email, courses, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Course</title>
    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="stylesheet.css" />
  </head>
  <body>

  <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <!-- Header Section Start -->
    <header class="header">
      <section class="flex">
        <a href="#home" class="logo">Edu.Io</a>
        <nav class="navbar">
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#courses">Courses</a>
          <a href="#teachers">Teachers</a>
          <a href="#reviews">Review</a>
          <a href="#contact">Contact</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
      </section>
    </header>
    <!-- Header Section End -->

    <!-- Home Section Start -->
    <section class="home" id="home">
      <div class="row">
        <div class="content">
          <h3>Online <span>education</span></h3>
          <a href="#contact" class="btn">contact us</a>
        </div>
        <div class="image">
          <img src="Image/home.svg" alt="" />
        </div>
      </div>
    </section>
    <!-- Home Section End -->

    <!-- Counter Section Start -->
    <section class="count">
      <div class="box-container">
        <div class="box">
          <i class="fas fa-graduation-cap"></i>
          <div class="content">
            <h3>200+</h3>
            <p>courses</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-user-graduate"></i>
          <div class="content">
            <h3>3000+</h3>
            <p>student</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-chalkboard-user"></i>
          <div class="content">
            <h3>100+</h3>
            <p>teachers</p>
          </div>
        </div>

        <div class="box">
          <i class="fas fa-face-smile"></i>
          <div class="content">
            <h3>99%</h3>
            <p>satisfaction</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter Section End -->

    <!-- About Section Start -->
    <section class="about" id="about">
      <div class="row">
        <div class="image">
          <img src="Image/about.svg" alt="" />
        </div>

        <div class="content">
          <h3>why choose us?</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus autem, maiores officiis officia suscipit dolorem sapiente modi pariatur.</p>
          <a href="#contact" class="btn">contact us</a>
        </div>
      </div>
    </section>
    <!-- About Section End -->

    <!-- Courses Section Start -->
    <section class="courses" id="courses">
      <h1 class="heading">our <span>courses</span></h1>

      <div class="swiper course-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="Image/course1.svg" alt="" />
            <h3>web developer</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/course2.svg" alt="" />
            <h3>cyber security</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/course3.svg" alt="" />
            <h3>graphic design</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/course4.svg" alt="" />
            <h3>database</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/course5.svg" alt="" />
            <h3>DevOps</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/course6.svg" alt="" />
            <h3>mobile developer</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- Courses Section End -->

    <!-- Teachers Section Start -->
    <section class="teachers" id="teachers">
      <h1 class="heading">expert <span>tutors</span></h1>

      <div class="swiper teachers-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="Image/profil-1.JPG" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="https://www.instagram.com/syahril.syaa/" class="fab fa-instagram"></a>
              <a href="https://www.linkedin.com/in/msyahrilsyahbani" class="fab fa-linkedin"></a>
            </div>
            <h3>muhammad syahril Syahbani</h3>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/profil-2.jpg" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>kim ji soo</h3>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/profil-3.JPG" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>jung eun bi</h3>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/profil-4.JPG" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>bae jin young</h3>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/profil-5.JPG" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>choi arin</h3>
          </div>

          <div class="swiper-slide slide">
            <img src="Image/profil-6.JPG" alt="" />
            <div class="share">
              <a href="#" class="fab fa-facebook-f"></a>
              <a href="#" class="fab fa-twitter"></a>
              <a href="#" class="fab fa-instagram"></a>
              <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>jung yerin</h3>
          </div>
        </div>

        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- Teachers Section End -->

    <!-- Review Section Start -->
    <section class="reviews" id="reviews">
      <h1 class="heading">students <span>reviews</span></h1>

      <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-1.jpg" alt="" />
              <div class="user-info">
                <h3>hwang eun bi</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-2.jpg" alt="" />
              <div class="user-info">
                <h3>kim ye won</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-3.jpg" alt="" />
              <div class="user-info">
                <h3>yuju</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-4.jpg" alt="" />
              <div class="user-info">
                <h3>martin garrix</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-5.jpg" alt="" />
              <div class="user-info">
                <h3>kim so jeong</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide slide">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum necessitatibus atque fuga delectus numquam consequatur velit autem distinctio possimus culpa!</p>
            <div class="user">
              <img src="Image/user-6.jpg" alt="" />
              <div class="user-info">
                <h3>bruno fernandes</h3>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- Review Section End -->

    <!-- Contact Section Start -->
    <section class="contact" id="contact">
      <h1 class="heading"><span>contact</span> us</h1>

      <div class="row">
        <div class="image">
          <img src="Image/contact.svg" alt="" />
        </div>

        <form action="" method="post">
          <span>your name</span>
          <input type="text" required placeholder="enter your full name" maxlength="50" name="name" class="box" />
          <span>your number</span>
          <input type="number" required placeholder="enter your valid number" name="number" class="box" onkeypress="if(this.value.length == 12) return false;" />
          <span>your email</span>
          <input type="email" required placeholder="enter your valie email" maxlength="50" name="email" class="box" />
          <span>select course</span>
          <select name="courses" class="box" required>
            <option value="" disabled selected>select the course --</option>
            <option value="web developer">web developer</option>
            <option value="cyber security">cyber security</option>
            <option value="database">database</option>
            <option value="devops">devOps</option>
            <option value="networking">computer networking</option>
            <option value="uiux">UI/UX</option>
            <option value="mobile developer">mobile developer</option>
            <option value="data analysis">data analysis</option>
            <option value="artificial intelligence">artificial intelligence</option>
          </select>
          <span>select gender</span>
          <div class="radio">
            <input type="radio" name="gender" value="male" id="male" />
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female" />
            <label for="female">female</label>
          </div>
          <input type="submit" value="send message" class="btn" name="send" />
        </form>
      </div>
    </section>
    <!-- Contact Section End -->

    <!-- footer section start  -->
    <footer class="footer">
      <section>
        <div class="share">
          <a href="#" class="fab fa-facebook-f"></a>
          <a href="#" class="fab fa-twitter"></a>
          <a href="#" class="fab fa-linkedin"></a>
          <a href="#" class="fab fa-instagram"></a>
          <a href="#" class="fab fa-youtube"></a>
        </div>
        <div class="credit">&copy; copyright @ 2022 by <span>Muhammad Syahril Syahbani</span> | all rights reserved!</div>
      </section>
    </footer>
    <!-- footer section end -->

    <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="javascript.js"></script>
  </body>
</html>
