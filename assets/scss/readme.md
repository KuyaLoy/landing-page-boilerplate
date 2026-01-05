# SCSS Setup Instructions

## Overview

This project uses SCSS (Sass) for styling with the Live Sass Compiler extension in VS Code/Cursor. The SCSS files are organized in the `assets/scss/` directory and compiled to `assets/css/`.

## Live Sass Compiler Setup

### 1. Install Extension

- Install "Live Sass Compiler" extension in VS Code/Cursor
- Extension ID: `glenn2223.live-sass`

### 2. Extension Settings

Your current settings are configured as follows:

```json
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
  ]
```

**What this means:**

- **Format**: `compressed` - Outputs minified CSS for production
- **Extension**: `.css` - Generates `.css` files
- **Save Path**: `/assets/css` - Saves compiled files to `assets/css/` directory

### 3. Starting the Compiler

1. Open your project in VS Code/Cursor
2. Click the "Watch Sass" button in the status bar (bottom right)
3. Or use the command palette: `Ctrl+Shift+P` → "Live Sass: Watch Sass"
4. The compiler will start watching your SCSS files for changes

## SCSS File Structure

### Main Files

- `style.scss` - Main stylesheet (currently empty, add your main styles here)
- `critical.scss` - Critical CSS for above-the-fold content
- `responsive.scss` - Responsive breakpoints and mobile-first styles
- `reset.scss` - CSS reset/normalize
- `fonts.scss` - Font definitions and typography
- `edit.scss` - Additional styles (currently empty)

### Recommended Usage Pattern

#### 1. Main Styles (`style.scss`)

```scss
// Import other SCSS files
@import "reset";
@import "fonts";
@import "critical";

// Your main styles here
.your-component {
  // styles
}

// Import responsive styles last
@import "responsive";
```

#### 2. Component Organization

Create component-specific styles in `style.scss`:

```scss
/* ========== HEADER ========== */
.header {
  // header styles
}

/* ========== NAVIGATION ========== */
.nav {
  // navigation styles
}

/* ========== MAIN CONTENT ========== */
.main-content {
  // main content styles
}
```

#### 3. Responsive Design (`responsive.scss`)

Use the existing mobile-first breakpoints:

```scss
/* Mobile first approach */
.component {
  // Base styles (mobile)
  padding: 1rem;

  // Tablet and up
  @media (min-width: 768px) {
    padding: 2rem;
  }

  // Desktop and up
  @media (min-width: 992px) {
    padding: 3rem;
  }
}
```

## Best Practices

### 1. CSS Class Naming

Follow your preferred naming conventions:

- Use descriptive, semantic class names
- Avoid excessive wrapper divs
- Keep markup minimal

### 2. Image Handling

- Use the `imgx` component for images
- Wrap images in `<picture>` tags
- Use the `svgx` function for SVG files

### 3. CSS Organization

- Add main styles in `style.scss`
- Add responsive styles in `responsive.scss`
- Avoid inline CSS
- Use the `.container` class for layout

### 4. File Structure

```
assets/
├── scss/
│   ├── style.scss          # Main styles
│   ├── critical.scss       # Critical CSS
│   ├── responsive.scss     # Responsive styles
│   ├── reset.scss          # CSS reset
│   ├── fonts.scss          # Typography
│   └── edit.scss           # Additional styles
└── css/
    ├── style.css           # Compiled main styles
    ├── critical.css        # Compiled critical CSS
    ├── responsive.css      # Compiled responsive styles
    ├── reset.css           # Compiled reset
    ├── fonts.css           # Compiled fonts
    └── edit.css            # Compiled additional styles
```

## Troubleshooting

### Common Issues

1. **Compiler not starting**

   - Check if the extension is installed
   - Restart VS Code/Cursor
   - Check the status bar for "Watch Sass" button

2. **Files not compiling**

   - Ensure SCSS files have `.scss` extension
   - Check file paths match the savePath setting
   - Verify file permissions

3. **CSS not updating**
   - Check if the compiler is running (status bar should show "Watching...")
   - Try stopping and restarting the compiler
   - Check for syntax errors in SCSS files

### Useful Commands

- `Ctrl+Shift+P` → "Live Sass: Watch Sass" - Start compiler
- `Ctrl+Shift+P` → "Live Sass: Stop Watching Sass" - Stop compiler
- `Ctrl+Shift+P` → "Live Sass: Compile Current Sass File" - Compile single file

## Getting Started

1. **Start the compiler** using the "Watch Sass" button
2. **Add your main styles** to `style.scss`
3. **Use the existing breakpoints** in `responsive.scss`
4. **Follow the component structure** in `critical.scss`
5. **Test responsive design** using the provided breakpoints

The compiler will automatically generate the corresponding CSS files in the `assets/css/` directory whenever you save changes to your SCSS files.
