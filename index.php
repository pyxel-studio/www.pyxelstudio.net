<?php
$token = "z".bin2hex(random_bytes(30));
copy('init.py', "scripts/".$token.".txt");
copy('init.pyxres', "scripts/".$token.".pyxres");
$file_py = $token.".txt";
$file_pyxres = $token.".pyxres";
$code_init = file_get_contents("scripts/".$file_py);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png">
    <title>Pyxel Studio</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/cbfbfc2c41.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        html,body {
          height: 100%;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 10px 1fr;
            height:100%;
        }
        .gutter-col {
            grid-row: 1/-1;
            cursor: col-resize;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxAGAgYYmwGrIIiDjrELjpo5aiZeMwF+yNnOs5KSvgAAAABJRU5ErkJggg==');
            background-color: rgb(229, 231, 235);
            background-repeat: no-repeat;
            background-position: 50%;
        }
        .gutter-col-1 {
            grid-column: 2;
        }
    </style>
	
	<!-- Matomo -->
	<script>
	  var _paq = window._paq = window._paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
		var u="//www.awame.net/matomo/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '12']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<!-- End Matomo Code -->

</head>

<body>

    <div class="grid">
        <div style="overflow-y: scroll;direction:rtl;padding:0px 20px 20px 20px;background-color:white;">
            <div style="direction:ltr;position:sticky;top:0px;z-index:1000;background-color:white;width:100%;">
                <div class="row pt-3">
                    <div class="col-2">
                        <img src="https://raw.githubusercontent.com/kitao/pyxel/main/docs/images/pyxel_logo_152x64.png" />
                        <p class="font-monospace" style="font-size:80%;margin-top:-10px;margin-left:88px;color:gray">studio<sup style="color:#c0392b" class="ms-1">alpha</sup></p>
                    </div>
                    <div class="col-10 text-end font-monospace" style="font-size:70%;color:silver;">
                        <div>
                            PYXEL is an <a href="https://github.com/kitao/pyxel" target="_blank">open source</a> retro game engine for Python developed and maintained by <a href="https://twitter.com/kitao" target="_blank">@kitao</a>.
                        </div>
                        <div class="mt-2">
                            <a href="https://github.com/kitao/pyxel/blob/main/README.md#how-to-use" class="btn btn-dark p-1 ps-2 pe-2" style="font-size:90%;border-radius:4px;" role="button" target="_blank">documentation</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <span class="font-monospace text-muted small">ressource file name: <b>res.pyxres</b></span>
                        <button type="button" class="ms-3 btn btn-primary btn-sm mt-3 ps-3 pe-3 mb-3" onClick="load_editor()" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="load editor"><i class="fas fa-paint-brush"></i></button>
                        <button type="button" class="ms-4 btn btn-primary btn-sm mt-3 ps-3 pe-3 mb-3" onClick="load_game()" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="play game"><i class="fas fa-play"></i></button>
                    </div>
                </div>
            </div>

            <div style="direction:ltr;height:100%;position:relative">
                <div>
                    <textarea name="code" style="display:none;" id="code"></textarea>
                    <div style="width:100%;margin:0px auto 0px auto;"><div id="editor_code" style="border-radius:5px;"></div></div>

                    <div class="font-monospace text-center" style="font-size:90%;">Experimental project based on <a href="https://github.com/kitao/pyxel" target="_blank">Pyxel</a> Wasm</div>
                    <p class="font-monospace text-center" style="font-size:90%;">Goal : improve <a href="https://github.com/kitao/pyxel/issues/404" target="_blank">Pyxel's web support</a></p>

                    <p class="font-monospace text-end text-muted mt-5" style="font-size:70%;">bricodé par <a href="https://twitter.com/laurentabbal" target="_blank">Laurent Abbal</a></p>
                </div>
            </div>
        </div>

        <div class="gutter-col gutter-col-1"></div>

        <div style="overflow-y: scroll;padding:0px;">
            <div id="pyxel_wasm" class="text-center" style="height:100%;position:relative;">
                <iframe src='wasm-game.php?s=<?php echo $file_py ?>' width='100%' height='1000' frameborder='0' scrolling='no' style='height:99%'></iframe>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>

    <script>
        function load_editor() {
            document.getElementById('pyxel_wasm').innerHTML="<iframe src='wasm-editor.php?s=<?php echo $file_pyxres ?>' width='100%' frameborder='0' scrolling='no' style='height:99%'></iframe>";
        }

        function load_game() {
            code = $('#code');
            fetch("update_code.php", {
                method: "POST",
                mode: "cors",
                body: JSON.stringify({file: "scripts/<?php echo $file_py ?>", code: code.val()}),
                headers: {"Content-Type": "application/json; charset=UTF-8"}
            })
            .then(response => {
                console.log('response');
                console.log(response);
                return response.json();
            })
            .catch(error => {
                console.log('error');
                console.log(error);
            });
            document.getElementById('pyxel_wasm').innerHTML="<iframe src='wasm-game.php?s=<?php echo $file_py ?>' width='100%' frameborder='0' scrolling='no' style='height:99%'></iframe>";
        }
    </script>

    <script>
        var editor_code = ace.edit("editor_code", {
            theme: "ace/theme/puzzle_code",
            mode: "ace/mode/python",
            maxLines: 1000,
            minLines: 1000,
            fontSize: 13,
            wrap: true,
            useWorker: false,
            autoScrollEditorIntoView: true,
            highlightActiveLine: false,
            highlightSelectedWord: false,
            highlightGutterLine: true,
            showPrintMargin: false,
            displayIndentGuides: true,
            showLineNumbers: true,
            showGutter: true,
            showFoldWidgets: false,
            useSoftTabs: true,
            navigateWithinSoftTabs: false,
            tabSize: 4
        });
        editor_code.container.style.lineHeight = 1.5;
    </script>

    <script>
        fetch("scripts/<?php echo $file_py ?>")
        .then(response => response.text())
        .then((response) => {
            editor_code.setValue(response, -1);
        })
        .catch(err => console.log(err))

        var textarea_code = $('#code');
        editor_code.getSession().on('change', function () {
            textarea_code.val(editor_code.getSession().getValue());
        });
        textarea_code.val(editor_code.getSession().getValue());
    </script>

    <script src="https://unpkg.com/split-grid/dist/split-grid.js"></script>

    <script>
	    Split({
	        minSize: 400,
	        columnGutters: [{
	            track: 1,
	            element: document.querySelector('.gutter-col-1'),
	        }],
	    })
    </script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>
</html>
