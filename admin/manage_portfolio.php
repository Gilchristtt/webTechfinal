

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Interior/assets/css/manage_portfolio.css">
    <title>Manage Designers</title>
</head>
<body>
    <div class="container">
        <?php
            session_start();

            if ($_SESSION['success']){
                $message = $_SESSION['success'];

                echo "<div style='color:green; text-align:center;'>$message</div>";

                $_SESSION['success'] = '';
            }
        ?>
        <h1>Manage Designers</h1>
        <table>
            <thead>
                <tr>
                    <th>Designer Name</th>
                    <th>Speciality</th>
                    <th>Years of Experience</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../settings/connection.php');
                
                $query = "SELECT * FROM designer_portfolio";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
               
                if ($result->num_rows > 0) {
                    // Fetch and display each row of results
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        
                        <tr>
                            <td><?php echo htmlspecialchars($row['FirstName']). " " .htmlspecialchars($row['LastName']); ?></td>
                            <td><?php echo htmlspecialchars($row['Speciality']); ?></td>
                            <td><?php echo htmlspecialchars($row['YearsOfExperience']); ?></td>
                            <td>
                                <!-- Edit button form -->
                                <div style="display: flex; justify-content: space-around; align-items: center;">
                                        <!-- Edit button form -->
                                        <form action="../admin/edit_portfolio.php" method="POST" style="margin-right: 10px;">
                                            <input type="hidden" name="pid" value="<?php echo $row['Portfolioid']; ?>">
                                            <input type="submit" name="submit" value="Edit" style="background-color: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                        </form>
                                        <!-- Delete button form -->
                                        <form action="../actions/delete_designer_actions.php" method="POST">
                                            <input type="hidden" name="cid" value="<?php echo $row['Portfolioid']; ?>">
                                            <input type="submit" name="delete" value="Delete" style="background-color: #f44336; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this Designer?');">
                                        </form>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="2">No Chores Found.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
