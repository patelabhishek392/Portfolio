<?php
include "config.php";

session_start();
session_destroy();
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="assest/c9n9redg.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- google font link -->

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Josefin+Sans&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assest/index.css">

    <title>Abhishek Patel</title>

</head>



<body>

    <header>

        <a href="index"><img src="assest/c9n9redg.png" class="nav-logo " alt="logo"></a>

        <nav class="nav-baaar">

            <a href="#skill">Skills</a>

            <a href="#Portfolio">Portfolio</a>
            <!-- 
            <a href="login">Admin Login</a>
            
> -->

            <!-- 
            <a href="blog.html">Blog</a> -->









        </nav>
        <?php
            $query = "SELECT * FROM Resume ORDER BY Resume_id DESC LIMIT 1 ";
            $query_run = mysqli_query($mysqli, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            

                $row = mysqli_fetch_array($query_run)

                    ?>
        <a class="cv" href="<?php echo $row['Resume_name']; ?>" download class="button">Download CV</a>

    </header>



    <section id="home">


    <?php
            $query ="SELECT * FROM About ORDER BY Developer_id DESC LIMIT 1";
            $query_run = mysqli_query($mysqli, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            

                $row = mysqli_fetch_array($query_run)

                    ?>



        <div class="profile">

            <img src="Uploads/About/<?php echo $row['Developer_image']; ?>" alt="profile picture">

        </div>

        <div class="detail">

            <div class="dts">

                <H3>Hello, It's Me</H3>

                <h1> <?php echo $row['Developer_name']; ?></h1>

                <h3>And I'm a <span class="multitext"></span> </h3>



                <script>

                    // Initialize Typed.js for the ".multitext" element

                    var typed = new Typed(".multitext", {

                        strings: ["Full Stack Developer", "Frontend Developer", "Web App Developer"],

                        typeSpeed: 100,

                        backSpeed: 100,

                        backDelay: 1000,

                        loop: true

                    });

                </script>













            </div>

            <p>  <?php echo $row['Developer_description']; ?></p>



            <div class="social">

                <a href=" <?php echo $row['LinkedIn_URL']; ?>"><i class="fa-brands fa-linkedin-in"></i></a>

                <a href=" <?php echo $row['GitHub_URL']; ?>"><i class="fa-brands fa-github"></i></a>

                <a href=" <?php echo $row['Facebook_URL']; ?>"><i
                        class="fa-brands fa-facebook-f"></i></a>

                <a href=" <?php echo $row['Instagram_URL']; ?>"><i
                        class="fa-brands fa-instagram"></i></a>







            </div>

            <a class="cv1" href="<?php echo $row['Resume_name']; ?>" download class="button">Download CV</a>

        </div>


    </section>





    <section id="skill">

        <div class="h1">

            <h1> Skills</h1>

        </div>


        <div class="skills">


            <?php
            $query = "SELECT * FROM Skill ";
            $query_run = mysqli_query($mysqli, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            if ($check_category) {

                while ($row = mysqli_fetch_array($query_run)) {

                    ?>



                    <div class="skillimg">
                        <i class="fa-brands  "><img src="<?php echo $row['Skill_image']; ?>"></i>
                        <span id="skillname">
                            <?php echo $row['Skill_name']; ?>
                        </span>
                    </div>




                    <?php
                }
            } else {
                echo ("<script LANGUAGE='JavaScript'>
        window.alert('NO Records Found');
        </script>");
            }

            ?>
        </div>



    </section>











    <section id="Portfolio">



        <div class="portfolioname">

            <h1>Portfolio</h1>

            <h4>Projects Developed by Me.</h4>

        </div>



        <div class="pborder">




            <?php
            $query = "SELECT * FROM Project ";
            $query_run = mysqli_query($mysqli, $query);
            $check_category = mysqli_num_rows($query_run) > 0;

            if ($check_category) {

                while ($row = mysqli_fetch_array($query_run)) {

                    ?>




                    <div class="project">

                        <div class="pimgs">

                            <img src="<?php echo $row['Project_image']; ?>" alt=""
                                class="fullscreen-clickable">

                            <!-- <video src="assest/E1_DeciceVideo1.mp4" controls></video> -->



                        </div>

                        <div class="pdetal">

                            <div class="h1">

                                <h1>
                                    <?php echo $row['Project_name']; ?>
                                </h1>

                            </div>

                            <div class="h3">

                                <h3>
                                    <?php echo $row['Project_sub']; ?>
                                </h3>

                            </div>

                            <div class="p">

                                <p>
                                    <?php echo $row['Project_descript']; ?>
                                </p>
                            </div>

                            <div class="atag">

                                <a href="<?php echo $row['Project_link']; ?>"><i
                                        class="<?php echo $row['Project_fontaowsome']; ?>"></i>&nbsp;Visit
                                    Site</a>
                            </div>

                        </div>



                    </div>


                    <?php
                }
            } else {
                echo ("<script LANGUAGE='JavaScript'>
        window.alert('NO Records Found');
        </script>");
            }

            ?>







        </div>

    </section>






    <!-- Full-screen image container -->
    <div id="fullscreen-image">
        <img id="fullscreen-img" src="" alt="Full-Screen Image">
    </div>

    <script>
        // Get all elements with the class "fullscreen-clickable"
        const clickableImages = document.querySelectorAll('.fullscreen-clickable');
        const fullscreenImage = document.getElementById('fullscreen-image');
        const fullscreenImg = document.getElementById('fullscreen-img');

        // Add click event listener to each image
        clickableImages.forEach((img) => {
            img.addEventListener('click', () => {
                // Set the source of the full-screen image
                fullscreenImg.src = img.src;
                // Show the full-screen image container
                fullscreenImage.style.display = 'block';
            });
        });

        // Close the full-screen image when clicking outside of it
        fullscreenImage.addEventListener('click', () => {
            fullscreenImage.style.display = 'none';
        });
    </script>














    <!-- <section class="education">
    <div class="h1">
        <h1>Education</h1>
    </div>

    <div class="edu">
    <div class="left">
        <span><i class="fa-regular fa-circle"></i></span>
    </div>
    <div class="right"></div>
    <h3></h3>
</div>
</section> -->




</body>

<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

<script src="https://kit.fontawesome.com/1da6933370.js" crossorigin="anonymous"></script>



</html>