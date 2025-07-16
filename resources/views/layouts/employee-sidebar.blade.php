<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color:rgb(71, 82, 92);
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link:focus {
            /* add btn hover */
            background-color:rgb(165, 176, 187);
        }
        /* //manage nte ullil set */
        .accordion-button {
            background-color:rgb(71, 82, 92);
            color: white;
            padding: 0.75rem 1.25rem;
        }
       /* manage btn click cheyyumbol */
        .accordion-button:not(.collapsed) {
            color: white;
            background-color:rgb(121, 131, 141);
        }
        .accordion-body a {
    padding-left: 2rem;
    display: block;
    /* addbtn default */
    background-color:rgb(121, 131, 141);
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
    margin-bottom: 5px;
}

.accordion-body a:hover {
    background-color:rgb(134, 72, 146);
    color: white;
}
    </style>
</head>
<body class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3 text-white">
        <h4 class="text-center mb-4">Employee Panel</h4>
        
        <div class="accordion accordion-flush" id="adminSidebar">
            <a href="{{ route('employee.dashboard') }}" class="nav-link mb-2 text-white">Dashboard</a>
            <a href="{{ route('employee.about') }}" class="nav-link mb-2 text-white">About</a>            
            <a href="{{ route('leave.request') }}" class="nav-link mb-2 text-white">Apply Leave</a>
            <a href="{{ route('leave.status') }}" class="nav-link mb-2 text-white">Leave Status</a>
            <a href="{{ route('employee.profile') }}" class="nav-link mb-2 text-white">Profile</a>
            <a href="{{ route('employee.performance') }}" class="nav-link mb-2 text-white">Performance</a>
 
            <div class="mt-4 px-3">
                <a href="{{ route('employee.logout') }}" class="btn btn-danger w-100">Logout</a>
            </div>

        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
