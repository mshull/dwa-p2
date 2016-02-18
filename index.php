<?php

    $error = false;
    $separator = "-";
    $words = 6;
    $number = true;
    $special = true;
    $wordList = [];
    $wordArr = [];
    $specials = ["@", "~", "$", "#", "{", "}", "|", "*", "^"];
    $final = "";

    shuffle($specials);

    if ($_POST) {
        if (isset($_POST['words']) && is_numeric($_POST['words']) && intval($_POST['words']) > 0 && intval($_POST['words']) < 11) {
            $_POST['words'] = intval($_POST['words']);
            $words = ($_POST['words'] < 11) ? $_POST['words'] : 10;
        } else {
            $error = "The number of words must be a number within 1 and 10.";
        }
        if (!isset($_POST['number'])) {
            $number = false;
        }
        if (!isset($_POST['special'])) {
            $special = false;
        }
        if (isset($_POST['separator'])) {
            if ($_POST['separator'] == "none") {
                $separator = "";
            } else if ($_POST['separator'] == "space") {
                $separator = " ";
            }
        }
    }

    if (!$error) {
        $src = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html");
        preg_match_all("'<li>(.*?)</li>'si", $src, $wordDat);
        foreach($wordDat[1] as $word){
            $wordList[] = $word;
        }
        shuffle($wordList);
        for ($i=0; $i<$words; $i++) {
            $wordArr[] = trim($wordList[$i]);
        }
        if ($number) {
            $wordArr[] = rand(0, 99);
        }
        if ($special) {
            $wordArr[] = $specials[0];
        }
        shuffle($wordArr);
        $final = implode($separator, $wordArr);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CSCI E-15 : Michael Shull : P2</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/starter-template.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://p1.shullworks.com">CSCI E-15</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="https://p1.shullworks.com">P1</a></li>
                        <li class="active"><a href="https://p2.shullworks.com">P2</a></li>
                        <li><a href="#">P3</a></li>
                        <li><a href="#">P4</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">

            <div class="starter-template">
                <h1>xkcd Password Generator</h1>
                <p class="lead">Fill out the form below to generate a random secure password string.</p>
            </div>

            <?php 
                if ($error) {
                    echo '<div id="password" class="bg-danger">'.$error.'</div>';
                } else {
                    echo '<div id="password" class="bg-success">'.$final.'</div>';
                }
            ?>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Password Settings</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="index.php" class="">
                        <div class="form-group">
                            <label for="words">Number of Words: (Max 10)</label>
                            <input type="text" class="form-control" id="words" name="words" value="6">
                        </div>
                        <div class="form-group">
                            <label for="words">Separator:</label>
                            <select class="form-control" name="separator">
                                <option value="hyphen">Hyphen</option>
                                <option value="space">Space</option>
                                <option value="none">No Separator</option>
                            </select> 
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="number" value="yes" checked="checked"> Include a number?
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="special" value="yes" checked="checked"> Include special character?
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Generate Password</button>
                    </form>
                </div>
            </div>

        </div><!-- /.container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

