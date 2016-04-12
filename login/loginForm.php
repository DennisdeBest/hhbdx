<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Projet Linux</title>
  <link rel="stylesheet" type="text/css" href="../css.css"/>
  <?php session_start();
  ?>
</head>
<body>
<div id="flexContainer">
  <div id="content">
    <form action="processLogin.php" method="POST">
      <table>
        <tr>
          <th><label>Username : </label></th>
          <td><input type="text" id="username" name="username" /></td>
        </tr>
        <tr>
          <th><label>Password : </label></th>
          <td><input type="password" id="pass1" name="pass1"/></td>
        </tr>
        <td><input type="submit" value="Login"></td>
        </tr>
      </table>
    </form>

  </div>
</div>

</body>
</html>