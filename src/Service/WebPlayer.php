<?php

namespace App\Service;

class WebPlayer
{
	public function convertToIFrameUrl(string $url): string
	{
		$matches = null;
		preg_match('/((https:\/\/www\.youtube\.com\/watch\?v=)|(https:\/\/youtu\.be\/))([a-zA-Z0-9\-]*)/', $url, $matches);
		if (!empty($matches)) {
                    return $this->convertYoutubeUrlToIFrameUrl($matches[4]);
		}
                
                preg_match('/((https:\/\/dai\.ly\/)|(https:\/\/www\.dailymotion\.com\/video\/))([a-zA-Z0-9\-]*)/', $url, $matches);
                if(!empty($matches)){
                   return $this->convertDaylimotionUrlToIFrameUrl($matches[4]); 
                }
	}

	public function convertYoutubeUrlToIFrameUrl(string $id) {
		return 'https://www.youtube.com/embed/'.$id;
	}
        
        public function convertDaylimotionUrlToIFrameUrl(string $id) {
		return 'https://www.dailymotion.com/embed/video/'.$id;
	}
}