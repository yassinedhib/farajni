<?php
$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "";
$dBName = "farajni";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3306);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}

class config
{
    private static $pdo = NULL;

    public static function getConnexion()
    {
        if (!isset(self::$pdo))
        {
            try
            {
                self::$pdo = new PDO('mysql:host=localhost;dbname=Farajni', 'root', '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);

            }
            catch(Exception $e)
            {
                die('Erreur: '.$e->getMessage());
            }
        }
        return self::$pdo;
    }

}

?>

