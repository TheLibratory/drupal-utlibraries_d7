<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

  <div id="page" role="document">
    <header id="header" role="banner" class="clearfix">
    <div class="top-branding">
      <a href="http://www.utexas.edu" title="The University of Texas">
        <img src="<?php print render($theme_path); ?>/images/tower-header.jpg" alt="The University of Texas" class="tower-header"/>
      </a>
      <?php print render($page['header_prefix']); ?>
    </div>
    <div id="name-and-slogan" class="gradient">
        <h1 id="site-name">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
        </h1>
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php ($site_name)? print $site_name . t('&nbsp;Home') : print t('Home'); ?>" rel="home" id="logo">
          <img id="site-name-image" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <h3 id="site-slogan"><?php print $site_slogan; ?></h3>
      <?php endif; ?>
        <img id="site-slogan-image" src="<?php print render($theme_path); ?>/images/slogan.png" />
    </div><!-- #name-and-slogan -->

      <?php print render($page['header']); ?>

      <?php print render($page['header_suffix']); ?>

    <!-- navigation -->
    <?php if ($page['navigation']) :?>
      <?php print render($page['navigation']); ?>
    <?php endif; ?>

    </header>

    <!-- #content-prefix -->
    <?php if ($page['main_prefix']) :?>
      <?php print render($page['main_prefix']); ?>
    <?php endif; ?>

    <?php print $breadcrumb; ?>
    
    <div id="main" role="main" class="clearfix">

      <div id="content" role="article" class="column">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <article>
          <div class="content-group">
          <h3>Welcome to the new Drupal 7 home of the UT Libraries website!</h3>
          <p>If you wound up here, you probably need to login to the system to begin doing fun stuff.  Look for the "Login" link at the bottom right of this page, next to the UT Direct logo.  Click that and then login with your EID and you'll be off and running!</p>
          <p>  -- Your Friendly Neighborhood Webmaster</p>
          </div>
        </article>
        <?php print $feed_icons; ?>
      </div>

    </div><!-- #main -->

    <!-- #content-suffix -->
    <?php if ($page['main_suffix']) :?>
      <?php print render($page['main_suffix']); ?>
    <?php endif; ?>

    <?php print render($page['footer']); ?>

  </div><!-- #page -->
      <?php if ($messages): ?>
        <div id="messages" role="alertdialog"><?php print $messages; ?></div>
      <?php endif; ?>