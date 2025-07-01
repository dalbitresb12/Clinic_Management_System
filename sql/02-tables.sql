USE clinic_db;

-- admin_details
CREATE TABLE admin_details (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    admin_name VARCHAR(100), 
    admin_email VARCHAR(255),
    admin_password VARCHAR(255)
);

-- doctor_details
CREATE TABLE doctor_details (
    doctor_id INT PRIMARY KEY AUTO_INCREMENT,
    doctor_name VARCHAR(100), 
    doctor_email VARCHAR(255),
    specialist VARCHAR(100),
    doctor_password VARCHAR(255)
);

-- patient_details
CREATE TABLE patient_details (
    patient_id INT PRIMARY KEY AUTO_INCREMENT,
    patient_name VARCHAR(100), 
    patient_gender VARCHAR(20), 
    patient_age INT,
    patient_email VARCHAR(255),
    patient_password VARCHAR(255),
    patient_address VARCHAR(255),
    medical_history VARCHAR(255),
    doctor_id INT,
    FOREIGN KEY (doctor_id) REFERENCES doctor_details(doctor_id)
);

-- appointments
CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status VARCHAR(255),
    UNIQUE (doctor_id, appointment_date, appointment_time) -- Ensures unique appointments per doctor
);

-- patient_report table
CREATE TABLE patient_report (
    report_id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id INT,
    prescription VARCHAR(255),
    date DATE,
    FOREIGN KEY (patient_id) REFERENCES patient_details(patient_id)
);

-- generate bill
CREATE TABLE generate_bill (
    bill_id INT PRIMARY KEY AUTO_INCREMENT,
    appointment_id INT,
    patient_id INT,
    doctor_id INT,
    services VARCHAR(250),
    total_amount INT,
    FOREIGN KEY (appointment_id) REFERENCES appointments(appointment_id),
    FOREIGN KEY (patient_id) REFERENCES patient_details(patient_id),
    FOREIGN KEY (doctor_id) REFERENCES doctor_details(doctor_id)
);

-- view bill
CREATE TABLE view_bill (
    bill_id INT PRIMARY KEY AUTO_INCREMENT,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    bill_status VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (bill_id) REFERENCES generate_bill(bill_id),
    FOREIGN KEY (patient_id) REFERENCES patient_details(patient_id),
    FOREIGN KEY (doctor_id) REFERENCES doctor_details(doctor_id)
);

-- pay bill
CREATE TABLE pay_bill (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    bill_id INT NOT NULL,
    payment_date DATE NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    payment_status VARCHAR(50) NOT NULL,
    paid_amount INT NOT NULL,
    FOREIGN KEY (bill_id) REFERENCES generate_bill(bill_id)
);


