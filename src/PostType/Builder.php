<?php
namespace PostType\PostType;

/**
 * Class Builder PostType
 * Para la creación facil de posttypes
 */
class Builder {

	/**
	 * Singular name for post type
	 * @var string
	 */
	private $singular;
	/**
	 * Plural name for post type
	 * @var string
	 */
	private $plural;
	/**
	 * The ending of plural
	 * @var string
	 */
	private $plural_end = 's';
	/**
	 * The labels for post type
	 * @var array
	 */
	private $label;
	/**
	 * Default arguments for post type
	 * @var array
	 */
	private $options = array(
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
	);

	/**
	 * Contructor Builder PostType
	 * @param string    $singular
	 * @param mixed     $plural
	 * @param mixed     $options
	 * @param mixed     $labels
	 */
	public function __construct($singular, $plural = NULL, $options = NULL, $labels = NULL) {

		if (!is_string($singular)) {

			throw new \Exception("Invalid sigular name provided as first argument: " . $singular, 1);
		}

		$this->singular = strtolower($singular);

		$this->plural = strtolower($plural);

		if ($options && is_array($options)) {
			$this->options = array_merge($this->options, $options);
		}

		$this->_setLabel($labels);

		$this->register();
	}

	/**
	 * Register the post type
	 * @return void
	 */
	private function register() {

		$this->options['labels'] = $this->label;
		if (!isset($this->options['rewrite'])) {
			$this->options['rewrite'] = array('slug' => $this->singular);
		}

		$_self = &$this;

		add_action('init', function () use (&$_self) {
			register_post_type($_self->singular, $_self->options);
		});

	}

	/**
	 * Construct the labels for post type
	 * @param  mixed $label
	 * @return bool
	 */
	private function _setLabel($label) {
		if ($label && is_array($label)) {
			$this->label = $label;
			return true;
		}

		$singular = $this->singular;
		$plural = $this->plural ?: $singular . $this->plural_end;

		$this->label = array(
			'name' => ucfirst($plural),
			'singular_name' => ucfirst($singular),
			'menu_name' => ucfirst($plural),
			'name_admin_bar' => ucfirst($singular),
			'archives' => ucfirst($singular) . ' ' . __('archive', 'wba_posttype'),
			'parent_item_colon' => __('Parent', 'wba_posttype') . ' ' . ucfirst($plural),
			'all_items' => __('All', 'wba_posttype') . ' ' . $plural,
			'add_new_item' => __('Add new', 'wba_posttype') . ' ' . $singular,
			'add_new' => __('Add new', 'wba_posttype') . ' ' . $singular,
			'new_item' => __('New', 'wba_posttype') . ' ' . $singular,
			'edit_item' => __('Edit', 'wba_posttype') . ' ' . $singular,
			'update_item' => __('Update', 'wba_posttype') . ' ' . $singular,
			'view_item' => __('View', 'wba_posttype') . ' ' . $singular,
			'search_items' => __('Search', 'wba_posttype') . ' ' . $singular,
			'not_found' => __('Not found', 'wba_posttype'),
			'not_found_in_trash' => __('Not found in Trash', 'wba_posttype'),
			'featured_image' => __('Featured Image', 'wba_posttype'),
			'set_featured_image' => __('Set featured image', 'wba_posttype'),
			'remove_featured_image' => __('Remove featured image', 'wba_posttype'),
			'use_featured_image' => __('Use as featured image', 'wba_posttype'),
			'insert_into_item' => __('Insert into', 'wba_posttype') . ' ' . strtolower($singular),
			'uploaded_to_this_item' => __('Uploaded to this', 'wba_posttype') . ' ' . strtolower($singular),
			'items_list' => ucfirst($plural) . ' ' . __('list', 'wba_posttype'),
			'items_list_navigation' => ucfirst($plural) . ' ' . __('list navigation', 'wba_posttype'),
			'filter_items_list' => __('Filter ', 'wba_posttype') . ' ' . strtolower($singular) . ' ' . __('list', 'wba_posttype'),
		);

		return true;
	}

	/**
	 * Facade
	 * @return void
	 */
	public static function make($singular, $plural = NULL, $options = NULL, $labels = NULL) {
		new self($singular, $plural, $options, $labels);
	}

	/**
	 * Sets the The ending of plural.
	 *
	 * @param string $plural_end the plural end
	 *
	 * @return self
	 */
	private function _setPluralEnd($plural_end) {
		$this->plural_end = $plural_end;

		return $this;
	}

	/**
	 * Sets the Singular name for post type.
	 *
	 * @param string $singular the singular
	 *
	 * @return self
	 */
	private function _setSingular($singular) {
		$this->singular = $singular;

		return $this;
	}

	/**
	 * Sets the Plural name for post type.
	 *
	 * @param string $plural the plural
	 *
	 * @return self
	 */
	private function _setPlural($plural) {
		$this->plural = $plural;

		return $this;
	}

	/**
	 * Sets the Default arguments for post type.
	 *
	 * @param array $options the options
	 *
	 * @return self
	 */
	private function _setOptions(array $options) {
		$this->options = $options;

		return $this;
	}
}
