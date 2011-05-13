<?php
require_once('class.flickr.php');

define('FLICKR_TAG', 'rocknroll');

function licenseUrl($license)
{
	$CC_LICENSES = array(
		1 => 'by-nc-sa',
		2 => 'by-nc',
		3 => 'by-nc-nd',
		4 => 'by',
		5 => 'by-sa',
		6 => 'by-nd',
		7 => null,
	);
	$license = (int)$license;
	if (!empty($CC_LICENSES[$license]))
	{
		return 'http://creativecommons.org/licenses/' . $CC_LICENSES[$license] . '/2.0/';
	}
	return 'http://flickr.com/commons/usage/';
}

function getPhoto()
{
	$photo = FlickrRandomPic::getRandomPicture(FLICKR_TAG);
	
	// default photo
	if (!$photo)
	{
		$photo = array(
			'id' => '3429362199',
			'owner' => '26450716@N08',
			'ownername' => '...ven y siente el RUIDO !',
			'secret' => '75d98b94bb',
			'server' => '3644',
			'farm' => 4,
			'title' => 'el DURANTE',
			'ispublic' => 1,
			'isfriend' => 0,
			'isfamily' => 0,
			'url_l' => 'http://farm4.static.flickr.com/3644/3429362199_75d98b94bb_b.jpg',
			'height_l' => '1024',
			'width_l' => '768',
			'license' => '3',
		);
	}

	return $photo;
}

?>
