# ==============================================================================
# Insight Counseling Services - Main Domain .htaccess
# ==============================================================================

# 1. ENFORCE HTTPS & ROUTE TO INSIGHTCOUNSELINGS-WEBSITE PUBLIC
<IfModule mod_rewrite.c>
RewriteEngine On

# Enforce HTTPS
RewriteCond % { HTTPS } off
RewriteRule ^(.*)$ https://% { HTTP_HOST }% { REQUEST_URI } [L, R=301]

# Route incoming traffic into insightcounselings-website/public/
RewriteCond % { REQUEST_URI } !^/insightcounselings-website/public/
RewriteRule ^(.*)$ insightcounselings-website/public/$1 [L]
</IfModule>

# 2. SECURITY HEADERS
<IfModule mod_headers.c>
# Prevent clickjacking
Header set X-Frame-Options "SAMEORIGIN"
    
# Prevent MIME type sniffing
Header set X-Content-Type-Options "nosniff"
    
# Enable XSS Protection
Header set X-XSS-Protection "1; mode=block"
    
# Strict Transport Security (HSTS)
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"
    
# Referrer Policy
Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# 3. BROWSER CACHING (Performance Optimization)
<IfModule mod_expires.c>
ExpiresActive On
    
# Images
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/gif "access plus 1 year"
ExpiresByType image/png "access plus 1 year"
ExpiresByType image/webp "access plus 1 year"
ExpiresByType image/svg+xml "access plus 1 year"
ExpiresByType image/x-icon "access plus 1 year"
    
# CSS & JavaScript
ExpiresByType text/css "access plus 1 month"
ExpiresByType text/javascript "access plus 1 month"
ExpiresByType application/javascript "access plus 1 month"
    
# Fonts
ExpiresByType font/woff2 "access plus 1 year"
ExpiresByType font/woff "access plus 1 year"
</IfModule>

# 4. GZIP COMPRESSION
<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/json image/svg+xml
</IfModule>

# 5. PREVENT DIRECTORY LISTING (Commented out for Hostinger 403 compatibility)
# Options -Indexes

# 6. BLOCK SENSITIVE FILES
<FilesMatch "^\.env">
Require all denied
</FilesMatch>
<FilesMatch "^(php\.ini|error_log|architecture\.md)">
Require all denied
</FilesMatch>
# ==============================================================================
# Insight Counseling Services - Main Domain .htaccess
# ==============================================================================

# 1. ENFORCE HTTPS & ROUTE TO INSIGHTCOUNSELINGS-WEBSITE PUBLIC
<IfModule mod_rewrite.c>
RewriteEngine On

# Enforce HTTPS
RewriteCond % { HTTPS } off
RewriteRule ^(.*)$ https://% { HTTP_HOST }% { REQUEST_URI } [L, R=301]

# Route incoming traffic into insightcounselings-website/public/
RewriteCond % { REQUEST_URI } !^/insightcounselings-website/public/
RewriteRule ^(.*)$ insightcounselings-website/public/$1 [L]
</IfModule>

# 2. SECURITY HEADERS
<IfModule mod_headers.c>
# Prevent clickjacking
Header set X-Frame-Options "SAMEORIGIN"
    
# Prevent MIME type sniffing
Header set X-Content-Type-Options "nosniff"
    
# Enable XSS Protection
Header set X-XSS-Protection "1; mode=block"
    
# Strict Transport Security (HSTS)
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains; preload"
    
# Referrer Policy
Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# 3. BROWSER CACHING (Performance Optimization)
<IfModule mod_expires.c>
ExpiresActive On
    
# Images
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/gif "access plus 1 year"
ExpiresByType image/png "access plus 1 year"
ExpiresByType image/webp "access plus 1 year"
ExpiresByType image/svg+xml "access plus 1 year"
ExpiresByType image/x-icon "access plus 1 year"
    
# CSS & JavaScript
ExpiresByType text/css "access plus 1 month"
ExpiresByType text/javascript "access plus 1 month"
ExpiresByType application/javascript "access plus 1 month"
    
# Fonts
ExpiresByType font/woff2 "access plus 1 year"
ExpiresByType font/woff "access plus 1 year"
</IfModule>

# 4. GZIP COMPRESSION
<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/json image/svg+xml
</IfModule>

# 5. PREVENT DIRECTORY LISTING (Commented out for Hostinger 403 compatibility)
# Options -Indexes

# 6. BLOCK SENSITIVE FILES
<FilesMatch "^\.env">
Require all denied
</FilesMatch>
<FilesMatch "^(php\.ini|error_log|architecture\.md)">
Require all denied
</FilesMatch>
