<div class="sidebar card-authntucation-color p-20 p-relative">
    <div class="menua-contant d-flex align-items-center justify-content-between">
        <h3 class="text-center mt-10 p-relative fs-18">Student Dashboard</h3>
        <i class="fa-solid fa-bars" id="toggleSidebar"></i>
    </div>

    <ul lass="d-flex flex-column ">
        <li>
            <a class="sidebar-link active d-flex align-items-center fs-16 primary-color p-10" href="#"
               data-page="studentdashboard">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span class="sidebar-text">Dashboard</span>
                <span class="custom-tooltip">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-dropdown">
            <a href="#" class="sidebar-link d-flex align-items-center fs-16 primary-color p-10">
                <i class="fa-solid fa-file-lines fa-fw"></i>
                <span class="sidebar-text">Project Details</span>
                <i class="fa-solid fa-chevron-right arrow-icon ms-auto"></i>
                <span class="custom-tooltip">Project Details</span>
                <!-- Tooltip هنا -->
            </a>
            <ul class="sidebar-submenu">
                <li>
                    <a href="#" class="sidebar-link d-flex align-items-center fs-14" data-page="projectdetalis">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <!-- أيقونة ملف -->
                        <span>Project Details</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link d-flex align-items-center fs-14" data-page="projectphase">
                        <i class="fa-solid fa-diagram-project me-2"></i>
                        <span>Project Phases</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="sidebar-link d-flex align-items-center fs-16 primary-color p-10" href="projects.html"
               data-page="mymeetings-student">
                <i class="fa-solid fa-calendar-days fa-fw"></i>
                <span class="sidebar-text">Meetings & Schedule</span>
                <span class="custom-tooltip">Meetings & Schedule</span>
            </a>
        </li>
        <li>
            <a class="sidebar-link d-flex align-items-center fs-16 primary-color p-10" href="#" data-page="finalproject">
                <i class="fa-solid fa-circle-plus fa-fw"></i>
                <span class="sidebar-text">Add Final Project</span>
                <span class="custom-tooltip">Add Final Project</span>
            </a>
        </li>
        <li class="mt-auto logout">
            <a href="#" class="sidebar-link d-flex align-items-center fs-16 p-10"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket fa-fw"></i>
                <span class="sidebar-text">Logout</span>
                <span class="custom-tooltip">Logout</span>
            </a>

            <!-- النموذج المخفي -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
