<p align="center"><b>Human Resource Management System (HRMS)</b></p>

## About HRMS

This is a comprehensive, user-friendly, and efficient HRMS (Human Resource Management System) built using Laravel and MySQL, designed to brilliantly handle employee operations and interactions within an organization. The system gracefully supports three distinct user roles: Admin, HR, and Employee, each with their own specialized features.

### Admin Panel

The admin logs in with hardcoded credentials. 

- Username: admin
- Password: admin

Once logged in, the admin is welcomed with a clean, intuitive dashboard offering complete control over the system. The admin can:

1. Manage HRs
   - Add new HRs
   - View the list of current HRs, and toggle their status between blocked and unblocked.

2. Manage Employees
   - View employees based on the department they belong to, providing quick departmental insights.

3. Manage Leaves
    - Add various types of leaves
   - View all leave types that are available to employees.

4. Manage Departments
    - Add new departments
     - View and manage existing departments.

### HR Panel

HRs are created by the admin and log in using their name and email address. Upon logging in, they are directed to their personalized dashboard that showcases powerful features specifically tailored to department-level management:

1. Manage Employees
   - Onboard new employees
   - View the list of employees strictly within their assigned department. HRs can block or unblock employees as needed.

2. Attendance Tracking
    - Mark Attendance – HR can choose a specific date and mark each employee as Present or Absent.
    - View Attendance – Select a date to view attendance records for all employees in their department.

3. Manage Leaves
   - Action Section – View and process leave requests from employees (Approve or Reject). The status updates immediately and clearly.
   - View All – See a detailed history of all leave records.

4. Performance
   - Add Rating – Rate employees' performance from 1 to 5 stars.
   - View Rating – See a summary of all ratings given to employees under their management.
  
### Employee Panel

Employees log in using their email and password. Once authenticated, they are greeted with a warm, personalized dashboard that offers the following:

1. About Section
   - Explains how to use the platform effectively.

2. Apply Leave
   - Select the leave type, input start and end dates, provide a reason, and submit a leave request that will be reviewed by HR.

3. Leave Status
   - View the current status of all applied leaves (Approved, Rejected, or Pending).

4. Profile
   - View and update editable personal details.

5. Performance
   - Check the rating given by HR.

## Tech Stack
- Backend: Laravel Framework
- Frontend: Blade Templates + Bootstrap 5
- Database: MySQL (View hrmgmt_system.sql)

## Screenshots

### Admin

- **Login**
![image alt](Screenshots/1-Adnim-login.png)
   
- **Dashboard**
![image alt](Screenshots/2-Admin-dashboard.png)
   
- **Add HR**
![image alt](Screenshots/3-Admin-addhr.png)

 - **View HRs**
![image alt](Screenshots/4-Admin-viewhr.png)

 - **View Employees**
![image alt](Screenshots/5-Admin-viewemployee.png)

 - **View Employee with Department**
![image alt](Screenshots/6-employee-depatment.png)

 - **Add Leave**
![image alt](Screenshots/7-Admin-addleave.png)

 - **View Leave**
![image alt](Screenshots/8-Admin-viewleave.png)

 - **Edit Leave**
![image alt](Screenshots/9-Admin-editleave.png)

 - **Add Department**
![image alt](Screenshots/10-Admin-adddepartment.png)

 - **View Department**
![image alt](Screenshots/11-Admin-viewdept.png)

 - **Edit Department**
![image alt](Screenshots/12-Admin-editdept.png)
 
### HR

- **Login**
![image alt](Screenshots/13-Hr-login.png)
   
- **Dashboard**
![image alt](Screenshots/14-Hr-dashboard.png)
   
- **Add Employee**
![image alt](Screenshots/15-Hr-employeeonboard.png)

 - **View Employees**
![image alt](Screenshots/16-Hr-viewemployee.png)

 - **Mark Attendence**
![image alt](Screenshots/17-Hr-markattendence.png)

 - **View attendence**
![image alt](Screenshots/18-Hr-viewattendance.png)

 - **Manage Leaves**
![image alt](Screenshots/19-Hr-manageleaves.png)

 - **View Leaves**
![image alt](Screenshots/20-Hr-viewleaves.png)

 - **Add Rating**
![image alt](Screenshots/21-Hr-addrating.png)

 - **Edit Rating**
![image alt](Screenshots/22-Hr-editrating.png)

 - **View Performance**
![image alt](Screenshots/23-Hr-viewperformance.png)

### Employee

- **Login**
![image alt](Screenshots/24-Employee-login.png)
   
- **Dashboard**
![image alt](Screenshots/25-Employee-dashboard.png)
   
- **About**
![image alt](Screenshots/26-Employee-about.png)

 - **Apply Leave**
![image alt](Screenshots/27-Employee-applyleave.png)

 - **Leave Status**
![image alt](Screenshots/28-Employee-leavestatus.png)

 - **Profile**
![image alt](Screenshots/29-Employee-profile.png)

 - **Edit Profile**
![image alt](Screenshots/30-Employee-editprofile.png)

 - **Performance**
![image alt](Screenshots/31-Employee-performance.png)

 
