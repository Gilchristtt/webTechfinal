<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/adminpanel.css">
</head>
<body>
    <div class="admin-container">
        <div id="sidebar">
            <button onclick="window.location.href='..//admin/adminview.php'">Bookings</button>
            <button onclick="window.location.href='..//admin/manage_portfolio.php'">Manage Designer</button>
            <button onclick="window.location.href=''">Manage Bookings</button>
            <button onclick="window.location.href='managebrand.html'">Client Management</button>
            <button onclick="window.location.href='..//view/add_designer.php'">Add Designers</button>
            <button onclick="window.location.href='..//actions/logout.php'">Log out</button>



        </div>
        <div id="mainContent">
            <!-- Dynamic content will be injected here -->
        </div>
    </div>   
</body>
</html>
