<?php

/**
 * imgx()
 * Renders an image using <picture> tag with WebP support.
 * Automatically converts .png or .jpg to .webp if not yet converted.
 *
 * @param string $src           - Base path without extension (e.g. 'banner/home')
 * @param string $alt           - Alt text for the image
 * @param string $class         - Optional class name
 * @param string $mobileSrc     - Optional mobile version (same as $src, auto-converts too)
 * @param string $attributes    - Additional attributes for img tag
 * @param bool   $lazy          - Lazy loading (default: true)
 * @param int    $mobileBreakpoint - Mobile breakpoint in pixels (default: 768)
 *
 * Example:
 * imgx('hero/banner', 'Hero Banner', 'banner-img');
 * imgx('hero/banner', 'Hero Banner', 'banner-img', 'hero/banner-mobile');
 * imgx('hero/banner', 'Hero Banner', 'banner-img', 'hero/banner-mobile', '', true, 1024);
 */
function imgx($src, $alt = '', $class = '', $mobileSrc = '', $attributes = '', $lazy = true, $mobileBreakpoint = 768)
{
    $webPath = 'assets/images/';
    $filePath = realpath(__DIR__ . '/../assets/images/') . '/';
    $basename = pathinfo($src, PATHINFO_FILENAME);
    $dir = dirname($src) !== '.' ? dirname($src) . '/' : '';
    $extensions = ['png', 'jpg', 'jpeg'];
    $found = false;

    foreach ($extensions as $ext) {
        $try = $dir . $basename . '.' . $ext;
        if (file_exists($filePath . $try)) {
            $src = $try;
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<!-- Image not found: $src -->";
        return;
    }

    $fullSrcPath = $filePath . $src;
    $fullWebPath = $webPath . $src;
    $webpFileName = preg_replace('/\.(png|jpe?g)$/i', '.webp', $src);
    $webpPath = $webPath . $webpFileName;
    $webpFile = $filePath . $webpFileName;

    // WebP Conversion
    if (!file_exists($webpFile) && file_exists($fullSrcPath)) {
        $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
        $img = false;

        if ($ext === 'jpg' || $ext === 'jpeg') {
            $img = imagecreatefromjpeg($fullSrcPath);
        } elseif ($ext === 'png') {
            $img = imagecreatefrompng($fullSrcPath);
            if ($img && function_exists('imagepalettetotruecolor')) {
                imagepalettetotruecolor($img);
            }
        }

        if ($img) {
            imagewebp($img, $webpFile, 80);
            imagedestroy($img);
        } else {
            echo "<!-- Failed to convert to WebP: $fullSrcPath -->";
        }
    }

    // Get dimensions
    [$w, $h] = getimagesize($fullSrcPath);
    $size = " width=\"$w\" height=\"$h\"";
    $alt = htmlspecialchars($alt);
    $class = $class ? " class=\"$class\"" : '';
    // Only add loading attribute if not already present in $attributes
    $loading = '';
    if ($lazy && stripos($attributes, 'loading=') === false) {
        $loading = ' loading="lazy"';
    } elseif (!$lazy && stripos($attributes, 'loading=') === false) {
        $loading = ' loading="eager"';
    }

    echo '<picture>';

    // ✅ Optional mobile version
    if (!empty($mobileSrc)) {
        $mobileBase = pathinfo($mobileSrc, PATHINFO_FILENAME);
        $mobileDir  = dirname($mobileSrc) !== '.' ? dirname($mobileSrc) . '/' : '';
        $mobileFound = false;

        foreach ($extensions as $ext) {
            $mobileTry = $mobileDir . $mobileBase . '.' . $ext;
            if (file_exists($filePath . $mobileTry)) {
                $mobileSrc = $mobileTry;
                $mobileFound = true;
                break;
            }
        }

        if ($mobileFound) {
            $fullMobilePath = $filePath . $mobileSrc;
            $webMobilePath  = $webPath . $mobileSrc;
            $mobileWebpFileName = preg_replace('/\.(png|jpe?g)$/i', '.webp', $mobileSrc);
            $mobileWebp     = $webPath . $mobileWebpFileName;
            $mobileWebpFile = $filePath . $mobileWebpFileName;

            if (!file_exists($mobileWebpFile) && file_exists($fullMobilePath)) {
                $ext = pathinfo($mobileSrc, PATHINFO_EXTENSION);
                $mimg = false;

                if ($ext === 'jpg' || $ext === 'jpeg') {
                    $mimg = imagecreatefromjpeg($fullMobilePath);
                } elseif ($ext === 'png') {
                    $mimg = imagecreatefrompng($fullMobilePath);
                    if ($mimg && function_exists('imagepalettetotruecolor')) {
                        imagepalettetotruecolor($mimg);
                    }
                }

                if ($mimg) {
                    imagewebp($mimg, $mobileWebpFile, 80);
                    imagedestroy($mimg);
                }
            }

            $maxWidth = $mobileBreakpoint - 1;
            echo '<source srcset="' . $mobileWebp . '" media="(max-width: ' . $maxWidth . 'px)" type="image/webp">';
        }
    }

    echo '<source srcset="' . $webpPath . '" type="image/webp">';
    echo '<img src="' . $fullWebPath . "\" alt=\"$alt\"$class$loading$size $attributes>";
    echo '</picture>';
}


/**
 * svgx()
 * Renders a .svg file as a regular <img> tag.
 * Automatically detects width and height from the file.
 *
 * @param string $src    - Path without extension (e.g. 'icons/arrow-left')
 * @param string $alt    - Alt text
 * @param string $class  - Optional class name
 *
 * Example:
 * svgx('icons/close', 'Close Icon', 'icon');
 */
function svgx($src, $alt = '', $class = '')
{
    $webPath = 'assets/images/';
    $filePath = realpath(__DIR__ . '/../assets/images/') . '/';

    $basename = pathinfo($src, PATHINFO_FILENAME);
    $dir = dirname($src) !== '.' ? dirname($src) . '/' : '';
    $svgFile = $dir . $basename . '.svg';

    $fullSrcPath = $filePath . $svgFile;
    $webSrcPath  = $webPath . $svgFile;

    if (!file_exists($fullSrcPath)) {
        echo "<!-- SVG not found: $svgFile -->";
        return;
    }

    // Default empty size
    $width = '';
    $height = '';

    // Read SVG content and parse width/height from the <svg> tag
    $svgContent = file_get_contents($fullSrcPath);

    if (preg_match('/<svg[^>]*\swidth="([\d.]+)(px)?"/i', $svgContent, $wMatch)) {
        $width = ' width="' . $wMatch[1] . '"';
    }

    if (preg_match('/<svg[^>]*\sheight="([\d.]+)(px)?"/i', $svgContent, $hMatch)) {
        $height = ' height="' . $hMatch[1] . '"';
    }

    $altAttr = htmlspecialchars($alt);
    $classAttr = $class ? " class=\"$class\"" : '';

    echo "<img src=\"$webSrcPath\" alt=\"$altAttr\"$classAttr$width$height>";
}




/**
 * svg_inline()
 * Outputs inline SVG code directly into HTML.
 * Allows styling/animation of internal SVG elements via CSS or JS.
 *
 * @param string $src    - Path without extension (e.g. 'icons/arrow-right')
 * @param string $class  - Optional class added to <svg> tag
 *
 * Example:
 * svg_inline('icons/arrow-right', 'icon-inline');
 */
function svg_inline($src, $class = '')
{
    $filePath = realpath(__DIR__ . '/../assets/images/') . '/';
    $basename = pathinfo($src, PATHINFO_FILENAME);
    $dir = dirname($src) !== '.' ? dirname($src) . '/' : '';
    $svgFile = $dir . $basename . '.svg';
    $fullSrcPath = $filePath . $svgFile;

    if (!file_exists($fullSrcPath)) {
        echo "<!-- Inline SVG not found: $svgFile -->";
        return;
    }

    $svgContent = file_get_contents($fullSrcPath);
    if ($class) {
        $svgContent = preg_replace('/<svg\b([^>]*)>/', '<svg$1 class="' . $class . '">', $svgContent, 1);
    }

    echo $svgContent;
}
