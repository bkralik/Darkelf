<?php
require_once 'CsvFile.php';

class DataTable {
	private $data;

	private function __construct($data) {
		$this->data = $data;
	}

	public static function constructFromCsvFile($csv_file) {
		if (!$csv_file instanceof CsvFile)
			throw new InvalidArgumentException();
		$data = array();
		while (($row = $csv_file->getNextRow()) !== false)
			$data[] = $row;
		return new DataTable($data);
	}

	public function get($filters = array(), $distinct = false) {
		$result = array();
		foreach ($this->data as $entry) {
			foreach ($filters as $key => $value) {
				if ($entry[$key] != $value) {
					continue 2;
				}
			}
			if ($distinct && in_array($entry, $result))
				continue;
			$result[] = $entry;
		}
		return $result;
	}
}
?>
