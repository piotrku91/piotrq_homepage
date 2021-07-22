<?php

class SQLLoader
{
function newQuery(& $connection, $query)
{
    $result= $connection->query($query);
    return $result;

}

}

class LinkLoader
{
function loadCategories(& $connection, $table="links")
{
  $sql = "SELECT category from " .$table;
  $result= $connection->query($sql);

  return $result;

}

function loadSection(& $connection, $section, $table="links")
{
  $sql = "SELECT * from " .$table." WHERE category=\"".$section."\"";
  echo "<div style=\"background-color: #1f8759\">".$section."</div>";
  $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                  return "<div>".$row["url"]." - ".$row["name"]." - ".$row["desc"]."</div>";
                }
            }
             else return "Brak linków.";

}
};

?>