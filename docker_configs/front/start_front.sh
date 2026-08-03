#!/bin/sh

if [ ! -f node_modules/.bin/next ]; then
    # 2. Limpias la caché acumulada de pnpm dentro de la imagen
    pnpm store prune
    pnpm install || exit 1
fi

pnpm dev