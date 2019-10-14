<?php function Categoria($contenido){
			//echo "$contenido";
					$Importante=['Suicidio','muerte','triste','abusaron','golpearon','enojado'];
				$Psicologia=['Alma','Espiritu','conducta','negativo','positivo','alegria','enojo'];	
				$Ciencia=['televisor','radio','celular','computadora','tablets','juegos'];
				$Biologia=['perro','gato','gallina','conejo','loro','pato','plantas','mundo','mar', 'agua'];
				$Arte=['dibujo','pintar','cantar','bailar'];
				$Sociales=['planeta','tierra','sol','luna','estrella'];
				$Deporte=['futbol','nadar', 'correr','caminata','basquet', 'manejar bici'];
				
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
				return "Importante";
			}
			elseif ($Psi>$Imp && $Psi>$Cie && $Psi>$Bio && $Psi>$Art && $Psi>$Soc && $Psi>$Dep) {
				return "Psicologia";
			}
			elseif ($Bio>$Imp && $Bio>$Cie && $Bio>$Psi && $Bio>$Art && $Bio>$Soc && $Bio>$Dep) {
				return "Biologia";
			}
			elseif ($Art>$Imp && $Art>$Cie && $Art>$Psi && $Art>$Bio && $Art>$Soc && $Art>$Dep) {
				return "Arte";
				
			}
			elseif ($Soc>$Imp && $Soc>$Cie && $Soc>$Psi && $Soc>$Bio && $Soc>$Art && $Soc>$Dep) {
				return "Sociales";
			}
			
			elseif ($Dep>$Imp && $Dep>$Cie && $Dep>$Psi && $Dep>$Bio && $Dep>$Art && $Dep>$Soc) {
				return "Deporte";
			}
			else{
				return "No se encontro coincidencias";
			}
			
			//return $Imp.$Psi.$Cie.$Bio.$Art.$Soc.$Dep;

			}
			?>