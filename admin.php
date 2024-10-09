<?php
include "config.php";

session_start();

    $userRole = $_SESSION['user']['user_role'];
    
    if ($userRole != 'admin') {
        header('Location: login.php');
        
        
    }
        

      


// Function to handle file uploads
function handleFileUpload($fieldName, $uploadPath)
{
    $fileName = $_FILES[$fieldName]['name'];
    $tmpFileName = $_FILES[$fieldName]['tmp_name'];

    if (!empty($fileName)) {
        $targetPath = $uploadPath . basename($fileName);

        if (move_uploaded_file($tmpFileName, $targetPath)) {
            return $targetPath;
        }
    }

    return null;
}

if (isset($_POST['skilladd'])) {
    $skillName = $_POST['skillName'];

    // Handle file upload
    $skillImage = handleFileUpload('skillImage', 'Uploads/Skill/');

    if ($skillImage !== null) {
        $query = "INSERT INTO `Skill` (`Skill_name`, `Skill_image`) VALUES ('$skillName', '$skillImage')";

        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "Skill added successfully!";
            $mysqli->close();

        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}

if (isset($_POST['Projectadd'])) {
   $projectName = mysqli_real_escape_string($mysqli, $_POST['projectName']);
$projectsub = mysqli_real_escape_string($mysqli, $_POST['projectsub']);
$projectDescription = mysqli_real_escape_string($mysqli, $_POST['projectDescription']);
$projectLink = mysqli_real_escape_string($mysqli, $_POST['projectLink']);
$fontawsome = mysqli_real_escape_string($mysqli, $_POST['fontawsome']);


    // Handle file upload
    $projectImage = handleFileUpload('projectImage', 'Uploads/Project/');

    if ($projectImage !== null) {
        $query = "INSERT INTO `Project` (`Project_image`, `Project_name`, `Project_sub`, `Project_descript`, `Project_link`, `Project_fontaowsome`) VALUES ('$projectImage', '$projectName', '$projectsub', '$projectDescription', '$projectLink', '$fontawsome')";

        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "Project added successfully!";
            $mysqli->close();
        } else {
    error_log("Error adding project: " . mysqli_error($mysqli));
    echo "Error adding project. Please try again later.";
}

    }
}

