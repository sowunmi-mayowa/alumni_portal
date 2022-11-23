
<?php
    if (isset($_POST['export'])) {
        require("../connection.php");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=records.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('id', 'payment_id', 'amount_paid', 'name', 'matric-number', 'email', 'number', 'date', 'reference'));
        $query = "SELECT * FROM `records` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            fputcsv($output, $row);
        }
        fclose($output);
    }
?>