<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.50583000 1385078694";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:51:"C:\xampp\htdocs\WEBPROJ\app\templates\@layout.latte";i:2;i:1385078691;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\xampp\htdocs\WEBPROJ\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '32yi5bw6ny')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbabb5ac9c2c_head')) { function _lbabb5ac9c2c_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbf665acd4b2_scripts')) { function _lbf665acd4b2_scripts($_l, $_args) { extract($_args)
?>		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-1.10.2.min.js"></script>
		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-1.10.2.min-ui.js"></script>
		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/forum-jquery.js"></script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" />

	<title><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'title', $template->getParameters()) ?> | WebProj Forum</title>

	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

		
</head>

<body>
<?php if ($user->isLoggedIn()): ?>
	<div class="header">
		
		
			<div class="h-top">
				<div class="h-inner">
					<div class="logged">
						<span><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->login, ENT_NOQUOTES) ?>
</span><a class="logon-icon icon-logout" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
"></a><a class="logon-icon icon-user"></a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="h-bottom">
				<div class="h-inner">
					<div class="h-left">
						<div class="logo"></div>
					</div>
					
					<div class="h-right">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("searchForm") ? "searchForm" : $_control["searchForm"]), array()) ?>
							<div class="search-box">								
									<div class="search-input-box">
										<?php $_input = is_object("query") ? "query" : $_form["query"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("query") ? "query" : $_form["query"]); echo $_input->getControl()->addAttributes(array('class'=>"search-input", 'placeholder'=>$form['query']->caption)) ?>
</label>
									</div>
									<div class="search-submit-box">
<?php $_input = (is_object("submit") ? "submit" : $_form["submit"]); echo $_input->getControl()->addAttributes(array('class'=>"search-submit")) ?>
									</div>													
							</div>
							
							<div id="settings-btn" class="settings-btn">
								<a id="toggle-settings"></a>
								<div id="settings" class="settings">
									<ul class="settings-ul">										
										<li><?php $_input = is_object("ch_topics") ? "ch_topics" : $_form["ch_topics"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("ch_topics") ? "ch_topics" : $_form["ch_topics"]); echo $_input->getControl()->addAttributes(array('class'=>"chbox", 'checked'=>"checked")) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($form['ch_topics']->caption, ENT_NOQUOTES) ?>
</label></li>
										<li><?php $_input = is_object("ch_posts") ? "ch_posts" : $_form["ch_posts"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("ch_posts") ? "ch_posts" : $_form["ch_posts"]); echo $_input->getControl()->addAttributes(array('class'=>"chbox", 'checked'=>"checked")) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($form['ch_posts']->caption, ENT_NOQUOTES) ?>
</label></li>
										<li><?php $_input = is_object("ch_sections") ? "ch_sections" : $_form["ch_sections"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("ch_sections") ? "ch_sections" : $_form["ch_sections"]); echo $_input->getControl()->addAttributes(array('class'=>"chbox")) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($form['ch_sections']->caption, ENT_NOQUOTES) ?>
</label></li>
										<li><?php $_input = is_object("ch_comments") ? "ch_comments" : $_form["ch_comments"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("ch_comments") ? "ch_comments" : $_form["ch_comments"]); echo $_input->getControl()->addAttributes(array('class'=>"chbox")) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($form['ch_comments']->caption, ENT_NOQUOTES) ?>
</label></li>
										<li><?php $_input = is_object("ch_users") ? "ch_users" : $_form["ch_users"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array())->startTag() ;$_input = (is_object("ch_users") ? "ch_users" : $_form["ch_users"]); echo $_input->getControl()->addAttributes(array('class'=>"chbox")) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($form['ch_users']->caption, ENT_NOQUOTES) ?>
</label></li>
									</ul>
								</div>
							</div>
							
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>							
	</div>	
<?php endif ?>
		
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
		
</body>
</html>
