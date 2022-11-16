<?php
$errors = [];
$_SESSION = [];

// populate the db user & pass based on your db account
$dbUser = 'root';
$dbPass = '';
// connect to database
$db = mysqli_connect('localhost', $dbUser, $dbPass, 'vms');

$adminFullname = "";
$schoolName = "";
$adminSchoolID = -1;
if (isset($_GET['adminSchoolID'])) {
    $adminFullname = $_GET['adminFullname'];
    $schoolName = $_GET['schoolName'];
    $adminSchoolID = $_GET['adminSchoolID'];
}

if ($adminSchoolID == -1) return;



$_SESSION = [];
$query = "SELECT * FROM `offer` f INNER JOIN `requests` r on f.requestID=r.id WHERE r.schoolID=$adminSchoolID;";

$temp = $db->query($query);
if (!$temp) {
    array_push($errors,  $query);
} else {
    foreach ($temp as $row) {
        $r;
        foreach ($row as $key => $value) {
            $r["$key"] = mysqli_real_escape_string($db, $value);
        }
        $myJSON = json_encode($r);
        array_push($_SESSION, $myJSON);
    }
}


function mapper($cell, $callback)
{
    $result = array();
    foreach ($cell as $key => $value) {
        $result[] = $callback($key, $value);
    }
    return $result;
}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>View Offers</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<script type="text/javascript">
    function preventBack() {
        // var d = document.referrer;
        // console.log(1111, d);
        // if (d === 'http://localhost/b2000382/' || d.indexOf('index.php') > -1)
        window.history.forward();
    }
    preventBack();
    // setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>

<body>
    <div class="fixed-top" style="display: grid;">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light " href="#">VMS</a><span class="breadcrumb-content">&gt; Offers</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"></li>
                    </ul>
                    <form method="post" action="index.php" class="d-flex">
                        <input class="form-control d-none" id="logout" name="logout" />
                        <?php include('adminDashboardButton.php') ?>
                        <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second nav for filtering -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand pe-5" style="color: #575d62!important; font-weight: bold; font-size:large!important;" href="#"><?php echo $schoolName; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ps-0 pb-0" style="color: #000!important;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sorted by
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="#" onclick="sortBy('Oldest')">Oldest</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sortBy('Latest')">Latest</a></li>
                                <li>
                                    <hr class="dropdown-divider" style="width: 100%;">
                                </li>
                                <li><a class="dropdown-item" href="#" onclick="sortBy('Type')">Type</a></li>
                            </ul>
                            <div id="sortedBy" style="font-size: .875em; color: #6c757d;">Oldest</div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled ps-4">Filter By:</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ps-0 pb-0" style="color: #000!important;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Offer Type
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="#">Tutorial</a></li>
                                <li><a class="dropdown-item" href="#">Service</a></li>
                                <li>
                                    <hr class="dropdown-divider" style="width: 100%;">
                                </li>
                                <li><a class="dropdown-item" href="#">Clear</a></li>
                            </ul>
                            <div id="filterByRequestType" style="font-size: .875em; color: #6c757d;">Tutorial</div>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 117px; margin-bottom: 10px">
        <?php include('adminInfo.php') ?>
        <div class="row" id="cards">
            <?php if (!$_SESSION) : ?>
                <div style="text-align: center; margin-top: 20%">No Data</div>
            <?php endif ?>
            <?php if ($_SESSION) : ?>
                <?php foreach ($_SESSION as $row) : ?>
                    <div class="col-sm-4 mt-3 data" data=<?php echo
                                                            $row;
                                                            ?>>
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $r = json_decode($row);
                                echo "<h5 class='card-title'>Offer ($r->id)</h5>";
                                echo "<div class='key-value'><div>Date</div><div class='fw-bold text-danger'>$r->date</div></div>";
                                echo "<div class='key-value'><div>Status</div><div>$r->status</div></div>";
                                echo "<div class='key-value'><div>Request ID</div><div>$r->requestID</div></div>";
                                echo "<div class='key-value'><div>Volunteer ID</div><div>$r->volunteerID</div></div>";
                                echo "<div class='key-value'><div>Remark</div><div>$r->remark</div></div>";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="functions.js"></script>
</body>

</html>