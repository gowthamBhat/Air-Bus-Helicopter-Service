<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();



if (!isset($_SESSION['admin_name'])) {
    header("location:admin-login.php");
} else {

    $a_name = $_SESSION['admin_name'];
    $search_empty = '';
    $search_query_error = '';


?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Users</title>
        <meta charset="utf-8" />
        <link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
        <link rel="stylesheet" type="text/css" href="css/ars.css" />
    </head>

    <body>

        <div class="header-area-full">
            <div class="container">
                <div class="header-area">

                    <a class="brand-title" href="http://localhost/hal/admin/admin-home.php">AIR BUS HELICOPTER SERVICE</a>

                    <div class="header-menu" id="myNavbar">
                        <span class="aname_header"><?php echo $a_name; ?></span>
                        <a class="admin-option btn-danger" href="admin-logout.php">Logout</a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>


        <div class="view-area-full">
            <div class="container">
                <div class="view-area">


                    <table class='flights-view-table all-view'>
                        <span class="go-back-span">
                            <a class="go-back" href="admin-home.php">Go Back</a>
                        </span>


                        <?php


                        $search_query = "SELECT * FROM users";

                        $res = mysqli_query($con, $search_query);

                        if ($res) {
                            if (mysqli_num_rows($res) > 0) {
                                echo "<div class='success count-div'>Available Users - <span class='flight-count'>" . mysqli_num_rows($res) . "</span></div>";
                                echo "
							<div style='clear:both;'></div>
							<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						
						
					</tr>
				</thead>";

                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['fname'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['mobile'] . "</td>";




                                    echo "</tr>";
                                }
                            } else {
                                $search_empty = "<div class='error-msg'>No users available </div>";
                            }
                        } else {
                            $searc_query_error = "<div class='error-msg' >query not executed : error</div>";
                        }



                        echo $search_empty;
                        echo $search_query_error;

                        ?>
                    </table>


                </div>
            </div>
        </div>





    </body>

    </html>

<?php

}


?>