# 🏥 Clinic Management System

The **Clinic Management System** is a comprehensive platform designed to streamline clinic operations by managing patient appointments, medical records, billing, and administrative tasks. The system enhances communication between patients, doctors, and administrators, ensuring efficiency and a better healthcare experience.

## 📌 Project Overview

This project is a **Software Requirements Specification (SRS)** for a **Clinic Management System** that aims to improve healthcare services by providing a digital platform for managing clinic-related tasks. The system includes:

- **Patient Registration & Management**
- **Appointment Scheduling**
- **Medical Record Storage**
- **Billing and Payment System**
- **Role-Based Access Control for Patients, Doctors, and Admins**

## 🚀 Features

### 🔹 **User Authentication**
- Secure **login and registration** for patients, doctors, and administrators.
- Password hashing for **secure authentication**.
- Role-based access control (**RBAC**) to restrict access based on user roles.

### 🔹 **Patient Management**
- Patients can **register, update profiles**, and manage their medical records.
- Access to **prescriptions, doctor details, and appointment history**.

### 🔹 **Doctor Management**
- Doctors can **manage patient records**, update schedules, and view appointments.
- Ability to **approve or cancel appointments**.

### 🔹 **Appointment System**
- **Easy scheduling & cancellation** of appointments.
- Patients can **view available doctors** and select an appropriate time slot.
- Doctors receive **notifications** for new appointments.

### 🔹 **Billing & Payment System**
- **Automated billing** for patient treatments.
- **Online payment integration** for easy transactions.
- Secure billing history accessible by patients and administrators.

### 🔹 **Admin Dashboard**
- Admins can **add, update, or delete doctors**.
- **Monitor patient and doctor activities**.
- **Manage financial records, track transactions**, and oversee appointments.

### 🔹 **Security & Compliance**
- **Authentication & authorization** using secure methods.
- **Error handling and validation** for data security.

## 📌 System Modules

The **Clinic Management System** consists of multiple modules:

| Module              | Description |
|--------------------|-------------|
| **Authentication** | Secure login, registration, and role-based access. |
| **Patient Module** | Appointment booking, medical record access, profile management. |
| **Doctor Module** | Viewing appointments, managing patient data, profile updates. |
| **Admin Module** | Adding and removing doctors, monitoring users, managing billing. |
| **Billing Module** | Generating invoices, viewing bills, processing payments. |
| **Appointment Module** | Scheduling, managing and canceling appointments for patients and doctors. |

## 🔧 **Technologies Used**
- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP (Object-Oriented)
- **Database**: MySQL
- **Security**: Session Management

## 📌 **Database Structure**
The system follows a **relational database model** in **MySQL**. The primary tables include:

- **Users** (Patients, Doctors, Admins)
- **Appointments**
- **Medical Records**
- **Billing & Payments**
- **Doctor Schedules**

## 🛠 **Installation & Setup**
1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/clinic-management-system.git
   cd clinic-management-system
   ```
2. **Database Setup:**
   - Open `phpMyAdmin`
   - Create a new database named `clinic_management`
   - Use the provided text files for **tables and inseertion**.

3. **Run the Project:**
   - Start a local server (XAMPP, WAMP).
   - Open the browser and visit:  
     ```
     http://localhost/clinic-management-system
     ```
