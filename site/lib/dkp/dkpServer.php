<?php
/*===========================================================
CLASS DESCRIPTION
=============================================================
Class Description should be placed here.
*/

class dkpServer {
	/*===========================================================
	MEMBER VARIABLES
	============================================================*/
	var $id;
	var $name;
	const tablename = "dkp_servers";
	/*===========================================================
	DEFAULT CONSTRUCTOR
	============================================================*/
	function server()
	{

	}
	/*===========================================================
	loadFromDatabase($id)
	Loads the information for this class from the backend database
	using the passed string.
	============================================================*/
	function loadFromDatabase($id)
	{
		global $sql;
		$id = sql::Escape($id);
		$row = $sql->QueryRow("SELECT * FROM dkp_servers WHERE id='$id'");
		$this->loadFromRow($row);
	}

	/*===========================================================
	loadFromDatabase($id)
	Loads the information for this class from the backend database
	using the passed string.
	============================================================*/
	function loadFromDatabaseByName($name)
	{
		global $sql;
		$name = sql::Escape($name);
		$row = $sql->QueryRow("SELECT * FROM dkp_servers WHERE name='$name'");
		$this->loadFromRow($row);
	}
	/*===========================================================
	loadFromRow($row)
	Loads the information for this class from the passed database row.
	============================================================*/
	function loadFromRow($row)
	{
		$this->id=$row["id"];
		$this->name = $row["name"];
	}
	/*===========================================================
	save()
	Saves data into the backend database using the supplied id
	============================================================*/
	function save()
	{
		global $sql;
		$name = stripSlashes($this->name);
		$name = addSlashes($name);
		$sql->Query("UPDATE dkp_servers SET
		          name = '$name'
		          WHERE id='$this->id'");
	}
	/*===========================================================
	saveNew()
	Saves data into the backend database as a new row entry. After
	calling this method $id will be filled with a new value
	matching the new row for the data
	============================================================*/
	function saveNew()
	{
		global $sql;
		$name = stripSlashes($this->name);
		$name = addSlashes($name);
		$sql->Query(" INSERT INTO dkp_servers SET
		          name = '$name'
		          ");
		$this->id=$sql->QueryItem("SELECT id FROM dkp_servers ORDER BY ID DESC");
	}
	/*===========================================================
	delete()
	Deletes the row with the current id of this instance from the
	database
	============================================================*/
	function delete()
	{
		global $sql;
		$sql->Query("DELETE FROM dkp_servers WHERE id = '$this->id'");
	}
	/*===========================================================
	exists()
	Deletes the row with the current id of this instance from the
	database
	============================================================*/
	function exists($name)
	{
		global $sql;
		$name = sql::Escape($name);

		$result = $sql->QueryItem("SELECT id FROM dkp_servers WHERE name='$name'");
		return ($result!="");
	}
	/*===========================================================
	setupTable()
	Checks to see if the classes database table exists. If it does not
	the table is created.
	============================================================*/
	function setupTable()
	{

		if(!sql::TableExists(dkpServer::tablename)) {
			$tablename = dkpServer::tablename;
			global $sql;
			$sql->Query("CREATE TABLE `$tablename` (
						`id` INT NOT NULL AUTO_INCREMENT ,
						`name` VARCHAR (32) NOT NULL,
						PRIMARY KEY ( `id` ),
            KEY `name` (`name`)
						) ENGINE = innodb;");
		}
	}
}
dkpServer::setupTable();
?>
