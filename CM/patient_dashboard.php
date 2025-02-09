<?php
include 'config.php';

session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$patient_id = $_SESSION['patient_id'];

class PatientDashboard {
    public $conn;
    public $patientId;
    public $patientData;

   
    public function __construct($dbConnection, $patient_id) {
        $this->conn = $dbConnection;
        $this->patientId = $patient_id;
    }

  
    public function fetchPatientDetails() {
        $sql = "SELECT * FROM patient_details WHERE patient_id = $this->patientId";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $this->patientData = $result->fetch_assoc();
        } else {
            die("Patient not found.");
        }
    }

 
    public function getPatientName() {
        return htmlspecialchars($this->patientData['patient_name']); 
    }

   
    public function showDashboard() {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mets Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>

    <!-- Bootstrap  CSS-->
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
    <a class="navbar-brand text-white ms-2">Patient Dashboard</a>
    <form class="form-inline d-flex me-3">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" style="color: white;">Search</button>
</form>

</nav>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome, <?= $this->getPatientName() ?></h1>
        <p class="text-center text-muted">Your Health Matters to Us!</p>

        <div class="mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>Book Appointment</h4>
                            <p>Schedule your next visit with a doctor.</p>
                            <a href="book_appointment.php" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>View Profile</h4>
                            <p>Check and review your personal details.</p>
                            <a href="view_profile.php" class="btn btn-success">View Profile</a>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>Update Profile</h4>
                            <p>Keep your information up-to-date.</p>
                            <a href="update_patient_profile.php" class="btn btn-warning" >Update</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>Access Prescription</h4>
                            <p>View and download your prescriptions.</p>
                            <a href="access_prescription.php" class="btn btn-info">View Prescription</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>View Doctor List</h4>
                            <p>Find and learn about our doctors.</p>
                            <a href="view_doctors.php" class="btn btn-success" style="background-color: #064247; border-color: #064247;">View Doctors</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4>Bill</h4>
                            <p>View and manage your bills.</p>
                            <a href="view_bill.php" class="btn" style="background-color: #0EB09D; border-color: #0EB09D;">View Bill</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <!-- Logout Button -->
                <a href="patient_logout.php" class="btn btn-danger">Logout</a>
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

$dashboard = new PatientDashboard($conn, $patient_id);
$dashboard->fetchPatientDetails();
$dashboard->showDashboard();
?>