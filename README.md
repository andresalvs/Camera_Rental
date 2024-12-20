# Camera Rental System

The **Camera Rental System** is a Single Page Application (SPA) built using Laravel 11, Vue 3, and Inertia.js.  
It enables users to browse and rent cameras, calculate rental costs, and manage rentals, users, and camera inventory.  
The system features robust **Role-Based Access Control (RBAC)** and secure authentication, along with integration of two third-party tools:  

- **Google OAuth**: For seamless login using Google accounts.  
- **Leaflet.js**: For creating interactive maps, enhancing the user experience.  

---

## Features

### Authentication
- Secure login, registration, and access control (public landing page and private user dashboards).

### Role-Based Access Control (RBAC)
- **Manager, Employee, and Customer** roles with specific permissions for CRUD operations.

### Camera Management
- Add, view, update, and delete cameras in the inventory.

### Camera Rentals
- **Customers**: Browse available cameras, calculate rental costs based on days, and proceed to payment.
- **Employees**: Review, accept, or reject rental requests.

### Dashboard
- **Manager Dashboard**: View rental statistics, manage users and cameras, and review activity logs and revenue.
- **Employee Dashboard**: View and manage customer rental requests.

---

## Technologies Used

- **Backend**: Laravel 11  
- **Frontend**: Vue 3 with Inertia.js  
- **Database**: PostgreSQL  
- **Styling**: Tailwind CSS  
- **Third-Party Integrations**:  
  - **Google OAuth**: For Google-based authentication.  
  - **Leaflet.js**: For creating interactive maps.  

---

## Usage

1. **Register or Log In**: Access the system as a Manager, Employee, or Customer.
2. **Customer Workflow**:
   - Browse available cameras.
   - Select a camera and specify the rental duration.
   - Calculate the total rental cost and proceed to payment.
3. **Manager Workflow**:
   - Manage cameras, users, and rentals via the Manager Dashboard.
   - View rental statistics, activity logs, and revenue.
4. **Employee Workflow**:
   - View customer rental requests.
   - Accept or reject rental requests.

---

## Project Workflow

### Camera Rental Flow
1. **Browse Cameras**: Users can view the list of available cameras.  
2. **Select Camera**: Customers select a camera and specify the number of rental days.  
3. **Calculate Payment**: The system calculates the total rental cost.  
4. **Confirm Payment**: Customers proceed to payment and confirm the rental.  

### Manager Workflow
1. **Manage Inventory**: Add, edit, or delete cameras.  
2. **Manage Users**: Create employee accounts, oversee user activity, and delete users if necessary.  
3. **View Rentals**: Monitor active and completed rentals.  
4. **View Activity Logs**: Track key actions within the system.  
5. **View Rent Sales**: Monitor revenue.  

### Employee Workflow
1. **Manage Rentals**: Update the status of customer rental requests (accept or reject).  
2. **View Rentals**: Access a list of customer rentals for review.  

---

## Role-Based Access Control (RBAC)

The system employs RBAC to enforce security and define role-specific access:

- **Manager**:
  - Full access to the system, including managing cameras, users, and rentals.
  - View rental statistics, activity logs, and revenue.
- **Employee**:
  - Limited access to manage customer rentals (approve or reject).
  - View a list of rentals.
- **Customer**:
  - Access to browse, select, and rent cameras.
