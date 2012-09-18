<?php

	$ventana_top = $array_paredes[$i]['ventana']['alto'] + $array_paredes[$i]['ventana']['posicion_y'];
	$ventana_down = $array_paredes[$i]['ventana']['posicion_y'];
	$ventana_izda = $array_paredes[$i]['ventana']['posicion_x'];
	$ventana_dcha = $array_paredes[$i]['ventana']['ancho'] + $array_paredes[$i]['ventana']['posicion_x'];

	/* accesorios pared */
	$desague = '';
	if(!empty($array_paredes[$i]['desague']))
	{
		include('desague.php');
		$desague = $cadena_desague;
	}
	$toma = '';
	if(!empty($array_paredes[$i]['toma']))
	{
		include('toma.php');
		$toma = $cadena_toma;
	}
	$enchufe = '';
	if(!empty($array_paredes[$i]['enchufe']))
	{
		include('enchufe.php');
		$enchufe = $cadena_enchufe;
	}
	foreach ($radiadores as $radiador) {
		if ($radiador['pared']==$i) {
			include('incs/radiador.php');
			$cadena_radiadores .= $cadena_radiador;
		}
	}
	if($caldera['pared']==$i)
	{
		include('incs/caldera.php');
		$cadena_calderas .= $cadena_caldera;
	}

	/* cadena de datos de la pared */
	$pared_ventana_cadena ='
		obj"#'.$id.'"
		{
			IDCatalogo"1"
			ud 1.00
			objeti"PA"
			wall notirasombras
			FactorOrig(1.000000)
			idEscena(2)
			idClaveUnica(76)
			use L  =950
			use H  =2100
			use P  =100
			local L=950
			local H=2100
			local P=100
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

			obj"interior"
			{
				ud 1.00
				objeti"PAI"
				wallint walluini wallend notirasombras
				FactorOrig(1.000000)
				'.$int_pos.'
				'.$int_ang.'
				idClaveUnica(77)

				eti"PAI" mat"" color(0.875,0.875,0.875) transp(1) 			faceset(0,0,0)('.$array_paredes[$i]["longitud"].','.$altura.',0)(0,0,0) bald(0,0,0)(500,500,0)(0,90,1)			CAD"1/1""441""<cad><PINTURA><RED>1</RED><GREEN>1</GREEN><BLUE>1</BLUE><ALPHA>1</ALPHA><SECCIO><ID>6</ID><INFOTEMPLATE>2</INFOTEMPLATE><NSUBSECCIONS>1</NSUBSECCIONS><FINESTRA><PORTA_FINESTRA><PORTA_FINESTRA_MATERIAL></PORTA_FINESTRA_MATERIAL><PORTA_FINESTRA_MARGE>50</PORTA_FINESTRA_MARGE><PORTA_FINESTRA_APERTURA>0</PORTA_FINESTRA_APERTURA><PORTA_FINESTRA_MA>0</PORTA_FINESTRA_MA><PORTA_FINESTRA_IDOBJ>142</PORTA_FINESTRA_IDOBJ><FORAT><SECCIO><ID>212</ID><INFOTEMPLATE>0</INFOTEMPLATE><NSUBSECCIONS>0</NSUBSECCIONS><REGIO_EX><NBLOBS>1</NBLOBS><REGIO><NVERTEXS>5</NVERTEXS><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_down.'</Y></POINT><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_top.'</Y></POINT><POINT><X>'.$ventana_izda.'</X><Y>'.$ventana_top.'</Y></POINT><POINT><X>'.$ventana_izda.'</X><Y>'.$ventana_down.'</Y></POINT><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_down.'</Y></POINT><NFORATS>0</NFORATS></REGIO></REGIO_EX></SECCIO></FORAT></PORTA_FINESTRA></FINESTRA><REGIO_EX><NBLOBS>1</NBLOBS><REGIO><NVERTEXS>5</NVERTEXS><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>0</Y></POINT><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>'.$altura.'</Y></POINT><POINT><X>0</X><Y>'.$altura.'</Y></POINT><POINT><X>0</X><Y>0</Y></POINT><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>0</Y></POINT><NFORATS>1</NFORATS><REGIO><NVERTEXS>5</NVERTEXS><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_top.'</Y></POINT><POINT><X>'.$ventana_izda.'</X><Y>'.$ventana_top.'</Y></POINT><POINT><X>'.$ventana_izda.'</X><Y>'.$ventana_down.'</Y></POINT><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_down.'</Y></POINT><POINT><X>'.$ventana_dcha.'</X><Y>'.$ventana_top.'</Y></POINT><NFORATS>0</NFORATS></REGIO></REGIO></REGIO_EX></SECCIO></PINTURA></cad>"

				obj"VENTANA"
				{
					IDCatalogo"1"
					familia"VENT"
					ud 1.00
					codcolor"VINOX"
					objeti"FT"
					nombreModulo"Ventana"
					simbol_plt"V2HA"
					nospace autopU notxr matHijosHeredan
					indice(1)
					indicemain(1)
					FactorOrig(1.000000)
					pos('.$ventana_izda.','.$ventana_down.',-'.$grosor.')
					idClaveUnica(72)
					local L='.$array_paredes[$i]['ventana']['ancho'].'
					local H='.$array_paredes[$i]['ventana']['alto'].'
					local P='.$grosor.'
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

					obj"PM1"
					{
						ud 1.00
						objeti"FT"
						notxr matHijosHeredan
						idClaveUnica(73)
						virtual(0,0,0)(L,H,P)

						obj"PUERTA"
						{
							familia"VENT"
							ud 1.00
							objeti"TA"
							noselv unlink novalorar notxr matHijosHeredan seabre UsaFormAbierto
							idClaveUnica(74)
							virtual(20,20,100)(L/2-20,H-40,20)
							AsiEsAbierto(40,_,120)(_,_,_)(_,-90,_)
							AsiEsCerrado(20,_,100)(_,_,_)(_,0,_)

							obj"tabstdv"
							{
								ud 1.00
								objeti"TA"
								unlink notxr
								idClaveUnica(75)
								virtual(100,100,0)(L-200,0,0)

								eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							tube(L,H,P)(0,0,10)(0,0,0)(380,0,0)(5)(5)matPropio

							}

							obj"tabstdv"
							{
								ud 1.00
								objeti"TA"
								unlink notxr matHijosHeredan
								idClaveUnica(77)
								virtual(100,100,10)(L-200,0,0)

							}

							obj"tabstdv"
							{
								ud 1.00
								objeti"TA"
								unlink notxr
								idClaveUnica(78)
								virtual(100,100,10)(0,H-200,0)

								eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							tube(L,H,P)(0,0,0)(0,0,0)(0,660,0)(5)(5)matPropio

							}

							obj"ta"
							{
								ud 1.00
								objeti"PN2"
								unlink notxr
								idClaveUnica(80)
								virtual(96,96,4)(L-192,H-192,10)

								eti"PN2" mat"" color(1,1,1) transp(0.59) milum(1.00,1.00,1.00,0.59,0.80,0.80,0.80,0.59,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,0,0)(0,668,0)(0,0,0)(388,0,0)(388,668,0)(0,668,0)(0,668,10)(0,0,10)(388,0,10)(388,668,10)(0,668,10) NumCapas(2)(1) planarMap
								matRender(0.0,0.0,0.0,0.05,1.0,0,0)("VIDRIO") matPropio

							}

							obj"md"
							{
								ud 1.00
								objeti"TA"
								unlink compl notxr matHijosHeredan
								idClaveUnica(84)
								orient 3
								virtual(0,0,0)(100,H,P)

								eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,0,0)(0,0,0)(0,0,0)(0,860,0)(0,860,0)(0,0,0)(0,0,0)(0,0,10)(0,860,10)(0,860,0)(0,0,0)(0.412,0.412,0)(0.412,0.412,12.099)(0.412,859.589,12.099)(0.412,859.589,0)(0.412,0.412,0)(1.646,1.646,0)(1.646,1.646,13.951)(1.646,858.354,13.951)(1.646,858.354,0)(1.646,1.646,0)(3.704,3.704,0)(3.704,3.704,15.556)(3.704,856.296,15.556)(3.704,856.296,0)(3.704,3.704,0)(6.584,6.584,0)(6.584,6.584,16.914)(6.584,853.416,16.914)(6.584,853.416,0)(6.584,6.584,0)(10.288,10.288,0)(10.288,10.288,18.025)(10.288,849.712,18.025)(10.288,849.712,0)(10.288,10.288,0)(14.815,14.815,0)(14.815,14.815,18.889)(14.815,845.185,18.889)(14.815,845.185,0)(14.815,14.815,0)(20.165,20.165,0)(20.165,20.165,19.506)(20.165,839.835,19.506)(20.165,839.835,0)(20.165,20.165,0)(26.337,26.337,0)(26.337,26.337,19.877)(26.337,833.663,19.877)(26.337,833.663,0)(26.337,26.337,0)(33.333,33.333,0)(33.333,33.333,20)(33.333,826.667,20)(33.333,826.667,0)(33.333,33.333,0)(66.667,66.667,0)(66.667,66.667,20)(66.667,793.333,20)(66.667,793.333,0)(66.667,66.667,0)(73.663,73.663,0)(73.663,73.663,19.877)(73.663,786.337,19.877)(73.663,786.337,0)(73.663,73.663,0)(79.835,79.835,0)(79.835,79.835,19.506)(79.835,780.165,19.506)(79.835,780.165,0)(79.835,79.835,0)(85.185,85.185,0)(85.185,85.185,18.889)(85.185,774.815,18.889)(85.185,774.815,0)(85.185,85.185,0)(89.712,89.712,0)(89.712,89.712,18.025)(89.712,770.288,18.025)(89.712,770.288,0)(89.712,89.712,0)(93.416,93.416,0)(93.416,93.416,16.914)(93.416,766.584,16.914)(93.416,766.584,0)(93.416,93.416,0)(96.296,96.296,0)(96.296,96.296,15.556)(96.296,763.704,15.556)(96.296,763.704,0)(96.296,96.296,0)(98.354,98.354,0)(98.354,98.354,13.951)(98.354,761.646,13.951)(98.354,761.646,0)(98.354,98.354,0)(99.588,99.588,0)(99.588,99.588,12.099)(99.588,760.411,12.099)(99.588,760.411,0)(99.588,99.588,0)(100,100,0)(100,100,10)(100,760,10)(100,760,0)(100,100,0)(100,100,0)(100,100,0)(100,760,0)(100,760,0)(100,100,0) NumCapas(22)(2) mantRelacion planarMap

							}

							obj"ms"
							{
								ud 1.00
								objeti"TA"
								unlink compl notxr matHijosHeredan
								idClaveUnica(88)
								orient 2
								virtual(0,H-100,0)(L,100,P)

								eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,0,0)(0,100,0)(0,100,0)(580,100,0)(580,100,0)(0,100,0)(100,0,0)(100,0,0)(480,0,0)(480,0,0)(100,0,0)(100,0,0)(100,0,10)(480,0,10)(480,0,0)(100,0,0)(99.588,0.412,0)(99.588,0.412,12.099)(480.411,0.412,12.099)(480.411,0.412,0)(99.588,0.412,0)(98.354,1.646,0)(98.354,1.646,13.951)(481.646,1.646,13.951)(481.646,1.646,0)(98.354,1.646,0)(96.296,3.704,0)(96.296,3.704,15.556)(483.704,3.704,15.556)(483.704,3.704,0)(96.296,3.704,0)(93.416,6.584,0)(93.416,6.584,16.914)(486.584,6.584,16.914)(486.584,6.584,0)(93.416,6.584,0)(89.712,10.288,0)(89.712,10.288,18.025)(490.288,10.288,18.025)(490.288,10.288,0)(89.712,10.288,0)(85.185,14.815,0)(85.185,14.815,18.889)(494.815,14.815,18.889)(494.815,14.815,0)(85.185,14.815,0)(79.835,20.165,0)(79.835,20.165,19.506)(500.165,20.165,19.506)(500.165,20.165,0)(79.835,20.165,0)(73.663,26.337,0)(73.663,26.337,19.877)(506.337,26.337,19.877)(506.337,26.337,0)(73.663,26.337,0)(66.667,33.333,0)(66.667,33.333,20)(513.333,33.333,20)(513.333,33.333,0)(66.667,33.333,0)(33.333,66.667,0)(33.333,66.667,20)(546.667,66.667,20)(546.667,66.667,0)(33.333,66.667,0)(26.337,73.663,0)(26.337,73.663,19.877)(553.663,73.663,19.877)(553.663,73.663,0)(26.337,73.663,0)(20.165,79.835,0)(20.165,79.835,19.506)(559.835,79.835,19.506)(559.835,79.835,0)(20.165,79.835,0)(14.815,85.185,0)(14.815,85.185,18.889)(565.185,85.185,18.889)(565.185,85.185,0)(14.815,85.185,0)(10.288,89.712,0)(10.288,89.712,18.025)(569.712,89.712,18.025)(569.712,89.712,0)(10.288,89.712,0)(6.584,93.416,0)(6.584,93.416,16.914)(573.416,93.416,16.914)(573.416,93.416,0)(6.584,93.416,0)(3.704,96.296,0)(3.704,96.296,15.556)(576.296,96.296,15.556)(576.296,96.296,0)(3.704,96.296,0)(1.646,98.354,0)(1.646,98.354,13.951)(578.354,98.354,13.951)(578.354,98.354,0)(1.646,98.354,0)(0.412,99.588,0)(0.412,99.588,12.099)(579.589,99.588,12.099)(579.589,99.588,0)(0.412,99.588,0)(0,100,0)(0,100,10)(580,100,10)(580,100,0)(0,100,0) NumCapas(22)(0) mantRelacion planarMap texV

							}

							obj"mi"
							{
								ud 1.00
								objeti"TA"
								unlink compl notxr matHijosHeredan
								idClaveUnica(92)
								orient 3
								virtual(L-100,0,0)(100,H,P)

								eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,0,0)(100,0,0)(100,0,0)(100,860,0)(100,860,0)(100,0,0)(0,100,0)(0,100,0)(0,760,0)(0,760,0)(0,100,0)(0,100,0)(0,100,10)(0,760,10)(0,760,0)(0,100,0)(0.412,99.588,0)(0.412,99.588,12.099)(0.412,760.412,12.099)(0.412,760.412,0)(0.412,99.588,0)(1.646,98.354,0)(1.646,98.354,13.951)(1.646,761.646,13.951)(1.646,761.646,0)(1.646,98.354,0)(3.704,96.296,0)(3.704,96.296,15.556)(3.704,763.704,15.556)(3.704,763.704,0)(3.704,96.296,0)(6.584,93.416,0)(6.584,93.416,16.914)(6.584,766.584,16.914)(6.584,766.584,0)(6.584,93.416,0)(10.288,89.712,0)(10.288,89.712,18.025)(10.288,770.288,18.025)(10.288,770.288,0)(10.288,89.712,0)(14.815,85.185,0)(14.815,85.185,18.889)(14.815,774.815,18.889)(14.815,774.815,0)(14.815,85.185,0)(20.165,79.835,0)(20.165,79.835,19.506)(20.165,780.165,19.506)(20.165,780.165,0)(20.165,79.835,0)(26.337,73.663,0)(26.337,73.663,19.877)(26.337,786.337,19.877)(26.337,786.337,0)(26.337,73.663,0)(33.333,66.667,0)(33.333,66.667,20)(33.333,793.333,20)(33.333,793.333,0)(33.333,66.667,0)(66.667,33.333,0)(66.667,33.333,20)(66.667,826.667,20)(66.667,826.667,0)(66.667,33.333,0)(73.663,26.337,0)(73.663,26.337,19.877)(73.663,833.663,19.877)(73.663,833.663,0)(73.663,26.337,0)(79.835,20.165,0)(79.835,20.165,19.506)(79.835,839.835,19.506)(79.835,839.835,0)(79.835,20.165,0)(85.185,14.815,0)(85.185,14.815,18.889)(85.185,845.185,18.889)(85.185,845.185,0)(85.185,14.815,0)(89.712,10.288,0)(89.712,10.288,18.025)(89.712,849.712,18.025)(89.712,849.712,0)(89.712,10.288,0)(93.416,6.584,0)(93.416,6.584,16.914)(93.416,853.416,16.914)(93.416,853.416,0)(93.416,6.584,0)(96.296,3.704,0)(96.296,3.704,15.556)(96.296,856.296,15.556)(96.296,856.296,0)(96.296,3.704,0)(98.354,1.646,0)(98.354,1.646,13.951)(98.354,858.354,13.951)(98.354,858.354,0)(98.354,1.646,0)(99.588,0.412,0)(99.588,0.412,12.099)(99.588,859.589,12.099)(99.588,859.589,0)(99.588,0.412,0)(100,0,0)(100,0,10)(100,860,10)(100,860,0)(100,0,0) NumCapas(22)(2) mantRelacion planarMap

							}

							obj"mb"
							{
								ud 1.00
								objeti"TA"
								unlink compl notxr matHijosHeredan
								idClaveUnica(96)
								orient 2
								virtual(0,0,0)(L,100,P)

								eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,0,0)(0,0,0)(0,0,0)(580,0,0)(580,0,0)(0,0,0)(0,0,0)(0,0,10)(580,0,10)(580,0,0)(0,0,0)(0.412,0.412,0)(0.412,0.412,12.099)(579.589,0.412,12.099)(579.589,0.412,0)(0.412,0.412,0)(1.646,1.646,0)(1.646,1.646,13.951)(578.354,1.646,13.951)(578.354,1.646,0)(1.646,1.646,0)(3.704,3.704,0)(3.704,3.704,15.556)(576.296,3.704,15.556)(576.296,3.704,0)(3.704,3.704,0)(6.584,6.584,0)(6.584,6.584,16.914)(573.416,6.584,16.914)(573.416,6.584,0)(6.584,6.584,0)(10.288,10.288,0)(10.288,10.288,18.025)(569.712,10.288,18.025)(569.712,10.288,0)(10.288,10.288,0)(14.815,14.815,0)(14.815,14.815,18.889)(565.185,14.815,18.889)(565.185,14.815,0)(14.815,14.815,0)(20.165,20.165,0)(20.165,20.165,19.506)(559.835,20.165,19.506)(559.835,20.165,0)(20.165,20.165,0)(26.337,26.337,0)(26.337,26.337,19.877)(553.663,26.337,19.877)(553.663,26.337,0)(26.337,26.337,0)(33.333,33.333,0)(33.333,33.333,20)(546.667,33.333,20)(546.667,33.333,0)(33.333,33.333,0)(66.667,66.667,0)(66.667,66.667,20)(513.333,66.667,20)(513.333,66.667,0)(66.667,66.667,0)(73.663,73.663,0)(73.663,73.663,19.877)(506.337,73.663,19.877)(506.337,73.663,0)(73.663,73.663,0)(79.835,79.835,0)(79.835,79.835,19.506)(500.165,79.835,19.506)(500.165,79.835,0)(79.835,79.835,0)(85.185,85.185,0)(85.185,85.185,18.889)(494.815,85.185,18.889)(494.815,85.185,0)(85.185,85.185,0)(89.712,89.712,0)(89.712,89.712,18.025)(490.288,89.712,18.025)(490.288,89.712,0)(89.712,89.712,0)(93.416,93.416,0)(93.416,93.416,16.914)(486.584,93.416,16.914)(486.584,93.416,0)(93.416,93.416,0)(96.296,96.296,0)(96.296,96.296,15.556)(483.704,96.296,15.556)(483.704,96.296,0)(96.296,96.296,0)(98.354,98.354,0)(98.354,98.354,13.951)(481.646,98.354,13.951)(481.646,98.354,0)(98.354,98.354,0)(99.588,99.588,0)(99.588,99.588,12.099)(480.411,99.588,12.099)(480.411,99.588,0)(99.588,99.588,0)(100,100,0)(100,100,10)(480,100,10)(480,100,0)(100,100,0)(100,100,0)(100,100,0)(480,100,0)(480,100,0)(100,100,0) NumCapas(22)(0) mantRelacion planarMap texV

							}

							obj"tabstdv"
							{
								ud 1.00
								objeti"TA"
								unlink notxr
								idClaveUnica(100)
								virtual(L-100,100,10)(0,H-200,0)

								eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							tube(L,H,P)(0,0,0)(0,0,0)(0,660,0)(5)(5)matPropio

							}

							obj"tabstdv"
							{
								ud 1.00
								objeti"TA"
								unlink notxr
								idClaveUnica(102)
								virtual(100,H-100,0)(L-200,0,0)

								eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							tube(L,H,P)(0,0,10)(0,0,0)(380,0,0)(5)(5)matPropio

							}

						}

						obj"PUERTA"
						{
							ud 1.00
							notxr matHijosHeredan seabre UsaFormAbierto
							idClaveUnica(104)
							virtual(L,20,100)(L,H-40,20)
							AsiEsAbierto(L-40,_,_)(_,_,_)(_,90,_)
							AsiEsCerrado(L,_,_)(_,_,_)(_,0,_)

							obj"MANETA"
							{
								familia"VENT"
								ud 1.00
								objeti"TA"
								notxr matHijosHeredan
								idClaveUnica(105)
								virtual(-L/2+25,[H-100]/2,20)(50,100,10)

								eti"" mat"VINOX" color(0.933,0.933,0.933) transp(1) milum(0.93,0.93,0.93,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 							extrude(L,H,P)(0,-40,0)(0,100,0)(0,0,0)(50,0,0)(50,100,0)(0,100,0)(0,100,5)(0,0,5)(50,0,5)(50,100,5)(0,100,5)(2.129,97.872,6.625)(2.128,2.128,6.625)(47.872,2.128,6.625)(47.872,97.872,6.625)(2.129,97.872,6.625)(4.505,95.495,8)(4.504,4.504,8)(45.496,4.504,8)(45.496,95.495,8)(4.505,95.495,8)(7.128,92.872,9.125)(7.128,7.128,9.125)(42.873,7.128,9.125)(42.873,92.872,9.125)(7.128,92.872,9.125)(9.999,90.001,10)(9.999,9.999,10)(40,9.999,10)(40,90.001,10)(9.999,90.001,10) NumCapas(6)(1) mantRelacion

								obj"MANETA VIRTUAL"
								{
									ud 1.00
									notxr matHijosHeredan seabre UsaFormAbierto
									idClaveUnica(109)
									virtual(25,0,20)(0,125,10)
									AsiEsAbierto(_,_,_)(_,_,_)(_,_,45)
									AsiEsCerrado(_,_,_)(_,_,_)(_,_,0)

									obj"MANETA"
									{
										familia"VENT"
										ud 1.00
										objeti"TA"
										notxr matHijosHeredan
										idClaveUnica(110)
										virtual(0,-H,-10)(L,H,P)

										eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 									tubeSp(0,125,5)(L,H,P)									ang(360,180,180)(0,125,1.125)(0,120,0)(0,41.667,0)(0,0,2.5)(0,0,5)tg(0,125,1.125)(0,125,0)(0,41.667,0)(0,12.5,0.875)(0,0,5)(15)(15)(15)(15)(15)suavizado sphereMap

									}

								}

							}

							obj"PUERTA"
							{
								familia"VENT"
								ud 1.00
								objeti"TA"
								noselv unlink novalorar notxr matHijosHeredan
								idClaveUnica(112)
								virtual(-L/2,0,0)(L/2-20,H,20)

								obj"tabstdv"
								{
									ud 1.00
									objeti"TA"
									unlink notxr
									idClaveUnica(113)
									virtual(100,100,0)(L-200,0,0)

									eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								tube(L,H,P)(0,0,10)(0,0,0)(380,0,0)(5)(5)matPropio

								}

								obj"tabstdv"
								{
									ud 1.00
									objeti"TA"
									unlink notxr matHijosHeredan
									idClaveUnica(115)
									virtual(100,100,10)(L-200,0,0)

								}

								obj"tabstdv"
								{
									ud 1.00
									objeti"TA"
									unlink notxr
									idClaveUnica(116)
									virtual(100,100,10)(0,H-200,0)

									eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								tube(L,H,P)(0,0,0)(0,0,0)(0,660,0)(5)(5)matPropio

								}

								obj"ta"
								{
									ud 1.00
									objeti"PN2"
									unlink notxr
									idClaveUnica(118)
									virtual(96,96,4)(L-192,H-192,10)

									eti"PN2" mat"" color(1,1,1) transp(0.59) milum(1.00,1.00,1.00,0.59,0.80,0.80,0.80,0.59,1.00,1.00,1.00,1.00)(17) 								extrude(L,H,P)(0,0,0)(0,668,0)(0,0,0)(388,0,0)(388,668,0)(0,668,0)(0,668,10)(0,0,10)(388,0,10)(388,668,10)(0,668,10) NumCapas(2)(1) planarMap
									matRender(0.0,0.0,0.0,0.05,1.0,0,0)("VIDRIO") matPropio

								}

								obj"md"
								{
									ud 1.00
									objeti"TA"
									unlink compl notxr matHijosHeredan
									idClaveUnica(122)
									orient 3
									virtual(0,0,0)(100,H,P)

									eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								extrude(L,H,P)(0,0,0)(0,0,0)(0,0,0)(0,860,0)(0,860,0)(0,0,0)(0,0,0)(0,0,10)(0,860,10)(0,860,0)(0,0,0)(0.412,0.412,0)(0.412,0.412,12.099)(0.412,859.589,12.099)(0.412,859.589,0)(0.412,0.412,0)(1.646,1.646,0)(1.646,1.646,13.951)(1.646,858.354,13.951)(1.646,858.354,0)(1.646,1.646,0)(3.704,3.704,0)(3.704,3.704,15.556)(3.704,856.296,15.556)(3.704,856.296,0)(3.704,3.704,0)(6.584,6.584,0)(6.584,6.584,16.914)(6.584,853.416,16.914)(6.584,853.416,0)(6.584,6.584,0)(10.288,10.288,0)(10.288,10.288,18.025)(10.288,849.712,18.025)(10.288,849.712,0)(10.288,10.288,0)(14.815,14.815,0)(14.815,14.815,18.889)(14.815,845.185,18.889)(14.815,845.185,0)(14.815,14.815,0)(20.165,20.165,0)(20.165,20.165,19.506)(20.165,839.835,19.506)(20.165,839.835,0)(20.165,20.165,0)(26.337,26.337,0)(26.337,26.337,19.877)(26.337,833.663,19.877)(26.337,833.663,0)(26.337,26.337,0)(33.333,33.333,0)(33.333,33.333,20)(33.333,826.667,20)(33.333,826.667,0)(33.333,33.333,0)(66.667,66.667,0)(66.667,66.667,20)(66.667,793.333,20)(66.667,793.333,0)(66.667,66.667,0)(73.663,73.663,0)(73.663,73.663,19.877)(73.663,786.337,19.877)(73.663,786.337,0)(73.663,73.663,0)(79.835,79.835,0)(79.835,79.835,19.506)(79.835,780.165,19.506)(79.835,780.165,0)(79.835,79.835,0)(85.185,85.185,0)(85.185,85.185,18.889)(85.185,774.815,18.889)(85.185,774.815,0)(85.185,85.185,0)(89.712,89.712,0)(89.712,89.712,18.025)(89.712,770.288,18.025)(89.712,770.288,0)(89.712,89.712,0)(93.416,93.416,0)(93.416,93.416,16.914)(93.416,766.584,16.914)(93.416,766.584,0)(93.416,93.416,0)(96.296,96.296,0)(96.296,96.296,15.556)(96.296,763.704,15.556)(96.296,763.704,0)(96.296,96.296,0)(98.354,98.354,0)(98.354,98.354,13.951)(98.354,761.646,13.951)(98.354,761.646,0)(98.354,98.354,0)(99.588,99.588,0)(99.588,99.588,12.099)(99.588,760.411,12.099)(99.588,760.411,0)(99.588,99.588,0)(100,100,0)(100,100,10)(100,760,10)(100,760,0)(100,100,0)(100,100,0)(100,100,0)(100,760,0)(100,760,0)(100,100,0) NumCapas(22)(2) mantRelacion planarMap

								}

								obj"ms"
								{
									ud 1.00
									objeti"TA"
									unlink compl notxr matHijosHeredan
									idClaveUnica(126)
									orient 2
									virtual(0,H-100,0)(L,100,P)

									eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								extrude(L,H,P)(0,0,0)(0,100,0)(0,100,0)(580,100,0)(580,100,0)(0,100,0)(100,0,0)(100,0,0)(480,0,0)(480,0,0)(100,0,0)(100,0,0)(100,0,10)(480,0,10)(480,0,0)(100,0,0)(99.588,0.412,0)(99.588,0.412,12.099)(480.411,0.412,12.099)(480.411,0.412,0)(99.588,0.412,0)(98.354,1.646,0)(98.354,1.646,13.951)(481.646,1.646,13.951)(481.646,1.646,0)(98.354,1.646,0)(96.296,3.704,0)(96.296,3.704,15.556)(483.704,3.704,15.556)(483.704,3.704,0)(96.296,3.704,0)(93.416,6.584,0)(93.416,6.584,16.914)(486.584,6.584,16.914)(486.584,6.584,0)(93.416,6.584,0)(89.712,10.288,0)(89.712,10.288,18.025)(490.288,10.288,18.025)(490.288,10.288,0)(89.712,10.288,0)(85.185,14.815,0)(85.185,14.815,18.889)(494.815,14.815,18.889)(494.815,14.815,0)(85.185,14.815,0)(79.835,20.165,0)(79.835,20.165,19.506)(500.165,20.165,19.506)(500.165,20.165,0)(79.835,20.165,0)(73.663,26.337,0)(73.663,26.337,19.877)(506.337,26.337,19.877)(506.337,26.337,0)(73.663,26.337,0)(66.667,33.333,0)(66.667,33.333,20)(513.333,33.333,20)(513.333,33.333,0)(66.667,33.333,0)(33.333,66.667,0)(33.333,66.667,20)(546.667,66.667,20)(546.667,66.667,0)(33.333,66.667,0)(26.337,73.663,0)(26.337,73.663,19.877)(553.663,73.663,19.877)(553.663,73.663,0)(26.337,73.663,0)(20.165,79.835,0)(20.165,79.835,19.506)(559.835,79.835,19.506)(559.835,79.835,0)(20.165,79.835,0)(14.815,85.185,0)(14.815,85.185,18.889)(565.185,85.185,18.889)(565.185,85.185,0)(14.815,85.185,0)(10.288,89.712,0)(10.288,89.712,18.025)(569.712,89.712,18.025)(569.712,89.712,0)(10.288,89.712,0)(6.584,93.416,0)(6.584,93.416,16.914)(573.416,93.416,16.914)(573.416,93.416,0)(6.584,93.416,0)(3.704,96.296,0)(3.704,96.296,15.556)(576.296,96.296,15.556)(576.296,96.296,0)(3.704,96.296,0)(1.646,98.354,0)(1.646,98.354,13.951)(578.354,98.354,13.951)(578.354,98.354,0)(1.646,98.354,0)(0.412,99.588,0)(0.412,99.588,12.099)(579.589,99.588,12.099)(579.589,99.588,0)(0.412,99.588,0)(0,100,0)(0,100,10)(580,100,10)(580,100,0)(0,100,0) NumCapas(22)(0) mantRelacion planarMap texV

								}

								obj"mi"
								{
									ud 1.00
									objeti"TA"
									unlink compl notxr matHijosHeredan
									idClaveUnica(130)
									orient 3
									virtual(L-100,0,0)(100,H,P)

									eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								extrude(L,H,P)(0,0,0)(100,0,0)(100,0,0)(100,860,0)(100,860,0)(100,0,0)(0,100,0)(0,100,0)(0,760,0)(0,760,0)(0,100,0)(0,100,0)(0,100,10)(0,760,10)(0,760,0)(0,100,0)(0.412,99.588,0)(0.412,99.588,12.099)(0.412,760.412,12.099)(0.412,760.412,0)(0.412,99.588,0)(1.646,98.354,0)(1.646,98.354,13.951)(1.646,761.646,13.951)(1.646,761.646,0)(1.646,98.354,0)(3.704,96.296,0)(3.704,96.296,15.556)(3.704,763.704,15.556)(3.704,763.704,0)(3.704,96.296,0)(6.584,93.416,0)(6.584,93.416,16.914)(6.584,766.584,16.914)(6.584,766.584,0)(6.584,93.416,0)(10.288,89.712,0)(10.288,89.712,18.025)(10.288,770.288,18.025)(10.288,770.288,0)(10.288,89.712,0)(14.815,85.185,0)(14.815,85.185,18.889)(14.815,774.815,18.889)(14.815,774.815,0)(14.815,85.185,0)(20.165,79.835,0)(20.165,79.835,19.506)(20.165,780.165,19.506)(20.165,780.165,0)(20.165,79.835,0)(26.337,73.663,0)(26.337,73.663,19.877)(26.337,786.337,19.877)(26.337,786.337,0)(26.337,73.663,0)(33.333,66.667,0)(33.333,66.667,20)(33.333,793.333,20)(33.333,793.333,0)(33.333,66.667,0)(66.667,33.333,0)(66.667,33.333,20)(66.667,826.667,20)(66.667,826.667,0)(66.667,33.333,0)(73.663,26.337,0)(73.663,26.337,19.877)(73.663,833.663,19.877)(73.663,833.663,0)(73.663,26.337,0)(79.835,20.165,0)(79.835,20.165,19.506)(79.835,839.835,19.506)(79.835,839.835,0)(79.835,20.165,0)(85.185,14.815,0)(85.185,14.815,18.889)(85.185,845.185,18.889)(85.185,845.185,0)(85.185,14.815,0)(89.712,10.288,0)(89.712,10.288,18.025)(89.712,849.712,18.025)(89.712,849.712,0)(89.712,10.288,0)(93.416,6.584,0)(93.416,6.584,16.914)(93.416,853.416,16.914)(93.416,853.416,0)(93.416,6.584,0)(96.296,3.704,0)(96.296,3.704,15.556)(96.296,856.296,15.556)(96.296,856.296,0)(96.296,3.704,0)(98.354,1.646,0)(98.354,1.646,13.951)(98.354,858.354,13.951)(98.354,858.354,0)(98.354,1.646,0)(99.588,0.412,0)(99.588,0.412,12.099)(99.588,859.589,12.099)(99.588,859.589,0)(99.588,0.412,0)(100,0,0)(100,0,10)(100,860,10)(100,860,0)(100,0,0) NumCapas(22)(2) mantRelacion planarMap

								}

								obj"mb"
								{
									ud 1.00
									objeti"TA"
									unlink compl notxr matHijosHeredan
									idClaveUnica(134)
									orient 2
									virtual(0,0,0)(L,100,P)

									eti"" mat"VINOX" color(1,1,1) transp(1) milum(1.00,1.00,1.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								extrude(L,H,P)(0,0,0)(0,0,0)(0,0,0)(580,0,0)(580,0,0)(0,0,0)(0,0,0)(0,0,10)(580,0,10)(580,0,0)(0,0,0)(0.412,0.412,0)(0.412,0.412,12.099)(579.589,0.412,12.099)(579.589,0.412,0)(0.412,0.412,0)(1.646,1.646,0)(1.646,1.646,13.951)(578.354,1.646,13.951)(578.354,1.646,0)(1.646,1.646,0)(3.704,3.704,0)(3.704,3.704,15.556)(576.296,3.704,15.556)(576.296,3.704,0)(3.704,3.704,0)(6.584,6.584,0)(6.584,6.584,16.914)(573.416,6.584,16.914)(573.416,6.584,0)(6.584,6.584,0)(10.288,10.288,0)(10.288,10.288,18.025)(569.712,10.288,18.025)(569.712,10.288,0)(10.288,10.288,0)(14.815,14.815,0)(14.815,14.815,18.889)(565.185,14.815,18.889)(565.185,14.815,0)(14.815,14.815,0)(20.165,20.165,0)(20.165,20.165,19.506)(559.835,20.165,19.506)(559.835,20.165,0)(20.165,20.165,0)(26.337,26.337,0)(26.337,26.337,19.877)(553.663,26.337,19.877)(553.663,26.337,0)(26.337,26.337,0)(33.333,33.333,0)(33.333,33.333,20)(546.667,33.333,20)(546.667,33.333,0)(33.333,33.333,0)(66.667,66.667,0)(66.667,66.667,20)(513.333,66.667,20)(513.333,66.667,0)(66.667,66.667,0)(73.663,73.663,0)(73.663,73.663,19.877)(506.337,73.663,19.877)(506.337,73.663,0)(73.663,73.663,0)(79.835,79.835,0)(79.835,79.835,19.506)(500.165,79.835,19.506)(500.165,79.835,0)(79.835,79.835,0)(85.185,85.185,0)(85.185,85.185,18.889)(494.815,85.185,18.889)(494.815,85.185,0)(85.185,85.185,0)(89.712,89.712,0)(89.712,89.712,18.025)(490.288,89.712,18.025)(490.288,89.712,0)(89.712,89.712,0)(93.416,93.416,0)(93.416,93.416,16.914)(486.584,93.416,16.914)(486.584,93.416,0)(93.416,93.416,0)(96.296,96.296,0)(96.296,96.296,15.556)(483.704,96.296,15.556)(483.704,96.296,0)(96.296,96.296,0)(98.354,98.354,0)(98.354,98.354,13.951)(481.646,98.354,13.951)(481.646,98.354,0)(98.354,98.354,0)(99.588,99.588,0)(99.588,99.588,12.099)(480.411,99.588,12.099)(480.411,99.588,0)(99.588,99.588,0)(100,100,0)(100,100,10)(480,100,10)(480,100,0)(100,100,0)(100,100,0)(100,100,0)(480,100,0)(480,100,0)(100,100,0) NumCapas(22)(0) mantRelacion planarMap texV

								}

								obj"tabstdv"
								{
									ud 1.00
									objeti"TA"
									unlink notxr
									idClaveUnica(138)
									virtual(L-100,100,10)(0,H-200,0)

									eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								tube(L,H,P)(0,0,0)(0,0,0)(0,660,0)(5)(5)matPropio

								}

								obj"tabstdv"
								{
									ud 1.00
									objeti"TA"
									unlink notxr
									idClaveUnica(140)
									virtual(100,H-100,0)(L-200,0,0)

									eti"TA" mat"enci" color(0,0,0) transp(1) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 								tube(L,H,P)(0,0,10)(0,0,0)(380,0,0)(5)(5)matPropio

								}

							}

						}

						obj"MARCO"
						{
							familia"VENT"
							ud 1.00
							objeti"TA"
							notxr matHijosHeredan
							idClaveUnica(142)
							virtual(0,0,0)(L,H,P)

							eti"" mat"VINOX" color(0.85,0.85,0.85) transp(1) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						extrude(20,H,P+40)(0,0,-20)(0,900,0)(0,0,0)(20,20,0)(20,880,0)(0,900,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						extrude(L,20,P+40)(0,0,-20)(20,20,0)(0,0,0)(1200,0,0)(1180,20,0)(20,20,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						extrude(L,20,P+40)(0,H-20,-20)(0,20,0)(20,0,0)(1180,0,0)(1200,20,0)(0,20,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						extrude(20,H,P+40)(L-20,0,-20)(0,880,0)(0,20,0)(20,0,0)(20,900,0)(0,880,0)

							mat"VINOX" color(0.85,0.85,0.85) transp(1) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(10,95,10)(20,100,130)	alfa(360)(0,0,0)(7.5,0,0)(10,5,0)(10,40,0)(7.5,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,55,0)(10,90,0)(7.5,95,0)(0,95,0)(0,0,0)tg(0,0,0)(7.5,0,0)(10,0,0)(10,40,0)(10,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,50,0)(10,90,0)(10,95,0)(0,95,0)(0,0,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(10,95,10)(20,H-195,130)	alfa(360)(0,0,0)(7.5,0,0)(10,5,0)(10,40,0)(7.5,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,55,0)(10,90,0)(7.5,95,0)(0,95,0)(0,0,0)tg(0,0,0)(7.5,0,0)(10,0,0)(10,40,0)(10,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,50,0)(10,90,0)(10,95,0)(0,95,0)(0,0,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(10,95,10)(L-20,H-195,130)	alfa(360)(0,0,0)(7.5,0,0)(10,5,0)(10,40,0)(7.5,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,55,0)(10,90,0)(7.5,95,0)(0,95,0)(0,0,0)tg(0,0,0)(7.5,0,0)(10,0,0)(10,40,0)(10,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,50,0)(10,90,0)(10,95,0)(0,95,0)(0,0,0)

							color(0.85,0.85,0.85) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(10,95,10)(L-20,100,130)	alfa(360)(0,0,0)(7.5,0,0)(10,5,0)(10,40,0)(7.5,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,55,0)(10,90,0)(7.5,95,0)(0,95,0)(0,0,0)tg(0,0,0)(7.5,0,0)(10,0,0)(10,40,0)(10,45,0)(6,45,0)(6,50,0)(7.5,50,0)(10,50,0)(10,90,0)(10,95,0)(0,95,0)(0,0,0)

							mat"" color(0,0,0) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(8,100,8)(20,97.5,130)	alfa(360)(0,0,0)(6,0,0)(8,5.263,0)(8,54,0)(8,94.737,0)(6,100,0)(0,100,0)(0,0,0)tg(0,0,0)(6,0,0)(8,0,0)(8,54,0)(8,94.737,0)(8,100,0)(0,100,0)(0,0,0)matPropio

							mat"" color(0,0,0) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(8,100,8)(20,H-197.5,130)	alfa(360)(0,0,0)(6,0,0)(8,5.263,0)(8,54,0)(8,94.737,0)(6,100,0)(0,100,0)(0,0,0)tg(0,0,0)(6,0,0)(8,0,0)(8,54,0)(8,94.737,0)(8,100,0)(0,100,0)(0,0,0)matPropio

							mat"" color(0,0,0) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(8,100,8)(L-20,97.5,130)	alfa(360)(0,0,0)(6,0,0)(8,5.263,0)(8,54,0)(8,94.737,0)(6,100,0)(0,100,0)(0,0,0)tg(0,0,0)(6,0,0)(8,0,0)(8,54,0)(8,94.737,0)(8,100,0)(0,100,0)(0,0,0)matPropio

							mat"" color(0,0,0) milum(0.00,0.00,0.00,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 						revolSp(8,100,8)(L-20,H-197.5,130)	alfa(360)(0,0,0)(6,0,0)(8,5.263,0)(8,54,0)(8,94.737,0)(6,100,0)(0,100,0)(0,0,0)tg(0,0,0)(6,0,0)(8,0,0)(8,54,0)(8,94.737,0)(8,100,0)(0,100,0)(0,0,0)matPropio

						}

					}

					obj""
					{
						ud 1.00
						objeti"FT"
						notxr
						idClaveUnica(159)
						virtual(0,0,0)(L,H,P)

						eti"" mat"EDIFICIOS3" color(1,1,1) transp(1) milum(0.50,0.50,0.50,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 					extrude(L,H,20)(0,0,-20)(0,900,0)(0,0,0)(1200,0,0)(1200,900,0)(0,900,0)
						matRender(2.0,0.0,0.0,0.00,0.0,1,0)("PAISAJE") nospace

					}

					obj"objpath"
					{
						ud 1.00
						invisib nospace recortaCamino notxr
						idClaveUnica(162)
						orient 4
						virtual(-10,0,0)(L+20,H+10,P)
						camino(R)(0,0)(30,0,0)					fcamino(30,0,0)(0)					acamino(90,0,0)
						camino(R)(0,0)(1190,0,0)					fcamino(L-30,0,0)(0)					acamino(90,0,0)
						camino(R)(0,0)(1190,880,0)					fcamino(L-30,H-30,0)(0)					acamino(90,0,0)
						camino(R)(0,0)(30,880,0)					fcamino(30,H-30,0)(0)					acamino(90,0,0)
						camino(F)(0,0)(30,0,0)					fcamino(30,0,0)(0)					acamino(90,0,0)

						eti"" mat"VINOX" color(0.85,0.85,0.85) transp(1) milum(0.85,0.85,0.85,1.00,0.80,0.80,0.80,1.00,1.00,1.00,1.00,1.00)(17) 					extrude(L,H,P)(0,0,0)(30,0,0)(1190,0,0)(1190,880,0)(30,880,0)(30,0,0)
						tipoCanto(0)(0)(0)(0)(0)matPadre

					}

				}

				'.$desague.'

				'.$toma.'

				'.$enchufe.'
			}

			obj"exterior"
			{
				ud 1.00
				objeti"PAE"
				wallext walluini wallend notirasombras
				FactorOrig(1.000000)
				'.$ext_pos.'
				'.$ext_ang.'
				idClaveUnica(80)

				eti"PAE" mat"ladrillo" color(1,1,1) transp(1) 			face(0,0,0)('.$longs_ext[$i].','.$altura.',0)

			}

			obj"superior"
			{
				ud 1.00
				objeti"PAS"
				notirasombras
				FactorOrig(1.000000)
				'.$int_pos.'
				'.$int_ang.'
				idClaveUnica(82)

				eti"PAS" mat"" color(0.88,0.88,0.88) transp(1) 	poly(0,'.$altura.',0)('.$array_paredes[$i]["longitud"].','.$altura.',0)('.$sup_x3.','.$altura.','.$sup_y3.')('.$sup_x4.','.$altura.','.$sup_y4.')

			}

		}';


?>