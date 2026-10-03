#!/usr/bin/env bash
set -euo pipefail
ROOT="$(cd "$(dirname "$0")/../../.." && pwd)"
FOUND=0
while IFS= read -r -d '' f; do
  FOUND=$((FOUND+1))
  head -n 5 "$f" | grep -q '^---$' || { echo "Missing frontmatter: $f"; exit 1; }
  grep -q '^name:' "$f" || { echo "Missing name: $f"; exit 1; }
  grep -q '^description:' "$f" || { echo "Missing description: $f"; exit 1; }
done < <(find "$ROOT" -path '*/SKILL.md' -print0)
echo "Validated $FOUND SKILL.md files."
