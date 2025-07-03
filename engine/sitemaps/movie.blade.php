<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($items as $item)
        <url>
            <loc>{{ Mopie::route('movie.single',['id' => $item->getID(), 'slug' => str_slug($item->getOriginalTitle())]) }}</loc>
            <lastmod>{{ $item->getReleaseDate() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
