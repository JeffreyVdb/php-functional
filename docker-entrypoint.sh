#!/bin/bash

set -e
set -o noclobber

SU_EXEC='su-exec'
if [[ -n "$USERNAME" ]]; then
    exec $SU_EXEC "$USERNAME" "$@"
fi

exec "$@"
