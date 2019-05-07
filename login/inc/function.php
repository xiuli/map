<?php
	header("Access-Control-Allow-Origin: *");
	function request($str){
		$newStr="";
		if(isset($_POST[$str])){
			$newStr=str_replace('\'',"",$_POST[$str]);
			$newStr=str_replace("select ","",$newStr);
			$newStr=str_replace("insert ","",$newStr);
			$newStr=str_replace("delete ","",$newStr);
			$newStr=str_replace("count(","",$newStr);
			$newStr=str_replace("drop table ","",$newStr);
			$newStr=str_replace("update ","",$newStr);
			$newStr=str_replace("truncate ","",$newStr);
			$newStr=str_replace("asc(","",$newStr);
			$newStr=str_replace("mid(","",$newStr);
			$newStr=str_replace("char(","",$newStr);
			$newStr=str_replace("xp_cmdshell","",$newStr);
			$newStr=str_replace("exec master","",$newStr);
			$newStr=str_replace("net localgroup administrators","",$newStr);
			$newStr=str_replace(" and ","",$newStr);
			$newStr=str_replace("net user","",$newStr);
			$newStr=str_replace(" or ","",$newStr);
			$newStr=str_replace("'","",$newStr);
			$newStr=str_replace('"',"",$newStr);

			if ($newStr==null){
				$newStr="";
			}
		}
		$newStr=strip_tags($newStr);
		return $newStr;
	}

	function safe_replace($string) {
	    $string = str_replace('%20','',$string);
	    $string = str_replace('%27','',$string);
	    $string = str_replace('%2527','',$string);
	    $string = str_replace('*','',$string);
	    $string = str_replace('"','&quot;',$string);
	    $string = str_replace("'",'',$string);
	    $string = str_replace('"','',$string);
	    $string = str_replace(';','',$string);
	    $string = str_replace('<','&lt;',$string);
	    $string = str_replace('>','&gt;',$string);
	    $string = str_replace("{",'',$string);
	    $string = str_replace('}','',$string);
	    $string = str_replace('\\','',$string);
	    return $string;
	}

	//过滤script
	function script_replace($str){
		$preg = "/<script[\s\S]*?<\/script>/i";
		$newstr = preg_replace($preg,"",$str); 
		return $newstr;
	}

	function getDay($strDatetime){ //将时间串2008-9-14 12:00:09变为2008-9-14
		if($strDatetime != ""){
			$dateArr = explode(" ",$strDatetime);
			if(sizeof($dateArr) >= 1){
				$strDatetime = $dateArr[0];
			}else{
				$strDatetime = '';
			}
		}
		return $strDatetime;
	}

	function requestGet($str){
	  $newStr="";
	  if(isset($_GET[$str])){
		  $newStr=$_GET[$str];
		  $newStr=str_replace("'","''",$newStr);
		  if ($newStr==null){
		    $newStr="";
		  }
		}
		$newStr=strip_tags($newStr);
		return $newStr;
	}
	function requestPost($str){
	  $newStr="";
		if(isset($_POST[$str])){
		  $newStr=$_POST[$str];
			$newStr=str_replace("'","''",$newStr);
			if ($newStr==null){
				$newStr="";
			}
		}
		$newStr=strip_tags($newStr);
		return $newStr;
	}

	function check_url($url){
		if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
			return false;
		}else{
			return true;
		}
	}

	function getIP(){
		static $realip;
		if (isset($_SERVER)){
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			} else {
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			} else if (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}
		return $realip;
	}
?>