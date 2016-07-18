#!/usr/bin/env bash

rmdir book/content
git add -A && git commit -m 'remove content dir' && echo 'book/content/ removed!'
git submodule add git@github.com:gocodeup/Curriculum.git book/content

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm

nvm install 5.7

# Current version (2.1.1) has a bug when installing dependencies.
npm install -g gitbook-cli@2.0.1

gitbook install book
gitbook build book build
