<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data</title>
    <link rel="stylesheet" href="fetch.css">
    
</head>
<body>
    <section class="contact-data">
        <div class="content">
            <h2><span>Contact</span> Form Data</h2>
        </div>
        <div class="container">
          
            <?php
            $link = mysqli_connect("localhost", "root", "", "contact_form_db");

            if (!$link) {
                die("Connection failed: " . mysqli_connect_error());
            }

     
            $sql = "SELECT * FROM contact";
            $result = mysqli_query($link, $sql);

       
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comments</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['comments']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "No contact form data available.";
            }

      
            mysqli_close($link);
            ?>
        </div>
    </section>
</body>
</html>
