BEGIN {printf("File System|Available Storage|Used|Percentage\n");}
{usage = $5;gsub("%","",usage)}
int(usage)>30 {print $1"|"$2"|"$3"|"$5}
