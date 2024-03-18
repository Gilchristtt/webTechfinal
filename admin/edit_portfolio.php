<?php
include "../settings/connection.php"; 

session_start();
$id = $_POST["pid"];

$query = "SELECT * FROM designer_portfolio WHERE Portfolioid= ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $portfolio = $result->fetch_assoc();
    // echo $chore['chorname'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Designer Portfolio</title>
    <link rel="stylesheet" href="../interior/assets/css/add_designer.css">
</head>
<body>

<!-- edit_portfolio_form.php -->
<form action="../actions/edit_designer_actions.php" method="POST" enctype="multipart/form-data">
    <label for="firstName"><strong>First Name:</strong></label>
    <input type="text" id="firstName" name="firstName" value="<?php echo $portfolio['FirstName']; ?>" required>

    <label for="lastName"><strong>Last Name:</strong></label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $portfolio['LastName']; ?>" required>

    <label for="portfolioDescription"><strong>Portfolio Description:</strong></label>
    <textarea id="portfolioDescription" name="portfolioDescription" required><?php echo $portfolio['PortfolioDescription']; ?></textarea>
   
    <label for="yearsOfExperience"><strong>Years of Experience:</strong></label>
    <input type="number" id="yearsOfExperience" name="yearsOfExperience" value="<?php echo $portfolio['YearsOfExperience'] ; ?>" required> 

    <label for="speciality"><strong>Speciality:</strong></label>
    <input type="text" id="speciality" name="speciality" value= "<?php echo $portfolio['Speciality'] ; ?>"required>

    <label for="educationAndCertifications"><strong>Education and Certifications:</strong></label>
    <textarea id="educationAndCertifications" name="educationAndCertifications" value="<?php echo $portfolio['EducationAndCertifications'] ; ?>" required><?php echo $portfolio['EducationAndCertifications'] ; ?></textarea>

    <label for="linkToProjects"><strong>Link to Projects:</strong></label>
    <input type="text" id="linkToProjects" name="linkToProjects" value="<?php echo $portfolio['LinkToProjects'] ; ?>" required>

    <label for="awardsAndRecognition"><strong>Awards and Recognition:</strong></label>
    <textarea id="awardsAndRecognition" name="awardsAndRecognition" value="<?php echo  $portfolio['AwardsAndRecognition'] ; ?>" required><?php echo  $portfolio['AwardsAndRecognition'] ; ?></textarea>

    <label for="testimonials"><strong>Testimonials:</strong></label>
    <textarea id="testimonials" name="testimonials" value="<?php echo  $portfolio['Testimonials'] ; ?>"required><?php echo  $portfolio['Testimonials'] ; ?></textarea>

    <label for="image"><strong>Designer Image:</strong></label>
    <!-- Display existing image -->
    <img src="<?php echo$portfolio['designer_image']; ?>" alt="Designer Image">
    <!-- Allow updating image -->
    <input type="file" id="image" name="image" accept="image/*">
    <input type="hidden" name="edit" value="">
    <input type="hidden" name="Portfolioid" value="<?php echo $portfolio["Portfolioid"]; ?>">
    <input type="submit" name="submit" value="submit">
</form>


</body>
</html>

</body>
</html>
