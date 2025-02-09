<?php
include 'config.php';

session_start();

if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctor_login.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

class DoctorDashboard {
    public $conn;
    public $doctorId;
    public $doctorData;

    public function __construct($dbConnection, $doctor_id) {
        $this->conn = $dbConnection;
        $this->doctorId = $doctor_id;
    }

    public function fetchDoctorDetails() {
        $sql = "SELECT * FROM doctor_details WHERE doctor_id = $this->doctorId";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $this->doctorData = $result->fetch_assoc();
        } else {
            die("Doctor not found.");
        }
    }

    public function getDoctorName() {
        return htmlspecialchars($this->doctorData['doctor_name']);
    }

    public function showDashboard() {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 14vh;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-white ms-2">Doctor Dashboard</a>
    <form class="form-inline d-flex me-3">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" style="color: white;">Search</button>
</form>

</nav>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome, Dr. <?= $this->getDoctorName() ?></h1>
        <p class="text-center text-muted">Manage Your Dashboard</p>

        <div class="mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>View Appointments</h4>
                            <p>Check your upcoming and past appointments.</p>
                            <a href="view_appointments.php" class="btn btn-primary">View Appointments</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>View Profile</h4>
                            <p>Check and review your personal details.</p>
                            <a href="view_doctor_profile.php" class="btn btn-success" >View Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>Update Profile</h4>
                            <p>Keep your information up-to-date.</p>
                            <a href="update_doctor_profile.php" class="btn btn-warning" >Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 offset-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>View Patients</h4>
                            <p>Manage and review your patients' details.</p>
                            <a href="doctor_view_patients.php" class="btn btn-info">View Patients</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="doctor_logout.php" class="btn btn-danger">Logout</a>
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

$dashboard = new DoctorDashboard($conn, $doctor_id);
$dashboard->fetchDoctorDetails();
$dashboard->showDashboard();
