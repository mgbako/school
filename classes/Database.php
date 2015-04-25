<?php

class Database
{

	protected $_mysql;
	protected $_query;
	protected $_where = array();
	protected $_paramTypeList;
    protected $_numRows;
    protected $_affectedRows;
    protected $_lastId;

    public function __construct()
    {
        
    	$this->_mysql = new mysqli(Config::get('mysql/host'), Config::get('mysql/user'), Config::get('mysql/password'), Config::get('mysql/name')) or die('There was a Problem connecting');
    }

    function query($query)
    {
    	$this->_query = filter_var($query, FILTER_SANITIZE_STRING);
    	$stmt = $this->_prepareQuery();
    	$stmt->execute();

        $this->_lastId = $stmt->insert_id;
        $stmt->store_result();
        
        $this->_numRows = $stmt->num_rows;


        $results = $this->_dynamicBindResults($stmt);
    	return $results;
    }

    function numRows()
    {
        return $this->_numRows;
    }

    function affectedRow()
    {
        return $this->_affectedRows;
    }

    function lastId()
    {
        return $this->_lastId;
    }

    function get($tableName, $numRows = NULL)
    {
    	$this->_query = "SELECT * FROM $tableName";
    	$stmt = $this->_buildQuery($numRows);
    	$stmt->execute();

        $stmt->store_result();
        $this->_numRows = $stmt->num_rows;

    	$result = $this->_dynamicBindResults($stmt);
    	return $result;

    }

    function insert($tableName, $insertData)
    {
    	$this->_query = "INSERT INTO $tableName";
    	$stmt = $this->_buildQuery(NULL, $insertData);
    	$stmt->execute();
        
        $this->_lastId = $stmt->insert_id;
        $this->_affectedRows = $stmt->affected_rows;

    	if($this->_affectedRows)
    	{
    		return true;
    	}
    }

    function update($tableName, $tableData)
    {
    	$this->_query = "UPDATE $tableName SET ";
    	$stmt = $this->_buildQuery(NULL, $tableData);
    	$stmt->execute();
        $this->_affectedRows = $stmt->affected_rows;

        if($this->_affectedRows)
    	{
    		return true;
    	}
    }

    function Delete($tableName)
    {
    	$this->_query = "DELETE FROM $tableName";
    	$stmt = $this->_buildQuery();
    	$stmt->execute();
    	$this->_affectedRows = $stmt->affected_rows;

        if($this->_affectedRows)
    	{
    		return true;
    	}
    }

    function where($whereProp, $whereValue)
    {
    	/*if(is_array($whereValue))
    	{
    		$keys = array_keys($whereValue);
    		$values = array_values($whereValue);
    		$num = count($keys);

    		foreach($values as $key => $val)
    		{
    			$values[$key] = "'{$val}'";
    			$this->_where[$whereProp] = $whereValue;

    			
    		}
    	}*/

    	$this->_where[$whereProp] = $whereValue;
    }

    protected function _buildQuery($numRows = NULL, $tableData = false)
    {
    	$hasTableData = null;

    	if(gettype($tableData) === 'array')
    	{
    		$hasTableData = true;
    	}

    	if(!empty($this->_where))
    	{
    		 $keys = array_keys($this->_where);
    		 $where_prop = $keys[0];
    		 $where_value = $this->_where[$where_prop];


    		 // if update data was passed, filter through
    		 // and create the SQL query, accordingly.
    		 if($hasTableData)
    		 {
    		 	$i = 1;
    		 	$pos = strpos($this->_query, 'UPDATE');

    		 	if($pos !== false)
    		 	{
    		 		foreach($tableData as $prop => $value)
	    		 	{
	    		 		// Determine the data type the item is.
	    		 		$this->_paramTypeList .= $this->_determineType($value);

	    		 		// Prepare the rest of the SQL query.
	    		 		if($i === count($tableData))
	    		 		{
	    		 			$this->_query .=$prop. " = ? WHERE ". $where_prop . "= " . $where_value;
	    		 		}
	    		 		else
	    		 		{
	    		 			$this->_query .= $prop. ' = ?, ';
	    		 		}
	    		 		$i++;

	    		 	}
    		 	}
    		 	
    		 	
    		 }
    		 else
	    		 {
	    		 	// if no table data was passed. It might be a SELECT Statement.
	    		 	$this->_paramTypeList = $this->_determineType($where_value);
	    		 	$this->_query .= " WHERE ". $where_prop . "= ?";
	    		 }
    		 
    	}

    	//Determine if is INSERT QUERY
    	if($hasTableData)
    	{
    		$pos = strpos($this->_query, 'INSERT');
    	

	    	if($pos !== false)
	    	{
	    		$keys = array_keys($tableData);
	    		$values = array_values($tableData);
	    		$num = count($keys);


	    		//wrap values in Quotes
	    		foreach($values as $key => $val)
	    		{
	    			$values[$key] = "'{$val}'";
	    			$this->_paramTypeList .= $this->_determineType($val);
	    		}

	    		$this->_query .= '(' . implode($keys, ', '). ')';
	    		$this->_query .= ' VALUES(';

	    		while($num !==0)
	    		{
	    			($num !==1)?$this->_query .= '?, ' : $this->_query .= '?)';
					$num--;
	    		}
	    	}
	    }

		if(isset($numRows))
		{
			$this->_query .= " LIMIT ". (int)$numRows;
		}


		$stmt = $this->_prepareQuery();

		if($hasTableData)
		{
			$args = array();
			$args[] = $this->_paramTypeList;

			foreach($tableData as $prop => $val)
			{
				$args[] = &$tableData[$prop];
			}
			call_user_func_array(array($stmt, 'bind_param'), $args);
            //echo $this->_query;
		}

		else if($this->_where)
		{
			$stmt ->bind_param($this->_paramTypeList, $where_value);	
		}    	
    	return $stmt;   
    	
    }

    protected function _determineType($item)
    {
    	switch (gettype($item)) 
    	{
    		case 'string':
    			$param_type = 's';
    			break;

    		case 'integer':
    			$param_type = 'i';
    			break;

    		case 'blob':
    			$param_type = 'b';
    			break;

    		case 'double':
    			$para_type = 'd';
    			break;

    	}
    	return $param_type;
    }

    protected function _prepareQuery()
    {
    	if(!$stmt = $this->_mysql->prepare($this->_query))
    	{
            echo $this->_query;
			trigger_error('Problem preparing query', E_USER_ERROR);

    	}
    	return $stmt;
    }

    protected function _dynamicBindResults($stmt)
    {
		$results = '';
    	$parameters = array();
    	$meta = $stmt->result_metadata();
    	while($field = $meta->fetch_field())
    	{
    		$parameters[] = &$row[$field->name];
    	}

    	call_user_func_array(array($stmt, 'bind_result'), $parameters);

    	while($stmt->fetch())
    	{
    		$x = array();

    		foreach($row as $key => $val)
    		{
    			$x[$key] = $val;
    		}
    		$results[] = $x;
    	}
    	return $results;
    }

    function __destruct()
    {
    	$this->_mysql->close();
    }

}
