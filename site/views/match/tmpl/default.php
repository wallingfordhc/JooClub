<?php defined('_JEXEC') or die; ?>

<div class=cmmatch >
   <?php foreach ($this->matchitems as $item) : ?>
      <div class=cmmatch_result >
         <div class="cmmatch_pushbacktime" >
            <?php 
			$displaydate = date_format(date_create($item->pushback),'jS M h:i');
			echo $displaydate; ?>
         </div>
         <div class="cmmatch_hometeam">
		   <span class="cmmatch_teamlogo">
			<img class="cmmatch_teamlogo" src="<?php echo $item->hometeamlogo; ?>">
           </span>
		   <span class="cmmatch_hometeamname">
			<?php echo $item->hometeamname; ?>
		   </span>
         
		   <div class="cmmatch_homescore">
		     <?php echo $item->homescore; ?>
		   </div>
		 </div>
		 
		 <div class="cmmatch_awayteam">
		   <span class="cmmatch_teamlogo">
			<img class="cmmatch_teamlogo" src="<?php echo $item->awayteamlogo; ?>">
           </span>
		   <span class="cmmatch_awayteamname">
			<?php echo $item->awayteamname; ?>
		   </span>
         
		   <div class="cmmatch_awayscore">
		     <?php echo $item->awayscore; ?>
		   </div>
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
  <div class=cmatch_playerstitle>
		Players
  </div>

  <?php foreach ($this->playersitems as $item2) : ?>
  <div class=cmmatch_players>
	    
		<div class="cmmatch_firstname">
		   <?php echo $item2->firstname; ?>
		 </div>
  </div>

   <?php endforeach; ?>
</div>