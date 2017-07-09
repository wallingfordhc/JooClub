<?php
defined('_JEXEC') or die;	
?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&layout=edit&personID='.(int) $this->item->personID); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span10 form-horizontal">
	<?php echo $this->addToolbar(); ?>

	    <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>



      <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', empty($this->item->matchID) ? JText::_('COM_CLUBMANAGER_NEW_PLAYER', true) : JText::sprintf('COM_CLUBMANAGER_EDIT_PLAYER', $this->item->personID, true)); ?>
        <fieldset>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('firstname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('firstname'); ?></div>
		  <div class="control-label"><?php echo $this->form->getLabel('surname'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('surname'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('gender'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('gender'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('DOB'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('DOB'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('phonenumber'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('phonenumber'); ?></div>
		  <div class="control-label"><?php echo $this->form->getLabel('email'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('email'); ?></div>
        </div>
	    <div class="control-group">
          <div><img src="<?php echo $this->escape($this->item->profileimage_url); ?>" alt = "<?php echo $this->escape($this->item->profileimage_url); ?>" width=100></div>
          <div class="control-label"><?php echo $this->form->getLabel('profileimage_url'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('profileimage_url'); ?></div>
        </div>
	    <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('memberID'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('memberID'); ?></div>
        </div>

		<?php $user = JFactory::getUser(); ?>
		<?php echo("<input type='hidden' name='memberID' value='".$user->id."' />"); ?>
        <?php echo("<input type='hidden' name='oldprofilephotoimage_url' value='".$this->escape($this->item->profileimage_url)."' />"); ?>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
	        <?php echo JHtml::_('bootstrap.endTab'); ?>
    </fieldset>


	    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'other', JText::_('COM_CLUBMANAGER_PLAYER_TAB_1_NAME', true)); ?>
More detail
	    <?php echo JHtml::_('bootstrap.endTab'); ?>
	    <?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
  </div>
</form>