<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NID Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center align content */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .print-btn {
            padding: 8px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            cursor: pointer;
        }

        .disclaimer {
            margin-top: 20px;
            text-align: center;
        }

        .disclaimer p:first-child {
            color: red;
            /* Set color to red for the first line */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo -->
        <img src="https://raw.githubusercontent.com/AbirXofficial/BotFile/main/ec.png" alt="Logo"
            style="width: 200px; height: auto; margin-bottom: 20px;">

        <h1>Voter Information</h1>
        <?php
        
            $url = "http://103.191.240.89/~biometri/verify/nid.php?nid=$nid&dob=$dob";
            $response = file_get_contents($url);
            $data = json_decode($response, true);
        
            if (isset($data['message']) && $data['message'] === 'OK' && isset($data['name'])) {
                // Increment the count only when the response indicates success
        
                echo '<table>';
                foreach ($data as $name => $value) {
                    echo '<tr>';
                    echo "<th>$name</th>";
                    echo "<td style='color: #008CBA;'>$value</td>"; // Setting text color
                    echo '</tr>';
                }
                echo '</table>';
        
                // Print button
                echo "<button class='print-btn' onclick='window.print()'>Print</button>";
            } else {
                echo '<p>No information found for the provided NID and DOB.</p>';
            }
        
        ?>
    </div>

    <!-- Disclaimer -->
    <div class="disclaimer">
        <p>উপরে প্রদর্শিত তথ্যসমূহ জাতীয় পরিচয়পত্র সংশ্লিষ্ট, ভোটার তালিকার সাথে সরাসরি সম্পর্কযুক্ত নয়।</p>
        <p style="color: black;">This is Software Generated Report From Bangladesh Election Commission, Signature & Seal
            Aren't Required.</p>
    </div>
</body>

</html>
