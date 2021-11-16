<?php 
namespace Pusaka\Library;

class FileSystem {

	public static function countAll($path, $count=0) {
		
		if(!is_dir($path)) {
			return -1;
		}

		$files = scandir($path);
        foreach ($files as $file) {
            if($file=='.'||$file=='..') {continue;}
            
            $next = str_replace('/', '\\', $path.'\\'.$file);
            
            if(is_dir($next)) {
            	$count += FileSystem::countAll($next, 0);
            	//echo $file;
            }
            $count++;
        	//echo $file."\r\n";
        }
        return $count;
	}

    public static function countFiles($path, $count=0) {

    	if(!is_dir($path)) {
    		return -1;
    	}

        $files = scandir($path);
        foreach ($files as $file) {
            if($file=='.'||$file=='..') {continue;}
            
            $next = str_replace('/', '\\', $path.'\\'.$file);
            
            if(is_dir($next)) {
            	$count += FileSystem::countFiles($next, 0);
            	//echo $file;
            }else {
            	$count++;
        	}
            //echo $file."\r\n";
        }
        return $count;
    }

	public static function countFolders($path, $count=0) {
        $files = scandir($path);
        foreach ($files as $file) {
            if($file=='.'||$file=='..') {continue;}
            
            $next = str_replace('/', '\\', $path.'\\'.$file);
            
            if(is_dir($next)) {
            	$count += FileSystem::countFolders($next, 0);
            	$count++;
            	//echo $file;
            }
            //echo $file."\r\n";
        }
        return $count;
    }    

    public static function size($dir) {
    	$bytes = 0;
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
		foreach ($iterator as $i) {
		  $bytes += $i->getSize();
		}
		return $bytes;
    }

    public static function remove($file) {
        $link = $file;
        if(!file_exists($link)) {
            return false;
        }else {
            unlink($link);
            return true;
        }
    }

}
?>