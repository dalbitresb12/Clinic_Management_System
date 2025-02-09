<?php
include 'config.php';


session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];

class AdminDashboard {
    public $conn;
    public $adminId;
    public $adminName;

    public function __construct($dbConnection, $admin_id) {
        $this->conn = $dbConnection;
        $this->adminId = $admin_id;
    }

    public function fetchAdminName() {
        $sql = "SELECT admin_name FROM admin_details WHERE admin_id = $this->adminId";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->adminName = $row['admin_name'];
        } else {
            $this->adminName = 'Admin'; // Default fallback
        }
    }

    public function getAdminName() {
        return htmlspecialchars($this->adminName);
    }

    public function showDashboard() {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
             margin-top: 12vh;
        }

        .card {
            margin: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
          
        }

        .row {
            justify-content: center;
        }
    </style>
</head>

<nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-white ms-2">Admin Dashboard</a>
    <form class="form-inline d-flex me-3">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" style="color: white;">Search</button>
</form>

</nav>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Welcome, <?= $this->getAdminName() ?></h1>
        <p class="text-center text-muted">Administrator</p>

        <div class="row text-center mt-4">
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Doctors</h5>
                        <p class="card-text">Check the list of registered doctors.</p>
                        <a href="admin_view_doctor.php" class="btn btn-primary">View Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add Doctors</h5>
                        <p class="card-text">Add new doctors to the system.</p>
                        <a href="add_doctor.php" class="btn btn-success">Add Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Patients</h5>
                        <p class="card-text">Manage all appointments and patients.</p>
                        <a href="admin_view_patients.php" class="btn btn-warning">View Patients</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Appointments</h5>
                        <p class="card-text">Check the list of all appointments.</p>
                        <a href="admin_view_appointments.php" class="btn btn-info">View Appointments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Remove Appointments</h5>
                        <p class="card-text">Remove canceled or outdated appointments.</p>
                        <a href="admin_remove_cancel_appointment.php" class="btn btn-danger" style="background-color: #064247; border-color: #064247;">Remove Appointments</a>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Generate Bill</h5>
                        <p class="card-text">Generate bills for patients.</p>
                        <a href="generate_bill.php" class="btn btn-primary" style="background-color: #0EB09D; border-color: #0EB09D;">Generate Bill</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col text-center">
                <a href="admin_logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Clinic Management. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    }
}

$dashboard = new AdminDashboard($conn, $admin_id);
$dashboard->fetchAdminName();
$dashboard->showDashboard();
?>
