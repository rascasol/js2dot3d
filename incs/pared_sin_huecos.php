<?php

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
		if ($radiador['pared']==$i)
		{
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
	$pared_cadena ='
	obj"#'.$id.'"
	{
		IDCatalogo"1"
		ud 1.00
		objeti"PA"
		wall notirasombras
		FactorOrig(1.000000)
		idEscena(4)
		idClaveUnica(92)
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
			idClaveUnica(93)

			eti"PAI" mat"" color(0.875,0.875,0.875) transp(1) 			faceset(0,0,0)('.$array_paredes[$i]["longitud"].','.$altura.',0)(0,0,0) bald(0,0,0)(500,500,0)(0,90,1)			CAD"1/1""442""<cad><PINTURA><RED>1</RED><GREEN>1</GREEN><BLUE>1</BLUE><ALPHA>1</ALPHA><SECCIO><ID>12</ID><INFOTEMPLATE>2</INFOTEMPLATE><NSUBSECCIONS>0</NSUBSECCIONS><REGIO_EX><NBLOBS>1</NBLOBS><REGIO><NVERTEXS>5</NVERTEXS><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>0</Y></POINT><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>'.$altura.'</Y></POINT><POINT><X>0</X><Y>'.$altura.'</Y></POINT><POINT><X>0</X><Y>0</Y></POINT><POINT><X>'.$array_paredes[$i]["longitud"].'</X><Y>0</Y></POINT><NFORATS>0</NFORATS></REGIO></REGIO_EX></SECCIO></PINTURA></cad>"

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
			idClaveUnica(96)

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
			idClaveUnica(98)

			eti"PAS" mat"" color(0.88,0.88,0.88) transp(1) 	poly(0,'.$altura.',0)('.$array_paredes[$i]["longitud"].','.$altura.',0)('.$sup_x3.','.$altura.','.$sup_y3.')('.$sup_x4.','.$altura.','.$sup_y4.')

		}

	}

	';

?>