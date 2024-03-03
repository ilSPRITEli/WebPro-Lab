<?php

$months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
];


if (isset($_POST['month'])) {
    $selectedMonth = $_POST['month'];
} else {
    $selectedMonth = date('F');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="h-screen w-full flex flex-wrap content-center justify-center">
    <div class="container flex flex-wrap h-full w-full content-center justify-center flex-col gap-y-5 text-center">

        <h2 class="text-4xl font-bold"><?php echo $selectedMonth; ?></h2>
        <table class="text-center table-fixed w-1/2 border-spacing-2 border-separate border-2 border-neutral-400">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $numberOfDays = cal_days_in_month(CAL_GREGORIAN, array_search($selectedMonth, $months) + 1, date('Y'));
                    $firstDayOfWeek = date('w', strtotime("1 $selectedMonth"));
                    for ($i = 0; $i < $firstDayOfWeek; $i++) {
                        echo '<td><div class="content"></div></td>';
                    }
                    for ($day = 1; $day <= $numberOfDays; $day++) {
                        echo "<td class=' border-slate-500 aspect-square' style='border-width: 1px;'><div class='content'>$day</div></td>";
                        if (($firstDayOfWeek + $day) % 7 == 0) {
                            echo '</tr><tr>';
                        }
                    }
                    while (($firstDayOfWeek + $numberOfDays) % 7 != 0) {
                        echo '<td></td>';
                        $numberOfDays++;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
        <form name="slct" method="POST">
            <select id="ben10" class="border-slate-500 border-2 rounded-xl p-2"name="month">
                <?php foreach ($months as $month) : ?>
                    <option value="<?php echo $month; ?>" <?php echo ($selectedMonth == $month) ? 'selected' : ''; ?>><?php echo $month; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        <script>
            document.getElementById('ben10').onchange = function() {
                document.slct.submit();
            }
        </script>
    </div>
</body>
</html>


