<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'] ?? '';
    $department = $_POST['department'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $cgpa = $_POST['cgpa'] ?? '';
    $goal = $_POST['goal'] ?? '';
    $skills = $_POST['skills'] ?? '';

    // Profile Picture Upload Handling
    $profilePicName = "";
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $profilePicName = time() . "_" . basename($_FILES["profilePic"]["name"]);
        $targetFilePath = $targetDir . $profilePicName;
        move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFilePath);
    }

    // Insert into database including profile_pic
    $stmt = $conn->prepare("INSERT INTO profiles (full_name, department, semester, cgpa, skills, goal, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullName, $department, $semester, $cgpa, $skills, $goal, $profilePicName);

    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
        $_SESSION['user_id'] = $last_id;

        header("Location: advisor.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>