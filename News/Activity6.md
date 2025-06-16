# Section 3 Contributed Modules
## Activity 3.2
### Complex module integration

#### Build a contact system with the help of webform and captcha

1. Install and enable webform and webform UI modules
2. go to `admin/structure/webform` and create new webform
3. Add essential fields like Name, Email, Message and enable validations like required, patterns, etc.
4. Go to the webform > config > handlers and customize the form submission.
5. Install and enable the CAPTCHA and reCAPTCHA modules.
6. Register on reCaptcha site and add Site and secret keys to our `admin/config/people/captcha/recaptcha`.
7. Currently drupal only supports V2 reCaptcha. GO to the form and add CAPTCHA field to the form.
8. We are set.


#### Build a paragraph with media library
1. Installed and enabled paragraph, media and media library modules.
2. Created new paragraph type which has below fields
    - Author
    - Image
    - Image label
    - Quote
    - Related Video
    - Text Content


### SEO
1. Set up alias paths with the help up pathauto
2. Set up XML sitemap generation
3. Set up google analytics
4. Set up metatags
