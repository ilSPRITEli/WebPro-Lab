<?php
    // Start the session
    session_start();


    // Initialize session variables if not set
    
    $_SESSION['last'] = false;
    if (!isset($_SESSION['qid']) || $_SESSION['qid'] == 0) {
        
        if (isset($_SESSION['qid'])) {
            if ($_SESSION['qid'] == 0){
                $_SESSION['last'] = true;
            }
        }

        $_SESSION['qid'] = 1;
        $_SESSION['score'] = 0;
    }else{
        echo "<script>console.log('qid: ".$_SESSION['qid']."')</script>";
    }

    // Increment qid if the form is submitted and not by reloading the page
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['choice'])) {
            if ($_SESSION['qid'] <= 10) {
                if ($_POST['choice'] == $_SESSION['correct']) {
                    $_SESSION['score']++;
                }
            }
            $_SESSION['qid']++;
            // Redirect to prevent form resubmission
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } else {
            // check if the form name is retake
            if($_SESSION['last'] == false){
                echo "<script>alert('Please select an answer." . $_SESSION['qid'] . "')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Quiz</h1>
        <?php
            // Connect to Database 
            class MyDB extends SQLite3 {
                function __construct() {
                    $this->open('questions.db');
                }
            }

            // Open Database 
            $db = new MyDB();
            if(!$db) {
                echo $db->lastErrorMsg();
            }

            // Query Execution
            $sql = $db->prepare("SELECT * FROM questions WHERE QID=:qid");
            $sql->bindValue(':qid', $_SESSION['qid'], SQLITE3_INTEGER);
            $result = $sql->execute();

            // Display Question
            if ($result) {
                $row = $result->fetchArray(SQLITE3_ASSOC);
                if ($row) {
                    $_SESSION['correct'] = $row['Correct'];
                    echo "<h6 class='font-weight-bold'>" . $_SESSION['qid'] . ") " . $row['Stem'] . "</h3>";
                    echo "<form method='post'>";
                    echo "<input type='radio' name='choice' value='A'>" . $row['Alt_A'] . "<br>";
                    echo "<input type='radio' name='choice' value='B'>" . $row['Alt_B'] . "<br>";
                    echo "<input type='radio' name='choice' value='C'>" . $row['Alt_C'] . "<br>";
                    echo "<input type='radio' name='choice' value='D'>" . $row['Alt_D'] . "<br><br>";
                    if ($_SESSION['qid'] < 10){
                        echo "<input type='submit' value='Next Question' class='btn btn-success'>";
                    }else{
                        echo "<input type='submit' value='Finish Quiz' class='btn btn-success'>";
                    }
                    
                    echo "</form>";
                } else {
                    
                    echo "CONGRATS YOU FINISHED THE QUIZ!";
                    // Show score
                    echo "<h3>Your score is " . $_SESSION['score'] . " out of 10.</h3>";
                    $_SESSION['qid'] = 0;
                    // Button that resubmits the form
                    echo "<form method='post' name='retake'>";
                    echo "<input type='submit' value='Retake Quiz' class='btn btn-success'>";
                    echo "</form>";
                }
            } else {
                echo "Error executing the query.";
            }

            // Close database
            $db->close();
        ?>
    </div>
</body>
</html>
