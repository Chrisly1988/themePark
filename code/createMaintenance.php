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

$siteBuilder->getOpeningHtmlTags('Concessions');

$siteBuilder->getGreyOverLay();

$siteBuilder->getSubTitle();

$siteBuilder->getMenu();

// $rides = rides table
?>

<div class = "content" >
    <form action="user_added.php" method="post" id="userform" >
        
        <p>Maintenance Mode</p>
        <div class = "col1">
            <p>User ID:
                <input type="text" name="user_id" size="30" value="" />
            </p>
            
            <p>RideID:
                <?php 

                    require_once('../db_connection.php');

                    $query = "SELECT idRides,name FROM UmaLand.Rides";
                    $response = @mysqli_query($dbc, $query);
                    if($response){
                        echo '<select name="Ride ID"  form="userform">';

                        while($row = mysqli_fetch_array($response)){
                            echo '<option value="' . $row['idRides'] . '">' .
                            $row['name'];
                            echo '</option>';
                        }

                        echo '</select>';
                    } else {
                        echo "Couldn't obtain ride list";

                        echo mysqli_error($dbc);
                    }

                    mysqli_close($dbc);

                ?>
            </p>

            <p>
                Ticket Description:
            </p>
            <textarea rows = "5" cols = "50">
                </textarea>
            <p>
                <input type="submit" name="submit" value="Submit" class="button"/>
            </p>
        </div>
    </form>
</div>