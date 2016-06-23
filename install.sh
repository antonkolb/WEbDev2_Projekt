#!/bin/bash

#change rights for those both folders, server needs write acces to them!
chmod 777 frontend/web/assets
chmod 777 frontend/runtime

#migrate with database
./yii migrate
