<x-easyadmin::partials.adminpanel>
    <div>
        <h3 class="text-xl font-bold px-1 pb-3"><span>Edit Video Testimonials</span>&nbsp;</h3>
        <div class="px-1">
            <div x-data="{
                    templateId: '',
                    videoId: '',
                    allTemplates: [],
                    form: '',
                    fetchForm() {
                        axios.get(
                            '{{route('template.get')}}',
                            {
                                params: {
                                    'template_id': this.templateId,
                                    'video_id': this.videoId,
                                    'form_type': 'edit'
                                }
                            }
                        ).then((r) => {
                            this.form = r.data.form;
                        }).catch((e) => {
                            console.log(e);
                        });
                    },
                    saveTranslation(form) {
                        let fd = new FormData(form);
                        axios.post(
                            '{{route('videos.update', ['id' => $videoId])}}',
                            fd,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                },
                            }
                        ).then((r) => {
                            if (r.data.success) {
                                $dispatch('showtoast', {
                                    mode: 'success',
                                    message: 'Page updated.'
                                });
                                $dispatch('linkaction', {
                                    route: 'videos.index',
                                    link: '{{route('videos.index')}}',
                                    fresh: true
                                });
                            }
                        }).catch((e) => {
                            $dispatch('showtoast', {
                                mode: 'error',
                                message: this.getErrorString(e.response.data.errors)
                            });
                        });
                    },
                    getErrorString(e) {
                        let temp = '';
                        Object.keys(e).forEach((k) => {
                            temp += `${e[k].join('.')}; `;
                        });
                        return temp.trim();
                    }
                }"
                x-init="
                    $nextTick(() => {
                        videoId = {{Js::from($videoId)}};
                        templateId = {{Js::from($templateId)}};
                        fetchForm();
                    });
                ">
                {{-- <form class="mb-8" @submit.prevent.stop="" action="#">
                    <label class="label">Choose a page template</label>
                    <select x-model="templateId" class="select select-bordered w-full max-w-xs" disabled>
                        <option value="" disabled>Select</option>
                        <template x-for="t in allTemplates">
                        <option :value="t.id" x-text="t.name"></option>
                        </template>
                    </select>
                </form> --}}
                <div>
                    <div x-html="form"></div>
                </div>
            </div>
        </div>
    </div>
</x-easyadmin::partials.adminpanel>
