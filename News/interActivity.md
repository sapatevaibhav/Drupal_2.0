## ⚙️ **SECTION 4: Module Development**

### **Activity 4.1: Your First Custom Module (2-3 hours)**

**Learning Objectives:**
- Create basic module structure
- Understand Drupal module anatomy
- Implement simple functionality

**Tasks:**
1. **Create Module Structure:**
   ```
   modules/custom/intern_tools/
   ├── intern_tools.info.yml
   ├── intern_tools.module
   └── README.md
   ```

2. **Basic Module Info (.info.yml):**
   ```yaml
   name: 'Intern Tools'
   type: module
   description: 'Custom tools built by intern'
   core_version_requirement: ^9 || ^10
   dependencies:
     - drupal:node
   ```

3. **Implement Basic Hook:**
   ```php
   // In intern_tools.module
   function intern_tools_help($route_name, RouteMatchInterface $route_match) {
     switch ($route_name) {
       case 'help.page.intern_tools':
         return '<p>This module was created by an intern!</p>';
     }
   }
   ```

4. **Add Simple Functionality:**
   - Create a custom permission
   - Add a simple admin page
   - Implement hook_node_view() to add custom text

**Validation Checklist:**
- [ ] Module installs without errors
- [ ] Help text appears correctly
- [ ] Custom functionality works
- [ ] Code follows Drupal standards

---

### **Activity 4.2: Custom Block and Form (3-4 hours)**

**Learning Objectives:**
- Create custom block plugins
- Build simple forms
- Handle form submission

**Tasks:**
1. **Create Custom Block:**
   ```php
   // src/Plugin/Block/InternBlock.php
   // Create a block that displays current user info
   ```

2. **Build Admin Form:**
   ```php
   // Create a simple admin form to configure block
   // Add text field and submit handler
   ```

3. **Add Custom Route:**
   ```yaml
   # intern_tools.routing.yml
   # Create route for admin configuration
   ```

4. **Implement Form Handler:**
   - Save configuration to config entity
   - Add form validation
   - Display success messages

**Advanced Challenge:**
- Make the block cacheable with proper cache tags
- Add AJAX functionality to the form
- Create custom permissions for the admin page

**Validation Checklist:**
- [ ] Custom block appears in block layout
- [ ] Admin form saves configuration
- [ ] Form validation works
- [ ] Proper permissions implemented

---

### **Activity 4.3: API Integration Module (Advanced, 4-5 hours)**

**Learning Objectives:**
- Work with external APIs
- Implement services and dependency injection
- Handle errors and caching

**Tasks:**
1. **Create Weather Widget Module:**
   - Fetch weather data from free API
   - Create service for API calls
   - Implement proper error handling

2. **Add Configuration:**
   - Create admin form for API settings
   - Store API keys securely
   - Add location configuration

3. **Create Block Plugin:**
   - Display weather information
   - Implement proper caching
   - Handle API failures gracefully

4. **Add Styling:**
   - Create CSS for weather display
   - Add weather icons
   - Make responsive design

**Validation Checklist:**
- [ ] API integration works
- [ ] Proper error handling implemented
- [ ] Caching strategy in place
- [ ] Configuration form functional

---

## 📋 **Progress Tracking**

### **Week 1-2: Foundations**
- [ ] Complete Activities 1.1 and 1.2 (Site Building)
- [ ] Complete Activity 2.1 (Basic Drush)
- [ ] Complete Activity 3.1 (Module Research)

### **Week 3-4: Intermediate Skills**
- [ ] Complete Activity 2.2 (Advanced Drush)
- [ ] Complete Activity 3.2 (Complex Modules)
- [ ] Complete Activity 4.1 (First Custom Module)

### **Week 5-6: Advanced Development**
- [ ] Complete Activity 4.2 (Custom Block/Form)
- [ ] Complete Activity 4.3 (API Integration)
- [ ] Create portfolio showcasing all work

---

## 🎯 **Final Assessment Project**

**Build a Complete Mini-Site (1 week):**

Create a "Company Directory" website with:
- Custom content types for Employees and Departments
- Views for employee listings and department pages
- Contact forms for each department
- Custom module for employee search
- Admin tools for content management
- Full configuration management setup
- Documentation for deployment

**Deliverables:**
- Working Drupal site
- Exported configuration
- Custom module code
- Documentation
- Presentation of work

This final project integrates all learned skills and demonstrates readiness for real project work.
