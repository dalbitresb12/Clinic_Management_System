<?php
include 'config.php';
include 'Appointment.php';
include 'header_all.php';

session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

$patientId = $_SESSION['patient_id'];
$appointment = new Appointment($conn);

$message = "";
$alertType = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctorId = $_POST['doctor_id'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];


    $result = $appointment->bookAppointment($patientId, $doctorId, $date, $time);

    if ($result === "Appointment booked successfully!") {
        $message = $result;
        $alertType = "success";
    } else {
        $message = $result;
        $alertType = "danger"; 
    }
}

$availableDoctors = $appointment->getAvailableDoctors();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mets Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>

    <!-- Bootstrap  CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Book Appointment</h2>

        <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $alertType; ?>">
            <?= htmlspecialchars($message); ?>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="doctor_id" class="form-label">Select Doctor</label>
                <select name="doctor_id" id="doctor_id" class="form-select" required>
                    <?php if ($availableDoctors->num_rows > 0): ?>
                    <?php while ($doctor = $availableDoctors->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($doctor['doctor_id']); ?>">
                        <?= htmlspecialchars($doctor['doctor_name']); ?>
                    </option>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <option value="" disabled>No doctors available</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="appointment_time" class="form-label">Appointment Time</label>
                <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Book Appointment</button>
                <a href="patient_dashboard.php" class="btn btn-secondary btn-sm">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>