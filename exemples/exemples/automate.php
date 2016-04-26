<?php

class automate{
      private $final;
      private $initial;
      private $transitions;
      private $size;

      protected function check_state($state){
        if(!isset($initial[$state])){
	   $size=$size+1;
	   $final[$state]=false;
	   $initial[$state]=false;
	}
      }

      public function __construct($size){
         $this->size=$size;
      	 for($i=0;$i<$size;$i++){
	   $this->initial[i]=false;
	   $this->final[i]=false;
	 }
      }

      public function setInitial($state){
         $this->initial[$state]=true;
      }

      public function isInitial($state){
	 return $this->initial[$state];
      }

      public function setFinal($state){
         $this->final[$state]=true;
      }

      public function isFinal($state){
	 return $this->final[$state];
      }

      public function numberOfTransition(){
      	 return count($transitions);
      }
      
      public function setTransition($start,$letter,$end){
      	 $code=$start.','.$letter.','.$end;
         $this->transitions[$code]=true;
      }


      public function afficher(){
         echo "I={ ";
         for($i=0;$i<$this->size;$i++){
	   if($this->initial[$i]===true)
            echo $i." ";
	 }
	 echo "}<br/> F={ ";
         for($i=0;$i<$this->size;$i++){
	   if($this->final[$i]===true)
            echo $i." ";
	 }
	 echo "}<br/>T={";
	 foreach($this->transitions as $trans=>$valeur){ 
	    echo '('.$trans.') ';
	 }
	 echo "}<br/>";
      }


}

?>