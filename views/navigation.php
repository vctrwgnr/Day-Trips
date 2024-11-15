<?php if (isset($userRole) && $userRole === 'client') {
    header('Location: index.php?action=showPublic&area=public');
    exit();}
?>
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Day Trips Berlin
            </button>
            <ul class="dropdown-menu dropdown-custom">
                <li><a class="dropdown-item" href="index.php?action=showPublic&area=public">Public Page</a></li>
                <li><a class="dropdown-item" href="index.php?action=showList&area=trip">Trips</a></li>
                <li><a class="dropdown-item" href="index.php?action=showForm&area=trip">Add Trip</a></li>
                <li><a class="dropdown-item" href="index.php?action=showList&area=client">Clients</a></li>
                <li><a class="dropdown-item" href="index.php?action=showForm&area=client">Add Client</a></li>
                <li><a class="dropdown-item" href="index.php?action=showList&area=upcomingTrip">Upcoming Trips</a></li>
                <li><a class="dropdown-item" href="index.php?action=showForm&area=upcomingTrip">Create Upcoming Trip</a></li>
                <li><a class="dropdown-item" href="index.php?action=showList&area=booking">Applicants</a></li>
            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Day Trips Berlin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?action=showList&area=trip">Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showForm&area=trip">Add Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showList&area=client">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showForm&area=client">Add Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showList&area=upcomingTrip" >Upcoming Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showForm&area=upcomingTrip">Create Upcoming Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showList&area=booking">Applicants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showPublic&area=public">Public Page</a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
