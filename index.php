<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetGetForm</title>
</head>

<body>

    <form action="index.php" method="post">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="oid" placeholder="OID">
        <input type="text" name="community" placeholder="community">

        <input type="submit">
    </form>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $oid = $_POST["oid"];
    $community = $_POST["community"];

    $array = [];
    $array["address"] = $address;
    $array["oid"] = $oid;
    $array["community"] = $community;

    $result = json_encode($array);

    $filename = "data.json";
    $file = fopen($filename, "w");

    if ($file) {
        fwrite($file, $result);
        fclose($file);

        echo "File created successfully.";
    } else {
        echo "Error creating the file.";
    }

    $pythonScript = './snmp_test.py';
    $command = 'python3 ' . $pythonScript;

    // Use exec() to run the Python script
    exec($command, $output, $returnCode);

    echo $returnCode;
    print_r($output); // output returned as array
}
?>
