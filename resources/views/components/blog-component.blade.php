<div class="flex flex-col gap-4 ">
    <p class="text-sm text-darkorange bg-beige text-center rounded-full py-1 w-16">Blogs</p>
    <p class="text-3xl lg:text-5xl " >Insights From Our Experts</p>
    <div class="mt-6"><x-button-component href="{{route('blog.loc', ['locale' => app()->currentLocale()])}}" 
                        @click.prevent.stop="$dispatch('linkaction', {link: '{{route('blog.loc',['locale' => app()->currentLocale()])}}'})"  title="{{ __('button.view_all')}}"/></div>
    <div class="flex flex-col items-center lg:flex-row lg:gap-2 xl:justify-between mt-6">
        <x-rblogcard  />
        <x-rblogcard />
        <x-rblogcard />
    </div>
</div>