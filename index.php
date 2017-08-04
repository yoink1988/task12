<?php
include_once __DIR__.'/lib/config.php';
include_once ROOT_DIR.'/lib/functions.php';

$output = array('%output%' => '');
if(DB_DRIVER == DB_MYSQL)
{
	if(isset($_POST['select']))
	{
	$db = new Db;
	$res = $db->select()->setTable(MYSQL_TABLE_NAME)
          ->setColumns("`key`, `data`")
	      ->setWhere("`key` = 'user9'")
          ->setLimit(1)
          ->exec();
	if($res)
	{
		$row = array_shift($res);
		$output['%output%'] .= '<span>'.$row['key']." ".$row['data'].'</span>';
	}
	else
	{
	$output['%output%'] = '<span>No data</span>';
	}

	}
	if(($_POST['addRow']) && (!empty($_POST['string'])))
	{
			$db = new Db;
			$data = $db->clearString($_POST['string']);
			$params = array("key" => "'user9'", "data" => "$data");
			if($db->insert()->setTable(MYSQL_TABLE_NAME)->setColumns("`key`, `data`")
														->setParams($params)
														->setLimit(1)
														->exec())
			{
				$output['%output%'] = '<span>Row added</span>';
			}
	}
	if(($_POST['updateRow']) && (!empty($_POST['string'])))
	{
		$db = new Db;
		$data = $db->clearString($_POST['string']);
		$params = array("`key`" => "'user9'", "`data`" => "$data");
		if($db->update()->setTable(MYSQL_TABLE_NAME)->setParams($params)
													->setWhere("`key` = 'user9'")
													->setLimit(1)
													->exec())
		{
		$output['%output%'] = '<span>Row Changed</span>';
		}
	}
	if($_POST['deleteRow'])
	{
		$db = new Db;
		if($db->delete()->setTable(MYSQL_TABLE_NAME)->setWhere("`key` = 'user9'")->setLimit(1)->exec())
		{
			$output['%output%'] = '<span>Row Deleted</span>';
		}
	}

}
if(DB_DRIVER == DB_POSTGRE)
{
	if(isset($_POST['select']))
	{
	$db = new Db;
	$res = $db->select()->setTable(POSTGRE_TABLE_NAME)
			  ->setColumns("key, data")
			  ->setWhere("key = 'user9'")
			  ->setLimit(1)
			  ->exec();
	if($res)
	{
		$row = array_shift($res);
		$output['%output%'] .= '<span>'.$row['key']." ".$row['data'].'</span>';
	}
	else
	{
	$output['%output%'] = '<span>No data</span>';
	}

	}
	if(($_POST['addRow']) && (!empty($_POST['string'])))
	{
			$db = new Db;
			$data = $db->clearString($_POST['string']);
			$params = array("key" => "'user9'", "data" => $data);

			if($db->insert()->setTable(POSTGRE_TABLE_NAME)->setColumns("key, data")
															->setParams($params)
															->setLimit(1)
															->exec())
			{
			$output['%output%'] = '<span>Row added</span>';
			}
	}
	if(($_POST['updateRow']) && (!empty($_POST['string'])))
	{
		$db = new Db;
		$data = $db->clearString($_POST['string']);
		$params = array("key" => "'user9'", "data" => $data);
		if($db->update()->setTable(POSTGRE_TABLE_NAME)->setParams($params)
												->setWhere("key = 'user9'")
												->exec())
		{
			$output['%output%'] = '<span>Row Changed</span>';
		}
	}
	if($_POST['deleteRow'])
	{
		$db = new Db;
		if($db->delete()->setTable(POSTGRE_TABLE_NAME)->setWhere("key = 'user9'")->exec())
		{
			$output['%output%'] = '<span>Row Deleted</span>';
		}
	}


	
}

templateRender($output);

?>
