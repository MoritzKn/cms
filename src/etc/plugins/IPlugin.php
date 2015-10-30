<?php
namespace Craft;

/**
 * Interface IPlugin
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2014, Pixel & Tonic, Inc.
 * @license   http://buildwithcraft.com/license Craft License Agreement
 * @see       http://buildwithcraft.com
 * @package   craft.app.etc.plugins
 * @since     2.1
 */
interface IPlugin extends ISavableComponentType
{
	// Public Methods
	// =========================================================================

	/**
	 * Returns the plugin’s version number.
	 *
	 * @return string The plugin’s version number.
	 */
	public function getVersion();

	/**
	 * Returns the plugin’s scehma version number.
	 *
	 * Changing the scehma version number tells Craft that there are new migration files that need to be run.
	 *
	 * @return string|null The plugin’s version number, or null if it doesn’t need one
	 */
	public function getSchemaVersion();

	/**
	 * Returns the plugin’s description.
	 *
	 * @return string|null The plugin’s description.
	 */
	public function getDescription();

	/**
	 * Returns the plugin developer’s name.
	 *
	 * @return string The plugin developer’s name.
	 */
	public function getDeveloper();

	/**
	 * Returns the plugin developer’s URL.
	 *
	 * @return string The plugin developer’s URL.
	 */
	public function getDeveloperUrl();

	/**
	 * Returns the locale ID that identifies what language the plugin was written in.
	 *
	 * @return string The plugin’s source language.
	 */
	public function getSourceLanguage();

	/**
	 * Returns whether the plugin has settings.
	 *
	 * @return bool Whether the plugin has settings
	 */
	public function hasSettings();

	/**
	 * Returns the URL to the plugin’s settings page in the CP.
	 *
	 * If your plugin requires a custom settings page, you can use this method to point to it.
	 *
	 * If this method returns anything, it will be run through {@link UrlHelper::getCpUrl()} before getting output,
	 * so a full URL is not necessary.
	 *
	 * If this method doesn’t return anything, a simple settings page will be provided for your plugin,
	 * filled with whatever {@link getSettingsHtml()} returns.
	 *
	 * @return string|null The URL to the plugin’s settings page, if it has a custom one.
	 */
	public function getSettingsUrl();

	/**
	 * Returns whether this plugin has its own section in the CP.
	 *
	 * @return bool Whether this plugin has its own section in the CP.
	 */
	public function hasCpSection();

	/**
	 * Creates any tables defined by the plugin’s records.
	 *
	 * @return void
	 */
	public function createTables();

	/**
	 * Drops any tables defined by the plugin’s records.
	 *
	 * @return void
	 */
	public function dropTables();

	/**
	 * Returns the record classes provided by this plugin.
	 *
	 * @param string|null $scenario The scenario to initialize the records with.
	 *
	 * @return BaseRecord[]
	 */
	public function getRecords($scenario = null);

	/**
	 * Performs any actions that should occur before the plugin is installed.
	 *
	 * @return void
	 */
	public function onBeforeInstall();

	/**
	 * Performs any actions that should occur after the plugin is installed.
	 *
	 * @return void
	 */
	public function onAfterInstall();

	/**
	 * Performs any actions that should occur before the plugin is uninstalled.
	 *
	 * @return void
	 */
	public function onBeforeUninstall();
}
