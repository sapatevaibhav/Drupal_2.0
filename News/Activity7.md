# Section 4 Module Development
## Activity 4.1
### Your First Custom Module
#### Files
intern_tools.info.yml – Declares module info and dependencies.
intern_tools.module – Contains hooks like hook_help() and hook_node_view().
intern_tools.permissions.yml – Defines a custom permission.
intern_tools.routing.yml – Registers a custom admin route.
src/Controller/InternToolsController.php – Controller for the admin page.

#### Paths
Help Page:
Adds help text at /admin/help/intern_tools using hook_help().
Admin Page:
Available at /admin/config/intern-tools, renders basic content via a custom controller.

#### Functionality
Custom Permission:
Permission access intern tools admin page is defined and required to view the admin route.

Node View Alteration:
Appends a custom message to nodes when viewed in "full" view mode using hook_node_view().
