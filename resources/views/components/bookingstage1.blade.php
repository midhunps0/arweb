<div x-show="tab === 0 " class="flex flex-col gap-4" >
    <div>
        <form method="POST" action="">
            @csrf
            <div class="flex flex-col md:flex-row gap-4 my-8">
                <div class="relative flex-grow">
                        <label class="font-bold" for="title1">Select Department</label>
                        <select x-model="specialtyCode" id="title1" name="title1" type="text" autocomplete="title1"
                            class="w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                border-gray"
                            required>
                            <option value="">--Select--</option>
                            <template x-for="(s, i) in specialties">
                                <option :value="s.Sp_Cd" x-text="s.SpecialtyName"></option>
                            </template>
                        </select>

                </div>
                <div class="relative flex-grow">
                        <label class="font-bold" for="title2">Select Doctor</label>
                        <select x-model="doctorId" id="title2" name="title2" type="text" autocomplete="title2"
                            class="w-full  h-10 text-gray-900 placeholder-transparent    focus:outline-none  focus:border-0
                                border-gray"
                            required>
                            <option value="">--Select--</option>
                            <template x-for="(d, i) in specialtyDoctors">
                                <option :value="d.DoctorId" x-text="d.DoctorName"></option>
                            </template>
                        </select>

                </div>
            </div>
            <div>
                <div class="lg:mt-10 flex justify-end " @click.prevent="tab = 1 "><x-booking-button-component /></div>
            </div>

        </form>
    </div>

</div>
