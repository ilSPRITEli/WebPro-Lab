<?php
    session_start(); // Start the session
    // echo isset showable session variable

    // echo "<script>console.log('showable_state: " .isset($_SESSION['wow']). "')</script>";
    // echo "<script>console.log('showable: ".$_SESSION['showable']."')</script>";

    // console log all session variables and
    echo "<script>console.log('session: ".json_encode($_SESSION)."')</script>";

    if (!isset($_SESSION['showable'])) {
        $_SESSION['showable'] = false; // Initialize showable session variable if not set
    }
    // echo "<script>console.log('showable: ".$_SESSION['showable']."')</script>";

    class MyDB extends SQLite3 {
        function __construct() {
            $this->open('customers.db');
        }
    }

    // Open Database 
    $db = new MyDB();
    if(!$db) {
        echo $db->lastErrorMsg();
    }

    // Check if the save data button is clicked
    if(isset($_POST['save'])) {
        // Update customer session with form data
        // $_SESSION['showable'] = false;
        $_SESSION['CustomerId'] = $_POST['CustomerId'];
        $_SESSION['FirstName'] = $_POST['FirstName'];
        $_SESSION['LastName'] = $_POST['LastName'];
        $_SESSION['Address'] = $_POST['Address'];
        $_SESSION['Phone'] = $_POST['Phone'];
        $_SESSION['Email'] = $_POST['Email'];
        // $_SESSION['showable'] = false;
        unset($_SESSION['showable']);
        // head to self
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    // Check if the clear data button is clicked
    if(isset($_POST['clear'])) {
        // Clear customer session data
        session_unset();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "SELECT * FROM customers";
    $ret = $db->query($sql);
    if(!isset($_SESSION['CustomerId'])){
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            $_SESSION['CustomerId'] = $row['CustomerId'];
            $_SESSION['FirstName'] = $row['FirstName'];
            $_SESSION['LastName'] = $row['LastName'];
            $_SESSION['Address'] = $row['Address'];
            $_SESSION['Phone'] = $row['Phone'];
            $_SESSION['Email'] = $row['Email'];
        }
    } else {
        // console.log
        echo "<script>console.log('CustomerId: ".$_SESSION['CustomerId']."')</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAB11-1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* KANIT FONT */
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body class='container p-10'>
<h1 class='text-4xl font-bold'>Customer Information</h1>
<form method="POST">
    <!-- form to insert customer info  CustomerId FirstName LastName Address Phone Email-->
    <div class='flex flex-col'>
        <label for='CustomerId'>CustomerId</label>
        <input type='text' name='CustomerId' id='CustomerId' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['CustomerId'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='FirstName'>FirstName</label>
        <input type='text' name='FirstName' id='FirstName' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['FirstName'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='LastName'>LastName</label>
        <input type='text' name='LastName' id='LastName' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['LastName'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Address'>Address</label>
        <input type='text' name='Address' id='Address' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['Address'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Phone'>Phone</label>
        <input type='text' name='Phone' id='Phone' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['Phone'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Email'>Email</label>
        <input type='text' name='Email' id='Email' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable'] ? $_SESSION['Email'] : '';?>'>
    </div>
    <!-- save data button -->
    <button type='submit' name="save" class='bg-blue-500 text-white p-2 rounded-md mt-2'>Save Data</button>
    <!-- show data button-->
    <button type='button' onclick="showData()" class='bg-green-500 text-white p-2 rounded-md mt-2'>Show Data</button>
    <!-- clear data button -->
    <button type='submit' name="clear" class='bg-red-500 text-white p-2 rounded-md mt-2'>Clear Data</button>
</form>

<script>
    function showData() {
        <?php
            $_SESSION['showable'] = true;
        ?>
        // Display customer session data with input value
        document.getElementById('CustomerId').value = '<?php echo isset($_SESSION['CustomerId'])&&$_SESSION['showable'] ? $_SESSION['CustomerId'] : '';?>';
        document.getElementById('FirstName').value = '<?php echo isset($_SESSION['FirstName'])&&$_SESSION['showable'] ? $_SESSION['FirstName'] : '';?>';
        document.getElementById('LastName').value = '<?php echo isset($_SESSION['LastName'])&&$_SESSION['showable'] ? $_SESSION['LastName'] : '';?>';
        document.getElementById('Address').value = '<?php echo isset($_SESSION['Address'])&&$_SESSION['showable'] ? $_SESSION['Address'] : '';?>';
        document.getElementById('Phone').value = '<?php echo isset($_SESSION['Phone'])&&$_SESSION['showable'] ? $_SESSION['Phone'] : '';?>';
        document.getElementById('Email').value = '<?php echo isset($_SESSION['Email'])&&$_SESSION['showable'] ? $_SESSION['Email'] : '';?>';

        console.log('clicked showData()');
    }

    function clearData(){
        // Clear input value
        document.getElementById('CustomerId').value = '';
        document.getElementById('FirstName').value = '';
        document.getElementById('LastName').value = '';
        document.getElementById('Address').value = '';
        document.getElementById('Phone').value = '';
        document.getElementById('Email').value = '';
    }
</script>
</body>
</html>
