<!DOCTYPE html>
<html>
<head>
    <title>HR Dashboard</title>
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
        <h4 class="text-center mb-4">HR Panel</h4>
        <a href="{{ route('hr.dashboard') }}" class="nav-link mb-2">
        Dashboard
        </a>
        <div class="accordion accordion-flush" id="adminSidebar">       
        
            <!-- Manage Employees -->
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#empMenu">
                        Manage Employees
                    </button>
                </h2>
                <div id="empMenu" class="accordion-collapse collapse" data-bs-parent="#adminSidebar">
                    <div class="accordion-body">
                        <a class="nav-link" href="{{ route('hr.employee.create') }}">Onboarding</a>
                        <a class="nav-link" href="{{ route('hr.employee.index') }}">View</a>
                    </div>
                </div>
            </div>

            <!-- Attendence Tracking -->
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#attMenu">
                        Attendence Tracking
                </button>
                </h2>
                <div id="attMenu" class="accordion-collapse collapse" data-bs-parent="#adminSidebar">
                    <div class="accordion-body">
                        <a class="nav-link" href="{{ route('hr.attendance') }}">Mark Attendence</a>
                        <a class="nav-link" href="{{ route('hr.attendance.view') }}">View</a>
                        
                    </div>
                </div>
            </div>

            <!-- Manage Leave -->
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#leaveMenu">
                        Manage Leave
                    </button>
                </h2>
                <div id="leaveMenu" class="accordion-collapse collapse" data-bs-parent="#adminSidebar">
                    <div class="accordion-body">
                        <a class="nav-link" href="{{ route('hr.leaves.manage') }}">Action</a>
                        <a class="nav-link" href="{{ route('hr.leaves.viewall') }}">View all leaves</a>
                        
                    </div>
                </div>
            </div>            

            <!-- Performance Rating -->
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#perfMenu">
                        Performance 
                    </button>
                </h2>
                <div id="perfMenu" class="accordion-collapse collapse" data-bs-parent="#adminSidebar">
                    <div class="accordion-body">
                        <a class="nav-link" href="{{ route('hr.employee.performance') }}">Add Rating</a>
                        <a class="nav-link" href="{{ route('hr.employee.viewperformance') }}">View performance</a>
                        
                    </div>
                </div>
            </div>            

            <div class="mt-4 px-3">
                <a href="{{ route('hr.logout') }}" class="btn btn-danger w-100">Logout</a>
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
