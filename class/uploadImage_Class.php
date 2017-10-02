<?php
class image_class 
{
	function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }
	
	function upload_image($width, $height, $destination,$img_name,$pre) {
        list($w, $h) = getimagesize($_FILES[$img_name]['tmp_name']);
		
		$custom_extension=$this->getExtension($_FILES[$img_name]['name']);
		
		$ret_name=$pre.'_'.time().'.'.$custom_extension;
        $path = $destination . '/' . $ret_name;
        $imgString = file_get_contents($_FILES[$img_name]['tmp_name']);
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);

        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefilledrectangle($tmp, 0, 0, $width, $height, $transparent);
        
        imagecopyresized($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);

        switch ($_FILES[$img_name]['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $ret_name;
        imagedestroy($image);
        imagedestroy($tmp);
    }
	
	function upload_fiximage($destination,$img_name,$pre) {
        list($w, $h) = getimagesize($_FILES[$img_name]['tmp_name']);
		
		$custom_extension=$this->getExtension($_FILES[$img_name]['name']);
		
		$ret_name=$pre.'_'.time().'.'.$custom_extension;
		//$ret_name=$pre.'_'.time().''. $_FILES[$img_name]['name'];
        $path = $destination . '/' . $ret_name;
        $imgString = file_get_contents($_FILES[$img_name]['tmp_name']);
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($w, $h);

        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefilledrectangle($tmp, 0, 0, $w, $h, $transparent);
        
        imagecopyresized($tmp, $image, 0, 0, 0, 0, $w, $h, $w, $h);

        switch ($_FILES[$img_name]['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $ret_name;
        imagedestroy($image);
        imagedestroy($tmp);
    }
	
	
	function upload_fiximage_thumble($destination,$img_name,$pre) {
        list($w, $h) = getimagesize($_FILES[$img_name]['tmp_name']);
		$custom_extension=$this->getExtension($_FILES[$img_name]['name']);
		$ret_name=$pre.'_'.time().'.'.$custom_extension;
        $path = $destination . '/' . $ret_name;
        $imgString = file_get_contents($_FILES[$img_name]['tmp_name']);
        $image = imagecreatefromstring($imgString);
       
		$new_width=100;
		$new_height=100;
		 $tmp = imagecreatetruecolor($new_width, $new_height);
        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
        imagefilledrectangle($tmp, 0, 0, $w, $h, $transparent);
        
        imagecopyresized($tmp, $image, 0, 0, 0, 0, $new_width, $new_height, $w, $h);

        switch ($_FILES[$img_name]['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                break;
            default:
                exit;
                break;
        }
        return $ret_name;
        imagedestroy($image);
        imagedestroy($tmp);
    }
	
	
	
	function fileUpload($filup,$name, $destination) {
            if (is_uploaded_file($_FILES[$filup]['tmp_name'])) {
				$extension=$this->getExtension($_FILES[$filup]['name']);
				$convertlower=strtolower($extension);
				if($convertlower!='php' || $convertlower!='bat' || $convertlower!='exe' || $convertlower!='dat' || $convertlower!='xss' || $convertlower!='js' || $convertlower!='json' || $convertlower!='cgi' || $convertlower!='mpeg')
				{
				   $filename=$name.".".$extension;
                   $result = move_uploaded_file($_FILES[$filup]['tmp_name'], $destination."/".$filename);
                  	if ($result == 1)
					{
						return $filename;
					}
					else 
					{
					  return 0;
					}
				}
				else
				{
					return 0;
				}
            }
    }
}
?>
