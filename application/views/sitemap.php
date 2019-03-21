<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
        <changefreq>hourly</changefreq>
    </url>

    <url>
        <loc><?= base_url('page/about/'); ?></loc>
        <priority>0.5</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc><?= base_url('page/contact/'); ?></loc>
        <priority>0.5</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc><?= base_url('page/cabletv/'); ?></loc>
        <priority>0.5</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc><?= base_url('page/data/'); ?></loc>
        <priority>0.5</priority>
        <changefreq>monthly</changefreq>
    </url>

</urlset>