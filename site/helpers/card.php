<?php
class card
{
	public function fitimagetobox($img,$xmax,$ymax){

		$xsize = imagesx($img);
		$ysize = imagesy($img);
		$imgratio = $xsize/$ysize;
		$boxratio = $xmax / $ymax;

		if ($boxratio>$imgratio) {
			$img = imagescale($img,$xsize*$ymax/$ysize);
		}
		else{
			$img = imagescale($img,$xmax);
		}

		return $img;
	}
 function creatememcard($personID = null)
 {
     // set folder paths for the membership card images
	 // set location to find the blank card
     $templatefolder = "media/com_clubmanager/membershipcards/";
	 $templatefile = "blank/blankcard.png";
	 


// set location to save the updated card
	 $outputimagepath = $templatefolder . "memcard" . $personID . ".png";
	 // set location of the font files
	 $fontfolder = JPATH_SITE."/media/com_clubmanager/fonts/";


         // only try if a personID has been supplied
         if (!empty($personID)){
         
	 //get blank card
	 $outputimage = imagecreatefrompng(JPATH_SITE.$templatefolder.$templatefile);
	// set the default color
	 $black = imagecolorallocate($outputimage, 0, 0, 0);
	 // set the default font
	 $fontfile = $fontfolder."ERASDEMI.TTF";
         
         // add latest player info to the card
         
         
         
         //get player info
         
         $player = new person($personID);

	 // Add age group
	 imagettftext( $outputimage,60,0,600,100,$black,$fontfile,$player->agegroup);

	 // Add photo or avatar

	 $profileimagefile = $player->profileimage_url;
         
         if (empty($profileimagefile)){
	 	$profileimagefile = $templatefolder."/blank/defaultavatar.png";
	 }
         
	 $profileimg = imagecreatefrompng(JURI::BASE().$profileimagefile);
	 $profileimg = card::fitimagetobox($profileimg,300,600);
	 $profileimgx= imagesx($profileimg);
	 $profileimgy= imagesy($profileimg);


	 imagecopy($outputimage, $profileimg, 20, 164, 0, 0, $profileimgx, $profileimgy);

	 // Add name
	 // work out the right size ( smaller than 50 ) to make sure the name isnt too long for the space
         
         $textsize = 50;
	 $name = $player->firstname." ".$player->surname;
	 $boxsize = imagettfbbox(50, 0, $fontfile, $name);
	 $xsize = abs($boxsize[0]) + abs($boxsize[2]);
	 $ysize = abs($boxsize[5]) + abs($boxsize[1]);

	 if ($xsize>550) {
	 	$textsize = $textsize * 550/$xsize;
	 }


	 imagettftext( $outputimage,$textsize,0,350,250,$black,$fontfile,$name);

	 // Add emergency contact
	 imagettftext( $outputimage,50,0,400,380,$black,$fontfile,$player->icenumber);

	 // Add emergency contact name and relationship
	 imagettftext( $outputimage,20,0,450,410,$black,$fontfile,$player->icename." - ".$player->icerelationship);

	 // Add membership number
	 imagettftext( $outputimage,80,0,400,600,$black,$fontfile,$player->membershipnumber);
         // Add QR code
         
         QRcode::png('http://www.wallingfordhc.org.uk/register/id=12345678', JPATH_SITE.$templatefolder.'qrcodes/test2.png', 'L', 4, 2);

         $qrimage = imagecreatefrompng(JPATH_SITE.$templatefolder.'qrcodes/test2.png');
         $qrimage = imagescale($qrimage,150);

	 imagecopy($outputimage, $qrimage, 830, 470, 0, 0, 150, 150);
         // release the memory
          imagedestroy($qrimage);

	 // Add badges
         
         
         //add expiry date  
         
         $now = date("Y-m-d H:i:s");
         $expire = $player->expiredate;
         
         // get the month and year of the expiry date
         if (!empty($expire)){
         $expiremy = DateTime::createFromFormat('Y-m-d', $expire)->format('m/y');
         imagettftext( $outputimage,60,0,550,587,$black,$fontfile,$expiremy);
         }
        
         // add expired flash image if expiry date is in the past
         if (!empty($expire) && $expire < $now){
             $expiredimage = imagecreatefrompng(JPATH_SITE.$templatefolder."/blank/expired.png");
             imagecopy($outputimage, $expiredimage, 0, 0, 0, 0, 1008, 642);
         }
         
         // add waitlist flash image if player on the waitlist
         $status = $player->status;
         if ($status == "waitlist") {
             $waitlistimage = imagecreatefrompng(JPATH_SITE.$templatefolder."/blank/waitlist.png");
             imagecopy($outputimage, $waitlistimage, 0, 0, 0, 0, 1008, 642);
         }
         
         
	 //save image - even if its blank
	 imagepng($outputimage, JPATH_SITE.'/'.$outputimagepath);
         // release the memory
         imagedestroy($outputimage);
         }
         else
         {
             $outputimagepath = $templatefolder.$templatefile;
         }
	 // echo image to html
	 echo ("<img src=".JURI::base().$outputimagepath.">");

	
	 
	
 }

 
}
