BEGIN{FS=" ";n=0; print "Number of devices on full capacity"}
NR>1 && $5 == "100%" {n=n+1;print$1}
END{print "Total: " n" devices"}
