<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClinicPro - Clinic Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
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
