<?php
namespace PostType\Taxonomy;

/**
 * Class Builder Taxonomy
 * Para la creación facil de Taxonomy
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
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);

	/**
	 * Postypes by taxonomy
	 * @var array
	 */
	private $post_types = array();

	/**
	 * Label by taxonomy
	 * @var array
	 */
	private $label = array();

	/**
	 * Contructor Builder Taxonomy
	 * @param string    $singular
	 * @param mixed     $plural
	 * @param mixed     $options
	 * @param mixed     $labels
	 */
	public function __construct($post_types, $singular, $plural = NULL, $options = NULL, $labels = NULL) {

		if (!is_string($singular)) {
			throw new \Exception("Invalid sigular name provided as first argument: " . $singular, 1);
		}

		$this->singular = strtolower($singular);

		$this->plural = strtolower($plural);

        $this->post_types = $post_types;

		if ($options && is_array($options)) {
			$this->options = array_merge($this->options, $options);
		}

		$this->_setLabel($labels);

		$this->register();
	}

    /**
     * Facade
     * @return void
     */
    public static function make($post_types, $singular, $plural = NULL, $options = NULL, $labels = NULL) {
        new self($post_types, $singular, $plural = NULL, $options = NULL, $labels = NULL);
    }

    /**
     * Register the Taxonomy
     * @return void
     */
    private function register() {

        $this->options['labels'] = $this->label;
        if (!isset($this->options['rewrite'])) {
            $this->options['rewrite'] = array('slug' => $this->singular);
        }

        $_self = &$this;

        add_action('init', function () use (&$_self) {
            register_taxonomy($_self->singular, $_self->post_types, $this->options);
        });

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
	public function getLabel() {
		return $this->label;
	}


    /**
     * Sets the Singular name for post type.
     *
     * @param string $singular the singular
     *
     * @return self
     */
    private function _setSingular($singular)
    {
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
    private function _setPlural($plural)
    {
        $this->plural = $plural;

        return $this;
    }

    /**
     * Sets the The ending of plural.
     *
     * @param string $plural_end the plural end
     *
     * @return self
     */
    private function _setPluralEnd($plural_end)
    {
        $this->plural_end = $plural_end;

        return $this;
    }

    /**
     * Sets the The labels for post type.
     *
     * @param array $label the label
     *
     * @return self
     */
    private function _setLabel(array $label)
    {
        if ($label && is_array($label)) {
            $this->label = $label;
            return true;
        }

        $singular = $this->singular;
        $plural = $this->plural ?: $singular . $this->plural_end;

        $this->label = array(
            'name' => ucfirst($plural),
            'singular' => ucfirst($singular),
            'menu_name' => ucfirst($singular),
            'all_items' => __('All', 'wba_taxonomy') . ' ' . $plural,
            'parent_item' => __('Parent', 'wba_taxonomy') . ' ' . $singular,
            'parent_item_colon' => __('Parent', 'wba_taxonomy') . ' ' . $singular,
            'new_item_name' => __('New', 'wba_taxonomy') . ' ' . $singular,
            'add_new_item' => __('Add New', 'wba_taxonomy') . ' ' . $singular,
            'edit_item' => __('Edit', 'wba_taxonomy') . ' ' . $singular,
            'update_item' => __('Update', 'wba_taxonomy') . ' ' . $singular,
            'view_item' => __('View', 'wba_taxonomy') . ' ' . $singular,
            'separate_items_with_commas' => __('Separate', 'wba_taxonomy') . strtolower($singular) . ' ' . __('with commas', 'wba_taxonomy'),
            'add_or_remove_items' => __('Add or remove', 'wba_taxonomy') . strtolower($singular),
            'choose_from_most_used' => __('Choose from the most used', 'wba_taxonomy'),
            'popular_items' => ucfirst(($plural),
            'search_items' => __('Search', 'wba_taxonomy') . ' ' . $singular,
            'not_found' => __('Not Found', 'wba_taxonomy'),
            'no_terms' => __('No', 'wba_taxonomy') . ' ' . $singular,
            'items_list' => ucfirst(($singular) . ' ' . __('list', 'wba_taxonomy'),
            'items_list_navigation' => ucfirst(($singular) . ' ' . __('list navigation', 'wba_taxonomy'),
        );

        return true;
    }

    /**
     * Sets the Default arguments for post type.
     *
     * @param array $options the options
     *
     * @return self
     */
    private function _setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

}
