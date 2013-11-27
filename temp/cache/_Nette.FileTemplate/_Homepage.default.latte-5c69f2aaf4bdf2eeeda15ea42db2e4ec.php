<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.15723700 1385588807";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"C:\xampp\htdocs\WEBPROJ\app\templates\Homepage\default.latte";i:2;i:1385588792;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\xampp\htdocs\WEBPROJ\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'f8u0jxsnpb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb4b0406500_title')) { function _lbb4b0406500_title($_l, $_args) { extract($_args)
?>Home<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb94786c8e69_content')) { function _lb94786c8e69_content($_l, $_args) { extract($_args)
?><div class="content">
	
	<div class="breadcrumbs">
		<span><a href=<?php echo Nette\Templating\Helpers::escapeHtml($_control->link("Homepage:"), ENT_NOQUOTES) ?> class="breadcrumbs-node">Hlavní strana</a></span>
	</div>
		
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($results) as $r): ?>
		<div class="section-box">
			<div class="section-header <?php echo htmlSpecialChars($iterator->odd? 'sh-odd' : 'sh-even') ?>
" id=""><span><?php echo Nette\Templating\Helpers::escapeHtml($r['section']->title, ENT_NOQUOTES) ?></span><div class="section-toggle on"></div></div>
				
			<div class="section-content visible">
<?php if ($r['forums_count'] > 0): ?>
					<div class="forums-box">
					
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($r['forums']) as $f): ?>
					
						<div class="forum <?php echo htmlSpecialChars($iterator->last? 'btm-brdr':null) ?>">
							<span class="forum-icon icon-forum"></span>
							<span class="forum-name"><a href="#"><?php echo Nette\Templating\Helpers::escapeHtml($f->title, ENT_NOQUOTES) ?></a></span>
						</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
					</div>
				
<?php else: ?>
					<div class="forums-box">
						<div class="noforum">
							<span class="noforum-icon"></span>
							<span class="noforum-name">Žádná fóra.</span>
						</div>
					</div>
<?php endif ?>
			</div>
		</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			
</div>

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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 