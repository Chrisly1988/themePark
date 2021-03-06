<?php
session_start();

if(isset($_SESSION['id'])){
    $username = $_SESSION['username']; 
    $id = $_SESSION['id'];
    $roleId = $_SESSION['roleId'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
} else{
    header("Location: index.php");
}

require("themeparkSiteBuilder.php");
$siteBuilder = new themeParkSiteBuilder();

$siteBuilder->getOpeningHtmlTags('Managment');

$siteBuilder->getGreyOverLay();

$siteBuilder->getMenu();
?>

<h1>Managment</h1>
<table class = "menu">
    <tr>
        <td><a href="viewEmployee.php" class="clockInButton">Employees</a></td>
        <td><a href="viewSchedule.php" class="clockInButton">Shift Schedule</a></td>
        <td><a href="viewConcessionStands.php" class="clockInButton">Concession Stands</a></td>
        <td><a href="viewConcession.php" class="clockInButton">Concessions</a></td>
        <td><a href="viewRides.php" class="clockInButton">Rides</a></td>
        <td><a href="viewClock.php" class="clockInButton">Clock Times</a></td>
        <td><a href="rainOut.php" class="clockInButton">Rain Outs</a></td>
    </tr>
</table>

<?php
$siteBuilder->getClosinghtmlTags();
?>