<!-- Blog -->
<?php
    $blogs = App\Models\Blog::where('status',1)->whereHas('category',function($q){
        $q->where('status',1);
    })->latest()->inRandomOrder()->take(3)->get();
?>

<?php if($blogs->count() > 0): ?>

<section class="blog-section pt-100 pb-100 bg--section">
    <div class="container">
        <div class="section-header text-center">
            <h6 class="section-header__subtitle"><?php echo app('translator')->get(@$section->content->title); ?></h6>
            <h3 class="section-header__title"><?php echo app('translator')->get(@$section->content->heading); ?></h3>
            <p>
                <?php echo app('translator')->get(@$section->content->sub_heading); ?>
            </p>
        </div>
        <div class="row g-4 g-lg-3 g-xl-4 justify-content-center">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="blog__item">
                    <a href="<?php echo e(route('blog.details',[$item->id,$item->slug])); ?>" class="blog-link">&nbsp;</a>
                    <div class="blog__item-img">
                        <img src="<?php echo e(getPhoto($item->photo)); ?>" alt="blog">
                        <span class="date">
                            <span><?php echo e(dateFormat($item->created_at,'M')); ?></span>
                            <span><?php echo e(dateFormat($item->created_at,'d')); ?></span>
                        </span>
                    </div>
                    <div class="blog__item-cont">
                        <h5 class="blog__item-cont-title line--2">
                            <?php echo e(Str::limit($item->title,30)); ?>

                        </h5>
                        <p class="line--3">
                            <?php echo e(Str::limit(strip_tags($item->description),130)); ?>

                        </p>
                        <div class="blog__author">
                            <div class="author">
                               
                                <h6>By Admin</h6>
                            </div>
                            <span class="read--more"><?php echo translate('Read More'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
        </div>
    </div>
</section>
    
<?php endif; ?><?php /**PATH F:\xampp\htdocs\new\crypto\project\resources\views/frontend/sections/blog.blade.php ENDPATH**/ ?>