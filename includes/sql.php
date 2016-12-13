<?php
	function startConnection () {
		global $mysqlConnect;

		$mysqlConnect = mysqli_connect('localhost', 'root', '', 'ecv_myblog');

		if (! $mysqlConnect) {
			die('Connection error.');
		}
	}

	function escapeVar ($data) {
		global $mysqlConnect;

		return mysqli_escape_string($mysqlConnect, $data);
	}

	function select ($table, $fields = [], $conditions = '') {
		global $mysqlConnect;
		$sql = 'SELECT ';

		if (empty($fields)) {
			$sql .= '*';
		} else {
			foreach ($fields as $field) {
				if ($field === $fields[0]) {
					$sql .= $field;
				} else {
					$sql .= ',' . $field;
				}
			}
		}

		$sql .= ' FROM ' . $table . ' ' . $conditions;

		$result = mysqli_query($mysqlConnect, $sql);

		if ($result) {
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			var_dump($sql);die;
		}

		return $result;
	}

	function insert ($table, $fields = [], $values, $conditions = '') {
		global $mysqlConnect;
		$sql = 'INSERT INTO ' . $table . ' ';

		if (! empty($fields)) {
			$sql .= '(';

			foreach ($fields as $field) {
				if ($field !== $fields[0]) {
					$sql .= ',';
				}

				$sql .= $field;
			}

			$sql .= ') ';
		}

		$sql .= 'VALUES (';

		for ($i = 0; $i < count($values); $i++) {
			if ($i !== 0) {
				$sql .= ',';
			}

			$sql .= '"' . $values[$i] . '"';
		}

		$sql .= ') ' . $conditions;

		if (mysqli_query($mysqlConnect, $sql)) {
			return mysqli_insert_id($mysqlConnect);
		}

		return false;
	}

	function update ($table, $values = [], $conditions = '') {
		global $mysqlConnect;
		$sql = 'UPDATE ' . $table . ' ';

		$sql .= 'SET ';
		$i = 0;

		foreach ($values as $key => $value) {
			if ($i !== 0) {
				$sql .= ', ';
			}

			$sql .= $key . ' = "' . $value . '"';

			$i++;
		}

		$sql .= ' ' . $conditions;

		$result = mysqli_query($mysqlConnect, $sql);

		if ($result) {
			return true;
		} else {
			var_dump($sql);die;
		}

		return $result;
	}

	function delete ($table, $conditions = '') {
		global $mysqlConnect;

		$sql = 'DELETE FROM ' . $table . ' ' . $conditions;

		return mysqli_query($mysqlConnect, $sql);
	}