<?php
namespace PostType\PostType;

/**
 * Class Builder PostType
 * Para la creación facil de posttypes
 */
class Builder {
	/**
	 * Labels for postypes
	 * @var array
	 */
	private $labels = array();

	/**
	 * Define if the posttype is public
	 * @var boolean
	 */
	private $public = true;

	/**
	 * Indica si el posttype is artchive
	 * @var boolean
	 */
	private $has_archive = false;

	function __construct() {

	}

	/**
	 * Gets the Labels for postypes.
	 *
	 * @return array
	 */
	public function getLabels() {
		return $this->labels;
	}

	/**
	 * Sets the Labels for postypes.
	 *
	 * @param array $labels the labels
	 *
	 * @return self
	 */
	private function _setLabels(array $labels) {
		$this->labels = $labels;

		return $this;
	}

	/**
	 * Gets the Define if the posttype is public.
	 *
	 * @return boolean
	 */
	public function getPublic() {
		return $this->public;
	}

	/**
	 * Sets the Define if the posttype is public.
	 *
	 * @param boolean $public the public
	 *
	 * @return self
	 */
	private function _setPublic($public) {
		$this->public = $public;

		return $this;
	}

	/**
	 * Gets the Indica si el posttype is artchive.
	 *
	 * @return boolean
	 */
	public function getHasArchive() {
		return $this->has_archive;
	}

	/**
	 * Sets the Indica si el posttype is artchive.
	 *
	 * @param boolean $has_archive the has archive
	 *
	 * @return self
	 */
	private function _setHasArchive($has_archive) {
		$this->has_archive = $has_archive;

		return $this;
	}
}
