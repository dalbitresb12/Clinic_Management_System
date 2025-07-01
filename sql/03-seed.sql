USE clinic_db;

-- Insert values to admin
INSERT INTO admin_details (admin_name, admin_email, admin_password) VALUES ('srk', 'srk@gmail.com', '1234');


-- Insert values to doctors
INSERT INTO doctor_details (doctor_name, doctor_email, specialist, doctor_password) VALUES
('Jaben', 'jaben@gmail.com', 'Surgeon','1234'),
('Jihad', 'jihad@gmail.com', 'General Physician', '1234'),
('Sheba', 'jihad@gmail.com', 'Cardiologist', '1234'),
('Hashi', 'hashi@gmail.com', 'Dermatologist', '1234');

-- Types of Doctors
-- Cardiologist
-- Surgeon
-- Dermatologist
-- Pediatrician
-- General Physician

-- Insert values to patients
INSERT INTO patient_details (patient_name, patient_gender, patient_age, patient_email, patient_password, patient_address, medical_history) VALUES
('Ana', 'Female', 25, 'ana@gmail.com', '1234', 'abc street', 'No known allergies'),
('Bob', 'Male', 30, 'bob@gmail.com', '1234', 'xyz street', 'Seafood Allergy'),
('Sue', 'Female', 28, 'sue@gmail.com', '1234', 'ewu street', 'Dust Allergy'),
('Mim', 'Female', 22, 'mim@gmail.com', '1234', 'nus street', 'Peanut Allergy'),
('Suzy', 'Female', 35, 'suzy@gmail.com', '1234', 'brtc street', 'Migraine'),
('Rob', 'Male', 40, 'rob@gmail.com', '1234', 'acd street', 'Heart condition'),
('Jay', 'Male', 29, 'jay@gmail.com', '1234', 'brac street', 'No medical issues');

-- Patient Report table must be inserted manually. Patient ids must be the ones that have doctors inserted. Bellow is a generalized report
-- Maintain a balanced lifestyle by prioritizing physical health, mental well-being, and social connections. Eat a nutritious diet while staying hydrated. Engage in regular physical activity, aiming for at least 30 minutes of moderate exercise most days. 
