#!/bin/sh

if [ ! -f node_modules/.bin/next ]; then
    pnpm install || exit 1
fi

pnpm dev