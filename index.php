<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClinicPro - Clinic Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Modern Clinic Management System CSS */

/* Variables */
:root {
    --primary-color: #3498db;
    --primary-hover: #2980b9;
    --success-color: #2ecc71;
    --success-hover: #27ae60;
    --warning-color: #f39c12;
    --warning-hover: #e67e22;
    --danger-color: #e74c3c;
    --danger-hover: #c0392b;
    --dark-color: #2c3e50;
    --light-color: #ecf0f1;
    --gray-color: #95a5a6;
    --sidebar-width: 280px;
    --sidebar-collapsed-width: 80px;
    --header-height: 70px;
    --transition: all 0.3s ease;
}

/* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    color: #333;
    line-height: 1.6;
}

/* Layout */
.app-container {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: var(--sidebar-width);
    background-color: var(--dark-color);
    color: white;
    transition: var(--transition);
    height: 100vh;
    position: fixed;
    z-index: 100;
}

.main-content {
    flex: 1;
    margin-left: var(--sidebar-width);
    transition: var(--transition);
}

.content-area {
    padding: 20px;
    margin-top: var(--header-height);
}

/* Sidebar Styles */
.sidebar-header {
    padding: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-header h1 {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.5rem;
}

.sidebar-nav {
    padding: 20px 0;
}

.sidebar-nav ul {
    list-style: none;
}

.sidebar-nav li a {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    color: white;
    text-decoration: none;
    transition: var(--transition);
    border-left: 4px solid transparent;
}

.sidebar-nav li a:hover, 
.sidebar-nav li a.active {
    background-color: rgba(255, 255, 255, 0.1);
    border-left-color: var(--primary-color);
}

.sidebar-nav li a i {
    font-size: 1.2rem;
    width: 24px;
    text-align: center;
}

.sidebar-footer {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.2);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.user-profile img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.user-info {
    display: flex;
    flex-direction: column;
}

.user-name {
    font-weight: bold;
}

.user-role {
    font-size: 0.8rem;
    color: var(--gray-color);
}

.logout-btn {
    width: 100%;
    padding: 10px;
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
}

.logout-btn:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Header Styles */
.main-header {
    position: fixed;
    top: 0;
    right: 0;
    left: var(--sidebar-width);
    height: var(--header-height);
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    z-index: 90;
    transition: var(--transition);
}

.header-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.sidebar-toggle {
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    color: var(--dark-color);
    display: none;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.notification-btn {
    position: relative;
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    color: var(--dark-color);
}

.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: var(--danger-color);
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-box {
    display: flex;
    align-items: center;
}

.search-box input {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 20px 0 0 20px;
    outline: none;
    width: 200px;
}

.search-box button {
    padding: 8px 15px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 0 20px 20px 0;
    cursor: pointer;
}

/* Content Section Styles */
.content-section {
    display: none;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    padding: 20px;
    margin-bottom: 20px;
}

.content-section.active {
    display: block;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 15px;
}

.section-header h2 {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--dark-color);
}

.section-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    border-radius: 10px;
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.stat-card.primary {
    background-color: var(--primary-color);
}

.stat-card.success {
    background-color: var(--success-color);
}

.stat-card.warning {
    background-color: var(--warning-color);
}

.stat-card.danger {
    background-color: var(--danger-color);
}

.stat-icon {
    font-size: 2.5rem;
    opacity: 0.8;
}

.stat-info h3 {
    font-size: 1rem;
    font-weight: normal;
    margin-bottom: 5px;
}

.stat-info p {
    font-size: 1.8rem;
    font-weight: bold;
}

/* Dashboard Content */
.dashboard-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

.chart-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.chart-container h3 {
    margin-bottom: 20px;
    color: var(--dark-color);
}

.upcoming-appointments {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.upcoming-appointments h3 {
    margin-bottom: 20px;
    color: var(--dark-color);
}

.appointments-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.appointment-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    transition: var(--transition);
}

.appointment-item:hover {
    background-color: #e9ecef;
}

.appointment-time {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    background-color: var(--primary-color);
    color: white;
    border-radius: 5px;
    min-width: 70px;
}

.appointment-time .time {
    font-weight: bold;
    font-size: 1.1rem;
}

.appointment-time .date {
    font-size: 0.8rem;
    opacity: 0.8;
}

.appointment-details {
    flex: 1;
    padding-left: 15px;
}

.appointment-details h4 {
    margin-bottom: 5px;
    color: var(--dark-color);
}

.appointment-details p {
    color: var(--gray-color);
    font-size: 0.9rem;
}

.appointment-status {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.status-scheduled {
    background-color: #d4edda;
    color: #155724;
}

.status-completed {
    background-color: #cce5ff;
    color: #004085;
}

.status-cancelled {
    background-color: #f8d7da;
    color: #721c24;
}

/* Table Styles */
.table-responsive {
    overflow-x: auto;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th {
    background-color: var(--dark-color);
    color: white;
    padding: 12px 15px;
    text-align: left;
}

table td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
}

table tr:hover {
    background-color: #f8f9fa;
}

.status-badge {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.badge-active {
    background-color: #d4edda;
    color: #155724;
}

.badge-inactive {
    background-color: #f8d7da;
    color: #721c24;
}

/* Button Styles */
.btn {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background-color: var(--primary-hover);
}

.btn-success {
    background-color: var(--success-color);
    color: white;
}

.btn-success:hover {
    background-color: var(--success-hover);
}

.btn-warning {
    background-color: var(--warning-color);
    color: white;
}

.btn-warning:hover {
    background-color: var(--warning-hover);
}

.btn-danger {
    background-color: var(--danger-color);
    color: white;
}

.btn-danger:hover {
    background-color: var(--danger-hover);
}

.btn-sm {
    padding: 5px 10px;
    font-size: 0.8rem;
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--dark-color);
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    transition: var(--transition);
}

.form-control:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: white;
    border-radius: 10px;
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    animation: modalFadeIn 0.3s;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.close-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 1.5rem;
    cursor: pointer;
    color: var(--gray-color);
    background: none;
    border: none;
    transition: var(--transition);
}

.close-btn:hover {
    color: var(--danger-color);
}

.modal-header {
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.modal-header h3 {
    color: var(--dark-color);
}

.modal-body {
    padding: 20px;
}

/* Toast Notification */
.toast {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 15px 25px;
    background-color: var(--success-color);
    color: white;
    border-radius: 5px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transform: translateY(100px);
    opacity: 0;
    transition: var(--transition);
    z-index: 1100;
}

.toast.show {
    transform: translateY(0);
    opacity: 1;
}

.toast.error {
    background-color: var(--danger-color);
}

.toast.warning {
    background-color: var(--warning-color);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    margin-top: 20px;
}

.pagination button {
    padding: 8px 15px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 5px;
}

.pagination button:hover {
    background-color: #f8f9fa;
}

.pagination button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.page-info {
    font-size: 0.9rem;
    color: var(--gray-color);
}

/* Responsive Styles */
@media (max-width: 992px) {
    .dashboard-content {
        grid-template-columns: 1fr;
    }
    
    .sidebar {
        width: var(--sidebar-collapsed-width);
    }
    
    .sidebar-header h1 span,
    .sidebar-nav li a span,
    .user-info,
    .logout-btn span {
        display: none;
    }
    
    .sidebar-nav li a {
        justify-content: center;
        padding: 15px 0;
    }
    
    .sidebar-header h1 {
        justify-content: center;
    }
    
    .main-content {
        margin-left: var(--sidebar-collapsed-width);
    }
    
    .main-header {
        left: var(--sidebar-collapsed-width);
    }
}

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        width: var(--sidebar-width);
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
    
    .main-content {
        margin-left: 0;
    }
    
    .main-header {
        left: 0;
    }
    
    .sidebar-toggle {
        display: block;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .section-actions {
        width: 100%;
    }
    
    .search-filter, .date-filter {
        width: 100%;
    }
    
    .search-filter input, 
    .search-filter select,
    .date-filter input,
    .date-filter select {
        width: 100%;
    }
}
</style>
<body>
    <div class="app-container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1><i class="fas fa-clinic-medical"></i> ClinicPro</h1>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="#" class="active" data-section="dashboard">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" data-section="patients">
                            <i class="fas fa-user-injured"></i> Patients
                        </a>
                    </li>
                    <li>
                        <a href="#" data-section="appointments">
                            <i class="fas fa-calendar-check"></i> Appointments
                        </a>
                    </li>
                    <li>
                        <a href="#" data-section="staff">
                            <i class="fas fa-user-md"></i> Staff
                        </a>
                    </li>
                    <li>
                        <a href="#" data-section="reports">
                            <i class="fas fa-chart-bar"></i> Reports
                        </a>
                    </li>
                    <li>
                        <a href="#" data-section="settings">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name=Admin" alt="Admin">
                    <div class="user-info">
                        <span class="user-name">Admin User</span>
                        <span class="user-role">Administrator</span>
                    </div>
                </div>
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <button class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 id="current-section">Dashboard</h2>
                </div>
                <div class="header-right">
                    <div class="notifications">
                        <button class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="badge">3</span>
                        </button>
                    </div>
                    <div class="search-box">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </header>

            <!-- Content Sections -->
            <div class="content-area">
                <!-- Dashboard Section -->
                <section id="dashboard" class="content-section active">
                    <div class="stats-grid">
                        <div class="stat-card primary">
                            <div class="stat-icon">
                                <i class="fas fa-user-injured"></i>
                            </div>
                            <div class="stat-info">
                                <h3>Total Patients</h3>
                                <p id="total-patients">0</p>
                            </div>
                        </div>
                        <div class="stat-card success">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-info">
                                <h3>Today's Appointments</h3>
                                <p id="today-appointments">0</p>
                            </div>
                        </div>
                        <div class="stat-card warning">
                            <div class="stat-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <div class="stat-info">
                                <h3>Medical Staff</h3>
                                <p id="total-staff">0</p>
                            </div>
                        </div>
                        <div class="stat-card danger">
                            <div class="stat-icon">
                                <i class="fas fa-procedures"></i>
                            </div>
                            <div class="stat-info">
                                <h3>Available Rooms</h3>
                                <p>5/8</p>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-content">
                        <div class="chart-container">
                            <h3>Appointments This Week</h3>
                            <canvas id="appointments-chart"></canvas>
                        </div>
                        <div class="upcoming-appointments">
                            <h3>Upcoming Appointments</h3>
                            <div class="appointments-list" id="upcoming-appointments">
                                <!-- Will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Patients Section -->
                <section id="patients" class="content-section">
                    <div class="section-header">
                        <h2><i class="fas fa-user-injured"></i> Patients Management</h2>
                        <div class="section-actions">
                            <button id="add-patient-btn" class="btn-primary">
                                <i class="fas fa-plus"></i> Add New Patient
                            </button>
                            <div class="search-filter">
                                <input type="text" id="patient-search" placeholder="Search patients...">
                                <select id="patient-filter">
                                    <option value="all">All Patients</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="patients-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Last Visit</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Patient data will be loaded here via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <button class="prev-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <span class="page-info">Page 1 of 5</span>
                        <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </section>

                <!-- Appointments Section -->
                <section id="appointments" class="content-section">
                    <div class="section-header">
                        <h2><i class="fas fa-calendar-check"></i> Appointments</h2>
                        <div class="section-actions">
                            <button id="add-appointment-btn" class="btn-primary">
                                <i class="fas fa-plus"></i> Schedule Appointment
                            </button>
                            <div class="date-filter">
                                <input type="date" id="appointment-date-filter">
                                <select id="appointment-status-filter">
                                    <option value="all">All Statuses</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="appointments-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Appointment data will be loaded here via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <button class="prev-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <span class="page-info">Page 1 of 3</span>
                        <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </section>

                <!-- Staff Section -->
                <section id="staff" class="content-section">
                    <div class="section-header">
                        <h2><i class="fas fa-user-md"></i> Staff Management</h2>
                        <div class="section-actions">
                            <button id="add-staff-btn" class="btn-primary">
                                <i class="fas fa-plus"></i> Add Staff Member
                            </button>
                            <div class="search-filter">
                                <input type="text" id="staff-search" placeholder="Search staff...">
                                <select id="staff-role-filter">
                                    <option value="all">All Roles</option>
                                    <option value="doctor">Doctors</option>
                                    <option value="nurse">Nurses</option>
                                    <option value="admin">Administrators</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="staff-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Staff data will be loaded here via JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <button class="prev-btn" disabled><i class="fas fa-chevron-left"></i></button>
                        <span class="page-info">Page 1 of 2</span>
                        <button class="next-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </section>

                <!-- Other sections would go here -->
            </div>
        </main>
    </div>

    <!-- Modal for forms -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div id="modal-body">
                <!-- Form content will be loaded here via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Toast notifications -->
    <div id="toast" class="toast"></div>

    <!-- Include Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include our JavaScript -->
    <script src="script.js">
        
    </script>
</body>
</html>