if (isset($_POST['aboutUpdate'])) {
    $developerName = $_POST['developerName'];
    $developerDescription = $_POST['developerDescription'];
    $linkedinURL = $_POST['linkedinURL'];
    $githubURL = $_POST['githubURL'];
    $facebookURL = $_POST['facebookURL'];
    $instagramURL = $_POST['instagramURL'];

    // Handle file upload
    $developerImage = handleFileUpload('developerImage', 'Uploads/About/');

    if ($developerImage !== null) {
        $query = "INSERT INTO `About` (`Developer_image`, `Developer_name`, `Developer_description`, `LinkedIn_URL`, `GitHub_URL`, `Facebook_URL`, `Instagram_URL`) 
                  VALUES ('$developerImage', '$developerName', '$developerDescription', '$linkedinURL', '$githubURL', '$facebookURL', '$instagramURL')";

        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "About section inserted successfully!";
            $mysqli->close();
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}


if (isset($_POST['updatecv'])) {
    // Handle file upload for the resume
    $resume = handleFileUpload('REsume', 'Uploads/Resumes/');

    if ($resume !== null) {
        $query = "INSERT INTO `Resume` (`Resume_name`) VALUES ('$resume')";

        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "Resume uploaded successfully!";
            $mysqli->close();
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}
?>

<!-- Rest of your HTML code remains the same -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assest/c9n9redg.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assest/index.css">
    <link rel="stylesheet" href="assest/admin.css">
    <title>Admin - Abhishek Patel Portfolio</title>
</head>

<body>
    <header>
        <a href="
        index.php"><img src="assest/c9n9redg.png" class="nav-logo" alt="logo"></a>
        <nav class="nav-baaar">
            <a href="#addSkills">Skill</a>

            <a href="#addProjects">Projects</a>
            <a href="#updateAbout">About</a>

        </nav>
        <a class="cv" href="assest/Abhishek_CV.pdf" download class="button">Download CV</a>
    </header>









    <!-- Add New Skills Section -->
    <section id="addSkills">
        <h1>Add New Skill</h1>
        <div class="add-skill-form">
            <form method="POST" enctype="multipart/form-data">
                <div class="img">
                    <img id="imagePreview1" src="" alt="Image Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="skillImage">Skill Image:</label>
                    <input type="file" id="skillImage" name="skillImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="skillName">Skill Name:</label>
                    <input type="text" id="skillName" name="skillName" placeholder="Enter the skill name" required>
                </div>
                <button type="submit" name="skilladd">Add Skill</button>
            </form>
        </div>
    </section>

    <!-- Add New Projects Section -->



    <section id="addProjects">
        <h1>Add New Project</h1>
        <div class="add-skill-form">
            <form method="POST" enctype="multipart/form-data">
                <div class="img">
                    <img id="imagePreview2" src="" alt="Image Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="projectImage">Project Image:</label>
                    <input type="file" id="projectImage" name="projectImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="projectName">Project Name:</label>
                    <input type="text" id="projectName" name="projectName" placeholder="Enter the project name"
                        required>
                </div>
                <div class="form-group">
                    <label for="projectsub">Project Subheading</label>
                    <textarea id="projectsub" name="projectsub" placeholder="Enter Project Heading" required></textarea>
                </div>
                <div class="form-group">
                    <label for="projectDescription">Project Description</label>
                    <textarea id="projectDescription" name="projectDescription" placeholder="Enter project description"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="projectLink">Project Link:</label>
                    <input type="text" id="projectLink" name="projectLink" placeholder="Enter project link" required>
                </div>
                <div class="form-group">
                    <label for="fontawsome">fontawesome icon name</label>
                    <input type="text" id="fontawsome" name="fontawsome" placeholder="Enter fontawesome icon name"
                        required>
                </div>
                <button type="submit" name="Projectadd">Add Project</button>
            </form>
        </div>
    </section>















    <!-- Update About Section -->
    <section id="updateAbout">
        <h1>Add or Update About Section</h1>
        <div class="add-skill-form">
            <form method="POST" enctype="multipart/form-data">
                <div class="img">
                    <img id="imagePreview3" src="" alt="Image Preview" style="max-width: 100%; max-height: 200px;">
                </div>
                <div class="form-group">
                    <label for="developerImage">Developer Image:</label>
                    <input type="file" id="developerImage" name="developerImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="developerName">Developer Name:</label>
                    <input type="text" id="developerName" name="developerName" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="developerDescription">Developer Description:</label>
                    <textarea id="developerDescription" name="developerDescription"
                        placeholder="Enter developer description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="linkedinURL">LinkedIn URL:</label>
                    <input type="text" id="linkedinURL" name="linkedinURL" placeholder="Enter LinkedIn URL" required>
                </div>
                <div class="form-group">
                    <label for="githubURL">GitHub URL:</label>
                    <input type="text" id="githubURL" name="githubURL" placeholder="Enter GitHub URL" required>
                </div>
                <div class="form-group">
                    <label for="facebookURL">Facebook URL:</label>
                    <input type="text" id="facebookURL" name="facebookURL" placeholder="Enter Facebook URL" required>
                </div>
                <div class="form-group">
                    <label for="instagramURL">Instagram URL:</label>
                    <input type="text" id="instagramURL" name="instagramURL" placeholder="Enter Instagram URL" required>
                </div>
                <button type="submit" name="aboutUpdate">Add/Update About</button>
            </form>
        </div>
    </section>







    <section>
        <h1>Add or Update About Section</h1>
        <div class="add-skill-form">





            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Upload Resume</label>
                    <input type="file" name="REsume" accept="pdf/*" required>
                </div>
                <button type="submit" name="updatecv">UPDATE RESUME</button>
            </form>
        </div>

    </section>






    <!-- Existing content can follow here -->

    <script>
        // Existing JavaScript code can go here
    </script>

    <script>
        function setupImagePreview(inputId, previewId) {
            const imageInput = document.getElementById(inputId);
            const imagePreview = document.getElementById(previewId);

            imageInput.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                }
            });
        }

        // Set up image previews for each set of input elements
        setupImagePreview('skillImage', 'imagePreview1');
        setupImagePreview('projectImage', 'imagePreview2');
        setupImagePreview('developerImage', 'imagePreview3');
    </script>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://kit.fontawesome.com/1da6933370.js" crossorigin="anonymous"></script>
    
  
</body>

</html>