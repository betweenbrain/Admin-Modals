<?php defined('_JEXEC') or die;

/**
 * File       admin_modals.php
 * Created    3/18/14 10:53 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */
class plgSystemAdmin_modals extends JPlugin
{

	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Constructor.
	 *
	 * @param   object &$subject The object to observe
	 * @param   array  $config   An optional associative array of configuration settings.
	 *
	 * @since   0.1
	 */
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);

		$this->app = JFactory::getApplication();
		$this->db  = JFactory::getDbo();

		if ($this->app->isSite())
		{
			return;
		}

	}

	/**
	 * @return bool
	 */
	function onAfterRoute()
	{
		if ($this->app->input->getInt('admin_modal', 0))
		{

			if ($this->app->input->getInt('modal') == 'articles')
			{
				require_once JPATH_ADMINISTRATOR . '/components/com_content/views/articles/view.html.php';
				include JPATH_PLUGINS . '/system/admin_modals/views/articles.php';
			}
		}
	}
}