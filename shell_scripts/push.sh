#!/bin/sh

# Because my Inspir Project lives in (and served from) the UW-Madison CSL, and I'm in Minneapolis this summer,
# every time I make changes I need to push my local copy to github, then ssh into the CSL, then pull those changes.
# Since the CSL does not allow ssh keys, this is my attempt at simplifying that process!

echo "Enter commit message (or empty string if you want to exit): "
read COMMIT_MESSAGE

if [ "$COMMIT_MESSAGE" != "" ]; then

	echo "[S T A R T : Commit]"
	#cd ..  # repo is located in parent directory
	#pwd
	git commit -am "$COMMIT_MESSAGE"
	echo "[E N D : Commit]"

	echo "[S T A R T : Push]"
	git push origin master
	echo "[E N D : Push]"

	echo "[S T A R T : ssh]"
	cd shell_scripts/
	./ssh.sh
	echo "[E N D : ssh]"

else
	echo "exiting."
fi
