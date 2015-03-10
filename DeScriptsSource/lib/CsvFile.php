<?php
require_once 'FileNotFoundException.php';

class CsvFile {
	protected $file;
	protected $length;
	protected $field_separator;
	protected $use_field_names;
	protected $field_names;

	/**
	 * Creates an object for reading CSV file
	 * @param string $file_path Path to the CSV file
	 * @param boolean $has_field_names Flag, whether the first row should be loaded as fielad names
	 * @param int $length Max length of the row (0 = unlimited)
	 * @param char $field_separator Separator between fields
	 * @throws FileNotFoundException
	 * @throws Exception
	 */
	public function __construct($file_path, $has_field_names = true, $length = 0, $field_separator = ';') {
		if (!file_exists($file_path))
			throw new FileNotFoundException($file_path);
		$this->file = fopen($file_path, 'r');
		if ($this->file === false)
			throw new Exception('Cannot open CSV file: '.$file_path);
		$this->length = (int) $length;
		$this->field_separator = (string) $field_separator;

		if ($has_field_names) {
			// try to load field names, if it fails, do not use them
			$this->use_field_names = $this->loadFieldNames();
		}
	}

	public function __destruct() {
		fclose($this->file);
	}

	/**
	 * Loads the next row of the CSV file
	 * @param boolean $use_field_names Whether field names-indexed array should be returned
	 * @return [string] Values from the next row in the CSV
	 */
	public function getNextRow() {
		$row = $this->loadNextRow();
		if ($row !== false && $row !== NULL && $this->use_field_names)
			return $this->applyFieldNamesToRow($row);
		return $row;
	}

	/**
	 * Resets the file cursor
	 */
	public function reset() {
		rewind($this->file);
		if ($this->use_field_names)
			$this->loadNextRow ();
	}

	/**
	 * Returns the next CSV row in an array
	 * @return [string] Values in the next row
	 */
	private function loadNextRow() {
		return fgetcsv($this->file, $this->length, $this->field_separator);
	}

	/**
	 * Loads the next row and set the values as field names
	 * @return boolean Whether row was succesfully loaded as field nams
	 */
	private function loadFieldNames() {
		$row = $this->loadNextRow();
		if ($row === false)
			return false;
		$this->field_names = $row;
		return true;
	}

	/**
	 * Applies field names to the array
	 * @param [string] $row Integer-indexed array
	 * @return [string] Field names-indexed array
	 */
	private function applyFieldNamesToRow($row) {
		$indexed_row = array();
		foreach ($row as $index => $column)
			$indexed_row[$this->field_names[$index]] = $column;
		return $indexed_row;
	}
}
?>
