document.addEventListener('DOMContentLoaded', function() {
    // Navigation
    const navLinks = document.querySelectorAll('nav a');
    const contentSections = document.querySelectorAll('.content-section');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links and sections
            navLinks.forEach(l => l.classList.remove('active'));
            contentSections.forEach(section => section.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Show corresponding section
            const sectionId = this.getAttribute('data-section');
            document.getElementById(sectionId).classList.add('active');
            
            // Load data for the section
            loadSectionData(sectionId);
        });
    });
    
    // Modal functionality
    const modal = document.getElementById('modal');
    const closeBtn = document.querySelector('.close-btn');
    
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Buttons to open modals
    document.getElementById('add-patient-btn')?.addEventListener('click', () => {
        openModal('patient');
    });
    
    document.getElementById('add-appointment-btn')?.addEventListener('click', () => {
        openModal('appointment');
    });
    
    document.getElementById('add-staff-btn')?.addEventListener('click', () => {
        openModal('staff');
    });
    
    // Initial load
    loadSectionData('dashboard');
    
    // Function to load data for each section
    function loadSectionData(sectionId) {
        switch(sectionId) {
            case 'dashboard':
                fetchDashboardData();
                break;
            case 'patients':
                fetchPatients();
                break;
            case 'appointments':
                fetchAppointments();
                break;
            case 'staff':
                fetchStaff();
                break;
        }
    }
    
    // Function to open modal with appropriate form
    function openModal(type) {
        const modalBody = document.getElementById('modal-body');
        
        switch(type) {
            case 'patient':
                modalBody.innerHTML = `
                    <h2>Add New Patient</h2>
                    <form id="patient-form">
                        <div class="form-group">
                            <label for="patient-name">Full Name</label>
                            <input type="text" id="patient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="patient-phone">Phone</label>
                            <input type="tel" id="patient-phone" required>
                        </div>
                        <div class="form-group">
                            <label for="patient-email">Email</label>
                            <input type="email" id="patient-email">
                        </div>
                        <div class="form-group">
                            <label for="patient-dob">Date of Birth</label>
                            <input type="date" id="patient-dob">
                        </div>
                        <div class="form-group">
                            <label for="patient-address">Address</label>
                            <textarea id="patient-address" rows="3"></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" onclick="modal.style.display='none'">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                `;
                break;
                
            case 'appointment':
                modalBody.innerHTML = `
                    <h2>Schedule Appointment</h2>
                    <form id="appointment-form">
                        <div class="form-group">
                            <label for="appointment-patient">Patient</label>
                            <select id="appointment-patient" required>
                                <option value="">Select Patient</option>
                                <!-- Patients will be loaded via JavaScript -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="appointment-doctor">Doctor</label>
                            <select id="appointment-doctor" required>
                                <option value="">Select Doctor</option>
                                <!-- Doctors will be loaded via JavaScript -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="appointment-date">Date</label>
                            <input type="date" id="appointment-date" required>
                        </div>
                        <div class="form-group">
                            <label for="appointment-time">Time</label>
                            <input type="time" id="appointment-time" required>
                        </div>
                        <div class="form-group">
                            <label for="appointment-reason">Reason</label>
                            <textarea id="appointment-reason" rows="3" required></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" onclick="modal.style.display='none'">Cancel</button>
                            <button type="submit" class="btn btn-success">Schedule</button>
                        </div>
                    </form>
                `;
                break;
                
            case 'staff':
                modalBody.innerHTML = `
                    <h2>Add Staff Member</h2>
                    <form id="staff-form">
                        <div class="form-group">
                            <label for="staff-name">Full Name</label>
                            <input type="text" id="staff-name" required>
                        </div>
                        <div class="form-group">
                            <label for="staff-role">Role</label>
                            <select id="staff-role" required>
                                <option value="doctor">Doctor</option>
                                <option value="nurse">Nurse</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staff-phone">Phone</label>
                            <input type="tel" id="staff-phone" required>
                        </div>
                        <div class="form-group">
                            <label for="staff-email">Email</label>
                            <input type="email" id="staff-email" required>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn" onclick="modal.style.display='none'">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                `;
                break;
        }
        
        modal.style.display = 'block';
        
        // Add form submission handlers
        document.getElementById(`${type}-form`)?.addEventListener('submit', function(e) {
            e.preventDefault();
            handleFormSubmit(type);
        });
    }
    
    // Function to handle form submissions
    function handleFormSubmit(type) {
        let formData = {};
        
        switch(type) {
            case 'patient':
                formData = {
                    name: document.getElementById('patient-name').value,
                    phone: document.getElementById('patient-phone').value,
                    email: document.getElementById('patient-email').value,
                    dob: document.getElementById('patient-dob').value,
                    address: document.getElementById('patient-address').value
                };
                // In a real app, you would send this to the server
                console.log('Patient data:', formData);
                alert('Patient added successfully!');
                break;
                
            case 'appointment':
                formData = {
                    patientId: document.getElementById('appointment-patient').value,
                    doctorId: document.getElementById('appointment-doctor').value,
                    date: document.getElementById('appointment-date').value,
                    time: document.getElementById('appointment-time').value,
                    reason: document.getElementById('appointment-reason').value
                };
                console.log('Appointment data:', formData);
                alert('Appointment scheduled successfully!');
                break;
                
            case 'staff':
                formData = {
                    name: document.getElementById('staff-name').value,
                    role: document.getElementById('staff-role').value,
                    phone: document.getElementById('staff-phone').value,
                    email: document.getElementById('staff-email').value
                };
                console.log('Staff data:', formData);
                alert('Staff member added successfully!');
                break;
        }
        
        modal.style.display = 'none';
        // Refresh the relevant section
        loadSectionData(type + 's'); // 'patients', 'appointments', 'staff'
    }
    
    // Mock data fetching functions
    function fetchDashboardData() {
        // In a real app, you would fetch this from the server
        document.getElementById('total-patients').textContent = '124';
        document.getElementById('today-appointments').textContent = '8';
    }
    
    function fetchPatients() {
        // Mock data - in a real app, fetch from server
        const patients = [
            { id: 1, name: 'John Doe', phone: '555-1234', email: 'john@example.com' },
            { id: 2, name: 'Jane Smith', phone: '555-5678', email: 'jane@example.com' },
            { id: 3, name: 'Robert Johnson', phone: '555-9012', email: 'robert@example.com' }
        ];
        
        const tbody = document.querySelector('#patients-table tbody');
        tbody.innerHTML = '';
        
        patients.forEach(patient => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${patient.id}</td>
                <td>${patient.name}</td>
                <td>${patient.phone}</td>
                <td>${patient.email}</td>
                <td>
                    <button class="btn">View</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }
    
    function fetchAppointments() {
        // Mock data - in a real app, fetch from server
        const appointments = [
            { id: 1, patient: 'John Doe', date: '2023-06-15', time: '10:00', doctor: 'Dr. Smith', status: 'Scheduled' },
            { id: 2, patient: 'Jane Smith', date: '2023-06-15', time: '11:30', doctor: 'Dr. Johnson', status: 'Completed' },
            { id: 3, patient: 'Robert Johnson', date: '2023-06-16', time: '09:00', doctor: 'Dr. Williams', status: 'Scheduled' }
        ];
        
        const tbody = document.querySelector('#appointments-table tbody');
        tbody.innerHTML = '';
        
        appointments.forEach(appointment => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${appointment.id}</td>
                <td>${appointment.patient}</td>
                <td>${appointment.date}</td>
                <td>${appointment.time}</td>
                <td>${appointment.doctor}</td>
                <td>${appointment.status}</td>
                <td>
                    <button class="btn">View</button>
                    <button class="btn btn-danger">Cancel</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }
    
    function fetchStaff() {
        // Mock data - in a real app, fetch from server
        const staff = [
            { id: 1, name: 'Dr. Smith', role: 'Doctor', phone: '555-1111', email: 'smith@clinic.com' },
            { id: 2, name: 'Dr. Johnson', role: 'Doctor', phone: '555-2222', email: 'johnson@clinic.com' },
            { id: 3, name: 'Nurse Williams', role: 'Nurse', phone: '555-3333', email: 'williams@clinic.com' }
        ];
        
        const tbody = document.querySelector('#staff-table tbody');
        tbody.innerHTML = '';
        
        staff.forEach(member => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${member.id}</td>
                <td>${member.name}</td>
                <td>${member.role}</td>
                <td>${member.phone}</td>
                <td>${member.email}</td>
                <td>
                    <button class="btn">View</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }
});