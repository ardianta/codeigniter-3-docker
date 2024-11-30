<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>List of Users</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
