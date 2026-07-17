#!/usr/bin/env python3
"""Deploy the approved Zeneesha build to an isolated /zeneesha-v4 mount."""

import os
import runpy

os.environ["ZENEESHA_MOUNT"] = "zeneesha-v4"
runpy.run_path(os.path.join(os.path.dirname(__file__), "deploy_v3.py"), run_name="__main__")
