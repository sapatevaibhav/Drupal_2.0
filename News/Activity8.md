# Section 4 Module Development
## Activity 4.2
### Custom Block and Form

#### Custom Block

**File:** `src/Plugin/Block/InternBlock.php`
- Implements a custom block that displays the current user's name.
- Fetches and displays a configurable message.
- Implements cacheability with `contexts`, `tags`, and `max-age`.

#### Admin Configuration Form

**File:** `src/Form/InternConfigForm.php`
- Provides a text field for the admin to set a custom message.
- Saves the config to `intern_tools.settings`.

#### Routing

**File:** `block_forms.routing.yml`
- Adds an admin route at `/admin/config/block-forms/settings`.

#### Permissions

**File:** `block_forms.permissions.yml`
- Defines `Administer Intern Tools settings` permission for route access.
