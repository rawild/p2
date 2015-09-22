<?php 
    
        $password = "";
        $withnumber = FALSE;
        $withchar = FALSE;
        $wordnumber = $_GET['WordNumber'];
        $withnumber = $_GET['WithNumber'];
        $withchar = $_GET['WithChar'];

        if ($wordnumber == 0) {
            $wordnumber = 2;
        } 
            for ($i = 1; $i <= $wordnumber; $i++) {
                $pagenum = rand(1, 15);
                if ($pagenum < 10) {
                    $url =          "http://www.manythings.org/vocabulary/lists/l/words.php?f=noll0" . $pagenum;
                } else {
                    $url =      "http://www.manythings.org/vocabulary/lists/l/words.php?f=noll" . $pagenum;
                }
                $page = "";
                $out = "";
                $wordlist = "";
                $page = file_get_contents($url);
                preg_match_all("/\(([^)]+) Words\)/", $page, $out);
                preg_match_all("/<li>(\w)*<\/li>/", $page, $wordlist);   
                $string = $out[1];
                $wordcount = $string[0];
                $wordindex = rand(1, $wordcount - 1);
                $subarray = $wordlist[0];    
                $str = $subarray[$wordindex];
                $word = substr($str, 4, -5);
                if ($i == 1) {
                    $password = $word;
                } else {
                    $oldpassword = $password;
                    $password = $oldpassword . "-" . $word;
                }
            
            } 
?>