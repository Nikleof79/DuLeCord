<?php

class BulbaSqlConn
{
    private $jsonString;
    private $my_sql_data;
    /**
     * BulbaSqlConn constructor.
     * @param mixed $path_to_json path to json file with db data (By default is in /secret/mysql.json)
     */
    public function __construct($path_to_json)
    {
        $this->jsonString = file_get_contents(filename: $path_to_json);
        $this->my_sql_data = json_decode(json: $this->jsonString, associative: true);
        unset($this->jsonString);
    }
    /*
     * makes query to the db using seted data
     */
    function query($query)
    {
        $conn = new mysqli(
            $this->my_sql_data['servername'],
            $this->my_sql_data['username'],
            $this->my_sql_data['password'],
            $this->my_sql_data['dbname']
        );
        $ret_data = $conn->query($query);
        $conn->close();
        return $ret_data;
    }
}