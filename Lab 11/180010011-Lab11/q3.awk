BEGIN{
		pad[1] = "I"
		pad[2] = "II"
		pad[3] = "III"
		pad[4] = "IV"
		pad[5] = "V"
		pad[6] = "VI"
		pad[7] = "VII"
		pad[8] = "VIII"
		pad[9] = "IX"
		pad[10] = "X"
     }
        $1{
   			number = $1;
			if (number>0 && number<=10)    
			   {
			print(pad[number])
			pad[number]="Given Previously" 
			   }
			else if (number == "q"){exit1;}
			else {print("Given a valid input")}
		   }

