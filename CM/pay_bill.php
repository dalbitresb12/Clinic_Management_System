<?php
include 'config.php';

session_start();

if (!isset($_SESSION['patient_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['bill_id'])) {
    header("Location: patient_dashboard.php");
    exit();
}

$bill_id = $_GET['bill_id'];

class PayBill {
    public $conn;
    public $bill_id;
    public $alert;

    public function __construct($dbConnection, $bill_id) {
        $this->conn = $dbConnection;
        $this->bill_id = $bill_id;
    }

    public function handlePayment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account_number = $_POST['account_number'];
            $account_name = $_POST['account_name'];
            $amount = $_POST['amount'];
            $payment_method = $_POST['payment_method'];

            if ($this->validPayment($amount)) {
                $this->processPayment($account_number, $account_name, $amount, $payment_method);
                $this->alert = "<div class='alert alert-success text-center mt-3'>Payment successful!</div>";
            } else {
                $this->alert = "<div class='alert alert-danger text-center mt-3'>Invalid payment amount.</div>";
            }
        }
    }

    public function validPayment($amount) {
        $query = "SELECT total_amount FROM generate_bill WHERE bill_id = '$this->bill_id'";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row && $amount == $row['total_amount'];
    }

    public function processPayment($account_number, $account_name, $amount, $payment_method) {
        $update_view_bill = "UPDATE view_bill SET Bill_status = 'Paid' WHERE bill_id = '$this->bill_id'";
        $update_generate_bill = "UPDATE generate_bill SET total_amount = 0 WHERE bill_id = '$this->bill_id'";
        $insert_payment = "INSERT INTO pay_bill (bill_id, payment_date, payment_method, payment_status, paid_amount) 
                          VALUES ('$this->bill_id', NOW(), '$payment_method', 'Paid', '$amount')";

        $this->conn->query($update_view_bill);
        $this->conn->query($update_generate_bill);
        $this->conn->query($insert_payment);
    }

    public function displayPayBill() {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mets Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Bill</title>

    <!-- Bootstrap  CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php include 'header.php'; ?>

    <div class="container mt-3">
        <h1 class="text-center">Pay Your Bill</h1>
        <?php if (isset($this->alert)) echo $this->alert; ?>
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="account_number" class="form-label">Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control"
                    placeholder="Enter your account number" required>
            </div>
            <div class="mb-3">
                <label for="account_name" class="form-label">Account Name</label>
                <input type="text" name="account_name" id="account_name" class="form-control"
                    placeholder="Enter your account name" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter the amount"
                    required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="">Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Online Banking">Online Banking</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Pay Now</button>
                <a href="patient_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
    }
}

$pay_bill = new PayBill($conn, $bill_id);
$pay_bill->handlePayment();
$pay_bill->displayPayBill();
?>