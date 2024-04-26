
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php
require_once("observable.php");
require_once("abstract_widget.php");

$dat = new DataSource();
$widgetA = new MenuWidget();
$widgetB = new LinearWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$dat->addRecord("Pedro Acosta", [25,6,20,12,20]);
$dat->addRecord("Marc Marquez", [12,15,7,25,1]);
$dat->addRecord("Jorge Martin", [10,8,10,10,5]);
$dat->addRecord("Peco Bagnaia", [7,12,7,12,15]);
$dat->addRecord("Alex Marquez", [1,7,5,2,15]);
$dat->addRecord("Dani Pedrosa", [0,0,0,12,12]);


$widgetA->draw();
$widgetB->draw();
?>

</body>
</html>
