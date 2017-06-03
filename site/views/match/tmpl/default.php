<?php defined('_JEXEC') or die; ?>

<div class=cmmatchtest >
   <?php foreach ($this->items as $item) : ?>
      <div >
         <div >
            <?php echo $item->pushback; ?>
         </div>
         <div>
		 <?php echo JText::_('COM_CLUBMANAGER_HOMETEAM');?><?php echo $item->hometeamname; ?>
		 <div>
            
               <img src="<?php echo $item->hometeamlogo; ?>">
            
         </div>
         
      </div>
   <?php endforeach; ?>
</div>