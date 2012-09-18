<?php

	$cadena_desague = '';
	foreach ($array_paredes[$i]['desague'] as $desague) {
		$pos_x = $desague['posicion_x']-50;
		$pos_y = $desague['posicion_y']-50;
		$pos_z = $desague['posicion_z'];

		$cadena_desague .= '
				obj"Desagüe"
				{
					ud 1.00
					objeti"IT3"
					nospace
					FactorOrig(1.000000)
					pos('.$pos_x.','.$pos_y.','.$pos_z.')
					idClaveUnica(72)
					local L=100
					local H=100
					local P=65
					local L2=0
					local P2=0
					local Ang=0
					local R=0
					local Ang2=0
					local H2=0
					local L3=0
					local H3=0
					local P3=0
					local R2=0
					local R3=0
					proc dbl = CtxObrir

					eti"IT3" mat"desague_agua" color(1,1,1) transp(1) 				taulerf(0,0,0)(L,H,P) 					simbol_alz"salidah2o"


				}

		';

	}


?>