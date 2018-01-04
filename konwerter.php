<?php

class Konwerter
 {



public $data = [ 

		0=>'', 1 =>'JEDEN' , 2=>'DWA' , 3 =>'TRZY' ,4=>'CZTERY' , 5 => 'PIĘŃĆ' , 6=> 'SZEŚĆ' , 7 => 'SIEDEM' , 8=>'OSIEM' , 9=>'DZIEWIEŃĆ',

		10=>'DZIESIĘŃĆ', 11=>'JEDYNAŚCIE' , 12=> 'DWANAŚCIE' , 13 =>'TRZYNAŚCIE' , 14 =>'CZTERNAŚCIE', 15=>'PIĘTNAŚCIE' ,
		16=>'SZESNAŚCIE', 17=>'SIEDEMNASCIE', 18=>'OSIEMNAŚCIE' , 19=>'DZIEWIĘTNAŚCIE' , 20=>'DWADZIEŚCIA' , 
		30=>'TRZYDZIEŚCI', 40=> 'CZTERDZIEŚCI' , 50=>'PIĘĆIESIĄT', 60=>'SZEŚĆDZIESIĄT',70=>'SIEDEMDZIESIĄT',80=>'OSIEMDZIESIĄT',
		90=>'DZIEWIĘĆDZIESIĄT', 100=>'STO' , 200=>'DWIEŚCIE', 300=>'TRZYSTA', 400=>'CZTERYSTA',500=>'PIĘĆSET',600=>'SZEŚĆSET',
		700=>'SIEDEMSET',800=>'OSIEMSET' , 900=>'DZIEWIĘĆSET' , 1000=>'TYSIĄC', 


		];

		 public function convert20($int){

			return $this->data[$int];
										}


		 public function convert99($int){

				$modulo=0;
                $decimal=0;
				$modulo= $int % 10 ;
				if ($int==0  || $int<21) return $this->data[$int]; else{
					$decimal = intval($int/10)*10 ;    $modulo = $int % 10;
					
					return $this->data[$decimal] . ' ' . $this->data[$modulo];
				} 
  		         }
  		         public function convert999($int){
  					
  					$decimal= $int%100;
  					
  					$hundredsof=intval($int/100) *100;
  					if($int==100) return $this->data[100]; else {
  						return $this->data[$hundredsof]. ' ' . $this->convert99($decimal);
  					}
  				}

  				public function convert_all($int){

  					switch ($int) {
  						case ($int <21):
  							 return $this->convert20($int);
  							break;
  						
  						case ($int<100):
  							return $this->convert99($int);
  							break;
  						case ($int<1000):
  						    return $this->convert999($int);
  						    break;
  					// debug	 default: return  "Error int";
  						  break;   	
  					}




  				}

  				public function m($int){

				
				$str='';
				switch ($int) {
					case '0':
						$str='';
						break;
					case '1':

						$str='MILION';
						break;
					
					case ($int >1 && $int <5):
							$str= 'MILIONY';
							break;	
					case ($int>4):
							$str = 'MILIONÓW';
						break;
				}

					return $str;

			}

			public function t($int){

				
				$str='';
				switch ($int) {
					case '0':
						$str='';
						break;
					case '1':

						$str='TYSIĄC';
						break;
					
					case ($int >1 && $int <5):
							$str= 'TYSIĄCE';
							break;	
					case ($int>4):

							
							$str = 'TYSIĘCY';
						break;
				}

                  return $str;

			}



			function change($int){


               $m =  intval($int / 1000000);
               $int = $int % 1000000;
               $t = intval($int / 1000);
               $int = $int % 1000;
               $s = intval($int / 100);
               $int = $int % 100;
               $dz = $int;
              // $j =  $int % 10;///



				return [$m,$t,$s,$dz];

			}


			function konwert($int){
                  
                  if (!is_int($int)) { return "Error int";} elseif ($int==0) {
                  	return "ZERO";
                  } else

				$liczby = $this->change($int);
				$str ='';
						
				$str = $this->convert_all($liczby[0]) . ' '. $this->m($liczby[0]) . ' ' . $this->convert_all($liczby[1]) . ' '. $this->t($liczby[1]) . ' ' . $this->data[$liczby[2]*100] . ' ' . $this->convert_all($liczby[3]);
				

				return trim($str);


			}
	



}

