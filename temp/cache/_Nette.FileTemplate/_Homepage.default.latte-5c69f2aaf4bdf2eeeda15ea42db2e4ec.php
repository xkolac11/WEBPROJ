<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.15068300 1387233507";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"C:\xampp\htdocs\WEBPROJ\app\templates\Homepage\default.latte";i:2;i:1387233505;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: C:\xampp\htdocs\WEBPROJ\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'vrs80aes63')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf411789760_title')) { function _lbf411789760_title($_l, $_args) { extract($_args)
?>Home<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6460fdc60c_content')) { function _lb6460fdc60c_content($_l, $_args) { extract($_args)
?><div class="content">
	
	<div class="breadcrumbs">
<?php $_ctrl = $_control->getComponent("navigation"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->renderBreadcrumbs() ?>
	</div>
		
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($results) as $r): ?>
		<div class="section-box">
			<div class="section-header <?php echo htmlSpecialChars($iterator->odd? 'sh-odd' : 'sh-even') ?>
" id=""><span><?php echo Nette\Templating\Helpers::escapeHtml($r['section']->title, ENT_NOQUOTES) ?></span><div class="section-toggle on"></div></div>
				
			<div class="section-content visible">
<?php if ($r['forums_count'] > 0): ?>
					<div class="forums-box">			
						<table class="forum-table">
							<tr class="ft-first"><th></th><th>Fórum</th><th>Témata</th><th>Příspěvky</th><th>Poslední příspěvek</th></tr>
<?php $iterations = 0; foreach ($r['forums'] as $f): ?>
							
								<tr class="ft-others">
									<td class="ft-icon">
										<div class="forum-icon icon-forum"></div>
									</td>
									<td class="ft-forum">
										<div class="forum-title"><a href=<?php echo Nette\Templating\Helpers::escapeHtml($_control->link("Forum:show", array($f->f_id)), ENT_NOQUOTES) ?>
><?php echo Nette\Templating\Helpers::escapeHtml($f->title, ENT_NOQUOTES) ?></a></div>
										<div class="forum-description"><?php echo Nette\Templating\Helpers::escapeHtml($f->description, ENT_NOQUOTES) ?></div>
									</td>
									<td class="ft-topics">
										<?php echo Nette\Templating\Helpers::escapeHtml($f->topics_count, ENT_NOQUOTES) ?>

									</td>
									<td class="ft-posts">
										<?php echo Nette\Templating\Helpers::escapeHtml($f->posts_count, ENT_NOQUOTES) ?>

									</td>
									<td class="ft-last">
										
<?php if ($f->last_user != NULL && $f->last_topic != NULL && $f->last_datetime != NULL): ?>
											<div class="ft-last-icon">
											</div>
											<div class="ft-last-details">
												<span><a href="#" class="user-a"><?php echo Nette\Templating\Helpers::escapeHtml($f->last_user, ENT_NOQUOTES) ?></a></span><br />
												<span>v <a href="#" class="topic-a"><?php echo Nette\Templating\Helpers::escapeHtml($f->last_topic, ENT_NOQUOTES) ?></a></span><br />
												<span class="last-datetime"><?php echo Nette\Templating\Helpers::escapeHtml($f->last_datetime, ENT_NOQUOTES) ?></span>
											</div>
											<div class="clear"></div>
<?php else: ?>
											<span class="ft-last-none">Fórum neobsahuje žádné příspěvky.</span>									
<?php endif ?>
																				
									</td>
								</tr>
															
<?php $iterations++; endforeach ?>
						</table>
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