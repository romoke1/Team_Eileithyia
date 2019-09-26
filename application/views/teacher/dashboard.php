<html>
    <head>
        <title><?= $teacher["fullname"]?> | Teacher Dashboard</title>
    </head>
    <body>

        <h1>Welcome, <?= $teacher["fullname"]?></h1>
        
        <h2><a href="<?= base_url()?>teacher_logout">Logout</a></h2>
        
    </body>
</html>
