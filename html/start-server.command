#!/bin/bash
cd "$(dirname "$0")"
echo "Starting Zeneesha local server at http://localhost:8765"
python3 -m http.server 8765
