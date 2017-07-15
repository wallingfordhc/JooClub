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
     $templatefolder = "/media/com_clubmanager/membershipcards/";
	 $templatefile = "blank/Membershipcardfront-Blank_FrontFace.png";
	 // set location to save the updated card
	 $ouputimagepath = $templatefolder . "memcard" . $personID . ".png";
	 // set location of the font files
	 $fontfolder = JPATH_SITE."/media/com_clubmanager/fonts/";


	 //get blank card
	 $outputimage = imagecreatefrompng(JPATH_SITE.$templatefolder.$templatefile);
	// set the default color
	 $black = imagecolorallocate($outputimage, 0, 0, 0);
	 // set the default font
	 $fontfile = $fontfolder."ERASDEMI.TTF";
         
         //get player info
         
         $player = new person($personID);

	 // Add age group
	 imagettftext( $outputimage,60,0,600,100,$black,$fontfile,$player->agegroup);

	 // Add photo or avatar

	 $profileimagefile = $player->profileimage_url;
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

	 // Add badges
         
         
         //add expiry date
         imagettftext( $outputimage,60,0,400,800,$black,$fontfile,$player->expiredate);
         $now = date("Y-m-d H:i:s");
         $expire = $player->expiredate;
         if ($expire < $now){
             $expiredimage = JPATH_SITE.$templatefolder."/blank/expired.png";
             imagecopy($outputimage, $expiredimage, 0, 0, 1000, 640, $profileimgx, $profileimgy);
         }


	 //save image
	 imagepng($outputimage, JPATH_SITE.$ouputimagepath);

	 // echo image to html0
	 echo ("<img src=".JURI::base().$ouputimagepath.">");

	 // release the memory
	 imagedestroy($outputimage);
	 imagedestroy($qrimage);
 }


}
