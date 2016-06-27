#!/bin/bash

#create folder if they don't exists
if [ ! -d "frontend/web/assets" ]; then
	mkdir frontend/web/assets
fi

if [ ! -d "frontend/runtime" ]; then
	mkdir frontend/runtime
fi

#change rights for those both folders, server needs write acces to them!
chmod 777 frontend/web/assets
chmod 777 frontend/runtime

#migrate with database
./yii migrate
