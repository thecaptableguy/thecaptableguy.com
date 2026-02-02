# Copilot Instructions for CapTableExpert.com

This is a static website with server-side includes (SSI) for Bob Gillespie's cap table consultancy business. The site focuses on providing educational content about cap tables and equity structures for startups.

## Architecture Overview

**Core Technology Stack:**
- Static HTML with Apache SSI (Server Side Includes) for templating
- Tailwind CSS v4 with daisyUI v5 for styling 
- Vanilla JavaScript for interactive components
- PHP backend for contact form processing with PHPMailer
- Custom daisyUI theme called "bobthere"

**Key Architectural Patterns:**
- Fragment-based component system using SSI includes (`<!--#include virtual="/path/to/fragment.html" -->`)
- Conditional rendering via SSI variables (`<!--#if expr="$var = value" -->`)
- Content-driven structure with separate `.md` files for insights articles
- Theme-driven design using daisyUI semantic colors

## Project Structure & Key Files

```
/fragments/          # Reusable UI components (header, footer, CTAs)
/insights/           # Educational articles about cap tables
  /*/index.html      # Article pages with SSI includes
  /*/*.md            # Article content in Markdown
  /*/*.og.html       # Open Graph meta tags
  /*/*.strd.html     # Structured data
/request-free-call/  # PHP contact form with email processing
/static/             # Assets (CSS, JS, images)
/home/               # Homepage hero carousel fragments
/.vscode/            # Editor instructions for daisyUI and Tailwind
```

## Development Patterns

### SSI Fragment System
- Use `<!--#include virtual="/fragments/header-global.fragment.html" -->` for components
- Set variables before includes: `<!--#set var="header_cta" value="free_call" -->`
- Conditional rendering: `<!--#if expr="$header_cta = free_call" -->`

### Styling Conventions
- Always use daisyUI semantic colors (`bg-primary`, `text-base-content`) over Tailwind colors
- Apply the custom theme via `data-theme="bobthere"` on `<html>` element
- Use daisyUI components (cards, buttons, alerts) as primary building blocks
- Responsive design with Tailwind breakpoint prefixes (`sm:`, `md:`, `lg:`)

### Content Structure
Each insight article follows this pattern:
```html
<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="bobthere">
<head>
  <!-- Meta tags, includes for OG and structured data -->
  <!--#include virtual="article-name.og.html" -->
  <!--#include virtual="article-name.strd.html" -->
</head>
<body>
  <!--#set var="header_cta" value="free_call" -->
  <!--#include virtual="/fragments/header-global.fragment.html" -->
  <!-- Article content with daisyUI styling -->
  <!--#include virtual="/fragments/footer-global.fragment.html" -->
</body>
</html>
```

### Interactive Components
- Carousel system using vanilla JS with template elements and `cloneNode()`
- Contact form with CSRF protection and background email processing
- All interactions use semantic HTML with progressive enhancement

## Common Development Tasks

### Adding New Content
1. Create article folder in `/insights/` with descriptive name
2. Add `index.html` with SSI includes for header/footer
3. Create separate `.og.html` and `.strd.html` for meta tags
4. Use daisyUI classes: `card`, `badge`, `alert`, `btn` for consistent styling

### Styling Guidelines
- Primary CTA: `btn btn-accent` with specific text "Request a Free Consultation"
- Content containers: `container mx-auto px-4` or `max-w-4xl mx-auto`
- Colors: Use `bg-base-100/200/300`, `text-base-content`, `text-primary/secondary/accent`
- Cards: `card bg-base-100 shadow-sm` for content blocks

### Form Processing
- Contact form in `/request-free-call/index.php` handles both GET and POST
- Uses session-based CSRF protection and prevents duplicate submissions
- Background email processing via `exec()` to avoid blocking the response
- Success/error states managed through session variables and SSI conditionals

## Technical Constraints

- **No Build Process**: Direct file editing, relies on Apache SSI processing
- **Theme Consistency**: Always use `data-theme="bobthere"` and daisyUI semantic colors
- **Content Focus**: Educational content about cap tables, equity, and startup finance
- **Mobile-First**: Responsive design required, especially for hero sections and navigation
- **SEO Optimized**: Each page needs proper meta tags, structured data, and semantic HTML

## Key Design Principles

1. **Educational Authority**: Content should establish Bob as a cap table expert
2. **Professional Simplicity**: Clean, trustworthy design that builds confidence
3. **Conversion-Focused**: Clear CTAs leading to consultation requests
4. **Content-Rich**: Long-form educational articles with practical examples
5. **Mobile-Optimized**: Hero sections with responsive carousels and layouts

When working on this codebase, prioritize consistency with existing patterns, maintain the professional design language, and ensure all new content serves the goal of establishing expertise and driving consultation requests.