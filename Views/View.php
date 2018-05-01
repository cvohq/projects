<?php
class View {

   public $template;

   public function __construct($template) {
       $this->template = $template;
   }

   public function render($data) {
       $nav = __DIR__ . '/..'  . $this->template[0];
       $content =  __DIR__ . '/..'  . $this->template[1];
       $footer =  __DIR__ . '/..'  . $this->template[2];
       if (isset($this->template[0]) && file_exists($nav) 
               && isset($this->template[1]) && file_exists($content)
               && isset($this->template[2]) && file_exists($footer)) {
           
           extract(['data'=>$data]);
           ob_start();
           include($nav);
           include($content);
           include($footer);
           return ob_get_clean();
       }
   }
   
}

?>