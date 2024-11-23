<?php

use Timber\Site;
use Timber\Timber;

class SiteSetup extends Site
{
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_action('init', array($this, 'register_taxonomies'));

		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_filter('timber/twig/environment/options', [$this, 'update_twig_environment_options']);

		parent::__construct();
	}

	public function add_to_context($context)
	{
		$context['site']  = $this;
    $context['temp_dir_uri'] = get_template_directory_uri();

    /* *!* Get  menus
    $context['menu']  = Timber::get_menu();

    *!* For multiple:
    $context['headermenu'] = Timber::get_menu('headermenu');
    $context['footermenu'] = Timber::get_menu('footermenu');
    */

    // *!* Query CPT
    // $context['projects'] = Timber::get_posts( [ 'post_type' => 'project' ] );


		return $context;
	}

	public function theme_supports()
	{
		// Add default posts and comments RSS feed links to head.
		//add_theme_support('automatic-feed-links');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
    add_theme_support('custom-spacing');
    add_theme_support('align-wide');
    add_theme_support( 'editor-styles');

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

    add_theme_support('menus');

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats

		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);
    */
	}

	/**
	 * This is where you can add your own functions to twig.
	 *
	 * @param Twig\Environment $twig get extension.
	 */
	public function add_to_twig($twig)
	{
		/**
		 * Required when you want to use Twig’s template_from_string.
		 * @link https://twig.symfony.com/doc/3.x/functions/template_from_string.html
		 */
		// $twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		// $twig->addFilter(new \Twig\TwigFilter('myfoo', [$this, 'myfoo']));

		return $twig;
	}

	/**
	 * Updates Twig environment options.
	 *
	 * @link https://twig.symfony.com/doc/2.x/api.html#environment-options
	 *
	 * @param array $options An array of environment options.
	 *
	 * @return array
	 */
	function update_twig_environment_options($options)
	{
		// $options['autoescape'] = true;

		return $options;
	}
}
