<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
    html,body {
    height: 100%;
    }
    </style>

  </head>

  <body>
      <div class="text-center mt-3 mb-3 font-monospace text-muted" style="position:absolute;top:10px;left:30px;z-index:1000;">
<p>click in this zone to activate the keyboard and the mouse</p>
</div>
    <pyxel-run
        root="scripts"
        name="<?php echo $_GET['s']?>"
    ></pyxel-run>

    <script src="pyxel.js"></script>
  </body>
</html>
