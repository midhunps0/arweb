<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="w-full px-2 md:px-16 lg:px-24 text-justify">
            <x-page-title title="Our Photos" />
            <div x-data="{
                    photos: [],
                    currentIndex: 0,
                    showScreen: false,
                    close() {
                        this.showScreen = false;
                    },
                    goPrev() {
                        this.currentIndex = this.currentIndex > 0 ? this.currentIndex - 1 : this.currentIndex;
                        console.log(this.currentIndex)
                    },
                    goNext() {
                        console.log(`${this.currentIndex}, ${this.photos.length}`)
                        this.currentIndex = this.currentIndex < (this.photos.length - 1) ? this.currentIndex + 1 : this.currentIndex;
                        console.log(this.currentIndex)
                    },
                    close() {
                        this.showScreen = false;
                    },
                    openScreen(i) {
                        this.currentIndex = i;
                        this.showScreen = true;
                    }
                }"
                x-init="
                    let result = {{Js::from($photos)}};
                    photos = result.data;
                    console.log(photos);
                " class="flex flex-row flex-wrap justify-center items-stretch min-h-2/3">
                @foreach ($photos as $p)
                <div class="md:w-1/3 p-2">
                    <div class="box-border aspect-video border border-gray rounded-lg p-2">
                        <div @click="openScreen({{$loop->index}})" class="w-full h-full object-fill overflow-hidden rounded-lg cursor-pointer">
                            <img src="{{$p->image_url}}" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
                <div x-show="showScreen" class="fixed top-0 left-0 w-full h-full flex justify-center items-center p-10 bg-base-100 opacity-95 z-50 rounded-lg">
                    <div class="h-full box-border aspect-video border border-gray rounded-lgrelative bg-opacity-100 bg-white rounded-lg">
                        <div class="w-full h-full object-fit rounded-lg flex justify-center items-center bg-white p-4">
                            <img :src="photos[currentIndex].image_url" alt="" class="rounded-lg max-h-full max-w-full">
                        </div>
                        <button @click.prevent.stop="close();" type="button" class="btn btn-sm btn-error absolute z-20 top-4 ltr:right-4 rtl:left-4">
                            <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-4" width="w-4" />
                        </button>
                        <button @click.prevent.stop="goPrev();" type="button" class="btn btn-md btn-warning absolute z-20 top-1/2 ltr:left-4 rtl:right-4 ltr:rotate-0 rtl:rotate-180" :disabled="currentIndex == 0">
                            <x-easyadmin::display.icon icon="easyadmin::icons.go_left" height="h-8" width="w-8" />
                        </button>
                        <button @click.prevent.stop="goNext();" type="button" class="btn btn-md btn-warning absolute z-20 top-1/2 ltr:right-4 rtl:left-4 ltr:rotate-0 rtl:rotate-180" :disabled="currentIndex == photos.length - 1">
                            <x-easyadmin::display.icon icon="easyadmin::icons.go_right" height="h-8" width="w-8" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <x-footer-component/>
    </div>
</x-guest-layout>
