<?php
	/* 
		:: PHPDEX :: SINGLE-FILE PHP FILE DIRECTORY LISTING SCRIPT — V0.22.1
		© 2022 | OSCAR KAMEOKA | WWW.OSKA.ME
	*/

	#
	# CONFIGURATION
	#
	// PAGE TITLE
	$title 				= '〔' . strtoupper(basename(__DIR__)) . '〕';
	// FONT FAMILY (PLAIN OR MONOSPACED)
	$font_family_plain	= 'system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue",Arial,sans-serif';
	$font_family_mono	= 'ui-monospace,Menlo, Monaco,"Cascadia Mono","Segoe UI Mono","Roboto Mono","Oxygen Mono","Ubuntu Monospace","Source Code Pro","Fira Mono","Droid Sans Mono","Courier New",monospace';
	$font_family 		= $font_family_mono;
	// DYNAMIC THEME :: BACKGROUND AND UI ELEMENTS COLORS CHANGES DEPENDING ON TIME OF DAY
	$dynamic_theme 		= true;
	// ON WHICH TIME TO BASE THE THEME :: LOCAL|SERVER
	$theme_time 		= 'local';
	// ALWAYS FORCE DOWNLOAD (NO PREVIEW MODAL)
	$force_dl 			= false;
	// USE BROWSER'S NATIVE DOWNLOAD HANDLER (NO ON PAGE PROGRESS)
	$native_dl			= false;
	// HIDE SPECIFIC FILES
	$ignored_files 		= array('index.php', '.ds_store', 'thumbs.db', 'icon?');
	// HIDE SPECIFIC FILE TYPES
	$ignored_exts 		= array('.ca', '.key', '.pem');
	// EXCLUDED DIRECTORIES
	$excluded_dirs 		= array('private');
	// FILE TYPES TO SHOW IN PREVIEWER
	$direct_filetypes 	= ['jpg', 'jpeg', 'gif', 'png', 'webp', 'bmp', 'svg', 'mp4', 'mov', 'm4a', 'weba', 'mp3', 'txt', 'js', 'py', 'sh', 'json', 'css', 'htm', 'html','pdf','apng','tiff','apng'];
	// HIDE EMPTY FOLDERS
	$hide_empty 		= true;
	// UX :: ONLY HAVE ONE FOLDER EXPANDED AT A TIME
	$folder_limit		= 'parent'; // SINGLE (ONLY SHOW MAIN FOLDER AND SINGLE OPENED SUB-DIRECTORY) | PARENT (ONLY PARENT BUT SHOW ANY OPENED SUBS WITHIN)
	// SHOW METADATA (FOR IMAGES)
	$show_metadata		= true;
	$show_map			= true; // SHOW LITTLE MAP UNDER PHOTO IF IT HAS GPS COORDS. (REQ. SIGNING UP FOR FREE ACCOUNT AT MAPBOX.COM)
	$mapAPIkey 			= 'pk.eyJ1Ijoib2tpbmRleGVyIiwiYSI6ImNsMjVscHluczA2dGMzam81Z3N5b2hiMXoifQ.qbGs3POZ8LWzQHgDxnZEXQ';
	if(!$mapAPIkey){ $show_map = false; }
	// ICONS
	$icon_file   		= '200 300"><path d="M125 40V2.5a2.5 2.5 0 0 0-2.5-2.5H15.1A15 15 0 0 0 0 15v270a15 15 0 0 0 15 15h170a15 15 0 0 0 15-15V77.4a2.5 2.5 0 0 0-2.5-2.5H160a35 35 0 0 1-35-35Z"/><path d="M160 65h34a2.5 2.5 0 0 0 1.8-4.3L139.3 4.3A2.5 2.5 0 0 0 135 6v34a25 25 0 0 0 25 25Z"/>';
	$icon_folder 		= '300 245"><path d="M0 230a15 15 0 0 0 15 15h270a15 15 0 0 0 15-15V50a15 15 0 0 0-15-15H3a3 3 0 0 0-3 3ZM125 0H25A25 25 0 0 0 0 22a3 3 0 0 0 3 3h144a3 3 0 0 0 3-3 25 25 0 0 0-25-22Z"/>';
	$icon_folder_open 	= '299.9 245.5"><path d="M125 0H25A25 25 0 0 0 0 22a3 3 0 0 0 3 3h144a3 3 0 0 0 3-3 25 25 0 0 0-25-22ZM5 201l20-49a3 3 0 0 0 0-2V74a20 20 0 0 1 21-20h170a20 20 0 0 1 20 20v8a3 3 0 0 0 2 3h20a3 3 0 0 0 2-3V50a15 15 0 0 0-15-15H3a3 3 0 0 0-3 3v162a3 3 0 0 0 5 1Z"/><path d="M46 68a10 10 0 0 0-10 10v38a3 3 0 0 0 4 1l12-22 1-2c1-3 4-8 13-8h157a3 3 0 0 0 3-3v-4a10 10 0 0 0-10-10Z"/><path d="M1 231a8 8 0 0 0-1 1c-1 7 8 13 16 13h220a10 10 0 0 0 6-2c3-2 5-7 8-12v-1l50-119c2-8-7-15-15-15H66c-3 0-3 1-5 5Z"/>';
	$icon_download 		= '300.1 260.7"><path d="M298 136h-60a24 24 0 0 0-23 17c-5 16-20 37-65 37s-60-21-65-37a24 24 0 0 0-22-17H3a2 2 0 0 0-3 3v62a59 59 0 0 0 59 60h182a59 59 0 0 0 59-60v-62a3 3 0 0 0-2-3Z" style="fill:var(--main)"/><path d="M226 51s29-5 40 21l28 66M74 52s-30-5-41 20L6 138" style="stroke-width:12px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><path d="M150 10v111l39-39m-39 39-39-39" style="stroke-width:20px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/>';
	$icon_link			= '225.9 225.9"><defs><style>.cls-1{fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round;stroke-width:20px}</style></defs><path d="M98 128a46 46 0 0 1 0-65l39-39a46 46 0 0 1 65 65l-20 20" class="cls-1"/><path d="M129 98c18 18 17 47-1 65l-39 39a46 46 0 0 1-66-65l21-20" class="cls-1"/>';
	$icon_time 	 		= '303 303.8"><defs><style>.cls-3{fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round}.cls-2{fill:var(--main)}.cls-3{stroke-width:20px}</style></defs><path d="M291 138V59a23 23 0 0 0-24-23H36a23 23 0 0 0-23 23v209a23 23 0 0 0 23 23h103" style="stroke-width:25px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><circle cx="74.5" cy="124.4" r="12.5" class="cls-2"/><circle cx="126" cy="124.9" r="12.5" class="cls-2"/><circle cx="74.5" cy="174.4" r="12.5" class="cls-2"/><circle cx="126" cy="174.9" r="12.5" class="cls-2"/><circle cx="74.5" cy="224.4" r="12.5" class="cls-2"/><circle cx="126" cy="224.9" r="12.5" class="cls-2"/><circle cx="177.5" cy="125.4" r="12.5" class="cls-2"/><circle cx="229" cy="125.9" r="12.5" class="cls-2"/><path d="M75 10v51m77-51v51m77-51v51" class="cls-3"/><path d="M231 210v28h21" style="stroke-width:15px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><circle cx="233.5" cy="232.4" r="59" class="cls-3"/>';
	$icon_eye 			= '222 142"><path d="M111 0C50 0 0 54 0 71s50 71 111 71 111-53 111-71S172 0 111 0Zm0 109a38 38 0 1 1 38-38 38 38 0 0 1-38 38Z"/><circle cx="111" cy="71" r="12.5"/>';
	$icon_meta 			= '294.6 294.6"><circle cx="121.8" cy="121.8" r="110.7" style="stroke-width:22.14px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><path d="M181 97h-5m4 58h-5M61 124h-6m106-59H87m106 59H87m56 31H69m83 30H96m54-88H71" style="fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round;stroke-width:13.29px"/><path d="m208 208 71 71" style="stroke-width:31px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/>';
	$icon_close 		= '299.8 300"><path d="M181 144 294 30c7-6 8-17 2-24a17 17 0 0 0-26-1L156 119a9 9 0 0 1-12 0L30 5A17 17 0 0 0 4 6c-6 7-5 18 1 24l114 114a9 9 0 0 1 0 12L5 270c-6 6-7 17-1 24a17 17 0 0 0 26 1l114-114a9 9 0 0 1 12 0l114 114a17 17 0 0 0 26-1c6-7 5-18-2-24L181 156a9 9 0 0 1 0-12Z" fill="var(--main)"/>';
	$icon_up 			= '214.5 118.5"><path d="m15 103 96-88 88 88" style="fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round;stroke-width:30px"/>';
	$icon_search 		= '294.6 294.6"><circle cx="121.8" cy="121.8" r="110.7" style="stroke-width:22.14px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><path d="m208 208 71 71" style="stroke-width:31px;fill:none;stroke:var(--main);stroke-linecap:round;stroke-linejoin:round"/><circle cx="121.6" cy="121.6" r="12.5"/><circle cx="161.6" cy="121.6" r="12.5"/><circle cx="80.6" cy="121.6" r="12.5"/>';
	// CURRENT ADDRESS
	$base 				= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(isset($_REQUEST['dir'])){
		$base = str_replace(rawurldecode($_REQUEST['dir']), '', rawurldecode($base));
	}
	$base 				= preg_replace('/([^:])(\/{2,})/', '$1/', $base);
	$base 				= explode('?open=', $base)[0];
	// BROWSER DETECTION
	$browser 			= '';
	if (isset($_SERVER['HTTP_USER_AGENT'])){
		$agent = $_SERVER['HTTP_USER_AGENT'];
	}
	if (strlen(strstr($agent, 'Firefox')) > 0){
		$browser = 'firefox'; // (•_ • )'
	}
	// CREATE HTACCESS ELSE SHOW INSTRUCTION TO ADD THE NESSESARY LINES FOR THINGS TO BE OPENED IN FILE BROWSER
	$notice = false;
	if(file_exists('.htaccess')){
		// MAKE SURE CURRENT HTACCESS HAS REWRITE RULES
		if(!exec('grep '.escapeshellarg('?dir').' .htaccess')){
			$notice = true;
		}
	}
	else {
		try {
			$f = fopen('.htaccess', 'a+');
			fwrite($f, "RewriteCond %{REQUEST_FILENAME} !-d");
			fwrite($f, "\nRewriteRule ^(.*)$ index.php?dir=$1 [L,QSA]");
			fclose($f);
		}
		catch (exception $e) {
			$notice = true;
		}
	}
	if($notice && !$force_dl){
		$notice = '<div class="notice ctr"><h1>CONFIGURE .HTACCESS</h1><p>Add the following lines to your .htaccess file</p><pre><code>RewriteEngine On<br />RewriteCond %{REQUEST_FILENAME} !-f<br />RewriteRule ^(.*)$ index.php?dir=$1 [L,B,QSA]</code></pre></div>';
	}

	// FUNCTIONS TO SCAN AND BUILD FILE STRUCTURE
	class folderStructure {
		private function filter($dir){
			$this->filter = new RecursiveCallbackFilterIterator($dir, function($current, $key, $iterator){
					$filename = trim(strtolower($current->getFilename()));
					$file_ext = substr(strrchr($filename,'.'),1);
					$allow 	  = true;
					if(substr($filename, 0, 1) == '.' || $current->isReadable() === false || in_array($filename, $GLOBALS['ignored_files']))
						$allow =  false;
					if(in_array($file_ext, $GLOBALS['ignored_exts']))
						$allow =  false;
					return $allow;
				}
			);
		}
		public function countDir($path){
			$sTotal = $fldC = $filC = 0;
			foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $f){
				if(!in_array(strtolower(trim($f->getFilename())), $GLOBALS['ignored_files']) && !in_array('.'.strtolower($f->getExtension()), $GLOBALS['ignored_exts'])){
						// DO NOT INCREASE COUNT IF $HIDE_EMPTY AND DIRECTORY HAS NO CONTENT
						if(is_dir($f)){
							if((($files = @scandir($f)) && count($files) <= 2) && $GLOBALS['hide_empty']){
							continue;
						}
					}
					if(is_dir($f)){
						$fldC++;
					}
					else {
						$sTotal += $f->getSize();
						$filC++;
					}
				}
			}
			return [$sTotal, $fldC, $filC];
		}
		public function calcFS($b){
			$l = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
			for($i = 0; $b >= 1024 && $i < (count($l) -1); $b /= 1024, $i++);
			return round($b, 2) . $l[$i];
		}
		public function buildTree(){
			$dir = new RecursiveDirectoryIterator('./', FilesystemIterator::SKIP_DOTS);
			$this->filter($dir);
			$it = new RecursiveIteratorIterator(
				$this->filter,
				RecursiveIteratorIterator::SELF_FIRST,
				RecursiveIteratorIterator::CATCH_GET_CHILD
			);
			$tree = [];
			
			foreach($it as $fileinfo){
				$name 	= $fileinfo->getFilename();
				$path 	= $it->getSubPathName();
				$parts 	= explode(DIRECTORY_SEPARATOR, $path);
				$parent = &$tree;
				array_pop($parts);

				// (H)ARRAY FOR ROOT
				if(@!$parent['dirs'] && @!$parent['root']){
					list($sTotal,$fldC,$filC) = $this->countDir('./');
					$parent['root'] = array(
						'name' => 'root',
						'size' => $this->calcFS($sTotal),
						'data' => ($fldC + $filC > 0) ? (($fldC>0) ? (($fldC>1) ? '<b>'.$fldC.'</b>FOLDERS' : '<b>1</b>FOLDER') : '') . ' ' . (($filC>0) ? (($filC>1) ? '<b>'.$filC.'</b>FILES' : '<b>1</b>FILE') : '') : 'EMPTY');
				}
				
				foreach ($parts as $part){
					$parent = &$parent['dirs'][$part];
				}

				if ($fileinfo->isDir()){
					// FOLDER CONTENTS AND SIZE
					list($sTotal,$fldC,$filC) = $this->countDir($path);
					if($filC>0 && $GLOBALS['hide_empty']){
						$parent['dirs'][$name] = array(
							'name' => $name,
							'size' => $this->calcFS($sTotal),
							'data' => ($fldC + $filC > 0) ? (($fldC>0) ? (($fldC>1) ? '<b>'.$fldC.'</b>FOLDERS' : '<b>1</b>FOLDER') : '') . ' ' . (($filC>0) ? (($filC>1) ? '<b>'.$filC.'</b>FILES' : '<b>1</b>FILE') : '') : 'EMPTY');
					}
				} else {
					// FILES IN ROOT
					if($fileinfo->isLink()){
						$realpath 	= $fileinfo->getRealPath();
						$filesize 	= filesize($realpath);
						$filemtime 	= filemtime($realpath);
					} else {
						$filesize 	= $fileinfo->getSize();
						$filemtime 	= $fileinfo->getMTime();
					}
					$p = explode('/', $it->getSubPath());
					$p = end($p);
					$i = array(
							'name'  => $name,
							'size'  => $this->calcFS($filesize),
							'date'  => date('D F jS Y (H:i)', $filemtime),
							'path' 	=> $it->getSubPath()
						);
					if(strlen($p) == 0){
						$p = 'root';
					}
					if($p === @$parent['name']){
						$parent['files'][] = $i;
					}
					else {
						// ROOT FOLDER
						if($p === 'root'){
							$parent[$p]['files'][] = $i;
						}
						// SUB DIR FILES
						else {
							$parent['dirs'][$p]['files'][] = $i;
						}
					}
				}
			}
			unset($parent);
			return $tree;
		}
		// CALCULATE EXIF GPS LOCATION FOR MAPS API
		public function calcGPS($c, $h){
			if (is_string($c)){
				$c = array_map('trim', explode(',', $c));
			}
			for ($i = 0; $i < 3; $i++){
				$p = explode('/', $c[$i]);
				if (count($p) == 1){
					$c[$i] = $p[0];
				} else if (count($p) == 2){
					$c[$i] = floatval($p[0])/floatval($p[1]);
				} else {
					$c[$i] = 0;
				}
			}
			list($d, $m, $s) = $c;
			$s = ($h == 'W' || $h == 'S') ? -1 : 1;
			return $s * ($d + $m/60 + $s/3600);
		}
		public function makeItem($s, $d){
			$fileExt  	= strtolower(str_replace('jpeg', 'jpg', substr(strrchr($s['name'],'.'),1)));
			$dl_or_do 	= (!in_array($fileExt, $GLOBALS['direct_filetypes']) || $GLOBALS['force_dl']) ? " download='" . $s['name'] . "'" : "";
			// ARCHIVES
			$extraData  = '';
			if(in_array($fileExt, ['jpg','jpeg','raw','cr2','dng','png','tif','tiff','raf']) && $GLOBALS['show_metadata']){
				// GET IMAGE METADATA
				$exif=@exif_read_data('./'.$d.'/'.$s['name']);
				if(@$exif['ISOSpeedRatings']){ // REALLY ONLY FOR PHOTOS
					$extraData .= '<div class="metadata sdw">';
					$extraData .= '	<div class="row">〔IMAGE METADATA〕</div>';
					$extraData .= (@$exif['ISOSpeedRatings']) ? '	<div class="row mISO" title="ISO">'.$exif['ISOSpeedRatings'].':ISO</div>' : '';
					$extraData .= (@$exif['ExposureTime']) ? '	<div class="row mEXP" title="SHUTTER SPEED">'.$exif['ExposureTime'].'s</div>' : '';
					$extraData .= (@$exif['ApertureValue']) ? '	<div class="row mFS" title="APERTURE">F/'.explode('/', $exif['ApertureValue'])[0].'</div>' : '';
					$extraData .= (@$exif['DateTimeOriginal']) ? '	<div class="row mDT" title="DATE & TIME">'.$exif['DateTimeOriginal'].'</div>' : '';
					$extraData .= (@$exif['UndefinedTag:0xA434']) ? '	<div class="row mLENS" title="LENS">'.str_replace('mmF', 'mm F/', @$exif['UndefinedTag:0xA434']).'</div>' : '';
					$extraData .= (@$exif['Make']) ? '	<div class="row mCAMERA' . (($exif['Flash']===1) ? " flash" : "") . '" title="CAMERA MODEL">('.@$exif['Make'] . ') ' . @$exif['Model'].'</div>' : '';
					if(@$exif['GPSLatitude']){
						$la 	= floatval(explode('/', $exif['GPSLatitude'][0])[0]) / floatval(explode('/', $exif['GPSLatitude'][0])[1]) .'°'. floatval(explode('/', $exif['GPSLatitude'][1])[0]) / floatval(explode('/', $exif['GPSLatitude'][1])[1]) .'′'. floatval(explode('/', $exif['GPSLatitude'][2])[0]) / floatval(explode('/', $exif['GPSLatitude'][2])[1]) .'″'. $exif['GPSLatitudeRef'];
						$lo 	= floatval(explode('/', $exif['GPSLongitude'][0])[0]) / floatval(explode('/', $exif['GPSLongitude'][0])[1]) .'°'. floatval(explode('/', $exif['GPSLongitude'][1])[0]) / floatval(explode('/', $exif['GPSLongitude'][1])[1]) .'′'. floatval(explode('/', $exif['GPSLongitude'][2])[0]) / floatval(explode('/', $exif['GPSLongitude'][2])[1]) .'″'. $exif['GPSLongitudeRef'];
						$alt 	= explode('/', $exif['GPSAltitude']);
						$alt 	= (@$exif['GPSAltitude']) ? (isset($alt[1])) ? ($alt[0] / $alt[1]) : $alt[0] : '';
						$extraData .= '	<div class="row mGPS"><div title="LATITUDE, LONGTITUDE">' . $la . ', ' . $lo . '</div><div class="mALT" title="ALTITUDE (M.)">' . $alt . '</div>';
						if($GLOBALS['show_map'])
							$la = $this->calcGPS($exif['GPSLatitude'], $exif['GPSLatitudeRef']);
							$lo = $this->calcGPS($exif['GPSLongitude'], $exif['GPSLongitudeRef']);
							$extraData .= '	<div class="map"><img data-src="https://api.mapbox.com/styles/v1/mapbox/outdoors-v11/static/'.$lo.','.$la.',1,0,0/240x135@2x?access_token='.$GLOBALS['mapAPIkey'].'&attribution=false&logo=false" src="" /><img data-src="https://api.mapbox.com/styles/v1/mapbox/outdoors-v11/static/'.$lo.','.$la.',10,0,60/240x135@2x?access_token='.$GLOBALS['mapAPIkey'].'&attribution=false&logo=false" src="" /></div>';
						$extraData .=  '</div>';
					}
					$extraData .= '</div>';
				}
			}
			echo "<a href=\"".preg_replace('/([^:])(\/{2,})/', '$1/', $GLOBALS['base'].$d.'/').$s['name']."\" data-name=\"".$s['name']."\" data-type=\"$fileExt\" class=\"block file $fileExt\"".$dl_or_do.">";
			echo "	<div class=\"fileIcon $fileExt\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 " . $GLOBALS['icon_file'] . "</svg><p" . (strlen($fileExt)>3 ? ' class="small"' : '') . ">" .  $fileExt . "</p></div>";
			echo "	<div class=\"name bold\">" . $s['name'] . "</div>";
			echo "	<div class=\"data size\">" . $s['size'] . "</div>";
			echo "	<div class=\"data mod\" data-time=\"" . $s['date'] . "\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 " . $GLOBALS['icon_time'] . "</svg></div>";
			if(!$GLOBALS['force_dl']){
				echo "	<div class=\"down ani\" download><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 ".$GLOBALS['icon_download']."</svg></div>";
			}
			echo "	<div class=\"dlProgress\"></div>";
			echo $extraData;
			echo '</a>';
		}
		public function buildHTML($a, $d){
			// EACH DIR AND FILES WITHIN
			if(@is_array($a['dirs'])){
				$dirs = $a['dirs'];
				usort($dirs, function ($x, $y){ return strcasecmp($x['name'], $y['name']);});
				foreach($dirs as $i => $v){
					if(!in_array($v['name'], $GLOBALS['excluded_dirs'])){
						// FOLDER
						echo "<a href=\"".preg_replace('/([^:])(\/{2,})/', '$1/', $GLOBALS['base'].$d.'/').$v['name']."/\" data-name=\"".$v['name']."\" class=\"block dir\">";
						echo "	<div class=\"fileIcon dir \"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 " . $GLOBALS['icon_folder'] . "\</svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 " . $GLOBALS['icon_folder_open'] . "</svg></div>";
						echo "	<div class=\"name bold\">" . $v['name'] . "</div>";
						echo "	<div class=\"data files\">" . $v['data'] . "</div>";
						echo "	<div class=\"data size\">" . $v['size'] . "</div>";
						echo "</a>";

						// IF DIRS INSIDE CALL FUNCTION TO PUT THOSE IN FIRST
							echo '<div class="sub" data-name="'.$v['name'].'">';
							
							$this->buildHTML($v, $d.'/'.$v['name']); // ADD EACH SUB-FOLDER
							
							// EACH FOLDER'S FILES
							if(@is_array($v['files'])){
								$files = $v['files'];
								usort($files, function ($x, $y){return strcasecmp($x['name'], $y['name']);});
								foreach($files as $i => $s){
									$this->makeItem($s, $d.'/'.$v['name']); // , ?last?
								}
							}
							echo "</div>";
					}
				}
			}
			if(@is_array($a['root'])){
				if(@is_array($a['root']['files'])){
					$files = $a['root']['files'];
					usort($files, function ($x, $y){ return strcasecmp($x['name'], $y['name']);});
					foreach($files as $i => $s){
						$this->makeItem($s, '');
					}
				}
				// FOOTER WITH SOME STATS
				echo '<footer>'.$a['root']['data'].' | '.$a['root']['size'].'</footer>';
			}
		}
	}

	// GET :: FUNCTION TO GENERATE PRELOADER PLACEHOLDER
	if(isset($_GET['thumb'])){
		$f = $_GET['thumb'];
		switch (strtolower(pathinfo($f, PATHINFO_EXTENSION))){
		case 'jpeg':
		case 'jpg':
			$img = imagecreatefromjpeg($f);
			break;

		case 'png':
			$img = imagecreatefrompng($f);
			break;

		case 'gif':
			$img = imagecreatefromgif($f);
			break;

		case 'webp':
			$img = imagecreatefromwebp($f);
			break;

		default:
			$img = '';
			break;
		}

		$width 		= imagesx($img);
		$height 	= imagesy($img);
		$new_height	= floor( $height * ( 64 / $width ) );
		$tmp_img 	= imagecreatetruecolor( 64, $new_height );
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, 64, $new_height, $width, $height );

		// OUTPUT
		ob_start();
		imagepng($tmp_img);
		$image_data = ob_get_contents();
		ob_end_clean();

		echo "data:image/jpg;base64," . base64_encode($image_data);
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head lang="en">
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $title; ?></title>
	<style>
		:root {
			--main:	#888;
			--alt:	#666;
		}
		*, *:before, *:after 			{ box-sizing: border-box; cursor:default }
		html 							{ scroll-behavior: smooth }
		@media screen and (prefers-reduced-motion: reduce){ html { scroll-behavior: auto } }
		body 							{ background: #1D1C1C; font-family: <?php echo $font_family; ?>; color: #CCC; font-size: 1rem; padding: 0; margin: 0; text-align: center; text-transform:uppercase; overflow-x:hidden; background-attachment:fixed }
		h1 								{ text-align: center; margin: 1rem; font-size: 2rem; font-weight: 400; color:hsla(255, 0%, 100%, 0.75) }
		a, li							{ text-decoration: none; cursor:pointer; display: block; padding: 1rem; color: #CCC }
		a *, li *, .up.show				{ cursor:pointer }

		/* SHARED PROPERTIES */
		.ani, *::after, *::before, #search, a, .sub, #title, .metadata, .metadata img, .search svg { transition:all .5s ease-in-out }
		.bold 							{ font-weight: 500 }
		.ctr, .up svg					{ position:absolute; top:50%; left:50%; transform:translate(-50%,-50%) }
		.sdw 							{ box-shadow: 1.1px 1.1px 2.2px rgba(0, 0, 0, 0.07), 2.7px 2.7px 5.3px rgba(0, 0, 0, 0.049), 5px 5px 10px rgba(0, 0, 0, 0.04), 8.9px 8.9px 17.9px rgba(0, 0, 0, 0.033), 16.7px 16.7px 33.4px rgba(0, 0, 0, 0.027), 40px 40px 80px rgba(0, 0, 0, 0.019) }
		.show, .show ul					{ opacity:1 !important; pointer-events:initial !important }

		iframe 							{ border:0; outline:none }
		.preview, .notice, .preview .metadata, .preview a, #_img::before { background-color: hsla(255, 0%, 0%, 0.25); -webkit-backdrop-filter: blur(1vw) !important; backdrop-filter: blur(1vw) !important }
		.center, .preloader				{ position:absolute; top:50%; left:50%; transform:translate(-50%, -50%) }
		.browser, .results				{ width: 90vw; margin: 0 auto 5rem; background: rgba(0,0,0,0.25); padding: 1rem; border-radius: .5rem; text-align: left }
		
		/* BLOCK */
		.block, footer					{ position:relative; display:block; width:100%; height: 5.5rem; cursor:pointer; position:relative; margin-bottom:1rem; padding-left:4rem; border-radius:.5rem }
		.block .name 					{ margin-top:.25rem; letter-spacing: .125rem; font-size:1.25rem; color:var(--main); width:100%; margin-bottom:.5rem; white-space: nowrap; overflow:hidden }
		.block .data 					{ line-height: 1.3em; color: hsla(255, 0%, 100%, 0.5); cursor:pointer; border-radius:.5rem }
		section .block 					{ background:rgba(0,0,0,.09) }
		section .block:nth-of-type(2n) 	{ background:rgba(0,0,0,.07) }
		.files 							{ float:left }
		.dir .size 						{ float:right }
		footer 							{ height:2.25rem; font-size:1rem; color:var(--main); line-height:2.25rem; text-align: right; padding-right:1rem; background:rgba(0,0,0,.1); cursor:default; margin:0 }
		#title, .search 				{ mix-blend-mode: overlay; opacity: .75 }

		.browser { border: 2px solid rgba(255,255,255,0.075) }
		body.dark .browser { background:rgba(0,0,0,0.2) }
		body.dark section .block:nth-of-type(2n){ background:rgba(0,0,0,.025) }
		.sub { opacity:0; overflow:hidden; height:0 }
		.sub.open { opacity:1; height:auto }
		.sub a { margin-left: 4.5rem; width:calc(100% - 4.5rem) }
		.sub .sub a { margin-left: 9rem; width:calc(100% - 9rem) }
		.sub .sub .sub a { margin-left: 13.5rem; width:calc(100% - 13.5rem) }
		.sub > .block:nth-child(odd){ background:rgba(0,0,0,.05) !important }
		.sub > .block:nth-child(even){ background:rgba(0,0,0,.075) !important }
		.sub a::after {
			content: "";
			position: absolute;
			top: -25%; left: -3.75rem;
			width: 4rem; height: 150%;
			mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgNDEwIj48cGF0aCBkPSJNMTQgNDA2VjIzNWEyNSAyNSAwIDAgMSAyNS0yNWg1MU0xNCAxNHYxNzFhMjUgMjUgMCAwIDAgMjUgMjUiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMyNjI2MjYiLz48Y2lyY2xlIGN4PSIxNCIgY3k9IjE0IiByPSIxMCIgc3R5bGU9InN0cm9rZTojM2YzZjNmO29wYWNpdHk6MDtmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHgiLz48Y2lyY2xlIGN4PSI5MCIgY3k9IjIxMCIgcj0iMTAiIHN0eWxlPSJmaWxsOiMyNjI2MjYiLz48L3N2Zz4=');
			mask-repeat:no-repeat; mask-size: 2rem; mask-position: 50% 50%;
			-webkit-mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgNDEwIj48cGF0aCBkPSJNMTQgNDA2VjIzNWEyNSAyNSAwIDAgMSAyNS0yNWg1MU0xNCAxNHYxNzFhMjUgMjUgMCAwIDAgMjUgMjUiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMyNjI2MjYiLz48Y2lyY2xlIGN4PSIxNCIgY3k9IjE0IiByPSIxMCIgc3R5bGU9InN0cm9rZTojM2YzZjNmO29wYWNpdHk6MDtmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHgiLz48Y2lyY2xlIGN4PSI5MCIgY3k9IjIxMCIgcj0iMTAiIHN0eWxlPSJmaWxsOiMyNjI2MjYiLz48L3N2Zz4=');
			-webkit-mask-repeat:no-repeat; -webkit-mask-size: 2rem; -webkit-mask-position: 50% 50%;
			background:var(--main);
			transition:none !important;
			filter:invert(.25);
			pointer-events:none
		}
		.sub a:first-child::after {
			mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJUUkVFIiB2aWV3Qm94PSIwIDAgOTYgNDU3Ij48ZGVmcz48c3R5bGU+LmNscy0ze2ZpbGw6IzI2MjYyNn08L3N0eWxlPjwvZGVmcz48cGF0aCBkPSJNMTAgNDUzVjI4MmEyNSAyNSAwIDAgMSAyNS0yNW0tMjUtOTl2NzRhMjUgMjUgMCAwIDAgMjUgMjVoNTEiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMyNjI2MjYiLz48cGF0aCBkPSJNMTAgNHYxNTQiIHN0eWxlPSJzdHJva2U6IzNmM2YzZjtvcGFjaXR5OjA7ZmlsbDpub25lO3N0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1saW5lam9pbjpyb3VuZDtzdHJva2Utd2lkdGg6OHB4Ii8+PGNpcmNsZSBjeD0iMTAiIGN5PSIxNTgiIHI9IjEwIiBjbGFzcz0iY2xzLTMiLz48Y2lyY2xlIGN4PSI4NiIgY3k9IjI1NyIgcj0iMTAiIGNsYXNzPSJjbHMtMyIvPjwvc3ZnPg==');
			-webkit-mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJUUkVFIiB2aWV3Qm94PSIwIDAgOTYgNDU3Ij48ZGVmcz48c3R5bGU+LmNscy0ze2ZpbGw6IzI2MjYyNn08L3N0eWxlPjwvZGVmcz48cGF0aCBkPSJNMTAgNDUzVjI4MmEyNSAyNSAwIDAgMSAyNS0yNW0tMjUtOTl2NzRhMjUgMjUgMCAwIDAgMjUgMjVoNTEiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMyNjI2MjYiLz48cGF0aCBkPSJNMTAgNHYxNTQiIHN0eWxlPSJzdHJva2U6IzNmM2YzZjtvcGFjaXR5OjA7ZmlsbDpub25lO3N0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1saW5lam9pbjpyb3VuZDtzdHJva2Utd2lkdGg6OHB4Ii8+PGNpcmNsZSBjeD0iMTAiIGN5PSIxNTgiIHI9IjEwIiBjbGFzcz0iY2xzLTMiLz48Y2lyY2xlIGN4PSI4NiIgY3k9IjI1NyIgcj0iMTAiIGNsYXNzPSJjbHMtMyIvPjwvc3ZnPg==');
			left: calc(-3.75rem + 1px);
			top: -2rem
		}
		.sub a.dir:first-child::after { top:-25% !important }
		.sub a:last-child::after, .dir.open::after, .dir.end::after {
			mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJUUkVFIiB2aWV3Qm94PSIwIDAgMTAwIDUyNCI+PGRlZnM+PHN0eWxlPi5jbHMtMntmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMzZjNmM2Y7b3BhY2l0eTowfTwvc3R5bGU+PC9kZWZzPjxwYXRoIGQ9Ik0xNCA3MHYxNzJhMjUgMjUgMCAwIDAgMjUgMjVoNTEiIHN0eWxlPSJzdHJva2U6IzI2MjYyNjtmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHgiLz48cGF0aCBkPSJNMTQgNTIwVjI5MmEyNSAyNSAwIDAgMSAyNS0yNWg1MSIgY2xhc3M9ImNscy0yIi8+PGNpcmNsZSBjeD0iOTAiIGN5PSIyNjciIHI9IjEwIiBzdHlsZT0iZmlsbDojMjYyNjI2Ii8+PGNpcmNsZSBjeD0iMTQiIGN5PSIxNCIgcj0iMTAiIGNsYXNzPSJjbHMtMiIvPjwvc3ZnPg==') !important;
			-webkit-mask-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJUUkVFIiB2aWV3Qm94PSIwIDAgMTAwIDUyNCI+PGRlZnM+PHN0eWxlPi5jbHMtMntmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHg7c3Ryb2tlOiMzZjNmM2Y7b3BhY2l0eTowfTwvc3R5bGU+PC9kZWZzPjxwYXRoIGQ9Ik0xNCA3MHYxNzJhMjUgMjUgMCAwIDAgMjUgMjVoNTEiIHN0eWxlPSJzdHJva2U6IzI2MjYyNjtmaWxsOm5vbmU7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDo4cHgiLz48cGF0aCBkPSJNMTQgNTIwVjI5MmEyNSAyNSAwIDAgMSAyNS0yNWg1MSIgY2xhc3M9ImNscy0yIi8+PGNpcmNsZSBjeD0iOTAiIGN5PSIyNjciIHI9IjEwIiBzdHlsZT0iZmlsbDojMjYyNjI2Ii8+PGNpcmNsZSBjeD0iMTQiIGN5PSIxNCIgcj0iMTAiIGNsYXNzPSJjbHMtMiIvPjwvc3ZnPg==') !important
		}
		.sub *, .dir *, .search input, a.file *, body.modal .browser, body.searching .browser { pointer-events:none }
		.sub.open .dir, .sub.open .file { pointer-events:initial }
		/* NAV PEG */
		.block::before {
			content:"";
			position:absolute;
			top:0; left:0;
			z-index:222;
			height:5.5rem; width:.25rem;
			background:var(--main);
			border-radius:.25rem;
			opacity:0;
			transform:scale(0,0);
			transform-origin:50% 0%;
			mix-blend-mode:overlay
		}
		.block:hover::before, .highlight::before { opacity:.8; transform:scale(1) }
		.block .eye {
			position:absolute;
			bottom:.75rem; right:.75rem;
			width:1rem; height:1rem;
			object-fit:contain;
			cursor:default;
			opacity:.5;
			fill:var(--main)
		}
		/* DOWNLOAD PROGRESS */
		.dlProgress {
			position: absolute;
			bottom:0; left:0; opacity:0;
			height:.25rem; width:0%;
			border-radius:.25rem;
			background:var(--main);
			transition:all 1s cubic-bezier(.77,0,.18,1);
			mix-blend-mode:overlay
		}
		.progress { opacity:0.75 }
		/* ICONS */
		.mod, .down {
			position:absolute;
			right:1rem;
			width:1rem; height:1rem;
			cursor:help;
			pointer-events:initial !important
		}
		.mod { top:1.25rem }
		.mod::before, .down::before {
			content: attr(data-time);
			position: absolute;
			top: -.2rem;
			right: 1.5rem;
			z-index: 1;
			opacity: 0;
			height: 2rem;
			display: block;
			color: rgba(255,255,255,0.33);
			text-align: right;
			white-space: nowrap;
			pointer-events:none;
			transform:translateY(.25rem)
		}
		.down::before { content:"DOWNLOAD FILE"; top:0 }
		.mod:hover::before, .down:hover::before { opacity:1; transform:translateY(0%); transition-duration: .25s }
		.down { cursor:pointer; bottom:1rem; border-radius: .25rem }
		/* FILE TYPE ICONS */
		.fileIcon { position:absolute; width:1.5rem; height:100%; top:0; left:1.25rem; opacity:.9 }
		.dir .fileIcon { width:2rem; left:1rem }
		.dir .fileIcon svg { fill:var(--main) }
		.fileIcon svg, .fileIcon svg {
			position:absolute;
			width:100%; height:100%;
			transition:opacity .25s ease-in-out
		}
		/* FILE ICON COLORS */
		.ai,.eps,.svg { fill:#F57B17 }
		.aep,.aec,.aepx,.ffx,.xfl { fill:#606FDC }
		.psd,.psb { fill:#205080 }
		.pdf { fill:#DC3838 }
		.indd,.idml { fill:#FF408E }
		.mcdb,.prel,.prexport,.xmpses { fill:#E478FE }
		.fla,.flv,.spa,.swt { fill:#FE4A19 }
		.muse { fill:#C0E701 }
		.muse { fill:#C0E701 }
		.mcat,.aglib,.agtoolkit,.dcp,.dng,.lrcat,.lrdata,.lrdb,.lrlibrary,.lrmodule,.lrplugin,.lrpreview,.raw,.pcd,.raf,.crw,.cr2 { fill:#A9D1EB }
		.sesx,.cdlx,.fft,.flt { fill:#00E4BB }
		.workspace,.abdata,.bc,.bcm { fill:#FDB600 }
		.collection { fill:#FDB600 }
		.icml,.icap,.icma,.icmt,.icst,.idam { fill:#FC5EE9 }
		.cep,.zxp { fill:#DBDCDE }
		.sketch { fill:#F6C646 }
		.jpg,.jpeg,.gif,.png,.heic,.webp,.bmp,.pic,.tiff,.tif,.icon,.ico,.pix,.scan,.heif { fill:#80BF60 }
		.mc4d,.aec,.cat4d,.lib4d,.l4d,.c4dlib,.cinema4d,.cdl,.blend,.c3d,.dxf,.u3d,.obj,.dae,.usd,.fbx,.max,.threemx,.cal3d,.cob,.fbx,.ma,.mb,.mesh,.m,.r3d,.rwx,.w3d,.z3d,.3ds { fill:#081A66 }
		.dwg,.skp,.prt,.cad,.dxf,.sld { fill:#AB2428 }
		.avi,.mp4,.mv4,.mov,.mpeg,.mpg,.mts,.ogv,.ts,.vob,.webm,.wmv,.heiv { fill:#2270EB }
		.mp3,.mva,.oga,.weba,.wma,.ogg,.aac,.flac,.aiff,.midi,.opus,.uax,.wav { fill:#6991D0 }
		.otf,.ttf,.woff,.woff2,.pkt,.eot,.fnt,.font { fill:#9097A1 }
		.doc,.docx,.pages { fill:#4883E3 }
		.edoc,.oxps,.rtf,.odt,.srt,.fileIcon.txt,.asc,.ass,.md,.text { fill:#a4a3a8 }
		.xlsx,.numbers,.xls,.iif,.ods,.tsv,.csv,.ms,.pmd,.xl,.cwk,.dif,.xlt,.iwa,.ofx { fill:#23A365 }
		.pps,.keynote,.ppsx,.ppt,.ppsm,.pptx,.pptm { fill:#ED6D49 }
		.htm,.html { fill:#9AACC6 }
		.php,.js,.css,.py { fill:#C6b59A }
		.epub,.mobi,.azw3,.cbr,.opf,.azw6,.azw,.lit,.cbt { fill:#8B5F3B }
		.epub,.mobi,.azw3,.cbr,.opf,.azw6,.azw,.lit,.cbt { fill:#945EF4 }
		.xml,.plist,.conf,.ini,.json,.cfg,.config,.net,.yaml,.vpn { fill:#8B5F3B }
		.log,.sh { fill:#737373 }
		.bin,.iso,.exe,.app,.bak,.dll { fill:#B5C2C9 }
		.db,.sqlite,.sql,.accdb,.mdb { fill:#5E6CDB }
		.map,.gpx,.kwi,.kml,.kmz,.ptm,.gdb,.gml,.kbm { fill:#48AB7D }
		.rar,.zip,.tar,.tar.gz,.pak,.part,.pkg,.egg,.jar,.zlib,.gz,.deb,.tgz,.gz,.sevenz { fill:#684E35 }
		.bin,.dmg,.mdx,.dsk,.msi,.ipa,.apk,.cso,.sit,.ace { fill:#BCC5D0 }
		.xd { fill:#FC2BC2 }
		.fileIcon path:nth-child(2){ opacity:0.5 }
		.block b, footer b { letter-spacing:1px; margin-right:.25rem }
		.block p {
			position:absolute;
			bottom:1.5rem; left:-.75rem;
			width:3rem; text-align:center;
			color:#333; letter-spacing:0;
			transform:scale(.5); margin:0;
			mix-blend-mode:difference;
			overflow:hidden
		}
		.block i.small { transform:scale(.4) }
		.block i.smaller { transform:scale(.35) }
		.block.open .dir svg:nth-child(2){ opacity:1 }
		.mod img {
			position:absolute;
			top:0; left:50%;
			transform:translateX(-50%);
			width:100%; height:auto;
			cursor:help;
			filter:none !important
		}

		/* PREVIEW MODAL */
		.preview, .notice {
			position:fixed;
			z-index:2; top:0; left:0;
			width:100%; height:100%;
			opacity:0; pointer-events:none;
			transition:opacity .66s ease-in-out;
			overflow:hidden
		}
		.preview h1 { width:100%; margin:1rem; font-size:1.25rem; text-align:center }
		#_aud, #_img, #_vid, #_txt, #_web {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background:transparent;
			border:0; outline:none;
			border-radius:1rem;
			text-align:left;
			display:none;
		}
		#_aud, #_vid, #_web { top: calc(50% + 1rem); width:calc(100% - 8rem); height:calc(100% - 5rem) }
		#_aud {
			position: absolute;
			top: 50%; left: 50%;
			height: 25vh; width:25vw;
			transform: translate(-50%, -50%)
		}
		#_txt {
			width:calc(100% - 4rem); height:100%;
			overflow:auto;
			border-radius:0;
			text-transform:initial
		}
		#_img {
			margin:1rem 0;
			overflow:hidden;
			width:auto; height:auto;
			border-radius:.25rem !important
		}
		.it {
			opacity:0;
		}
		.preview a, .up {
			position:absolute;
			z-index:3;
			border-radius: 0.5em;
			cursor:pointer;
			background:rgba(0,0,0,.3);
			padding:1.25rem; border:0;
			bottom:1rem; right:1rem;
			width:1.5rem; height:1.5rem
		}
		.preview a svg {
			position:absolute;
			top:50%; left:50%;
			width: 1rem;
			height: 1rem;
			transform:translate(-50%,-50%);
			pointer-events:none
		}
		.preview #close { top:1rem; right:1rem }
		.preview a:hover { background:rgba(255,255,255,.3) }
		#link { bottom:4rem !important }
		#link::before {
			content: "COPIED TO CLIPBOARD";
			width: auto;
			padding: .75rem;
			border-radius: .5rem;
			position: absolute;
			top: 0rem;
			left: -13.75rem;
			z-index: 222;
			background: hsla(255, 0%, 0%, 0.2);
			opacity: 0;
			pointer-events: none
		}
		#link.tip::before { opacity:1 }
		#meta { display:none; left:.75rem !important; cursor:help !important }
		#meta::after {
			background:url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_meta; ?></svg>') no-repeat 50% 50%;
		}
		.block .metadata, .block .metadata img, body.modal .search { display:none; pointer-events:none }
		.metadata img { width:100%; height:100%; filter: hue-rotate(180deg) contrast(100%) invert(100%) }
		.metadata .row:nth-child(1){
			width:100%;
			text-align:center;
			font-size:1.25rem;
			padding: 0;
			margin: 0
		}
		.preview .metadata {
			position:absolute;
			left:2.5rem; bottom:2.5rem;
			padding: 1rem; margin:1rem;
			border: 2px solid rgba(255,255,255,0.02);
			border-radius: .25rem;
			opacity:0;
			pointer-events:none;
			max-width: calc(480px + 1.5rem);
			gap: 1rem;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			pointer-events:initial
		}
		.preview .map::after {
			content:"";
			position:absolute;
			top:50%; left:50%;
			transform:translate(-50%,-50%);
			width:.5rem; height:.5rem;
			background:rgba(255,255,255,0.5);
			border:2px solid hsla(255, 100%, 0%, 0.5);
			border-radius:100%; transform:scale(1)
		}
		.preview .map:hover::after { transform:scale(2) }
		.preview .metadata img { position: absolute }

		#_img .pre 			{ position: absolute; top:0; left:0; z-index:2; width: 100%; height: auto; object-fit: contain; filter: blur(20px); transform: scale(1.1); opacity:0; transition:opacity 1s ease-in-out }
		body.modal .pre 	{ opacity:1 !important }
		body.modal .up 		{ display:none }
		.pic 				{ object-fit: contain; max-width: calc(100vw - 9rem); max-height: calc(100vh - 5rem); border-radius:.25rem; opacity:0;}
		#_img.show .pre		{ transition-delay:1s; z-index:-1; opacity:0 !important }
		body.firefox #_img .pic { opacity:0; transition:all 1s ease-in-out }
		#_img.show .pic, body.firefox #_img.show .pic { opacity:1 }

		.map {
			position:relative;
			width: 470px !important;
			height: 270px !important;
			overflow: hidden; margin:0;
			border-radius: .25rem
		}
		.map img { border-radius: .25rem }
		.mGPS:hover img:nth-child(1){ opacity:0 !important }
		.mGPS:hover img:nth-child(2){ opacity:1 !important }
		.metadata .row, .mGPS {
			position:relative;
			width: auto;
			padding-left:2.5rem;
			cursor:default;
			flex-basis: 100%;
			height: 2.5rem;
			line-height: 2.5rem;
			text-align:left;
			background: rgba(0,0,0,0.1);
			padding-right: 1rem;
			border-radius: .25rem
		}
		.metadata .row::before, .mALT::before, .mCAMERA.flash::after {
			content:"";
			position:absolute;
			top:0; left:0;
			width:2.5rem; height:2.5rem;
			background-size: 50% 50%;
			background-repeat: no-repeat;
			background-position: 50% 50%;
			filter:invert(.9)
		}
		.mDT, .mLENS, .mCamera, .mGPS { width:100% }
		.mGPS { height:auto !important; padding:0 !important; overflow:hidden }
		.mGPS div { float:left }
		.mGPS div:nth-child(1){ padding-left:2.5rem }
		.mGPS { padding-left:2.5rem; border: 2px solid rgba(255,255,255,0.01) }
		.mISO, .mEXP, .mFS { flex-basis: auto !important }
		.mEXP { padding-right: .5rem }
		.mISO::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJNRVRBREFUQV9JTUFHRV8iIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDI4OSAyODkiPjxkZWZzPjxzdHlsZT4uY2xzLTF7ZmlsbDojNTQ1NDU0fTwvc3R5bGU+PC9kZWZzPjxwYXRoIGQ9Ik0xNDUgMGExNDUgMTQ1IDAgMSAwIDE0NCAxNDVBMTQ0IDE0NCAwIDAgMCAxNDUgMFptNjMgMTk3YTEyIDEyIDAgMCAxLTExIDExSDkzYTEyIDEyIDAgMCAxLTEyLTExVjkzYTEyIDEyIDAgMCAxIDExLTEyaDEwNGExMiAxMiAwIDAgMSAxMiAxMVoiIGNsYXNzPSJjbHMtMSIvPjxwYXRoIGQ9Ik05NyAxOThoOTFhMTAgMTAgMCAwIDAgMTAtMTBWOTdhMiAyIDAgMCAwLTQtMmwtOTkgOTlhMiAyIDAgMCAwIDIgNFoiIGNsYXNzPSJjbHMtMSIvPjwvc3ZnPg==');
			background-size: 50% 50% !important; opacity:.8
		}
		.mEXP::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDI5NSAyOTUiPjxwYXRoIGQ9Ik0yNDcgNTZhMTM1IDEzNSAwIDEgMS05Ni00M20wIDEzNCA0NC00NG0tNDQtODl2NDQiIHN0eWxlPSJmaWxsOm5vbmU7c3Ryb2tlOiM1NDU0NTQ7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDoyNXB4Ii8+PC9zdmc+');
		}
		.mFS::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDMwMCAzMDAuMiI+PHBhdGggZD0iTTI0NyAzNmMzIDIgNCA0IDMgNyAwIDQtMyA1LTYgNmwtODcgMjMtMzggMTBjLTcgMi0xMS0yLTktOWwxOC02N2MxLTQgMy01IDYtNWExNDcgMTQ3IDAgMCAxIDY4IDggMTUwIDE1MCAwIDAgMSA0NSAyN1pNNTIgMjY0Yy01LTUtMy0xMCA0LTEybDc0LTIwIDUwLTE0YzgtMiAxMiAyIDEwIDEwbC0xOCA2NWMtMSA0LTMgNi03IDYtMzEgMy01OS0zLTg2LTE3YTE1MiAxNTIgMCAwIDEtMjctMThaTTM5IDEyMiAxNCA5N2MtMi0yLTMtNS0xLThDMzAgNTEgNTkgMjQgOTkgOWEyMSAyMSAwIDAgMSAyLTFjNi0xIDEwIDIgOCA4TDk5IDU1bC0yMyA4NS0xIDRjLTIgNi02IDctMTEgM2wtMTEtMTEtMTQtMTRabTIyMiA1NyAyNCAyM2MzIDMgNCA2IDIgMTAtMTggMzgtNDcgNjQtODYgNzktMyAxLTYgMi05IDAtMi0zLTItNi0xLTlsMjYtOTggNy0yNmMyLTggNy05IDEzLTNsMjQgMjRaTTMwIDI0MWExNDYgMTQ2IDAgMCAxLTI2LTU1IDE1MiAxNTIgMCAwIDEtMi02MCAzNSAzNSAwIDAgMSAxLTVjMS01IDYtNiAxMC0zbDMgMyA4OSA4OSAyIDFjNCA1IDMgMTAtNCAxMmwtMTIgNC01NCAxNGMtMiAxLTUgMi03IDBabTIwOS0xMDYtNDQtNDVjLTctNi02LTExIDMtMTNsNjYtMThjMy0xIDUgMCA3IDIgMTcgMjQgMjcgNTEgMjkgODBhMTQwIDE0MCAwIDAgMS0yIDM1Yy0xIDMtMSA2LTUgOHMtNi0yLTgtNGwtNDYtNDVaIiBzdHlsZT0iZmlsbDojNTQ1NDU0Ii8+PC9zdmc+');
		}
		.mDT::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJUSU1FIiB2aWV3Qm94PSIwIDAgMzAzIDMwMy44Ij48ZGVmcz48c3R5bGU+LmNscy0ze2ZpbGw6bm9uZTtzdHJva2U6IzU0NTQ1NDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmR9LmNscy0ye2ZpbGw6IzU0NTQ1NH0uY2xzLTN7c3Ryb2tlLXdpZHRoOjIwcHh9PC9zdHlsZT48L2RlZnM+PHBhdGggZD0iTTI5MSAxMzhWNTlhMjMgMjMgMCAwIDAtMjQtMjNIMzZhMjMgMjMgMCAwIDAtMjMgMjN2MjA5YTIzIDIzIDAgMCAwIDIzIDIzaDEwMyIgc3R5bGU9InN0cm9rZS13aWR0aDoyNXB4O2ZpbGw6bm9uZTtzdHJva2U6IzU0NTQ1NDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQiLz48Y2lyY2xlIGN4PSI3NC41IiBjeT0iMTI0LjQiIHI9IjEyLjUiIGNsYXNzPSJjbHMtMiIvPjxjaXJjbGUgY3g9IjEyNiIgY3k9IjEyNC45IiByPSIxMi41IiBjbGFzcz0iY2xzLTIiLz48Y2lyY2xlIGN4PSI3NC41IiBjeT0iMTc0LjQiIHI9IjEyLjUiIGNsYXNzPSJjbHMtMiIvPjxjaXJjbGUgY3g9IjEyNiIgY3k9IjE3NC45IiByPSIxMi41IiBjbGFzcz0iY2xzLTIiLz48Y2lyY2xlIGN4PSI3NC41IiBjeT0iMjI0LjQiIHI9IjEyLjUiIGNsYXNzPSJjbHMtMiIvPjxjaXJjbGUgY3g9IjEyNiIgY3k9IjIyNC45IiByPSIxMi41IiBjbGFzcz0iY2xzLTIiLz48Y2lyY2xlIGN4PSIxNzcuNSIgY3k9IjEyNS40IiByPSIxMi41IiBjbGFzcz0iY2xzLTIiLz48Y2lyY2xlIGN4PSIyMjkiIGN5PSIxMjUuOSIgcj0iMTIuNSIgY2xhc3M9ImNscy0yIi8+PHBhdGggZD0iTTc1IDEwdjUxbTc3LTUxdjUxbTc3LTUxdjUxIiBjbGFzcz0iY2xzLTMiLz48cGF0aCBkPSJNMjMxIDIxMHYyOGgyMSIgc3R5bGU9InN0cm9rZS13aWR0aDoxNXB4O2ZpbGw6bm9uZTtzdHJva2U6IzU0NTQ1NDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQiLz48Y2lyY2xlIGN4PSIyMzMuNSIgY3k9IjIzMi40IiByPSI1OSIgY2xhc3M9ImNscy0zIi8+PC9zdmc+');
			background-size: 40% 40% !important;
		}
		.mLENS::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDEwMS44IDE0My41Ij48cGF0aCBkPSJNMTkgMTQxYTMgMyAwIDAgMCAzIDNoNThhMyAzIDAgMCAwIDMtM3YtMTBhMSAxIDAgMCAwLTEtMUgyMGExIDEgMCAwIDAtMSAxWiIgc3R5bGU9ImZpbGw6IzViNWI1YiIvPjxwYXRoIGQ9Ik0xOSAxMjRoNjQtNjR6bTgyLTIyYTUgNSAwIDAgMCAxLTJWNDZhNSA1IDAgMCAwLTYtNkg1YTUgNSAwIDAgMC01IDZ2NTVhNSA1IDAgMCAwIDEgMmgxMDBaIiBzdHlsZT0iZmlsbDojNTQ1NDU0Ii8+PHBhdGggZD0iTTEzIDEyMmE1IDUgMCAwIDAgNSAyaDY3YTUgNSAwIDAgMCA0LTJsMTItMTlIMWE1IDUgMCAwIDAgMCAxWk05IDRsMTAgMTRhNSA1IDAgMCAwIDcgMEw0NCAxYTUgNSAwIDAgMSA3IDBsMTcgMTdhNSA1IDAgMCAwIDcgMUw5NCAzYTUgNSAwIDAgMSA4IDR2MjZhMiAyIDAgMCAxLTIgMkgzYTIgMiAwIDAgMS0yLTJMMCA4YTUgNSAwIDAgMSA5LTRaIiBzdHlsZT0iZmlsbDojNTY1NjU2Ii8+PHBhdGggZD0iTTEwIDQ5djUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwbTEwLTUwdjUwIiBzdHlsZT0iZmlsbDpub25lO3N0cm9rZTojM2QzZDNkO3N0cm9rZS1saW5lY2FwOnJvdW5kO3N0cm9rZS1saW5lam9pbjpyb3VuZDtzdHJva2Utd2lkdGg6MnB4Ii8+PC9zdmc+');
			background-size:40% 40% !important
		}
		.mCAMERA::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJNRVRBREFUQV9JTUFHRV8iIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDIzNiAxNTEiPjxkZWZzPjxzdHlsZT4uY2xzLTJ7ZmlsbDojNTQ1NDU0fS5jbHMtM3tmaWxsOiM0NzQ3NDd9PC9zdHlsZT48L2RlZnM+PGNpcmNsZSBjeD0iMTI1LjUiIGN5PSI5My41IiByPSIzNiIgc3R5bGU9ImZpbGw6bm9uZSIvPjxwYXRoIGQ9Ik0yMzEgMEgxMDFhNSA1IDAgMCAwLTUgNXY4YTUgNSAwIDAgMS01IDVINWE1IDUgMCAwIDAtNSA1djEyM2E1IDUgMCAwIDAgNSA1aDIyNmE1IDUgMCAwIDAgNS01VjVhNSA1IDAgMCAwLTUtNVpNMTI2IDEzMGEzNiAzNiAwIDEgMSAzNi0zNiAzNiAzNiAwIDAgMS0zNiAzNlptMTAwLTk3YTIgMiAwIDAgMS0yIDJoLTM2YTIgMiAwIDAgMS0yLTJWMTJhMiAyIDAgMCAxIDItMmgzNmEyIDIgMCAwIDEgMiAyWiIgY2xhc3M9ImNscy0yIi8+PGNpcmNsZSBjeD0iMjA2IiBjeT0iMjIuMyIgcj0iOSIgY2xhc3M9ImNscy0yIi8+PHBhdGggZD0iTTM1IDE1aDE3YTEgMSAwIDAgMSAxIDF2M0gzNHYtM2ExIDEgMCAwIDEgMS0xWiIgY2xhc3M9ImNscy0yIi8+PHBhdGggZD0iTTM5IDEyaDhhMyAzIDAgMCAxIDMgMnYzSDM3di0zYTMgMyAwIDAgMSAyLTJaTTggMTVoMTRhMyAzIDAgMCAxIDMgMnY1SDZ2LTVhMyAzIDAgMCAxIDItMlptNTYgMGgyM2EzIDMgMCAwIDEgMyAydjdINjJ2LTdhMyAzIDAgMCAxIDItMloiIGNsYXNzPSJjbHMtMiIvPjxwYXRoIGQ9Ik0xODUgNDdhNyA3IDAgMCAwLTYgMTAgNjYgNjYgMCAwIDEtNyA3NCA3IDcgMCAwIDAgNSAxMWg0NWE0IDQgMCAwIDAgNC00VjUxYTQgNCAwIDAgMC00LTVaTTY4IDkwYTY0IDY0IDAgMCAxIDgtMzEgNyA3IDAgMCAwLTYtMTBINTlhNCA0IDAgMCAwLTQgNHY4YTExIDExIDAgMCAxLTEwIDExIDExIDExIDAgMCAxLTExLTExdi04YTQgNCAwIDAgMC00LTRIMTNhNCA0IDAgMCAwLTQgNHY4NWE0IDQgMCAwIDAgNCA0aDY1YTcgNyAwIDAgMCA1LTExIDY0IDY0IDAgMCAxLTE1LTQxWiIgY2xhc3M9ImNscy0zIi8+PGNpcmNsZSBjeD0iNDUuMyIgY3k9IjYwLjgiIHI9IjUuMyIgY2xhc3M9ImNscy0yIi8+PHBhdGggZD0iTTQ1IDQ3djkiIHN0eWxlPSJzdHJva2U6IzU0NTQ1NDtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQ7c3Ryb2tlLXdpZHRoOjIuNjNweDtmaWxsOm5vbmUiLz48Y2lyY2xlIGN4PSIxMjUuNSIgY3k9IjkzLjUiIHI9IjE0IiBjbGFzcz0iY2xzLTMiLz48L3N2Zz4=');
		}
		.mCAMERA.flash::after {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDI3Mi45IDE4NiI+PHBhdGggZD0iTTEgMzVoMjM2djE1MUgxeiIgc3R5bGU9InN0cm9rZTojNDc0NzQ3O3N0cm9rZS1taXRlcmxpbWl0OjEwO29wYWNpdHk6MDtmaWxsOm5vbmUiLz48cGF0aCBkPSJtMjQ3IDI0IDktOW0tNCAzMyAxMCAxME0yMTMgOWwxMCAxMW00Ni0xNy01IDUiIHN0eWxlPSJzdHJva2Utd2lkdGg6NXB4O2ZpbGw6bm9uZTtzdHJva2U6IzdmN2Y3ZjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbGluZWpvaW46cm91bmQiLz48cGF0aCBkPSJNMjM2IDIwVjdtMzUgMjdoLTE1IiBzdHlsZT0ic3Ryb2tlLXdpZHRoOjNweDtmaWxsOm5vbmU7c3Ryb2tlOiM3ZjdmN2Y7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kIi8+PC9zdmc+');
			background-size:75% 75% !important
		}
		.mGPS::before {
			background-image:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJNRVRBREFUQV9JTUFHRV8iIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDE4MS4xIDMwMCI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiM1NDU0NTR9PC9zdHlsZT48L2RlZnM+PHBhdGggZD0iTTcyIDIzOXYtMVptMTkgMTFhMjEgMjEgMCAwIDEtNSAwIDIxIDIxIDAgMCAwIDUgMFptLTIxLTE0LTEtMVptLTItMy0yLTIgMiAyWm00Ny0yLTIgMiAyLTJabS01IDctMSAxWm0yLTMtMSAxWm0tNDYtNC03LTEwIDcgMTBabS03LTEwLTItNCAyIDRabTY1LTQtMiA0Wm0tMiA0WiIgY2xhc3M9ImNscy0xIi8+PHBhdGggZD0iTTE0MyAyMzZhNyA3IDAgMCAwLTggM2wtMTcgMjRhMzQgMzQgMCAwIDEtMjcgMTQgMzMgMzMgMCAwIDEtMjctMTNsLTE4LTI1YTcgNyAwIDAgMC04LTNjLTE4IDctMjkgMTctMjkgMjggMCAyMCAzNiAzNiA4MiAzNnM4MS0xNiA4MS0zNmMwLTExLTExLTIxLTI5LTI4WiIgY2xhc3M9ImNscy0xIi8+PHBhdGggZD0iTTEwMSAyNDdhMjAgMjAgMCAwIDEtNiAzIDIwIDIwIDAgMCAwIDYtM1ptLTM1LTE2Wm0tNy0xMFptMTAgMTQtMS0yIDEgMlptNTMtMTRabS01MCAxNy0yLTIgMiAyWm0zIDRabTM4LTktMSAyWm0yLTN2MVptLTQgNi0xIDIgMS0yWm0tMiAzLTIgMyAyLTNaIiBjbGFzcz0iY2xzLTEiLz48cGF0aCBkPSJNOTEgMEM0Mi0xLTEgNDEgMCA5MWM0IDM4IDI2IDczIDQ0IDEwNmwyNSAzOGM4IDE0IDI2IDIyIDM4IDcgMjktNDAgNTUtODMgNzEtMTMwQTkwIDkwIDAgMCAwIDkxIDBabTAgNjdjMzAgMSAzMCA0NyAwIDQ3LTMxIDAtMzEtNDYgMC00N1oiIGNsYXNzPSJjbHMtMSIvPjwvc3ZnPg==');
		}
		.mALT {
			position: relative;
			float: right !important;
			margin-right: 1rem;
			padding-left: 2.25rem;
			margin-left: .5rem
		}
		.mALT::before {
			background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJNRVRBREFUQV9JTUFHRV8iIGRhdGEtbmFtZT0iTUVUQURBVEEgKElNQUdFKSIgdmlld0JveD0iMCAwIDMyMCAxMzIuNiI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOm5vbmU7c3Ryb2tlOiM1NDU0NTQ7c3Ryb2tlLWxpbmVjYXA6cm91bmQ7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS13aWR0aDoyMHB4fTwvc3R5bGU+PC9kZWZzPjxwYXRoIGQ9Ik0xMCAxMjEgMTE4IDEzYTExIDExIDAgMCAxIDE1IDBsMTA4IDEwOSIgY2xhc3M9ImNscy0xIi8+PHBhdGggZD0ibTU0IDc3IDQzIDQzIDI2LTI3YTUgNSAwIDAgMSA3IDBsMjggMjggNjktNjlhOSA5IDAgMCAxIDEzIDBsNzAgNzEiIGNsYXNzPSJjbHMtMSIvPjwvc3ZnPg==');
		}
		
		pre { width:calc(100% - 2rem); height:calc(100% - 5rem); display:none; white-space: break-spaces }
		/* BODY STATES */
		body.firefox.modal .browser, body.firefox.modal #title { filter:blur(20px) }
		body.firefox .preview, body.firefox .preview .metadata { background-color: hsla(255, 100%, 0%, 0.5) !important }
		body.firefox .preview a { background:hsla(255, 100%, 0%, 0.6) }
		body.modal { overflow:hidden }
		body.modal .block::before, .preview .metadata img:nth-child(2), .block.open .dir svg:nth-child(1), .fileIcon svg:nth-child(2) { opacity:0 }
		.preview { z-index:333 }
		body.modal .preview { opacity:1; pointer-events:initial !important }
		body.modal #title, body.modal .up { mix-blend-mode:initial }
		body.modal .browser { backdrop-filter: opacity(1) }
		body.img #_img { display:block !important }
		body.vid #_vid { display:block !important }
		body.aud #_aud { display:block !important }
		body.txt pre, body.txt #_txt { display:block !important }
		body.web #_web { display:block !important }
		.notice {
			opacity:1;
			top:50%; left:50%;
			width:33vw; height:auto;
			padding:1rem; border-radius:1rem;
			pointer-events:initial
		}
		.notice h1 { color:var(--main) }
		.notice p { color:var(--alt) }
		.notice pre { display:block; text-align:left; text-transform:initial }
		/* SEARCH ELEMENTS */
		.search {
			position:fixed;
			top:1rem; right:.5rem;
			width:2rem; height:2rem;
			padding:.25rem;
			border-radius:.25rem;
			cursor:pointer;
			mix-blend-mode:difference;
		}
		.search.open { width:10vw; background: rgba(0,0,0,0.1); cursor:default }
		.search.open input { pointer-events:initial }
		body.dark .search.open { background: rgba(255,255,255,0.1); }
		.search svg {
			position:absolute;
			top:.25rem; right:.5rem;
			width:1.5rem; height:1.5rem;
			cursor:pointer; opacity:1;
			transform:scale(1);
			fill:var(--main);
			pointer-events:none
		}
		.search.open svg { opacity:0; transform:scale(.8) }
		#search {
			width:calc(100% - .5rem);
			margin:.25rem;
			border:0; outline:none;
			background:none;
			border-radius:.25rem;
			color:var(--main);
			text-transform:uppercase;
			font-weight:500
		}
		.results {
			position: absolute;
			top: 4.5rem;
			left: 50%;
			transform: translateX(-50%);
			min-height:25vh;
			opacity:0;
			pointer-events:none
		}
		.mFolder {
			position: relative;
			float: left;
			margin-right: 1rem;
			color: var(--main);
			background:rgba(255,255,255,0.05);
			cursor: alias;
			padding: .25rem 1rem .25rem 1.5rem;
			border-radius: .25rem;
			pointer-events:initial !important
		}
		.mFolder:hover { background:rgba(255,255,255,0.1) }
		.mFolder svg { position:absolute; top:.365rem; left:.25rem; height:1rem; width:1rem; fill:var(--main) }
		.results * .size { float:left; margin-top:.125rem }
		body.searching .results { opacity:1; z-index:222; pointer-events:initial }
		body.firefox.modal.searching .results { filter:blur(20px) }
		body.searching .browser, body.searching #title { opacity:0; pointer-events:none }
		body.searching .browser * { pointer-events:none !important }
		.up { position:fixed; bottom:1rem; right:1rem; z-index:1; opacity:0; cursor:default; mix-blend-mode:overlay; }
		.up svg { width:1rem; height:1rem }
		.up.show:hover { filter:brightness(125%); background:rgba(0,0,0,.6) }
		body.dark .metadata .row::after, body.dark .metadata .row::before { filter:invert(.5) }
		body.dynamic footer { mix-blend-mode:overlay }
		body.loading .browser { opacity:0.5; pointer-events:none }
		body.loading * { cursor:wait }

		/* MOBILE :: PORTRAIT */
		@media screen and (orientation: portrait) {
			#title 		{ font-size: 1.25rem }
			.search 	{ top:.5rem; right:.25rem }
			.sub a, .sub > a { height: 3.5rem; padding-left: 2.75rem; margin-left:.85rem !important; width:calc(100% - .85rem) !important } /* ADD SIMPLE DOT INDICATOR, OR ARROW THING? */
			a.dir { padding-left: 3.75rem !important }
			.name 		{ font-size: 1rem !important; margin-top: -.25rem !important; margin-bottom: .25rem }
			.fileIcon 	{ width: 1.25rem; left: .75rem }
			.files, .size { font-size: .75rem !important }
			.mod 		{ display:none }
			footer 		{ font-size: .75rem }
		}

		/* CODE HIGHLIGHER */
		@keyframes fade-in{0%{opacity:0}100%{opacity:1}}@keyframes fade{10%{transform:scale(1,1)}35%{transform:scale(1,1.7)}40%{transform:scale(1,1.7)}50%{opacity:1}60%{transform:scale(1,1)}100%{transform:scale(1,1);opacity:0}}[data-language] code,[class^="lang"] code,pre [data-language],pre [class^="lang"]{opacity:0;animation:fade-in 50ms ease-in-out 2s forwards}[data-language] code.rainbow,[class^="lang"] code.rainbow,pre [data-language].rainbow,pre [class^="lang"].rainbow{animation:none;transition:opacity 50ms ease-in-out}[data-language] code.loading,[class^="lang"] code.loading,pre [data-language].loading,pre [class^="lang"].loading{animation:none}[data-language] code.rainbow-show,[class^="lang"] code.rainbow-show,pre [data-language].rainbow-show,pre [class^="lang"].rainbow-show{opacity:1}pre{position:relative}pre.loading .preloader div{animation-play-state:running}pre.loading .preloader div:nth-of-type(1){background:#0081f5;animation:fade 1.5s 300ms linear infinite}pre.loading .preloader div:nth-of-type(2){background:#5000f5;animation:fade 1.5s 438ms linear infinite}pre.loading .preloader div:nth-of-type(3){background:#9000f5;animation:fade 1.5s 577ms linear infinite}pre.loading .preloader div:nth-of-type(4){background:#f50419;animation:fade 1.5s 715ms linear infinite}pre.loading .preloader div:nth-of-type(5){background:#f57900;animation:fade 1.5s 853ms linear infinite}pre.loading .preloader div:nth-of-type(6){background:#f5e600;animation:fade 1.5s 992ms linear infinite}pre.loading .preloader div:nth-of-type(7){background:#00f50c;animation:fade 1.5s 1130ms linear infinite}pre .preloader div{width:1rem;height:1rem;border-radius:.25rem;display:inline-block;margin-right:.25rem;opacity:0;animation-play-state:paused}pre{word-wrap:break-word;width:calc(100% - 2rem);margin-left:1rem}pre,code{font-family:<?php echo $font_family_mono; ?>}pre{color:#c5c8c6}pre .comment{color:#969896}pre .variable.global,pre .variable.class,pre .variable.instance{color:#c66}pre .constant.numeric,pre .constant.language,pre .constant.hex-color,pre .keyword.unit{color:#de935f}pre .constant,pre .entity,pre .entity.class,pre .support{color:#f0c674}pre .constant.symbol,pre .string{color:#b5bd68}pre .entity.function,pre .support.css-property,pre .selector{color:#81a2be}pre .keyword,pre .storage{color:#b294bb}
	</style>
</head>
<body class="<?php echo $browser; ?>">
	<?php echo $notice; ?>
	<div class="up ani"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_up; ?></svg></div>
	<h1 id="title"><?php echo $title ?></h1>
	<div class="search ani">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_search; ?></svg>
		<input type="text" name="q" id="search">
	</div>

	<section class="results ani">
		<h1>〔SEARCH RESULTS〕</h1>
	</section>

	<section class="preview ani">
		<a title="CLOSE PREVIEW" id="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_close; ?></svg></a>
		<h1 id="name"></h1>
		<figure id="_img"></figure>
		<video id="_vid" src="" controls autoplay></video>
		<audio id="_aud" src="" controls autoplay></audio>
		<iframe id="_web" src=""></iframe>
		<pre><code id="_txt">...</code></pre>
		<a id="link" title="COPY PREVIEW LINK"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_link; ?></svg></a>
		<a id="dl" download><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_download; ?></svg></a>
		<a id="meta" title="IMAGE METADATA"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_meta; ?></svg></a>
	</section>

	<section class="browser ani sdw"  data-dir="<?php if(isset($_REQUEST['dir'])){ echo ltrim(rtrim(rawurldecode($_REQUEST['dir']), '/'), '/');} if(isset($_GET['open'])){ echo ltrim(rtrim(rawurldecode($_GET['open']), '/'), '/');} ?>">

	<?php
		// GENERATE FILE BROWSER ENTRIES
		$tree = new folderStructure();
		$tree->buildHTML($tree->buildTree(), '', 0);
	?>

	<script type="text/javascript">
		/* Rainbow v2.1.4 rainbowco.de | included languages: css, generic, html, javascript, json, php, python, shell, sql */!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.Rainbow=t()}(this,function(){"use strict";function e(){return"undefined"!=typeof module&&"object"==typeof module.exports}function t(){return"undefined"==typeof document&&"undefined"!=typeof self}function n(e){var t=e.getAttribute("data-language")||e.parentNode.getAttribute("data-language");if(!t){var n=/\blang(?:uage)?-(\w+)/,r=e.className.match(n)||e.parentNode.className.match(n);r&&(t=r[1])}return t?t.toLowerCase():null}function r(e,t,n,r){return(n!==e||r!==t)&&(n<=e&&r>=t)}function a(e){return e.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/&(?![\w\#]+;)/g,"&amp;")}function o(e,t){for(var n=0,r=1;r<t;++r)e[r]&&(n+=e[r].length);return n}function i(e,t,n,r){return n>=e&&n<t||r>e&&r<t}function s(e){var t=[];for(var n in e)e.hasOwnProperty(n)&&t.push(n);return t.sort(function(e,t){return t-e})}function u(e,t,n,r){var a=r.substr(e);return r.substr(0,e)+a.replace(t,n)}function c(t,Prism){if(e())return global.Worker=require("webworker-threads").Worker,new Worker(__filename);var n=Prism.toString(),c=s.toString();c+=a.toString(),c+=r.toString(),c+=i.toString(),c+=u.toString(),c+=o.toString(),c+=n;var l=c+"\tthis.onmessage="+t.toString(),f=new Blob([l],{type:"text/javascript"});return new Worker((window.URL||window.webkitURL).createObjectURL(f))}function l(e){function t(){self.postMessage({id:n.id,lang:n.lang,result:a})}var n=e.data,r=new Prism(n.options),a=r.refract(n.code,n.lang);return n.isNode?(t(),void self.close()):void setTimeout(function(){t()},1e3*n.options.delay)}function f(){return(R||null===j)&&(j=c(l,Prism)),j}function d(e,t){function n(a){a.data.id===e.id&&(t(a.data),r.removeEventListener("message",n))}var r=f();r.addEventListener("message",n),r.postMessage(e)}function g(e,t,n){return function(r){e.innerHTML=r.result,e.classList.remove("loading"),e.classList.add("rainbow-show"),"PRE"===e.parentNode.tagName&&(e.parentNode.classList.remove("loading"),e.parentNode.classList.add("rainbow-show")),M&&M(e,r.lang),0===--t.c&&n()}}function m(e){return{patterns:C,inheritenceMap:S,aliases:T,globalClass:e.globalClass,delay:isNaN(e.delay)?0:e.delay}}function v(e,t){var n={};"object"==typeof t&&(n=t,t=n.language),t=T[t]||t;var r={id:A++,code:e,lang:t,options:m(n),isNode:R};return r}function p(e,t){for(var r={c:0},a=0,o=e;a<o.length;a+=1){var i=o[a],s=n(i);if(!i.classList.contains("rainbow")&&s){i.classList.add("loading"),i.classList.add("rainbow"),"PRE"===i.parentNode.tagName&&i.parentNode.classList.add("loading");var u=i.getAttribute("data-global-class"),c=parseInt(i.getAttribute("data-delay"),10);++r.c,d(v(i.innerHTML,{language:s,globalClass:u,delay:c}),g(i,r,t))}}0===r.c&&t()}function h(e){var t=document.createElement("div");t.className="preloader";for(var n=0;n<7;n++)t.appendChild(document.createElement("div"));e.appendChild(t)}function b(e,t){t=t||function(){},e=e&&"function"==typeof e.getElementsByTagName?e:document;for(var n=e.getElementsByTagName("pre"),r=e.getElementsByTagName("code"),a=[],o=[],i=0,s=n;i<s.length;i+=1){var u=s[i];h(u),u.getElementsByTagName("code").length?u.getAttribute("data-trimmed")||(u.setAttribute("data-trimmed",!0),u.innerHTML=u.innerHTML.trim()):a.push(u)}for(var c=0,l=r;c<l.length;c+=1){var f=l[c];o.push(f)}p(o.concat(a),t)}function w(e){M=e}function y(e,t,n){S[e]||(S[e]=n),C[e]=t.concat(C[e]||[])}function L(e){delete S[e],delete C[e]}function N(){for(var e=[],t=arguments.length;t--;)e[t]=arguments[t];if("string"==typeof e[0]){var n=v(e[0],e[1]);return void d(n,function(e){return function(t){e&&e(t.result,t.lang)}}(e[2]))}return"function"==typeof e[0]?void b(0,e[0]):void b(e[0],e[1])}function E(e,t){T[e]=t}var M,Prism=function Prism(e){function t(e,t){for(var n in h)if(n=parseInt(n,10),r(n,h[n],e,t)&&(delete h[n],delete p[n]),i(n,h[n],e,t))return!0;return!1}function n(t,n){var r=t.replace(/\./g," "),a=e.globalClass;return a&&(r+=" "+a),'<span class="'+r+'">'+n+"</span>"}function c(e){for(var t=s(p),n=0,r=t;n<r.length;n+=1){var a=r[n],o=p[a];e=u(a,o.replace,o["with"],e)}return e}function l(e){var t="";return e.ignoreCase&&(t+="i"),e.multiline&&(t+="m"),new RegExp(e.source,t)}function f(r,a,i){function c(e){return r.name&&(e=n(r.name,e)),p[w]={replace:m[0],"with":e},h[w]=y,!g&&{remaining:a.substr(y-i),offset:y}}function f(t){var a=m[t];if(a){var i=r.matches[t],s=i.language,c=i.name&&i.matches?i.matches:i,l=function(e,r,a){b=u(o(m,t),e,a?n(a,r):r,b)};if("string"==typeof i)return void l(a,a,i);var f,d=new Prism(e);if(s)return f=d.refract(a,s),void l(a,f);f=d.refract(a,v,c.length?c:[c]),l(a,f,i.matches?i.name:0)}}void 0===i&&(i=0);var d=r.pattern;if(!d)return!1;var g=!d.global;d=l(d);var m=d.exec(a);if(!m)return!1;!r.name&&r.matches&&"string"==typeof r.matches[0]&&(r.name=r.matches[0],delete r.matches[0]);var b=m[0],w=m.index+i,y=m[0].length+w;if(w===y)return!1;if(t(w,y))return{remaining:a.substr(y-i),offset:y};for(var L=s(r.matches),N=0,E=L;N<E.length;N+=1){var M=E[N];f(M)}return c(b)}function d(e,t){for(var n=0,r=t;n<r.length;n+=1)for(var a=r[n],o=f(a,e);o;)o=f(a,o.remaining,o.offset);return c(e)}function g(t){for(var n=e.patterns[t]||[];e.inheritenceMap[t];)t=e.inheritenceMap[t],n=n.concat(e.patterns[t]||[]);return n}function m(e,t,n){return v=t,n=n||g(t),d(a(e),n)}var v,p={},h={};this.refract=m},C={},S={},T={},x={},A=0,R=e(),k=t(),j=null;x={extend:y,remove:L,onHighlight:w,addAlias:E,color:N},R&&(x.colorSync=function(e,t){var n=v(e,t),r=new Prism(n.options);return r.refract(n.code,n.lang)}),R||k||document.addEventListener("DOMContentLoaded",function(e){x.defer||x.color(e)},!1),k&&(self.onmessage=l);var B=x;return B});
		Rainbow.extend("css",[{name:"comment",pattern:/\/\*[\s\S]*?\*\//gm},{name:"constant.hex-color",pattern:/#([a-f0-9]{3}|[a-f0-9]{6})(?=;|\s|,|\))/gi},{matches:{1:"constant.numeric",2:"keyword.unit"},pattern:/(\d+)(px|em|cm|s|%)?/g},{name:"string",pattern:/('|")(.*?)\1/g},{name:"support.css-property",matches:{1:"support.vendor-prefix"},pattern:/(-o-|-moz-|-webkit-|-ms-)?[\w-]+(?=\s?:)(?!.*\{)/g},{matches:{1:[{name:"entity.name.sass",pattern:/&amp;/g},{name:"direct-descendant",pattern:/&gt;/g},{name:"entity.name.class",pattern:/\.[\w\-_]+/g},{name:"entity.name.id",pattern:/\#[\w\-_]+/g},{name:"entity.name.pseudo",pattern:/:[\w\-_]+/g},{name:"entity.name.tag",pattern:/\w+/g}]},pattern:/([\w\ ,\n:\.\#\&\;\-_]+)(?=.*\{)/g},{matches:{2:"support.vendor-prefix",3:"support.css-value"},pattern:/(:|,)\s*(-o-|-moz-|-webkit-|-ms-)?([a-zA-Z-]*)(?=\b)(?!.*\{)/g}]),Rainbow.addAlias("scss","css"),Rainbow.extend("generic",[{matches:{1:[{name:"keyword.operator",pattern:/\=|\+/g},{name:"keyword.dot",pattern:/\./g}],2:{name:"string",matches:{name:"constant.character.escape",pattern:/\\('|"){1}/g}}},pattern:/(\(|\s|\[|\=|:|\+|\.|\{|,)(('|")([^\\\1]|\\.)*?(\3))/gm},{name:"comment",pattern:/\/\*[\s\S]*?\*\/|(\/\/|\#)(?!.*('|").*?[^:](\/\/|\#)).*?$/gm},{name:"constant.numeric",pattern:/\b(\d+(\.\d+)?(e(\+|\-)?\d+)?(f|d)?|0x[\da-f]+)\b/gi},{matches:{1:"keyword"},pattern:/\b(and|array|as|b(ool(ean)?|reak)|c(ase|atch|har|lass|on(st|tinue))|d(ef|elete|o(uble)?)|e(cho|lse(if)?|xit|xtends|xcept)|f(inally|loat|or(each)?|unction)|global|if|import|int(eger)?|long|new|object|or|pr(int|ivate|otected)|public|return|self|st(ring|ruct|atic)|switch|th(en|is|row)|try|(un)?signed|var|void|while)(?=\b)/gi},{name:"constant.language",pattern:/true|false|null/g},{name:"keyword.operator",pattern:/\+|\!|\-|&(gt|lt|amp);|\||\*|\=/g},{matches:{1:"function.call"},pattern:/(\w+?)(?=\()/g},{matches:{1:"storage.function",2:"entity.name.function"},pattern:/(function)\s(.*?)(?=\()/g}]),Rainbow.extend("html",[{name:"source.php.embedded",matches:{1:"variable.language.php-tag",2:{language:"php"},3:"variable.language.php-tag"},pattern:/(&lt;\?php|&lt;\?=?(?!xml))([\s\S]*?)(\?&gt;)/gm},{name:"source.css.embedded",matches:{1:{matches:{1:"support.tag.style",2:[{name:"entity.tag.style",pattern:/^style/g},{name:"string",pattern:/('|")(.*?)(\1)/g},{name:"entity.tag.style.attribute",pattern:/(\w+)/g}],3:"support.tag.style"},pattern:/(&lt;\/?)(style.*?)(&gt;)/g},2:{language:"css"},3:"support.tag.style",4:"entity.tag.style",5:"support.tag.style"},pattern:/(&lt;style.*?&gt;)([\s\S]*?)(&lt;\/)(style)(&gt;)/gm},{name:"source.js.embedded",matches:{1:{matches:{1:"support.tag.script",2:[{name:"entity.tag.script",pattern:/^script/g},{name:"string",pattern:/('|")(.*?)(\1)/g},{name:"entity.tag.script.attribute",pattern:/(\w+)/g}],3:"support.tag.script"},pattern:/(&lt;\/?)(script.*?)(&gt;)/g},2:{language:"javascript"},3:"support.tag.script",4:"entity.tag.script",5:"support.tag.script"},pattern:/(&lt;script(?! src).*?&gt;)([\s\S]*?)(&lt;\/)(script)(&gt;)/gm},{name:"comment.html",pattern:/&lt;\!--[\S\s]*?--&gt;/g},{matches:{1:"support.tag.open",2:"support.tag.close"},pattern:/(&lt;)|(\/?\??&gt;)/g},{name:"support.tag",matches:{1:"support.tag",2:"support.tag.special",3:"support.tag-name"},pattern:/(&lt;\??)(\/|\!?)(\w+)/g},{matches:{1:"support.attribute"},pattern:/([a-z-]+)(?=\=)/gi},{matches:{1:"support.operator",2:"string.quote",3:"string.value",4:"string.quote"},pattern:/(=)('|")(.*?)(\2)/g},{matches:{1:"support.operator",2:"support.value"},pattern:/(=)([a-zA-Z\-0-9]*)\b/g},{matches:{1:"support.attribute"},pattern:/\s([\w-]+)(?=\s|&gt;)(?![\s\S]*&lt;)/g}]),Rainbow.addAlias("xml","html"),Rainbow.extend("javascript",[{name:"selector",pattern:/\$(?=\.|\()/g},{name:"support",pattern:/\b(window|document)\b/g},{name:"keyword",pattern:/\b(export|default|from)\b/g},{name:"function.call",pattern:/\b(then)(?=\()/g},{name:"variable.language.this",pattern:/\bthis\b/g},{name:"variable.language.super",pattern:/super(?=\.|\()/g},{name:"storage.type",pattern:/\b(const|let|var)(?=\s)/g},{matches:{1:"support.property"},pattern:/\.(length|node(Name|Value))\b/g},{matches:{1:"support.function"},pattern:/(setTimeout|setInterval)(?=\()/g},{matches:{1:"support.method"},pattern:/\.(getAttribute|replace|push|getElementById|getElementsByClassName|setTimeout|setInterval)(?=\()/g},{name:"string.regexp",matches:{1:"string.regexp.open",2:{name:"constant.regexp.escape",pattern:/\\(.){1}/g},3:"string.regexp.close",4:"string.regexp.modifier"},pattern:/(\/)((?![*+?])(?:[^\r\n\[\/\\]|\\.|\[(?:[^\r\n\]\\]|\\.)*\])+)(\/)(?!\/)([igm]{0,3})/g},{matches:{1:"storage.type",3:"entity.function"},pattern:/(var)?(\s|^)(\S+)(?=\s?=\s?function\()/g},{matches:{1:"keyword",2:"variable.type"},pattern:/(new)\s+(?!Promise)([^\(]*)(?=\()/g},{name:"entity.function",pattern:/(\w+)(?=:\s{0,}function)/g},{name:"constant.other",pattern:/\*(?= as)/g},{matches:{1:"keyword",2:"constant.other"},pattern:/(export)\s+(\*)/g},{matches:{1:"storage.type.accessor",2:"entity.name.function"},pattern:/(get|set)\s+(\w+)(?=\()/g},{matches:{2:"entity.name.function"},pattern:/(^\s*)(\w+)(?=\([^\)]*?\)\s*\{)/gm},{matches:{1:"storage.type.class",2:"entity.name.class",3:"storage.modifier.extends",4:"entity.other.inherited-class"},pattern:/(class)\s+(\w+)(?:\s+(extends)\s+(\w+))?(?=\s*\{)/g},{name:"storage.type.function.arrow",pattern:/=&gt;/g},{name:"support.class.promise",pattern:/\bPromise(?=(\(|\.))/g}],"generic"),Rainbow.addAlias("js","javascript"),Rainbow.extend("json",[{matches:{0:{name:"string",matches:{name:"constant.character.escape",pattern:/\\('|"){1}/g}}},pattern:/(\"|\')(\\?.)*?\1/g},{name:"constant.numeric",pattern:/\b(-?(0x)?\d*\.?[\da-f]+|NaN|-?Infinity)\b/gi},{name:"constant.language",pattern:/\b(true|false|null)\b/g}]),Rainbow.extend("php",[{name:"support",pattern:/\becho\b/gi},{matches:{1:"variable.dollar-sign",2:"variable"},pattern:/(\$)(\w+)\b/g},{name:"constant.language",pattern:/true|false|null/gi},{name:"constant",pattern:/\b[A-Z0-9_]{2,}\b/g},{name:"keyword.dot",pattern:/\./g},{name:"keyword",pattern:/\b(die|end(for(each)?|switch|if)|case|require(_once)?|include(_once)?)(?=\b)/gi},{matches:{1:"keyword",2:{name:"support.class",pattern:/\w+/g}},pattern:/(instanceof)\s([^\$].*?)(\)|;)/gi},{matches:{1:"support.function"},pattern:/\b(array(_key_exists|_merge|_keys|_shift)?|isset|count|empty|unset|printf|is_(array|string|numeric|object)|sprintf|each|date|time|substr|pos|str(len|pos|tolower|_replace|totime)?|ord|trim|in_array|implode|end|preg_match|explode|fmod|define|link|list|get_class|serialize|file|sort|mail|dir|idate|log|intval|header|chr|function_exists|dirname|preg_replace|file_exists)(?=\()/gi},{name:"variable.language.php-tag",pattern:/(&lt;\?(php)?|\?&gt;)/gi},{matches:{1:"keyword.namespace",2:{name:"support.namespace",pattern:/\w+/g}},pattern:/\b(namespace|use)\s(.*?);/gi},{matches:{1:"storage.modifier",2:"storage.class",3:"entity.name.class",4:"storage.modifier.extends",5:"entity.other.inherited-class",6:"storage.modifier.extends",7:"entity.other.inherited-class"},pattern:/\b(abstract|final)?\s?(class|interface|trait)\s(\w+)(\sextends\s)?([\w\\]*)?(\simplements\s)?([\w\\]*)?\s?\{?(\n|\})/gi},{name:"keyword.static",pattern:/self::|static::/gi},{matches:{1:"storage.function",2:"entity.name.function.magic"},pattern:/(function)\s(__.*?)(?=\()/gi},{matches:{1:"storage.function",2:"entity.name.function"},pattern:/(function)\s(.*?)(?=\()/gi},{matches:{1:"keyword.new",2:{name:"support.class",pattern:/\w+/g}},pattern:/\b(new)\s([^\$][a-z0-9_\\]*?)(?=\)|\(|;)/gi},{matches:{1:{name:"support.class",pattern:/\w+/g},2:"keyword.static"},pattern:/([\w\\]*?)(::)(?=\b|\$)/g},{matches:{2:{name:"support.class",pattern:/\w+/g}},pattern:/(\(|,\s?)([\w\\]*?)(?=\s\$)/g}],"generic"),Rainbow.extend("python",[{name:"variable.self",pattern:/self/g},{name:"constant.language",pattern:/None|True|False|NotImplemented|\.\.\./g},{name:"support.object",pattern:/object/g},{name:"support.function.python",pattern:/\b(bs|divmod|input|open|staticmethod|all|enumerate|int|ord|str|any|eval|isinstance|pow|sum|basestring|execfile|issubclass|print|super|bin|file|iter|property|tuple|bool|filter|len|range|type|bytearray|float|list|raw_input|unichr|callable|format|locals|reduce|unicode|chr|frozenset|long|reload|vars|classmethod|getattr|map|repr|xrange|cmp|globals|max|reversed|zip|compile|hasattr|memoryview|round|__import__|complex|hash|min|set|apply|delattr|help|next|setattr|buffer|dict|hex|object|slice|coerce|dir|id|oct|sorted|intern)(?=\()/g},{matches:{1:"keyword"},pattern:/\b(pass|lambda|with|is|not|in|from|elif|raise|del)(?=\b)/g},{matches:{1:"storage.class",2:"entity.name.class",3:"entity.other.inherited-class"},pattern:/(class)\s+(\w+)\((\w+?)\)/g},{matches:{1:"storage.function",2:"support.magic"},pattern:/(def)\s+(__\w+)(?=\()/g},{name:"support.magic",pattern:/__(name)__/g},{matches:{1:"keyword.control",2:"support.exception.type"},pattern:/(except) (\w+):/g},{matches:{1:"storage.function",2:"entity.name.function"},pattern:/(def)\s+(\w+)(?=\()/g},{name:"entity.name.function.decorator",pattern:/@([\w\.]+)/g},{name:"comment.docstring",pattern:/('{3}|"{3})[\s\S]*?\1/gm}],"generic"),Rainbow.extend("shell",[{name:"shell",matches:{1:{language:"shell"}},pattern:/\$\(([\s\S]*?)\)/gm},{matches:{2:"string"},pattern:/(\(|\s|\[|\=)(('|")[\s\S]*?(\3))/gm},{name:"keyword.operator",pattern:/&lt;|&gt;|&amp;/g},{name:"comment",pattern:/\#[\s\S]*?$/gm},{name:"storage.function",pattern:/(.+?)(?=\(\)\s{0,}\{)/g},{name:"support.command",pattern:/\b(echo|rm|ls|(mk|rm)dir|cd|find|cp|exit|pwd|exec|trap|source|shift|unset)/g},{matches:{1:"keyword"},pattern:/\b(break|case|continue|do|done|elif|else|esac|eval|export|fi|for|function|if|in|local|return|set|then|unset|until|while)(?=\b)/g}]),Rainbow.extend("sql",[{matches:{2:{name:"string",matches:{name:"constant.character.escape",pattern:/\\('|"|`){1}/g}}},pattern:/(\(|\s|\[|\=|:|\+|\.|\{|,)(('|"|`)([^\\\1]|\\.)*?(\3))/gm},{name:"comment",pattern:/--.*$|\/\*[\s\S]*?\*\/|(\/\/)[\s\S]*?$/gm},{name:"constant.numeric",pattern:/\b(\d+(\.\d+)?(e(\+|\-)?\d+)?(f|d)?|0x[\da-f]+)\b/gi},{name:"function.call",pattern:/(\w+?)(?=\()/g},{name:"keyword",pattern:/\b(ABSOLUTE|ACTION|ADA|ADD|ALL|ALLOCATE|ALTER|AND|ANY|ARE|AS|ASC|ASSERTION|AT|AUTHORIZATION|AVG|BEGIN|BETWEEN|BIT|BIT_LENGTH|BOTH|BY|CASCADE|CASCADED|CASE|CAST|CATALOG|CHAR|CHARACTER|CHARACTER_LENGTH|CHAR_LENGTH|CHECK|CLOSE|COALESCE|COLLATE|COLLATION|COLUMN|COMMIT|CONNECT|CONNECTION|CONSTRAINT|CONSTRAINTS|CONTINUE|CONVERT|CORRESPONDING|COUNT|CREATE|CROSS|CURRENT|CURRENT_DATE|CURRENT_TIME|CURRENT_TIMESTAMP|CURRENT_USER|CURSOR|DATE|DAY|DEALLOCATE|DEC|DECIMAL|DECLARE|DEFAULT|DEFERRABLE|DEFERRED|DELETE|DESC|DESCRIBE|DESCRIPTOR|DIAGNOSTICS|DISCONNECT|DISTINCT|DOMAIN|DOUBLE|DROP|ELSE|END|END-EXEC|ESCAPE|EXCEPT|EXCEPTION|EXEC|EXECUTE|EXISTS|EXTERNAL|EXTRACT|FALSE|FETCH|FIRST|FLOAT|FOR|FOREIGN|FORTRAN|FOUND|FROM|FULL|GET|GLOBAL|GO|GOTO|GRANT|GROUP|HAVING|HOUR|IDENTITY|IMMEDIATE|IN|INCLUDE|INDEX|INDICATOR|INITIALLY|INNER|INPUT|INSENSITIVE|INSERT|INT|INTEGER|INTERSECT|INTERVAL|INTO|IS|ISOLATION|JOIN|KEY|LANGUAGE|LAST|LEADING|LEFT|LEVEL|LIKE|LIMIT|LOCAL|LOWER|MATCH|MAX|MIN|MINUTE|MODULE|MONTH|NAMES|NATIONAL|NATURAL|NCHAR|NEXT|NO|NONE|NOT|NULL|NULLIF|NUMERIC|OCTET_LENGTH|OF|ON|ONLY|OPEN|OPTION|OR|ORDER|OUTER|OUTPUT|OVERLAPS|PAD|PARTIAL|PASCAL|POSITION|PRECISION|PREPARE|PRESERVE|PRIMARY|PRIOR|PRIVILEGES|PROCEDURE|PUBLIC|READ|REAL|REFERENCES|RELATIVE|RESTRICT|REVOKE|RIGHT|ROLLBACK|ROWS|SCHEMA|SCROLL|SECOND|SECTION|SELECT|SESSION|SESSION_USER|SET|SIZE|SMALLINT|SOME|SPACE|SQL|SQLCA|SQLCODE|SQLERROR|SQLSTATE|SQLWARNING|SUBSTRING|SUM|SYSTEM_USER|TABLE|TEMPORARY|THEN|TIME|TIMESTAMP|TIMEZONE_HOUR|TIMEZONE_MINUTE|TO|TRAILING|TRANSACTION|TRANSLATE|TRANSLATION|TRIM|TRUE|UNION|UNIQUE|UNKNOWN|UPDATE|UPPER|USAGE|USER|USING|VALUE|VALUES|VARCHAR|VARYING|VIEW|WHEN|WHENEVER|WHERE|WITH|WORK|WRITE|YEAR|ZONE|USE)(?=\b)/gi},{name:"keyword.operator",pattern:/\+|\!|\-|&(gt|lt|amp);|\||\*|=/g}]);
	</script>
	<script type="text/javascript">
		let body 	 = document.querySelector('body');
		let rem  	 = parseFloat(getComputedStyle(document.documentElement).fontSize);
		let base 	 = '<?php echo $base; ?>';
		let cURL 	 = decodeURIComponent(window.location.href);
		let browser  = body.querySelector('.browser');
		let dir 	 = browser.dataset.dir;
		let preview  = body.querySelector('.preview');
		let search 	 = body.querySelector('#search');
		let results  = body.querySelector('.results');
		let fLimit 	 = '<?php echo $folder_limit; ?>';
		let audTypes = ['aac', 'mp3', 'm4a', 'weba', 'opus', 'flac', 'alac'];
		let imgTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg','dng','raf'];
		let txtTypes = ['txt', 'rtf', 'doc', 'js', 'json', 'css','py'];
		let vidTypes = ['mp4', 'm4v', 'mov', 'webm','ogg'];
		let webTypes = ['htm', 'html','pdf'];

		// START AT THE TOP OF THE PAGE
		history.scrollRestoration = "manual";
		window.onbeforeunload = function (){
			window.scrollTo({top:0, left:0,behavior: 'smooth'});
		}
		// CLEAR INPUT
		document.querySelector('#search').value = '';
		// IF URL CONTAINS OPEN VAR REWRITE URL CLEAN
		history.pushState(null, base.substr(0, base.lastIndexOf('.')), base);
		// OPEN BASED ON OPENING URL
		if(cURL !== base){
			// OPEN DIRECTORY OR DIRECTORY OF FILE
			if(cURL.includes('?open=')){
				document.addEventListener('DOMContentLoaded', function(){
					findBlock(cURL, true, true);
				});
			}
			else {
				setTree(browser.querySelector('*[href="'+cURL+'"'));
			}
		}
		
		// SET DYNAMIC THEME
		theme = <?php if($dynamic_theme){echo 'true';} else{echo 'false';} ?>;
		if(theme){
			// LOCAL OR SERVER TIME
			if('<?php echo $theme_time; ?>' === 'local'){
				cHour = new Date().getHours();
			}
			else {
				cHour = '<?php if($theme_time == 'server'){ echo date('H'); } ?>';
			}
			// PICK GRADIENT BASED ON HOUR RANGE
			let grad   = 'rgb(16, 23, 52) 0%, rgb(49, 65, 129) 80%, rgb(92, 106, 153)';
			if(cHour == 6){ grad = 'rgb(42, 40, 64) 0%, rgb(118, 99, 98) 81%, rgb(202, 132, 49)' } 								// NIGHT
			if(cHour == 7){ grad = 'rgb(65, 45, 47) 0%, rgb(150, 92, 46) 73%, rgb(237, 108, 5) 93%, rgb(254, 101, 2)' } 		// SUNRISE
			if(cHour == 8){ grad = 'rgb(60, 62, 102) 0%, rgb(146, 124, 122) 74%, rgb(242, 158, 58) 94%, rgb(254, 159, 25)' }	// MORNING
			if(cHour >= 9 && cHour <= 17){ grad = 'rgb(72, 122, 254) 0%, rgb(128, 159, 254) 50%, rgb(194, 190, 209)' } 			// AFTERNOON
			if(cHour == 17){ grad = 'rgb(252, 184, 108) 0%, rgb(151, 147, 195) 20%, rgb(100, 110, 201) 40%, rgb(54, 69, 160)' } // SUNSET
			if(cHour == 18){ grad = 'rgb(59, 56, 114) 0%, rgb(143, 115, 148) 72%, rgb(226, 143, 83) 92%, rgb(254, 149, 39)' }  	// SUNSET
			if(cHour == 19){ grad = 'rgb(70, 43, 58) 0%, rgb(151, 78, 52) 74%, rgb(241, 92, 0) 94%, rgb(255, 87, 4)' } 			// EARLY EVENING
			if(cHour >= 19 && cHour <= 23){ grad = 'rgb(16, 23, 52) 0%, rgb(49, 65, 129) 80%, rgb(92, 106, 153)' } 				// EVENING
			body.style.setProperty('background-image', 'linear-gradient(to bottom, '+grad+' 100%)');
			body.style.setProperty('--main', (cHour >= 18 && cHour <= 7) ? '#333' : '#CCC'); // DARK OR LIGHT COLORS
			<?php if($dynamic_theme){ echo "body.classList.add('dynamic');";} ?>
			if((cHour >= 18 && cHour <= 7) || window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches){ body.classList.add('dark') }
		}
		// IF ANY FOLDER CONTAINS ONLY SUBFOLDERS SET LAST SUBFOLDER BRANCH TO BUD-END
		browser.querySelectorAll('.sub').forEach(function (x, i){
			// IF NO FILES IN THIS SUB (EXCL ANY IN SUBFOLDERS WITHIN)
			try {
				let _x = [...x.querySelectorAll('.block.dir')];
					_x[_x.length-1].classList.add('end');
			}
			catch(e){}
		});

		// :: FUNCTION :: INITIATE FILE DOWNLOAD
		function download(tar){
			var blob;
			var dl = x.dataset.name;
			var req = new XMLHttpRequest();
			req.open('GET', x.href, true);
			req.responseType = 'arraybuffer';
			req.onload = function(e){
				blob = new Blob([this.response]);
			}
			bar = tar.querySelector('.dlProgress');
			bar.classList.add('progress');
			req.onprogress = function(pr){
				bar.style.setProperty('width', pr.loaded/pr.total*100 + '%');
			}
			req.onloadend = function(e){
				var e 		= document.createElement("a");
				document.body.appendChild(e);
				e.style 	= 'display: none';
				url 		= window.URL.createObjectURL(blob);
				e.href 		= url;
				e.download 	= dl;
				e.click();
				window.URL.revokeObjectURL(url);
				document.body.removeChild(e);
				setTimeout(function(){
					bar.style.setProperty('width', '0%');
					bar.classList.remove('progress');
				}, 2000);
			}
			req.send();
		}

		//
		// :: INTERACTIONS :: OPEN/CLOSE DIRECTORY LISTS
		//
		function findParents(x){
			par = [];
			while(x.parentNode){
				if(x.classList.contains('dir') || x.classList.contains('sub')){
					par.push(x);
					if(!x.parentNode.classList.contains('browser')){
						par.push(x.parentNode.previousSibling);
					}
				}
				x = x.parentNode;
			}
			return par;
		}
		function findBlock(x, f, p){
			fld = browser; // INITIAL BEING ROOT DIRECTORY
			tar = x.replace('?open=','');
			// IF FILE THEN MAKE TAR IT'S PARENT FOLDER
			sub = tar;
			if(f){
				sub = sub.substring(0, sub.lastIndexOf('/'))+'/';
			}
			// FIND PARENT DIR
			browser.querySelectorAll('.dir').forEach(function (_x, _i){
				if(decodeURIComponent(_x.href) === sub){
					setTree(_x);
					fld = _x;
					return true;
				}
			});
			// FIND FILE TO OPEN INSIDE FOUND FOLDER
			if(f){
				// ALSO GO TO THE FILE AND OPEN IN PREVIEW
				browser.querySelector('a[href="'+x.replace('?open=','')+'"]').click();
				// SCROLL TO ELEMENT'S PARENT FOLDER
				window.scroll({top: fld.offsetTop - rem, behavior: 'smooth'});
			}
		}
		function setTree(x){
			// TOGGLE SELF AND TARGET SUB LIST
			tar = x.href;
			dir = x.nextSibling;
			par = findParents(x);
			// IF OPENED
			if(dir.classList.contains('open')){
				// CLOSE ANY ITEMS WITHIN
				dir.querySelectorAll('.open').forEach(function (_x, _i){
					_x.classList.remove('open');
				});
				// SET ADDRESS
				if(x.parentNode.classList.contains('browser')){
					tar = base;
				}
				else {
					tar = x.parentNode.previousSibling.href;
				}
			}
			// IF CLOSED
			else {
				// OPEN SELF AND ANY PARENT
				par.forEach(function (_x, _i){
					if(_x !== x){
						_x.classList.add('open');
					}
				});
				// CLOSE OTHER PARENT FOLDERS IF SET
				browser.querySelectorAll('.open').forEach(function (_x, _i){
					// IF NOT CURRENT, OR ASSOCIATED DIR, OR ANY PARENT NOT .BROWSER
					close = (_x !== x || _x !== dir || !par.includes(_x)) ? false : true;
					if(fLimit === 'single'){
						if (close){
							_x.classList.remove('open');
						}
					}
					else { // 'parent'
						if (close){
							_x.classList.remove('open');
						}
						else {
							// CLOSE ANY ROOT FOLDER
							if (_x.parentNode.classList.contains('browser') && !par.includes(_x)){
								_x.classList.remove('open');
							}
						}
					}
				});
			}
			// SCROLL TO TOP IF THIS DIR IS IN ROOT
			oS = 0;
			if(x.classList.contains('open')){
				if(!x.parentNode.classList.contains('browser')){
					oS = x.parentNode.offsetTop - rem*7.5;
				}
			}
			else {
				oS = x.offsetTop - rem;
				if(x.parentNode.classList.contains('browser')){
						window.scroll({top: 0, behavior: 'smooth'});
				}
			}
			window.scroll({top: oS, behavior: 'smooth'});
			// TOGGLE SELF AND ASSOCIATED SUB-DIR
			x.classList.toggle('open');
			dir.classList.toggle('open');
			// UPDATE HISTORY
			history.pushState(null, x.dataset.name, tar);
			cURL = tar;
		}
		// INTERACTIONS :: FOLDERS
		document.querySelectorAll('.block.dir').forEach(function (x, i){
			x.addEventListener('click', function(e){
				e.preventDefault();
				setTree(x);
			});
		});

		//
		// PREVIEW :: FILE HANDLER
		// 
		function fileHander(file, type){
			// OPEN FILE DIRECTLY IF TEXT OR IMAGE, ALSO SHOW DOWNLOAD BUTTON
			body.classList.remove('img', 'aud', 'vid', 'txt');
			body.classList.add(type);
			// SET TITLE
			preview.querySelector('#name').textContent = '〔' + file.split('/').pop() + '〕';
			// SET DOWNLOAD BUTTON
			preview.querySelector('#link').setAttribute('href', base + '?open=' + file.split(base)[1]);
			preview.querySelector('#dl').setAttribute('href', file);
			preview.querySelector('#dl').setAttribute('download', file.split('/').pop());
			// FOR FIREFOX
			if(type !== 'img'){
				body.classList.add('modal');
			}
			// FIGURE OUT PREVIEW TYPE
			if(type === 'img'){
				body.classList.add('loading');
				// LOAD FULL IMAGE
				// FIRST LOAD PLACEHOLDER
				let preImg = '';
				fetch(base + '?thumb=' + file.replace(base,'')).then(resp => {
					return resp.text();
				})
				.then(preImg => {
					preview.querySelector('#_img').innerHTML = '<img class="pic pre" src="'+preImg+'" /><img class="pic ani" src="'+file+'" />';
					// IF NOT FIREFOX SHOW MODAL AND BLUR PRELOADED IMG
					body.classList.add('modal');
					const preloadImage = file => new Promise(resolve => {
							const i = new Image();
							const onLoad = () => {
							resolve(i);
						};
						i.addEventListener('load', onLoad, {once: true});
						i.src = file;
					});
					preloadImage(file).then(i => {
						body.classList.add('modal');
						body.classList.remove('loading');
						preview.querySelector('#_img').classList.add('show');
					});
				}).catch(function (err){
					console.warn('/!\\ LOAD IMG /!\\', err);
				});
			}
			if(type === 'aud'){
				preview.querySelector('#_aud').src = file;
			}
			if(type === 'vid'){
				preview.querySelector('#_vid').src = file;
			}
			if(type === 'txt'){
				let url = file;
				// GET FILE CONTENT
				var rawFile = new XMLHttpRequest();
				rawFile.open('GET', url, false);
				rawFile.onreadystatechange = function ()
				{
					if(rawFile.readyState === 4)
					{
						if(rawFile.status === 200 || rawFile.status == 0)
						{
							tar = preview.querySelector('#_txt');
							tar.setAttribute('class', ''); // RESET BETWEEN FILES
							// REWRITE NAME BASED ON FILE EXTENTION
							let fileLang = file.split('.').pop();
							['py|python','sh|shell'].forEach(function(v){ if(fileLang === v.split('|')[0]){fileLang = v.split('|')[1]} });
							tar.setAttribute('data-language', fileLang);
							tar.textContent = rawFile.responseText;
							tar.scroll(0,0);
							Rainbow.color();
						}
					}
				}
				rawFile.send(null);
			}
			if(type === 'web'){
				document.getElementById('_web').src = file;
			}
		}
		//
		// :: MODAL ::
		//
		// CLOSE BUTTON
		function closeModal(){
			body.classList.toggle('modal');
			// STOP ANY MEDIA
			preview.querySelector('#_aud').pause();
			preview.querySelector('#_aud').currentTime = 0;
			preview.querySelector('#_vid').pause();
			preview.querySelector('#_vid').currentTime = 0;
			// RESET EACH ELEMENT
			try { preview.querySelector('.metadata').classList.remove('show') } catch(e){}
			setTimeout(function(){
				preview.querySelector('#_img').innerHTML 	= '';
				preview.querySelector('#_img').classList.remove('show');
				preview.querySelector('#_aud').src 			= '';
				preview.querySelector('#_vid').src 			= '';
				preview.querySelector('#_web').src 			= '';
				try {
					preview.querySelector('.metadata').remove();
				} catch(e){}
			}, 1000);
			// REMOVE FILENAME FROM CURRENT ADDRESS
			history.pushState(null, href.substr(0, href.lastIndexOf('/')), cURL.substr(0, cURL.lastIndexOf('/')) + '/');
		}
		document.querySelector('#close').addEventListener('click', function (e){
			closeModal();
		});
		// ↳ ESCAPE KEY
		document.addEventListener('keydown', e => {
			up = true;
			if (e.key === 'Backspace' || e.key === 'Escape'){
				if(body.classList.contains('searching') && !body.classList.contains('modal') && e.key === 'Escape'){
					e.preventDefault();
					body.classList.remove('searching');
					search.blur();
					search.value = '';
					search.parentNode.classList.remove('open');
				}
				else {
					e.preventDefault();
					if(body.classList.contains('modal')){
						up = false;
						closeModal();
					}
					else {
						// GO UP ONE FOLDER IN STRUCTURE
						if(up && cURL !== base){
							setTree(browser.querySelector('*[href="'+decodeURIComponent(cURL)+'"]')); // CLOSE CURRENT FOLDER
						}
						// IF ON ROOT BUT FOLDERS HAVE REMAINED OPEN
						else {
							body.querySelectorAll('.open').forEach(function (_x, _i){
								_x.classList.remove('open');
							});
							window.scroll({top: 0, behavior: 'smooth'});
						}
					}
					search.blur();
				}
			}
		});
		// PREVIEWER :: CLOSE METADATA POP IF CLICKED OUT OF IT
		document.querySelector('#_img').addEventListener('click', function (e){
			preview.querySelector('.metadata').classList.remove('show');
		});
		// PREVIEWER :: METADATA BUTTON
		meta = document.querySelector('#meta');
		meta.addEventListener('click', function (e){
			e.preventDefault();
			preview.querySelector('.metadata').classList.toggle('show');
		});
		meta.addEventListener('mouseenter', function (e){
			e.preventDefault();
			preview.querySelector('.metadata').style = 'opacity: 1';
		});
		meta.addEventListener('mouseleave', function (e){
			e.preventDefault();
			preview.querySelector('.metadata').style = 'opacity: 0';
		});
		// PREVIEWER :: LINK BUTTON
		document.querySelector('#link').addEventListener('click', function (e){
			e.preventDefault();
			navigator.clipboard.writeText(base + '?open=' + e.target.getAttribute('href').split(base)[1]);
			e.target.classList.toggle('tip');
			setTimeout(function(){ e.target.classList.toggle('tip') }, 1000);
		});

		//
		// :: SEARCH ::
		//
		search.addEventListener('focus', function (e){
			// SCROLL TO TOP OF PAGE
			window.scroll({top: 0, behavior: 'smooth'});
			if(e.target.value.length > 1){
				body.classList.add('searching');
			}
			// CLEAR ANY OLD HIGHLIGHTED ELEMENT
			browser.querySelectorAll('.highlight').forEach(function (x, i){
				x.classList.remove('highlight');
			});
		});
		search.addEventListener('blur', function (e){
			if(!body.classList.contains('searching')){
				e.target.parentNode.classList.toggle('open');
			}
		});
		search.addEventListener('keydown', function (e){
			// CLEAR PREVIOUS RESULTS
			try {
				results.querySelectorAll('.file').forEach(function (x, i){
					x.remove();
				});
			} catch(e){}
			if(e.target.value.length > 1){
				body.classList.add('searching');
				// TRY FINDING MATCHES IN .BROWSER
				browser.querySelectorAll('.file').forEach(function (x, i){
					let name = x.querySelector('.name').textContent.toLowerCase();
					let path = x.href.replace(base, '');
					path = path.substr(0, path.lastIndexOf('/'));
					if(path.length > 1){
						path =  '/' + path + '/';
					}
					else {
						path = './';
					}
					path = '<div class="mFolder" data-path="'+x.href+'" title="GO TO FILE"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 <?php echo $icon_folder; ?></svg>'+decodeURIComponent(path)+'</div>';
					if(name.indexOf(e.target.value.toLowerCase()) >= 0){
						results.innerHTML = results.innerHTML + (x.outerHTML.replace('<div class="data size">', path+'<div class="data size">').replace(' highlight',''));
					}
				});
			}
		});
		
		// WHILE TYPING BEGIN TO SHOW RESULTS
		// WRAP TEXT IN SEARCH WITH STYLING? TEXT [JPG] GETS ENCLOSED
		results.addEventListener('click', function(e){
			if(e.target.classList.contains('mFolder')){
				e.preventDefault();
				path = decodeURIComponent(e.target.dataset.path);
				// CLOSE SEARCH RESULTS
				body.classList.remove('searching');
				search.parentNode.classList.remove('open');
				search.value = '';
				// CLOSE ANY OPEN FOLDERS
				browser.querySelectorAll('.open').forEach(function (x, i){
					x.classList.remove('open');
				});
				browser.querySelector('*[href="'+path+'"]').classList.add('highlight');
				findBlock(path, true, false);
			}
		});
		document.querySelector('.browser').addEventListener('mousemove', function(e){
			// FROM SEARCH RESULT :: REMOVE HIGHLIGHT FX WHEN ELEMENT IS HOVERED ONCE
			try{
				browser.querySelector('.highlight:hover').classList.remove('highlight');
			} catch(e){}
		});
		// BODY CLICK
		document.addEventListener('click', function(e){
			x = e.target;
			dlSet = <?php if($native_dl){echo 'true';} else {echo 'false';} ?>;
			// IF CLICKED AND SEARCH RESULTS IS EMPTY, GO BACK TO BROWSER
			if(body.classList.contains('searching')){
				if(results.querySelectorAll('a').length < 1){
					body.classList.remove('searching');
					search.blur();
					search.value = '';
					search.parentNode.classList.remove('open');
				}
			}
			// ↳ BIND TO CLICKABLE FILES
			if(x.classList.contains('file')){
				if(x.download){
					if(!dlSet){ // ON PAGE DL
						e.preventDefault();
						download(x);
					}
				}
				else {
					if(!x.download){
						e.preventDefault();
						thisType 	= x.dataset.type.replace('.','');
						href 		= x.getAttribute('href');
						$rType		= '';
						if(imgTypes.includes(thisType)){ $rType = 'img'; }
						if(txtTypes.includes(thisType)){ $rType = 'txt'; }
						if(audTypes.includes(thisType)){ $rType = 'aud'; }
						if(vidTypes.includes(thisType)){ $rType = 'vid'; }
						if(webTypes.includes(thisType)){ $rType = 'web'; }
						// IF METADATA IS NEEDED, COPY LIST
						md = x.querySelector('.metadata');
						if(md){
							// SHOW META BUTTON
							preview.querySelector('#meta').style = 'display: block';
							// COPY METADATA ELEMENT
							preview.appendChild(md.cloneNode(true));
							// SET IMG SRCS FOR MAP
							preview.querySelectorAll('.preview .metadata img').forEach(function (x, i){
								x.src = x.dataset.src;
							});
						}
						else { preview.querySelector('#meta').style = 'display: none'; }
						fileHander(href, $rType);
						// UPDATE HISTORY STATE
						history.pushState(null, href.substr(0, href.lastIndexOf('.')), base + '?open=' + x.getAttribute('href').replace(base,''));
					}
				}
			}
			// IF CLICK ON SEARCH BUTTON
			if(e.target.classList.contains('search')){
				e.preventDefault();
				e.target.classList.add('open');
				search.focus();
			}
			// EXTRA DOWNLOAD BUTTON
			<?php if(!$native_dl){
				echo "if(e.target.classList.contains('down')){
					e.preventDefault();
					// SET PARENT <A> TO FORCE DOWNLOAD AND CLICK TO DL FILE
					_x = e.target.parentNode;
					_x.download = _x.dataset.name;
					_x.click();
					_x.removeAttribute('download');
				}";
			} ?>
		});
		// BACK TO TOP
		window.addEventListener('scroll', () => {
			if (window.scrollY > 0){ body.querySelector('.up').classList.add('show'); }
			else { body.querySelector('.up').classList.remove('show'); }
		});
		body.querySelector('.up').addEventListener('click', function(e){
			window.scroll({top: 0, behavior: 'smooth'});
		});
		// CAPTURE SEARCH SHORTCUT
		window.onkeydown = function(e){
			var ck = e.keyCode ? e.keyCode : e.which;
			if((e.ctrlKey && ck == 70) || (e.metaKey && ck == 70)){
				e.preventDefault();
				search.parentNode.click();
			}
		}
	</script>
	</div>
	<!-- PAGE GENERATED WITH PHPDEX [PROJECTS.OSKA.ME/WEB/PHPDEX/] V0.22.1 -->
</body>
</html>