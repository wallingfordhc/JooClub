<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&layout=edit&groupID='.(int) $this->item->groupID); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
  <div class="row-fluid">
    <div class="span10 form-horizontal">

  <fieldset>
    <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

      <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->groupID) ? JText::_('COM_CLUBMANAGER_NEW_GROUP', true) : JText::sprintf('COM_CLUBMANAGER_EDIT_GROUP', $this->item->groupID, true)); ?>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('groupname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('groupname'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('grouplogo'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('grouplogo'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
        </div>
      <?php echo JHtml::_('bootstrap.endPanel'); ?>

      <input type="hidden" name="task" value="" />
      <?php echo JHtml::_('form.token'); ?>

    <?php echo JHtml::_('bootstrap.endPane'); ?>
    </fieldset>
    </div>
  </div>
</form>