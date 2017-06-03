<?php defined('_JEXEC') or die; ?>

<div class=cmmatch >
   <?php foreach ($this->items as $item) : ?>
      <div class=cmmatch_result >
         <div class="cmmatch_pushbacktime" >
            <?php echo $item->pushback; ?>
         </div>
         <div class="cmmatch_hometeam">
		   <span class="cmmatch_teamlogo">
			<img src="<?php echo $item->hometeamlogo; ?>">
           </span>
		   <span class="cmmatch_hometeamname">
			<?php echo $item->hometeamname; ?>
		   </span>
         </div>
		 <div class="cmmatch_awayteam">
		   <span class="cmmatch_teamlogo">
			<img src="<?php echo $item->awayteamlogo; ?>">
           </span>
		   <span class="cmmatch_awayteamname">
			<?php echo $item->awayteamname; ?>
		   </span>
         </div>
		 <div class="cmmatch_homescore">
		   <?php echo $item->homescore; ?>
		 </div>
		 <div class="cmmatch_awayscore">
		   <?php echo $item->awayscore; ?>
		 </div>
		 <div class="cmmatch_location">
		   <?php echo $item->location; ?>
		 </div>
		 <div class="cmmatch_status">
		   <?php echo $item->status; ?>
		 </div>
      </div>
   <?php endforeach; ?>
</div>