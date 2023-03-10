#!/bin/bash

commit=true

KEYSARRAY=()
URLSARRAY=()
METHODSARRAY=()

urlsConfig=$FILENAME
echo "Reading $urlsConfig"
while read -r line
do
  echo "  $line"
  IFS=' ' read -ra TOKENS <<< "$line"
  KEYSARRAY+=(${TOKENS[0]})
  URLSARRAY+=(${TOKENS[1]})
  METHODSARRAY+=(${TOKENS[2]})
done < "$urlsConfig"

echo "***********************"
echo "Starting health checks with ${#KEYSARRAY[@]} configs:"

mkdir -p $LOG_DIRECTORY

for (( index=0; index < ${#KEYSARRAY[@]}; index++))
do
  key="${KEYSARRAY[index]}"
  url="${URLSARRAY[index]}"
  method="${METHODSARRAY[index]}"
  echo "  $key $url $method"

  for i in 1 2 3 4; 
  do
    response=$(curl -X $method --write-out '%{http_code}' --silent --output /dev/null $url)
    echo $response

    if [ "$response" -eq 200 ] || [ "$response" -eq 202 ] || [ "$response" -eq 301 ] || [ "$response" -eq 302 ] || [ "$response" -eq 307 ]; then
      result="success"
    else
      result="failed"
    fi
    if [ "$result" = "success" ]; then
      break
    fi
    sleep 5
  done
  dateTime=$(date +'%Y-%m-%d %H:%M')
  if [[ $commit == true ]]
  then
    echo $dateTime, $result, $response >> "$LOG_DIRECTORY/${key}_report.log"
    # By default we keep 2000 last log entries.  Feel free to modify this to meet your needs.
    echo "$(tail -2000 $LOG_DIRECTORY/${key}_report.log)" > "$LOG_DIRECTORY/${key}_report.log"
  else
    echo "    $dateTime, $result"
  fi
done
