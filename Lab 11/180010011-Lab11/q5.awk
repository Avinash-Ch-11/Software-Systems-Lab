{printf $0;

  for (j=1; j<=NF;j++){
          gsub(/["*^(),\.!_?~;':]/,"")
           printf " " length($j)
        }
     printf "\n"
     }
