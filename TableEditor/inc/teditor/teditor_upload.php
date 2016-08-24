<?php 

// Error codes: 
// 0: No file was uploaded; 
// 1: Maximum file size exceeded; 
// 2: Maximum image size exceeded; 
// 3: Only specified file type may be uploaded; 
// 4: File already exists (save only)

class mw_te_uploader 
{
	var $file; 
	var $errors; 
	var $accepted; 
	var $new_file; 
	var $max_filesize; 
	var $max_image_width; 
	var $max_image_height; 
	function max_filesize($size) { $this->max_filesize = $size; } 
	function max_image_size($width, $height) { $this->max_image_width = $width; $this->max_image_height = $height; } 
	function upload($filename, $accept_type, $extention) 
	{
		$this->file["file"]=$_FILES[$filename]['tmp_name']; $this->file["name"]=$_FILES[$filename]['name']; $this->file["size"]=$_FILES[$filename]['size']; 
		$this->file["type"]=$_FILES[$filename]['type']; 
		
		if($this->file["file"] && $this->file["file"] != "none") 
		{
			if($this->max_filesize && $this->file["size"] > $this->max_filesize) 
			{ 
				$this->errors[1] = "Error: El mayor tamaño permitido para la carga es: " . $this->max_filesize/1024 . "KB!"; 
				echo '<div class="mw_te_error">';
					echo 'Error: El mayor tamaño permitido para la carga es: '. number_format($this->max_filesize/1024, 0, '.', ',') . 'KB ('. number_format(($this->max_filesize / 1024 / 1024), 0, '.', ',') .'MB). '; 
					echo 'El archivo que intenta cargar tiene el siguiente tamaño: '. number_format($this->file["size"]/1024, 0, '.', ',') . 'KB ('. number_format(($this->file["size"] / 1024 / 1024), 0, '.', ',') .'MB). '; 
					
				echo '</div>'; 
				exit(); 
				return false; 
			}
			if(ereg("image", $this->file["type"]))
			{
				$image = @getimagesize($this->file["file"]); $this->file["width"] = $image[0]; $this->file["height"] = $image[1]; 
				if(($this->max_image_width || $this->max_image_height) && (($this->file["width"] > $this->max_image_width) || ($this->file["height"] > $this->max_image_height))) 
				{ 
					$this->errors[2] = "Las medidas maximas permitidas son " . $this->max_image_width . "x" . $this->max_image_height . " pixeles!"; 
					return false; 
				}
				switch($image[2])
				{
					case 1:  $this->file["extention"] = "gif"; 		break; 
					case 2:  $this->file["extention"] = "jpg"; 		break;
					case 3:  $this->file["extention"] = "png"; 		break;
					default: $this->file["extention"] = $extention; break;
				}
			}
			if(!$extention)  { $cur_file=$_FILES[$filename]['name']; $this->file["extention"]=strpos($cur_file, '.') ? strtolower(substr(strrchr($cur_file, '.'), 1)) : ''; }
			if($accept_type) { if(strstr($this->file["type"], $accept_type)) { $this->accepted = true; } else { $this->errors[3] = 'Solo se permiten archivos de tipo '.$accept_type.''; } } 
			else { $this->accepted = true; } 
		}
		else { $this->errors[0] = "Archivo no encontrado!!!"; } return $this->accepted; 
	}
	
	function save_file($path, $mode, $NewName)
	{
		if($this->accepted)
		{
			if(!$NewName) { $NewName = preg_replace("[^a-z0-9._]", "", str_replace(" ", "_", str_replace("%20", "_", strtolower($this->file["name"])))); }
			if(preg_match("/(\.)([a-z0-9]{3,5})$/", $NewName)) 
			{
				$pos = strrpos($NewName, "."); if(!$this->file["extention"]) { $this->file["extention"] = substr($NewName, $pos, strlen($NewName)); } $NewName = substr($NewName, 0, $pos);
			}
			$this->NewFile = $path.''.$NewName.'.'.$this->file["extention"];
			$NewNameFile = $NewName.'.'.$this->file["extention"];
			switch($mode)
			{
				case 1: $aok = copy($this->file["file"], $this->NewFile); break; // Si ya existe un archivo con ese nombre lo reemplaza...
				case 2: // Si ya existe un archivo con ese nombre escribe "_$n" donde $n es el siguiente numero que encuentre disponible para el nombre del archivo...
					$copy='';
					while(@file_exists($path.''.$NewName.''.$copy.'.'.$this->file["extention"])) { $copy = '_'.$n.''; $n++; } 
					$this->NewFile = $path.''.$NewName.''.$copy.'.'.$this->file["extention"]; 
					$NewNameFile=$NewName.''.$copy.'.'.$this->file["extention"];
					$aok = copy($this->file["file"], $this->NewFile);
				break;
				case 3: // Si ya existe un archivo con ese nombre devuelve un mensaje de error
					if(@file_exists($this->NewFile)) { $this->errors[4] = "Ya existe un archivo con el nombre: " . $this->new_file . ""; } 
					else { $aok = rename($this->file["file"], $this->NewFile); }
				break;
				default: break;
			}
			if(!$aok) { unset($this->NewFile); }
			if($aok) { return $NewNameFile; }
		}
	}
}

?>