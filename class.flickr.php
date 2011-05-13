<?php

class FlickrRandomPic
{
	static $API_KEY = '35ff6d913485f9f45a4c218683e36bdf';
	static $API_URL = 'http://api.flickr.com/services/rest/';

	static $IGNORED_USERIDS = array(
		'56369834@N00' => true,
	);
	
	static function getRandomPicture($tag, $poolSize = 500, $tries = 3)
	{
		$params = array(
		        'api_key'       => self::$API_KEY,
		        'method'        => 'flickr.photos.search',
		        'tags'          => $tag,
		        'license'       => '1,2,3,4,5,6,7',
		        'sort'          => 'interestingness-desc',
		        'safe_search'   => '2',
		        'content_type'  => '1',
		        'media'         => 'photos',
		        'extras'        => 'url_l,owner_name,license',
		        'per_page'      => $tries,
		        'page'          => rand(1, $poolSize),
		        'format'        => 'php_serial',
		);
		
		$url = self::$API_URL . '?' . http_build_query($params);
		if ($rsp = @file_get_contents($url))
		{
			$obj = unserialize($rsp);
			if ($obj)
			{
				if (!empty($obj['stat']) && $obj['stat'] == 'ok')
				{
					if (!empty($obj['photos']) && !empty($obj['photos']['photo']))
					{
						$photos = $obj['photos']['photo'];
						$i = 0;
						while (isset($photos[$i]))
						{
							if (!empty($photos[$i]['url_l']) && !isset(self::$IGNORED_USERIDS[$photos[$i]['owner']]))
							{
								return $photos[$i];
							}
							$i++;
						}
					}
				}
			}
		}

		return null;
	}
}
?>
