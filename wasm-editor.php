<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/gh/kitao/pyodide-sdl2@20220923/pyodide.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nosleep/0.12.0/NoSleep.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="https://pyxelstudio/www.pyxelstudio.net/img/pyxel_icon_64x64.ico">
    <link rel="stylesheet" href="https://pyxelstudio/www.pyxelstudio.net/pyxel.css">
    <!-- For actual use, use "https://cdn.jsdelivr.net/gh/kitao/pyxel/wasm/pyxel.js" -->
    <style>
    html,body {
    height: 100%;
    }
    </style>
    <title>Pyxel Editor</title>
</head>

<body>
    <div class="font-monospace small text-danger" style="position:absolute;top:10px;left:10px;z-index:1000;">
        <button id="ress_save" type="button" class="btn btn-danger btn-sm" style="color:white;" >
            <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" fill="currentColor" viewBox="0 0 448 512"><path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"/></svg>
        </button> click here to save your work
    </div>
    <div class="font-monospace small text-danger" style="position:absolute;top:10px;right:10px;z-index:1000;">
        <button id="ress_download" type="button" class="btn btn-secondary btn-sm" style="color:white;" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24" fill="currentColor"><path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/></svg>
        </button>
    </div>
    <pyxel-edit
        root="scripts"
        name="<?php echo $_GET['s']?>">
    </pyxel-edit>
    <script src="pyxel.js"></script>
</body>
</html>
