<?php
class Utility extends CI_Model 
{
	/**
	 * Get the proper http URL prefix depending on if this was a secure page request or not
	 *
	 * @return string https or https
	 */
	public static function getProtocol() {
		if(Yii::app()->request->isSecureConnection)
			return 'https';
		return 'http';
	}
	
	/**
	 * Get date format (general setting)
	 */
	public static function dateFormat($date, $type=null, $time=false) {
		if($time == true) {
			if($type == null) {
				$date = date('j-m-Y', strtotime($date)).' '.date('H:i', strtotime($date));
			} else {
				$date = date($type, strtotime($date)).' '.date('H:i', strtotime($date));
			}
		} else {
			if($type == null) {
				$date = date('j-m-Y', strtotime($date));
			} else {
				$date = date($type, strtotime($date));
			}
		}
		return $date;
	}
	
	/**
	 * Create URL Title
	 *
	 * Takes a "title" string as input and creates a
	 * human-friendly URL string with a "separator" string
	 * as the word separator.
	 *
	 * @todo    Remove old 'dash' and 'underscore' usage in 3.1+.
	 * @param   string  $str        Input string
	 * @param   string  $separator  Word separator
	 *          (usually '-' or '_')
	 * @param   bool    $lowercase  Wether to transform the output string to lowercase
	 * @return  string
	 */
	public static function getUrlTitle($str, $separator = '-', $lowercase = true) {
		if($separator === 'dash') {
			$separator = '-';
		}
		elseif($separator === 'underscore') {
			$separator = '_';
		}

		$qSeparator = preg_quote($separator, '#');
		$trans = array(
				'&.+?:;'         => '',
				'[^a-z0-9 _-]'      => '',
				'\s+'           => $separator,
				'('.$qSeparator.')+'   => $separator
			);

		$str = strip_tags($str);
		foreach ($trans as $key => $val) {
			$str = preg_replace('#'.$key.'#i', $val, $str);
		}

		if ($lowercase === true) {
			$str = strtolower($str);
		}

		return trim(trim($str, $separator));
	}

	/**
	 * remove folder and file
	 */
	public static function deleteFolder($path) {
		if(file_exists($path)) {
			$fh = dir($path);
			while (false !== ($files = $fh->read())) {
				@unlink($fh->path.'/'.$files);
			}
			$fh->close();
			@rmdir($path);
			return true;

		} else {
			return false;
		}
	}

	/**
	 * get publish status
	 * 1 = Publish
	 */
	public static function getPublish($id) {
		if($id == 1) {
			$publish = '<img src="'.base_url().'assets/images/icons/publish.png" alt="">';
		} else {
			$publish = '<img src="'.base_url().'/assets/images/icons/unpublish.png" alt="">';
		}

		return $publish;
	}
	
	/**
	 * getTimThumb function
	 */
	public static function getTimThumb($src, $width, $height, $zoom, $crop='c') {
		$image = base_url('timthumb.php?src=').$src.'&h='.$height.'&w='.$width.'&zc='.$zoom.'&a='.$crop;
        return $image;
    }

    /**
	 * shortText
	 */
	public static function shortText ($var, $len = 60, $dotted = "...") {
		if (strlen ($var) < $len) { return $var; }
		if (preg_match ("/(.{1,$len})\s/", $var, $match)) {  return $match [1] . $dotted;  }
		else { return substr ($var, 0, $len) . $dotted; }
	}
	
}
?>