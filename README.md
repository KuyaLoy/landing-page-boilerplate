# 🚀 PHP Landing Page Boilerplate

A production-ready, high-performance PHP boilerplate for creating modern landing pages. This boilerplate includes a working contact form with reCAPTCHA v3, optimized asset loading, SCSS compilation, image WebP conversion, and a beautiful thank you popup system.

---

## ⚡ Quick Start (Plug & Play)

### Step 1: Run with Any PHP Server

Copy this folder **anywhere** - root domain OR subfolder. **It auto-detects!**

| Server      | Copy To                                   | Open URL                             |
| ----------- | ----------------------------------------- | ------------------------------------ |
| **Laragon** | `C:\laragon\www\your-project\`            | `http://your-project.test`           |
| **XAMPP**   | `C:\xampp\htdocs\your-project\`           | `http://localhost/your-project`      |
| **MAMP**    | `/Applications/MAMP/htdocs/your-project/` | `http://localhost:8888/your-project` |
| **WAMP**    | `C:\wamp64\www\your-project\`             | `http://localhost/your-project`      |

✅ **Done! Your site is running.**

---

### Step 2: SCSS Setup (Optional)

> **Don't want SCSS?** Skip this! Just write CSS directly in `assets/css/style.css`

**To use SCSS:**

1. Install VS Code/Cursor extension: **Live Sass Compiler** by Glenn Marks (`glenn2223.live-sass`)

2. Create `.vscode/settings.json` in project root:

```json
{
  "liveSassCompile.settings.formats": [
    {
      "format": "expanded",
      "extensionName": ".css",
      "savePath": "/assets/css"
    },
    {
      "format": "compressed",
      "extensionName": ".min.css",
      "savePath": "/assets/css/min"
    }
  ],
  "liveSassCompile.settings.generateMap": false
}
```

3. Click **"Watch Sass"** in bottom status bar

✅ **Done! SCSS auto-compiles when you save.**

---

### Step 3: Start Building

| What                      | Where                                                |
| ------------------------- | ---------------------------------------------------- |
| **Edit site config**      | `includes/config.php` ← site name, email, reCAPTCHA  |
| **Build your page**       | `src/main.php` ← your HTML content                   |
| **Add styles**            | `assets/scss/style.scss` (or `assets/css/style.css`) |
| **Add responsive styles** | `assets/scss/responsive.scss`                        |
| **Replace OG image**      | `ogimage.png` (1200x630px)                           |
| **Replace favicon**       | `assets/images/favicon.svg`                          |

✅ **Done! You're ready to code.**

---

### Quick Reference

**Add images:**

```php
<?php imgx('folder/image', 'Alt text'); ?>      // Auto WebP
<?php svgx('icons/icon', 'Alt'); ?>             // SVG as img
<?php svg_inline('icons/icon'); ?>              // Inline SVG
```

**Change accent color** (in `style.scss` or `style.css`):

```css
:root {
  --color-accent: #YOUR_COLOR;
}
```

**Form already works!** Customize:

- HTML fields → `src/main.php`
- PHP handler → `src/form.php`
- Email color → change `#CAB644` in `src/form.php`

**⚠️ Keep `thankyou.php`** - form redirects there after submission.

---

### 🎯 That's It! Start Coding!

For detailed explanations, scroll down to **📚 Detailed Documentation** ⬇️

---

---

# 📚 Detailed Documentation

Everything below provides in-depth explanations for each feature.

---

## 📋 Table of Contents

