#!/bin/bash


host="hostName"

b=$(s=$(./speedtest-cli --simple |  sed  -e 's/: /\":\"/g' -e 's/$/\",\"/g') && echo $s | sed -e 's/^/{\"/g' -e 's/\",\" /\",\"/g' -e 's/\",\"$/\",\"host\":\"'"$host"'\"}/g')
echo " test: $b"
curl -X POST https://hermes.marshallasch.ca/networkLog.php -d "$b"