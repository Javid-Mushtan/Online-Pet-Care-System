<?php
    session_start();
    require 'connect_dbshop.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $manager_id = $_SESSION['userid'];
        $current_date = date('Y-m-d');

        $get_metrics_query = "select * from metrics";
        $results = $conn->query($get_metrics_query);

        if ($results->num_rows > 0) {
            $rev_report = fopen("rev_report-".$current_date, "w");
            $usr_report = fopen("usr_report-".$current_date, "w");

            while ($row = $results->fetch_assoc()) {
                // rev_report
                fwrite($rev_report, "Manager ID: ".$manager_id."\n");
                fwrite($rev_report, "Time Period: ".$row['start_date']."-".$current_date."\n");
            }
        }
    ?>
</body>
</html>