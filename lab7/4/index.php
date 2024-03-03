<?php
    $image_urls = array(
        'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg',
        'https://media.macphun.com/img/uploads/customer/how-to/608/15542038745ca344e267fb80.28757312.jpg?q=85&w=1340',
        'https://www.gettyimages.pt/gi-resources/images/Homepage/Hero/PT/PT_hero_42_153645159.jpg',
        'https://99designs-blog.imgix.net/blog/wp-content/uploads/2016/03/web-images.jpg?auto=format&q=60&w=1600&h=824&fit=crop&crop=faces',
        'https://img.freepik.com/premium-photo/colorful-mountains-with-sun-clouds_777078-76032.jpg',
        'https://imgupscaler.com/images/samples/midjourney-after.webp',
        'https://static.vecteezy.com/system/resources/thumbnails/023/184/201/small/goldfish-in-a-round-glass-aquarium-3d-rendering-3d-illustration-ai-generative-image-free-photo.jpg',
        'https://replicate.delivery/mgxm/8b4d747d-feca-477d-8069-ee4d5f89ad8e/a_high_detail_shot_of_a_cat_wearing_a_suit_realism_8k_-n_9_.png',
        'https://imgv3.fotor.com/images/blog-cover-image/part-blurry-image.jpg',
        'https://th.bing.com/th/id/OIG.Uz66_wn15hsKPirpv6Pb',
        'https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg',
        'https://pixlr.com/img/misc/image-generator-info.webp',
        'https://img.freepik.com/free-photo/wide-angle-shot-single-tree-growing-clouded-sky-during-sunset-surrounded-by-grass_181624-22807.jpg?size=626&ext=jpg&ga=GA1.1.672697106.1707350400&semt=sph',
        'https://img.freepik.com/free-photo/spooky-tree-against-big-moon_1048-2912.jpg',
        'https://assets.newatlas.com/dims4/default/5c1b032/2147483647/strip/true/crop/3464x2309+268+0/resize/1200x800!/quality/90/?url=http%3A%2F%2Fnewatlas-brightspot.s3.amazonaws.com%2Faa%2F91%2Ff448ca5842388fee5cf0cee89263%2Fwebb-s-portrait-of-the-pillars-of-creation.jpg',
        'https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_640.jpg',
        'https://images.pexels.com/photos/1591447/pexels-photo-1591447.jpeg?cs=srgb&dl=pexels-guillaume-meurice-1591447.jpg&fm=jpg',
        'https://burst.shopifycdn.com/photos/view-of-the-forest-floor.jpg?width=1000&format=pjpg&exif=0&iptc=0',
        'https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://cdn.pixabay.com/photo/2018/06/30/09/31/background-image-3507320_640.jpg',
    );

    $aspect = array(
        'aspect-square',
        'aspect-video',
    );

    // Define possible row span values
    $row_spans = array(1, 2);

    function getRandomRowSpan() {
        global $row_spans;
        return $row_spans[array_rand($row_spans)];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col items-center bg-black gap-3">
    <div><h1 class="mt-[30px] text-white text-3xl font-bold">Gallery</h1></div>
    <!-- grid 4x5 -->
    <div class="grid grid-cols-4 w-4/5 h-full object-cover gap-4 p-4 group">
        <?php
        for ($i = 0; $i < 20; $i++) {
            // Generate a random height between 200px and 400px
            $row_span = getRandomRowSpan();
            echo '<img class="duration-300 hover:scale-[1.08] rounded-xl object-cover row-span-' . $row_span . '" src="' . $image_urls[$i] . '">';
        }
        ?>
    </div>

</body
