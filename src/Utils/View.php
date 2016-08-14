<?php
namespace PostType\Utils;

/**
 * Class View Render Template Mustache
 * Render template by metabox
 */
class View {

	/**
	 * Nombre de la vista a renderizar
	 * @var string
	 */
	private $view = "";

	/**
	 * Argumentos pasados a la vista
	 * @var array
	 */
	private $args = array();

	/**
	 * Path de donde se encuentra la vista
	 * @var string
	 */
	private $pathView = "";

	function __construct() {

		$this->pathView = _DIR_;

	}

	public function render($view, $args = array()) {

	}
}
