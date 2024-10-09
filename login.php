<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assest/c9n9redg.png">
    <link rel="stylesheet" href="assest/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .container .card {
            background: #1f242d;
            color: white;
            border-radius: 30px;
            box-shadow: 0 0 18px #0ef;
            border-color: #0ef;
        }
    </style>
</head>

<body style="background: #1f242d; ">







<?php
session_start();






if (isset($_POST['login'])) {
    $userID = $_POST['userID'];
    $password = $_POST['password'];
    
    
    if($userID = 'Abhishek' | $password = '8758704414' )
    {
        
       // Assuming you have user information, and 'user_role' is 'admin'
$userInfo = [
    'username' => 'Abhishek',
    'user_id' => 108,
    'user_role' => 'admin'
];

// Set user information, including the role, in the session
$_SESSION['user'] = $userInfo; 

 header('Location: admin.php');
        
        
    }
}

?>

    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="userID" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="userID" name="userID" placeholder="Enter User ID">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>