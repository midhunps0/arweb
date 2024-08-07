<x-guest-layout>
    <div class="text-base">
        <x-header-component />
        <div class="m-auto px-2 md:px-16 lg:px-24 text-justify">
            <x-page-title title="Our Doctors" />
            <div x-data="{
                    doctors: [],
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
                        console.log(`${this.currentIndex}, ${this.doctors.length}`)
                        this.currentIndex = this.currentIndex < (this.doctors.length - 1) ? this.currentIndex + 1 : this.currentIndex;
                        console.log(this.currentIndex)
                    },
                    close() {
                        this.showScreen = false;
                    },
                    openScreen(i) {
                        this.currentIndex = i;
                        this.showScreen = true;
                        console.log(this.doctors[this.currentIndex].current_translation.data.exp_summary)
                    }
                }"
                x-init="
                    let result = {{Js::from($doctors)}};
                    {{-- console.log('result')
                    console.log(result) --}}
                    let ks = Object.keys(result);
                    ks.forEach((x) => {
                        doctors.push(...result[x]);
                    });
                    {{-- doctors = result.data; --}}
                    console.log('doctors');
                    console.log(doctors);
                    @if(request()->doc != null)
                        let d = {{request()->doc}};
                        for(let x = 0; x < doctors.length; x++) {
                            console.log(doctors[x]);
                            if(doctors[x]['id'] == d) {
                                openScreen(x);
                                break;
                            }
                        }
                    @endif
                " class="min-h-2/3">
                @php
                    $docIndex = 0;
                @endphp
                @foreach ($doctors as $department => $docData)
                <h4 class="font-bold underline text-xl text-center mt-12 mb-4 text-darkorange">{{$department}}</h4>
                <div class="flex justify-center items-stretch w-full flex-wrap">
                    @foreach ($docData as $d)
                        <div class="w-1/2 p-2">
                            <x-doctorcard
                            index="{{$docIndex}}"
                            name="{{$d->current_translation['data']['name']}}"
                            designation="{{$d->current_translation['data']['designation']}}"
                            department="{{$d->default_department}}"
                            qualification="{{$d->current_translation['data']['qualification']}}"
                            specialization="{{$d->current_translation['data']['specialisations']}}"
                            experience="{{$d->current_translation['data']['exp_summary'] ?? ''}}"
                            video_link="{{$d->current_translation['data']['video_link'] ?? null}}"
                            photo_url="{{$d->photo_url}}"
                            />
                            {{-- <div class="box-border aspect-video border border-gray rounded-lg p-2">
                                <div @click="openScreen({{$loop->index}})" class="w-full h-full object-fill overflow-hidden rounded-lg cursor-pointer">
                                    <img src="{{$p->image_url}}" alt="">
                                </div>
                            </div> --}}
                        </div>
                        @php
                            $docIndex++;
                        @endphp
                    @endforeach
                </div>
                @endforeach
                <div x-show="showScreen" class="fixed top-0 left-0 w-full h-full flex justify-center items-center p-10 bg-base-100 opacity-95 z-50 rounded-lg" x-transition>
                    <div class="h-full flex flex-col box-border aspect-video border border-gray rounded-lgrelative bg-opacity-100 bg-white rounded-lg p-4">
                        <div class="w-full h-full flex flex-row items-start">
                            <div class="w-1/2">
                                <div class="w-full flex flex-row gap-4 p-3 border border-black border-opacity-20 rounded-lg">
                                    <div class="w-1/2">
                                        <img :src="doctors[currentIndex].photo_url" alt="">
                                    </div>
                                    <div class="w-1/2 flex flex-col gap-y-4">
                                        <div><span class="font-bold">Name: </span><br><span x-text="doctors[currentIndex].current_translation.data.name"></span></div>
                                        <div><span class="font-bold">Designation: </span><br><span x-text="doctors[currentIndex].current_translation.data.designation"></span></div>
                                        <div><span class="font-bold">Department: </span><br><span x-text="doctors[currentIndex].default_department"></span></div>
                                    </div>
                                </div>
                                <div class="relative z-10" style="position:relative;padding-bottom:56.25%">
                                    <iframe width="100%" height="100%"
                                        class="w-full absolute top-0 left-0" :src="doctors[currentIndex].current_translation.data.video_link"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
                                        referrerpolicy="origin" allowfullscreen></iframe>
                                </div>
                                <div class="text-xs">
                                    <span x-text="'{{route('doctors').'?doc='}}'+doctors[currentIndex].id"></span>
                                </div>
                            </div>
                            <div class="flex-grow overflow-y-scroll bg-red w-1/2 h-full px-4 leading-8 text-sm">
                                <p class="font-bold">Experience Summary</p>
                                <p x-text="doctors[currentIndex].current_translation.data.exp_summary"></p>
                            </div>
                        </div>
                        <button @click.prevent.stop="close();" type="button" class="btn btn-sm btn-error absolute z-20 top-4 ltr:right-4 rtl:left-4">
                            <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-4" width="w-4" />
                        </button>
                        <button @click.prevent.stop="goPrev();" type="button" class="btn btn-md btn-warning absolute z-20 top-1/2 ltr:left-4 rtl:right-4 ltr:rotate-0 rtl:rotate-180" :disabled="currentIndex == 0">
                            <x-easyadmin::display.icon icon="easyadmin::icons.go_left" height="h-8" width="w-8" />
                        </button>
                        <button @click.prevent.stop="goNext();" type="button" class="btn btn-md btn-warning absolute z-20 top-1/2 ltr:right-4 rtl:left-4 ltr:rotate-0 rtl:rotate-180" :disabled="currentIndex == doctors.length - 1">
                            <x-easyadmin::display.icon icon="easyadmin::icons.go_right" height="h-8" width="w-8" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <x-footer-component/>
    </div>
</x-guest-layout>
