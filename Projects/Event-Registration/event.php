<?php
    $MEAL_PRICE = 8.00;
    $sessions = [
    "Opening Presentation" => "Room 101",
    "Web Development Workshop" => "Computer Lab",
    "Career Panel" => "Auditorium"
    ];
    if ($_GET) {
        $attendeeName = $_GET['attendeeName'] ?? '';
        $attendeeType = $_GET['attendeeType'] ?? '';
        $registrations = intval($_GET['registrations']) ?? 0;
        $eventDay = $_GET['eventDay'] ?? '';
        $mealTicket = isset($_GET['mealTicket']) && $_GET['mealTicket'] === 'yes' ? true : false;

        $pricePerRegistration = match($attendeeType) {
            'student' => 10.00,
            'employee' => 15.00,
            default => 20.00
        };
        $information = array(
            "attendeeName" =>   $attendeeName,
            "attendeeType" => $attendeeType,
            "registrations" => $registrations,
            "eventDay" => $eventDay,
            "pricePerRegistration" => $pricePerRegistration
        );
    }
    
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <input type="text" name="attendeeName" placeholder="Enter your name" required>
        <select name="attendeeType" required>
            <option value="student">Student</option>
            <option value="employee">Employee</option>
            <option value="guest">Guest</option>
        </select>
        <input type="number" name="registrations" placeholder="Number of registrations" min="1" step="1" required>
        <select name="eventDay" required>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        <input type="checkbox" name="mealTicket" value="yes" placeholder="Add a meal ticket for each registration?">
        <input type="submit" value="Register">
    </form>
    <table>
        <tr>
            <th>Session</th>
            <th>Location</th>
        </tr>
        <?php foreach ($sessions as $session => $location) { ?>
            <tr>
                <td><?php echo ($session); ?></td>
                <td><?php echo ($location); ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php if ($_GET) { ?>
        <p><?php
            foreach ($information as $key => $value) {
                echo ucfirst($key) . ": " . ($value) . "<br>";
            }
        ?><br></p>
        <p> <?php switch($eventDay) { 
            case "Friday": echo "Friday check-in begins at 4:00 PM."; break; 
            case "Saturday": echo "Saturday sessions begin at 9:00 AM"; break; 
            case "Sunday": echo "Sunday sessions begin at 10:00 AM."; break; 
        } ?><br></p>
        <p><?php if (isset($mealTicket)){
            $mealCost = $registrations * $MEAL_PRICE;
            echo("Meal ticket cost: $" . number_format($mealCost, 2));
        }?><br></p>
        <p><?php 
            $registrationSubtotal = $registrations * $pricePerRegistration;
            echo("Registration subtotal: $" . number_format($registrationSubtotal, 2));
        ?><br></p>
        <p><?php 
            $totalCost = $registrationSubtotal + ($mealTicket ? $mealCost : 0);
            echo("Total cost: $" . number_format($totalCost, 2));
        ?><br></p>
    <?php } ?>
</body>
</html>