<p align="center"><b>Human Resource Management System (HRMS)</b></p>

## About HRMS

This is a comprehensive, user-friendly, and efficient HRMS (Human Resource Management System) built using Laravel and MySQL, designed to brilliantly handle employee operations and interactions within an organization. The system gracefully supports three distinct user roles: Admin, HR, and Employee, each with their own specialized features.

### Admin Panel

The admin logs in with hardcoded credentials. 

-Username: admin
-Password: admin

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
    – Add new departments 
    - View and manage existing departments.

### HR Panel

HRs are created by the admin and log in using their name and email address. Upon logging in, they are directed to their personalized dashboard that showcases powerful features specifically tailored to department-level management:

1. Manage Employees
 - Onboard new employees
 -View the list of employees strictly within their assigned department. HRs can block or unblock employees as needed.

2. Attendance Tracking
    - Mark Attendance – HR can choose a specific date and mark each employee as Present or Absent.
    - View Attendance – Select a date to view attendance records for all employees in their department.

3. Manage Leaves
- Action Section – View and process leave requests from employees (Approve or Reject). The status updates immediately and clearly.
- View All – See a detailed history of all leave records.

4. Performance
- Add Rating – Rate employees' performance from 1 to 5 stars.
- View Rating – See a summary of all ratings given to employees under their management.
