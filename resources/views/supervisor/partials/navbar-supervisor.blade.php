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

        <form method="GET" action="{{route('projects.search')}}" class="d-flex search-form" role="search">

            <input name="student_id" value="" class="form-control me-2 search" type="search" placeholder="Search for a student" aria-label="Search">
            <button class="btn main-btn" type="submit">Search</button>
        </form>
    </div>
</nav>
