	ARGIND == 1 {
 	 	for(i=1; i<=NF; i++)
   		 m1[FNR][i] = $i
 		 m1_width  = NF
  		m1_height = FNR
				}

	ARGIND == 2 {
  		for(i=1; i<=NF; i++)
   		m2[FNR][i] = $i
  		m2_width  = NF
  		m2_height = FNR
				}

		END {
  				if(m1_width != m2_height) {
   				 printf "Matrices are incompatible, unable to multiply!" > "matrix3";
    			exit 1
  			}
  				for(i=1; i<=m1_height; i++) {
   					 for(j=1; j<=m2_width; j++) {
      						for(k=1; k<=m1_width; k++)
      						sum += m1[i][k] * m2[k][j]
      						printf sum OFS > "matrix3"; sum=0
   												}
    							printf ORS > "matrix3"
  											}
			}
