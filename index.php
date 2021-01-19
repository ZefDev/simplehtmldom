<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Статистика футбольных команд</title>
  <script src="js/jquery-3.5.1.js"></script>
  <script src="js/main.js"></script>
  <style>
    tr {
      text-align: center;
    }
  </style>
 </head>
 <body>

 <form action="/simplehtmldom/php/server.php" method="post">
  <p><h1>Статистика футбольных команд</h1></p>
  <p><b>Команда</b></p>
  <p><input type="text" id="team" name="team" size="30" maxlength="30" placeholder="Название команды" required></p>
  <p><input type="submit"></p>
 </form>


 </body>
</html>
