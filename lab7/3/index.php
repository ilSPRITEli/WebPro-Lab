<!-- Create a document, form using HTML with the details as in the given table. And create a website written in PHP to display information from the data in the created form. All data items entered must be at least 5 characters long, anything less than that will be displayed in red. ***Please include the values ​​entered in the FORM as well*** -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full h-screen content-center justify-center">
    <div class="flex flex-wrap content-center justify-center w-full h-full">
        <form class="flex flex-wrap flex-col w-1/2 content-center justify-center gap-y-6"action="index.php" method="post">
            <div class="flex justify-center w-3/4 flex-col gap-y-2">
                <label for="name" class="font-bold">Name: </label>
                <input class="border-2 border-slate-500 rounded-xl p-1"type="text" name="name" id="name" placeholder="กิตติพัฒน์ เอี่ยมลือนาม"></input>
            </div>
            <div class="flex justify-center w-3/4 flex-col  gap-y-2">
                <label for="address" class="font-bold">Address: </label>
                <!-- text field -->
                <textarea class="border-2 border-slate-500 rounded-xl p-1"type="text" name="address" id="address" placeholder="ใส่ที่อยู่ของคุณ"></textarea>
            </div>
            <!-- Age -->
            <div class = "flex justify-center w-3/4 flex-row gap-x-2">
                <div class="flex justify-center w-3/4 flex-col gap-y-2">
                    <label for="age" class="font-bold">Age: </label>
                    <input class="border-2 border-slate-500 rounded-xl p-1"type="number" name="age" id="age" placeholder="999" required></input>
                </div>
                <!-- profession -->
                <div class="flex justify-center w-3/4 flex-col gap-y-2">
                    <label for="profession" class="font-bold">Profession: </label>
                    <input class="border-2 border-slate-500 rounded-xl p-1"type="text" name="profession" id="profession" placeholder="ex.graphic design"></input>
                </div>
            </div>
            
            <div class="flex justify-center w-3/4 flex-col gap-x-2">
                <label for="resident" class="font-bold">Residentional: </label>
                <div class="flex w-3/4 flex-row gap-x-2">
                <input class="border-2 border-slate-500 rounded-xl p-1"type="radio" name="resident" id="resident" value="Resident" required>Resident</input>
                <input class="border-2 border-slate-500 rounded-xl p-1"type="radio" name="resident" id="non-resident" value="Non-Resident" required>Non-Resident</input>
                </div>
            </div>
            <!-- submit button -->
            <div class="flex justify-center w-3/4">
                <input class="border-2 p-2 rounded-xl p-1 bg-green-600/50 duration-100 text-white hover:bg-green-600"type="submit" value="Submit"></input>
            </div>
        </form>
        <!-- php -->
        <div class="flex flex-wrap flex-col w-1/2 content-center justify-center gap-y-6 bg-slate-500/20">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"];
                    $address = $_POST["address"];
                    $age = $_POST["age"];
                    $profession = $_POST["profession"];
                    $resident = $_POST["resident"];


                    // check if one of the input is less than 5 characters
                    if (strlen($name) < 5 || strlen($address) < 5 || strlen($profession) < 5) {
                        echo "<p class='text-red-500'>Please enter at least 5 characters for each input</p>";
                    }else{
                        echo "<p>Name: $name</p>";
                        echo "<p>Address: $address</p>";
                        echo "<p>Age: $age</p>";
                        echo "<p>Profession: $profession</p>";
                        echo "<p>Resident: $resident</p>";
                    }
                    
                }
            ?>
    </div>

</body>
