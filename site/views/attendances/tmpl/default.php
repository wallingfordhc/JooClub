<?php
defined('_JEXEC') or die;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>



<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&view=players'); ?>" method="post" name="adminForm" id="adminForm">
  <div id="j-main-container" class="span10">
<?php echo $this->addToolbar(); ?>  
  <div id="filter-bar" class="btn-toolbar">
      <div class="filter-search btn-group pull-left">
        <label for="filter_search" class="element-invisible"><?php echo JText::_('COM_FOLIO_SEARCH_IN_TITLE');?></label>
        <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('COM_FOLIO_SEARCH_IN_TITLE'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_FOLIO_SEARCH_IN_TITLE'); ?>" />
      </div>
      <div class="btn-group pull-left">
        <button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
        <button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.getElementById('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
      </div>
    </div>
	<div class="btn-group pull-right hidden-phone">
-        <label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC');?></label>
-        <select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla!.orderTable()">
-          <option value=""><?php echo JText::_('JFIELD_ORDERING_DESC');?></option>
-          <option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING');?></option>
-          <option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING');?></option>
-        </select>
-      </div>
-      <div class="btn-group pull-right">
-        <label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY');?></label>
-        <select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla!.orderTable()">
-          <option value=""><?php echo JText::_('JGLOBAL_SORT_BY');?></option>
-          <?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $listOrder);?>
-        </select>
-      </div>
    <div class="clearfix"> </div>
    <table class="table table-striped" id="attendanceList">
      <thead>
        <tr>
          <th width="1%" class="hidden-phone">
            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
          </th>
	<th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_TIME_TITLE', 'arrived', $listDirn, $listOrder); ?>
          </th>
          
          <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_FIRSTNAME_TITLE', 'firstname', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_SURNAME_TITLE', 'surname', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_PERSON_AGEGROUP', 'agegroup', $listDirn, $listOrder); ?>
          </th>	  
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_PROLFILE_IMAGE', 'profileimage_url', $listDirn, $listOrder); ?>
          </th>
		  
        </tr>
      </thead>
      <tbody>
          
          <?php 
	  $group_date=null;
	  foreach ($this->items as $i => $item) :
	  if ($group_date !== substr($item->arrived, 0, 10)) {
        $group_date = substr($item->arrived, 0, 10);
		$displaydate = date_create($group_date);
		
		echo "<tr><td colspan=5><h1 class='cmattendancedate'>" . date_format($displaydate, 'jS M') . "</h1></td></tr>\n";
      }
 
        ?>
        
        <tr class="row<?php echo $i % 2; ?>">
          <td class="center hidden-phone">
            <?php echo JHtml::_('grid.id', $i, $item->attendanceID); ?>
          </td>
		  
          <td class="nowrap has-context">
            <a href="<?php echo JRoute::_('index.php?option=com_clubmanager&task=attendance.edit&attendanceID='.(int) $item->attendanceID); ?>">
              <?php echo $this->escape($item->arrived); ?>
            </a>
          </td>
	<td class="nowrap has-context">
              <?php echo $this->escape($item->firstname); ?>
            
          </td>	  
          <td class="nowrap has-context">
              <?php echo $this->escape($item->surname); ?>
            
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->agegroup); ?>
            
          </td>
		  
		 
		  <td class="nowrap has-context">
		    <img src="<?php echo $this->escape($item->profileimage_url); ?>" alt = "photo of <?php echo $this->escape($item->firstname); ?>" width=60>
            
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>