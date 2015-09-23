<?php 
    
        $password = "";
        $withnumber = FALSE;
        $withchar = FALSE;
        $wordnumber = $_GET['WordNumber'];
        $withnumber = $_GET['WithNumber'];
        $withchar = $_GET['WithChar'];

        if ($wordnumber == 0) {
            $wordnumber = 4;
        } 
            for ($i = 1; $i <= $wordnumber; $i++) {
                $page = get_page();
                $word = "";
                while ($word == "") {
                    $word = get_word($page);
                }
                if ($i == 1) {
                    $password = $word;
                } else {
                    $oldpassword = $password;
                    $password = $oldpassword . "-" . $word;
                }
            } 
            if ($withnumber == TRUE) {
                $number = rand(0, 9);
                $password = add_to_pw($number, $password);
            }
            if ($withchar == TRUE) {
                $char = get_char();
                $password = add_to_pw($char, $password);
                
            }


    function get_page() {
        $pagenum = rand(1, 15);
        if ($pagenum < 10) {
            $url =          "http://www.manythings.org/vocabulary/lists/l/words.php?f=noll0" . $pagenum;
        } else {
            $url =      "http://www.manythings.org/vocabulary/lists/l/words.php?f=noll" . $pagenum;
        }
        $page = "";
        $page = file_get_contents($url);
        return $page;
    }

    function get_word($page) {
        $out = "";
        $wordlist = "";
        preg_match_all("/\(([^)]+) Words\)/", $page, $out);
        preg_match_all("/<li>(\w)*<\/li>/", $page, $wordlist);   
        $string = $out[1];
        $wordcount = $string[0];
        $index = rand(1, $wordcount - 1);
        $subarray = $wordlist[0];    
        $str = $subarray[$index];
        $word = substr($str, 4, -5);
        
        return $word;
    }

    function get_char() {
        $charnum = rand(0, 21);
        if ($charnum == 0) { $char = '!'; }
        if ($charnum == 1) { $char = '\"'; }
        if ($charnum == 2) { $char = '#'; }
        if ($charnum == 3) { $char = '$'; }
        if ($charnum == 4) { $char = '%'; }
        if ($charnum == 5) { $char = '&'; }
        if ($charnum == 6) { $char = '\''; }
        if ($charnum == 7) { $char = '('; }
        if ($charnum == 8) { $char = ')'; }
        if ($charnum == 9) { $char = '*'; }
        if ($charnum == 10) { $char = '+'; }
        if ($charnum == 11) { $char = ','; }
        if ($charnum == 12) { $char = '_'; }
        if ($charnum == 13) { $char = '.'; }
        if ($charnum == 14) { $char = '/'; }
        if ($charnum == 15) { $char = ':'; }
        if ($charnum == 16) { $char = ';'; }
        if ($charnum == 17) { $char = '<'; }
        if ($charnum == 18) { $char = '='; }
        if ($charnum == 19) { $char = '>'; }
        if ($charnum == 20) { $char = '?'; }
        if ($charnum == 21) { $char = '@'; }
        return $char;
    }

    function add_to_pw($value, $password) {
        $strlength = strlen($password);
        $index = rand(0, $strlength-1);
        $backpassword = substr($password, $index);
        $frontpassword = substr($password, 0, $index);
        $password = $frontpassword . $value . $backpassword;
        return $password;
    }
                
        
?>