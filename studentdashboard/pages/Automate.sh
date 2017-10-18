#!/bin/bash

FILENAME="./unZiped/Server/Server.java"

#echo "$FILENAME"

while [ ! -f "$FILENAME" ] ;
do
    sleep 2
	echo "Sleeping"
done
javac $FILENAME

# First, compile the Java programs into Java classes
#javac ./Server/Server.java

# Now pass the arguments to the Java classes
#java ./Server/Server
#java Client ${host_name} ${port_number}