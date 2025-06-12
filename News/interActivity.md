# Drupal Intern Training Activities

## Overview
These hands-on activities will strengthen intern skills in the 4 key Drupal areas. Each activity includes learning objectives, step-by-step tasks, and validation criteria.

---
## 🏗️ **SECTION 1: Advanced Site Building + Configuration Management**

### **Activity 1.1: Multi-Tenant News Platform (4-6 hours)**

**Learning Objectives:**
- Complex content architecture with relationships
- Advanced Views with exposed filters and contextual relationships
- Configuration splitting for different environments
- Performance optimization strategies

**Requirements:**
1. **Complex Content Architecture:**
   - **Article** content type: Title, Body, Featured Image, Gallery (unlimited images), Author (entity reference), Publication Date, Categories (hierarchical taxonomy), Tags, SEO fields, Related Articles (entity reference)
   - **Author** content type: Name, Bio, Photo, Social Links, Articles Count (computed field)
   - **Category** vocabulary: Hierarchical with custom fields (Description, Color, Icon)
   - **Publication Status** workflow with Draft → Review → Published states

2. **Advanced Views & Displays:**
   - **Homepage View:** Mixed content types with contextual filters, AJAX pagination, exposed filters by category/author/date
   - **Author Profile Page:** Show author info + their articles with custom teasers
   - **Category Landing Pages:** Dynamic pages for each category with subcategory navigation
   - **Related Articles Block:** Context-aware recommendations based on current article's categories/tags
   - **Search Results:** Custom search view with faceted filtering

3. **Performance Requirements:**
   - Implement proper caching strategies for all views
   - Lazy load images in galleries

4. **Configuration Management:**
   - Set up config_split for Dev/Staging/Prod environments
   - Different configurations: Dev has devel module, Prod has caching enabled
   - Export configurations with proper ignore patterns
   - Document deployment procedures

**Advanced Challenges:**
- Create custom computed fields using hooks
- Implement automatic URL aliases with complex patterns
- Add JSON:API endpoints for headless consumption
- Set up multilingual content (2+ languages)

**Validation Criteria:**
- [ ] All content relationships work correctly
- [ ] Views perform well with 1000+ nodes
- [ ] Configuration deploys cleanly across environments
- [ ] No PHP errors or warnings in logs
- [ ] Passes accessibility audit (WAVE tool)
- [ ] Mobile responsive with good UX

---

### **Activity 1.2: Configuration Management Practice (1-2 hours)**

**Learning Objectives:**
- Export and import configuration
- Understand configuration vs content
- Practice deployment workflow

**Tasks:**
1. **Initial Export:**
   - Export all configuration from Activity 1.1
   - Document what files were created
   - Understand config file naming

2. **Make Changes:**
   - Add a new field to Article content type
   - Create a new view
   - Modify an existing menu

3. **Export Changes:**
   - Export only the new configuration
   - Compare old vs new config files
   - Understand configuration dependencies

4. **Simulate Deployment:**
   - Create a fresh Drupal installation
   - Import the configuration
   - Test that everything works

**Validation Checklist:**
- [ ] Can export configuration successfully
- [ ] Can import configuration to fresh site
- [ ] Understands difference between full and partial exports
- [ ] Can identify configuration dependencies

---

## 🖥️ **SECTION 2: Drush Mastery**

### **Activity 2.1: Essential Drush Commands (1 hour)**

**Learning Objectives:**
- Master basic Drush commands
- Understand when to use each command
- Practice troubleshooting with Drush

**Tasks:**
1. **Site Information:**
   ```bash
   # Document what each command shows
   drush status
   drush core:requirements
   drush pm:list --type=module --status=enabled
   ```

2. **Cache Management:**
   ```bash
   # Practice cache operations
   drush cache:rebuild
   drush cache:get [cache-id]
   drush cache:set test_key "test value"
   drush cache:get test_key
   ```

3. **Database Operations:**
   ```bash
   # Practice database tasks
   drush sql:dump > backup.sql
   drush sql:query "SELECT COUNT(*) FROM node"
   drush sql:sanitize --sanitize-password=admin
   ```

4. **Module Management:**
   ```bash
   # Practice module operations
   drush pm:enable views_ui
   drush pm:disable views_ui
   drush pm:uninstall views_ui
   drush pm:enable views_ui
   ```

**Validation Checklist:**
- [ ] Can run all commands without errors
- [ ] Understands what each command does
- [ ] Can create and restore database backups
- [ ] Knows when to clear cache

---

### **Activity 2.2: Advanced Drush Tasks (1-2 hours)**

**Learning Objectives:**
- Use Drush for configuration management
- Practice user management
- Understand Drush scripts

**Tasks:**
1. **Configuration with Drush:**
   ```bash
   # Practice config operations
   drush config:export
   drush config:import
   drush config:get system.site
   drush config:set system.site name "My Drush Site"
   ```

2. **User Management:**
   ```bash
   # Practice user operations
   drush user:create intern --mail="intern@example.com"
   drush user:password intern "newpassword"
   drush user:login intern
   drush user:block intern
   drush user:unblock intern
   ```

3. **Content Operations:**
   ```bash
   # Practice content management
   drush generate:content 10
   drush entity:delete node --bundle=article
   ```

**Validation Checklist:**
- [ ] Can manage configuration via Drush
- [ ] Can manage users via Drush
- [ ] Can generate test content
- [ ] Understands Drush help system

---

## 🧩 **SECTION 3: Contributed Modules**

### **Activity 3.1: Essential Module Research (2 hours)**

**Learning Objectives:**
- Learn to evaluate contrib modules
- Understand module installation and configuration
- Practice common module workflows

**Tasks:**
1. **Research Phase:**
   - Research these modules: Admin Toolbar, Pathauto, Token, Webform, Metatag
   - For each module, document: Purpose, Dependencies, Security status, Community usage
   - Read documentation and reviews

2. **Installation Practice:**
   - Install modules using Composer (preferred) and Drush
   - Document different installation methods
   - Check module requirements and dependencies

3. **Configuration:**
   - Configure Pathauto for automatic URL generation
   - Set up Admin Toolbar for better UX
   - Configure basic Metatag settings

**Module Evaluation Template:**
```
Module Name: ___________
Purpose: _______________
Last Update: ___________
Security Coverage: _____
Dependencies: __________
Community Usage: _______
Documentation Quality: __
Would Recommend: Y/N ___
```

**Validation Checklist:**
- [ ] Can evaluate module quality and safety
- [ ] Can install modules multiple ways
- [ ] Can configure basic module settings
- [ ] Understands module dependencies

---

### **Activity 3.2: Complex Module Integration (2-3 hours)**

**Learning Objectives:**
- Integrate multiple modules together
- Solve real-world problems with contrib modules
- Handle module conflicts

**Tasks:**
1. **Build a Contact System:**
   - Install and configure Webform module
   - Create a contact form with validation
   - Set up email notifications
   - Add CAPTCHA protection

2. **Enhance Content Management:**
   - Install and configure Paragraphs module
   - Create flexible page layouts
   - Add Media module for better file management
   - Set up image optimization

3. **Improve SEO:**
   - Configure Pathauto patterns
   - Set up XML Sitemap generation
   - Configure Google Analytics
   - Set up meta tags for social sharing

**Validation Checklist:**
- [ ] Contact form works with notifications
- [ ] Flexible content layouts function
- [ ] SEO modules properly configured
- [ ] No module conflicts present

---

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
