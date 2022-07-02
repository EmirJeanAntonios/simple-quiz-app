<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route("dashboard")}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-help menu-icon"></i>
                <span class="menu-title">Survey</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                        href="{{route("survey.index")}}">List</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{route("survey.create")}}">Create</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>