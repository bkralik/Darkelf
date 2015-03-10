<?php
class Update {
	private $year, $month, $day;
	private $changes = array();

	public function __construct($year, $month, $day, $changes = array()) {
		$this->year = $year;
		$this->month = $month;
		$this->day = $day;
		$this->changes = $changes;
	}

	public function getYear() {
		return $this->year;
	}

	public function getMonth() {
		return $this->month;
	}

	public function getDay() {
		return $this->day;
	}

	public function getVersion() {
		return $this->year.'.'.$this->month.
			($this->day != '' ? '.'.$this->day : '');
	}

	public function getChanges() {
		return $this->changes;
	}

	public function addChange($change) {
		$this->changes[] = $change;
	}

	/**
	 * Returns a String with unordered list of changes for the update
	 * @param String $indentation String of characters prepended on every line
	 * @return String UL HTML code with update changes
	 */
	public function getChangesAsHTML($indentation = '') {
		if (count($this->changes) < 1)
			return '';
		return
			$indentation.'<ul>'.PHP_EOL.
			$indentation."\t".'<li>'.implode('</li>'.PHP_EOL.$indentation."\t".'<li>', $this->changes).'</li>'.PHP_EOL.
			$indentation.'</ul>';
	}
}
?>
