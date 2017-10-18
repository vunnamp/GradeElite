#!/bin/bash
  
# First, compile the Java programs into Java classes
javac Server.java

# Now pass the arguments to the Java classes
java Server
#java Client ${host_name} ${port_number}