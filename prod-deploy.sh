#!/bin/sh

HOST='ftp.agileavatars.com'
CREDENTIALS=`cat prod-ftp-credentials`
TARGETFOLDER='/www'
SOURCEFOLDER='./www'

lftp -f "
open $HOST
user $CREDENTIALS
lcd $SOURCEFOLDER
mirror --reverse --delete --verbose . $TARGETFOLDER
bye
"

echo "Don't worry if it fails with 'Unknown command ;' check the deployed website"