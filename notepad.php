<?php
/*
NotepadPHP v 1.0
Programmed by Oscar Aviles Miramontes [emeeseka01@gmail.com]
================================================.
     .-.   .-.     .--.                         |
    | OO| | OO|   / _.-' .-.   .-.  .-.   .''.  |
    |   | |   |   \  '-. '-'   '-'  '-'   '..'  |
    '^^^' '^^^'    '--'                         |
===============.  .-.  .================.  .-.  |
               | |   | |                |  '-'  |
               | |   | |                |       |
               | ':-:' |                |  .-.  |
               |  '-'  |                |  '-'  |
==============='       '================'       |
================================================.
-----------------------------------------------------------
						CONFIGURATION
-----------------------------------------------------------
*/

$url = 'notepad.php'; //Url of this file
$file = 'notepad'; //Name of the file you'll use as notepad
$pwd = 'abc123.'; //Password
//-----------------------------------------------------------

// check if form has been submitted
if (isset($_POST['text']) && $_POST["pwd"] == $pwd)
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url . "?pwd=" . $_GET["pwd"]));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<html>
<head>
<style type="text/css">
textarea {
 background: url(note.png) repeat-y;
 width: 600px;
 height: 300px;
 font: normal 14px verdana;
 line-height: 25px;
 padding: 2px 10px;
 border-radius: 2em;
 border: none;    
 outline: none;
 resize: none;
 box-shadow: 0 4px 6px -5px hsl(0, 0%, 40%), inset 0px 4px 6px -5px hsl(0, 0%, 2%)
}
input {
    background: #1A1A1A;
    border-radius: 2em;
    border: none;
    margin: 2em;
    padding: 0.8em;
    
    color: #A2A2A2;
    font-size: 1.1em;
    padding-left: 1.5em;
    
    outline: none;
    box-shadow: 0 4px 6px -5px hsl(0, 0%, 40%), inset 0px 4px 6px -5px hsl(0, 0%, 2%)
}
body {
    background: #202020;
	color: grey;
}
</style>
</head>
<body>
<h1>NotepadPHP</h1>
<?php if (isset($_GET['pwd']) && $_GET["pwd"] == $pwd) { ?>
<div align="center"><form action="" method="post">
<textarea name="text" rows="50" cols="100"><?php echo htmlspecialchars($text) ?></textarea><br>
<input type="hidden" name="pwd" value="<?php echo $_GET["pwd"]?>">
<input type="submit" value="Save" />
</div>
</form>
<?php
}
else {
 ?>
<div align="center"><form action="" method="get">
Pwd: <input type="text" name="pwd" />
<input type="submit" value="Login" />
</div>
</form>
<?php } ?>
</body>
</html>
