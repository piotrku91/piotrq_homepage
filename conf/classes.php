<?php

class SQLLoader
{

    function newQuery(&$connection, $query)
    {
        $result = $connection->query($query);
        return $result;
    }

    function isAnyRow(&$results)
    {
        if ($results->num_rows > 0) {
            return true;
        };
        return false;
    }
}

class LinkLoader extends SQLLoader
{

    function loadCategories(&$connection, $table = "links")
    {
        return $this->newQuery($connection, "SELECT category from " . $table);
    }

    function loadSection(&$connection, $section, $table = "links")
    {
        $result = $this->newQuery($connection, "SELECT * from " . $table . " WHERE category=\"" . $section . "\"");
        echo "<div style=\"background-color: #1f8759\">" . $section . "</div>";

        if ($this->isAnyRow($result)) {
            foreach ($result as $row) {
                return "<div>" . $row["url"] . " - " . $row["name"] . " - " . $row["desc"] . "</div>";
            }
        } else return "Brak linków.";
    }
}


class MainVarsLoader extends SQLLoader
{
    function getVar(&$connection, $stringkey, $error_msg)
    {

        $result = $this->newQuery($connection, "SELECT value from page_string_table WHERE stringkey=\"" . $stringkey . "\";");
        if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {
            return $row[0];
        } else return $error_msg;
    }
}


class Button 
{
    protected $ref;
    protected $operation;
    protected $caption;

    public function __construct($ref, $operation, $caption)
    {
        $this->ref = $ref;
        $this->operation = $operation;
        $this->caption = $caption;
    }


}

class OperationButton extends Button
{
    
    function getCode()
    {
        $code = "<form action=\"index.php?ref=" . $this->ref . "\" role = \"form\" method = \"post\">";
        $code .= "<input type=\"submit\" name=\"" . $this->operation . "\" value=\"" . $this->caption . "\">";
        $code .= "</form><br>";
        return $code;
    }

    function getCodeOnlyButton()
    {
        $code = "<input type=\"submit\" name=\"" . $this->operation . "\" value=\"" . $this->caption . "\">";
        return $code;
    }
}

class UrlExButton extends Button
{

    public function __construct($ref, $operation, $caption, $url_ex)
    {
        $this->ref = $ref;
        $this->operation = $operation;
        $this->caption = $caption;
        $this->url_ex = $url_ex;
    }
    
    function getCode()
    {
        
        $code = "<form action=\"index.php?ref=" . $this->ref ."&". $this->url_ex . "\" role = \"form\" method = \"post\">";
        $code .= "<input type=\"submit\" name=\"" . $this->operation . "\" value=\"" . $this->caption . "\">";
        $code .= "</form><br>";
        return $code;
    }
}
