<?php defined('SYSPATH') OR die('No direct script access.');
/**
* create_table($table_name, $fields, array('id' => TRUE, 'options' => ''))
* drop_table($table_name)
* rename_table($old_name, $new_name)
* add_column($table_name, $column_name, $params)
* rename_column($table_name, $column_name, $new_column_name)
* change_column($table_name, $column_name, $params)
* remove_column($table_name, $column_name)
* add_index($table_name, $index_name, $columns, $index_type = 'normal')
* remove_index($table_name, $index_name)
*/
class Add_Parent_In_Roles extends Migration
{
	public function up()
	{
		$table_name = Kohana::$config->load('acl')->get('db_tables.roles', 'roles');

		$this->add_column($table_name, 'parent_id',
			array(
				'type' 		=> 'int(10)',
				'null' 		=> FALSE,
				'unsigned' 	=> TRUE,
				'default' 	=> 0
			)
		);
	}

	public function down()
	{
		$table_name = Kohana::$config->load('acl')->get('db_tables.roles', 'roles');
		$this->remove_column($table_name, 'parent_id');
	}
}
