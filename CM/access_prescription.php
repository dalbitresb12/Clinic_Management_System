<?php
include 'config.php';
include 'header_all.php';
session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit;
}

$patient_id = $_SESSION['patient_id'];

class Prescription {
    public $conn;
    public $patientId;

    public function __construct($dbConnection, $patient_id) {
        $this->conn = $dbConnection;
        $this->patientId = $patient_id;
    }

    public function getPrescriptions() {
        $query = "SELECT * FROM patient_report WHERE patient_id = $this->patientId";
        return $this->conn->query($query);
    }

    public function getPatientDetails() {
        $query = "SELECT * FROM patient_details WHERE patient_id = $this->patientId";
        return $this->conn->query($query)->fetch_assoc();
    }
}

$prescription = new Prescription($conn, $patient_id);
$patient = $prescription->getPatientDetails();
$reports = $prescription->getPrescriptions();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mets Tags -->
    <meta charset="UTF-8">
    <title>Access Prescription</title>

    <!-- Bootstrap  CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


    <div class="container mt-3">
        <h2 class="text-center">Prescriptions</h2>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Prescriptions</h4>
                <hr>
                <?php if ($reports && $reports->num_rows > 0): ?>
                <?php while ($row = $reports->fetch_assoc()): ?>
                <div class="border p-3 mb-3">
                    <p><strong>Date:</strong> <?= htmlspecialchars($row['date']); ?></p>
                    <p><strong>Name:</strong> <?= htmlspecialchars($patient['patient_name']); ?></p>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($patient['patient_gender']); ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($patient['patient_age']); ?></p>
                    <p><strong>Medical History:</strong> <?= htmlspecialchars($patient['medical_history']); ?></p>
                    <p><strong>Prescription:</strong> <?= htmlspecialchars($row['prescription']); ?></p>

                    <!-- Download Button -->
                    <div class="text-end">
                        <a href="download.php?id=<?= $row['report_id']; ?>" class="btn btn-success btn-sm">Download</a>
                    </div>
                </div>
                <?php endwhile; ?>

                <?php else: ?>
                <p class="text-center text-muted">No prescriptions available.</p>
                <?php endif; ?>

            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="patient_dashboard.php" class="btn btn-secondary btn-sm">Back to Dashboard</a>
        </div>
    </div>
</body>

</html>