<?php

include 'config.php';
include 'header.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $doctor_name = trim($_POST['doctor_name']); 
    $password = trim($_POST['password']); 

    // Check if inputs are not empty
    if (!empty($doctor_name) && !empty($password)) {
        // Query the doctor_details table
        $sql = "SELECT * FROM doctor_details WHERE doctor_name = '$doctor_name'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $doctor = $result->fetch_assoc();

            // Compare password
            if ($password === $doctor['doctor_password']) {
                
                $_SESSION['doctor_id'] = $doctor['doctor_id'];
                $_SESSION['doctor_name'] = $doctor['doctor_name'];

                
                header("Location: doctor_dashboard.php");
                exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Doctor not found.";
        }
    } else {
        $error = "Doctor Name and Password cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 5vh;
        }

        .login-container {
            max-width: 900px;
            margin: 50px auto;
            height: 70vh;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .illustration {
            background-color: #4a90e2;
            color: white;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .illustration img {
            width: 100%;
        }
        .form-container {
            flex: 1;
            background-color: white;
            padding: 40px;
        }
        .form-container h2 {
            margin-bottom: 30px;
            color: #4a90e2;
        }
        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }
    </style>
</head>
<body>
  
   

    <div class="login-container">
        
        <div class="illustration">
            <img src="d_l.jpg" alt="Illustration">
        </div>

        
        <div class="form-container">
            <h2>Doctor Login</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="doctor_name" class="form-label">Doctor Name</label>
                    <input type="text" name="doctor_name" id="doctor_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; <?= date('Y') ?> Clinic Management. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
