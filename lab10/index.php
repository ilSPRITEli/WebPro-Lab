<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab10</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Delete Last Customer</h1>
    
    <?php
    // Connect to SQLite database
     // 1. Connect to Database 
    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('customers.db');
        }
    }

    // 2. Open Database 
    $db = new MyDB();
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "<script>console.log(connect to db successfully)</script>";
    }

    
    if(isset($_POST['delete'])){
        // Delete the last customer
        $query = "DELETE FROM customers WHERE CustomerId = (SELECT MAX(CustomerId) FROM customers)";
        $db->exec($query);
        echo "<div class='alert'>Last customer deleted successfully.</div>";
    }

    
    $result = $db->query("SELECT * FROM customers");
    // table
    if($result->numColumns() > 0){ ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>CustomerId</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetchArray()){ ?>
                <tr>
                    <td><?php echo $row['CustomerId']; ?></td>
                    <td><?php echo $row['FirstName']; ?></td>
                    <td><?php echo $row['LastName']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- ปุ่ม -->
        <form method="post">
            <input type="submit" name="delete" value="Delete Last Row" class="btn btn-danger">
        </form>
    <?php } else {
        echo "<div class='alert alert-info'>หมด</div>";
    }

    // 4. Close database
    $db->close();
    ?>

</div>

</body>
</html>
