<html>
    <head>
        <title><?= $student["fullname"]?> | Teacher Dashboard</title>
    </head>
    <body>

        <h1>Welcome, <?= $student["fullname"]?></h1>
        
        <h2><a href="<?= base_url()?>student_logout">Logout</a></h2>
        
    </body>
</html>
