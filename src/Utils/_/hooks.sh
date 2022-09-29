#!/usr/bin/env sh
if [ -z "$hook_skip_init" ]; then
  debug () {
    if [ "$HOOK_DEBUG" = "1" ]; then
      echo "LaravelGitHooks (debug) - $1"
    fi
  }

  readonly hook_name="$(basename -- "$0")"
  debug "starting $hook_name..."

  if [ "$HOOK" = "0" ]; then
    debug "LaravelGitHooks env variable is set to 0, skipping hook"
    exit 0
  fi

  readonly hook_skip_init=1
  export hook_skip_init
  sh -e "$0" "$@"
  exitCode="$?"

  if [ $exitCode != 0 ]; then
    echo "LaravelGitHooks - $hook_name hook exited with code $exitCode (error)"
  fi

  if [ $exitCode = 127 ]; then
    echo "LaravelGitHooks - command not found in PATH=$PATH"
  fi

  exit $exitCode
fi