1. [Introduction](#-introduction)
2. [Features](#-features)
3. [Prerequisites](#-prerequisites)
4. [Installation](#-installation)
   - [Option A: Using Laragon (Recommended for Windows)](#option-a-using-laragon-recommended-for-windows)
   - [Option B: Using XAMPP](#option-b-using-xampp)
   - [Option C: Using MAMP (macOS)](#option-c-using-mamp-macos)
   - [Option D: Using PHP Built-in Server](#option-d-using-php-built-in-server)
   - [Option E: Using WAMP](#option-e-using-wamp)
5. [Project Structure](#-project-structure)
6. [Configuration](#-configuration)
   - [Site Configuration (config.php)](#site-configuration-configphp)
   - [Global Content (global-content.php)](#global-content-global-contentphp)
7. [Open Graph (OG) Image Setup](#-open-graph-og-image-setup)
8. [Contact Form Setup](#-contact-form-setup)
   - [Understanding form.php](#understanding-formphp)
   - [Customizing Form Fields](#customizing-form-fields)
   - [Email Template Customization](#email-template-customization)
   - [Form Validation](#form-validation)
9. [Thank You Page (MANDATORY)](#-thank-you-page-mandatory)
   - [Why thankyou.php is Required](#why-thankyouphp-is-required)
   - [Customizing the Thank You Popup](#customizing-the-thank-you-popup)
10. [SCSS Setup & Compilation](#-scss-setup--compilation)
    - [Installing Live Sass Compiler](#installing-live-sass-compiler)
    - [VS Code / Cursor Settings](#vs-code--cursor-settings)
    - [SCSS File Structure](#scss-file-structure)
    - [Adding Your Styles](#adding-your-styles)
    - [CSS Variables for Colors](#css-variables-for-colors)
11. [CSS Organization](#-css-organization)
    - [Critical CSS](#critical-css)
    - [Non-Critical CSS](#non-critical-css)
    - [Responsive Design](#responsive-design)
12. [Image Helper Functions](#-image-helper-functions)
    - [imgx() Function](#imgx-function)
    - [svgx() Function](#svgx-function)
    - [svg_inline() Function](#svg_inline-function)
13. [reCAPTCHA v3 Setup](#-recaptcha-v3-setup)
14. [JavaScript & Vendor Libraries](#-javascript--vendor-libraries)
    - [AOS (Animate On Scroll)](#aos-animate-on-scroll)
    - [Swiper.js](#swiperjs)
15. [Cache Busting](#-cache-busting)
16. [Favicon Setup](#-favicon-setup)
17. [Customization Checklist](#-customization-checklist)
18. [Best Practices](#-best-practices)
19. [Troubleshooting](#-troubleshooting)
20. [File Permissions](#-file-permissions)
21. [Security Considerations](#-security-considerations)
22. [Deployment](#-deployment)
23. [License](#-license)

---

## 🎯 Introduction

This boilerplate is designed to help you quickly create professional, high-performance landing pages. It comes pre-configured with:

- Optimized asset loading (critical CSS inlined, non-critical loaded asynchronously)
- Working contact form with honeypot spam protection and reCAPTCHA v3
- Automatic WebP image conversion
- SCSS compilation setup
- AOS (Animate On Scroll) animations
- Swiper.js for carousels/sliders
- Responsive design foundation
- SEO-friendly meta tags and Open Graph support

---

## ✨ Features

| Feature            | Description                                             |
| ------------------ | ------------------------------------------------------- |
| 📁 Subfolder Ready | **Auto-detects** root domain or subfolder - just works! |
| 🎨 SCSS Support    | Pre-configured SCSS with Live Sass Compiler             |
| 📧 Working Form    | PHP mail() with reCAPTCHA v3 protection                 |
| 🖼️ WebP Conversion | Automatic image optimization                            |
| ⚡ Performance     | Critical CSS inlined, lazy loading                      |
| 📱 Responsive      | Mobile-first breakpoints ready                          |
| 🎭 Animations      | AOS library included                                    |
| 🎠 Sliders         | Swiper.js included                                      |
| 🔒 Security        | Honeypot, CAPTCHA, input sanitization                   |
| 🌐 SEO Ready       | Open Graph, Twitter Cards, meta tags                    |

---

## 📦 Prerequisites

Before you begin, ensure you have the following installed:

### Required:

- **PHP 7.4 or higher** (PHP 8.x recommended)
- **A local web server** (Laragon, XAMPP, MAMP, WAMP, or PHP built-in server)
- **A text editor or IDE** (VS Code or Cursor recommended)

### Optional but Recommended:

- **VS Code or Cursor** with Live Sass Compiler extension
- **Git** for version control
- **cURL extension** enabled in PHP (required for reCAPTCHA)
- **GD Library** enabled in PHP (required for WebP conversion)

### Checking PHP Extensions

To check if required extensions are enabled, create a file called `phpinfo.php`:

```php
<?php phpinfo(); ?>
```

Look for:

- **cURL** - Should show "enabled"
- **GD** - Should show "enabled" with WebP support

---

## 📥 Installation

### Option A: Using Laragon (Recommended for Windows)

Laragon is the easiest option for Windows users with automatic virtual hosts.

#### Step 1: Download and Install Laragon

1. Go to [https://laragon.org/download/](https://laragon.org/download/)
2. Download **Laragon Full** (includes Apache, MySQL, PHP, etc.)
3. Install to the default location (e.g., `C:\laragon`)

#### Step 2: Clone or Copy the Boilerplate

1. Navigate to Laragon's web root:
   ```
   C:\laragon\www\
   ```
2. Create a new folder for your project:
   ```
   C:\laragon\www\your-project-name\
   ```
3. Copy all boilerplate files into this folder

#### Step 3: Start Laragon

1. Open Laragon
2. Click **"Start All"**
3. Right-click Laragon tray icon → **"Quick app"** → **"Auto virtual host"** (should be checked)

#### Step 4: Access Your Site

- **With Pretty URL**: `http://your-project-name.test`
- **Without Pretty URL**: `http://localhost/your-project-name`

> **Note**: If using `.test` domain, Laragon handles virtual hosts automatically. You may need to restart Laragon for new projects.

---

### Option B: Using XAMPP

XAMPP is a popular cross-platform solution.

#### Step 1: Download and Install XAMPP

1. Go to [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Download XAMPP for your operating system
3. Install to default location:
   - Windows: `C:\xampp`
   - macOS: `/Applications/XAMPP`
   - Linux: `/opt/lampp`

#### Step 2: Clone or Copy the Boilerplate

1. Navigate to XAMPP's web root:
   - Windows: `C:\xampp\htdocs\`
   - macOS: `/Applications/XAMPP/htdocs/`
   - Linux: `/opt/lampp/htdocs/`
2. Create a new folder:
   ```
   htdocs/your-project-name/
   ```
3. Copy all boilerplate files into this folder

#### Step 3: Start XAMPP

1. Open XAMPP Control Panel
2. Start **Apache** (click "Start" button)
3. Optionally start **MySQL** if you need database functionality

#### Step 4: Access Your Site

- Open browser: `http://localhost/your-project-name`

---

### Option C: Using MAMP (macOS)

MAMP is popular among macOS users.

#### Step 1: Download and Install MAMP

1. Go to [https://www.mamp.info/](https://www.mamp.info/)
2. Download MAMP (free version works fine)
3. Install to `/Applications/MAMP`

#### Step 2: Clone or Copy the Boilerplate

1. Default MAMP web root: `/Applications/MAMP/htdocs/`
2. Create a new folder:
   ```
   /Applications/MAMP/htdocs/your-project-name/
   ```
3. Copy all boilerplate files into this folder

#### Step 3: Start MAMP

1. Open MAMP application
2. Click **"Start Servers"**
3. Wait for Apache light to turn green

#### Step 4: Access Your Site

- Default port: `http://localhost:8888/your-project-name`
- Or configure port 80 in MAMP preferences: `http://localhost/your-project-name`

---

### Option D: Using PHP Built-in Server

For quick testing without installing a full web server.

#### Step 1: Navigate to Project Directory

```bash
cd /path/to/your-project-name
```

#### Step 2: Start PHP Server

```bash
php -S localhost:8000
```

#### Step 3: Access Your Site

- Open browser: `http://localhost:8000`

> **Warning**: The PHP built-in server is for development only. Do NOT use in production.

> **Note**: Some features like WebP conversion may not work correctly with the built-in server depending on your PHP configuration.

---

### Option E: Using WAMP

WAMP is another Windows-specific solution.

#### Step 1: Download and Install WAMP

1. Go to [https://www.wampserver.com/](https://www.wampserver.com/)
2. Download WampServer (64-bit or 32-bit based on your system)
3. Install to default location: `C:\wamp64\` or `C:\wamp\`

#### Step 2: Clone or Copy the Boilerplate

1. Navigate to WAMP's web root:
   ```
   C:\wamp64\www\
   ```
2. Create a new folder:
   ```
   C:\wamp64\www\your-project-name\
   ```
3. Copy all boilerplate files into this folder

#### Step 3: Start WAMP

1. Open WampServer
2. Wait for the tray icon to turn **green** (all services running)
3. If icon is orange or red, click on it and troubleshoot

#### Step 4: Access Your Site

- Open browser: `http://localhost/your-project-name`

---

## 📁 Subfolder Support (Auto-Detection)

This boilerplate **automatically detects** whether it's installed at:

- Root domain: `example.com/`
- Subfolder: `example.com/landingpage/`
- Deep subfolder: `example.com/clients/project1/`

**No configuration needed!** All paths (images, CSS, JS, fonts, forms) work automatically.

### How It Works

The `includes/config.php` auto-detects the installation path:

```php
// Auto-detect subfolder path
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$basePath  = ($scriptDir === '/' || $scriptDir === '\\') ? '/' : rtrim($scriptDir, '/\\') . '/';

// Base URL includes the subfolder automatically
$site_url = $protocol . '://' . $host . $basePath;
// Example: https://example.com/landingpage/
```

The `src/header.php` includes a `<base>` tag that makes all relative paths work:

```html
<base href="<?= $baseUrl ?>" />
```

### What This Fixes

| Location                    | Example | Works At Root | Works In Subfolder |
| --------------------------- | ------- | ------------- | ------------------ |
| `site.com/`                 | ✓       | ✓             |
| `site.com/landing/`         |         | ✓             | ✓                  |
| `site.com/clients/project/` |         | ✓             | ✓                  |

**All these work automatically:**

- ✅ CSS files
- ✅ JavaScript files
- ✅ Images (`imgx()`, `svgx()`)
- ✅ Fonts
- ✅ Form submissions
- ✅ Thank you page redirect
- ✅ OG images
- ✅ Favicon

---

## 📁 Project Structure

```
your-project-name/
│
├── assets/
│   ├── css/
│   │   ├── critical.css          # Critical above-the-fold styles
│   │   ├── style.css             # Main compiled styles
│   │   ├── responsive.css        # Responsive breakpoints
│   │   ├── reset.css             # CSS reset/normalize
│   │   ├── fonts.css             # Font definitions
│   │   ├── edit.css              # Additional styles for quick edits
│   │   ├── min/                  # Minified CSS files
│   │   │   ├── critical.min.css
│   │   │   ├── style.min.css
│   │   │   ├── responsive.min.css
│   │   │   ├── reset.min.css
│   │   │   └── fonts.min.css
│   │   └── vendor/               # Third-party CSS
│   │       ├── aos.css           # Animate On Scroll
│   │       └── swiper-bundle.min.css
│   │
│   ├── scss/
│   │   ├── style.scss            # Main SCSS file
│   │   ├── critical.scss         # Critical CSS source
│   │   ├── responsive.scss       # Responsive styles source
│   │   ├── reset.scss            # CSS reset source
│   │   ├── fonts.scss            # Font definitions source
│   │   ├── edit.scss             # Quick edit styles source
│   │   └── readme.md             # SCSS-specific documentation
│   │
│   ├── js/
│   │   ├── script.js             # Main JavaScript file
│   │   ├── edit.js               # Additional JS for quick edits
│   │   └── vendor/               # Third-party JavaScript
│   │       ├── aos.js
│   │       └── swiper-bundle.min.js
│   │
│   ├── images/
│   │   └── aiims.svg             # Sample image
│   │
│   ├── fonts/                    # Custom font files
│   │
│   └── videos/                   # Video assets
│
├── data/
│   └── global-content.php        # Global content data
│
├── includes/
│   ├── config.php                # Site configuration ⚠️ EDIT THIS FIRST
│   └── functions.php             # PHP helper functions (imgx, svgx, etc.)
│
├── src/
│   ├── header.php                # HTML head and opening body tag
│   ├── main.php                  # Main page content
│   ├── footer.php                # Footer and scripts
│   └── form.php                  # Form handler ⚠️ CUSTOMIZE THIS
│
├── index.php                     # Main entry point
├── thankyou.php                  # Thank you page ⚠️ REQUIRED
├── ogimage.png                   # Open Graph image ⚠️ REPLACE THIS
└── README.md                     # This file
```

---

## ⚙️ Configuration

### Site Configuration (config.php)

**Location:** `includes/config.php`

This is the **most important file** to edit when starting a new project. Open it and configure the following:

```php
<?php
// ============================================
// SITE-WIDE CONFIGURATION
// ============================================

// Site name - appears in emails, titles, etc.
$site = "Your Site Name";

// Site description - used in meta tags
$description = "Your site description for SEO";

// Phone number
$phone_number = "+1 (555) 123-4567";
$href_phone_number = "tel:+15551234567";  // tel: link format

// Contact email (displayed on site)
$emailcont = "contact@yoursite.com";
$href_emailcont = "mailto:{$emailcont}";

// Admin email (receives form submissions)
$admin_email = 'admin@yoursite.com';

// Optional CC and BCC for form submissions
$cc_email  = "";                           // Copy recipient
$bcc_email = "";                           // Blind copy recipient

// ============================================
// reCAPTCHA v3 KEYS (REPLACE WITH YOUR OWN)
// ============================================
$recaptcha_client_secret = "YOUR_SITE_KEY_HERE";
$recaptcha_server_secret = "YOUR_SECRET_KEY_HERE";

// ============================================
// CACHE BUSTING VERSION
// ============================================
$jscssverion = 1;  // Increment when you update CSS/JS files
```

#### Configuration Checklist:

| Setting                    | What to Change                   | Example               |
| -------------------------- | -------------------------------- | --------------------- |
| `$site`                    | Your company/site name           | `"Acme Corp"`         |
| `$description`             | Meta description (150-160 chars) | `"We provide..."`     |
| `$phone_number`            | Displayed phone                  | `"+1 (555) 123-4567"` |
| `$href_phone_number`       | tel: link                        | `"tel:+15551234567"`  |
| `$emailcont`               | Displayed email                  | `"hello@acme.com"`    |
| `$admin_email`             | Receives form emails             | `"leads@acme.com"`    |
| `$recaptcha_client_secret` | reCAPTCHA site key               | See reCAPTCHA section |
| `$recaptcha_server_secret` | reCAPTCHA secret key             | See reCAPTCHA section |

---

### Global Content (global-content.php)

**Location:** `data/global-content.php`

Use this file to store content that appears across multiple pages:

```php
<?php
// Define reusable content blocks here

$company_address = "123 Main Street, City, Country";

$social_links = [
    'facebook' => 'https://facebook.com/yourpage',
    'instagram' => 'https://instagram.com/yourpage',
    'linkedin' => 'https://linkedin.com/company/yourpage',
];

$business_hours = [
    'weekdays' => '9:00 AM - 6:00 PM',
    'saturday' => '10:00 AM - 4:00 PM',
    'sunday' => 'Closed',
];
```

---

## 🖼️ Open Graph (OG) Image Setup

The Open Graph image appears when your site is shared on social media (Facebook, Twitter, LinkedIn, etc.).

### File Location

```
/ogimage.png
```

### Specifications

| Property       | Requirement                                  |
| -------------- | -------------------------------------------- |
| **Dimensions** | 1200 x 630 pixels (recommended)              |
| **Format**     | PNG or JPG                                   |
| **File Size**  | Under 1MB (smaller is better)                |
| **File Name**  | Must be `ogimage.png` (or update header.php) |

### How to Replace the OG Image

1. **Create your image** at 1200x630 pixels using:

   - Canva (free): [canva.com](https://canva.com)
   - Figma (free): [figma.com](https://figma.com)
   - Photoshop, Illustrator, etc.

2. **Export as PNG or JPG**

3. **Name it** `ogimage.png`

4. **Replace** the existing file in the project root:

   ```
   your-project-name/ogimage.png
   ```

5. **Verify** by checking `src/header.php`:
   ```php
   <meta property="og:image" content="<?= $site_url ?>ogimage.png" />
   ```

### If Using a Different Filename

If you want to use a different filename (e.g., `og-image.jpg`), edit `src/header.php`:

```php
<!-- Change this: -->
<meta property="og:image" content="<?= $site_url ?>ogimage.png" />

<!-- To this: -->
<meta property="og:image" content="<?= $site_url ?>og-image.jpg" />
```

Also update the Twitter image meta tag:

```php
<meta name="twitter:image" content="<?= $site_url ?>og-image.jpg">
```

### Testing Your OG Image

Use these tools to test how your site appears when shared:

- **Facebook Sharing Debugger**: [developers.facebook.com/tools/debug/](https://developers.facebook.com/tools/debug/)
- **Twitter Card Validator**: [cards-dev.twitter.com/validator](https://cards-dev.twitter.com/validator)
- **LinkedIn Post Inspector**: [linkedin.com/post-inspector/](https://www.linkedin.com/post-inspector/)

---

## 📧 Contact Form Setup

### Understanding form.php

**Location:** `src/form.php`

The form handler processes POST requests and sends emails. It includes:

1. **Honeypot** - Hidden field to catch bots
2. **reCAPTCHA v3** - Google bot protection
3. **Input Sanitization** - Cleans user input
4. **Validation** - Checks required fields
5. **Email Template** - HTML formatted email
6. **Redirect** - Sends user to thank you page

### Default Form Fields

The boilerplate expects these fields (you can customize):

| Field Name      | POST Key         | Required | Validation                 |
| --------------- | ---------------- | -------- | -------------------------- |
| Loan Option     | `loanOption`     | Yes      | Not empty                  |
| Amount          | `amount`         | Yes      | Not empty                  |
| Full Name       | `full_name`      | Yes      | Not empty                  |
| Contact Number  | `contact_number` | Yes      | 10-digit Australian format |
| Email           | `email`          | Yes      | Valid email                |
| Notes           | `notes`          | No       | None                       |
| Honeypot        | `honeypot`       | Hidden   | Must be empty              |
| reCAPTCHA Token | `token`          | Yes      | Valid token                |

### Customizing Form Fields

#### Step 1: Update Your HTML Form

In `src/main.php`, create your form:

```html
<form action="src/form.php" method="POST" id="contactForm">
  <!-- Honeypot (hidden, don't touch) -->
  <input
    type="text"
    name="honeypot"
    style="display:none"
    tabindex="-1"
    autocomplete="off"
  />

  <!-- reCAPTCHA Token (hidden, don't touch) -->
  <input type="hidden" name="token" class="recaptchaResponse" />

  <!-- Your Custom Fields -->
  <div class="form-group">
    <label for="name">Full Name *</label>
    <input type="text" id="name" name="full_name" required />
  </div>

  <div class="form-group">
    <label for="email">Email Address *</label>
    <input type="email" id="email" name="email" required />
  </div>

  <div class="form-group">
    <label for="phone">Phone Number *</label>
    <input type="tel" id="phone" name="contact_number" required />
  </div>

  <div class="form-group">
    <label for="service">Service Interested In *</label>
    <select id="service" name="service" required>
      <option value="">Select a service</option>
      <option value="Service A">Service A</option>
      <option value="Service B">Service B</option>
    </select>
  </div>

  <div class="form-group">
    <label for="message">Message</label>
    <textarea id="message" name="message" rows="5"></textarea>
  </div>

  <button type="submit">Submit</button>
</form>
```

#### Step 2: Update form.php to Match Your Fields

Open `src/form.php` and modify the field processing:

```php
<?php
// ... (keep the reCAPTCHA verification code) ...

// 3) Sanitize & assign form fields - CUSTOMIZE THESE
$full_name       = strip_tags(trim($_POST['full_name'] ?? ''));
$email_address   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$contact_number  = preg_replace('/\D+/', '', trim($_POST['contact_number'] ?? ''));
$service         = strip_tags(trim($_POST['service'] ?? ''));
$message         = strip_tags(trim($_POST['message'] ?? ''));

// 4) Required checks - CUSTOMIZE THESE
if (!$full_name || !$email_address || !$contact_number || !$service) {
    throw new Exception('Please complete all required fields.');
}

// Phone validation (adjust regex for your country)
// Australian: /^0[2|3|4|7|8]\d{8}$/
// US/Canada: /^[2-9]\d{9}$/
// Generic: /^\d{10,15}$/
if (!preg_match('/^\d{10,15}$/', $contact_number)) {
    throw new Exception('Invalid phone number.');
}

if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    throw new Exception('Invalid email address.');
}
```

### Email Template Customization

The email template is in `src/form.php`. Key sections to customize:

#### Change Header Color

```php
<!-- Find this line and change the background-color -->
<td align="center" style="padding:20px; background-color:#CAB644; ...">
```

#### Change Logo

```php
// Update the logo URL in config.php
$logoUrl = $baseUrl . '/assets/images/logo.png';
```

#### Customize Email Content

```php
$html = <<<HTML
<!DOCTYPE html>
<html>
  <body>
    <!-- Customize your email template here -->
    <!-- Keep the table structure for email client compatibility -->
  </body>
</html>
HTML;
```

### Form Validation

#### Client-Side (Optional)

Add JavaScript validation in `assets/js/script.js` or `assets/js/edit.js`:

```javascript
document.getElementById("contactForm").addEventListener("submit", function (e) {
  const phone = document.getElementById("phone").value;
  const phoneRegex = /^\d{10,15}$/;

  if (!phoneRegex.test(phone.replace(/\D/g, ""))) {
    e.preventDefault();
    alert("Please enter a valid phone number");
    return false;
  }
});
```

#### Server-Side (form.php)

Server-side validation is **mandatory**. Never trust client-side validation alone:

```php
// Email validation
if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    throw new Exception('Invalid email address.');
}

// Phone validation (customize regex)
if (!preg_match('/^\d{10,15}$/', $contact_number)) {
    throw new Exception('Invalid phone number.');
}

// Custom validation
if (strlen($message) > 1000) {
    throw new Exception('Message too long (max 1000 characters).');
}
```

---

## 🙏 Thank You Page (MANDATORY)

### Why thankyou.php is Required

The `thankyou.php` file is **mandatory** and must exist in your project. Here's why:

1. **Form Redirect Target** - `form.php` redirects users here after successful submission
2. **Separate Script** - Contains the thank you popup animation script
3. **Tracking** - Enables conversion tracking (Google Ads, Facebook Pixel, etc.)
4. **User Experience** - Confirms form submission success

### File Location

```
your-project-name/thankyou.php
```

### How It Works

1. User submits form on main page
2. `form.php` processes the submission
3. If successful, user is redirected: `header('Location: ./../thankyou.php');`
4. `thankyou.php` displays the same page content PLUS the popup
5. Popup appears after 1.5 seconds with a nice animation

### What's Inside thankyou.php

```php
<?php
require_once('includes/config.php');
require_once('includes/functions.php');
include('src/header.php');
?>

<!-- Thank You Popup Styles -->
<style>
    .thankyou-message {
        position: fixed;
        top: 0; right: 0; left: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        /* ... animation styles ... */
    }
</style>

<!-- Thank You Popup HTML -->
<div class="thankyou-message" id="thankyouPopup">
    <div class="content">
        <button class="close-btn">&times;</button>
        <div class="popup-check">✅</div>
        <h1>Message Sent!</h1>
        <p>Thanks for reaching out. Our team will get in touch shortly.</p>
    </div>
</div>

<!-- Thank You Animation Script -->
<script>
    // Popup appears after 1.5 seconds
    window.addEventListener('load', function() {
        setTimeout(() => {
            popup.classList.add('show');
        }, 1500);
    });
</script>

<?php
include('src/main.php');  // Same content as index.php
include('src/footer.php');
?>
```

### Customizing the Thank You Popup

#### Change the Message

```php
<h1>Message Sent!</h1>
<p>Thanks for reaching out. Our team will get in touch shortly.</p>
```

Change to:

```php
<h1>Thank You!</h1>
<p>We've received your inquiry and will respond within 24 hours.</p>
```

#### Change the Icon

Replace the emoji:

```php
<div class="popup-check">✅</div>
```

With a custom SVG:

```php
<div class="popup-check">
    <svg><!-- Your SVG code --></svg>
</div>
```

#### Change Popup Timing

```javascript
// Current: appears after 1.5 seconds (1500ms)
setTimeout(() => {
  popup.classList.add("show");
}, 1500);

// Change to 0.5 seconds
setTimeout(() => {
  popup.classList.add("show");
}, 500);
```

#### Change Accent Color

The popup uses `var(--color-accent)`. Define this in your CSS:

```css
:root {
  --color-accent: #cab644; /* Change this color */
}
```

Or directly in the thankyou.php styles:

```php
.thankyou-message .content {
    border-top: 6px solid #YOUR_COLOR;
}

.thankyou-message .popup-check {
    color: #YOUR_COLOR;
}
```

### Adding Conversion Tracking

Add tracking scripts in `thankyou.php` before the closing `</head>` or in the body:

#### Google Ads Conversion

```html
<!-- Google Ads Conversion -->
<script>
  gtag("event", "conversion", {
    send_to: "AW-XXXXXXXXXX/XXXXXXXXXXXXXXXXXXX",
  });
</script>
```

#### Facebook Pixel

```html
<!-- Facebook Pixel - Lead Event -->
<script>
  fbq("track", "Lead");
</script>
```

---

## 🎨 SCSS Setup & Compilation

### Installing Live Sass Compiler

The project uses the **Live Sass Compiler** extension for VS Code/Cursor.

#### Step 1: Install the Extension

1. Open VS Code or Cursor
2. Go to Extensions (Ctrl+Shift+X or Cmd+Shift+X)
3. Search for: `live sass compiler`
4. Install the one by **Glenn Marks** (ID: `glenn2223.live-sass`)

> **Important**: Install `glenn2223.live-sass` NOT the deprecated `ritwickdey.live-sass` version.

#### Step 2: Verify Installation

After installation, you should see **"Watch Sass"** in the bottom status bar.

---

### VS Code / Cursor Settings

#### Method 1: Workspace Settings (Recommended)

Create a `.vscode/settings.json` file in your project root:

```json
{
  "liveSassCompile.settings.formats": [
    {
      "format": "expanded",
      "extensionName": ".css",
      "savePath": "/assets/css"
    },
    {
      "format": "compressed",
      "extensionName": ".min.css",
      "savePath": "/assets/css/min"
    }
  ],
  "liveSassCompile.settings.excludeList": ["**/node_modules/**", ".vscode/**"],
  "liveSassCompile.settings.generateMap": false,
  "liveSassCompile.settings.autoprefix": ["> 1%", "last 2 versions"]
}
```

#### Method 2: Global Settings

1. Open VS Code/Cursor Settings (Ctrl+, or Cmd+,)
2. Click the `{}` icon to open JSON settings
3. Add the same configuration

#### Settings Explanation

| Setting                     | Value | What It Does                             |
| --------------------------- | ----- | ---------------------------------------- |
| `format: expanded`          | -     | Readable CSS with formatting             |
| `format: compressed`        | -     | Minified CSS for production              |
| `extensionName: .css`       | -     | Output as `.css` files                   |
| `extensionName: .min.css`   | -     | Output as `.min.css` files               |
| `savePath: /assets/css`     | -     | Where expanded CSS goes                  |
| `savePath: /assets/css/min` | -     | Where minified CSS goes                  |
| `generateMap: false`        | -     | No source maps (keep true for debugging) |
| `autoprefix`                | -     | Adds vendor prefixes automatically       |

---

### SCSS File Structure

```
assets/scss/
├── style.scss        # Main styles (add your custom styles here)
├── critical.scss     # Critical above-the-fold CSS
├── responsive.scss   # Responsive breakpoints
├── reset.scss        # CSS reset (usually don't touch)
├── fonts.scss        # Font definitions
├── edit.scss         # Quick edits and overrides
└── readme.md         # SCSS-specific documentation
```

#### File Purposes

| File              | Purpose             | When to Edit                    |
| ----------------- | ------------------- | ------------------------------- |
| `style.scss`      | Main styles         | Always - add your custom styles |
| `critical.scss`   | Header/hero section | Above-the-fold styles           |
| `responsive.scss` | Media queries       | Mobile/tablet adjustments       |
| `reset.scss`      | Base reset          | Rarely - only if needed         |
| `fonts.scss`      | @font-face rules    | When adding custom fonts        |
| `edit.scss`       | Quick fixes         | Temporary or override styles    |

---

### Adding Your Styles

#### Starting the SCSS Compiler

1. Open your project in VS Code/Cursor
2. Look at the bottom status bar
3. Click **"Watch Sass"**
4. Status should change to **"Watching..."**

#### Writing Styles in style.scss

```scss
// ========================================
// CSS VARIABLES (Define at top)
// ========================================
:root {
  // Colors
  --color-primary: #1a1a1a;
  --color-secondary: #666666;
  --color-accent: #cab644;
  --color-background: #ffffff;
  --color-surface: #f5f5f5;

  // Typography
  --font-primary: "Glancyr", system-ui, sans-serif;
  --font-size-base: 16px;
  --line-height-base: 1.5;

  // Spacing
  --spacing-unit: 8px;
  --container-max: 1510px;

  // Transitions
  --transition-fast: 0.2s ease;
  --transition-normal: 0.3s ease;
}

// ========================================
// TYPOGRAPHY
// ========================================
body {
  font-family: var(--font-primary);
  font-size: var(--font-size-base);
  line-height: var(--line-height-base);
  color: var(--color-primary);
  background-color: var(--color-background);
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1em;
}

h1 {
  font-size: clamp(2rem, 5vw, 3.5rem);
}
h2 {
  font-size: clamp(1.5rem, 4vw, 2.5rem);
}
h3 {
  font-size: clamp(1.25rem, 3vw, 2rem);
}

// ========================================
// BUTTONS
// ========================================
.btn {
  display: inline-block;
  padding: 12px 24px;
  font-weight: 600;
  text-align: center;
  text-decoration: none;
  border-radius: 8px;
  transition: var(--transition-normal);
  cursor: pointer;

  &--primary {
    background-color: var(--color-accent);
    color: #fff;

    &:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
  }

  &--outline {
    background: transparent;
    border: 2px solid var(--color-accent);
    color: var(--color-accent);

    &:hover {
      background-color: var(--color-accent);
      color: #fff;
    }
  }
}

// ========================================
// SECTIONS
// ========================================
section {
  padding: 80px 0;
}

.section-title {
  text-align: center;
  margin-bottom: 50px;
}

// ========================================
// FORMS
// ========================================
.form-group {
  margin-bottom: 20px;

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
  }

  input,
  select,
  textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: var(--transition-fast);

    &:focus {
      border-color: var(--color-accent);
      box-shadow: 0 0 0 3px rgba(202, 182, 68, 0.2);
    }
  }

  textarea {
    resize: vertical;
    min-height: 120px;
  }
}
```

---

### CSS Variables for Colors

Define your color palette using CSS custom properties (variables):

```scss
:root {
  // Primary palette
  --color-primary: #1a1a1a; // Main text color
  --color-secondary: #666666; // Secondary text
  --color-accent: #cab644; // Brand/accent color

  // Backgrounds
  --color-background: #ffffff; // Page background
  --color-surface: #f5f5f5; // Card/section backgrounds

  // Semantic colors
  --color-success: #10b981; // Success states
  --color-warning: #f59e0b; // Warning states
  --color-error: #ef4444; // Error states
  --color-info: #3b82f6; // Info states

  // Neutrals
  --color-gray-100: #f7f7f7;
  --color-gray-200: #e5e5e5;
  --color-gray-300: #d4d4d4;
  --color-gray-400: #a3a3a3;
  --color-gray-500: #737373;
  --color-gray-600: #525252;
  --color-gray-700: #404040;
  --color-gray-800: #262626;
  --color-gray-900: #171717;
}
```

#### To Change the Accent Color

1. Open `assets/scss/style.scss` (or `critical.scss`)
2. Find or add `:root` with `--color-accent`
3. Change the hex value:
   ```scss
   :root {
     --color-accent: #ff5733; // Your new color
   }
   ```
4. Save the file
5. SCSS compiles automatically
6. Refresh your browser

---

## 📱 CSS Organization

### Critical CSS

**File:** `assets/scss/critical.scss` → `assets/css/min/critical.min.css`

Critical CSS is **inlined** in the `<head>` for fastest rendering. Include:

- Navigation styles
- Hero/banner section styles
- Above-the-fold content
- Container and layout basics

```scss
/* ========== CRITICAL: Navigation ========== */
.nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  /* ... */
}

/* ========== CRITICAL: Hero Section ========== */
.hero {
  min-height: 100vh;
  /* ... */
}
```

### Non-Critical CSS

**File:** `assets/scss/style.scss` → `assets/css/min/style.min.css`

Loaded asynchronously (doesn't block page render):

```html
<link
  rel="preload"
  href="assets/css/min/style.min.css"
  as="style"
  onload="this.onload=null;this.rel='stylesheet'"
/>
```

### Responsive Design

**File:** `assets/scss/responsive.scss`

Mobile-first breakpoints:

```scss
// ========================================
// BREAKPOINTS
// ========================================
// Mobile: 0 - 767px (base styles)
// Tablet: 768px - 991px
// Desktop: 992px - 1199px
// Large: 1200px+

// ========================================
// TABLET AND UP (768px+)
// ========================================
@media (min-width: 768px) {
  .container {
    padding: 0 2rem;
  }

  .nav {
    // Tablet navigation styles
  }

  .hero {
    // Tablet hero styles
  }
}

// ========================================
// DESKTOP AND UP (992px+)
// ========================================
@media (min-width: 992px) {
  .container {
    padding: 0 3rem;
  }

  .grid-2 {
    grid-template-columns: repeat(2, 1fr);
  }
}

// ========================================
// LARGE SCREENS (1200px+)
// ========================================
@media (min-width: 1200px) {
  .container {
    max-width: 1510px;
  }

  .grid-3 {
    grid-template-columns: repeat(3, 1fr);
  }
}
```

---

## 🖼️ Image Helper Functions

The boilerplate includes powerful image helper functions in `includes/functions.php`.

### imgx() Function

Renders responsive images with automatic WebP conversion.

#### Syntax

```php
imgx($src, $alt, $class, $mobileSrc, $attributes, $lazy, $mobileBreakpoint)
```

#### Parameters

| Parameter           | Type   | Required | Default | Description                  |
| ------------------- | ------ | -------- | ------- | ---------------------------- |
| `$src`              | string | Yes      | -       | Image path without extension |
| `$alt`              | string | No       | `''`    | Alt text for accessibility   |
| `$class`            | string | No       | `''`    | CSS class(es)                |
| `$mobileSrc`        | string | No       | `''`    | Mobile version path          |
| `$attributes`       | string | No       | `''`    | Additional HTML attributes   |
| `$lazy`             | bool   | No       | `true`  | Enable lazy loading          |
| `$mobileBreakpoint` | int    | No       | `768`   | Mobile breakpoint in px      |

#### Examples

**Basic Usage:**

```php
<?php imgx('hero/banner', 'Hero Banner'); ?>
```

Outputs:

```html
<picture>
  <source srcset="assets/images/hero/banner.webp" type="image/webp" />
  <img
    src="assets/images/hero/banner.png"
    alt="Hero Banner"
    loading="lazy"
    width="1920"
    height="1080"
  />
</picture>
```

**With Class:**

```php
<?php imgx('about/team', 'Our Team', 'team-photo'); ?>
```

**With Mobile Version:**

```php
<?php imgx('hero/banner', 'Hero', 'hero-img', 'hero/banner-mobile'); ?>
```

Outputs:

```html
<picture>
  <source
    srcset="assets/images/hero/banner-mobile.webp"
    media="(max-width: 767px)"
    type="image/webp"
  />
  <source srcset="assets/images/hero/banner.webp" type="image/webp" />
  <img
    src="assets/images/hero/banner.png"
    alt="Hero"
    class="hero-img"
    loading="lazy"
    width="1920"
    height="1080"
  />
</picture>
```

**Eager Loading (Above the Fold):**

```php
<?php imgx('hero/banner', 'Hero', 'hero-img', '', '', false); ?>
```

**Custom Breakpoint:**

```php
<?php imgx('hero/banner', 'Hero', '', 'hero/banner-mobile', '', true, 1024); ?>
```

---

### svgx() Function

Renders SVG files as regular `<img>` tags.

#### Syntax

```php
svgx($src, $alt, $class)
```

#### Parameters

| Parameter | Type   | Required | Default | Description                |
| --------- | ------ | -------- | ------- | -------------------------- |
| `$src`    | string | Yes      | -       | SVG path without extension |
| `$alt`    | string | No       | `''`    | Alt text                   |
| `$class`  | string | No       | `''`    | CSS class(es)              |

#### Examples

**Basic Usage:**

```php
<?php svgx('icons/arrow', 'Arrow'); ?>
```

Outputs:

```html
<img src="assets/images/icons/arrow.svg" alt="Arrow" width="24" height="24" />
```

**With Class:**

```php
<?php svgx('logo', 'Company Logo', 'site-logo'); ?>
```

---

### svg_inline() Function

Outputs SVG code directly for CSS/JS manipulation.

#### Syntax

```php
svg_inline($src, $class)
```

#### Parameters

| Parameter | Type   | Required | Description                 |
| --------- | ------ | -------- | --------------------------- |
| `$src`    | string | Yes      | SVG path without extension  |
| `$class`  | string | No       | CSS class to add to SVG tag |

#### Examples

**Basic Usage:**

```php
<?php svg_inline('icons/menu'); ?>
```

Outputs the raw SVG code inline.

**With Class:**

```php
<?php svg_inline('icons/close', 'nav-close-icon'); ?>
```

**Why Use Inline SVGs?**

- Animate SVG elements with CSS
- Change colors with CSS (`fill`, `stroke`)
- Manipulate with JavaScript
- No additional HTTP requests

---

## 🔒 reCAPTCHA v3 Setup

### Step 1: Get reCAPTCHA Keys

1. Go to [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)
2. Sign in with your Google account
3. Click **"+ Create"** (or "Add" for first time)
4. Fill in the form:
   - **Label**: Your site name
   - **reCAPTCHA type**: reCAPTCHA v3
   - **Domains**: Add your domains (e.g., `yourdomain.com`, `localhost`)
5. Accept Terms of Service
6. Click **Submit**
7. Copy your **Site Key** and **Secret Key**

### Step 2: Update config.php

Open `includes/config.php` and replace the keys:

```php
// Google reCAPTCHA keys
$recaptcha_client_secret = "YOUR_SITE_KEY_HERE";      // Site Key (public)
$recaptcha_server_secret = "YOUR_SECRET_KEY_HERE";    // Secret Key (private)
```

### Step 3: Ensure Form Has Required Fields

Your HTML form must include:

```html
<!-- Hidden reCAPTCHA token field -->
<input type="hidden" name="token" class="recaptchaResponse" />
```

The footer.php automatically loads and refreshes reCAPTCHA tokens.

### How reCAPTCHA v3 Works

1. **Script loads** after user interaction or 5 seconds
2. **Token generated** and placed in hidden field
3. **Token refreshes** every 60 seconds (tokens expire after 2 minutes)
4. **Form submit** sends token to `form.php`
5. **Server verifies** token with Google
6. **Score checked** (0.0 = bot, 1.0 = human, threshold: 0.5)

### Adjusting Score Threshold

In `src/form.php`:

```php
// Lower = stricter, higher = more lenient
if ($recap->score < 0.5) {  // Change this value
    throw new Exception('Low reCAPTCHA score. Please try again.');
}
```

| Score     | Meaning           | Recommendation              |
| --------- | ----------------- | --------------------------- |
| 0.9+      | Very likely human | Safe                        |
| 0.7 - 0.8 | Probably human    | Usually safe                |
| 0.5 - 0.6 | Uncertain         | Default threshold           |
| 0.3 - 0.4 | Suspicious        | May need extra verification |
| < 0.3     | Likely bot        | Block                       |

---

## 🎬 JavaScript & Vendor Libraries

### AOS (Animate On Scroll)

**Files:**

- CSS: `assets/css/vendor/aos.css`
- JS: `assets/js/vendor/aos.js`

#### Initialization

In `assets/js/script.js`:

```javascript
window.addEventListener("load", () => {
  AOS.init({ disable: "mobile" });
});
```

#### Basic Usage

Add `data-aos` attribute to any element:

```html
<div data-aos="fade-up">This will fade up when scrolled into view</div>
```

#### Available Animations

| Animation    | Description         |
| ------------ | ------------------- |
| `fade`       | Fade in             |
| `fade-up`    | Fade in from bottom |
| `fade-down`  | Fade in from top    |
| `fade-left`  | Fade in from right  |
| `fade-right` | Fade in from left   |
| `zoom-in`    | Zoom in             |
| `zoom-out`   | Zoom out            |
| `slide-up`   | Slide up            |
| `flip-up`    | Flip up             |

#### Advanced Options

```html
<div
  data-aos="fade-up"
  data-aos-duration="1000"
  data-aos-delay="200"
  data-aos-easing="ease-in-out"
  data-aos-once="true"
>
  Customized animation
</div>
```

| Attribute           | Values                        | Default |
| ------------------- | ----------------------------- | ------- |
| `data-aos-duration` | 50-3000 (ms)                  | 400     |
| `data-aos-delay`    | 0-3000 (ms)                   | 0       |
| `data-aos-easing`   | ease, ease-in, ease-out, etc. | ease    |
| `data-aos-once`     | true/false                    | false   |
| `data-aos-offset`   | 0-500 (px)                    | 120     |

---

### Swiper.js

**Files:**

- CSS: `assets/css/vendor/swiper-bundle.min.css`
- JS: `assets/js/vendor/swiper-bundle.min.js`

#### Basic Slider HTML

```html
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
  </div>

  <!-- Optional Navigation -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- Optional Pagination -->
  <div class="swiper-pagination"></div>
</div>
```

#### Initialize Swiper

In `assets/js/script.js` or `assets/js/edit.js`:

```javascript
const swiper = new Swiper(".mySwiper", {
  // Core options
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,

  // Autoplay
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // Pagination dots
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  // Responsive breakpoints
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
```

---

## 🔄 Cache Busting

Cache busting forces browsers to load updated CSS/JS files.

### How It Works

In `includes/config.php`:

```php
$jscssverion = 1;  // Increment this when you update files
```

In templates:

```php
<link rel="stylesheet" href="assets/css/style.css?v=<?= $jscssverion; ?>">
<script src="assets/js/script.js?v=<?= $jscssverion; ?>"></script>
```

### When to Increment

Increment `$jscssverion` when:

- You update any CSS file
- You update any JavaScript file
- You're deploying to production
- Users report seeing old styles

```php
// Before deployment:
$jscssverion = 1;

// After CSS/JS changes:
$jscssverion = 2;
```

---

## 🎯 Favicon Setup

### File Location

```
assets/images/favicon.svg
```

### SVG Favicon (Modern Browsers)

The boilerplate uses SVG favicon for scalability:

```html
<link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="assets/images/favicon.svg" />
```

### Creating a Favicon

1. Design at 512x512 pixels minimum
2. Export as SVG (or PNG/ICO for legacy support)
3. Replace `assets/images/favicon.svg`

### Adding Legacy Support

For older browsers, add multiple formats:

```html
<!-- Modern browsers (SVG) -->
<link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml" />

<!-- Legacy browsers (ICO) -->
<link rel="icon" href="assets/images/favicon.ico" sizes="any" />

<!-- Apple Touch Icon -->
<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png" />
```

---

## ✅ Customization Checklist

Use this checklist when starting a new project:

### 1. Configuration (Required)

- [ ] Edit `includes/config.php`:
  - [ ] Set `$site` (site name)
  - [ ] Set `$description` (meta description)
  - [ ] Set `$phone_number` and `$href_phone_number`
  - [ ] Set `$emailcont` (contact email)
  - [ ] Set `$admin_email` (form submission recipient)
  - [ ] Add `$cc_email` and `$bcc_email` if needed
  - [ ] Replace reCAPTCHA keys

### 2. Assets (Required)

- [ ] Replace `ogimage.png` (1200x630px)
- [ ] Replace `assets/images/favicon.svg`
- [ ] Add logo to `assets/images/`
- [ ] Add custom fonts to `assets/fonts/`
- [ ] Update `assets/scss/fonts.scss` for custom fonts

### 3. Styling (Required)

- [ ] Define color variables in `:root`
- [ ] Update `--color-accent` to match brand
- [ ] Add main styles to `assets/scss/style.scss`
- [ ] Add responsive styles to `assets/scss/responsive.scss`

### 4. Content (Required)

- [ ] Edit `src/header.php` if needed
- [ ] Build your page in `src/main.php`
- [ ] Customize `thankyou.php` message

### 5. Form (If Using)

- [ ] Update HTML form fields in `src/main.php`
- [ ] Update `src/form.php` to match your fields
- [ ] Customize email template colors/content
- [ ] Update phone validation regex if not Australian
- [ ] Test form submission locally

### 6. Testing (Required)

- [ ] Test all pages locally
- [ ] Test form submission
- [ ] Test thank you popup
- [ ] Check responsive design on mobile
- [ ] Validate OG image with Facebook Debugger
- [ ] Test page speed with Lighthouse

---

## 💡 Best Practices

### Performance

1. **Images**

   - Use `imgx()` for automatic WebP conversion
   - Provide mobile versions for large images
   - Use `lazy="false"` only for above-the-fold images

2. **CSS**

   - Keep critical CSS minimal (header + hero only)
   - Use the minified versions in production
   - Increment cache version after changes

3. **JavaScript**
   - Use `defer` attribute on scripts
   - Load third-party scripts only when needed
   - Keep `edit.js` for temporary/project-specific code

### Accessibility

1. Always include `alt` text for images
2. Use semantic HTML (`<header>`, `<main>`, `<nav>`, `<footer>`)
3. Ensure sufficient color contrast
4. Make forms keyboard accessible
5. Add `aria-label` to icon-only buttons

### SEO

1. Unique `<title>` and `<meta description>` per page
2. Proper heading hierarchy (one H1 per page)
3. Descriptive alt text for images
4. Clean URL structure
5. Valid HTML (no errors)

### Security

1. Never commit reCAPTCHA secret keys to public repos
2. Always validate/sanitize user input server-side
3. Use HTTPS in production
4. Keep PHP version updated

---

## 🔧 Troubleshooting

### SCSS Not Compiling

**Problem:** Changes to SCSS files don't update the CSS.

**Solutions:**

1. Check if "Watch Sass" is running (bottom status bar)
2. Click "Watch Sass" to start/restart
3. Check for SCSS syntax errors (look in Output panel)
4. Verify settings in `.vscode/settings.json`
5. Reinstall Live Sass Compiler extension

### Form Not Submitting

**Problem:** Form submission shows error or doesn't work.

**Solutions:**

1. Check browser console for JavaScript errors
2. Verify reCAPTCHA keys are correct
3. Check if PHP `mail()` function is enabled
4. Verify form `action` attribute points to correct path
5. Check PHP error logs

### Images Not Loading

**Problem:** Images show as broken.

**Solutions:**

1. Verify file exists in `assets/images/`
2. Check file extension matches (png, jpg, jpeg)
3. Verify file permissions (readable by web server)
4. Check for typos in image path
5. Clear browser cache

### reCAPTCHA Errors

**Problem:** "reCAPTCHA verification failed" or low score.

**Solutions:**

1. Verify site key is the PUBLIC key (not secret)
2. Verify secret key is the SECRET key (not public)
3. Add `localhost` to reCAPTCHA allowed domains
4. Check if cURL is enabled in PHP
5. Try reducing score threshold temporarily

### WebP Images Not Generated

**Problem:** WebP versions of images not created.

**Solutions:**

1. Verify GD library is installed with WebP support
2. Check `assets/images/` folder is writable
3. Ensure source image exists and is valid
4. Check PHP error logs for GD errors

### Thank You Popup Not Showing

**Problem:** After form submission, popup doesn't appear.

**Solutions:**

1. Verify redirect goes to `thankyou.php` (not `index.php`)
2. Check for JavaScript errors in console
3. Verify popup CSS is loading
4. Check if `#thankyouPopup` element exists
5. Try removing browser extensions that might block scripts

---

## 📁 File Permissions

### Linux/macOS

```bash
# Set directory permissions
find . -type d -exec chmod 755 {} \;

# Set file permissions
find . -type f -exec chmod 644 {} \;

# Make assets/images writable (for WebP conversion)
chmod -R 775 assets/images
```

### Windows (Laragon/XAMPP)

Usually works out of the box. If having issues:

1. Right-click folder → Properties → Security
2. Add "Everyone" with Read & Write permissions
3. Apply to all subfolders

---

## 🔐 Security Considerations

### Before Going Live

1. **Remove phpinfo.php** if you created one for testing
2. **Set error reporting to 0** in production (already configured in config.php)
3. **Use HTTPS** - Get SSL certificate from hosting provider
4. **Update reCAPTCHA domains** - Remove `localhost`, add production domain
5. **Backup your site** before major changes

### Protecting Sensitive Files

Add to `.htaccess` (Apache):

```apache
# Deny access to sensitive files
<FilesMatch "^(config|functions)\.php$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Block access to includes folder
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^includes/ - [F,L]
    RewriteRule ^data/ - [F,L]
</IfModule>
```

---

## 🚀 Deployment

### Pre-Deployment Checklist

1. [ ] All configuration values updated
2. [ ] reCAPTCHA production keys set
3. [ ] OG image replaced
4. [ ] Favicon replaced
5. [ ] Cache version incremented
6. [ ] SCSS compiled (minified versions exist)
7. [ ] Test locally one final time
8. [ ] Form tested with real email

### Uploading Files

**Option 1: FTP/SFTP**

1. Connect using FileZilla, Cyberduck, or similar
2. Upload all files to `public_html` or web root
3. Set proper file permissions

**Option 2: Git Deployment**

1. Push to GitHub/GitLab/Bitbucket
2. Use hosting provider's Git deployment feature
3. Or use SSH to `git pull` on server

**Option 3: cPanel File Manager**

1. Compress project as ZIP
2. Upload ZIP to `public_html`
3. Extract on server
4. Delete ZIP file

### Post-Deployment

1. Test the live site
2. Submit to Google Search Console
3. Test OG image with social media debuggers
4. Set up SSL if not already done
5. Configure caching headers (optional)

---

## 📄 License

This boilerplate is provided as-is for your use in client and personal projects.

---

## 🙋 Need Help?

If you encounter issues:

1. Check this README thoroughly
2. Review the SCSS readme in `assets/scss/readme.md`
3. Check PHP error logs
4. Check browser console for JavaScript errors
5. Google the specific error message

---

**Happy Building! 🎉**

Built with ❤️ for fast, secure, and beautiful landing pages.
