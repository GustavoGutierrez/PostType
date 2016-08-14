<?php
namespace PostType\MetaBox;

/**
 * Class Builder MetaBox
 * Para la creación facil de metabox
 */
class Builder {
	/**
	 * Unique Id for metabox
	 * @var string
	 */
	private $id;

	/**
	 * Title of the meta box.
	 * @var string
	 */
	private $title;

	/**
	 *  Function that fills the box with the desired content.
	 *  The function should echo its output.
	 * @var callable
	 */
	private $callback;

	/**
	 * The screen or screens on which to show the box
	 * (such as a post type, 'link', or 'comment').
	 * Accepts a single screen ID, WP_Screen object,
	 * or array of screen IDs.
	 *  Default is the current screen.
	 *  Default value: null
	 * @var null
	 */
	private $screen = null;

	/**
	 * The context within the screen where the boxes should display.
	 * Available contexts vary from screen to screen.
	 * Post edit screen contexts include 'normal', 'side', and 'advanced'.
	 * Comments screen contexts include 'normal' and 'side'.
	 * Menus meta boxes (accordion sections)
	 * all use the 'side' context. Global
	 * @var string
	 */
	private $context = 'advanced';

	/**
	 * The priority within the context where the boxes
	 * should show ('high', 'low').
	 * @var string
	 */
	private $priority = 'default';

	/**
	 * Data that should be set as the $args property of the box
	 * array (which is the second parameter passed to your callback).
	 * @var array
	 */
	private $callback_args = null;

	function __construct() {

	}


    /**
     * Gets the Unique Id for metabox.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the Unique Id for metabox.
     *
     * @param string $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the Title of the meta box.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the Title of the meta box.
     *
     * @param string $title the title
     *
     * @return self
     */
    private function _setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the Function that fills the box with the desired
     * content The function should echo its output.
     *
     * @return callable
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * Sets the Function that fills the box with the desired
     * content The function should echo its output.
     *
     * @param callable $callback the callback
     *
     * @return self
     */
    private function _setCallback(callable $callback)
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * Gets the he screen or screens on which to show
     * the box (such as a post type, 'link', or 'comment')
     * Accepts a single screen ID, WP_Screen object,
     * or array of screen IDs Default is the current screen
     * Default value: null.
     *
     * @return null
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * Sets the The screen or screens on which to show
     * the box (such as a post type, 'link', or 'comment')
     * Accepts a single screen ID, WP_Screen object,
     * or array of screen IDs Default is the current screen
     * Default value: null.
     *
     * @param null $screen the screen
     *
     * @return self
     */
    private function _setScreen(null $screen)
    {
        $this->screen = $screen;

        return $this;
    }

    /**
     * Gets the The context within the screen where the boxes
     * should displayAvailable contexts vary from screen to screen
     * Post edit screen contexts include 'normal', 'side', and 'advanced'
     * Comments screen contexts include 'normal' and 'side'
     * Menus meta boxes (accordion sections)
     * all use the 'side' context. Global.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Sets the The context within the screen where the boxes
     * should display Available contexts vary from screen to screen
     * Post edit screen contexts include 'normal', 'side',
     * and 'advanced' Comments screen contexts include 'normal'
     * and 'side' Menus meta boxes (accordion sections)
     * all use the 'side' context. Global.
     *
     * @param string $context the context
     *
     * @return self
     */
    private function _setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Gets the The priority within the context where the
     * boxes should show ('high', 'low').
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets the The priority within the context where the
     * boxes should show ('high', 'low').
     *
     * @param string $priority the priority
     *
     * @return self
     */
    private function _setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Gets the Data that should be set as the $args property of
     * the box array (which is the second parameter
     * passed to your callback).
     *
     * @return array
     */
    public function getCallbackArgs()
    {
        return $this->callback_args;
    }

    /**
     * Sets the Data that should be set as the $args property of
     * the box array (which is the second parameter passed to
     * your callback).
     *
     * @param array $callback_args the callback args
     *
     * @return self
     */
    private function _setCallbackArgs(array $callback_args)
    {
        $this->callback_args = $callback_args;

        return $this;
    }
}
