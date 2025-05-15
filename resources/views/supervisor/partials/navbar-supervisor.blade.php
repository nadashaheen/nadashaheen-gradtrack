<nav class="navbar bg-body-tertiary">
    <div class="container-fluid flex-wrap">
        <ul class="navbar-nav d-flex flex-row flex-wrap gap-4 mb-2 mb-lg-0">
            <li class="nav-item">
                <a  class="nav-link active" data-tab="all-projects.html" href="{{route('projects.index')}}">All Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="completed-projects.html" href="{{route('completedProj')}}">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="schedule-meetings.html" href="{{route('meetings.index')}}">Schedule Meetings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="schedule-meetings.html" href="{{route('proposedProj')}}">Proposed Project</a>
            </li>
        </ul>

        <form class="d-flex ms-auto mt-2 mt-md-0" role="search">
            <div class="search-container">
                <input class="form-control me-2 search-input" type="search" placeholder="Search for a student" />
                <i class="fas fa-search search-icon"></i>
            </div>
        </form>
    </div>
</nav>
