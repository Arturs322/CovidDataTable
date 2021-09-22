<?php
require_once "vendor/autoload.php";

use League\Csv\Reader;
use League\Csv\Statement;

$csv = Reader::createFromPath("covid19.csv", "r");
$csv->setDelimiter(";");
$csv->setHeaderOffset(0);

$stat = Statement::create()
    ->offset(0)

;
$records = $stat->process($csv);

?>
<style>
    body {background-color: #DFCFBE}
</style>
<form action="index.php">
    <label for="desired">Enter desired country!</label>
    <input type="text" id="desired" name="desired"><br><br>
    <input type="submit" value="Submit">
</form>

<?php
foreach ($records as $record)
    if (isset($_GET['desired'])) {

        $searchYear = isset($_GET['desired']) ? (int) trim($_GET['Valsts']) : null;
       // echo $record['Datums'];
    }
?>
<table bgcolor="#92A8D1" border="2" id="data">
    <?php foreach ($records as $record):  ?>
    <tr>
        <th><?php echo $record["Datums"] ?></th>
        <th><?php echo $record["Valsts"]?></th>
        <th><?php echo $record["14DienuKumulativaIncidence"]?></th>
        <th><?php echo $record["Izcelosana"]?></th>
        <th><?php echo $record["Pasizolacija"]?></th>
        <th><?php echo $record["PersIrVakcParslSert_PasizolacijaLatvija"]?></th>
        <th><?php echo $record["PersIrVakcParslSert_TestsPirmsIebrauksanasLV"]?></th>
        <th><?php echo $record["PersIrVakcParslSert_TestsPecIebrauksanasLV"]?></th>
        <th><?php echo $record["CitasPersonas_PasizolacijaLatvija"]?></th>
        <th><?php echo $record["CitasPersonas_TestsPirmsIebrauksanasLV"]?></th>
        <th><?php echo $record["CitasPersonas_TestsPecIebrauksanasLV"]?></th>
    </tr>
    <?php endforeach; ?>
</table>

