<html>
    <head>
        <title>Connecting to database</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        </head>
<?php
try{
        $dsn = "mysql:host=localhost;dbname=learning_3";
        $username = "student";
        $password = "CS350";
        $db = new PDO($dsn, $username, $password);
    }catch(PDOException $error){
        $msg = $error->getMessage();
        echo "<p>ERROR: $msg</p>";
}
$query = "SELECT * FROM cumro_03";
$stmt = $db->prepare($query);
$stmt->execute();
$songs = $stmt->fetchAll();

?>

<h1>Songs!</h1>
<table border="1">
    <thead>
        <tr>
            <th>songId</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Genre</th>
            <th>Track#</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($songs as $song):?>
            <tr>
            <td> <?php echo $song['songId']; ?> </td>
            <td><?php echo $song['title'];?> </td>
            <td><?php echo $song['artist']; ?></td>
            <td><?php echo $song['album'];?> </td>
            <td><?php echo $song['genre']; ?> </td>
            <td><?php echo $song['trackNumber']; ?></td>
            <td><?php echo $song['yr']; ?> </td>
            </tr>
        <?php endforeach;?>
    </tbody>
    </table>

<html>