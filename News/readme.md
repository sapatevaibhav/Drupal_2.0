# Section 1
## Activity 1.1
### News website (Site building)

#### Task 1 : Content Architecture
1. Created new Drupal 10  project
2. Installed essential modules
    - drush
    - Admin Toolbar
    - Computed fields
    - workflows
    - Metatag
    - Content moderation
3. Created a taxonomy vocabulary for "Category".
    This contains all the categories for the articles to be published and by default it is hierarchical no need to do so explicitely just wile adding the terms set their parents properly.
4. Created Content types for "Articles" and "Authors" as below
    - **Article**: Title, Body, Featured Image, Gallery (unlimited images), Author (entity reference), Publication Date, Categories (hierarchical taxonomy), Tags, Related Articles (entity reference)
    - **Author**: Name, Bio, Photo, Social Links, Articles Count (computed field)
5. Created workflow with the help of "workflows" and "Content moderation" modules for articles so Articles now have 3 states
    1. Draft
    2. Review
    3. Published
6. Added metadata using metatag module
    headed to `/admin/config/search/metatag` path created new default tag for article and added default values for it and from page source confirmed that the metadata is working as expected for the Articles.

#### Task 2 : Views
1. Created a new view for homepage to display list of Articles teasers.
    set path as `/index` and from basic site settings changed the default front page to the same.
    For that view in advanced section enabled the **Use AJAX** Option.
- Time for the exposed filters.
    Added date and categories filters exposed them
    but for author I installed **verf**(Views Entity Reference Filter) contrib module to add exposed filter by author.
    And for displaying the date picker for the field Publication date added **Better exposed filters** module.
2. Creating author profile page.
    Used pathauto to create paths for authors.
    Created view to display the articles written by the author
    there used contextual filter which takes parameter from the url and displays the articles written by that author.
    created block for that view and placed it for the author content type in block layout.
3. Creating category landing page
    With the help of pathauto created the landing pages for each category
    Created a block to display the subcategories of the current parent category.
4. Creating a related articles section.
    Created new view which will display 2 articles which are from the same category and excludes the current article from displaying in that section.
5. Custom search view
    created new view with the help or search_api module and set its url to `/search` exposed the fulltext search filture and it searches for the text in both title and body of the articles.
    Installed `facets` module and created its filter for categories on search page.
