<?php
class hwd_vs_SConfig{ 

  var $instanceConfig = null;

  // Member variables
  var $ffmpegpath = '/usr/bin/ffmpeg';
  var $flvtool2path = '/usr/local/src/flvtool2';
  var $mencoderpath = '';
  var $phppath = '/etc/php5';
  var $wgetpath = '/usr/bin/wget';
  var $qtfaststart = '/usr/local/bin/qt-faststart';

  function get_instance(){
    $instanceConfig = new hwd_vs_SConfig;
    return $instanceConfig;
  }

}
?>