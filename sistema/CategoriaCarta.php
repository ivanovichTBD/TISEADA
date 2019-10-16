<?php function Categoria($cont){
			//echo "$contenido";
	$contenido=strtoupper($cont);
	//echo $contenido;
				$Importante=['SUICIDIO','MUERTE','TRISTE','ABUSARON','GOLPEARON','ENOJADO'];
				$Psicologia=['ALMA','ESPIRITU','CONDUCTA','NEGATIVO','POSITIVO','ALEGRIA','ENOJO'];	
				$Ciencia=['TELEVISOR','RADIO','CELULAR','COMPUTADORA','TABLETS','JUEGOS'];
				$Biologia=['PERRO','GATO','GALLINA','CONEJO','LORO','PATO','PLANTAS','MUNDO','MAR', 'AGUA'];
				$Arte=['DIBUJO','PINTAR','CANTAR','BAILAR'];
				$Sociales=['PLANETA','TIERRA','SOL','LUNA','ESTRELLA'];
				$Deporte=['FUTBOL','NADAR', 'CORRER','CAMINATA','BASQUET', 'MANEJAR BICI'];
				
				$palabras= str_word_count($contenido,1);
				$tam=count($palabras);
				//echo $palabras[count($palabras)-1];
				
			$Imp=0;
			$Psi=0;
            $Cie=0;
            $Bio=0;
            $Art=0;
            $Soc=0;
            $Dep=0;

			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Importante) ; $i++) { 
					if($pal===$Importante[$i]){
						$Imp=1+$Imp;			
					}
				}	
			}
			
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Psicologia) ; $i++) { 
					if($pal===$Psicologia[$i]){
						$Psi=1+$Psi;			
					}
				}	
			}
			
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Ciencia) ; $i++) { 
					if($pal===$Ciencia[$i]){
						$Cie=1+$Cie;			
					}
				}	
			}	
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Biologia) ; $i++) { 
					if($pal===$Biologia[$i]){
						$Bio=1+$Bio;			
					}
				}	
			}	
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Arte) ; $i++) { 
					if($pal===$Arte[$i]){
						$Art=1+$Art;			
					}
				}	
			}	
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Sociales) ; $i++) { 
					if($pal===$Sociales[$i]){
						$Soc=1+$Soc;			
					}
				}	
			}
			
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Sociales) ; $i++) { 
					if($pal===$Sociales[$i]){
						$Soc=1+$Soc;			
					}
				}	
			}
			
			for ($j=0; $j<count($palabras) ; $j++) { 
				$pal=$palabras[$j];
				for ($i=0; $i <count($Deporte) ; $i++) { 
					if($pal===$Deporte[$i]){
						$Dep=1+$Dep;			
					}
				}	
			}
			if ($Imp>$Psi && $Imp>$Cie && $Imp>$Bio && $Imp>$Art && $Imp>$Soc && $Imp>$Dep) {
				return 1;
			}
			elseif ($Cie>$Psi && $Cie>$Imp && $Cie>$Bio && $Cie>$Art && $Cie>$Soc && $Cie>$Dep) {
				return 2;
			}			
			elseif ($Psi>$Imp && $Psi>$Cie && $Psi>$Bio && $Psi>$Art && $Psi>$Soc && $Psi>$Dep) {
				return 3;
			}
			elseif ($Bio>$Imp && $Bio>$Cie && $Bio>$Psi && $Bio>$Art && $Bio>$Soc && $Bio>$Dep) {
				return 4;
			}
			elseif ($Art>$Imp && $Art>$Cie && $Art>$Psi && $Art>$Bio && $Art>$Soc && $Art>$Dep) {
				return 5;
				
			}
			elseif ($Soc>$Imp && $Soc>$Cie && $Soc>$Psi && $Soc>$Bio && $Soc>$Art && $Soc>$Dep) {
				return 6;
			}
			
			elseif ($Dep>$Imp && $Dep>$Cie && $Dep>$Psi && $Dep>$Bio && $Dep>$Art && $Dep>$Soc) {
				return 7;
			}
			else{
				return 0;
			}
			
			//return $Imp.$Psi.$Cie.$Bio.$Art.$Soc.$Dep;
			}


			?>