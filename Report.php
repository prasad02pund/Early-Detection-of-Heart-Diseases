<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Reports</title>

    <!-- Bootstrap & jQuery (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="nav_profile.css">


    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }



        /* Table Section */
        .table-container {
            flex: 1;
            padding: 40px;
            background-color: white;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
        }

        .table th {
            background-color: #333;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-view {
            background-color: #17a447;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-view:hover {
            background-color: #148a3f;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 20px;
            }

            .btn-view {
                font-size: 12px;
                padding: 3px 8px;
            }
        }
    </style>
</head>

<body>

    <?php
    include('navbar.php');
    include('db.php');

    $sql_count = "SELECT COUNT(*) AS total FROM advanceddata";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $rowCount = $row_count['total']; // Store total row count

    ?>
    <div class="table-container">
        <h2 class="text-center mb-4">Health Reports Advanced Care</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Report ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Report</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_data = "SELECT * FROM advanceddata";
                    $result_data = $conn->query($sql_data);
                    $i = 1;
                    while ($row = $result_data->fetch_assoc()) {
                        if ($username == $row['username']) {
                            $value = $row['reportid'];

                            echo "<tr>
                            <td> " . $row['reportid'] . " </td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['fullname'] . "</td>
                           <td>
                                <a href='resulthistoryAd.php?reportid=" . urlencode($row['reportid']) . "' class='btn btn-view'>View Report</a>
                            </td>

                             </tr>";

                        }
                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php

    $sql_count = "SELECT COUNT(*) AS total FROM regulardata";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $rowCount = $row_count['total']; // Store total row count

    ?>
    <div class="table-container">
        <h2 class="text-center mb-4">Health Reports Regular Care</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Report ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Report</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_data = "SELECT * FROM regulardata";
                    $result_data = $conn->query($sql_data);
                    $i = 1;
                    while ($row = $result_data->fetch_assoc()) {
                        if ($username == $row['username']) {
                            $value = $row['reportid'];

                            echo "<tr>
                            <td> " . $row['reportid'] . " </td>
                            <td>" . $row['date'] . "</td>
                            <td>" . $row['fullname'] . "</td>
                           <td>
                                <a href='resulthistoryRe.php?reportid=" . urlencode($row['reportid']) . "' class='btn btn-view'>View Report</a>
                            </td>

                             </tr>";

                        }
                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>

    <script>
        // Set the current year in the footer
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>


</body>

</html>