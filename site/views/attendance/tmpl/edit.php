<?php
defined('_JEXEC') or die;
// include the genderapi js plugin
$document = JFactory::getDocument();
$document->addScript('https://gender-api.com/js/jquery/gender.js');
?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&view=attendance&layout=edit&attendanceID='.(int) $this->item->attendanceID); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span10 form-horizontal">
	<?php echo $this->addToolbar(); ?>

	    <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>



      <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', empty($this->item->attendanceID) ? JText::_('COM_CLUBMANAGER_NEW_ATTENDANCE', true) : JText::sprintf('COM_CLUBMANAGER_EDIT_ATTENDANCE', $this->item->attendanceID, true)); ?>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('arrived'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('arrived'); ?></div>
          <div class="control-label"><?php echo $this->form->getLabel('departed'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('departed'); ?></div>
        </div>
	<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('firstname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('firstname'); ?></div>
          <div class="control-label"><?php echo $this->form->getLabel('surname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('surname'); ?></div>
        </div>

	<?php $user = JFactory::getUser(); ?>
	<?php echo("<input type='hidden' name='registeredbyID' value='".$user->id."' />"); ?>
        <?php echo("<input type='hidden' name='attendanceID' value='".$this->item->attendanceID."' />"); ?>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
	        <?php echo JHtml::_('bootstrap.endTab'); ?>
    </fieldset>


	    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'comments', JText::_('COM_CLUBMANAGER_ATTENDANCE_TAB_1_NAME', true)); ?>
            <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('comments'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('comments'); ?></div>
          
        </div>
	    <?php echo JHtml::_('bootstrap.endTab'); ?>

	    <?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
  </div>
</form>