<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.GeekHub
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');

JHtml::_('behavior.framework', true);

// Get params
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;
$config = JFactory::getConfig();
$this->setGenerator('GeekHub official site');

$bootstrap = explode(',', $templateparams->get('bootstrap'));
$jinput = JFactory::getApplication()->input;
$option = $jinput->get('option', '', 'cmd');

if (in_array($option, $bootstrap))
{
	// Load optional rtl Bootstrap css and Bootstrap bugfixes
	JHtmlBootstrap::loadCss($includeMaincss = true, $this->direction);
}

JHtml::_('bootstrap.framework');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>

        <jdoc:include type="head" />

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/stepcarousel.js"></script>
        <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/googlemap.js"></script>
        <script type="text/javascript">
            var media_slider_gallery = {
                galleryid: 'media_slider',
                beltclass: 'content',
                panelclass: 'slide',
                autostep: {enable:false, moveby:1, pause:5000},
                panelbehavior: {speed:500, wraparound:true, wrapbehavior:'pushpull|slide', persist:true},
                defaultbuttons: {enable: false, moveby: 1, leftnav: ['images/slide_btn.png.png', -5, 80], rightnav: ['images/slide_btn.png.png', -20, 80]},
                statusvars: ['statusA', 'statusB', 'statusC'],
                contenttype: ['inline']
            };
            stepcarousel.setup(media_slider_gallery);

            var features_gallery = {
                galleryid: 'features',
                beltclass: 'content',
                panelclass: 'slide',
                autostep: {enable:true, moveby:1, pause:5000},
                panelbehavior: {speed:500, wraparound:true, wrapbehavior:'pushpull|slide', persist:true},
                defaultbuttons: {enable: false, moveby: 1, leftnav: ['images/slide_btn.png.png', -5, 80], rightnav: ['images/slide_btn.png.png', -20, 80]},
                statusvars: ['statusA', 'statusB', 'statusC'],
                contenttype: ['inline']
            };
            stepcarousel.setup(features_gallery);

        </script>



	</head>

    <body
        <?php
            if ( JURI::current() != JURI::base() ) { echo 'class="inner"'; }
            if ( JURI::current() == JURI::base()."contacts.html" ) { echo 'onload="initialize()"'; }
        ?>
    >
    <div id="wrap">
        <div id="header">
            <div><a class="logo" href="<?php echo $this->baseurl ?>">GeekHub</a></div>
            <jdoc:include type="modules" name="main-menu" />
            <ul class="links">
                <li class="fb"><a href="http://www.facebook.com/pages/GeekHub/158983477520070">facebook</a></li>
                <li class="vk"><a href="http://vkontakte.ru/geekhub">Вконтакте</a></li>
                <li class="tw"><a href="http://twitter.com/#!/geek_hub">twitter</a></li>
                <li class="yb"><a href="http://www.youtube.com/user/GeekHubchannel">youtube</a></li>
                <li class="v"><a href="http://vimeo.com/user8452244">vimeo</a></li>
            </ul>
            <span class="line"></span>

            <?php if ( JURI::current() == JURI::base() ) { ?>
                <h4 class="registration">Нажаль, реєстрацію на другий сезон вже зачинено. Чекаємо на Вас наступного року!</h4>
                <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/splash.png" alt="splash" />
            <?php } ?>
        </div><!-- header -->

        <div id="content">
            <div class="<?php $currentMenu = JSite::getMenu()->getActive(); echo $currentMenu->alias; ?>">
                <jdoc:include type="message" />
                <jdoc:include type="component" />

                <?php if (JURI::current() == JURI::base() ) { ?>
                    <ul class="social_share">
                        <li id="vk">
                            <script type="text/javascript">
                                VK.Widgets.Group("vk", {mode: 0, width: "276", height: "240"}, 30111409);
                            </script>
                        </li>
                        <li class="sertificates_list">
                            <h4><a href="certified-professionals.html">Сертифiкованi професiонали</a></h4>
                        </li>
                        <li>
                            <h4>Наші Спонсори</h4>
                            <ul>
                                <li class="de"><a href="http://povnahata.com">Дім Євангелія</a></li>
                                <li class="moc"><a href="http://masterofcode.com">Masterofcode LTD</a></li>
                                <li class="sergium"><a href="http://sergium.net">SerGium.net</a></li>
                                <li class="clear left stuff"><a href="http://val.co.ua/">val.co.ua/</a></li>
                                <li class="youthog"><a href="http://yothog.com">Youthog.com</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </div><!-- content -->

        <ul id="footer">
            <li>
                <jdoc:include type="modules" name="footer-menu" />
            </li>
            <li>© Copyright <?php echo date('Y'); ?></li>
        </ul>
    </div>
    </body>
</html>
