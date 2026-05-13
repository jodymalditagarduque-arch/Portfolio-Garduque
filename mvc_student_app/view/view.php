<?php
require_once '../model/model.php'; 
$studentsResult = getAllStudents();
$students = [];
while($row = $studentsResult->fetch_assoc()) {
    $students[] = $row;
}

$editStudent = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    foreach ($students as $s) {
        if ($s['id'] == $editId) {
            $editStudent = $s;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <h2>STUDENT MANAGEMENT SYSTEM</h2>
    
    <!-- ADD FORM -->
    <form action="../controller/controller.php?action=add" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="course" placeholder="Course" required>
        <input type="number" name="year_level" placeholder="Year Level" required>
        <button type="submit">Add</button>
    </form>
    
    <!-- EDIT FORM -->
    <form action="../controller/controller.php?action=update" method="POST" class="add-form">
        <input type="hidden" name="id" value="<?= $editStudent ? htmlspecialchars($editStudent['id']) : '' ?>">
        <input type="text" name="name" 
               value="<?= $editStudent ? htmlspecialchars($editStudent['name']) : '' ?>" 
               placeholder="Name" required>
        <input type="text" name="course" 
               value="<?= $editStudent ? htmlspecialchars($editStudent['course']) : '' ?>" 
               placeholder="Course" required>
        <input type="number" name="year_level" 
               value="<?= $editStudent ? $editStudent['year_level'] : '' ?>" 
               placeholder="Year Level" required>
        <button type="submit" class="btn-save">Save Changes</button>
        <?php if ($editStudent): ?>
            <a href="../view/view.php" class="button-cancel">Cancel</a>
        <?php endif; ?>
    </form>

    <h2>Records</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>
            <td><?= htmlspecialchars($row['year_level']) ?></td>
            <td>
                <a href="../controller/controller.php?action=delete&id=<?= $row['id'] ?>" 
                   class="button-delete" onclick="return confirm('Are you sure?')">Delete</a>
                <a href="?edit=<?= $row['id'] ?>" class="button-edit">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>