#!/bin/bash


host="hostName"
server="https://myserver.com/networkLog.php"

b=$(s=$(./speedtest-cli --simple |  sed  -e 's/: /\":\"/g' -e 's/$/\",\"/g') && echo $s | sed -e 's/^/{\"/g' -e 's/\",\" /\",\"/g' -e 's/\",\"$/\",\"host\":\"'"$host"'\"}/g')
echo " test: $b"
curl -X POST "$server" -d "$b"