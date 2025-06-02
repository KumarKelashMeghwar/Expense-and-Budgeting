<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            font-family: arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>
<body>

<?php
    $expenses = include "data.php";

    $firstmonth_data = $expenses['month_1'];
    $secondmonth_data = $expenses['month_2'];
?>

<h2>Simple Budgeting and Expense Tracking App</h2>

<h3>Month 1</h3>

<table>
    <tr>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    <?php
       foreach($firstmonth_data as $month){
           echo "<tr>
            <td>{$month["date"]}</td>
            <td>{$month["description"]}</td>
            <td>{$month["amount"]} </td></tr>";
       }
    ?>
</table>

    <h3>Month 2</h3>

<table>
    <tr>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    <?php
        foreach ($secondmonth_data as $month) {
            echo "<tr>
                    <td>{$month["date"]}</td>
                    <td>{$month["description"]}</td>
                    <td>{$month["amount"]} </td></tr>";
        }
    ?>

</table>

<h2>Tracking</h2>

<table>
    <tr>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>

    <?php
    $expense_count = 0;
    $income_count = 0;
    foreach($expenses as $expense){
       foreach($expense as $month => $data){
           date_default_timezone_set("UTC");
           $dt = DateTime::createFromFormat('d/m/Y', $data["date"]);
           $formatted_date = $dt ? $dt->format('F j, Y') : 'Invalid date';

           // working on expenses
           if(str_contains($data['amount'], "-")){
                $expense_number = str_replace("-$", "", $data['amount']);
                $expense_count += (float) $expense_number;
           }else{
               $income_number = str_replace("$", "", $data['amount']);
               $income_count += (float) $income_number;
           }





           echo "<tr>";
           echo "<td>{$formatted_date}</td>";
           echo "<td>{$data["description"]}</td>";
           echo "<td>{$data["amount"]} </td></tr>";

       }
    }
    ?>
    <?php
    $income_count = $expense_count + $income_count;
    $net_income = $income_count - $expense_count;
    echo "<tr>
        <td></td>
        <td></td>
        <td>Income: ". "$" ."{$income_count}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Expense: "."$"."{$expense_count}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Net Income: "."$"."{$net_income}</td>
    </tr>"
    ?>

</table>


</body>
</html>