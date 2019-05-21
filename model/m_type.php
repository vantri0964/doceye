<?php
require_once("common/database.php");
class Type extends Database
{
    function __construct()
    {
        parent::__construct();
    }
    function __destruct()
    {
        parent::disconnect();
    }
}
