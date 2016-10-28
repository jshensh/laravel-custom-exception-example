#!/bin/bash
if [ $# -gt 0 ]
	then
	echo Removing .env.$1 And copy .env to .env.$1
	echo $1
	# read -n1 -p "Press Enter to continue..."
	rm -f .env.$1
	cp .env .env.$1
	git add .env.$1
	git commit
	exit 0
fi
echo Not Doing Anything...
git commit
