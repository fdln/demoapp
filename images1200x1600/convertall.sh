#!/bin/bash
FILES="$@"
for i in *.jpg
do
echo "Processing image $i ..."
/usr/bin/convert -thumbnail x200 $i $i.thumb
done

