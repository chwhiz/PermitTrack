<!-- PermitTrack v3.0 || This file is licensed under the MIT License. -->

<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.cdnfonts.com/css/gotham-ssm" rel="stylesheet"> <!-- gotham ssm font url from cdnfonts.com -->
                
    <title>PermitTrack</title>

    <style>
        body {
            font-family: 'gotham ssm', sans-serif;
            background-color: #1f0c0d;
            margin: 0;
            padding: 20px;
        }
        
        a {
            text-decoration: none;

        }

        #won {
            text-align: center;
            color: #ffffff;
        }

        #woo {
            text-align: center;
            color: black;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
    </style>
</head>
<body>
    <h1 id='won'>PermitTrack</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $permit_number = $_POST["permit_number"];

        // Change the URL below to the URL of the permit database with the parameter.
        $url = "https://permit.example.com?permitno=" . urlencode($permit_number); // gets the url and adds the permit number.

        // Retrieve the contents of the site
        $file_contents = file_get_contents($url);

        // Filter and display the line where the name was found
        $lines = explode("\n", $file_contents);

        foreach ($lines as $line) {
        // Identifies the HTML table <td> element containing the student's full name.
        // This specific td tag is identified by its width attribute and internal font tags.
        // Extracts the full name by stripping all HTML tags from the matched line.

            if (strpos($line, '<td width="35%"><strong><font size="2">') !== false) {
                $fullName = strip_tags($line);
                $fullName = str_replace('<td width="35%"><strong><font size="2">', '', $fullName);
                echo "
                    <form>
                        <h1 id='woo' align='center'>Result</h1>
                        <h2 align='center'>Permit Found!</h2>
                        <h4 align='center'>OR Number: $permit_number</h4>
                        <h4 align='center'>Full Name of the Student:<br>$fullName</h4>
                        <h4 align='center'>NOTICE: If the permit is valid but is different than the expected name, double-check the OR Number or contact the student.</h4>
                    </form>
                ";
                break; // Exit the loop after the first match
            }
        }

        // If the name was not found
        if (!isset($fullName)) {
            echo "
                <form>
                    <h1 id='woo' align='center'>Result</h1>
                    <h2 align='center'>Permit Not Found</h2>
                    <h4 align='center'>OR Number: $permit_number</h4>
                    <h3 align='center'>Kindly double-check the OR Number as the system says that it can't be found.</h3>
                </form>
            ";
        }
    } else { // This is the start page. Change it to your likings.
        echo "
            <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
                <label for=\"permit_number\">Permit / OR Number:</label>
                <input type=\"text\" name=\"permit_number\" id=\"permit_number\" required><br><br>
                <input type=\"submit\" value=\"Submit\">
            </form>
        ";
    }
    ?>

<!-- Footer -->
    <footer style="background-color: #1f0c0d; padding: 20px; text-align: center;">
        <b><p id='won'>System developed by chwhiz.<a href="https://github.com/chwhiz/PermitTrack" > Source code in Github.</a></p></b>
        <p id='won'>This was possible with the use of HTML, CSS, and PHP</p>

    </footer>
</body>
</html>
