<?php

class Database
{
    public $connection;
    protected $db_host;
    protected $db_user;
    protected $db_pass;


    public function __construct($db_host = 'localhost', $db_user = 'root', $db_pass = '')
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }
    public function connect($db_name)
    {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $db_name);
    }
    public function fetch_all($query)
    {
        $data = array();
        $result = $this->connection->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function fetch_record($query)
    {
        $result = $this->connection->query($query);
        return mysqli_fetch_assoc($result);
    }
    public function run_mysql_query($query)
    {
        $result = $this->connection->query($query);
        return $this->connection->insert_id;
    }
    function escape_this_string($string)
    {
        return $this->connection->real_escape_string($string);
    }
}

class QueryBuilder extends Database
{
    protected $query;
    public function __construct($db_name)
    {
        parent::__construct();
        $this->connect($db_name);
        $this->query = "SELECT ";
    }
    public function get()
    {
        return $this->fetch_all($this->query);
    }
}

class Clients extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('lead_gen_business');
        $this->query = "SELECT * FROM clients ";
    }
    public function where($arr)
    {
        foreach ($arr as $key => $value) {
            $this->query .= "WHERE $key = '$value'";
        }
        return $this;
    }
}

class Sites extends QueryBuilder
{
    public $count;
    public function __construct()
    {
        parent::__construct('lead_gen_business');
        $this->query = "SELECT ";
        $this->count = 'COUNT(*)';
    }
    public function select($arr)
    {
        $i = 1;
        foreach ($arr as $value) {
            if ($i != count($arr)) {
                $this->query .= "$value, ";
                $i++;
            } else {
                $this->query .= "$value ";
            }
        }
        $this->query .= "FROM sites ";
    }
    public function group_by($group)
    {
        $this->query .= "GROUP BY $group ";
    }
    public function having($count, $operator, $num)
    {
        $this->query .= "HAVING $count $operator $num ";
    }
}

$clintBuilder = new Clients();
$clients = $clintBuilder->where(array('last_name' => 'Owen'))->get();
$siteBuilder = new Sites();
$siteBuilder->select(array('client_id', $siteBuilder->count));
$siteBuilder->group_by('client_id');
$siteBuilder->having($siteBuilder->count, ">", 5);
$sites = $siteBuilder->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Query Builder</title>
</head>

<body>
    <h1>Query Builder</h1>
    <section class="assignment-1">
        <table>
            <thead>
                <tr>
<?php foreach ($sites as $arr) {foreach ($arr as $key => $client) { ?>
                    <th> <?= $key ?></th>
<?php } break; } ?>
                </tr>
            </thead>
            <tbody>
<?php foreach ($sites as $arr) { ?>
                <tr>
<?php foreach ($arr as $key => $client) { ?>
                    <td> <?= $client ?></td>
<?php } ?>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </section>
    <section class="assignment-2">
        <table>
            <thead>
                <tr>
<?php foreach ($clients as $arr) { foreach ($arr as $key => $client) { ?>
                    <th> <?= $key ?></th>
<?php }break; } ?>
                </tr>
            </thead>
            <tbody>
<?php foreach ($clients as $arr) { ?>
                <tr>
<?php foreach ($arr as $key => $client) { ?>
                    <td> <?= $client ?></td>
<?php } ?>
                </tr>
<?php } ?>
            </tbody>
        </table>
    </section>
</body>

</html>