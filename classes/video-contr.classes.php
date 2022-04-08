<?php
include ('../classes/video.classes.php');
    class VideoContr extends Video{

        private $video;
        private $videoId;

        public function __construct(){ }
    
        public static function withVideo($video){
            $instance = new self();
            $instance->fillWithVideo($video);
            return $instance;
        }

        public static function withVideoId($videoId){
            $instance = new self();
            $instance->fillWithVideoId($videoId);
            return $instance;
        }

        protected function fillWithVideo($video){
            $this->video = $video;
        }

        protected function fillWithVideoId($videoId){
            $this->videoId = $videoId;
        }

        public function uploadVideo(){
            $this->upload($this->video);
        }

        public function searchVideo(){
            $this->search($this->videoId);
        }
    }
?>