<?php
require_once 'lib/CsvFile.php';
require_once 'lib/DataTable.php';
require_once 'core/Update.php';

class UpdatesDB {
	private $updates = array();
	private $latest_version = '';

	private function __construct() {
		$data = DataTable::constructFromCsvFile(new CsvFile('data/updates.csv'))->get();
		foreach ($data as $row) {
			$year = $row['year'];
			$month = $row['month'];
			$day = $row['day'];
			$version = $year.'-'.$month.'-'.$day;
			$change = $row['change'];
			if (!isset($this->updates[$version])) {
				$update = new Update($year, $month, $day);
				$this->updates[$version] = $update;
				$this->latest_version = $update->getVersion();
			}
			$this->updates[$version]->addChange($change);
		}
	}

	public static function getInstance() {
		static $instance = NULL;
		if (!isset($instance))
			$instance = new UpdatesDB();
		return $instance;
	}

	public function getUpdates() {
		return $this->updates;
	}

	public function getLatestVersion() {
		return $this->latest_version;
	}
}
?>
