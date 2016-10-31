<?php

namespace alesinicio;

/**
 * This class enables the creation and management of circular arrays.
 * Sometimes we need arrays that wrap around, and this should provide enough methods
 * to ease the development process.
 * 
 * 
 * @author alexandre.sinicio
 * @license https://opensource.org/licenses/GPL-3.0 GNU Public License, version 3
 * @package alesinicio\
 * @version 1.0
 * @link https://www.facebook.com/alesinicio
 */
class circularArray {
	private $array;
	private $curIndex	= 0;
	private $totalItems	= 0;
	private $indexes	= [];
	
	/**
	 * Creates a circular array.
	 * The $array parameter may be either an associative or an indexed array.
	 * @param unknown $array
	 */
	public function __construct($array) {
		$this->array		= $array;
		$this->totalItems	= count($array);
		$this->mapKeys();
	}
	/**
	 * Returns the value of the current position of the circular array.
	 * @return mixed
	 */
	public function getCurrentValue() {
		return $this->array[$this->indexes[$this->curIndex]];
	}
	/**
	 * Returns the value of the current position of the circular array
	 * and advances for the next position.
	 * @return unknown
	 */
	public function getCurrentValueAndAdvance() {
		$val = $this->array[$this->indexes[$this->curIndex]];
		$this->next();
		return $val;
	}
	/**
	 * Returns the value of the current position of the circular array
	 * and advances for the next position.
	 * @return unknown
	 */
	public function getCurrentValueAndRewind() {
		$val = $this->array[$this->indexes[$this->curIndex]];
		$this->previous();
		return $val;
	}
	/**
	 * Returns the current index of the circular array.
	 * @return mixed
	 */
	public function getCurrentIndex() {
		return $this->indexes[$this->curIndex];
	}
	/**
	 * Advances for the next position of the circular array and returns
	 * the new value.
	 * @return mixed
	 */
	public function next() {
		$this->curIndex = $this->nextIndex();
		return $this->getCurrentValue();
	}
	/**
	 * Rewind for the previous position of the circular array and returns
	 * the new value.
	 * @return mixed
	 */
	public function previous() {
		$this->curIndex = $this->previousIndex();
		return $this->getCurrentValue();
	}
	/**
	 * Resets the array to the first position and returns the corresponding value.
	 * @return mixed
	 */
	public function reset() {
		$this->curIndex = 0;
		return $this->getCurrentValue();
	}
	/**
	 * Advances $intPositions on the circular array and returns the corresponding value.
	 * @param int $intPositions
	 * @return mixed
	 */
	public function advancePosition($intPositions) {
		for ($i=0; $i<$intPositions; $i++) {
			$this->next();
		}
		return $this->getCurrentValue();
	}
	/**
	 * Rewinds $intPositions on the circular array and returns the corresponding value.
	 * @param int $intPositions
	 * @return mixed
	 */
	public function rewindsPosition($intPositions) {
		for ($i=0; $i<$intPositions; $i++) {
			$this->previous();
		}
		return $this->getCurrentValue();
	}
	/**
	 * Maps the keys of the array and returns an array containing the values found.
	 * $return array;
	 */
	private function mapKeys() {
		$this->indexes = array_keys($this->array);
		return $this->indexes;
	}
	/**
	 * Returns the next position of the circular array;
	 * @return number
	 */
	private function nextIndex() {
		if ($this->curIndex+1 >= $this->totalItems) {
			return 0;
		} else {
			return $this->curIndex+1;
		}
	}
	/**
	 * Returns the previous position of the circular array;
	 * @return number
	 */
	private function previousIndex() {
		if ($this->curIndex <= 0) {
			return $this->totalItems-1;
		} else {
			return $this->curIndex-1;
		}
	}
}