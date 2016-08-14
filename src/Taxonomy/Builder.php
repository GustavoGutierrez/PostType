<?php
namespace PostType\Taxonomy;

/**
 * Class Builder Taxonomy
 * Para la creación facil de Taxonomy
 */
class Builder {

	/**
	 * Name taxonomy
	 * @var string
	 */
	private $name = '';

	/**
	 * Postypes by taxonomy
	 * @var array
	 */
	private $post_types = array();

	/**
	 * Label by taxonomy
	 * @var array
	 */
	private $labels = array();

	function __construct() {

	}

	/**
	 * Gets the Name taxonomy.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the Name taxonomy.
	 *
	 * @param string $name the name
	 *
	 * @return self
	 */
	private function _setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Gets the Postypes by taxonomy.
	 *
	 * @return array
	 */
	public function getPostTypes() {
		return $this->post_types;
	}

	/**
	 * Sets the Postypes by taxonomy.
	 *
	 * @param array $post_types the post types
	 *
	 * @return self
	 */
	private function _setPostTypes(array $post_types) {
		$this->post_types = $post_types;

		return $this;
	}

	/**
	 * Gets the Label by taxonomy.
	 *
	 * @return array
	 */
	public function getLabels() {
		return $this->labels;
	}

	/**
	 * Sets the Label by taxonomy.
	 *
	 * @param array $labels the labels
	 *
	 * @return self
	 */
	private function _setLabels(array $labels) {
		$this->labels = $labels;

		return $this;
	}
}
