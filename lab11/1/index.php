<?php
    session_start(); // Start the session

    // php console.log($_SESSION['showable']);
    echo "<script>console.log(" . json_encode($_SESSION) . ");</script>";




    if (!isset($_SESSION['showable'])) {
        $_SESSION['showable'] = false; // Initialize showable session variable if not set
    }

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

    
    if (!isset($_SESSION['wow'])) {
    // Fetch data from database and store in session
        $_SESSION['showable'] = true;
        $_SESSION['wow'] = "wow";
        $sql = "SELECT * FROM customers LIMIT 1";
        $ret = $db->query($sql);
        if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            $_SESSION['CustomerId'] = $row['CustomerId'];
            $_SESSION['FirstName'] = $row['FirstName'];
            $_SESSION['LastName'] = $row['LastName'];
            $_SESSION['Address'] = $row['Address'];
            $_SESSION['Phone'] = $row['Phone'];
            $_SESSION['Email'] = $row['Email'];
        }
    }

    // Check if the save data button is clicked
    if(isset($_POST['save'])) {
        // Update customer session with form data
        $_SESSION['CustomerId'] = $_POST['CustomerId'];
        $_SESSION['FirstName'] = $_POST['FirstName'];
        $_SESSION['LastName'] = $_POST['LastName'];
        $_SESSION['Address'] = $_POST['Address'];
        $_SESSION['Phone'] = $_POST['Phone'];
        $_SESSION['Email'] = $_POST['Email'];

        // Clear form data
        $_SESSION['showable'] = false;
        // Redirect to self to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    // Check if the clear data button is clicked
    if(isset($_POST['clear'])) {
        // Clear session data
        session_unset();
        // session_destroy();

        // create wow session
        $_SESSION['wow'] = "wow";
        // Redirect to self to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
        // Redirect to self to prevent form resubmission
        
    }

    // Set showable to true if the show data button is clicked
    if(isset($_POST['show'])) {
        $_SESSION['showable'] = true;
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
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
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['CustomerId']) ? $_SESSION['CustomerId'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='FirstName'>FirstName</label>
        <input type='text' name='FirstName' id='FirstName' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['FirstName']) ? $_SESSION['FirstName'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='LastName'>LastName</label>
        <input type='text' name='LastName' id='LastName' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['LastName']) ? $_SESSION['LastName'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Address'>Address</label>
        <input type='text' name='Address' id='Address' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['Address']) ? $_SESSION['Address'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Phone'>Phone</label>
        <input type='text' name='Phone' id='Phone' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['Phone']) ? $_SESSION['Phone'] : '';?>'>
    </div>
    <div class='flex flex-col'>
        <label for='Email'>Email</label>
        <input type='text' name='Email' id='Email' class='border-2 border-gray-300 p-2 rounded-md'
               value='<?php echo $_SESSION['showable']&&isset($_SESSION['Email']) ? $_SESSION['Email'] : '';?>'>
    </div>
    <!-- save data button -->
    <button type='submit' name="save" class='bg-blue-500 text-white p-2 rounded-md mt-2'>Save Data</button>
    <!-- show data button-->
    <button type='submit' name="show" class='bg-green-500 text-white p-2 rounded-md mt-2'>Show Data</button>
    <!-- clear data button -->
    <button type='submit' name="clear" class='bg-red-500 text-white p-2 rounded-md mt-2'>Clear Data</button>
</form>
</body>
</html>
