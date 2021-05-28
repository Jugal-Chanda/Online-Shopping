<?php

require 'connect.php';

function queryExecute($sql)
{
    $conn = $GLOBALS['conn'];
    return mysqli_query($conn, $sql);
}

function makeArray($result)
{
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($data,$row);
        }
    }
    return $data;
}

function selectAll($tableName)
{
    $sql = "SELECT * FROM $tableName";
    $result = queryExecute($sql);
    return makeArray($result);
}

function getFirst($data)
{
    $newData = array();
    print_r("from getfirst");
    print_r($data);
    if(count($data) == 0)
    {
        die("Need more data for using getFirst Method!!!!");
        return null;
    }
    foreach ($data[0] as $key => $value) {
        $newData[$key] = $value;
    }
    return $newData;
}

function selectWhereE($tableName, $conditions)
{
    $sql = "SELECT * FROM $tableName WHERE ";
    $i = 1;
    foreach ($conditions as $key => $value) {
        $sql .= $key . " = '".$value."'";
        if($i != count($conditions))
        {
            $sql .= " AND ";
        }
        $i++;
    }
    $sql .= ";";
    $result = queryExecute($sql);
    return makeArray($result);
}

function getById($tableName,$id)
{
    $data = selectWhereE($tableName,['id'=>$id]);
    return getFirst($data);

}

function generateInsertSql($tableName, $fields, $data)
{
    $sql = "INSERT INTO $tableName (";
    $i = 1;
    foreach ($fields as $value) {
        $sql .= $value;
        if ($i != (count($fields))) {
            $sql .= ", ";
        }
        $i++;
    }
    $sql .= ") VALUES (";
    $i = 1;
    foreach ($data as $value) {
        $sql .= "'" . $value . "'";
        if ($i != (count($data))) {
            $sql .= ", ";
        }
        $i++;
    }
    $sql .= ");";
    return $sql;
}

function insertData($tableName, $data)
{
    $conn = $GLOBALS['conn'];
    $fields = array_keys($data);
    $values = array_values($data);
    $sql = generateInsertSql($tableName, $fields, $values);
    $result = queryExecute($sql);
    if($result == false)
    {
        die("Data Insert Error in $tableName");
    }
    return getById($tableName,mysqli_insert_id($conn));
}


function generateUpdateSql($tableName, $id, $data)
{
    $sql = "UPDATE $tableName SET ";
    $i = 1;
    foreach ($data as $key => $value) {
        $sql .= $key;
        $sql .= " = ";
        $sql .= "'" . $value . "'";
        if ($i != count($data)) {
            $sql .= ", ";
        }
        $i++;
    }
    $sql .= " WHERE id = '$id';";
    return $sql;
}

function updateData($tableName, $id, $data)
{
    $sql = generateUpdateSql($tableName, $id, $data);
    $result = queryExecute($sql);
    if($result == false)
    {
        die("Data Update Error in $tableName for Id $id");
    }
    return getById($tableName,$id);
}



function generateDeleteSql($tableName, $condition, $operator)
{
    $sql = "DELETE FROM $tableName WHERE ";
    $i = 1;
    foreach ($condition as $key => $value) {
        $sql .= $key;
        $sql .= " = ";
        $sql .= "'" . $value . "'";
        if ($i != count($condition)) {
            $sql .= " " . $operator . " ";
        }
        $i++;
    }
    $sql .= ";";
    return $sql;
}

function deleteData($tableName, $condition, $operator = "AND")
{
    $sql = generateDeleteSql($tableName, $condition, $operator);
    return queryExecute($sql);
}

function customQ($sql,$tableName)
{
    $result = queryExecute($sql);
    return makeArray($result);
}

//

function getOneToManyData($firstTable, $firstTableId, $secondTable,$secondTableField)
{
    $sql = "SELECT * FROM $secondTable WHERE $secondTableField = '$firstTableId'";
    $result = queryExecute($sql);
    $data = array();
    $data[$firstTable] = getById($firstTable,$firstTableId);
    $data[$secondTable] = makeArray($result);
    return $data;
}

function selectAllWithOneToMany($firstTable, $secondTable,$secondTableField)
{
    $data = selectAll($firstTable);
    for ($i=0; $i < count($data); $i++) { 
        $id = $data[$i]['id'];
        $data[$i][$secondTable] = selectWhereE($secondTable,[$secondTableField=>$id]);       
    }
    return $data;
    
}

function selectAllWithOneToManyReverse($firstTable, $secondTable, $secondTableField)
{
    $data = selectAll($secondTable);
    for ($i=0; $i < count($data); $i++) { 
        $id = $data[$i][$secondTableField];
        $firstTableData = getById($firstTable,$id);
        $data[$i][$firstTable] = $firstTableData;     
    }
    return $data;
}

function selectAllWithManyToMany($pivotTable,$firstTable,$firstTableAttr,$secondTable,$secondTableAttr)
{
    $data = selectAll($firstTable); 
    for ($i=0; $i < count($data); $i++) { 
        $firstTableData = $data[$i]['id'];
        $data[$i][$secondTable] = array();
        $pivotData = selectWhereE($pivotTable,[$firstTableAttr=>$firstTableData]);
        foreach ($pivotData as $pData) {
            $secondTableData = $pData[$secondTableAttr];
            $dataTemp = getById($secondTable,$secondTableData);
            $dataTemp['pivot'] = $pData;   
            array_push($data[$i][$secondTable],$dataTemp);            
        }

    }
    return $data;
}

function getOneManyToManyData($pivotTable,$firstTable,$firstTableAttr,$secondTable,$secondTableAttr,$firstTableId)
{
    $data = selectAllWithManyToMany($pivotTable,$firstTable,$firstTableAttr,$secondTable,$secondTableAttr);
    foreach ($data as $d) {
        if($d['id'] == $firstTableId)
        {
            return $d;
        }
    }
    return null;
}
