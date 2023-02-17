<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A TAX CALCULATOR WEB APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #ffffcc;
            background: rgb(99,199,198);
            background: linear-gradient(90deg, rgba(99,199,198,1) 0%, rgba(203,212,87,1) 51%, rgba(74,189,212,1) 81%);
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        /* Area for the results */
        #result {
            margin-top: 30px;
            text-align: center;
        }
        #result h2 {
            font-weight: bold:
            font-size: 24px;
            margin-bottom: 10px;
        }
        #result p {
            font-size: 18px;
        }
        
    </style> 
</head>
<body>
    <h1>Taxxy: A Tax Calculator</h1>
    <form method="post">
        <p>Salary:
        <input type="number" id="salary" name="salary">
        </p>
        
        <label for="type">Type:</label>

        <label>
            <input type="radio" id="monthly" name="type" value="monthly">Monthly</label>
        <label>
            <input type="radio" id="bi-monthly" name="type" value="bi-Monthly">Bi-Monthly</label>

        <input type="submit" name="submit" value="Compute">
    </form>
    
    <?php

if (isset($_POST['submit'])) {
    $salary = $_POST['salary'];
    $type = $_POST['type']?? 'default';
   

        if ($_POST['type'] == "bi-Monthly") {
            $Tsalary = $salary  * 2;
            $AnSalary  = $Tsalary *12;
            
            if ($AnSalary <= 250000){
                $Tsalary = 0;
                $MonTax = 0;
            }
            else if ($AnSalary<= 400000 && $AnSalary > 250000) {
                $AnTax = ($AnSalary-250000)*.2;
                $MonTax = $AnTax/12;
            }
            else if ($AnSalary <= 800000 && $AnSalary > 400000) {
                $AnTax = 30000+($AnSalary-400000)*.25;
                $MonTax = $AnTax/12;
            }
            else if ($AnSalary <= 2000000 && $AnSalary > 800000) {
                $AnTax = 130000+($AnSalary-800000)*.3;
                $MonTax = $AnTax/12;
            }
            else if ($AnSalary <= 8000000 && $AnSalary > 2000000) {
                $AnTax = 490000+($AnSalary-2000000)*.32;
                $MonTax = $AnTax/12;
            }
            else if ($AnSalary > 8000000) {
                $AnTax = 2410000+($AnSalary-8000000)*.35;
                $MonTax = $AnTax/12;
            }  

            echo "<div id='result'>";
            echo "<h2>Result:</h2>";
            echo "<p>Monthly Salary(PHP): $salary</p>";
            echo "<p>Annual Salary(PHP): $AnSalary</p>";
            echo "</br>";
            echo "<p>Est. Annual Tax(PHP): $AnTax</p>";
            echo "<p>Est. Monthly Tax(PHP): $MonTax</p>";
            echo "</div>";

        } else if ($_POST['type'] == "monthly") {
            $AnSalary = $salary *12;

            if ($AnSalary <= 250000){
                $salary = 0;
                $monTax = 0;
            }
            else if ($AnSalary<= 400000 && $AnSalary > 250000) {
                $AnnTax = ($AnSalary-250000)*.2;
                $monTax = $AnnTax/12;
            }
            else if ($AnSalary <= 800000 && $AnSalary > 400000) {
                $AnnTax = 30000+($AnSalary-400000)*.25;
                $monTax = $AnnTax/12;
            }
            else if ($AnSalary <= 2000000 && $AnSalary > 800000) {
                $AnnTax = 130000+($AnSalary-800000)*.3;
                $monTax = $AnnTax/12;
            }
            else if ($AnSalary <= 8000000 && $AnSalary > 2000000) {
                $AnnTax = 490000+($AnSalary-2000000)*.32;
                $monTax = $AnnTax/12;
            }
            else if ($AnSalary > 8000000) {
                $AnnTax = 2410000+($AnSalary-8000000)*.35;
                $monTax = $AnnTax/12;
            }  

            echo "<div id='result'>";
            echo "<h2>Result:</h2>";
            echo "<p>Monthly Salary(PHP): $salary</p>";
            echo "<p>Annual Salary(PHP): $AnSalary</p>";
            echo "</br>";
            echo "<p>Est. Annual Tax(PHP): $AnnTax</p>";
            echo "<p>Est. Monthly Tax(PHP): $monTax</p>";
            echo "</div>";    
        }  
}     
?>
</body>
</html>