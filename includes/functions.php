      <?php
        $errors = array();

    function real_escape($str){
   global $con;
  $escape = mysqli_real_escape_string($con,$str);
  return $escape;
    }

        function remove_junk($str){
      $str = nl2br($str);
          $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
         return $str;
    }

        function first_character($str){
       $val = str_replace('-'," ",$str);
  $val = ucfirst($val);
       return $val;
      }

      function validate_fields($var){
     global $errors;
      foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if(isset($val) && $val==''){
      $errors = $field ." can't be blank.";
      return $errors;
    }
   }
      }

        function display_msg($msg =''){
         $output = array();
           if(!empty($msg)) {
             foreach ($msg as $key => $value) {
            $output  = "<div class=\"alert alert-{$key}\">";
           $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
           $output .= remove_junk(first_character($value));
           $output .= "</div>";
      }
        return $output;
   } else {
     return "" ;
   }
}

      function redirect($url, $permanent = false)
    {
    if (headers_sent() === false)
    {
      header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

      function total_price($totals){
      $sum = 0;
    $sub = 0;
       foreach($totals as $total ){
     $sum += $total['total_saleing_price'];
     $sub += $total['total_buying_price'];
     $profit = $sum - $sub;
   }
   return array($sum,$profit);
      }

      function read_date($str){
        if($str)
      return date('F j, Y, g:i:s a', strtotime($str));
     else
      return null;
      }

    function make_date(){
  return strftime("%Y-%m-%d %H:%M:%S", time());
      }

      function count_id(){
       static $count = 1;
  return $count++;
        }

      function randString($length = 5)
            {
  $str='';
  $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

      for($x=0; $x<$length; $x++)
   $str .= $cha[mt_rand(0,strlen($cha))];
      return $str;
    }


?>
